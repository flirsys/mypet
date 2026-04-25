<div class="start mar6t">
  <div class="ttl lgreen mrg_ttl mt10">
    <div class="tr">
      <div class="tc">Сохранение</div>
    </div>
  </div>

	<div class="msg mrg_msg1 mt10 c_brown3">
		<div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4 small">
              За сохранение вы получите <span><img class="price_img" src="/view/image/icons/coin.png">15</span> монет!
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
              <span class="warning"><?=$error?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
  
  <div class="msg mrg_msg1 mt10 c_brown4">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4 font_14">
              <form action="/save" method="POST">
                <div class="mb3">Имя</div>
                <input class="login_input mb10" type="text" name="name" value="">
                <br>
                <div class="mb3">Пароль</div>
                <input class="login_input mb10" type="text" name="password" value="">
                <br>
                <div class="mb3">E-mail</div>
                <input class="login_input mb10" type="text" name="email" value="">
                <br>
                <div class="mb3 font_13">
                  Введите <span class="text_red">правильный</span> e-mail, иначе вы не сможете восстановить вашего питомца!
                </div>
                <div class="bbtn_sm mt3">
                  <div class="br">
                    <input type="submit" value="Сохранить">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>
