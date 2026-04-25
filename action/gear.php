<?php
  include DIR . '/icl/sets.php';
  $chest = new core\Chest();

  $my_id = $core->user['id'];
  $user = isSet($_GET['id']) ? (int) $_GET['id'] : $my_id;
  $user = $my_id == $user ? $core->user : $core->getUser((int) $_GET['id']);
  if(!$user) {
    header('Location: /');
    die;
  }
  $g_shop = $core->getAllG($user, 'shop');
  $_my = $my_id == $user['id'];
  if($_my){
    $all_chest = $chest->getAllC($core->user['id']);
    $id = $core->user['id'];
    if(isSet($_GET['remove'])){
      $what = 'c'.((int)$_GET['remove']);
      $pet_item = $g_shop[$what] ?? 0;
      if($pet_item > 0){
        $chest->add($id, $what, $pet_item);
        $core->setG($core->user, 'shop', $what, 0);
      }
      header('Location: /gear');
    }
  }

