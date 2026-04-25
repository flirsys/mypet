<?php
namespace core;

use PDO;
class Core {
  public $db;
  public $user = false;

  public function __construct(){
    $this->db = new PDO('sqlite:'.DIR.'/core/db/users.db', null, null, [PDO::ATTR_PERSISTENT => true]);
    $this->db->exec('PRAGMA journal_mode = WAL;');
    $this->db->exec('PRAGMA synchronous = NORMAL;');
    $this->db->exec('PRAGMA cache_size = -20000;');
    $this->db->exec('PRAGMA busy_timeout = 5000;');
    $this->setSql();
    $this->auth();
    if ($this->user && $this->user['pet'] !== null) {
      $time = time();
      if(date('Y-m-d', $this->user['online_time']) != date('Y-m-d', $time)){
        $show = new \core\Show();
        $show->set($this->user['id'], 'coin', 0);
        define('NEW_DAY', true);
        $this->add($this->user['id'], 'coin', 10);
      }
      $this->set($this->user['id'], 'online_time', $time);
      $this->user['online_time'] = $time;
      if($this->user['ban_time'] != 0 && $this->user['ban_time'] <= $time){
        $this->set($this->user['id'], 'ban_time', 0);
      }
    }
  }

  public function getBeauty($user){
    $beauty = 0;
    $u_food = $this->getG($user, 'shop', 'food');
    $u_play = $this->getG($user, 'shop', 'play');
    $all_food = 0;
    for($i=1;$i<=$u_food;$i++){
      $all_food += $this->getFoodStats($i)['beauty'];
    }
    $beauty += $all_food;
    $all_play = 0;
    for($i=1;$i<=$u_play;$i++){
      $all_play += $this->getPlayStats($i)['beauty'];
    }
    $beauty += $all_play;
    $all_lvl = round((($user['level']+1)*3) ** 1.15);
    $beauty += $all_lvl;

    $g_train = $this->getAllG($user, 'train');
    $g_shop = $this->getAllG($user, 'shop');

    $all_j = 0;
    $all_j += ($g_shop['j1'] ?? 0) * 2;
    $all_j += ($g_shop['j2'] ?? 0) * 2;
    $all_j += ($g_shop['j3'] ?? 0) * 2;
    $all_j += ($g_shop['j4'] ?? 0) * 2;
    $all_j += ($g_shop['j5'] ?? 0) * 2;
    $all_j += ($g_shop['j6'] ?? 0) * 2;
    $assi1 = $this->getAssi(1, $g_shop['a1'] ?? 0);
    $all_j += round($all_j * ($assi1['beauty'] / 100));
    $beauty += $all_j;

    $all_f = 0;
    $all_f += ($g_shop['f1'] ?? 0) * 2;
    $all_f += ($g_shop['f2'] ?? 0) * 2;
    $all_f += ($g_shop['f3'] ?? 0) * 2;
    $all_f += ($g_shop['f4'] ?? 0) * 2;
    $all_f += ($g_shop['f5'] ?? 0) * 2;
    $all_f += ($g_shop['f6'] ?? 0) * 2;
    $assi2 = $this->getAssi(1, $g_shop['a2'] ?? 0);
    $all_f += round($all_f * ($assi2['beauty'] / 100));
    $beauty += $all_f;

    $h1 = ['lvl' => $g_shop['h1'] ?? 0];
    $h2 = ['lvl' => $g_shop['h2'] ?? 0];
    $h3 = ['lvl' => $g_shop['h3'] ?? 0];
    $h4 = ['lvl' => $g_shop['h4'] ?? 0];
    $h5 = ['lvl' => $g_shop['h5'] ?? 0];
    $h6 = ['lvl' => $g_shop['h6'] ?? 0];
    $h7 = ['lvl' => $g_shop['h7'] ?? 0];
    $h8 = ['lvl' => $g_shop['h8'] ?? 0];
    $h9 = ['lvl' => $g_shop['h9'] ?? 0];
    $h10 = ['lvl' => $g_shop['h10'] ?? 0];
    $h11 = ['lvl' => $g_shop['h11'] ?? 0];
    $h12 = ['lvl' => $g_shop['h12'] ?? 0];
    $all_h = $h1['lvl'] + $h2['lvl'] + $h3['lvl'] +
                $h4['lvl'] + $h5['lvl'] + $h6['lvl'] +
                $h7['lvl'] + $h8['lvl'] + $h9['lvl'] +
                $h10['lvl'] + $h11['lvl'] + $h12['lvl'];
    $all_h *= 10;
    $assi3 = $this->getAssi(3, $g_shop['a3'] ?? 0);
    $all_h += round($all_h * ($assi3['beauty'] / 100));
    $beauty += $all_h;

    include DIR . '/icl/sets.php';
    $all_set = 0;
    for($i=1;$i<=6;$i++) {
      if(!(isSet($g_shop['c'.$i]) && $g_shop['c'.$i] != 0)) continue;
      $all_set += $sets_list[$g_shop['c'.$i]]['beauty'];
      //2, 4 - Одежда | 1,3 - Аксессуар | 5,6 - Украшение
      if($i == 1 || $i == 3){
        $beauty += ($g_train['accessory'] ?? 0) * 2;
      } else if($i == 2 || $i == 4){
        $beauty += ($g_train['cloth'] ?? 0) * 2;
      }else{
        $beauty += ($g_train['style'] ?? 0) * 2;
      }
    }
    $beauty += $all_set;
    include DIR . '/icl/cups.php';
    $all_cup = 0;
    for($i=1;$i<=($g_shop['cup'] ?? 0);$i++) {
      $all_cup += round($beauty * ($cup_list[min(33, $i)]['beauty'] / 100));
    }
    $beauty += $all_cup;
    return $beauty;
  }
  public function getMaxExp($user){
    $l = $user['level'] +1;
    return round(
      (
        $l *
        ($l <= 5 ? 2.8 : ($l <= 10 ? 3.2 : ($l <= 15 ? 3.8 : ($l <= 20 ? 4.2 : ($l <= 25 ? 4.8 : 5.2)))))
      ) **
      ($l <= 5 ? 1.6 : ($l <= 10 ? 1.65 : ($l <= 15 ? 1.7 : ($l <= 20 ? 1.75 : ($l <= 25 ? 1.8 : 1.85)))))
    );
  }
  public function getExpP($user){
    return floor(($user['exp'] / $user['exp_max']) * 100);
  }

