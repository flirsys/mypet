<?php
  $gifts = new core\Gifts();
  $page_num = isSet($_GET['page']) ? (int) $_GET['page'] : 0;
  $page_num = $page_num > 0 ? $page_num : 1;
  $maxpage = $mess->getTotalChatPages($core->user['id']);
  $page_num = min($page_num, $maxpage);