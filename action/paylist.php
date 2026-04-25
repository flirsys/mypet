<?php
  $type = isSet($_GET['type']) ? $_GET['type'] : false;
  if($type == 'heart'){
    $name = 'Покупка сердечек';
    $type = 'heart';
    $back = 'paylist';
    $buy = $_GET['buy'] ?? false;
    if($buy != false){
      switch($buy){
        case 4:
          $buy = 500000;
          $price = 1000;
          break;
        case 3:
          $buy = 50000;
          $price = 100;
          break;
        case 2:
          $buy = 5000;
          $price = 10;
          break;
        case 1:
        default:
          $buy = 500;
          $price = 1;
          break;
      }
      if($core->user['coin'] >= $price){
        $core->add($core->user['id'], 'heart', $buy);
        $core->add($core->user['id'], 'coin', -$price);
        header('Location: /paylist?type=heart');
      } else $error = 'Вам не хватает '.($price - $core->user['coin']).' монет';
    }
  }
  else if($type == 'coin'){
    $show = new core\Show();
    $me_show = $show->getUser($core->user['id']);
    $name = 'Обменник';
    $type = 'coin';
    $back = 'paylist';
    $coins = ($me_show['final']+2) * ($me_show['type']+1);
    $rem_coins = $coins - $me_show['coin'];
    $price = $rem_coins * 500;
    $get = isSet($_GET['get']) ?? false;
    if($get){
      if($rem_coins > 0){
        if($core->user['heart'] >= $price){
          $show->set($core->user['id'], 'coin', $coins);
          $core->add($core->user['id'], 'coin', $rem_coins);
          $core->add($core->user['id'], 'heart', -$price);
          header('Location: /paylist?type=coin');
        } else $error = 'Вам не хватает '.($price - $core->user['heart']).' сердечек';
      }
    }
  }
  else {
    $name = 'Выберите';
    $type = false;
    $back = '';
  }