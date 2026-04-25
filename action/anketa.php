<?php
  $my_id = $core->user['id'];
  $user = isSet($_GET['id']) ? (int) $_GET['id'] : $my_id;
  $user = $my_id == $user ? $core->user : $core->getUser((int) $_GET['id']);
  if(!$user) {
    header('Location: /profile');
    die;
  }
  $_my = $my_id == $user['id'];

  if ($_my && isset($_POST['save']) && $_POST['save'] == '1') {
    $bio_me = trim($_POST['about'] ?? '');
    $bio_name = trim($_POST['real_name'] ?? '');
    $bio_gender = ($_POST['player_gender'] ?? '') === 'm' ? 'm' : (($_POST['player_gender'] ?? '') === 'f' ? 'f' : '');
    $bio_city = trim($_POST['city'] ?? '');
    $bio_date = trim($_POST['date'] ?? '');
    $bio_date_y = isset($_POST['show_date']) && $_POST['show_date'] == '1' ? true : false;
    $bio_bio = trim($_POST['status'] ?? '');
    if (mb_strlen($bio_me) > 42) {
      $bio_me = mb_substr($bio_me, 0, 42);
    }
    if (mb_strlen($bio_bio) > 255) {
      $bio_bio = mb_substr($bio_bio, 0, 255);
    }
    if (mb_strlen($bio_name) > 100) {
      $bio_name = mb_substr($bio_name, 0, 255);
    }
    if (mb_strlen($bio_city) > 100) {
      $bio_city = mb_substr($bio_city, 0, 100);
    }
    if (!empty($bio_date)) {
      $dateParts = explode('.', $bio_date);
      if (count($dateParts) === 3) {
        if (!checkdate((int)$dateParts[1], (int)$dateParts, (int)$dateParts[1])) $bio_date = '';
      } else $bio_date = '';
    }
    $dataToSave = [
      'me' => htmlspecialchars($bio_me),
      'name' => htmlspecialchars($bio_name),
      'gender' => htmlspecialchars($bio_gender),
      'city' => htmlspecialchars($bio_city),
      'date' => htmlspecialchars($bio_date),
      'date_y' => $bio_date_y,
      'bio' => htmlspecialchars($bio_bio),
    ];
    $data = ['bio' =>  json_encode($dataToSave)];
    $saveResult = $core->saveG($core->user['id'], $data);
    header('Location: /anketa');
  }


  $g_bio = $core->getAllG($user, 'bio');

  $bio_me = $g_bio['me'] ?? '';
  $bio_name = $g_bio['name'] ?? '';
  $bio_gender = $g_bio['gender'] ?? '';
  $bio_city = $g_bio['city'] ?? '';
  $bio_date = $g_bio['date'] ?? '';
  $bio_date_y = $g_bio['date_y'] ?? true;
  $bio_bio = $g_bio['bio'] ?? '';