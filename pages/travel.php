<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">
      <span class="orange_dark">Прогулки</span>
    </div>
  </div>
</div>

<?php if($win != false){?>
  <div class="lplate mt10">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <span class="succes">
            <b>Прогулка завершена!</b>
          </span>
          <br>
          <span class="succes mar7t ib">
            <b>Награда:</b>
          </span>
          <span class="succes">
            <img class="price_img" src="/view/image/icons/expirience.png"><?=$win['exp']?>
            <br>
            <span class="ib mar5t">
              <a href="/travel" class="bbtn mt5">
                <span class="br">
                  <span class="bc">
                    Гулять дальше
                  </span>
                </span>
              </a>
            </span>
          </span>
        </div>
      </div>
    </div>
  </div>

<?php }else if($time_t != ''){ ?>
  <div class="msg mrg_msg1 mt10 c_brown3">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4 font_small">
              <img src="/view/image/action/travel.jpg">
              <br>
              <span class="orange_dark2 mt5 ib">
                Ваш питомец гуляет
              </span>
              <br>
              <span class="green_dark">
                До конца прогулки осталось <?=$time_t?>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php }else{ ?>

  <div class="msg mrg_msg1 mt10 c_brown3">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              На прогулках питомец получает опыт и может находить ценные вещи. Чем дольше прогулка, тем больше награда!
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="msg mrg_msg1 mt10 c_brown3">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4 font_small">
              <img src="/view/image/action/travel.jpg">
              <br>
              <div class="travel">
                <a href="/travel?go=1" class="bbtn mt5 travel_btn">
                  <span class="br">
                    <span class="bc">В парк</span>
                  </span>
                </a>
                <div>2 часа</div>
                <a href="/travel?go=2" class="bbtn mt5 travel_btn">
                  <span class="br">
                    <span class="bc">В город</span>
                  </span>
                </a>
                <div>3 часа</div>
                <a href="/travel?go=3" class="bbtn mt5 travel_btn">
                  <span class="br">
                    <span class="bc">На пикник</span>
                  </span>
                </a>
                <div>4 часа</div>
                <a href="/travel?go=4" class="bbtn mt5 travel_btn">
                  <span class="br">
                    <span class="bc">На озеро</span>
                  </span>
                </a>
                <div>8 часов</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="msg mrg_msg1 mt10 c_brown3">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              Чем выше уровень питомца, тем дольше могут быть прогулки
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>