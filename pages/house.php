<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">Роскошный дом</div>
  </div>
</div>

<div class="msg mrg_msg1 mt10 c_brown3">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4" style="padding-bottom: 3px;">
            <span class="nowrap center">
              <?php
                $rating = $stars / 2;
                for ($i = 1; $i <= 5; $i++) {
                  $s = 1;
                  if ($rating >= $i) $s = 3;
                  elseif ($rating > $i - 1 && $rating < $i) $s = 2;
              ?>
                <img class="price_img" src="/view/image/icons/star<?=$s?>.png">
              <?php } ?>
            </span>
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
          <div class="wr_c4">
            <table class="home_profile">
              <tbody>
                <tr>
                  <td>
                    <a class="item" href="/house_list">
                      <img class="item_icon" src="/view/image/item/home1<?=$h1['icon']?>.png">
                    </a>
                  </td>
                  <td>
                    <a class="item" href="/house_list">
                      <img class="item_icon" src="/view/image/item/home2<?=$h2['icon']?>.png">
                    </a>
                  </td>
                  <td>
                    <a class="item" href="/house_list">
                      <img class="item_icon" src="/view/image/item/home3<?=$h3['icon']?>.png">
                    </a>
                  </td>
                  <td>
                    <a class="item" href="/house_list">
                      <img class="item_icon" src="/view/image/item/home4<?=$h4['icon']?>.png">
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a class="item" href="/house_list">
                      <img class="item_icon" src="/view/image/item/home5<?=$h5['icon']?>.png">
                    </a>
                  </td>
                  <td rowspan="2" colspan="2">
                    <a href="/house_list">
                      <img src="/view/image/myhome<?=floor($rating)?>.png">
                    </a>
                  </td>
                  <td>
                    <a class="item" href="/house_list">
                      <img class="item_icon" src="/view/image/item/home6<?=$h6['icon']?>.png">
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a class="item" href="/house_list">
                      <img class="item_icon" src="/view/image/item/home7<?=$h7['icon']?>.png">
                    </a>
                  </td>
                  <td>
                    <a class="item" href="/house_list">
                      <img class="item_icon" src="/view/image/item/home8<?=$h8['icon']?>.png">
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a class="item" href="/house_list">
                      <img class="item_icon" src="/view/image/item/home9<?=$h9['icon']?>.png">
                    </a>
                  </td>
                  <td>
                    <a class="item" href="/house_list">
                      <img class="item_icon" src="/view/image/item/home10<?=$h10['icon']?>.png">
                    </a>
                  </td>
                  <td>
                    <a class="item" href="/house_list">
                      <img class="item_icon" src="/view/image/item/home11<?=$h11['icon']?>.png">
                    </a>
                  </td>
                  <td>
                    <a class="item" href="/house_list">
                      <img class="item_icon" src="/view/image/item/home12<?=$h12['icon']?>.png">
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
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
          <div class="wr_c4 left">
            <ul class="ml15 ml2_price_img">
              <li>
                Бонус домика: +<img src="/view/image/icons/expirience.png" class="price_img"><?=floor($rating)*5?>% к опыту
              </li>
              <li>
                Бонус предметов: +<img src="/view/image/icons/beauty.png" class="price_img"><?=$all_level*10?> красоты
                <br>
              </li>
            </ul>
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
                  <a href="/house_list" class="mb_ttl myhome">Предметы в домике</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>