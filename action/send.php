<?php
  $gifts = new core\Gifts();

  $my_id = $core->user['id'];
  $user = isSet($_GET['id']) ? (int) $_GET['id'] : $my_id;
  if($user == $my_id){
    header('Location: /');
    die;
  }
  $user = $core->getUser((int) $_GET['id'], null, false);
  if(!$user) {
    header('Location: /');
    die;
  }

  include DIR.'/icl/gifts.php';
  $is_gift = isSet($_GET['gifts']) ?? false;
  if(!$is_gift){
    $page_num = isSet($_GET['page']) ? (int) $_GET['page'] : 0;
    $page_num = $page_num > 0 ? $page_num : 1;
    
    $maxpage = $mess->getTotalMessagePages($my_id, $user['id']);
    $page_num = min($page_num, $maxpage);

    $error = false;
    $gift = $_GET['gift'] ?? false;
    
    if($user['id'] == 0){
      $is_gift = false;
      $gift = false;
      $price = ['heart', 0];
    }else{
      if($gift != false){
        $gift_i = min(52, $gift);
        $gift_i = max(1, $gift_i);
        $gift = [];
        if(array_key_exists($gift_i, $gifts_list['default'])){
          $gift['id'] = $gift_i;
          $gift['price'] = 25;
        }else if(array_key_exists($gift_i, $gifts_list['premium'])){
          $gift['id'] = $gift_i;
          $gift['price'] = 275;
        }else if(array_key_exists($gift_i, $gifts_list['vip'])){
          $gift['id'] = $gift_i;
          $gift['price'] = 700;
        }else{
          $gift = false;
        }
      }
      $price = $gift == false ? ['heart', 5] : ['coin', $gift['price']];
      if (isset($_POST['message_text'])) {
        if ($core->user[$price[0]] < $price[1]) {
          $n = $price[1] - $core->user[$price[0]];
          $error = 'Вам не хватает '.$n.' '.($price[0] == 'heart' ? 'сердечек' : 'монет').'.';
        }
        $text = $_POST['message_text'] ?? '';
        $giftid = null;
        if($error == false && $gift != false) {
          $giftid = $gifts->send($core->user['id'], $user['id'], $gift['id'], $text);
          $text = '';
        }
        if($error == false){
          $error = $mess->send($my_id, $user['id'], $text, $giftid);
          if($error == false){
            $core->add($core->user['id'], $price[0], -$price[1]);
            header('Location: /send?id='.$user['id']);
          }
        }
      }

      else if (isset($_GET['delete'])) {
        if(isSet($_POST['yes'])){
          foreach($mess->getMessages($my_id, $user['id'], 1, -1) as $m){
            $mess->setDelete($m['id'], $core->user['id']);
          }
          header('Location: /send?id='.$user['id']);
        }
      }
    }
  }