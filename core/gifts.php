<?php
namespace core;

use PDO;

class Gifts {
  public $db;

  public function __construct() {
    $this->db = new PDO('sqlite:' . __DIR__ . '/db/gifts.db', null, null, [PDO::ATTR_PERSISTENT => true]);
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->exec('PRAGMA journal_mode = WAL;');
    $this->db->exec('PRAGMA synchronous = NORMAL;');
    $this->db->exec('PRAGMA foreign_keys = ON;');
    $this->setSql();
  }

  private function setSql(): void {
    $this->db->exec("CREATE TABLE IF NOT EXISTS gifts (
      `id`     INTEGER PRIMARY KEY AUTOINCREMENT,
      `from`   INTEGER NOT NULL,
      `for`    INTEGER NOT NULL,
      `giftid` INTEGER NOT NULL,
      `rare`   REAL NOT NULL,
      `text`   TEXT DEFAULT NULL,
      `time`   INTEGER NOT NULL
    );");
    $this->db->exec("CREATE INDEX IF NOT EXISTS idx_gifts_from_for ON gifts (`from`, `for`);");
    $this->db->exec("CREATE INDEX IF NOT EXISTS idx_gifts_for ON gifts (`for`);");
  }

  public function send(int $from, int $for, int $giftid, $text = null) {
    if ($from === $for) return 'Нельзя отправить подарок самому себе.';

    $base = (float) rand(0, 1000) / 1000.0;
    $power = 1.5 + ((float) rand(0, 200) / 100.0); 
    $rare = pow($base, $power);
    $shift = ((float) rand(-150, 50)) / 1000.0;
    $rare = round(max(0.001, min(1, $rare + $shift)), 3);

    if($text != null){
      $text = trim($text);
      $text = mb_substr($text, 0, 2555);
      $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
      $text = str_replace("\r\n", "[br]", $text);
    }
    $stmt = $this->db->prepare("
      INSERT INTO gifts (`from`, `for`, `giftid`, `rare`, `text`, `time`)
      VALUES (:from, :for, :giftid, :rare, :text, :time)
    ");
    $stmt->execute([
      ':from' => $from,
      ':for'  => $for,
      ':giftid' => $giftid,
      ':rare' => $rare,
      ':text' => $text,
      ':time' => time()
    ]);
    return $this->db->lastInsertId();
  }

  public function getGifts(int $userId, int $page = 1, int $perPage = 15): array {
    $offset = ($page - 1) * $perPage;
    $stmt = $this->db->prepare("
        SELECT * FROM gifts
        WHERE `for` = :userId
        ORDER BY time DESC
        LIMIT :limit OFFSET :offset
    ");
    $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getGift(int $giftId): ?array {
    $stmt = $this->db->prepare("SELECT * FROM gifts WHERE id = :id");
    $stmt->execute([':id' => $giftId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: null;
  }

  public function getTotalGiftPages(int $userId, int $perPage = 15): int {
    if ($perPage <= 0) return 0;
    $stmt = $this->db->prepare("
        SELECT COUNT(id) FROM gifts
        WHERE `for` = :userId
    ");
    
    $stmt->execute([
        ':userId' => $userId
    ]);
    $totalGifts = (int)$stmt->fetchColumn();
    return (int)ceil($totalGifts / $perPage);
  }

  public function getTotalGift(int $userId): int {
    $stmt = $this->db->prepare("
        SELECT COUNT(id) FROM gifts
        WHERE `for` = :userId
    ");
    $stmt->execute([
        ':userId' => $userId
    ]);
    $totalGifts = (int)$stmt->fetchColumn();
    return (int)$totalGifts;
  }

  public function hexToRgb($hex) {
    $hex = ltrim($hex, '#');
    return [
      'r' => hexdec(substr($hex, 0, 2)),
      'g' => hexdec(substr($hex, 2, 2)),
      'b' => hexdec(substr($hex, 4, 2))
    ];
  }

  public function getGradientColor(float $percentage): string {
    //$colors = ['#9d9d9d', '#ffffff', '#1eff00', '#0070dd', '#a335ee', '#ff8000'];
    $colors = ['#9d9d9db4', '#ffffffb4', '#1eff00b6', '#006fddb0', '#a435eeb9', '#ff8000'];
    $percentage = max(0, min(100, $percentage));
    if (count($colors) === 1) return $colors[0];
    $index = (count($colors) - 1) * $percentage / 100;
    $i = floor($index);
    $t = $index - $i;
    $color1 = $colors[$i];
    $color2 = $colors[min($i + 1, count($colors) - 1)];
    $c1 = $this->hexToRgb($color1);
    $c2 = $this->hexToRgb($color2);
    $add = $t - ($percentage / 100);
    $r = round($c1['r'] * (1 - $t) + $c2['r'] * $t) + ($add);
    $g = round($c1['g'] * (1 - $t) + $c2['g'] * $t) + ($add);
    $b = round($c1['b'] * (1 - $t) + $c2['b'] * $t) + ($add);
    return "rgb($r, $g, $b)";
  }
}