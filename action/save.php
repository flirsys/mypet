<?php
  if($core->user['password'] != 'time') {
    header('Location: /home');
    die();
  }

  if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email'])) {
    $name = trim($_POST['name'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $email = trim($_POST['email'] ?? '');

    $len_name = mb_strlen($name);
    if ($len_name > 13 || $len_name < 3) {
      $error = 'Имя может быть от 3 до 13 символов';
    }
    
    $len_pass = mb_strlen($password);
    if ($len_pass > 42 || $len_pass < 8) {
      $error = 'Пароль может быть от 8 до 42 символов';
    }

    $len_email = mb_strlen($email);
    if ($len_email > 87 || $len_email < 5) {
      $error = 'E-mail может быть от 5 до 87 символов';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = 'указан неверный E-mail';
    }

    if(!isSet($error)){
      $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
      $core->set($core->user['id'], 'name', $name);
      $core->set($core->user['id'], 'password', $password);
      $core->set($core->user['id'], 'email', $email);
      $core->add($core->user['id'], 'coin', '15');
      header('Location: /save');
    }

  }