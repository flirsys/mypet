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
              <span class="warning"><?=$error?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php if($type == 'heart'){ ?>
		
<div class="msg mrg_msg1 mt5 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4 font_14">
            <div class="pay_text ln center">
              <span class="span1">
                <div class="mt2">
                  <img class="price_img" src="/view/image/icons/heart.png"><span class="pay_coin">500 сердечек</span>
                </div>
              </span>
              <span class="span2">
                <a href="/paylist?type=heart&buy=1" class="bbtn mt5 mb5">
                  <span class="br">
                    <span class="bc">Купить за <img class="price_img" src="/view/image/icons/coin.png">1</span>
                  </span>
                </a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="msg mrg_msg1 mt5 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4 font_14">
            <div class="pay_text ln center">
              <span class="span1">
                <div class="mt2">
                  <img class="price_img" src="/view/image/icons/heart.png"><span class="pay_coin">5 000 сердечек</span>
                </div>
              </span>
              <span class="span2">
                <a href="/paylist?type=heart&buy=2" class="bbtn mt5 mb5">
                  <span class="br">
                    <span class="bc">Купить за <img class="price_img" src="/view/image/icons/coin.png">10</span>
                  </span>
                </a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="msg mrg_msg1 mt5 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4 font_14">
            <div class="pay_text ln center">
              <span class="span1">
                <div class="mt2">
                  <img class="price_img" src="/view/image/icons/heart.png"><span class="pay_coin">50 000 сердечек</span>
                </div>
              </span>
              <span class="span2">
                <a href="/paylist?type=heart&buy=3" class="bbtn mt5 mb5">
                  <span class="br">
                    <span class="bc">Купить за <img class="price_img" src="/view/image/icons/coin.png">100</span>
                  </span>
                </a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="msg mrg_msg1 mt5 c_brown4">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4 font_14">
            <div class="pay_text ln center">
              <span class="span1">
                <div class="mt2">
                  <img class="price_img" src="/view/image/icons/heart.png"><span class="pay_coin">500 000 сердечек</span>
                </div>
              </span>
              <span class="span2">
                <a href="/paylist?type=heart&buy=4" class="bbtn mt5 mb5">
                  <span class="br">
                    <span class="bc">Купить за <img class="price_img" src="/view/image/icons/coin.png">1000</span>
                  </span>
                </a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="msg mrg_msg1 mt5 c_brown3">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            Здесь можно обменять монеты на сердечки
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php }else if($type == 'coin'){ ?>

<div class="msg mrg_msg1 mt10 c_orange4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <img class="mt5 mb7" src="/view/image/action/show.jpg" alt="">
            <div class="c_brown3">
              <div class="c_brown3">
        			<?php if($rem_coins <= 0) { ?>
                На выставке сегодня больше нет <img src="/view/image/icons/coin.png" alt=""> монет
              <?php }else{ ?>
                Сегодня на Выставке осталось еще <img src="/view/image/icons/coin.png" alt=""><?=$rem_coins?> монеты
              <?php } ?>
              </div>
            </div>
            <?php if($rem_coins > 0) { ?>
              <div class="center">
                <a href="/paylist?type=coin&get" class="bbtn mt5 mb5">
                  <span class="br">
                    <span class="bc">Получить за <img class="price_img" src="/view/image/icons/heart.png" alt=""><?=$price?></span>
                  </span>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="msg mrg_msg1 mt5 c_orange3">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4 c_brown3">
            Здесь можно забрать все оставшиеся на сегодня монеты досрочно, без выставок, но за сердечки
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
                    <a href="/paylist?type=heart" class="mb_ttl heart">Купить сердечки</a>
                  </div>
                </div>
              </div>
              <div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/paylist?type=coin" class="mb_ttl coin">Обменник</a>
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

<div class="marea mt10">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <div class="mbtn">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/<?=$back?>" class="mb_ttl back">Назад</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>