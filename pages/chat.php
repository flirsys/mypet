<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">Игровой чат</div>
  </div>
</div>

<div class="msg mlr5 mt10 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4 left p10">
            <?php if($core->user['ban_time'] > time()){ ?>
              <div class="center mb5 c_red">
                <span class="orange_dark2 font_13">Вы заблокированы до <?=$core->formatDate($core->user['ban_time'])?></span>
                <div class="hr" style="margin: 5px 0;"></div>
                <a class="large darkgreen_link" href="/chat">Обновить</a><br><br>
              </div>
            <?php } else if($core->user['level'] >= 13){ ?>
              <form class="mb5" method="POST">
                <?php
                  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    $_SESSION['form_token'] = bin2hex(random_bytes(32));
                  }
                ?>
                <input type="hidden" name="token" value="<?=$_SESSION['form_token']??''?>">
                <input type="text" class="send_message" value="<?=isSet($to_user) ? $to_user['name'].', ': null?>" name="message_text">
                <input type="hidden" name="page" value="1">
                <input type="hidden" name="club_id" value="0">
                <div class="bbtn_sm">
                  <div class="br">
                    <input type="submit" value="Отправить">
                  </div>
                </div>
                <a class="refresh_link small" href="/chat">Обновить</a>
              </form>
            <?php } else { ?>
              <div class="center mb5 c_red">
                <span class="orange_dark2 font_13">Вы сможете писать в чат начиная с 13 уровня</span>
                <div class="hr" style="margin: 5px 0;"></div>
                <a class="large darkgreen_link" href="/chat">Обновить</a><br><br>
              </div>
            <?php } ?>
            <div class="posts mb5">
              <?php
                foreach($chat->getMessages($page_num) as $m){
                  $u = $m['from'] == $id ? $core->user : $core->getUser($m['from'], null, false);
              ?>
                <div class="mb5">
                  <div class="post_chat">
                    <a href="profile?id=<?=$u['id']?>" class="pet_name">
                      <img src="/view/image/avatar_s<?=$u['pet']?>.png" class="pet_icon">
                      <?=$u['name']?>
                    </a>
                    <?php if ((time() - $u['online_time']) < 2.5*60) {?><img class="price_img" src="/view/image/icons/online.png"><?php } ?>
                    <a class="c_blue3" href="chat?to=<?=$u['id']?>">(»)</a><span class="c_blue3">:</span>
                    <span class="<?=$m['for'] == -1 ? 'c_blue3' : ''?> <?=$m['for'] == $id ? 'pet_msg_violet' : 'pet_msg'?>">
                      <?=$m['for'] == -1 ? $core->BB($m['text']) : $core->smiles($m['text'])?>
                    </span>
                    <span class="small c_gray fr pt1">
                      <?=$core->formatDate($m['time'])?>
                    </span>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="msg mrg_msg1 mt10 c_brown4">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4 pgn">
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
        </div>
      </div>
    </div>
  </div>
</div>

<div class="msg mlr5 mt10 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <a class="c_gray" href="/smiles">Смайлики</a>
            <br>
            <a class="darkgreen_link" href="/rules">правила чата</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>