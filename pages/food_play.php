<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">
      Еда и игры
    </div>
  </div>
</div>

<div class="msg mrg_msg1 mt10 mb10 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <a class="online_link<?=$type == 'food' ? '1' : '0'?>" href="<?=$dop_href?>type=food">Еда</a>
            <img src="/view/img/ico16-separator.png" class="mlr5" width="16" height="16" alt="|">
            <a class="online_link<?=$type == 'play' ? '1' : '0'?>" href="<?=$dop_href?>type=play">Игры</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<center>
	<div class="ib plr5">
    <?php
      $beauty = 0;
      for($i=1;$i<=$my_;$i++){
        $beauty += ($type == 'food' ? $core->getFoodStats($i) : $core->getPlayStats($i))['beauty'];
    ?>
      <div class="msg" style="margin: 0px; display: inline-block; width: 60px; margin-bottom: 5px;">
        <div class="wr_bg">
          <div class="wr_c1">
            <div class="wr_c2">
              <div class="wr_c3">
                <div class="wr_c4">
                  <img class="pr5" src="/view/image/item/<?=$list[$i]['name']?>.png" height="48" width="48" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
      }
    ?>
	</div>
</center>

<div class="msg mrg_msg1 mt10 mb10 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            со всех +<img class="price_img" src="/view/image/icons/beauty.png"><?=$beauty?> красоты
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