<?php
namespace core;

use PDO;

class Chat {
  public $db;
  private const TEXT_MIN_LENGTH = 2;
  private const TEXT_MAX_LENGTH = 1655;

  public function __construct() {
    $this->db = new PDO('sqlite:' . __DIR__ . '/db/chat.db', null, null, [PDO::ATTR_PERSISTENT => true]);
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->exec('PRAGMA journal_mode = WAL;');
    $this->db->exec('PRAGMA synchronous = NORMAL;');
    $this->db->exec('PRAGMA foreign_keys = ON;');
    $this->setSql();
  }

  private function setSql(): void {
    $this->db->exec("CREATE TABLE IF NOT EXISTS chat (
      `id`    INTEGER PRIMARY KEY AUTOINCREMENT,
      `from`  INTEGER NOT NULL,
      `for`   INTEGER DEFAULT NULL,
      `text`  TEXT NOT NULL,
      `time`  INTEGER NOT NULL
    );");
  }

  public function send(int $from, string $text, $for = null) {
    $trimmedText = trim($text);
    if (mb_strlen($trimmedText) < self::TEXT_MIN_LENGTH || mb_strlen($trimmedText) > self::TEXT_MAX_LENGTH) {
      return 'Длина сообщения должна быть от ' . self::TEXT_MIN_LENGTH . ' до ' . self::TEXT_MAX_LENGTH . ' символов.';
    }

    $sanitizedText = htmlspecialchars($trimmedText, ENT_QUOTES, 'UTF-8');
    $sanitizedText = str_replace("\r\n", "[br]", $sanitizedText);

    $stmt = $this->db->prepare("INSERT INTO chat (`from`, `for`, `text`, `time`)
      VALUES (:from, :for, :text, :time)
    ");
    $stmt->execute([
      ':from' => $from,
      ':for' => $for,
      ':text' => $sanitizedText,
      ':time' => time()
    ]);
    return false;
  }
  
  public function getMessages(int $page = 1, int $perPage = 14): array {
    $offset = ($page - 1) * $perPage;
    $stmt = $this->db->prepare("SELECT * FROM chat
      ORDER BY time DESC
      LIMIT :limit OFFSET :offset
    ");
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getTotalPages(int $perPage = 14): int {
    if ($perPage <= 0) return 0;
    $stmt = $this->db->prepare("SELECT COUNT(id) FROM chat");
    $stmt->execute();
    $totalMessages = (int)$stmt->fetchColumn();
    return (int)ceil($totalMessages / $perPage);
  }
}