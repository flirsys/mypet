<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">Почта</div>
  </div>
</div>

<div class="msg mrg_msg1 mt10 c_brown4">
	<div class="wr_bg no_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3 no_bg">
          <div class="wr_c4 no_bg p10">
            <div class="posters font_14">

              <?php
                $count = 0;
                foreach($mess->getChats($core->user['id'], $page_num) as $m){
                $user = $core->getUser($m['partner_id'], null, false);
                $read = $m['unread_count'] <= 0;
                $count++;
                $gift = $m['gift'] != null ? true : null;
              ?>
                <div class="poster mb3">
                  <div class="post_lint2 mb3">
                    <div class="pl_cont">
                      <img class="price_img mt2 mr2" src="/view/image/avatar_s<?=$user['pet']?>.png">
                      <a href="/profile?id=<?=$user['id']?>" class="<?=(1 == 1 ?: 'darkgreen_link')?>"><?=$user['name']?><?php if ((time() - $user['online_time']) < 2.5*60) {?><img class="price_img" src="/view/image/icons/online.png"><?php } ?></a>:
                      <a href="/send?id=<?=$user['id']?>" class="<?=$read ? 'read' : 'unread'?>_post mw">
                        <?=$gift !== null ? 'Подарок ' : ''?><?=$core->lowBB($m['text'])?>
                      </a>
                    </div>
                    <div class="pl_date">
                      <a href="/send?id=<?=$user['id']?>" class="<?=$read ? 'read' : 'unread'?>_post td_no">
                        <?=$core->formatDate($m['time'])?>
                      </a>
                    </div>
                  </div>
                </div>
              <?php } ?>
            
            </div>
            <?php if($count <= 0){ ?>
              Сообщений нет
            <?php }else{ ?>
              <div class="pgn">
                <?php if($page_num > 1): ?>
                  <a class="page_link" href="?page=1">&lt;&lt;</a>
                <?php endif; ?>
                <?php if($page_num >= 2): ?>
                  <a class="page_link <?=$page_num?>" href="?page=<?=$page_num-1?>"><?=$page_num-1?></a>
                <?php endif; ?>
                <a class="page_link_current cur" href="?page=<?=$page_num?>"><?=$page_num?></a>
                <?php if($maxpage > $page_num): ?>
                  <a class="page_link" href="?page=<?=$page_num+1?>"><?=$page_num+1?></a>
                <?php endif; ?>
                <?php if($page_num < $maxpage): ?>
                  <a class="page_link" href="?page=<?=$maxpage?>">&gt;&gt;</a>
                <?php endif; ?>
              </div>
            <?php } ?>
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
                  <a href="/friend_list" class="mb_ttl friends">Друзья</a>
                </div>
              </div>
            </div>
            <div class="mbtn">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/black_list" class="mb_ttl black_list">Черный список</a>
                </div>
              </div>
            </div>
            <div class="mbtn">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/messages?mark_all" class="mb_ttl check">Отметить все как прочитанные</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>