  public function getFoodStats($id){
    $exp = round($id ** 1.6);
    $heart = round($id ** 1.75);
    $beauty = round(
      ($id + ($id <= 5 ? 1.1 : ($id <= 10 ? 1.5 : ($id <= 15 ? 2 : 2.5))) ) **
      1.9
    );
    $price = round(
      (($id-1) * ($id <= 10 ? 11 : ($id <= 15 ? 13 : 16))) ** 
      ($id <= 5 ? 1.25 : ($id <= 10 ? 1.35 : ($id <= 15 ? 1.45 : 1.55)))
    );
    $level = floor($id ** 1.342);
    return ['exp' => $exp, 'heart' => $heart, 'beauty' => $beauty, 'price' => $price, 'level' => $level];
  }
  public function getPlayStats($id){
    $exp = round($id ** 1.6);
    $heart = round($id ** 1.75);
    $beauty = round(
      ($id + ($id <= 5 ? 1.1 : ($id <= 10 ? 1.5 : ($id <= 15 ? 2 : 2.5))) ) **
      1.9
    );
    $price = round(
      (($id-1) * ($id <= 10 ? 11 : ($id <= 15 ? 13 : 16))) ** 
      ($id <= 5 ? 1.25 : ($id <= 10 ? 1.35 : ($id <= 15 ? 1.45 : 1.55)))
    );
    $level = floor($id ** 1.342);
    return ['exp' => $exp, 'heart' => $heart, 'beauty' => $beauty, 'price' => $price, 'level' => $level];
  }

  public function getAssi($type, $lvl){
    $beauty = round($lvl * 1.2);
    $price = round(
      (($lvl+1) * ($lvl <= 10 ? 16 : ($lvl <= 15 ? 18 : 20))) ** 
      ($lvl <= 5 ? 1.15 : ($lvl <= 10 ? 1.25 : ($lvl <= 15 ? 1.35 : 1.45)))
    );
    return ['level' => $lvl, 'beauty' => $beauty, 'price' => $price];
  }

