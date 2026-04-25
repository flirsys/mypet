<?php
namespace Core;

use PDO;

class SpamBlocker {
  private $pdo;
  private $rateWindowSec = 8;       // окно времени для rate (сек)
  private $rateThreshold = 6;       // сколько сообщений в окне = спам
  private $repeatWindowSec = 20;    // окно для повторов (сек)
  private $repeatThreshold = 3;     // сколько одинаковых сообщений за окно = спам
  private $maxMessageAge = 60 * 60; // держим логи сообщений 1 час (чистим)

  public function __construct() {
    $this->pdo = new PDO('sqlite:'.DIR.'/core/db/spam.db');
    $this->pdo->exec('PRAGMA journal_mode = WAL;');
    $this->pdo->exec('PRAGMA synchronous = NORMAL;');
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->initSchema();
  }

  private function initSchema() {
    $this->pdo->exec("
      CREATE TABLE IF NOT EXISTS messages (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id TEXT NOT NULL,
        message TEXT NOT NULL,
        created_at INTEGER NOT NULL
      );
    ");
    $this->pdo->exec("CREATE INDEX IF NOT EXISTS idx_messages_user_created ON messages(user_id, created_at);");
  }


  // Логируем сообщение и проверяем спам — возвращаем true если сообщение принято, false если заблокировано
  public function handleMessage(string $userId, string $message): bool {
    $now = time();
    $this->pdo->beginTransaction();
    $stmt = $this->pdo->prepare("INSERT INTO messages (user_id, message, created_at) VALUES (:uid, :msg, :t)");
    $stmt->execute([':uid' => $userId, ':msg' => $message, ':t' => $now]);
    $this->pdo->commit();
    $this->garbageCollectOldMessages();
    if ($this->checkRateSpam($userId, $now)) return true;
    if ($this->checkRepeatSpam($userId, $message, $now)) return true;
    return false;
  }

  private function checkRateSpam(string $userId, int $now): bool {
    $windowStart = $now - $this->rateWindowSec;
    $stmt = $this->pdo->prepare("SELECT COUNT(*) as cnt FROM messages WHERE user_id = :uid AND created_at >= :ws");
    $stmt->execute([':uid' => $userId, ':ws' => $windowStart]);
    $cnt = (int)$stmt->fetchColumn();
    return $cnt >= $this->rateThreshold;
  }

  private function checkRepeatSpam(string $userId, string $message, int $now): bool {
    $windowStart = $now - $this->repeatWindowSec;
    $stmt = $this->pdo->prepare("SELECT COUNT(*) as cnt FROM messages WHERE user_id = :uid AND created_at >= :ws AND message = :msg");
    $stmt->execute([':uid' => $userId, ':ws' => $windowStart, ':msg' => $message]);
    $cnt = (int)$stmt->fetchColumn();
    return $cnt >= $this->repeatThreshold;
  }

  private function garbageCollectOldMessages() {
    $cut = time() - $this->maxMessageAge;
    $stmt = $this->pdo->prepare("DELETE FROM messages WHERE created_at < :cut");
    $stmt->execute([':cut' => $cut]);
  }
}
