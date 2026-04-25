<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">Тренировка навыков</div>
  </div>
</div>


<div class="msg mrg_msg1 mt10 c_brown3">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4" style="padding: 5px;">
            <span class="train_glamour">Гламур: <span><img class="price_img" src="/view/image/icons/glamour.png"><?=$glamour?></span></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if(isSet($error)): ?>
  <div class="msg mrg_msg1 mt10 c_brown">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <span class="warning">Вам не хватает <img src="/view/image/icons/<?=$error[0]?>.png" class="price_img"><?=$error[1]?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="msg mrg_msg1 mt10 c_brown">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <img class="fl m5" src="/view/image/item/king1.png" width="48" height="48" alt="">
            <div class="font_14 c_brown3 left ml65 mt5">
				      <div class="c_orange4 font_17 mb3 ml2_price_img">
                Одежда +<img src="/view/image/icons/beauty.png" class="price_img"><?=$cloth[1]?>
              </div>
				      <div class="mb3 ml2_price_img">
                <span class="text_small">
                  Вся одежда дает на <span>+<img class="price_img" src="/view/image/icons/beauty.png"><?=$cloth[1]?></span> больше красоты
                </span>
                <br>Уровень: <?=$cloth[0]?>
              </div>
            </div>
            <div class="clb"></div>
            <?php if($_my) { ?>
              <a href="/train?up=cloth" class="bbtn mt5 mb5">
                <span class="br">
                  <span class="bc">
                    Тренировать  за <img src="/view/image/icons/<?=$cloth[2][0]?>.png" class="price_img"><?=$cloth[2][1]?>
                  </span>
                </span>
              </a>
            <?php } ?>
					</div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="msg mrg_msg1 mt10 c_brown">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <img class="fl m5" src="/view/image/item/king2.png" width="48" height="48" alt="">
			      <div class="font_14 c_brown3 left ml65 mt5">
				      <div class="c_orange4 font_17 mb3 ml2_price_img">
                Аксессуары +<img src="/view/image/icons/beauty.png" class="price_img"><?=$accessory[1]?>
              </div>
              <div class="mb3 ml2_price_img">
                <span class="text_small">
                  Все аксессуары дают на <span>+<img class="price_img" src="/view/image/icons/beauty.png"><?=$accessory[1]?></span> больше красоты
                </span>
                <br>Уровень: <?=$accessory[0]?>
              </div>
            </div>
            <div class="clb"></div>
            <?php if($_my) { ?>
              <a href="/train?up=accessory" class="bbtn mt5 mb5">
                <span class="br">
                  <span class="bc">
                    Тренировать  за <img src="/view/image/icons/<?=$accessory[2][0]?>.png" class="price_img"><?=$accessory[2][1]?>
                  </span>
                </span>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="msg mrg_msg1 mt10 c_brown">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <img class="fl m5" src="/view/image/item/king3.png" width="48" height="48" alt="">
            <div class="font_14 c_brown3 left ml65 mt5">
              <div class="c_orange4 font_17 mb3 ml2_price_img">
                Украшения +<img src="/view/image/icons/beauty.png" class="price_img"><?=$style[1]?>
              </div>
              <div class="mb3 ml2_price_img">
                <span class="text_small">
                  Все украшения дают на <span>+<img class="price_img" src="/view/image/icons/beauty.png"><?=$style[1]?></span> больше красоты
                </span>
                <br>Уровень: <?=$style[0]?>
              </div>
            </div>
            <div class="clb"></div>
            <?php if($_my) { ?>
              <a href="/train?up=style" class="bbtn mt5 mb5">
                <span class="br">
                  <span class="bc">
                    Тренировать  за <img src="/view/image/icons/<?=$style[2][0]?>.png" class="price_img"><?=$style[2][1]?>
                  </span>
                </span>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="msg mrg_msg1 mt10 c_brown">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <img class="fl m5" src="/view/image/item/present12.png" width="48" height="48" alt="">
            <div class="font_14 c_brown3 left ml65 mt5">
              <div class="c_orange4 font_17 mb3 ml2_price_img">
                Ловкость +<img src="/view/image/icons/beauty.png" class="price_img"><?=$glade[1]?>
              </div>
              <div class="mb3 ml2_price_img">
                <span class="ib">
                  <?php if($_my) { ?>
                    <div class="mb3">
                      Уникальные способности вашего питомца
                    </div>
                  <?php } ?>
                  <div class="mb3">
                    Поляна: <?=$glade[3][0]?>% к поиску семян
                  </div>
                  <div class="mb3">
                    Уворот в снежках: <?=$glade[3][1]?> сек
                  </div>
                </span>
                <br>Уровень: <?=$glade[0]?>
              </div>
            </div>
            <div class="clb"></div>
            <?php if($_my) { ?>
              <a href="/train?up=glade" class="bbtn mt5 mb5">
                <span class="br">
                  <span class="bc">
                    Тренировать  за <img src="/view/image/icons/<?=$glade[2][0]?>.png" class="price_img"><?=$glade[2][1]?>
                  </span>
                </span>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if($_my) { ?>
  <div class="msg mrg_msg1 mt10 c_brown3">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4 price_img_cont">
              Каждая тренировка одежды, аксессуаров, украшений и ловкости увеличивает красоту и гламур на +1
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