<?php if($error != false) { ?>
  <div class="lplate mt10">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <span class="warning"><?=$error?></span>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">
      <span class="orange_dark">Ларец с драгоценностями</span>
    </div>
  </div>
</div>

<?php if($add != false && $error == false){ ?>
  <div class="lplate mt10">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <span class="">Собрать камень?</span>
          <br>
          <a href="/jewels?add=<?=$add?>&confirm" class="bbtn mt5 mb5">
            <span class="br">
              <span class="bc">
                <img class="price_img" src="/view/image/icons/check_white.png">
                Да, за <span><img class="price_img" src="/view/image/icons/coin.png"><?=$price?></span>
              </span>
            </span>
          </a>
          <br>
          <span class="font_13 orange_dark2">
            Добавит +<img src="/view/image/icons/beauty.png" class="price_img">2 красоты
          </span>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php if($need_parts == true){ ?>
  <div class="msg mrg_msg1 mt10 c_brown3">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <span class="orange_dark">Есть камни для сборки. Нажми <img class="vt" src="/view/image/icons/plus3.png"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<style>
	.res_jew td {
		vertical-align: bottom;
	}
</style>

<style>
	@media handheld, screen and (max-width:300px)
	{
		.table_plus_cntr_div_cont {
			padding-left: 30px;
		}
		.res_jew {
			width: 100%;
		}
		.res_jew td {
			width: 25%;
		}
		.res_jew td img {
			margin-left: -30px;
		}
		.table_plus_cntr {
			width: 100%;
		}
	}
</style>

<div class="msg mrg_msg1 mt10 c_brown4">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4 left">
            <div class="text_jewel">
              <span class="span2">
                <table class="table_plus_cntr">
                  <tbody>
                    <tr>
                      <td width="100%" class="center_td td_title">
                        <span class="font17 c_orange4 mb2 ib ml2_price_img">
                          Сапфир +<img src="/view/image/icons/beauty.png" class="price_img"><?=2 * $j1['lvl']?>
                        </span>
                      </td>
                      <td rowspan="2" class="td_plus">
                        <a class="add_jewel" href="/jewels?add=1">
                          <img class="price_img" src="/view/image/icons/plus<?=$need_parts_1 ? '' : '2'?>.png">
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%" class="center_td">
                        <div class="table_plus_cntr_div_cont">
                          <table class="res_jew" style="max-width: 192px">
                            <tbody>
                              <tr>
                                <?php if($j1[0] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel1.png" height="<?=12 + ($j1[0])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j1[1] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel1.png" height="<?=12 + ($j1[1])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j1[2] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel1.png" height="<?=12 + ($j1[2])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j1[3] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel1.png" height="<?=12 + ($j1[3])?>">
                                  </td>
                                <?php } ?>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </span>
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
          <div class="wr_c4 left">
            <div class="text_jewel">
              <span class="span2">
                <table class="table_plus_cntr">
                  <tbody>
                    <tr>
                      <td width="100%" class="center_td td_title">
                        <span class="font17 c_orange4 mb2 ib ml2_price_img">
                          Аметист +<img src="/view/image/icons/beauty.png" class="price_img"><?=2 * $j2['lvl']?>
                        </span>
                      </td>
                      <td rowspan="2" class="td_plus">
                        <a class="add_jewel" href="/jewels?add=2">
                          <img class="price_img" src="/view/image/icons/plus<?=$need_parts_2 ? '' : '2'?>.png">
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%" class="center_td">
                        <div class="table_plus_cntr_div_cont">
                          <table class="res_jew" style="max-width: 192px">
                            <tbody>
                              <tr>
                                <?php if($j2[0] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel2.png" height="<?=12 + ($j2[0])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j2[1] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel2.png" height="<?=12 + ($j2[1])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j2[2] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel2.png" height="<?=12 + ($j2[2])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j2[3] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel2.png" height="<?=12 + ($j2[3])?>">
                                  </td>
                                <?php } ?>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </span>
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
          <div class="wr_c4 left">
            <div class="text_jewel">
              <span class="span2">
                <table class="table_plus_cntr">
                  <tbody>
                    <tr>
                      <td width="100%" class="center_td td_title">
                        <span class="font17 c_orange4 mb2 ib ml2_price_img">
                          Изумруд +<img src="/view/image/icons/beauty.png" class="price_img"><?=2 * $j3['lvl']?>
                        </span>
                      </td>
                      <td rowspan="2" class="td_plus">
                        <a class="add_jewel" href="/jewels?add=3">
                          <img class="price_img" src="/view/image/icons/plus<?=$need_parts_3 ? '' : '2'?>.png">
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%" class="center_td">
                        <div class="table_plus_cntr_div_cont">
                          <table class="res_jew" style="max-width: 192px">
                            <tbody>
                              <tr>
                                <?php if($j3[0] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel3.png" height="<?=12 + ($j3[0])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j3[1] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel3.png" height="<?=12 + ($j3[1])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j3[2] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel3.png" height="<?=12 + ($j3[2])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j3[3] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel3.png" height="<?=12 + ($j3[3])?>">
                                  </td>
                                <?php } ?>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </span>
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
          <div class="wr_c4 left">
            <div class="text_jewel">
              <span class="span2">
                <table class="table_plus_cntr">
                  <tbody>
                    <tr>
                      <td width="100%" class="center_td td_title">
                        <span class="font17 c_orange4 mb2 ib ml2_price_img">
                          Топаз +<img src="/view/image/icons/beauty.png" class="price_img"><?=2 * $j4['lvl']?>
                        </span>
                      </td>
                      <td rowspan="2" class="td_plus">
                        <a class="add_jewel" href="/jewels?add=4">
                          <img class="price_img" src="/view/image/icons/plus<?=$need_parts_4 ? '' : '2'?>.png">
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%" class="center_td">
                        <div class="table_plus_cntr_div_cont">
                          <table class="res_jew" style="max-width: 192px">
                            <tbody>
                              <tr>
                                <?php if($j4[0] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel4.png" height="<?=12 + ($j4[0])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j4[1] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel4.png" height="<?=12 + ($j4[1])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j4[2] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel4.png" height="<?=12 + ($j4[2])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j4[3] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel4.png" height="<?=12 + ($j4[3])?>">
                                  </td>
                                <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </span>
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
          <div class="wr_c4 left">
            <div class="text_jewel">
              <span class="span2">
                <table class="table_plus_cntr">
                  <tbody>
                    <tr>
                      <td width="100%" class="center_td td_title">
                        <span class="font17 c_orange4 mb2 ib ml2_price_img">
                          Опал +<img src="/view/image/icons/beauty.png" class="price_img"><?=2 * $j5['lvl']?>
                        </span>
                      </td>
                      <td rowspan="2" class="td_plus">
                        <a class="add_jewel" href="/jewels?add=5">
                          <img class="price_img" src="/view/image/icons/plus<?=$need_parts_5 ? '' : '2'?>.png">
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%" class="center_td">
                        <div class="table_plus_cntr_div_cont">
                          <table class="res_jew" style="max-width: 192px">
                            <tbody>
                              <tr>
                                <?php if($j5[0] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel5.png" height="<?=12 + ($j5[0])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j5[1] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel5.png" height="<?=12 + ($j5[1])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j5[2] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel5.png" height="<?=12 + ($j5[2])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j5[3] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel5.png" height="<?=12 + ($j5[3])?>">
                                  </td>
                                <?php } ?>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </span>
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
          <div class="wr_c4 left">
            <div class="text_jewel">
              <span class="span2">
                <table class="table_plus_cntr">
                  <tbody>
                    <tr>
                      <td width="100%" class="center_td td_title">
                        <span class="font17 c_orange4 mb2 ib ml2_price_img">
                          Рубин +<img src="/view/image/icons/beauty.png" class="price_img"><?=2 * $j6['lvl']?>
                        </span>
                      </td>
                      <td rowspan="2" class="td_plus">
                        <a class="add_jewel" href="/jewels?add=6">
                          <img class="price_img" src="/view/image/icons/plus<?=$need_parts_6 ? '' : '2'?>.png">
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%" class="center_td">
                        <div class="table_plus_cntr_div_cont">
                          <table class="res_jew" style="max-width: 192px">
                            <tbody>
                              <tr>
                                <?php if($j6[0] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel6.png" height="<?=12 + ($j6[0])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j6[1] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel6.png" height="<?=12 + ($j6[1])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j6[2] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel6.png" height="<?=12 + ($j6[2])?>">
                                  </td>
                                <?php } ?>
                                <?php if($j6[3] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/item/jewel6.png" height="<?=12 + ($j6[3])?>">
                                  </td>
                                <?php } ?>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </span>
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
          <div class="wr_c4 price_img_cont">
            <span class="jewel_uncut_count">
              <img src="/view/image/item/jewel1.png" height="16"><?=$j1['parts']?>
            </span>
            <span class="jewel_uncut_count">
              <img src="/view/image/item/jewel2.png" height="16"><?=$j2['parts']?>
            </span>
            <span class="jewel_uncut_count">
              <img src="/view/image/item/jewel3.png" height="16"><?=$j3['parts']?>
            </span>
            <span class="jewel_uncut_count">
              <img src="/view/image/item/jewel4.png" height="16"><?=$j4['parts']?>
            </span>
            <span class="jewel_uncut_count">
              <img src="/view/image/item/jewel5.png" height="16"><?=$j5['parts']?>
            </span>
            <span class="jewel_uncut_count">
              <img src="/view/image/item/jewel6.png" height="16"><?=$j6['parts']?>
            </span>
            <div class="mt5">
              Каждые 5 частей можно использовать для сборки камня
            </div>
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
                  <a href="/" class="mb_ttl back">Назад</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>