<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">Анкета <?=!$_my ? $user['name'] : ''?></div>
  </div>
</div>

<?php if($_my) { ?>
  <div class="msg mrg_msg1 mt10 c_brown4">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4 left">
              <form action="/anketa" method="POST">
                <span class="orange_dark2">
                  <img src="/view/image/icons/about.png" alt="" class="price_img"> О себе
                </span>
                <br>
                <input type="text" name="about" value="<?=$bio_me?>" maxlength="42" class="anketa_input">
                <br>
                <span class="c_orange3 font_12">
                  Отображается в профиле питомца, не более 42 символов
                </span>
                <br><br>
                <span class="orange_dark2">
                  <img src="/view/image/icons/name.png" alt="" class="price_img"> Реальное имя
                </span>
                <br>
                <input type="text" name="real_name" value="<?=$bio_name?>" class="anketa_input">
                <br><br>
                <span class="orange_dark2">
                  <img src="/view/image/icons/anketa_gender.png" alt="" class="price_img"> Пол
                </span>
                <br>
                <input id="gender0" type="radio" name="player_gender" value="m" <?=$bio_gender == 'm' ? 'checked' : ''?>>
                <label for="gender0" class="orange_dark2">Мужской</label>
                <br>
                <input id="gender1" type="radio" name="player_gender" value="f" <?=$bio_gender == 'f' ? 'checked' : ''?>>
                <label for="gender1" class="orange_dark2">Женский</label>
                <br><br>
                <span class="orange_dark2">
                  <img src="/view/image/icons/city.png" alt="" class="price_img"> Город
                </span>
                <br>
                <input type="text" name="city" value="<?=$bio_city?>" class="anketa_input">
                <br><br>
                <div style="overflow: hidden; display: block;">
                  <span class="orange_dark2">
                    <img src="/view/image/icons/calendar.png" alt="" class="price_img"> Дата рождения
                  </span>
                </div>
                <input type="text" name="date" value="<?=$bio_date?>" class="anketa_input">
                <br>
                <span class="c_orange3 font_12">Формат: 31.01.1999</span>
                <br>
                <input type="checkbox" id="show_date" name="show_date" value="1" <?=$bio_date_y == '1' ? 'checked' : ''?>>
                <label for="show_date" class="orange_dark2">
                  Отображать только месяц и день.
                </label>
                <br><br>
                <span class="orange_dark2">
                  <img src="/view/image/icons/anketa.png" alt="" class="price_img"> Анкета
                </span>
                <br>
                <textarea rows="5" name="status" class="anketa_input"><?=$bio_bio?></textarea>
                <br>
                <span class="c_orange3 font_12">
                  Отображается в анкете, 255 символов
                </span>
                <br><br>
                <input type="hidden" name="save" value="1">
                <div class="cntr pb5">
                  <div class="bbtn_sm">
                    <div class="br">
                      <input type="submit" value="Сохранить">
                    </div>
                  </div>
                </div>
              </form>
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
            <div class="wr_c4 left p10 font_14">
              <span class="anketa_head ib mb3">
                <img src="/view/image/icons/about.png" alt="" class="price_img"> О себе
              </span>
              <br>
              <div class="mb10"><?=$bio_me?></div>

              <?php if($bio_name != '') {?>
                <span class="anketa_head ib mb3">
                  <img src="/view/image/icons/name.png" alt="" class="price_img"> Реальное имя
                </span>
                <br>
                <div class="orange_dark mb10"><?=$bio_name?></div>
              <?php } ?>
              
              <?php if($bio_gender != '') {?>
                <span class="anketa_head ib mb3">
                  <img src="/view/image/icons/anketa_gender.png" alt="" class="price_img"> Пол
                </span>
                <br>
                <div class="orange_dark mb10"><?=$bio_gender == 'm' ? 'Мужской' : 'Женский'?></div>
              <?php } ?>

              <?php if($bio_date != '') {?>
                <span class="anketa_head ib mb3">
                  <img src="/view/image/icons/calendar.png" alt="" class="price_img"> Дата рождения
                </span>
                <br>
                <div class="orange_dark mb10">
                  <?=$core->formatDateY($bio_date, $bio_date_y)?>
                </div>
              <?php } ?>

              <?php if($bio_bio != '') {?>
                <span class="anketa_head ib mb3">
                  <img src="/view/image/icons/anketa.png" alt="" class="price_img"> Анкета
                </span>
                <br>
                <div class="orange_dark mb10"><?=$bio_bio?></div>
              <?php } ?>
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
            <div class="mbtn">
              <div class="mb_r">
                <div class="mb_c">
                  <a href="/profile<?=!$_my ? '?id='.$user['id'] : ''?>" class="mb_ttl back">Назад</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>