<?php
  $maxpage = round($core->getOnlineCount() / 15);
  $page_num = isSet($_GET['page']) ? (int) $_GET['page'] : 0;
  $page_num = $page_num > 0 ? max($page_num, $maxpage) : 1;
  $list = $core->getOnlineUsers($page_num);