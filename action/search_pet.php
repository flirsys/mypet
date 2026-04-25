<?php
  $type = isSet($_GET['back']) ? min(max((int) $_GET['back'], 1), 2) : 1;
  if($type == 1){
    $back = ['онлайн', 'online'];
  }else if($type == 2){
    $back = ['лучшие', 'best'];
  }
  $error = false;
  if(isSet($_POST['name'])){
    $name = trim($_POST['name'] ?? '');
    if($name != ''){
      $find = $core->getUser(null, $name, false);
      if(!$find) $error = 'Питомец не найден с таким именем';
      if($error == false) header('Location: /profile?id='.$find['id']);
    }
  }