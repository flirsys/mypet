<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">Наборы</div>
  </div>
</div>

<?php
  for($i = (($page_num-1)*3)+1; $i <= $page_num*3; $i++){
?>
  <div class="msg mrg_msg1 mt10 c_brown">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <div class="set_item">
                <span class="span1">
                  <a class="c_orange4" href="/items?category=cloth&amp;id=<?=$i?>">
                    <?=$sets_list[$i]['name']?>
                  </a>
                  <span class="gray font_13">За каждую вещь +<img src="/view/image/icons/beauty.png" class="price_img"><?=$sets_list[$i]['beauty']?></span>
                  <?php if($core->user['level'] < $sets_list[$i]['level']) { ?>
                    <br><span class="pgn font_15">Нужен <?=$sets_list[$i]['level']?> уровень</span>
                  <?php } ?>
                </span>
                <span class="span2 mb10 pt5">
                  <a href="/items?category=cloth&amp;id=<?=$i?>">
                    <img class="item_icon" src="/view/image/item/<?=$sets_list[$i][1]['name']?>.png">
                  </a>
                  <a href="/items?category=cloth&amp;id=<?=$i?>">
                    <img class="item_icon" src="/view/image/item/<?=$sets_list[$i][2]['name']?>.png">
                  </a>
                  <a href="/items?category=cloth&amp;id=<?=$i?>">
                    <img class="item_icon" src="/view/image/item/<?=$sets_list[$i][3]['name']?>.png">
                  </a>
                  <br>
                  <a href="/items?category=cloth&amp;id=<?=$i?>">
                    <img class="item_icon" src="/view/image/item/<?=$sets_list[$i][4]['name']?>.png">
                  </a>
                  <a href="/items?category=cloth&amp;id=<?=$i?>">
                    <img class="item_icon" src="/view/image/item/<?=$sets_list[$i][5]['name']?>.png">
                  </a>
                  <a href="/items?category=cloth&amp;id=<?=$i?>">
                    <img class="item_icon" src="/view/image/item/<?=$sets_list[$i][6]['name']?>.png">
                  </a>
                  <br>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<div class="msg mrg_msg1 mt10 c_brown">
  <div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <div class="pgn">
              <?php if($page_num > 1): ?>
                <a class="page_link" href="?page=1">&lt;&lt;</a>
              <?php endif; ?>
              <?php if($page_num >= 2): ?>
                <a class="page_link <?=$page_num?>" href="?page=<?=$page_num-1?>"><?=$page_num-1?></a>
              <?php endif; ?>
              <a class="page_link_current cur" href="?page=<?=$page_num?>"><?=$page_num?></a>
              <?php if($page_num < 6): ?>
                <a class="page_link" href="?page=<?=$page_num+1?>"><?=$page_num+1?></a>
              <?php endif; ?>
              <?php if($page_num < 6): ?>
                <a class="page_link" href="?page=6">&gt;&gt;</a>
              <?php endif; ?>
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
                  <a href="/categories" class="mb_ttl back">Назад в Магазин</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>