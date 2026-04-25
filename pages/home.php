<?php if(isSet($error_sleep)): ?>
  <div class="msg mrg_msg1 mt10 c_brown">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <span class="warning">Вам не хватает <img src="/view/image/icons/<?=$sleep[0]?>.png" class="price_img"><?=$error_sleep?> монет</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="mt10">
  <?php if(isset($new_level)): ?>
    <div class="msg mrg_msg2 mt32">
		  <div class="wr_bg">
        <div class="wr_c3 m-3">
          <div class="wr_c4">
			      <div class="ttl mmt">
              <div class="tr">
                <div class="tc">Поздравляем!</div>
              </div>
            </div>
		  			<div class="pb5">
              <span class="text_log succes">
                <b>Вы достигли <?=$core->user['level']?> уровня!<br>Награда: <img class="price_img" src="/view/image/icons/coin.png"><?=$new_level[0]?> монет</b>
              </span>
            </div>
	  			</div>
        </div>
      </div>
	  </div>
    <div class="dbl mt7"></div>
  <?php endif; ?>

  <?php if($core->user['level'] >= 5 && $core->user['password'] == 'time'): ?>
    <div class="msg mrg_msg1 mt10 c_brown">
		  <div class="wr_bg">
        <div class="wr_c1">
          <div class="wr_c2">
            <div class="wr_c3">
              <div class="wr_c4" style="padding: 5px;">
			          <b class="c_green3 font_14">
                  <a href="/save" class="save_link font_14"><b>Сохрани питомца</b></a><span class=" font_14"> и получи <span><img class="price_img" src="/view/image/icons/coin.png">15</span></span>
                  <br>
                </b>
		          </div>
            </div>
          </div>
        </div>
      </div>
	  </div>
    <div class="dbl mt7"></div>
  <?php endif; ?>


  <?php if(1 == 0): ?>
  <div class="msg mrg_msg1 mt10 c_brown">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <spap class="font_14" style="color: green;">Действие вашего Премиум-аккаунта закончилось
                <br><a href="/extend_effect" class="bbtn mt5 mb5">
                  <span class="br"><span class="bc">Продлить</span></span></a>
                  <br><a class="center orange_dark2" href="/hide_message?message_id=effect_finished">Скрыть</a>
                </spap>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="dbl mt7"></div>
  <?php endif; ?>

  <?php if(isSet($act)): ?>
    <div class="lplate mt7">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3 p4">
		        Сердечки <img class="price_img" src="/view/image/icons/heart.png">+<?=$act[0]?>,
            Опыт <img class="price_img" src="/view/image/icons/expirience.png">+<?=$act[1]?>
          </div>
        </div>
      </div>
    </div>
    <div class="dbl mt7"></div>
  <?php endif; ?>

	
  <?php if(isSet($sleep)){ ?>
  	<div class="pt10 ovh" style="margin-top: -5px;">
	  	<div class="tplate">
        <div class="wr_c1">
          <div class="wr_c2">
            <div class="wr_c3">
              <div class="wr_c4" style="padding: 8px 8px 3px;">
			          <div class="sleep"></div>
			          <img src="/view/image/avatars<?=$core->user['pet']?>.png" class="fl sleep_img" height="48" alt="">
  			        <div class="ml65">
	  			        Питомец устал и уснул<br>Проснется через: <?=$text_m?>
                </div>
			          <div class="clb mb5"></div>
		          </div>
            </div>
          </div>
        </div>
      </div>
	  </div>
  	<div class="cntr fs0 mt-11">
      <a href="/?wakeup" class="btn">
        <span class="br">
          <span class="bc plr5 tdn">Дать витаминку за <img class="price_img" src="/view/image/icons/<?=$sleep[0]?>.png"><?=$sleep[1]?></span>
        </span>
      </a>
    </div>
  <?php }else{ ?>
    <div class="dbmenu">
      <div class="apanel">
        <table class="tbmenu">
          <tbody>
            <tr>
              <td>
  					    <!-- FOOD	-->
  							<span class="slot <?=(isSet($food[3][0]) ? 'dis' : '')?>">
                  <?php if(isSet($act_food_p) && $act_food_p > 0 && $act_food_p < 100): ?>
                    <span class="aprg">
                      <span class="prg blue">
                        <span class="end">
                          <span class="rate" style="width:<?=$act_food_p?>%;">
                            <span class="rr">
                              <span class="rl"></span>
                            </span>
                          </span>
                        </span>
                      </span>
                    </span>
                  <?php endif; ?>

  								<a href="<?=(isSet($food[3][0]) ? '/' : '/?food')?>" class="abtn">
                    <img src="/view/image/item/<?=$my_food['name']?>.png" width="48" height="48" alt="">
                  </a>
                </span>
              </td>
              <td>
  					    <!-- PLAY	-->
                <span class="slot <?=(isSet($play[3][0]) ? 'dis' : '')?>">
                  <?php if(isSet($act_play_p) && $act_play_p > 0 && $act_play_p < 100): ?>
                    <span class="aprg">
                      <span class="prg blue">
                        <span class="end">
                          <span class="rate" style="width:<?=$act_play_p?>%;">
                            <span class="rr">
                              <span class="rl"></span>
                            </span>
                          </span>
                        </span>
                      </span>
                    </span>
                  <?php endif; ?>
                  
                  <a href="<?=(isSet($play[3][0]) ? '/' : '/?play')?>" class="abtn">
                    <img src="/view/image/item/<?=$my_play['name']?>.png" width="48" height="48" alt="">
                  </a>
                </span>
              </td>
                  
              <td>
                <!-- SHOW	-->
                <span class="slot <?=(isSet($cup[3][0]) ? 'dis' : '')?>">
                  <?php if($core->user['level'] >= 2 && $my_cup < 33){ ?>
  								  <a href="<?=(isSet($cup[3][0]) ? '/' : '/show')?>" class="abtn">
                      <img src="/view/image/item/<?=$new_cup['name']?>.png" width="48" height="48" alt="">
                    </a>
  								  <a href="<?=(isSet($cup[3][0]) ? '/' : '/show')?>">
                      <span class="alap">
                        <span class="step">
                          <?=$me_show['final']?>/3
                        </span>
                      </span>
                  </a>
                </span>
                <?php } else { ?>
                  <span class="abtn"></span>
                <?php } ?>
              </td>
            </tr>
            <tr>
              <td class="center" style="vertical-align: top;">
                <span class="act2"><?=(isSet($food[3][0]) ? $food[3][0] : $my_food['ru'])?></span>
              </td>
              <td style="vertical-align: top;">
                <span class="act2"><?=(isSet($play[3][0]) ? $play[3][0] : $my_play['ru'])?></span>
              </td>
              <?php if($core->user['level'] >= 2 && $my_cup < 33){ ?>
                <td style="vertical-align: top;">
                  <span class="act2"><?=(isSet($cup[3][0]) ? $cup[3][0] : 'На выставку')?></span>
                </td>
              <?php }else{ ?>
                <td style="vertical-align: top;">
                  <span class="act2">Свободно</span>
                </td>
              <?php } ?>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  <?php } ?>
