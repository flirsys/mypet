<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">Поиск питомца</div>
  </div>
</div>

<div class="msg mrg_msg1 mt10 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4 font_14">
            <?php if($error != false){ ?>
              <span class="warning"><?=$error?></span><br><br>
            <?php } ?>
            <form action="/search_pet" method="POST">
              <div class="mb3">Введите имя питомца</div>
              <input type="text" class="login_input" name="name" value="">
              <br>
              <div class="bbtn_sm mt10">
                <div class="br">
                  <input type="submit" value="Искать">
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
                  <a href="/<?=$back[1]?>" class="mb_ttl back">Назад к <?=$back[0]?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>