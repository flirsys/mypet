<?php
  $g_jew = $core->getAllG($core->user, 'shop');

  $j1 = ['lvl' => $g_jew['j1'] ?? 0,'c' => 0,0 => 0,1 => 0,2 => 0,3 => 0, 'parts' => $g_jew['j1p'] ?? 0];
  $j1['c'] = min(max(1, $j1['lvl']), 4);
  for ($i = 1; $i <= $j1['lvl']; $i++) {
    $j1[($i - 1) % 4]++;
  }

  $j2 = ['lvl' => $g_jew['j2'] ?? 0,'c' => 0,0 => 0,1 => 0,2 => 0,3 => 0, 'parts' => $g_jew['j2p'] ?? 0];
  $j2['c'] = min(max(1, $j2['lvl']), 4);
  for ($i = 1; $i <= $j2['lvl']; $i++) {
    $j2[($i - 1) % 4]++;
  }

  $j3 = ['lvl' => $g_jew['j3'] ?? 0,'c' => 0,0 => 0,1 => 0,2 => 0,3 => 0, 'parts' => $g_jew['j3p'] ?? 0];
  $j3['c'] = min(max(1, $j3['lvl']), 4);
  for ($i = 1; $i <= $j3['lvl']; $i++) {
    $j3[($i - 1) % 4]++;
  }

  $j4 = ['lvl' => $g_jew['j4'] ?? 0,'c' => 0,0 => 0,1 => 0,2 => 0,3 => 0, 'parts' => $g_jew['j4p'] ?? 0];
  $j4['c'] = min(max(1, $j4['lvl']), 4);
  for ($i = 1; $i <= $j4['lvl']; $i++) {
    $j4[($i - 1) % 4]++;
  }

  $j5 = ['lvl' => $g_jew['j5'] ?? 0,'c' => 0,0 => 0,1 => 0,2 => 0,3 => 0, 'parts' => $g_jew['j5p'] ?? 0];
  $j5['c'] = min(max(1, $j5['lvl']), 4);
  for ($i = 1; $i <= $j5['lvl']; $i++) {
    $j5[($i - 1) % 4]++;
  }


  $j6 = ['lvl' => $g_jew['j6'] ?? 0,'c' => 0,0 => 0,1 => 0,2 => 0,3 => 0, 'parts' => $g_jew['j6p'] ?? 0];
  $j6['c'] = min(max(1, $j6['lvl']), 4);
  for ($i = 1; $i <= $j6['lvl']; $i++) {
    $j6[$i % 4]++;
  }

  $need_parts_1 = $j1['parts'] >= 5 ? true : false;
  $need_parts_2 = $j2['parts'] >= 5 ? true : false;
  $need_parts_3 = $j3['parts'] >= 5 ? true : false;
  $need_parts_4 = $j4['parts'] >= 5 ? true : false;
  $need_parts_5 = $j5['parts'] >= 5 ? true : false;
  $need_parts_6 = $j6['parts'] >= 5 ? true : false;
  $need_parts = $need_parts_1 ? true :
                  ($need_parts_2 ? true :
                    ($need_parts_3 ? true :
                      ($need_parts_4 ? true :
                        ($need_parts_5 ? true :
                          ($need_parts_6 ? true : false)))));

  $add = $_GET['add'] ?? false;
  $error = false;
  if($add != false){
    $add = max(1, min((int)$add, 6));
    $price = floor((($g_jew['j'.$add] ?? 0) + 1) * 10 ** 1.75);
    if(($g_jew['j'.$add.'p'] ?? 0) < 5){
      $error  = 'Не хватает ещё '.(5 - ($g_jew['j'.$add.'p'] ?? 0)).' камней';
    }
    $confirm = isSet($_GET['confirm']) ?? false;
    if($confirm && $error == false){
      if($core->user['coin'] < $price){
        $error = 'Не хватает ещё '.($price - $core->user['coin']).' монет';
      }
      if($error == false){
        $core->addG($core->user, 'shop', 'j'.$add, 1);
        $core->addG($core->user, 'shop', 'j'.$add.'p', -5);
        $core->add($core->user['id'], 'coin', -$price);
        header('Location: /jewels');
      }
    }
  }