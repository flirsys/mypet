<?php
  include DIR.'/icl/medals.php';
  include DIR.'/icl/cups.php';
  include DIR.'/icl/sets.php';
  $gifts = new core\Gifts();
  $chest = new core\Chest();

  $my_id = $core->user['id'];
  $user = isSet($_GET['id']) ? (int) $_GET['id'] : $my_id;
  $user = $my_id == $user ? $core->user : $core->getUser((int) $_GET['id']);
  if(!$user) {
    header('Location: /');
    die;
  }
  $g_shop = $core->getAllG($user, 'shop');
  if($my_id == $user['id']){
    $dop_href = '?';
    $all_chest = $chest->getAllC($user['id']);
    $all_j = ($g_shop['j1'] ?? 0) + ($g_shop['j2'] ?? 0)+ ($g_shop['j3'] ?? 0) + ($g_shop['j4'] ?? 0) + ($g_shop['j5'] ?? 0) + ($g_shop['j6'] ?? 0);
    $all_f = ($g_shop['f1'] ?? 0) + ($g_shop['f2'] ?? 0)+ ($g_shop['f3'] ?? 0) + ($g_shop['f4'] ?? 0) + ($g_shop['f5'] ?? 0) + ($g_shop['f6'] ?? 0);
  }else{
    $dop_href = '?id='.$user['id'].'&';
  }

  $pet_c1 = $g_shop['c1'] ?? 0;
  $pet_c2 = $g_shop['c2'] ?? 0;
  $pet_c3 = $g_shop['c3'] ?? 0;
  $pet_c4 = $g_shop['c4'] ?? 0;
  $pet_c5 = $g_shop['c5'] ?? 0;
  $pet_c6 = $g_shop['c6'] ?? 0;
  $all_c = ($pet_c1 != 0 ? 1 : 0) +
           ($pet_c2 != 0 ? 1 : 0) +
           ($pet_c3 != 0 ? 1 : 0) +
           ($pet_c4 != 0 ? 1 : 0) +
           ($pet_c5 != 0 ? 1 : 0) +
           ($pet_c6 != 0 ? 1 : 0);

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
  $stars = max(0, floor(($all_level / 120) * 10));


  $g_bio = $core->getAllG($user, 'bio');
  $bio_me = $g_bio['me'] ?? null;

  $all_medal = $core->getG($user, 'shop', 'medal');
  $all_cup = $core->getG($user, 'shop', 'cup');
  
  $u_food = $core->getG($user, 'shop', 'food');
  $u_play = $core->getG($user, 'shop', 'play');

  $g_train = $core->getAllG($user, 'train');
  $all_train = ($g_train['cloth'] ?? 0) + ($g_train['accessory'] ?? 0) + ($g_train['style'] ?? 0) + ($g_train['glade'] ?? 0);

  $my_profile = $my_id == $user['id'];

  $all_gifts = $gifts->getTotalGift($user['id']);

  $assi1 = $g_shop['a1'] ?? 0;
	$assi2 = $g_shop['a2'] ?? 0;
	$assi3 = $g_shop['a3'] ?? 0;
  $all_assi = $assi1 + $assi2 + $assi3;