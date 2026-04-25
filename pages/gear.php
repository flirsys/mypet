<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">Одежда</div>
  </div>
</div>

<?php
  $beauty = 0;
  for($i=1;$i<=6;$i++){
    $pet_c = $g_shop['c'.$i] ?? 0;
    $type = in_array($i, [2,4]) ? 'Одежда' : (in_array($i, [1,3]) ? 'Аксессуар' : (in_array($i, [5,6]) ? 'Украшение ' : ''));
    $beauty += $pet_c != 0 ? $sets_list[$pet_c]['beauty'] : 0;
?>
  <div class="msg mrg_msg1 mt5 c_brown4">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <div class="item">
                <img class="item_icon" src="/view/image/item/<?=($pet_c == 0 ? 'empty' : $sets_list[$pet_c][$i]['name'])?>.png">
                <div class="text_item_slot">
                  <span class="span1 mt3">
                    <?=($pet_c == 0 ? 'Ничего' : $sets_list[$pet_c][$i]['ru'])?>
                  </span>
                  <span class="span2">
                    <?=$type?> <?php if($pet_c != 0){ ?>+<img class="price_img" src="/view/image/icons/beauty.png"><?=$sets_list[$pet_c]['beauty']?><br>
                    <?php if($_my){ ?><a class="strip_link mt2 mb2" href="/gear?remove=<?=$i?>">Снять</a><?php } ?>
                    <?php }else if($pet_c == 0 && $_my){ ?><br>
                      <a href="/sets" class="bbtn mt5">
                        <span class="br">
                          <span class="bc">Купить</span>
                        </span>
                      </a>
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

<div class="msg mrg_msg1 mt10 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4" style="padding: 3px 6px 8px 6px;">
            <?php if($_my) { ?>
              Ваши вещи дают вам +<img class="ml2" src="/view/image/icons/beauty.png"><?=$beauty?> красоты
              <br>Чем выше красота, тем быстрее вы победите на выставках! Хорошие вещи можно всегда купить в магазине
            <?php }else{ ?>
              Вещи дают <?=$user['name']?> +<img class="ml2" src="/view/image/icons/beauty.png"><?=$beauty?> красоты
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if($_my) { ?>
  <div class="marea mt10">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/chest" class="mb_ttl chest">
                      Шкаф <span class="text_vmenu nwr">(<?=$all_chest?>)</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/sets" class="mb_ttl shop">Магазин</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php }else{ ?>
  <div class="marea mt10">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/profile?id=<?=$user['id']?>" class="mb_ttl back">Назад</a>
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