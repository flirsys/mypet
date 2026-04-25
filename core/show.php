<?php
namespace core;

use PDO;
class Show {
  public $db;
  public $user = false;

  public function __construct(){
    $this->db = new PDO('sqlite:'.DIR.'/core/db/show.db', null, null, [PDO::ATTR_PERSISTENT => true]);
    $this->setSql();
    $this->db->exec('PRAGMA journal_mode = WAL;');
    $this->db->exec('PRAGMA synchronous = OFF;');
    $this->db->exec('PRAGMA cache_size = -20000;');
    $this->db->exec('PRAGMA busy_timeout = 5000;');
  }

  public function setSql() {
    $this->db->query("CREATE TABLE IF NOT EXISTS show(
      `id`     INTEGER NOT NULL UNIQUE,
      `type`   INTEGER DEFAULT 0,
      `final`  INTEGER DEFAULT 1,
      `go`     INTEGER DEFAULT 0,
      `rating` INTEGER DEFAULT 0,
      `coin`  INTEGER DEFAULT 0
    );");
  }

  function getPage($type, $final, $page): array {
    $limit = 10;
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM show WHERE type = :type AND final = :final ORDER BY rating DESC LIMIT :limit OFFSET :offset";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':type', $type, PDO::PARAM_INT);
    $stmt->bindValue(':final', $final, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  function getPageById($id, $type, $final, $rowsPerPage = 10): int {
    $sql = "SELECT rating FROM show WHERE id = :id AND type = :type AND final = :final";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':id' => $id, ':type' => $type, ':final' => $final]);
    $rating = $stmt->fetchColumn();
    if ($rating === false) {
        return -1;
    }
    $sql = "SELECT COUNT(*) FROM show WHERE type = :type AND rating > :rating";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':type' => $type, ':rating' => $rating]);
    $count = $stmt->fetchColumn();
    $position = $count + 1;
    return (int)ceil($position / $rowsPerPage);
  }
  function getMaxPages($type, $final, $rowsPerPage = 10): int {
    $sql = "SELECT COUNT(*) FROM show WHERE type = :type AND final = :final";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':type' => $type, ':final' => $final]);
    $totalRows = $stmt->fetchColumn();  
    return (int) ceil($totalRows / $rowsPerPage);
  }

  function getPositionById($id, $type, $final): int {
    $sql = "SELECT rating FROM show WHERE id = :id AND type = :type AND final = :final";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':id' => $id, ':type' => $type, ':final' => $final]);
    $rating = $stmt->fetchColumn();
    if ($rating === false) {
        return -1;
    }
    $sql = "SELECT COUNT(*) FROM show WHERE type = :type AND final = :final AND rating > :rating";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':type' => $type, ':rating' => $rating, ':final' => $final]);
    $count = $stmt->fetchColumn();
    return (int)$count + 1;
  }


  
  // add, set, get
  public function add($id, $what, $value) {
    $allowed = ['final', 'type', 'rating', 'coin'];
    if (!in_array($what, $allowed)) return 'Недопустимое имя';
    $sql = "UPDATE `show` SET `$what` = :value WHERE `id` = :id";
    $stmt = $this->db->prepare($sql);
    $old = $this->get($id, $what);
    if($old == null || $old == '') $old = 0;
    $new = (int) $old + (int) $value;
    $stmt->bindParam(':value', $new);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $this->user[$what] = $new;
  }
  public function set($id, $what, $value) {
    $allowed = ['final', 'type', 'go', 'rating', 'coin'];
    if (!in_array($what, $allowed)) return 'Недопустимое имя';
    $sql = "UPDATE `show` SET `$what` = :value WHERE `id` = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':value', $value);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $this->user[$what] = $value;
  }
  public function get($id, $what) {
    $allowed = ['final', 'type', 'go', 'rating', 'coin'];
    if (!in_array($what, $allowed)) return 'Недопустимое имя';
    $sql = "SELECT `$what` FROM `show` WHERE `id` = :id LIMIT 1";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result[$what] : null;
  }
  // add, set, get
  
  public function getUser($id, $last = 0) {
    $sql = "SELECT * FROM `show` WHERE `id` = :id LIMIT 1";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user == false && $last == false){
      $this->register($id);
      return $this->getUser($id, 1);
    }
    return $user ?: false;
  }

  public function register($id) {
    $stmtReg = $this->db->prepare("INSERT INTO show(`id`) VALUEs (:id)");
    $stmtReg->execute([':id' => $id]);
    return $id;
  }
}