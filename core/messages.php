<?php
namespace core;

use PDO;
use Exception;

class Messages {
  public $db;
  private const TEXT_MIN_LENGTH = 2;
  private const TEXT_MAX_LENGTH = 2555;

  public function __construct() {
    $this->db = new PDO('sqlite:' . __DIR__ . '/db/messages.db', null, null, [PDO::ATTR_PERSISTENT => true]);
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->exec('PRAGMA journal_mode = WAL;');
    $this->db->exec('PRAGMA synchronous = NORMAL;');
    $this->db->exec('PRAGMA foreign_keys = ON;');
    $this->setSql();
  }

  private function setSql(): void {
    $this->db->exec("CREATE TABLE IF NOT EXISTS messages (
      `id`    INTEGER PRIMARY KEY AUTOINCREMENT,
      `from`  INTEGER NOT NULL,
      `for`   INTEGER NOT NULL,
      `gift`  INTEGER DEFAULT NULL,
      `text`  TEXT NOT NULL,
      `del`   INTEGER DEFAULT NULL,
      `read`  INTEGER DEFAULT 0,
      `time`  INTEGER NOT NULL
    );");
    // Индексы для ускорения выборок
    $this->db->exec("CREATE INDEX IF NOT EXISTS idx_messages_from_for ON messages (`from`, `for`);");
    $this->db->exec("CREATE INDEX IF NOT EXISTS idx_messages_for_read ON messages (`for`, `read`);");
  }