  public function auth() {
    $token = $_COOKIE['token'] ?? false;
    $id = $_COOKIE['id'] ?? false;
    if($id == false || $token == false) return false;
    $stmtUser = $this->db->prepare("SELECT * FROM users WHERE `id` = :id AND `token` = :token LIMIT 1");
    $stmtUser->execute([':id' => $id, ':token' => $token]);
    $user = $stmtUser->fetch(PDO::FETCH_ASSOC);
    if ($user) {
      $user['exp_max'] = $this->getMaxExp($user);
      $user['exp_p'] = $this->getExpP($user);
      $user['beauty'] = $this->getBeauty($user);
      $user['days'] = floor((time() - $user['reg_time']) / 86400);
    } elseif (!$user) {
      setCookie('token', "", time() - 100);
      setCookie('id', "", time() - 100);
      return false;
    }
    $this->user = $user;
  }
  public function login($name, $pass) {
    $name = trim($name);
    $pass = trim($pass);
    $stmtUser = $this->db->prepare("SELECT * FROM users WHERE `name` = :name AND `password` = :pass LIMIT 1");
    $stmtUser->execute([':name' => $name, ':pass' => $pass]);
    $user = $stmtUser->fetch(PDO::FETCH_ASSOC);
    if ($user) {
      setCookie('token', $user['token'], time() + 86400 * 365, '/');
      setCookie('id', $user['id'], time() + 86400 * 365, '/');
      header('location: /home');
    } else return "Проверьте данные";
  }

  public function setSql() {
    $this->db->query("CREATE TABLE IF NOT EXISTS users(
      `id`           INTEGER PRIMARY KEY AUTOINCREMENT,
      `token`        TEXT NOT NULL,
      `name`         TEXT NOT NULL,
      `password`     TEXT NOT NULL,
      `email`        TEXT DEFAULT NULL,
      `role`         INTEGER DEFAULT 0,
      `coin`         INTEGER DEFAULT 0,
      `heart`        INTEGER DEFAULT 0,
      `pet`          INTEGER DEFAULT NULL,

      `level`        INTEGER DEFAULT 1,
      `exp`          INTEGER DEFAULT 0,

      `travel_time`    INTEGER DEFAULT 0,
      `club_time`    INTEGER DEFAULT 0,
      `reg_time`     INTEGER DEFAULT 0,
      `online_time`  INTEGER DEFAULT 0,
      `premium_time` INTEGER DEFAULT 0,
      `ban_time`     INTEGER DEFAULT 0,

      `acts_time`    TEXT DEFAULT NULL,
      `acts`         TEXT DEFAULT NULL,
      `train`        TEXT DEFAULT NULL,
      `pets`         TEXT DEFAULT NULL,
      `bio`          TEXT DEFAULT NULL,
      `shop`         TEXT DEFAULT NULL,
      `boosters`     TEXT DEFAULT NULL,
      `settings`     TEXT DEFAULT NULL
    );");
  }
  
  // add, set, get
  public function add($id, $what, $value) {
    $allowed = ['coin', 'heart', 'level', 'exp', 'premium_time'];
    if (!in_array($what, $allowed)) return 'Недопустимое имя';
    $sql = "UPDATE `users` SET `$what` = :value WHERE `id` = :id";
    $stmt = $this->db->prepare($sql);
    $user = $this->getUser($id, null, false, true);
    $old = $user[$what];
    if($old == null || $old == '') $old = 0;
    $new = (int) $old + (int) $value;
    $stmt->bindParam(':value', $new);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $this->user[$what] = $new;
  }
  public function set($id, $what, $value) {
    $allowed = ['name', 'password', 'email', 'role', 'coin', 'heart', 'level', 'exp', 'travel_time', 'club_time', 'premium_time', 'online_time', 'ban_time', 'pet'];
    if (!in_array($what, $allowed)) return 'Недопустимое имя';
    $sql = "UPDATE `users` SET `$what` = :value WHERE `id` = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':value', $value);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $this->user[$what] = $value;
  }
  // add, set, get
  
