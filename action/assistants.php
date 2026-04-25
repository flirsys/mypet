<?php
	$my_id = $core->user['id'];
  $user = isSet($_GET['id']) ? (int) $_GET['id'] : $my_id;
  $user = $my_id == $user ? $core->user : $core->getUser((int) $_GET['id']);
  if(!$user) {
    header('Location: /');
    die;
  }
  $g_shop = $core->getAllG($user, 'shop');
	$assi1 = $core->getAssi(1, $g_shop['a1'] ?? 0);
	$assi2 = $core->getAssi(2, $g_shop['a2'] ?? 0);
	$assi3 = $core->getAssi(3, $g_shop['a3'] ?? 0);

  $_my = $my_id == $user['id'];
	$error = false;
	if($_my){
		$up = $_GET['up'] ?? false;
		if($up != false){
			$up = min(max((int) $up, 1), 3);
			$a = $core->getAssi($up, $g_shop['a'.$up] ?? 0);
			if($core->user['coin'] < $a['price']){
				$error = 'Не хватает ещё '.($a['price'] - $core->user['coin']).' монет';
			}
			if($error == false){
				$core->addG($core->user, 'shop', 'a'.$up, 1);
				$core->add($core->user['id'], 'coin', -$a['price']);
				header('Location: /assistants');
			}
		}
	}


	