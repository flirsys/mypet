<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">Шкаф</div>
  </div>
</div>

<?php if($all_chest > 0){
  foreach($chest->getAll($core->user['id']) as $item){
    $i = $chest->getItem($item['type'], $item['item']);
    $pet_item = $g_shop[$item['type']] ?? 0;
?>
  <div class="msg mrg_msg1 mt5 c_brown4">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <div class="item">
                <img class="item_icon" src="/view/image/item/<?=$i['icon']?>.png">
                <div class="text_item">
                  <span class="span1">
                    <div class="mt3"><?=$i['name']?></div>
                  </span>
                  <span class="span2">
                    Одежда +<img class="price_img" src="/view/image/icons/beauty.png"><?=$i['beauty']?>
                    <br>
                    <?php if($pet_item > $item['item']){ ?>
                      <div>
                        <span class="disabled">Ваша вещь лучше</span>
                      </div>
                    <?php } else { ?>
                      <a href="/chest?use=<?=$item['id']?>" class="bbtn mt5 vb">
                        <span class="br">
                          <span class="bc">Надеть</span>
                        </span>
                      </a>
                      <span class="va"> или </span>
                    <?php } ?>  
                    <span>
                      <a class="sell_link va font_14 c_brown3" href="/chest?sell=<?=$item['id']?>">Продать</a>
                      <span class="va"> за <img src="/view/image/icons/coin.png" class="price_img"><?=$i['price']?></span>
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
<?php
  }
}else{ ?>
  <div class="msg mrg_msg1 mt5 c_brown4">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <div class="cntr">
                В шкафу пусто
              </div>
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
                  <a href="/gear" class="mb_ttl slots">
                    Одежда <span class="text_vmenu nwr">(<?=$all_c?> из 6)</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>