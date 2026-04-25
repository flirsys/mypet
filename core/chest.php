<?php
namespace core;

use PDO;
class Chest {
  public $db;

  public function __construct(){
    $this->db = new PDO('sqlite:'.DIR.'/core/db/chest.db', null, null, [PDO::ATTR_PERSISTENT => true]);
    $this->setSql();
    $this->db->exec('PRAGMA journal_mode = WAL;');
    $this->db->exec('PRAGMA synchronous = OFF;');
    $this->db->exec('PRAGMA cache_size = -20000;');
    $this->db->exec('PRAGMA busy_timeout = 5000;');
  }

  public function setSql() {
    $this->db->query("CREATE TABLE IF NOT EXISTS chest(
      `id`    INTEGER PRIMARY KEY AUTOINCREMENT,
      `owner` INTEGER NOT NULL,
      `type`  TEXT NOT NULL,
      `item`  TEXT NOT NULL,
      `time`  INTEGER DEFAULT 0
    );");
  }

  public function getAll($ownerId) {
    $sql = "SELECT * FROM chest WHERE owner = :owner ORDER BY time";
    $stmt =  $this->db->prepare($sql);
    $stmt->bindValue(':owner', $ownerId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getAllC($ownerId) {
    $sql = "SELECT COUNT(*) FROM chest WHERE owner = :owner";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':owner', $ownerId, PDO::PARAM_INT);
    $stmt->execute();
    return (int)$stmt->fetchColumn();
  }

  
  public function get($id, $userID) {
    $sql = "SELECT * FROM `chest` WHERE `id` = :id LIMIT 1";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$item) return false;
    else{
      if($item['owner'] == $userID) return $item ?? false;
    }
  }

  public function add($owner, $type, $item) {
    $stmtReg = $this->db->prepare("INSERT INTO chest(
      `owner`, `type`, `item`, `time`
    ) VALUEs (
      :owner, :type, :item, :time
    )");
    $stmtReg->execute([
      ':owner' => $owner,
      ':type' => $type,
      ':item' => $item,
      ':time' => time()
    ]);
    $lastId = $this->db->lastInsertId();
    return $lastId;
  }

  public function remove($id) {
    $sql = "DELETE FROM chest WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }

  public function getItem($type, $item) {
    if ($type[0] === 'c') {
      include DIR.'/icl/sets.php';
      $str = (int) substr($type, 1);
      $i = $sets_list[$item][$str];
      $icon = $i['name'];
      $name = $i['ru'];
      $beauty = $sets_list[$item]['beauty'];
      return ['type' => 'cloth', 'icon' => $icon, 'name' => $name, 'beauty' => $beauty, 'price' => floor($sets_list[$item]['price'] * 0.75)];
    }
  }

}