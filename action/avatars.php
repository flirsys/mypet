<?php
  include DIR . '/icl/avatars.php';
  
  $g_pets = $core->getAllG($core->user, 'pets');
  
  $page_num = isSet($_GET['page']) ? (int) $_GET['page'] : 1;
  $page_num = $page_num > 0 ? min(2, $page_num) : 1;

  $copp_ava_list = array_slice($ava_list, 9 * ($page_num - 1), 9 * $page_num);

  function buy($core, $id, $list, $g){
    if(!array_key_exists($id, $list)) return 'Нету такого питомца';
    if(array_key_exists($id, $g)) return 'У вас уже есть этот питомец';
    if($core->user['coin'] >= 500){
      $core->add($core->user['id'], 'coin', -500);
      $core->setG($core->user, 'pets', $id, true);
      return false;
    }
    return 500 - $core->user['coin'];
  }
  function set($core, $id, $g){
    if(!array_key_exists($id, $g)) return 'У вас нет такого питомца';
    $core->set($core->user['id'], 'pet', $id);
    return false;
  }
  
  if(isSet($_GET['buy'])){
    $what = $_GET['buy'];
    $error = buy($core, (int) $what, $ava_list, $g_pets);
    if($error == false) header('Location: /avatars?page='.$page_num);
  }

  
  else if(isSet($_GET['set'])){
    $what = $_GET['set'];
    $error = set($core, (int) $what, $g_pets);
    if($error == false) header('Location: /avatars?page='.$page_num);
  }