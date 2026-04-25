<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">Сменить вид питомца</div>
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
  foreach($copp_ava_list as $ava){
?>
<div class="msg mrg_msg1 mt10 c_brown4">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <div class="item">
              <img class="item_icon plr5 mt3" src="/view/image/item/avatar<?=$ava['id']?>.png">
              <div class="text_home_slot">
                <span class="span1 mt3">
                  <span class="c_orange4"><?=$ava['name']?></span>
                </span>
                <span class="span2">
                  <?php if($core->user['pet'] == $ava['id']){ ?>
                    <span class="span4 c_brown3">текущий</span>
                  <?php }else{ ?>
                    <div class="mt5">
                      <?php if(array_key_exists($ava['id'], $g_pets)){ ?>
                        <a href="/avatars?page=<?=$page_num?>&set=<?=$ava['id']?>" class="bbtn">
                          <span class="br">
                            <span class="bc plr5">Выбрать</span>
                          </span>
                        </a>
                      <?php }else{ ?>
                        <a href="/avatars?page=<?=$page_num?>&buy=<?=$ava['id']?>" class="bbtn">
                          <span class="br">
                            <span class="bc plr5">Купить за <img src="/view/image/icons/coin.png" class="price_img">500</span>
                          </span>
                        </a>
                      <?php } ?>
                    </div>
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
<?php } ?>

<div class="msg mrg_msg1 mt10 c_brown">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <div class="pgn">
              <?php if($page_num >= 2): ?>
                <a class="page_link <?=$page_num?>" href="?page=<?=$page_num-1?>"><?=$page_num-1?></a>
              <?php endif; ?>
              <a class="page_link_current cur" href="?page=<?=$page_num?>"><?=$page_num?></a>
              <?php if($page_num < 2): ?>
                <a class="page_link" href="?page=<?=$page_num+1?>"><?=$page_num+1?></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="msg mrg_msg1 mt10 mb10 c_brown3">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            В любой момент можно сменить вид питомца, выбрав его из доступных вариантов, либо купить новый.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>