  /**
   * Отправка сообщения с валидацией.
   * @throws Exception
   */
  public function send(int $from, int $for, string $text, $giftid = null) {
    if ($from === $for) return 'Нельзя отправить сообщение самому себе.';
    $trimmedText = trim($text);
    if($giftid == false){
      if (mb_strlen($trimmedText) < self::TEXT_MIN_LENGTH || mb_strlen($trimmedText) > self::TEXT_MAX_LENGTH) {
        return 'Длина сообщения должна быть от ' . self::TEXT_MIN_LENGTH . ' до ' . self::TEXT_MAX_LENGTH . ' символов.';
      }
    }else{
      $trimmedText = mb_substr($trimmedText, 0, 2555);
    }
    $sanitizedText = htmlspecialchars($trimmedText, ENT_QUOTES, 'UTF-8');
    $sanitizedText = str_replace("\r\n", "[br]", $sanitizedText);

    $stmt = $this->db->prepare("
      INSERT INTO messages (`from`, `for`, `gift`, `text`, `read`, `time`)
      VALUES (:from, :for, :gift, :text, 0, :time)
    ");
    $stmt->execute([
      ':from' => $from,
      ':for'  => $for,
      ':gift' => $giftid,
      ':text' => $sanitizedText,
      ':time' => time()
    ]);
    return false;
    //return (int)$this->db->lastInsertId();
  }

  /**
   * Получение сообщений для конкретного чата с пагинацией.
   * Не показывает сообщения, удаленные текущим пользователем.
   */
  public function getMessages(int $userId, int $partnerId, int $page = 1, int $perPage = 14): array {
    $offset = ($page - 1) * $perPage;
    
    $stmt = $this->db->prepare("
        SELECT * FROM messages
        WHERE 
            ((`from` = :userId AND `for` = :partnerId) OR (`from` = :partnerId AND `for` = :userId))
            AND (`del` IS NULL OR `del` != :userId) -- Не показывать удаленные мной
        ORDER BY time DESC
        LIMIT :limit OFFSET :offset
    ");
    
    $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindValue(':partnerId', $partnerId, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Получение списка чатов пользователя с пагинацией.
   * Сортировка по времени последнего сообщения.
   */
  public function getChats(int $userId, int $page = 1, int $perPage = 10): array {
    $offset = ($page - 1) * $perPage;
    $stmt = $this->db->prepare("
        SELECT
            m.id,
            m.`gift`,
            m.text,
            m.time,
            m.`from`,
            m.`for`,
            m.`read`,
            -- Определяем ID собеседника
            CASE WHEN m.`from` = :userId THEN m.`for` ELSE m.`from` END AS partner_id,
            -- Считаем непрочитанные сообщения в каждом чате
            (SELECT COUNT(*) FROM messages sub 
             WHERE ((sub.`from` = m.`from` AND sub.`for` = m.`for`) OR (sub.`from` = m.`for` AND sub.`for` = m.`from`))
             AND sub.`for` = :userId AND sub.`read` = 0
            ) as unread_count
        FROM messages m
        -- Соединяем с подзапросом, который находит ID последнего сообщения в каждом чате
        INNER JOIN (
            SELECT MAX(id) as last_id
            FROM messages
            WHERE (`from` = :userId OR `for` = :userId)
            GROUP BY CASE WHEN `from` = :userId THEN `for` ELSE `from` END
        ) AS last_messages ON m.id = last_messages.last_id
        WHERE (`del` IS NULL OR `del` != :userId)
        ORDER BY m.time DESC
        LIMIT :limit OFFSET :offset
    ");

    $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Устанавливает метку "прочитано" на сообщение.
   * Только получатель может пометить сообщение как прочитанное.
   */
  public function setRead(int $messageId, int $userId): bool {
    // Обновляем только если сообщение адресовано нам и еще не прочитано
    $stmt = $this->db->prepare(
        "UPDATE messages SET `read` = 1 WHERE id = :id AND `for` = :userId AND `read` = 0"
    );
    $stmt->execute([
      ':id' => $messageId,
      ':userId' => $userId
    ]);
    // Возвращаем true, если строка была затронута
    return $stmt->rowCount() > 0;
  }

  /**
   * Устанавливает метку удаления на сообщение.
   * Если второй участник чата уже пометил его, сообщение удаляется полностью.
   */
  public function setDelete(int $messageId, int $userId): bool {
    $message = $this->getMessageById($messageId);

    if (!$message) {
      return false; // Сообщение не найдено
    }

    // Убедимся, что пользователь является участником этого диалога
    if ($message['from'] != $userId && $message['for'] != $userId) {
      return false;
    }
    
    // Если сообщение уже удалено текущим пользователем, ничего не делаем
    if ($message['del'] == $userId) {
        return true;
    }

    // Если второй собеседник уже удалил сообщение, удаляем его навсегда
    if ($message['del'] !== null && $message['del'] != $userId) {
      return $this->hardDelete($messageId);
    }
    
    // Иначе, ставим метку "удалено" от имени текущего пользователя
    $stmt = $this->db->prepare("UPDATE messages SET `del` = :userId WHERE id = :id");
    return $stmt->execute([':userId' => $userId, ':id' => $messageId]);
  }
  
  /**
   * Вспомогательная функция для полного удаления сообщения из БД.
   */
  private function hardDelete(int $messageId): bool {
      $stmt = $this->db->prepare("DELETE FROM messages WHERE id = :id");
      return $stmt->execute([':id' => $messageId]);
  }

  /**
   * Вспомогательная функция для получения одного сообщения по ID.
   */
  public function getMessageById(int $messageId): ?array {
    $stmt = $this->db->prepare("SELECT * FROM messages WHERE id = :id");
    $stmt->execute([':id' => $messageId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: null;
  }
  
  /**
   * Получает общее количество непрочитанных сообщений для пользователя.
   */
  public function getUnreadCount(int $userId): int {
    $stmt = $this->db->prepare("SELECT COUNT(id) FROM messages WHERE `for` = :userId AND `read` = 0");
    $stmt->execute([':userId' => $userId]);
    return (int) $stmt->fetchColumn();
  }

  /**
   * Получает общее количество страниц сообщений в чате.
   *
   * @param int $userId ID текущего пользователя.
   * @param int $partnerId ID собеседника.
   * @param int $perPage Количество сообщений на странице.
   * @return int Общее количество страниц.
   */
  public function getTotalMessagePages(int $userId, int $partnerId, int $perPage = 14): int {
    if ($perPage <= 0) return 0;

    $stmt = $this->db->prepare("
        SELECT COUNT(id) FROM messages
        WHERE 
            ((`from` = :userId AND `for` = :partnerId) OR (`from` = :partnerId AND `for` = :userId))
            AND (`del` IS NULL OR `del` != :userId)
    ");
    
    $stmt->execute([
        ':userId' => $userId,
        ':partnerId' => $partnerId
    ]);
    
    $totalMessages = (int)$stmt->fetchColumn();
    
    return (int)ceil($totalMessages / $perPage);
  }

  /**
   * Получает общее количество страниц чатов для пользователя.
   *
   * @param int $userId ID текущего пользователя.
   * @param int $perPage Количество чатов на странице.
   * @return int Общее количество страниц.
   */
  public function getTotalChatPages(int $userId, int $perPage = 10): int {
    if ($perPage <= 0) return 0;

    // Запрос почти идентичен getChats, но вместо выборки данных мы считаем количество.
    // Это гарантирует, что логика подсчета и выборки совпадает.
    $stmt = $this->db->prepare("
        SELECT COUNT(m.id)
        FROM messages m
        INNER JOIN (
            SELECT MAX(id) as last_id
            FROM messages
            WHERE (`from` = :userId OR `for` = :userId)
            GROUP BY CASE WHEN `from` = :userId THEN `for` ELSE `from` END
        ) AS last_messages ON m.id = last_messages.last_id
        WHERE (`del` IS NULL OR `del` != :userId)
    ");

    $stmt->execute([':userId' => $userId]);
    $totalChats = (int)$stmt->fetchColumn();

    return (int)ceil($totalChats / $perPage);
  }
}