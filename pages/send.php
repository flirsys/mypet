<?php if (!$is_gift && isset($_GET['delete'])) { ?>
  <div class="lplate mt10">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <span class="orange_dark2">Удалить переписку с игроком?</span>
          <form action="/send?id=<?=$user['id']?>&delete" method="POST">
            <input id="yes" type="submit" name="yes" value="1" style="display: none;">
            <label for="yes">
              <div class="buy_link_last">
                <img class="price_img" src="/view/image/icons/ok.png">Удалить
              </div>
            </label>
          </form>
          <a class="buy_link_cancel" href="/send?id=<?=$user['id']?>">
            <img class="price_img" src="/view/image/icons/error.png">Отмена
          </a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc"><?=$is_gift ? 'Подарок' : 'Почта'?> для <a href="/profile?id=<?=$user['id']?>" class="pet_name"><?=$user['name']?></a></div>
  </div>
</div>

<?php if($is_gift){ ?>
  <div class="msg mrg_msg2 mt32">
    <div class="wr_bg">
      <div class="wr_c3 m-3">
        <div class="wr_c4 c_brown4">
          <div class="ttl lyell mmt">
            <div class="tr">
              <div class="tc">Простые <img class="price_img" src="/view/image/icons/coin.png">25</div>
            </div>
          </div>
          <div class="mb5">
            <?php foreach($gifts_list['default'] as $g){ ?>
              <a href="/send?id=<?=$user['id']?>&gift=<?=$g['id']?>"><img class="m2" src="/view/image/item/present<?=$g['id']?>.png"></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="msg mrg_msg2 mt32">
    <div class="wr_bg">
      <div class="wr_c3 m-3">
        <div class="wr_c4 c_brown4">
          <div class="ttl lyell mmt">
            <div class="tr">
              <div class="tc">Премиум <img class="price_img" src="/view/image/icons/coin.png">275</div>
            </div>
          </div>
          <div class="mb5">
            <?php foreach($gifts_list['premium'] as $g){ ?>
              <a href="/send?id=<?=$user['id']?>&gift=<?=$g['id']?>"><img class="m2" src="/view/image/item/present<?=$g['id']?>.png"></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="msg mrg_msg2 mt32">
    <div class="wr_bg">
      <div class="wr_c3 m-3">
        <div class="wr_c4 c_brown4">
          <div class="ttl lyell mmt">
            <div class="tr">
              <div class="tc">VIP <img class="price_img" src="/view/image/icons/coin.png">700</div>
            </div>
          </div>
          <div class="mb5">
            <?php foreach($gifts_list['vip'] as $g){ ?>
              <a href="/send?id=<?=$user['id']?>&gift=<?=$g['id']?>"><img class="m2" src="/view/image/item/present<?=$g['id']?>.png"></a>
            <?php } ?>
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
                    <a href="/send?id=<?=$user['id']?>" class="mb_ttl back">Назад</a>
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
  <?php if($error != false){ ?>
    <div class="lplate mt10 mb10">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3 p4">
            <span class="warning"><?=$error?></span>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if($user['id'] == 0){ ?>
    <div class="lplate mt10 mb10">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3 p4">
            Внимание: это служебный аккаунт.<br>На него нельзя отправить сообщение.
          </div>
        </div>
      </div>
    </div>
  <?php }
  
if($user['id'] != 0) {?>
  <div class="msg mrg_msg1 mt10 c_brown4">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <?php if($core->user['ban_time'] > time()){ ?>
                <div class="center c_red">
                  <span class="orange_dark2 font_13">Вы заблокированы до <?=$core->formatDate($core->user['ban_time'])?></span>
                  <div class="hr" style="margin: 5px 0;"></div>
                  <a class="large darkgreen_link" href="/send?id=<?=$user['id']?>">Обновить</a>
                </div>
              <?php } else{ ?>
                <form method="POST">
                  <?php if($gift != false){ ?>
                    <img src="/view/image/item/present<?=$gift['id']?>.png">
                    <br>(Сообщение, не обязательно)
                  <?php } ?>

                  <textarea rows="5" class="send_message" name="message_text"></textarea>
                  <div class="bbtn_sm mt5">
                    <div class="br">
                      <input type="submit" class="green_sm2" value="Отправить">
                    </div>
                  </div>
                  <a class="fr m5" href="/send?id=<?=$user['id']?>&gifts">
                    <img src="/view/image/icons/gift.png">
                  </a>
                  <br>
                  <span class="text_small">Стоимость сообщения <img class="price_img" src="/view/image/icons/<?=$price[0]?>.png"><?=$price[1]?></span>
                </form>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
    $count = 0;
    foreach($mess->getMessages($my_id, $user['id'], $page_num) as $m){
      $from = $m['from'] == $my_id ? $core->user : $user;
      if($from['id'] != $core->user['id'] && $m['read'] == 0) $mess->setRead($m['id'], $core->user['id']);
      $_me = $from['id'] == $core->user['id'];
      $count++;
      $gift = $m['gift'] != null ? $gifts->getGift($m['gift']) : null;
  ?>
    <div class="msg mrg_msg1 mt5 c_brown4">
      <div class="wr_bg">
        <div class="wr_c1">
          <div class="wr_c2">
            <div class="wr_c3">
              <div class="wr_c4 post_msg">
                <div class="post_title">
                  <a href="profile?id=<?=$from['id']?>" class="">
                    <img src="/view/image/avatar_s<?=$from['pet']?>.png" class="pet_icon mb3">
                    <?=$_me ? 'Я' : $from['name']?>
                    <?php if (!$_me && (time() - $from['online_time']) < 2.5*60) {?>
                      <img class="price_img" src="/view/image/icons/online.png">
                    <?php } ?>
                  </a>
                  <span class="post_date nowrap"><?=$core->formatDate($m['time'])?></span>
                </div>
                <div class="post_content">
                  <?php if($gift === false){ ?>
                    <div class="center m-gift">
                      Подарок удалён
                    </div>
                  <?php } ?>
                  <?php if($gift !== null){ ?>
                    <div class="center m-gift " style="background-color: <?=$gifts->getGradientColor($gift['rare'] * 100)?>;">
                      <img src="/view/image/item/present<?=$gift['giftid']?>.png" style="width: 60px;">
                      <br><span>Редкость: <?=$gift['rare']?></span>
                      <?=$gift['text'] != '' ? '<div>'.$core->lowBB($gift['text']).'</div>' : ''?>
                    </div>
                  <?php } ?>
                  <span <?=$_me ? 'class="c_blue4"' : '' ?>><?=$core->BB($m['text'])?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php if($count <= 0){ ?>
    <div class="msg mrg_msg1 mt10 c_brown4">
      <div class="wr_bg">
        <div class="wr_c1">
          <div class="wr_c2">
            <div class="wr_c3">
              <div class="wr_c4">Сообщений нет</div>
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
  <?php } ?>
  <div class="marea mt10">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <?php if($count > 0){ ?>
                <div class="mbtn">
                  <div class="mb_r">
                    <div class="mb_c">
                      <a href="/send?id=<?=$user['id']?>&delete" class="mb_ttl error">Удалить переписку</a>
                    </div>
                  </div>
                </div>
              <?php } ?>
              <div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/messages" class="mb_ttl back">Почта</a>
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