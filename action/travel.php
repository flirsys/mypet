<?php
  $win = false;
  $time = $core->user['travel_time'];

  $diff = $time - time();
  if ($diff < 0) $diff = 0;
  $hours   = floor($diff / 3600);
  $minutes = floor(($diff % 3600) / 60);
  $seconds = $diff % 60;
  $time_t = '';
  if ($hours > 0)   $time_t .= $hours . 'ч ';
  if ($minutes > 0) $time_t .= $minutes . 'м ';
  if ($seconds > 0) $time_t .= $seconds . 'с';

  if($core->user['travel_time'] != 0 && $time <= time()){
    $win = ['exp' => max(1, round(floor((mt_rand(1, 10) * $core->user['level']) / 2)*max(1,(($time-time())/3600))))];
    $core->add($core->user['id'], 'exp', $win['exp']);
    $core->set($core->user['id'], 'travel_time', 0);
  }
  
  $go = $_GET['go'] ?? false;
  if($go != false){
    $go = min(max(1, (int) $go), 4);
    if($time_t == ''){
      $core->set($core->user['id'], 'travel_time', time() + (60 * 60 * $go));
      header('Location: /travel');
    }
  }