</div>


<?php
  $plus = 0;
?>
<!-- CONTROLS 1-->
<div class="marea mt5">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
           
            <?php if($core->user['level'] >= 2 && 1 == 0): ?>
              <div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/charm" class="mb_ttl no_icon">
                      <?php if($plus == 1) echo '<img class="fr" src="/view/img/ico16-plus.png" width="16" height="16" alt="+">'; ?>
					  					<img class="price_img" height="20" src="/view/image/item/access51.png">
                      Снежки
                    </a>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            
            
            <?php if($core->user['level'] >= 7 && 1 == 0): ?>
              <div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/races" class="mb_ttl no_icon ">
                      <?php if($plus == 1) echo '<img class="fr" src="/view/img/ico16-plus.png" width="16" height="16" alt="+">'; ?>
										  <img class="price_img" height="20" width="20" src="/view/image/icons/horse.png">
                      Скачки
                    </a>
                  </div>
                </div>
              </div>
            <?php endif; ?>

            
            <?php if($core->user['level'] >= 5): ?>
              <div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/glade" class="mb_ttl glade ">
                      <?php if($plus == 1) echo '<img class="fr" src="/view/img/ico16-plus.png" width="16" height="16" alt="+">'; ?>
								      Поляна
                    </a>
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if($core->user['level'] >= 4): ?>
  						<div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/travel" class="mb_ttl travel">
  								    <?php if($plus == 1) echo '<img class="fr" src="/view/img/ico16-plus.png" width="16" height="16" alt="+">'; ?>
  								    Прогулки
                    </a>
                  </div>
                </div>
              </div>
            <?php endif; ?>

  					<div class="mbtn">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/train" class="mb_ttl train">
                    <?php if($plus == 1) echo '<img class="fr" src="/view/img/ico16-plus.png" width="16" height="16" alt="+">'; ?>
  								  Тренировка
                  </a>
                </div>
              </div>
            </div>

            <?php if($core->user['level'] >= 8): ?>
						  <div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/assistants" class="mb_ttl assistants">
                      <?php if($plus == 1) echo '<img class="fr" src="/view/img/ico16-plus.png" width="16" height="16" alt="+">'; ?>
								      Работники
                    </a>
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if($core->user['level'] >= 5): ?>
  						<div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/jewels" class="mb_ttl jewels">
  								    <?php if($plus == 1) echo '<img class="fr" src="/view/img/ico16-plus.png" width="16" height="16" alt="+">'; ?>
  								    Драгоценности
                    </a>
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if($core->user['level'] >= 10): ?>
  						<div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/house" class="mb_ttl myhome">
                      <?php if($plus == 1) echo '<img class="fr" src="/view/img/ico16-plus.png" width="16" height="16" alt="+">'; ?>
  								    Домик
                    </a>
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if($core->user['level'] >= 6): ?>
   						<div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/garden" class="mb_ttl garden">
  								    <?php if($plus == 1) echo '<img class="fr" src="/view/img/ico16-plus.png" width="16" height="16" alt="+">'; ?>
  								    Зимний сад
                    </a>
                  </div>
                </div>
              </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- !CONTROLS 1-->

<!-- CONTROLS 2-->
<div class="marea mt10">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
					  <div class="mbtn orange">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/task" class="mb_ttl quest">
										<?php if($plus == 1) echo '<img class="fr" src="/view/img/ico16-plus.png" width="16" height="16" alt="+">'; ?>
							      Задания
                  </a>
                </div>
              </div>
            </div>
            <div class="mbtn orange">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/categories" class="mb_ttl shop">
								    <?php if($plus == 1) echo '<img class="fr" src="/view/img/ico16-plus.png" width="16" height="16" alt="+">'; ?>
				            Магазин
                  </a>
                </div>
              </div>
            </div>
            <div class="mbtn orange">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/best" class="mb_ttl best">
                    <?php if($plus == 1) echo '<img class="fr" src="/view/img/ico16-plus.png" width="16" height="16" alt="+">'; ?>
                    Лучшие
                  </a>
                </div>
              </div>
            </div>
            <?php if($core->user['level'] >= 5){ ?>
              <div class="mbtn orange">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/paylist" class="mb_ttl coins">Монеты</a>
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