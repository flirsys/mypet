<?php if($error != false) { ?>
  <div class="lplate mt10">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <span class="warning"><?=$error?></span>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<div class="ttl lgreen mrg_ttl mt10 mb10">
  <div class="tr">
    <div class="tc">Предметы в домике</div>
  </div>
</div>

<div class="msg mrg_msg1 mt10 mb10 c_brown3">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4 ml2_price_img">
            Бонус предметов: +<img src="/view/image/icons/beauty.png" class="price_img"><?=$beauty?> красоты<br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
	$i = 0;
	foreach($list as $item){
		$i++;
		$h = ['lvl' => $g_shop['h'.$i] ?? 0];
	  $h['icon'] = $h['lvl'] <= 3 ? 1 : ($h['lvl'] <= 7 ? 2 : ($h['lvl'] <= 10 ? 3 : 3));
		$h['price'] = round((($h['lvl'] + 1) * 16) ** 1.5);
?>
<div class="msg mrg_msg1 mt5 c_brown4">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4 left item">
            <img class="item_icon" src="/view/image/item/home<?=$i?><?=$h['icon']?>.png">
            <div class="text_home_slot">
              <span class="span1 ib mt3 mb3 ml2_price_img">
                <?=$item?> <span class="orange_dark2">+<img class="price_img" src="/view/image/icons/beauty.png"><?=$h['lvl']*10?></span>
              </span>
              <span class="span2">
                <div>
                  <span class="nowrap">
                    <?php
											$rating = $h['lvl'] / 2;
											for ($ii = 1; $ii <= 5; $ii++) {
												$s = 1;
												if ($rating >= $ii) $s = 3;
												elseif ($rating > $ii - 1 && $rating < $ii) $s = 2;
										?>
											<img class="price_img" src="/view/image/icons/star<?=$s?>.png">
										<?php } ?>
                  </span>
                </div>
								<?php if($h['lvl'] < 10 && $_my){ ?>
									<a href="/house_list?up=<?=$i?>" class="bbtn mt5 mb5">
										<span class="br">
											<span class="bc">
												<?=$h['lvl'] < 1 ? 'Купить' : 'Улучшить'?> за <img class="price_img" src="/view/image/icons/coin.png"><?=$h['price']?>
											</span>
										</span>
									</a>
									<br>
									<span class="c_brown3 font_13 ib mar_3t ml2_price_img">
										Добавит +<img src="/view/image/icons/beauty.png" class="price_img">10
									</span>
								<?php } ?>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
	}
?>

<div class="marea mt10">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <div class="mbtn">
              <div class="mb_r">
                <div class="mb_c">
									<a href="/<?=$_my ? 'house' : 'profile?id='.$user['id']?>" class="mb_ttl back">Назад<?=$_my ? ' в домик' : ''?></a>
								</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>