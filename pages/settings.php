<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc"><?=$name?></div>
  </div>
</div>

<?php if($error != false): ?>
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

<?php if($type == false || $core->user['level'] < 5){ ?>
  <div class="msg mrg_msg1 mt10 c_brown4">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">

              <?php if($core->user['level'] >= 5) { ?>
                <a href="/settings?change_name" class="bbtn mt5 mb10 btn_set">
                  <span class="br">
                    <span class="bc center">Изменить имя</span>
                  </span>
                </a>
                <br>
                <a href="/settings?change_pw" class="bbtn mt5 mb10 btn_set">
                  <span class="br">
                    <span class="bc center">Изменить пароль</span>
                  </span>
                </a>
                <br>
              <?php } ?>
              <a href="/settings?logout" class="bbtn_red mt5 mb5 btn_set">
                <span class="br">
                  <span class="bc center">Выйти из игры</span>
                </span>
              </a>
              <br>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php }else if($type == 'change_name' && $core->user['level'] >= 5){ ?>
  <div class="msg mrg_msg1 mt10 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <form action="/settings?change_name" method="POST">
              <div class="mb3">
                Текущее: <b><?=$core->user['name']?></b>
                <br>
                <br>
                <div class="mt5">Введите новое имя:</div>
              </div>
              <input class="login_input mb5" type="text" name="name" value="<?=$core->user['name']?>">
              <br>
              <input style="display: none;" id="submit" type="submit" value="Изменить за 1000">
              <label for="submit">
                <div class="bbtn">
                  <div class="br">
                    <span class="bc plr5">Изменить за <img src="/view/image/icons/coin.png" class="price_img">1000</span>
                  </div>
                </div>
              </label>
            </form>
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
                  <a href="/settings" class="mb_ttl back">Назад в настройки</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }else if($type == 'change_pw' && $core->user['level'] >= 5){ ?>
  <div class="msg mrg_msg1 mt10 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <form action="/settings?change_pw" method="POST">
              <div class="mb3">
                Введите новый пароль:<br><br>
              </div>
              <input class="login_input" type="text" name="pw" value="">
              <br>
              <div class="bbtn_sm mt10">
                <div class="br">
                  <input type="submit" value="Изменить">
                </div>
              </div>
            </form>
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
                  <a href="/settings" class="mb_ttl back">Назад в настройки</a>
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

<div class="msg mrg_msg1 mt10 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            ID вашего аккаунта: <?=$core->user['id']?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>