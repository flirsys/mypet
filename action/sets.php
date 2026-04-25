<?php
  include DIR . '/icl/sets.php';

  $page_num = isSet($_GET['page']) ? (int) $_GET['page'] : 1;
  $page_num = $page_num > 0 ? min(6, $page_num) : 1;