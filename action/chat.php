<?php
  $chat = new core\Chat();
  $sb = new core\SpamBlocker();

  $page_num = isSet($_GET['page']) ? (int) $_GET['page'] : 0;
  $page_num = $page_num > 0 ? $page_num : 1;
    
  $maxpage = $chat->getTotalPages();
  $page_num = min($page_num, $maxpage);

  $to = $_GET['to'] ?? null;
  if($to != null){
    $u_to = $core->getUser((int)$to, null, false);
    if($u_to){
      $to_user = $u_to;
    }
  }
  $id = $core->user['id'];
  if (isset($_POST['message_text']) && $core->user['level'] >= 13 && $core->user['ban_time'] < time()) {
    if (!empty($_POST['token']) && !empty($_SESSION['form_token']) && hash_equals($_SESSION['form_token'], $_POST['token'])) {
      unset($_SESSION['form_token']);
      $text = $_POST['message_text'] ?? '';
      $block = $sb->handleMessage($core->user['id'], $text);
      if($block){
        $time = time() + 60*60*2;
        $core->set($core->user['id'], 'ban_time', $time);
        $mess->send(0, $core->user['id'], 'Вы были заблокированы за флуд в чате до '.$core->formatDate($time));
        $chat->send(0, 'Игрок @id'.$core->user['id'].' был заблокирован за флуд до '.$core->formatDate($time), -1);
      }else{
        $for = isSet($to_user) ? $to_user['id'] : null;
        $error = $chat->send($id, $text, $for);
        if($error == false){
          header('Location: /chat');
        }
      }
    } else header('Location: /chat');
  }