<?php
  $error = false;
  if (isset($_POST['name']) && isset($_POST['password'])) {
    $p_name = $_POST['name'] ?? '';
    $p_pw = $_POST['password'] ?? '';
    $error = $core->login($p_name, $p_pw);
  }