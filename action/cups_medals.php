<?php
  $type = $_GET['type'] ?? 'cups';
  switch ($type) {
    case 'cups':
      $type = 'cups';
      break;
    default:
      $type = 'medals';
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

  if($type == 'cups'){
    include DIR . '/icl/cups.php';
    $my_ = $core->getG($user, 'shop', 'cup');
    $list = $cup_list;
  }
  
  else if($type == 'medals'){
    include DIR . '/icl/medals.php';
    $my_ = $core->getG($user, 'shop', 'medal');
    $list = $medal_list;
  }