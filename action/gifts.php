<?php
  $gifts = new core\Gifts();

  $my_id = $core->user['id'];
  $user = isSet($_GET['id']) ? (int) $_GET['id'] : $my_id;
  $user = $my_id == $user ? $core->user : $core->getUser((int) $_GET['id']);
  if(!$user) {
    header('Location: /');
    die;
  }
  $_my = $my_id == $user['id'];
  if($_my){
    $dop_href = '';
  }else{
    $dop_href = '?id='.$user['id'].'';
  }

  $all_gifts = $gifts->getTotalGift($user['id']);
  $maxpage = $gifts->getTotalGiftPages($user['id']);
  $page_num = isSet($_GET['page']) ? (int) $_GET['page'] : 1;
  $page_num = $page_num > 0 ? min($maxpage, $page_num) : 1;
  
  $list = $gifts->getGifts($user['id'], $page_num);