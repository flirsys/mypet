<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc"><?=$name?></div>
  </div>
</div>

<?php if(isSet($error)): ?>
  <div class="msg mrg_msg1 mt10 c_brown">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <span class="warning">Вам не хватает <img src="/view/image/icons/coin.png" class="price_img"><?=$error?> монет</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>


<?php
  if($c_ == 'cloth'){
    for($i = 1; $i <= 6; $i++){
      $pet_c = $g_shop['c'.$i] ?? 0;
?>
  <div class="msg mrg_msg1 mt10 c_brown4">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4 left">
              <div class="shop_item">
                <img class="item_icon" src="/view/image/item/<?=$sets_list[$c_id][$i]['name']?>.png">
                <div class="text_item">
                  <span class="span1 ib mt3">
                    <?=$sets_list[$c_id][$i]['ru']?>
                  </span>
                  <span class="span2">
                    <div class="ml2_price_img"><?=(in_array($i, [2,4]) ? 'Одежда' : (in_array($i, [1,3]) ? 'Аксессуар' : (in_array($i, [5,6]) ? 'Украшение ' : '')))?> +<img class="price_img" src="/view/image/icons/beauty.png"><?=$sets_list[$c_id]['beauty']?></div>
                    <div class="ilblock">

                      <?php if($core->user['level'] >= $sets_list[$c_id]['level']){ ?>
                        <?php if($pet_c < $c_id){ ?>
                          <div class="mt5">
                            <a href="?category=cloth&amp;id=<?=$c_id?>&amp;buy=<?=$i?>" class="bbtn">
                              <span class="br">
                                <span class="bc plr5">Купить за  <img src="/view/image/icons/coin.png" class="price_img"><?=$sets_list[$c_id]['price']?></span>
                              </span>
                            </a>
                          </div>
                        <?php } else { ?>
                          <div>
                            <span class="disabled">Ваша вещь лучше</span>
                          </div>
                        <?php } ?>        
                      <?php }else{ ?>
                        <a href="" class="bbtn_disabled omin_ml">
                          <span class="br">
                            <span class="bc plr5">требуется <?=$sets_list[$c_id]['level']?> уровень</span>
                          </span>
                        </a>
                      <?php } ?>
                    </div>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>

  <div class="msg mrg_msg1 mt10 c_brown3">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4" style="padding:9px 9px">
              После покупки, любую вещь этого комплекта вы в дальнейшем сможете продать за <img src="/view/image/icons/coin.png" class="price_img"><?=floor($sets_list[$c_id]['price'] * 0.75)?> монет
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
                    <a href="/sets" class="mb_ttl back">Назад к комплектам</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php
  }else if($c_ == 'food'){
    if(isSet($food_list[$u_food+1])){ ?>
<div class="msg mrg_msg1 mt10 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4 left">
            <div class="shop_item">
              <img class="item_icon" src="/view/image/item/<?=$new_food['name']?>.png">
              <div class="text_item">
                <span class="span1">
                  <span class="disabled"><?=$new_food['ru_name']?></span>
                </span>
                <span class="span2 ">
                  <span class="buy_link_level blocks pad_8b">+<img class="price_img" src="/view/image/icons/beauty.png"><?=$new_food_s['beauty']?> красоты
                  <br>+<img class="price_img" src="/view/image/icons/expirience.png"><?=$new_food_s['exp']?> опыта
                  <br>+<img class="price_img" src="/view/image/icons/heart.png"><?=$new_food_s['heart']?> сердечек</span>
                  <div class="mt5">
                    <?php if($core->user['level'] >= $new_food_s['level']){ ?>
                      <a href="/items?category=food&buy=<?=$u_food+1?>" class="bbtn omin_ml">
                        <span class="br">
                          <span class="bc plr5">
                            Купить за <img src="/view/image/icons/coin.png" class="price_img"><?=$new_food_s['price']?>
                          </span>
                        </span>
                      </a>
                    <?php }else{ ?>
                      <a href="" class="bbtn_disabled omin_ml">
                        <span class="br">
                          <span class="bc plr5">требуется <?=$new_food_s['level']?> уровень</span>
                        </span>
                      </a>
                    <?php } ?>
                  </div>
                </span>
              </div>
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
          <div class="wr_c4 left">
            <div class="shop_item">
              <img class="item_icon" src="/view/image/item/<?=$my_food['name']?>.png">
              <div class="text_item">
                <span class="span1">
                  <span class="disabled">
                    <?=$my_food['ru_name']?> <span class="font_14">(текущий)</span>
									</span>
                </span>
                <span class="span2 ">
                  <span class="disabled">
                    <span class="buy_link_level blocks pad_8b">
                      +<img class="price_img" src="/view/image/icons/beauty.png"><?=$my_food_s['beauty']?> красоты
                      <br>+<img class="price_img" src="/view/image/icons/expirience.png"><?=$my_food_s['exp']?> опыта
                      <br>+<img class="price_img" src="/view/image/icons/heart.png"><?=$my_food_s['heart']?> сердечек
                    </span>
                  </span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="msg mrg_msg1 mt10 c_brown3">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4" style="padding:9px 9px">
            Еда увеличивает сердечки и опыт, получаемые за действие с питомцем, а также навсегда повышают красоту питомца.
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
                  <a href="/categories" class="mb_ttl back">Назад в Магазин</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  }else if($c_ == 'play'){
    if(isSet($play_list[$u_play+1])){ ?>
<div class="msg mrg_msg1 mt10 c_brown4">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4 left">
            <div class="shop_item">
              <img class="item_icon" src="/view/image/item/<?=$new_play['name']?>.png?">
              <div class="text_item">
                <span class="span1">
                  <span class="disabled"><?=$new_play['ru_name']?></span>
                </span>
                <span class="span2 ">
                  <span class="buy_link_level blocks pad_8b">
                    +<img class="price_img" src="/view/image/icons/beauty.png"><?=$new_play_s['beauty']?> красоты
                    <br>+<img class="price_img" src="/view/image/icons/expirience.png"><?=$new_play_s['exp']?> опыта
                    <br>+<img class="price_img" src="/view/image/icons/heart.png"><?=$new_play_s['heart']?> сердечек
                  </span>
                  <div class="mt5">
                    <?php if($core->user['level'] >= $new_play_s['level']){ ?>
                      <a href="/items?category=play&buy=<?=$u_play+1?>" class="bbtn omin_ml">
                        <span class="br">
                          <span class="bc plr5">
                            Купить за <img src="/view/image/icons/coin.png" class="price_img"><?=$new_play_s['price']?>
                          </span>
                        </span>
                      </a>
                    <?php }else{ ?>
                      <a href="" class="bbtn_disabled omin_ml">
                        <span class="br">
                          <span class="bc plr5">требуется <?=$new_play_s['level']?> уровень</span>
                        </span>
                      </a>
                    <?php } ?>
                  </div>
                </span>
              </div>
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
          <div class="wr_c4 left">
            <div class="shop_item">
              <img class="item_icon" src="/view/image/item/<?=$my_play['name']?>.png">
              <div class="text_item">
                <span class="span1">
                  <span class="disabled">
                    <?=$my_play['ru_name']?> <span class="font_14">(текущий)</span>
                  </span>
                </span>
                <span class="span2 ">
                  <span class="disabled">
                    <span class="buy_link_level blocks pad_8b">
                      +<img class="price_img" src="/view/image/icons/beauty.png"><?=$my_play_s['beauty']?> красоты
                      <br>+<img class="price_img" src="/view/image/icons/expirience.png"><?=$my_play_s['exp']?> опыта
                      <br>+<img class="price_img" src="/view/image/icons/heart.png"><?=$my_play_s['heart']?> сердечек
                    </span>
                  </span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="msg mrg_msg1 mt10 c_brown3">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4" style="padding:9px 9px">
            Игры увеличивают сердечки и опыт, получаемые за действие с питомцем, а также навсегда повышают красоту питомца.
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
                  <a href="/categories" class="mb_ttl back">Назад в Магазин</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  }else if($c_ == 'effect'){
?>
<div class="msg mrg_msg1 mt10 c_brown4">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4 left">
            <div class="shop_item">
              <span>
                <img class="item_icon" src="/view/image/item/vip1.png">
              </span>
              <div class="text_item">
                <span class="span1">
                  <span class="font_17 ib mt3 mb3">Премиум-аккаунт</span>
                </span>
                <span class="span2">
                  +<img class="price_img" src="/view/image/icons/expirience.png">80% опыта
                  <br>+<img class="price_img" src="/view/image/icons/heart.png">50% сердечек
                  <br>- <img class="price_img" src="/view/image/icons/coin.png">15% стоимость витаминок
                  <br>
                  <div class="mt7 ib">
                    <a href="/items?category=effect&buy=1" class="bbtn">
                      <span class="br">
                        <span class="bc plr5"><?=$core->user['premium_time'] == 0 || $core->user['premium_time'] < time() ? 'Купить' : 'Продлить'?> за <img src="/view/image/icons/coin.png" class="price_img">50 на 24 часа</span>
                      </span>
                    </a>
                    <?php if($core->user['premium_time'] > 1) { ?>
                      <div class="cntr font_13" style="color:gray">Действует до <?=$core->formatDate($core->user['premium_time'])?></div>
                    <?php } ?>
                  </div>
                </span>
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
                  <a href="/categories" class="mb_ttl back">Назад в Магазин</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>