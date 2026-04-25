<?php
  include DIR . '/icl/food.php';
  include DIR . '/icl/play.php';
  $type = $_GET['type'] ?? 'food';
  switch ($type) {
    case 'play':
      $type = 'play';
      break;
    default:
      $type = 'food';
      break;
  }

  $my_id = $core->user['id'];
  $user = isSet($_GET['id']) ? (int) $_GET['id'] : $my_id;
  $user = $my_id == $user ? $core->user : $core->getUser((int) $_GET['id']);
  if(!$user) {
    header('Location: /');
    die;
  }
  if($my_id == $user['id']){
    $dop_href = '?';
  }else{
    $dop_href = '?id='.$user['id'].'&';
  }


  if($type == 'food'){
    $my_ = $core->getG($user, 'shop', 'food');
    $list = $food_list;
  }
  
  else if($type == 'play'){
    $my_ = $core->getG($user, 'shop', 'play');
    $list = $play_list;
  }