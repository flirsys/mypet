<?php
  include DIR.'/icl/sets.php';
  $chest = new core\Chest();
  $all_chest = $chest->getAllC($core->user['id']);

  // $chest->add($core->user['id'], 'c1', 9);
  // $chest->add($core->user['id'], 'c3', 4);
  // $chest->add($core->user['id'], 'c5', 9);

  $g_shop = $core->getAllG($core->user, 'shop');
  $pet_c1 = $g_shop['c1'] ?? 0;
  $pet_c2 = $g_shop['c2'] ?? 0;
  $pet_c3 = $g_shop['c3'] ?? 0;
  $pet_c4 = $g_shop['c4'] ?? 0;
  $pet_c5 = $g_shop['c5'] ?? 0;
  $pet_c6 = $g_shop['c6'] ?? 0;
  $all_c = ($pet_c1 != 0 ? 1 : 0) +
           ($pet_c2 != 0 ? 1 : 0) +
           ($pet_c3 != 0 ? 1 : 0) +
           ($pet_c4 != 0 ? 1 : 0) +
           ($pet_c5 != 0 ? 1 : 0) +
           ($pet_c6 != 0 ? 1 : 0);


  $id = $core->user['id'];
  if(isSet($_GET['use'])){
    $what = (int) $_GET['use'];
    $item = $chest->get($what, $id);
    if($item){
      $pet_item = $g_shop[$item['type']] ?? 0;
      if($pet_item == 0){
        $core->setG($core->user, 'shop', $item['type'], $item['item']);
        $chest->remove($item['id']);
      }else{
        $chest->add($id, $item['type'], $pet_item);
        $core->setG($core->user, 'shop', $item['type'], $item['item']);
        $chest->remove($item['id']);
      }
    }
    header('Location: /chest');
  }

  else if(isSet($_GET['sell'])){
    $what = (int) $_GET['sell'];
    $item = $chest->get($what, $id);
    if($item){
      $i = $chest->getItem($item['type'], $item['item']);
      $price = $i['price'];
      $core->add($id, 'coin', $price);
      $chest->remove($item['id']);
    }
    header('Location: /chest');
  }