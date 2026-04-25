<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">Выставка</div>
  </div>
</div>


<?php if(isSet($win) && $win === true){ ?>
  <div class="lplate mt10">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3 c_green">
		      <span class="succes">Поздравляем! Вы победили!</span>
          <br>
          <span id="gold" class="gold">1  МЕСТО</span>
          <br>
          <table class="reward">
            <tbody>
              <tr>
                <td colspan="2">
                  <span class=""><b>Награда:</b></span>
                  <span><img class="price_img" src="/view/image/icons/coin.png"><?=$win_coin?></span>, <img class="price_img" src="/view/image/icons/expirience.png"><?=$win_exp?>
                  <?php if(isSet($win_j)){ ?>
                    ,<img class="price_img" src=" /view/image/item/jewel<?=$win_j?>.png" height="16"><?=$win_j_i?>
                  <?php } ?>
                </td>
              </tr>
              <?php if(1 == 0): ?>
                <tr>
                  <td>
                    <img class="item_reward" src="/view/image/item/ring1.png">
                  </td>
                  <td>
                    <a href="/chest?back=home" class="view_link">Простое колечко</a>
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
          <br>
          Вы перешли в <?=$me_show['final']?>/3 финала <?=$new_cup['ru']?>
          <br>
          <div class="mt5">
            <a href="/" class="bbtn btn_show">
              <span class="br">
                <span class="bc plr5">Победа!</span>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php }else{ ?>


<?php if(isSet($error_hearts)): ?>
  <div class="msg mrg_msg1 mt10 c_brown">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <span class="warning">Вам не хватает <img src="/view/image/icons/heart.png" class="price_img"><?=$new_cup['heart']-$core->user['heart']?> сердечек</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="msg mrg_msg2 mt32">
	<div class="wr_bg">
    <div class="wr_c3 m-3">
      <div class="wr_c4 cntr">
        <?php if(isSet($win) && $win === false){ ?>
          <div class="ttl mmt">
            <div class="tr">
              <div class="tc">Выставка завершена.</div>
            </div>
          </div>
          <span class="ib mb7 orange_dark2">Вы заняли <b><?=$show->getPositionById($id, $type, $me_show['final'])?> место</b>. Нужно больше красоты для победы.</span>
          <table class="reward">
            <tbody>
              <tr>
                <td colspan="2">
                  <span class="">
                    <b>Награда:</b>
                  </span>
                  <?php if($win_coin > 0){ ?><img class="price_img" src="/view/image/icons/coin.png"><?=$win_coin?>, <?php } ?>
                  <img class="price_img" src="/view/image/icons/expirience.png"><?=$win_exp?>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="mt5">
            <a href="/" class="bbtn btn_show">
              <span class="br">
                <span class="bc plr5">Забрать награду</span>
              </span>
            </a>
          </div>
        <?php } else { ?>
          <div class="ttl mmt">
            <div class="tr">
              <div class="tc"><?=$new_cup['ru']?>, <?=$me_show['final'] < 3 ? ($me_show['final']).'/3' : 'финал'?></div>
            </div>
          </div>
          <span class="c_green">Сейчас вы на <b><?=$show->getPositionById($id, $type, $me_show['final'])?></b> месте</span>

          <?php if($me_show['go'] == 0){ ?>
            <div class="mt10">
              <a href="/show?go" class="bbtn btn_show">
                <span class="br">
                  <span class="bc plr5">Участвовать за <img class="price_img" src="/view/image/icons/heart.png"><?=$new_cup['heart']?></span>
                </span>
              </a>
            </div>
          <?php }else{ ?>
            <div class="mt5">
              <a href="/show?go" class="bbtn btn_show">
                <span class="br"><span class="bc plr5">Соревноваться</span></span>
              </a>
            </div>
          <?php } ?>

          <span class="c_lbrown ib pt2">Осталось <?=5-$cup[0]?> показов</span>
          <br>
          <table class="tlist mt5">
            <tbody>
              <tr class="c_black tlheader">
                <td>Место</td>
                <td>Имя</td>
                <td>Рейтинг</td>
              </tr>

              <?php
                $page_num_end = 1;
                if ($page_num > 1) {
                  $table = $show->getPage($type, $me_show['final'], (int) $page_num);
                  $page_num_end = $page_num;
                } else {
                  $pageNumber = $show->getPageById($id, $type, $me_show['final']);
                  if ($pageNumber === -1) {
                    echo "Запись не найдена";
                    $table = [];
                  } else {
                    $table = $show->getPage($type, $me_show['final'], $pageNumber);
                    $page_num_end = $pageNumber;
                  }
                }
                $place = (($page_num > 1 ? $page_num : $pageNumber) - 1) * 10 + 2;
                foreach ($table as $row) {
                  if($place == 2 && $row['rating'] >= $need_rating) $place = 1;
                  echo "<tr".($row['id'] == $id ? ' class="c_orange"' : '').">";
                  echo "<td>" . $place++ . "</td>";
                  echo "<td>" . htmlspecialchars($core->getUser($row['id'], null, false)['name']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['rating']) . "</td>";
                  echo "</tr>";
                }
              ?>
            </tbody>
          </table>
          <div class="pgn mt5">
            <div>
              <?php if($page_num_end > 1): ?>
                <a class="page_link" href="?page=1">&lt;&lt;</a>
              <?php endif; ?>
              <?php if($page_num_end >= 2): ?>
                <a class="page_link <?=$page_num_end?>" href="?page=<?=$page_num_end-1?>"><?=$page_num_end-1?></a>
              <?php endif; ?>
              <a class="page_link_current cur" href="?page=<?=$page_num_end?>"><?=$page_num_end?></a>
              <?php if($show->getMaxPages($type, $me_show['final']) < $page_num_end): ?>
                <a class="page_link" href="?page=<?=$page_num_end+1?>"><?=$page_num_end+1?></a>
              <?php endif; ?>
              <?php if($page_num_end < $show->getMaxPages($type, $me_show['final'])): ?>
                <a class="page_link" href="?page=<?=$show->getMaxPages($type, $me_show['final'])?>">&gt;&gt;</a>
              <?php endif; ?>
            </div>
          </div>
          <span class="c_lbrown ib pt2">Для победы в этой наминации нужно набрать <?=$need_rating?> рейтинга</span>
        <?php } ?>
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
          <div class="wr_c4 font_small td_un">
            <div class="center">
              <span>Сегодня получено </span>
              <span>
                <img class="price_img" src="/view/image/icons/coin.png"><?=$me_show['coin']?></span>
                <span> из <?=$coins?>.</span>
            </div>
            <img class="price_img" src="/view/image/icons/beauty.png"><?=$core->user['beauty']?> красоты дает +<?=$core->user['beauty']?> рейтинга за показ.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>