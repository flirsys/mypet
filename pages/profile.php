<div class="msg mrg_msg1 mt10 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
		        <table class="pet_profile">
			        <tbody>
                <tr>
				          <td>
					          <a class="item" href="/gear<?=$dop_href?>"><img class="item_icon" src="/view/image/item/<?=$pet_c1 > 0 ? $sets_list[$pet_c1][1]['name'] : 'empty'?>.png"></a>
				          </td>
				          <td rowspan="3" colspan="2">
										<?php if($my_profile) { ?><a href="/avatars"><?php } ?><img class="ava_prof" src="/view/image/avatar<?=$user['pet']?>.png"><?php if($my_profile) { ?></a><?php } ?>
									</td>
				          <td>
					          <a class="item" href="/gear<?=$dop_href?>"><img class="item_icon" src="/view/image/item/<?=$pet_c2 > 0 ? $sets_list[$pet_c2][2]['name'] : 'empty'?>.png"></a>
				          </td>
			          </tr>
			          <tr>
				          <td>
					          <a class="item" href="/gear<?=$dop_href?>"><img class="item_icon" src="/view/image/item/<?=$pet_c3 > 0 ? $sets_list[$pet_c3][3]['name'] : 'empty'?>.png"></a>
				          </td>
				          <td>
					          <a class="item" href="/gear<?=$dop_href?>"><img class="item_icon" src="/view/image/item/<?=$pet_c4> 0 ? $sets_list[$pet_c4][4]['name'] : 'empty'?>.png"></a>
				          </td>
			          </tr>
			          <tr>
				          <td>
					          <a class="item" href="/gear<?=$dop_href?>"><img class="item_icon" src="/view/image/item/<?=$pet_c5 > 0 ? $sets_list[$pet_c5][5]['name'] : 'empty'?>.png"></a>
				          </td>
				          <td>
					          <a class="item" href="/gear<?=$dop_href?>"><img class="item_icon" src="/view/image/item/<?=$pet_c6 > 0 ? $sets_list[$pet_c6][6]['name'] : 'empty'?>.png"></a>
				          </td>
			          </tr>
		          </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
  if($all_medal > 0){
?>
  <div class="msg mrg_msg1 mt5 c_brown4">
	  <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4 omin_medals">
              <?php
                for($i = $all_medal; $i >= $all_medal - 4; $i--){
                  if($i < 1) break;
              ?>
              <a class="m2 ilblock" href="/cups_medals<?=$dop_href?>type=medals"><img class="item_icon" src="/view/image/item/<?=$medal_list[$i]['name']?>.png"></a>
              <?php } ?>
					  </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>


<?php
  if($all_cup > 0){
?>
  <div class="msg mrg_msg1 mt5 c_brown4">
	  <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4 omin_medals">
              <?php
                for($i = min(33, $all_cup); $i >= $all_cup - 4; $i--){
                  if($i < 1) break;
              ?>
			  			<a class="m2 ilblock" href="/cups_medals<?=$dop_href?>type=cups"><img class="item_icon" src="/view/image/item/<?=$cup_list[$i]['name']?>.png"></a>
              <?php } ?>
					  </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php if($user['level'] >= 3){ ?>
<div class="msg mrg_msg1 mt5 c_brown4">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <div class="item">
					    <a class="fl mt2" href="/<?=$dop_href != '?' ? 'house_list?id='.$user['id'] : 'house'?>">
                <?php
                  $rating = $stars / 2;
                ?>
                <img class="mlr5" src="/view/image/myhome<?=floor($rating)?>.png" height="48">
              </a>
					    <a class="home_link mb5 ml2 ib td_no omin_home_link" href="/<?=$dop_href != '?' ? 'house_list?id='.$user['id'] : 'house'?>">Домик</a>
              <br>
              <span class="ib omin_home_star">
                <span class="nowrap">
                  <?php
                    for ($i = 1; $i <= 5; $i++) {
                      $s = 1;
                      if ($rating >= $i) $s = 3;
                      elseif ($rating > $i - 1 && $rating < $i) $s = 2;
                  ?>
                    <img class="price_img" src="/view/image/icons/star<?=$s?>.png">
                  <?php } ?>
                </span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<div class="msg mrg_msg1 mt10 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <div class="left font_14 pet_profile_stat">
              <?php
                $online = (time() - $user['online_time']) < 2.5*60;
              ?>
              <div class="stat_item">
                <img class="price_img" src="/view/image/avatar_s<?=$user['pet']?>.png?v=2"> <?php if($my_profile) { ?><a class="darkgreen_link" href="/avatars"><?php } ?><?=$user['name']?><?php if(!$my_profile && $online){ ?><img class="price_img" src="/view/image/icons/online.png"><?php } ?><?php if($my_profile) { ?></a><?php } ?>, <?=$user['level']?> уровень
              </div>
              
              <?php if($user['premium_time'] != 0 && $user['premium_time'] > time()){ ?>
                <div class="stat_item">
                  <img class="price_img" src="/view/image/item/vip1.png" width="20"> Премиум <?php if($my_profile){ ?><font style="color:gray">до <?=$core->formatDate($core->user['premium_time'])?></font><?php } ?>
                </div>
              <?php } ?>

              <?php if($my_profile || $bio_me != '') { ?>
                <div class="stat_item">
                  <img src="/view/image/icons/about.png" alt="" class="price_img"> <a href="/anketa<?=$dop_href?>" class="<?=($bio_me != '' ? 'darkgreen_link' : 'c_brown4 td_no')?>">О себе:</a>
                  <?=$bio_me != '' ? $bio_me : '<a href="/anketa'.$dop_href.'" class="darkgreen_link">заполнить</a>'?>
                </div>
              <?php } ?>
              <?php if($my_profile) { ?>
                <div class="stat_item">
                  <img class="price_img" src="/view/image/icons/expirience.png"> Опыт: <?=$user['exp']?> / <?=$user['exp_max']?>
                </div>
              <?php }else if(!$my_profile && !$online) { ?>
                <div class="stat_item">
                  <span>
                    <img class="price_img" src="/view/image/icons/calendar.png"> Посл. вход:
                  </span>
                  <span class=""><?=$user['online_time'] > 1 ? $core->formatDate($user['online_time']) : 'не заходил'?></span>
                </div>
              <?php } ?>
							<div class="stat_item">
                <img class="price_img" src="/view/image/icons/beauty.png"> Красота: <?=$user['beauty']?>
              </div>
							<div class="stat_item">
				        <img class="price_img" src="/view/image/icons/calendar.png"> Дней в игре: <?=$user['days']?>
              </div>
              <?php if($my_profile) { ?>
				        <div class="stat_item">
                  <img class="price_img" src="/view/image/icons/coin.png"> Монеты: <?=$user['coin']?>
                </div>
                <div class="stat_item">
                  <img class="price_img" src="/view/image/icons/heart.png"> Сердечки: <?=$user['heart']?>
                </div>
              <?php }else if($all_cup > 0){ ?>
                <div class="stat_item">
                  <img class="price_img" src="/view/image/icons/show.png"> Звание: <?=$cup_list[$all_cup]['name']?>
                </div>
              <?php } ?>
		        </div>
	        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="marea mt5">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
		        <div class="mbtn">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/<?=$my_profile ? 'messages' : 'send?id='.$user['id']?>" class="mb_ttl post"><?=$my_profile ? 'Почта'.($mess->getUnreadCount($core->user['id']) > 0 ? ' ('.$mess->getUnreadCount($core->user['id']).')' : '') : 'Написать сообщение'?></a>
                </div>
              </div>
            </div>
            <?php if($my_profile){ ?>
              <div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/gear" class="mb_ttl slots">Одежда <span class="text_vmenu nwr">(<?=$all_c?> из 6)</span></a>
                  </div>
                </div>
              </div>
              <div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/chest" class="mb_ttl chest">Шкаф <span class="text_vmenu nwr">(<?=$all_chest?>)</span></a>
                  </div>
                </div>
              </div>
            <?php }else{ ?>
              <div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/life?id=<?=$user['id']?>" class="mb_ttl happy">Дружба и любовь</a>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="marea mt10">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <div class="mbtn">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/cups_medals<?=$dop_href?>type=medals" class="mb_ttl medal">Медали <span class="text_vmenu nwr">(<?=$all_medal > 1 ? $all_medal : 0?>)</span></a>
                </div>
              </div>
            </div>
            <div class="mbtn">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/cups_medals<?=$dop_href?>type=cups" class="mb_ttl achieve">Награды <span class="text_vmenu nwr">(<?=$all_cup > 1 ? $all_cup : 0?>)</span></a>
                </div>
              </div>
            </div>
            <div class="mbtn">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/gifts<?=$dop_href?>" class="mb_ttl gifts">Подарки <span class="text_vmenu nwr">(<?=$all_gifts?>)</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="marea mt10">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <div class="mbtn">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/food_play<?=$dop_href?>back=profile" class="mb_ttl food_play">Еда и игры (<?=$u_food+$u_play?>)</a>
                </div>
              </div>
            </div>
						<div class="mbtn">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/train<?=$dop_href?>" class="mb_ttl train">Тренировка <span class="text_vmenu nwr">(<?=$all_train?>)</span></a>
                </div>
              </div>
            </div>
						<div class="mbtn">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/assistants<?=$dop_href?>" class="mb_ttl assistants">Работники (<?=$all_assi?>)</a>
                </div>
              </div>
            </div>
            <?php if($my_profile){ ?>
              <div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/jewels" class="mb_ttl jewels">Драгоценности (<?=$all_j?>)</a>
                  </div>
                </div>
              </div>
              <div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/garden" class="mb_ttl garden">Зимний сад (<?=$all_f?>)</a>
                  </div>
                </div>
              <?php } ?>
              <?php if (1 == 0){ ?>
                <div class="mbtn">
                  <div class="mb_r">
                    <div class="mb_c">
                      <a href="/collections<?=$dop_href?>" class="mb_ttl collection">Коллекции <span class="text_vmenu nwr">(..)</span></a>
                    </div>
                  </div>
                </div>
              <?php } ?>
					  </div>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>