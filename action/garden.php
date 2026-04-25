<?php
  $g_jew = $core->getAllG($core->user, 'shop');

  $f1 = ['lvl' => $g_jew['f1'] ?? 0,'c' => 0,0 => 0,1 => 0,2 => 0,3 => 0, 'parts' => $g_jew['f1p'] ?? 0];
  $f1['c'] = min(max(0, $f1['lvl']), 4);
  for ($i = 1; $i <= $f1['lvl']; $i++) {
    $f1[($i - 1) % 4]++;
  }

  $f2 = ['lvl' => $g_jew['f2'] ?? 0,'c' => 0,0 => 0,1 => 0,2 => 0,3 => 0, 'parts' => $g_jew['f2p'] ?? 0];
  $f2['c'] = min(max(0, $f2['lvl']), 3);
  for ($i = 1; $i <= $f2['lvl']; $i++) {
    $f2[($i - 1) % 4]++;
  }

  $f3 = ['lvl' => $g_jew['f3'] ?? 0,'c' => 0,0 => 0,1 => 0,2 => 0,3 => 0, 'parts' => $g_jew['f3p'] ?? 0];
  $f3['c'] = min(max(0, $f3['lvl']), 4);
  for ($i = 1; $i <= $f3['lvl']; $i++) {
    $f3[($i - 1) % 4]++;
  }

  $f4 = ['lvl' => $g_jew['f4'] ?? 0,'c' => 0,0 => 0,1 => 0,2 => 0,3 => 0, 'parts' => $g_jew['f4p'] ?? 0];
  $f4['c'] = min(max(0, $f4['lvl']), 4);
  for ($i = 1; $i <= $f4['lvl']; $i++) {
    $f4[($i - 1) % 4]++;
  }

  $f5 = ['lvl' => $g_jew['f5'] ?? 0,'c' => 0,0 => 0,1 => 0,2 => 0,3 => 0, 'parts' => $g_jew['f5p'] ?? 0];
  $f5['c'] = min(max(0, $f5['lvl']), 4);
  for ($i = 1; $i <= $f5['lvl']; $i++) {
    $f5[($i - 1) % 4]++;
  }


  $f6 = ['lvl' => $g_jew['f6'] ?? 0,'c' => 0,0 => 0,1 => 0,2 => 0,3 => 0, 'parts' => $g_jew['f6p'] ?? 0];
  $f6['c'] = min(max(0, $f6['lvl']), 4);
  for ($i = 1; $i <= $f6['lvl']; $i++) {
    $f6[$i % 4]++;
  }

  $need_parts_1 = $f1['parts'] >= 5 ? true : false;
  $need_parts_2 = $f2['parts'] >= 5 ? true : false;
  $need_parts_3 = $f3['parts'] >= 5 ? true : false;
  $need_parts_4 = $f4['parts'] >= 5 ? true : false;
  $need_parts_5 = $f5['parts'] >= 5 ? true : false;
  $need_parts_6 = $f6['parts'] >= 5 ? true : false;
  $need_parts = $need_parts_1 ? true :
                  ($need_parts_2 ? true :
                    ($need_parts_3 ? true :
                      ($need_parts_4 ? true :
                        ($need_parts_5 ? true :
                          ($need_parts_6 ? true : false)))));

  $add = $_GET['add'] ?? false;
  $error = false;
  if($add != false){
    $add = min(max(1, (int) $add), 6);
    $price = floor((($g_jew['f'.$add] ?? 0) + 1) * 10 ** 1.75);
    if(($g_jew['f'.$add.'p'] ?? 0) < 5){
      $error  = 'Не хватает ещё '.(5 - ($g_jew['f'.$add.'p'] ?? 0)).' семян';
    }
    $confirm = isSet($_GET['confirm']) ?? false;
    if($confirm && $error == false){
      if($core->user['coin'] < $price){
        $error = 'Не хватает ещё '.($price - $core->user['coin']).' монет';
      }
      if($error == false){
        $core->addG($core->user, 'shop', 'f'.$add, 1);
        $core->addG($core->user, 'shop', 'f'.$add.'p', -5);
        $core->add($core->user['id'], 'coin', -$price);
        header('Location: /garden');
      }
    }
  }