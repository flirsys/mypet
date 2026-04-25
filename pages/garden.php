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
      <span class="orange_dark">Зимний сад</span>
    </div>
  </div>
</div>

<?php if($add != false && $error == false){ ?>
  <div class="lplate mt10">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <span class="">Полить цветок?</span>
          <br>
          <a href="/garden?add=<?=$add?>&confirm" class="bbtn mt5 mb5">
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
              <span class="orange_dark">
                Есть семена для посадки. Нажми <img class="vt" src="/view/image/icons/leika.png" width="16">
              </span>
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
                          Роза +<img src="/view/image/icons/beauty.png" class="price_img"><?=2 * $f1['lvl']?>
                        </span>
                      </td>
                      <td rowspan="2" class="td_plus">
                        <a class="add_jewel" href="/garden?add=1">
                          <img class="price_img" src="/view/image/icons/leika<?=$need_parts_1 ? '' : '_gray'?>.png">
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%" class="center_td">
                        <div class="table_plus_cntr_div_cont">
                          <table class="res_jew" style="max-width: 192px">
                            <tbody>
                              <tr>
                                <?php if($f1[0] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower1_<?=round(min(max($f1[0] / 4, 1), 5))?>.png" height="<?=30 + ($f1[0])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f1[1] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower1_<?=round(min(max($f1[1] / 4, 1), 5))?>.png" height="<?=30 + ($f1[1])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f1[2] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower1_<?=round(min(max($f1[2] / 4, 1), 5))?>.png" height="<?=30 + ($f1[2])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f1[3] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower1_<?=round(min(max($f1[3] / 4, 1), 5))?>.png" height="<?=30 + ($f1[3])?>">
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
                          Лилия +<img src="/view/image/icons/beauty.png" class="price_img"><?=2 * $f2['lvl']?>
                        </span>
                      </td>
                      <td rowspan="2" class="td_plus">
                        <a class="add_jewel" href="/garden?add=2">
                          <img class="price_img" src="/view/image/icons/leika<?=$need_parts_2 ? '' : '_gray'?>.png">
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%" class="center_td">
                        <div class="table_plus_cntr_div_cont">
                          <table class="res_jew" style="max-width: 192px">
                            <tbody>
                              <tr>
                                <?php if($f2[0] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower2_<?=round(min(max($f2[0] / 4, 1), 5))?>.png" height="<?=30 + ($f2[0])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f2[1] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower2_<?=round(min(max($f2[1] / 4, 1), 5))?>.png" height="<?=30 + ($f2[1])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f2[2] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower2_<?=round(min(max($f2[2] / 4, 1), 5))?>.png" height="<?=30 + ($f2[2])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f2[3] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower2_<?=round(min(max($f2[3] / 4, 1), 5))?>.png" height="<?=30 + ($f2[3])?>">
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
                          Хризантема +<img src="/view/image/icons/beauty.png" class="price_img"><?=2 * $f3['lvl']?>
                        </span>
                      </td>
                      <td rowspan="2" class="td_plus">
                        <a class="add_jewel" href="/garden?add=3">
                          <img class="price_img" src="/view/image/icons/leika<?=$need_parts_3 ? '' : '_gray'?>.png">
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%" class="center_td">
                        <div class="table_plus_cntr_div_cont">
                          <table class="res_jew" style="max-width: 192px">
                            <tbody>
                              <tr>
                                <?php if($f3[0] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower3_<?=round(min(max($f3[0] / 4, 1), 5))?>.png" height="<?=30 + ($f3[0])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f3[1] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower3_<?=round(min(max($f3[1] / 4, 1), 5))?>.png" height="<?=30 + ($f3[1])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f3[2] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower3_<?=round(min(max($f3[2] / 4, 1), 5))?>.png" height="<?=30 + ($f3[2])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f3[3] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower3_<?=round(min(max($f3[3] / 4, 1), 5))?>.png" height="<?=30 + ($f3[3])?>">
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
                          Лотос +<img src="/view/image/icons/beauty.png" class="price_img"><?=2 * $f4['lvl']?>
                        </span>
                      </td>
                      <td rowspan="2" class="td_plus">
                        <a class="add_jewel" href="/garden?add=4">
                          <img class="price_img" src="/view/image/icons/leika<?=$need_parts_4 ? '' : '_gray'?>.png">
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%" class="center_td">
                        <div class="table_plus_cntr_div_cont">
                          <table class="res_jew" style="max-width: 192px">
                            <tbody>
                              <tr>
                                <?php if($f4[0] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower4_<?=round(min(max($f4[0] / 4, 1), 5))?>.png" height="<?=30 + ($f4[0])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f4[1] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower4_<?=round(min(max($f4[1] / 4, 1), 5))?>.png" height="<?=30 + ($f4[1])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f4[2] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower4_<?=round(min(max($f4[2] / 4, 1), 5))?>.png" height="<?=30 + ($f4[2])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f4[3] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower4_<?=round(min(max($f4[3] / 4, 1), 5))?>.png" height="<?=30 + ($f4[3])?>">
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
                          Орхидея +<img src="/view/image/icons/beauty.png" class="price_img"><?=2 * $f5['lvl']?>
                        </span>
                      </td>
                      <td rowspan="2" class="td_plus">
                        <a class="add_jewel" href="/garden?add=5">
                          <img class="price_img" src="/view/image/icons/leika<?=$need_parts_5 ? '' : '_gray'?>.png">
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%" class="center_td">
                        <div class="table_plus_cntr_div_cont">
                          <table class="res_jew" style="max-width: 192px">
                            <tbody>
                              <tr>
                                <?php if($f5[0] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower5_<?=round(min(max($f5[0] / 4, 1), 5))?>.png" height="<?=30 + ($f5[0])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f5[1] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower5_<?=round(min(max($f5[1] / 4, 1), 5))?>.png" height="<?=30 + ($f5[1])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f5[2] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower5_<?=round(min(max($f5[2] / 4, 1), 5))?>.png" height="<?=30 + ($f5[2])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f5[3] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower5_<?=round(min(max($f5[3] / 4, 1), 5))?>.png" height="<?=30 + ($f5[3])?>">
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
                          Кактус +<img src="/view/image/icons/beauty.png" class="price_img"><?=2 * $f6['lvl']?>
                        </span>
                      </td>
                      <td rowspan="2" class="td_plus">
                        <a class="add_jewel" href="/garden?add=6">
                          <img class="price_img" src="/view/image/icons/leika<?=$need_parts_6 ? '' : '_gray'?>.png">
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td width="100%" class="center_td">
                        <div class="table_plus_cntr_div_cont">
                          <table class="res_jew" style="max-width: 192px">
                            <tbody>
                              <tr>
                                <?php if($f6[0] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower6_<?=round(min(max($f6[0] / 4, 1), 5))?>.png" height="<?=30 + ($f6[0])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f6[1] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower6_<?=round(min(max($f6[1] / 4, 1), 5))?>.png" height="<?=30 + ($f6[1])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f6[2] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower6_<?=round(min(max($f6[2] / 4, 1), 5))?>.png" height="<?=30 + ($f6[2])?>">
                                  </td>
                                <?php } ?>
                                <?php if($f6[3] > 0){ ?>
                                  <td>
                                    <img class="jewel_img" src="/view/image/glade/flower6_<?=round(min(max($f6[3] / 4, 1), 5))?>.png" height="<?=30 + ($f6[3])?>">
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
              <img src="/view/image/glade/seed1.png" height="16"><?=$f1['parts']?>
            </span>
            <span class="jewel_uncut_count">
              <img src="/view/image/glade/seed2.png" height="16"><?=$f2['parts']?>
            </span>
            <span class="jewel_uncut_count">
              <img src="/view/image/glade/seed3.png" height="16"><?=$f3['parts']?>
            </span>
            <span class="jewel_uncut_count">
              <img src="/view/image/glade/seed4.png" height="16"><?=$f4['parts']?>
            </span>
            <span class="jewel_uncut_count">
              <img src="/view/image/glade/seed5.png" height="16"><?=$f5['parts']?>
            </span>
            <span class="jewel_uncut_count">
              <img src="/view/image/glade/seed6.png" height="16"><?=$f6['parts']?>
            </span>
            <div class="mt5">
              Из каждых 5 семян можно вырастить один цветок
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