  // addG, setG, getG
  public function addG($user, $g, $what, $value){
    $allowed = ['shop', 'acts', 'train'];
    if (!in_array($g, $allowed)) return 'Недопустимое имя';
    $settingsJson = $user[$g];
    $settings = $settingsJson ? json_decode($settingsJson, true) : [];
    $old = isset($settings[$what]) ? $settings[$what] : 0;
    $new = $old + $value;
    $settings[$what] = $new;
    $newSettingsJson = json_encode($settings);
    $update = $this->db->prepare("UPDATE users SET $g = :new WHERE id = :id");
    $update->execute([
      ':new' => $newSettingsJson,
      ':id' => $user['id']
    ]);
    $this->user[$g] = $newSettingsJson;
  }
  public function setG($user, $g, $what, $value){
    $allowed = ['acts_time', 'acts', 'train', 'pets', 'bio', 'shop', 'boosters', 'settings'];
    if (!in_array($g, $allowed)) return 'Недопустимое имя';
    $settingsJson = $user[$g];
    $settings = $settingsJson ? json_decode($settingsJson, true) : [];
    $settings[$what] = $value;
    $newSettingsJson = json_encode($settings);
    $update = $this->db->prepare("UPDATE users SET $g = :new WHERE id = :id");
    $update->execute([
      ':new' => $newSettingsJson,
      ':id' => $user['id']
    ]);
    $this->user[$g] = $newSettingsJson;
  }
  public function getG($user, $g, $what){
    $allowed = ['acts_time', 'acts', 'train', 'pets', 'bio', 'shop', 'boosters', 'settings'];
    if (!in_array($g, $allowed)) return 'Недопустимое имя';
    if (empty($user[$g])) return false;
    $settings = json_decode($user[$g], true);
    if (json_last_error() !== JSON_ERROR_NONE) return false;
    return $settings[$what] ?? false;
  }
  public function getAllG($user, $g){
    if (empty($user[$g])) return false;
    $settings = json_decode($user[$g], true);
    if (json_last_error() !== JSON_ERROR_NONE) return false;
    return $settings ?? false;
  }
  // addG, setG, getG
  


