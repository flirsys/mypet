<?php
  $my_id = $core->user['id'];
  $user = isSet($_GET['id']) ? (int) $_GET['id'] : $my_id;
  $user = $my_id == $user ? $core->user : $core->getUser((int) $_GET['id']);
  if(!$user) {
    header('Location: /');
    die;
  }
  $_my = $my_id == $user['id'];

  $g_shop = $core->getAllG($user, 'shop');

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
  $beauty = $all_level * 10;
  $stars = max(0, floor(($all_level / 120) * 10));

  $list = [
    'Миска', 'Подушка', 'Корзинка', 'Когтеточка', 'Коврик', 'Картина', 'Телевизор', 'Кресло', 'Диван', 'Холодильник', 'Зеркало', 'Тренажер'
  ];

  $error = false;
  if($_my){
    $up = $_GET['up'] ?? false;
    if($up != false){
      $up = min(max(1, (int) $up), 12);
      $h = ['lvl' => $g_shop['h'.$up] ?? 0];
      $price = round((($h['lvl'] + 1) * 16) ** 1.5);
      if($h['lvl'] < 10){
        if($core->user['coin'] < $price){
          $error = 'Не хватает ещё '.($price - $core->user['coin']).' монет';
        }
        if($error == false){
          $core->addG($core->user, 'shop', 'h'.$up, 1);
          $core->add($core->user['id'], 'coin', -$price);
          header('Location: /house_list');
        }
      }
    }
  }