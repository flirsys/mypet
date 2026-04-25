<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">Подарки (<?=$all_gifts?>)</div>
  </div>
</div>

<?php
  $count = 0;
  foreach($list as $gift){
    $from = $core->getUser($gift['from'], null, false);
    $count++;
?>
  <div class="msg mrg_msg1 mt5 c_brown4">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4" style="text-align: left;">
              <span class="span1_gift c_orange4 ib mb5">
                От <a class="pet_name il c_orange4 font_17" href="/profile?id=<?=$from['id']?>"><img src="/view/image/avatar_s<?=$from['pet']?>.png"><?=$from['name']?></a>
              </span>
              <span class="post_date nowrap" style="font-size: 12px; top:3px; right: 2px;"><?=$core->formatDate($gift['time'])?></span>
              <div class="center m-gift" style="background-color: <?=$gifts->getGradientColor($gift['rare'] * 100)?>;">
                <img src="/view/image/item/present<?=$gift['giftid']?>.png" style="width: 60px;">
                <br><span>Редкость: <?=$gift['rare']?></span>
                <?=$gift['text'] != '' ? '<div>'.$core->lowBB($gift['text']).'</div>' : ''?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php if($count <= 0){ ?>
  <div class="msg mrg_msg1 mt5 c_brown3">
		<div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              Питомец еще не получал подарков
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
<?php }else{ ?>
  <div class="msg mrg_msg1 mt10 c_brown4">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4 pgn">
              <?php if($page_num > 1): ?>
                <a class="page_link" href="?id=<?=$user['id']?>&page=1">&lt;&lt;</a>
              <?php endif; ?>
              <?php if($page_num >= 2): ?>
                <a class="page_link <?=$page_num?>" href="?id=<?=$user['id']?>&page=<?=$page_num-1?>"><?=$page_num-1?></a>
              <?php endif; ?>
              <a class="page_link_current cur" href="?id=<?=$user['id']?>&page=<?=$page_num?>"><?=$page_num?></a>
              <?php if($maxpage > $page_num): ?>
                <a class="page_link" href="?id=<?=$user['id']?>&page=<?=$page_num+1?>"><?=$page_num+1?></a>
              <?php endif; ?>
              <?php if($page_num < $maxpage): ?>
                <a class="page_link" href="?id=<?=$user['id']?>&page=<?=$maxpage?>">&gt;&gt;</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if($_my){ ?>
    <div class="marea mt10">
      <div class="wr_bg">
        <div class="wr_c1">
          <div class="wr_c2">
            <div class="wr_c3">
              <div class="wr_c4">
                <div class="mbtn">
                  <div class="mb_r">
                    <div class="mb_c">
                      <a href="/gifts?control" class="mb_ttl ok">Редактирование</a>
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
