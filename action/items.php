<?php
  $chest = new core\Chest();

  $g_shop = $core->getAllG($core->user, 'shop');

  include DIR . '/icl/sets.php';

  $c_id = isSet($_GET['id']) ? (int) $_GET['id'] : 1;
  $c_id = $c_id > 0 ? $c_id : 1;
  if($sets_list[$c_id] == null) header('Location: /');
  $c_ = isSet($_GET['category']) ? $_GET['category'] : header('Location: /');
  $name = '..';
  if($c_ == 'cloth'){
    $name = $sets_list[$c_id]['name'];
    function buy($core, $chest, $g_shop, $id, $item, $list){
      $c = $list[$id];
      if($core->user['level'] < $c['level']) return 'А уровень кто будет подымать?';
      if($core->user['coin'] >= $c['price']){
        $core->add($core->user['id'], 'coin', -$c['price']);
        $pet_item = $g_shop['c'.$item] ?? 0;
        if($pet_item > 0){
          $chest->add($core->user['id'], 'c'.$item, $pet_item);
        }
        $core->setG($core->user, 'shop', 'c'.$item, $id);
        return false;
      }
      return $c['price'] - $core->user['coin'];
    }
    if(isSet($_GET['buy'])){
      $what = $_GET['buy'];
      $error = false;
      switch($what){
        case 1:
          $error = buy($core,  $chest, $g_shop, $c_id, 1, $sets_list);
          break;
        case 2:
          $error = buy($core, $chest, $g_shop, $c_id, 2, $sets_list);
          break;
        case 3:
          $error = buy($core, $chest, $g_shop, $c_id, 3, $sets_list);
          break;
        case 4:
          $error = buy($core, $chest, $g_shop, $c_id, 4, $sets_list);
          break;
        case 5:
          $error = buy($core, $chest, $g_shop, $c_id, 5, $sets_list);
          break;
        case 6:
          $error = buy($core, $chest, $g_shop, $c_id, 6, $sets_list);
          break;
        default:
          break;
      }
      if($error == false) header('Location: /items?category='.$c_.'&id='.$c_id);
    }
  
  }else if($c_ == 'food'){
    $name = 'Магазин / Еда';
    include DIR . '/icl/food.php';
    $u_food = $core->getG($core->user, 'shop', 'food');
    $my_food = $food_list[$u_food];
    $my_food_s = $core->getFoodStats($u_food);
    if(isSet($food_list[$u_food+1])){
      $new_food = $food_list[$u_food+1];
      $new_food_s = $core->getFoodStats($u_food+1);
      function buy($core, $id, $u_food){
        $item = $core->getFoodStats($id);
        if($core->user['level'] < $item['level']) return 'А уровень кто будет подымать?';
        if($u_food >= $id || $id > 31) return 'Ваша вещь лучше';
        if($core->user['coin'] >= $item['price']){
          $core->add($core->user['id'], 'coin', -$item['price']);
          $core->setG($core->user, 'shop', 'food', $id);
          return false;
        }
        return $item['price'] - $core->user['coin'];
      }
      if(isSet($_GET['buy'])){
        $what = $_GET['buy'];
        $error = false;
        $error = buy($core, $what, $u_food); 
        if($error == false) header('Location: /items?category='.$c_);
      }
    }
  }

  else if($c_ == 'play'){
    $name = 'Магазин / Игры';
    include DIR . '/icl/play.php';
    $u_play = $core->getG($core->user, 'shop', 'play');
    $my_play = $play_list[$u_play];
    $my_play_s = $core->getPlayStats($u_play);
    if(isSet($play_list[$u_play+1])){
      $new_play = $play_list[$u_play+1];
      $new_play_s = $core->getPlayStats($u_play+1);
      function buy($core, $id, $u_play){
        $item = $core->getPlayStats($id);
        if($core->user['level'] < $item['level']) return 'А уровень кто будет подымать?';
        if($u_play >= $id || $id > 31) return 'Ваша вещь лучше';
        if($core->user['coin'] >= $item['price']){
          $core->add($core->user['id'], 'coin', -$item['price']);
          $core->setG($core->user, 'shop', 'play', $id);
          return false;
        }
        return $item['price'] - $core->user['coin'];
      }
      if(isSet($_GET['buy'])){
        $what = $_GET['buy'];
        $error = false;
        $error = buy($core, $what, $u_play); 
        if($error == false) header('Location: /items?category='.$c_);
      }
    }
  }

  else if($c_ == 'effect'){
    $name = 'Магазин / Бонусы';
    if(isSet($_GET['buy'])){
      $what = $_GET['buy'];
      $error = false;
      if($core->user['coin'] >= 50){
        $time = $core->user['premium_time'] == 0 || $core->user['premium_time'] < time() ? time() : $core->user['premium_time'];
        $core->set($core->user['id'], 'premium_time', $time + (60*60*24));
        $core->add($core->user['id'], 'coin', -50);
        header('Location: /items?category='.$c_);
      }else $error = 50 - $core->user['coin'].' монет';
    }
  }