<?php
  $my_id = $core->user['id'];
  $user = isSet($_GET['id']) ? (int) $_GET['id'] : $my_id;
  $user = $my_id == $user ? $core->user : $core->getUser((int) $_GET['id']);
  if(!$user) {
    header('Location: /');
    die;
  }
  $g_shop = $core->getAllG($user, 'shop');
  $_my = $my_id == $user['id'];
  

  $g_train = $core->getAllG($user, 'train');

  //0 - lvl, 1 - beauty, 2 - price
  $cloth = [];
  $cloth[0] = $g_train['cloth'] ?? 0;
  $cloth[1] = $cloth[0] * 2;
  $cloth[2] = $cloth[0] > 0 && $cloth[0] % 4 === 0 ? ['coin', round((5 * ($cloth[0])) ** 1.35)] : ['heart', round((25 * ($cloth[0]+1)) ** 1.45)];
  $accessory = [];
  $accessory[0] = $g_train['accessory'] ?? 0;
  $accessory[1] = $accessory[0] * 2;
  $accessory[2] = $accessory[0] > 0 && $accessory[0] % 4 === 0 ? ['coin', round((5 * ($accessory[0])) ** 1.35)] : ['heart', round((25 * ($accessory[0]+1)) ** 1.45)];
  $style = [];
  $style[0] = $g_train['style'] ?? 0;
  $style[1] = $style[0] * 2;
  $style[2] = $style[0] > 0 && $style[0] % 4 === 0 ? ['coin', round((5 * ($style[0])) ** 1.35)] : ['heart', round((25 * ($style[0]+1)) ** 1.45)];
  $glade = [];
  $glade[0] = $g_train['glade'] ?? 0;
  $glade[1] = $glade[0] * 2;
  $glade[2] = $glade[0] > 0 && $glade[0] % 4 === 0 ? ['coin', round((5 * ($glade[0])) ** 1.35)] : ['heart', round((25 * ($glade[0]+1)) ** 1.45)];
  $glade[3] = [round($glade[0] * 0.4), round($glade[0]*0.7)]; // 3 - percent, sec
  
  $glamour = $cloth[0] + $accessory[0] + $style[0] + $glade[0];
  
  if($_my){
    function doUp($core, $what, &$g){
      $uvalue = $g[2][0] == 'heart' ? $core->user['heart'] : $core->user['coin'];
      if($uvalue >= $g[2][1]){
        $core->add($core->user['id'], $g[2][0], -$g[2][1]);
        $core->addG($core->user, 'train', $what, 1);
        return false;
      }
      return [$g[2][0], $g[2][1] - $uvalue];
    }
    if(isSet($_GET['up'])){
      $what = $_GET['up'];
      $error = false;
      switch($what){
        case 'cloth':
          $error = doUp($core, 'cloth', $cloth);
          break;
        case 'accessory':
          $error = doUp($core, 'accessory', $accessory);
          break;
        case 'style':
          $error = doUp($core, 'style', $style);
          break;
        case 'glade':
          $error = doUp($core, 'glade', $glade);
          break;
        default:
          break;
      }
      if($error == false) header('Location: /train');
    }
  }