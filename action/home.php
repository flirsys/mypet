<?php
  $id = $core->user['id'];
  //$core->add($id, 'coin', 999999999);

  include DIR . '/icl/medals.php';
  $boost_exp = 0;
  $boost_heart = 0;
  $my_medal = $core->getG($core->user, 'shop', 'medal');
  if($my_medal > 0){
    for($i=1;$i<=$my_medal;$i++){
      $boost_heart += $medal_list[$i]['heart'];
      $boost_exp += $medal_list[$i]['exp'];
    }
  }

  $g_acts = $core->getAllG($core->user, 'acts');
  $g_time = $core->getAllG($core->user, 'acts_time');

  //              (all_acts)
  //0 - acts, 1 - a_acts,    2 - time, 3 - text_time
  $food = [];
  $food[0] = $g_acts['food'] ?? 0;
  $food[1] = $g_acts['a_food'] ?? 0;
  $food[2] = $g_time['food'] ?? 0;

  $play = [];
  $play[0] = $g_acts['play'] ?? 0;
  $play[1] = $g_acts['a_play'] ?? 0;
  $play[2] = $g_time['play'] ?? 0;

  $cup = [];
  $cup[0] = $g_acts['cup'] ?? 0;
  $cup[1] = $g_acts['a_cup'] ?? 0;
  $cup[2] = $g_time['cup'] ?? 0;

  include DIR . '/icl/food.php';
  $u_food = $core->getG($core->user, 'shop', 'food');
  $my_food = $food_list[$u_food];
  include DIR . '/icl/play.php';
  $u_play = $core->getG($core->user, 'shop', 'play');
  $my_play = $play_list[$u_play];
  include DIR . '/icl/cups.php';
  $my_cup = $core->getG($core->user, 'shop', 'cup');
  $new_cup = $cup_list[min(33, $my_cup + 1)];

  $show = new core\Show();
  $me_show = $show->getUser($id);

  //reset timers
  function resetTime(&$g) {
    $g[0] = 0;
    if ($g[1] > 3){
      $g[3] = 0;
      $g[1] = 0;
    }
    $g[2] = 0;
  }
  if ($food[2] != 0 && $food[2] <= time()) resetTime($food);
  if ($play[2] != 0 && $play[2] <= time()) resetTime($play);
  if ($cup[2] != 0 && $cup[2] <= time())   resetTime($cup);
  //reset timers

  //gets
  function doAct($core, $act, &$g){
    $core->add($core->user['id'], 'exp', $act[1]);
    $core->add($core->user['id'], 'heart', $act[0]);
    $g[0]++;
    if($g[0] >= 5){
      $time = $g[1] >= 3 ? time() + (60 * 60) : time() + (60 * 1.5);
      $g[2] = $time;
      $g[0] = 0;
      $g[1]++;
    }
  }

  if(isSet($_GET['food']) || isSet($_GET['play'])){
    $g_shop = $core->getAllG($core->user, 'shop');
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
    $all_level = $h1['lvl'] + $h2['lvl'] + $h3['lvl'] +
                $h4['lvl'] + $h5['lvl'] + $h6['lvl'] +
                $h7['lvl'] + $h8['lvl'] + $h9['lvl'] +
                $h10['lvl'] + $h11['lvl'] + $h12['lvl'];
    $stars = max(0, floor(($all_level / 120) * 10));
    $rating = $stars / 2;
    $bonus_house = floor($rating)*5;
  }
  if (isset($_GET['food'])) {
    if ($food[2] <= time()) {
      $stat = $core->getFoodStats($u_food);
      $act_exp = $stat['exp'] + round($stat['exp'] * ($boost_exp / 100));
      $act_exp += round($act_exp * ($bonus_house / 100));
      $act_hrt = $stat['heart'] + round($stat['heart'] * ($boost_heart / 100));
      $p_t = $core->user['premium_time'];
      if($p_t != 0 && $p_t > time()){
        $act_exp += round($act_exp * (80 / 100));
        $act_hrt += round($act_hrt * (50 / 100));
      }
      $act = [$act_hrt, $act_exp];
      doAct($core, $act, $food);
    }
  } elseif (isset($_GET['play'])) {
    if ($play[2] <= time()) {
      $stat = $core->getPlayStats($u_play);
      $act_exp = $stat['exp'] + round($stat['exp'] * ($boost_exp / 100));
      $act_exp += round($act_exp * ($bonus_house / 100));
      $act_hrt = $stat['heart'] + round($stat['heart'] * ($boost_heart / 100));
      $p_t = $core->user['premium_time'];
      if($p_t != 0 && $p_t > time()){
        $act_exp += round($act_exp * (80 / 100));
        $act_hrt += round($act_hrt * (50 / 100));
      }
      $act = [$act_hrt, $act_exp];
      doAct($core, $act, $play);
    }
  }
  if (isset($_GET['food']) || isset($_GET['play']))
    $core->user['exp_p'] = $core->getExpP($core->user);
  //gets

  //percents
  $act_food_p = floor(($food[0] / 5) * 100);
  $act_play_p = floor(($play[0] / 5) * 100);
  //percents

  //level up
  if ($core->user['exp'] >= $core->user['exp_max']) {
    $core->add($id, 'exp', -$core->user['exp_max']);
    $core->user['exp_max'] = $core->getMaxExp($core->user);
    $core->add($id, 'level', 1);
    $core->user['exp_p'] = $core->getExpP($core->user);
    $new_level[0] = $core->user['level'] * 5;
    $core->add($id, 'coin', $new_level[0]);
  }
  //level up

  //timers
  function fTime($time) {
    $diff = $time - time();
    if ($diff > 0) {
      $time_min = floor($diff / 60);
      $time_sec = $diff % 60;
      $text = 'Отдых ';
      if ($time_min > 0) $text .= $time_min . 'м<br>';
      if ($time_sec > 0) $text .= $time_sec . 'с';
      return [$text, $diff];                                // <- 0 - TEXT, 1 - diff (!time - time)
    }
    return false;
  }
  if ($food[2] != 0) $food[3] = fTime($food[2]);
  if ($play[2] != 0) $play[3] = fTime($play[2]);
  if ($cup[2] != 0) $cup[3] = fTime($cup[2]);

  if (isset($food[3][1]) && isset($play[3][1]) && (isset($cup[3][1]) || $my_cup >= 33)) {
    $diff_max = isSet($cup[3][1]) ? max([$food[3][1], $play[3][1], $cup[3][1]]) : max([$food[3][1], $play[3][1]]);
    $p_sleep = round(max(1, ($diff_max / 150) * ($core->user['level'] * 0.2)));
    $p_t = $core->user['premium_time'];
    if($p_t != 0 && $p_t > time()){
      $p_sleep -= round($p_sleep * (15 / 100));
    }
    $sleep = ($diff_max < 60 * 5) ? ['heart', 5] : ['coin', $p_sleep];
    $max_time_min = floor($diff_max / 60);
    $max_time_sec = $diff_max % 60;
    $text_m = '';
    if ($max_time_min > 0) $text_m .= $max_time_min . 'м ';
    if ($max_time_sec > 0) $text_m .= $max_time_sec . 'с';
  }
  //timers

  //wakeup
  if (isset($_GET['wakeup']) && isset($sleep)) {
    $skip_sleep = false;
    if ($sleep[0] == 'heart') {
      if ($core->user['heart'] >= $sleep[1]) {
        $core->add($id, 'heart', -$sleep[1]);
        $skip_sleep = true;
      } else $error_sleep = $sleep[1] - $core->user['heart'];
    } elseif ($sleep[0] == 'coin') {
      if ($core->user['coin'] >= $sleep[1]) {
        $core->add($id, 'coin', -$sleep[1]);
        $skip_sleep = true;
        $food[1] = 0;
        $play[1] = 0;
        $cup[1] = 0;
      } else $error_sleep = $sleep[1] - $core->user['coin'];
    }
    if ($skip_sleep) {
      if($core->user['travel_time'] > time()){
        $core->set($core->user['id'], 'travel_time', $core->user['travel_time'] - ($food[2] - time()));
      }
      $food[2] = 1;
      $play[2] = 1;
      $cup[2] = 1;
      header('Location: /');
    }
  }
  //wakeup


  $save_acts = json_encode(['food' => $food[0], 'play' => $play[0], 'cup' => $cup[0],
                                   'a_food' => $food[1], 'a_play' => $play[1], 'a_cup' => $cup[1]]);
  $save_acts_time = json_encode(['food' => $food[2], 'play' => $play[2], 'cup' => $cup[2]]);
  if($save_acts != $g_acts || $g_time != $save_acts_time) $core->saveG($core->user['id'], ['acts' => $save_acts,
                                            'acts_time' => $save_acts_time]);