<?php
  $id = isSet($_COOKIE['id']) && $_COOKIE['id'] != "" ? $_COOKIE['id'] : false;
  $pass = isSet($_COOKIE['password']) && $_COOKIE['password'] != "" ? $_COOKIE['password'] : false;

  if($core->user && $core->user['pet'] !== null) {header('Location: /home'); die();}

  if(!$core->user){
    $new = $core->register();
    setCookie('token', $new[0], time() + 86400 * 365, '/');
    setCookie('id', $new[1], time() + 86400 * 365, '/');
    header('Location: /start');
    die();
  }
  
  if($core->user && $core->user['pet'] === null){
    $type = isSet($_GET['type']) ? (int) $_GET['type'] : false;
    if($type !== false){
      $pet = 0;
      switch($type){
        case 0:
          $pet = 0;
          break;
        case 12:
          $pet = 12;
          break;
        case 13:
          $pet = 13;
          break;
        default:
          $pet = 1;
          break;
      }
      $core->set($core->user['id'], 'pet', $pet);
      $core->setG($core->user, 'pets', $pet, true);
      $core->setG($core->user, 'acts', "a_cup", 1);
      header('Location: /home');
      die();
    }
  }