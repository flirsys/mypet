<?php
  $type = isSet($_GET['change_name']) ? 'change_name' : (isSet($_GET['change_pw']) ? 'change_pw' : (isSet($_GET['logout']) ? 'logout' : false));
  switch ($type) {
    case 'change_name':
      $name = 'Смена имени';
      $type = 'change_name';
      break;
    case 'change_pw':
      $name = 'Смена пароля';
      $type = 'change_pw';
      break;
    case 'logout':
      $name = 'Выход';
      $type = 'logout';
      break;
    default:
      $name = 'Настройки';
      $type = false;
      break;
  }

  $error = false;
  if($core->user['level'] >= 5){
    if ($type == 'change_name' && isset($_POST['name'])) {
      $p_name = trim($_POST['name'] ?? '');
      if($core->user['name'] != $p_name){
        $len_name = mb_strlen($p_name);
        if ($core->user['coin'] < 1000) {
          $n = 1000 - $core->user['coin'];
          $error = 'Вам не хватает '.$n.' монет.';
        }
        if ($len_name > 13 || $len_name < 3) {
          $error = 'Имя может быть от 3 до 13 символов.';
        }
        if(!$error) {
          $core->add($core->user['id'], 'coin', -1000);
          $core->set($core->user['id'], 'name', $p_name);
          header('Location: /settings?change_name');
        }
      }
    }

    else if ($type == 'change_pw' && isset($_POST['pw'])) {
      $p_pw = trim($_POST['pw'] ?? '');
      if($core->user['password'] != $p_pw){
        $len_pass = mb_strlen($p_pw);
        if ($len_pass > 42 || $len_pass < 8) {
          $error = 'Пароль может быть от 8 до 42 символов.';
        }
        if(!$error) {
          $core->set($core->user['id'], 'password', $p_pw);
          header('Location: /settings?change_pw');
        }
      }
    }
  }

  if ($type == 'logout') {
    setCookie('token', '', time() - 1, '/');
    setCookie('id', '', time() - 1, '/');
    header('Location: /');
    die();
  }