  public function getOnlineCount() {
    $time_limit = time() - 300;
    $stmt = $this->db->prepare("SELECT COUNT(id) FROM users WHERE `online_time` > :time_limit");
    $stmt->execute([':time_limit' => $time_limit]);
    return $stmt->fetchColumn();
  }
  public function getOnlineUsers($page = 1, $limit = 15) {
    $page = max(1, (int)$page);
    $time_limit = time() - 300;
     $offset = ($page - 1) * $limit;
     $sql = "SELECT id, name, pet, online_time, level
             FROM users
             WHERE `online_time` > :time_limit
             ORDER BY `level` DESC
             LIMIT :limit OFFSET :offset";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':time_limit', $time_limit, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  
  public function getUser($id = null, $name = null, $all = true, $add = false) {
    if($id === 0){
      $user = ['id' => 0, 'name' => 'Система','pet' => 1,
        'online_time' => time()+10, 'level' => 0, 'premium_time' => time()+10, 'beauty' => 8, 'days' => 0];
      if($all == true){
        $user['shop'] = '{"food":1,"play":1,
                          "c1":'.mt_rand(1, 18).',"c2":'.mt_rand(1, 18).',
                          "c3":'.mt_rand(1, 18).',"c4":'.mt_rand(1, 18).',
                          "c5":'.mt_rand(1, 18).',"c6":'.mt_rand(1, 18).'}';
      }
      return $user;
    }
    $select = $all ? '*' : 'id, name, pet, online_time';
    if($add == true) $select = 'coin, heart, level, exp';
    if ($id !== null) {
      $sql = "SELECT $select FROM `users` WHERE `id` = :id LIMIT 1";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    } else {
      $sql = "SELECT $select FROM `users` WHERE `name` = :name LIMIT 1";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    }
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user != false && $all){
      $user['beauty'] = $this->getBeauty($user);
      $user['days'] = floor((time() - $user['reg_time']) / 86400);
      if($user['pet'] == null || $user['pet'] == '') $user['pet'] = 1;
    }
    return $user ?: false;
  }


  public function saveG($id, array $data) {
    $allowed = ['bio', 'acts_time', 'acts', 'train', 'shop'];
    $fields = [];
    $params = [':id' => $id];
    foreach ($allowed as $field) {
      if (isset($data[$field])) {
        $fields[] = "`$field` = :$field";
        $params[":$field"] = $data[$field];
      }
    }
    if (empty($fields)) {
      return false;
    }
    $sql = "UPDATE `users` SET " . implode(', ', $fields) . " WHERE `id` = :id";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute($params);
  }

  public function register() {
    $token = $this->newToken();
    $stmtReg = $this->db->prepare("INSERT INTO users(`token`, `name`, `password`, `reg_time`, `shop`) VALUEs (:token, :name, :pass, :time, :shop)");
    $shop = '{"food":1,"play":1,"cup":0,"medal":0}';
    $stmtReg->execute([':token' => $token, ':name' => "U".time(), ':pass' => 'time', ':time' => time(), ':shop' => $shop]);
    $lastId = $this->db->lastInsertId();
    return [$token, $lastId];
  }
  function newToken($length = 32) {
    return bin2hex(random_bytes($length));
  }

  public function formatDate(int $timestamp): string {
    $months = [
      1 => 'Янв.', 'Февр.', 'Мар.', 'Апр.', 'Мая', 'Июн.',
      'Июл.', 'Авг.', 'Сент.', 'Окт.', 'Нояб.', 'Дек.'
    ];
    $hours = date('H', $timestamp);
    $minutes = date('i', $timestamp);
    $currentDM = date('j n Y');
    $dm = date('j n Y', $timestamp);
    $day = (int) date('j', $timestamp);
    $month = (int) date('n', $timestamp);
    $currentYear = date('Y');
    $year = date('Y', $timestamp);
    $timeStr = "$hours:$minutes ".($currentDM != $dm ? $day." ".$months[$month] : '');
    return $year === $currentYear ? $timeStr : "$timeStr $year";
  }

  public function formatDateY($dateStr, $y = true) {
    $months = [
      1 => 'января', 'февраля', 'марта', 'апреля',
      'мая', 'июня', 'июля', 'августа',
      'сентября', 'октября', 'ноября', 'декабря'
    ];
    $parts = explode('.', $dateStr);
    if (count($parts) != 3) return "Неверный формат даты";
    $day = (int)$parts[0];
    $month = (int)$parts[1];
    $year = (int)$parts[2];
    $currentYear = (int)date('Y');
    $age = $currentYear - $year;
    if ($age >= 0) $ageStr = " ($age " . $this->numWord($age, ['год', 'года', 'лет']) . ")";
    else $ageStr = "";
    return $day . ' ' . $months[$month] .(!$y ? ' ' . $year . $ageStr : '');
  }
  public function numWord($value, $words) {
    $value = abs($value) % 100;
    $num = $value % 10;
    if ($value > 10 && $value < 20) return $words[2];
    if ($num > 1 && $num < 5) return $words[1];
    if ($num == 1) return $words[0];
    return $words[2];
  }

  public function BB($var) {
    $search = array(
      '/\[br\]/is',
    );
    $replace = array(
      '</br>',
     );
    $var = preg_replace($search, $replace, $var);

    $var = preg_replace_callback(
        '/@id(\d+)/',
        function($matches) {
            $id = $matches[1];
            $user = $this->getUser((int) $id, null, true);
            if(!$user) return '@id'.$id;
            $dop = $this->user ? ($user['id'] == $this->user['id'] ? ' class="pet_msg_violet"' : '') : '';
            $str = '<a href="/profile?id='.$user['id'].'"'.$dop.'>'.$user['name'].'</a>';
            return $str;
        },
        $var
    );
    return $var;
  }
  
  public function smiles($text){
    $map = [':h:' => 32, ':nope:' => 33, ':hb:' => 36,
      ':clap:' => 41, ':clover:' => 54, ':wait:' => 45,
      ':pump:' => 56, ':cup:' => 57, ':yy:' => 75, ':star:' => 79,
      ':)' => 1, ':(' => 2, ';)' => 3, ':d' => 4,
      ':-)' => 9, ':p' => 10, ':-o' => 11, ':-*' => 12,
      ':-0' => 13, ':mad:' => 14, ':good:' => 15, '8)' => 16,
      ':-~' => 17, ':shy:' => 18, ':evil:' => 19, ':cry:' => 20,
      'xd' => 21, ':hmm:' => 22, ':huh:' => 23, ':rofl:' => 24,
      ':angel:' => 25, ':glasses:' => 26, ':ok:' => 27, ':z:' => 28,
      ':emm:' => 29, ':idea:' => 30, ':l:' => 8, ':v:' => 76,
      ':green:' => 31, ':skull:' => 59, ':?:' => 7, ':]' => 5, ':|' => 6,
    ];
    $pattern = '/(?:' . implode('|', array_map(
      fn($k) => preg_quote($k, '/'),
      array_keys($map)
    )) . ')/i';
    return preg_replace_callback($pattern, function ($m) use ($map) {
      $key = strtolower($m[0]);
      $id  = $map[$key] ?? null;
      if ($id === null) return $m[0];
        $alt = htmlspecialchars($m[0], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        return '<img class="smile" src="/view/image/smiles/' . $id . '.gif" alt="' . $alt . '">';
    }, $text);
  }

  public function lowBB($var) {
    $search = array(
      '/\[br\]/is',
    );
    $replace = array(
      ' ',
    );
    //$var = strip_tags($var);
    $var = preg_replace($search, $replace, $var);
    return $var;
  }

  public function formatNumber($num){
    if($num >= 1000000){
      return (floor($num / 100000) / 10.0).'м';
    }
    else if($num >= 1000){
      return (floor($num / 100) / 10.0).'к';
    }
    else return $num;
  }

}