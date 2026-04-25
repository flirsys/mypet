<?php
  $id = $core->user['id'];
  $g_acts = $core->getAllG($core->user, 'acts');
  $g_time = $core->getAllG($core->user, 'acts_time');
  
  if($core->getG($core->user, 'shop', 'cup') >= 33){
    header('Location: /');
    die;
  }
  include DIR.'/icl/cups.php';
  $new_cup = $cup_list[min(33,$core->getG($core->user, 'shop', 'cup')+1)];

  $show = new core\Show();
  $me_show = $show->getUser($core->user['id']);

  //              (all_acts)
  //0 - acts, 1 - a_acts,    2 - time
  $cup = [];
  $cup[0] = $g_acts['cup'] ?? 0;
  $cup[1] = $g_acts['a_cup'] ?? 0;
  $cup[2] = $g_time['cup'] ?? 0;

  // FOR DEBUG
  // for($i=0;$i<=33+33+32; $i++){
  //   $need_rating_i = floor($i/3)+1;
  //   $need_rating_ii = ($i % 3);
  //   $need_rating = round(250 + 125 * (($need_rating_i - 1) * 3 + $need_rating_ii) ** 2.05);
    
  //   if($need_rating_ii == 0) echo $need_rating_i."\n";
  //   echo $need_rating_ii .' -> '. $need_rating."\n";
  //   if($need_rating_ii == 2) echo "\n";
  // }
  $need_rating_i = $core->getG($core->user, 'shop', 'cup')+1;
  $need_rating_ii = $me_show['final'] - 1;
  $need_rating = round(250 + 125 * (($need_rating_i - 1) * 3 + $need_rating_ii) ** 2.05);
  
  $coins = ($me_show['final']+2) * ($me_show['type']+1);

  if(isSet($_GET['go'])){
    if($cup[2] <= time()){
      if($cup[0] < 5){
        if($me_show['go'] == 0){
          if($core->user['heart'] >= $new_cup['heart']){
            $core->add($id, 'heart', -$new_cup['heart']);
            $show->set($id, 'go', 1);
            $me_show['go'] = 1;
          } else $error_hearts = true;
        }
        
        if($me_show['go'] == 1){
          $show->add($id, 'rating', $core->user['beauty']);
          $me_show['rating'] += $core->user['beauty'];
          $core->addG($core->user, 'acts', 'cup', 1);
          $cup[0]++;
        }
        if($me_show['rating'] >= $need_rating){
          $rem_coins = ($coins) - $me_show['coin'];
          $win_coin = max(1,min(floor($rem_coins / 2), 10));
          $win_exp = round(20 + (20 * (($need_rating_i-1) ** 1.25)));
          
          if(mt_rand(1, 100) >= 50){
            $win_j = mt_rand(1,4);
            $win_j_i = mt_rand(1,2);
            $core->addG($core->user, 'shop', 'j'.$win_j.'p', $win_j_i);
          }

          $core->add($id, 'coin', $win_coin);
          $core->add($id, 'exp', $win_exp);
          $core->user['exp_p'] = $core->getExpP($core->user);

          $show->set($id, 'rating', 0);
          $show->add($id, 'final', 1);
          $core->setG($core->user, 'acts', 'cup', 0);

          $me_show['final'] += 1;
          if($me_show['final'] > 3){
            $core->addG($core->user, 'shop', 'cup', 1);
            $show->set($id, 'final', 1);
            $show->add($id, 'type', 1);
            $me_show['final'] = 1;
            $me_show['type'] += 1;
            $new_cup = $cup_list[$me_show['type']+1];
          }
          $win = true;
        }
      }
      if($cup[0] >= 5 || isSet($win)){
        $show->set($id, 'go', 0);
        $time = $cup[1] >= 3 ? time() + (60*60) : time() + (60*1.5);
        $core->setG($core->user, 'acts_time', 'cup', $time);
        $core->addG($core->user, 'acts', 'a_cup', 1);
        if($cup[1] >= 3) $show->set($id, 'rating', 0);
        $act_cup_time = $time;
        if(!isSet($win)){
          $win = false;
          $rem_coins = ($coins) - $me_show['coin'];
          $win_coin = 0;
          if($rem_coins > 0) {
            $win_coin = max(1,min(floor($rem_coins / 2), 10));
            $show->add($id, 'coin', $win_coin);
            $core->add($id, 'coin', $win_coin);
          }
          $win_exp = round(20 + (20 * (($need_rating_i-1) ** 1.25)));
          $core->add($id, 'exp', $win_exp);
        }
      }
    }
  }

  $page_num = isSet($_GET['page']) ? (int) $_GET['page'] : 0;
  $page_num = $page_num > 0 ? $page_num : 1;
  $type = $core->getG($core->user, 'shop', 'cup');