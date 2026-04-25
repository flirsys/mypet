<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">Кубки и медали</div>
  </div>
</div>

<div class="msg mrg_msg1 mt10 mb10 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <a class="online_link<?=$type == 'cups' ? '1' : '0'?>" href="<?=$dop_href?>type=cups">Кубки</a>
            <img src="/view/img/ico16-separator.png" class="mlr5" width="16" height="16" alt="|">
            <a class="online_link<?=$type == 'medals' ? '1' : '0'?>" href="<?=$dop_href?>type=medals">Медали</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  $count = 0;
  $beauty = 0;
  $heart = 0;
  $exp = 0;
  for($i=1;$i<=$my_;$i++){
    $count++;
    if($type == 'cups'){
      $beauty += $list[$i]['beauty'];
    }else{
      $heart += $list[$i]['heart'];
      $exp += $list[$i]['exp'];
    }
?>
<div class="msg mrg_msg1 mt5 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <div class="item">
              <img class="item_icon" src="/view/image/item/<?=$list[$i]['name']?>.png">
              <div class="text_item">
                <span class="span1">
                  <span class="cup"><?=$list[$i]['ru']?></span>
                </span>
                <span class="span2">
                  <?php if($type == 'cups'){ ?>
                    +<img class="price_img" src="/view/image/icons/beauty.png"><?=$list[$i]['beauty']?>% к красоте
                  <?php }else{ ?>
                    +<img class="price_img" src="/view/image/icons/heart.png"><?=$list[$i]['heart']?>%, +<img class="price_img" src="/view/image/icons/expirience.png"><?=$list[$i]['exp']?>%
                  <?php } ?>
                </span>
              </div>
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

<?php if($count <= 0){ ?>
  <div class="msg mrg_msg1 mt5 c_brown3">
		<div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              Питомец еще не <?=$type == 'cups' ? 'выигрывал кубков' : 'получал медали'?>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
<?php }else{ ?>
  <div class="msg mrg_msg1 mt10 c_brown3">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <?=$type == 'cups' ? 'Кубки' : 'Медали'?> дают бонус +<?php if($type == 'cups'){ ?><img class="price_img" src="/view/image/icons/beauty.png"><?=$beauty?>% к красоте<?php }else{ ?><img class="price_img" src="/view/image/icons/heart.png"><?=$heart?>% и +<img class="price_img" src="/view/image/icons/expirience.png"><?=$exp?>%<?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<div class="marea mt10">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <div class="mbtn">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/profile<?=$dop_href?>" class="mb_ttl back">Назад</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>