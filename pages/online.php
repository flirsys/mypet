<div class="ttl lgreen mrg_ttl mt10">
  <div class="tr">
    <div class="tc">Питомцы онлайн</div>
  </div>
</div>

<div class="msg mrg_msg1 mt10 c_brown4">
	<div class="wr_bg">
    <div class="wr_c1">
      <div class="wr_c2">
        <div class="wr_c3">
          <div class="wr_c4">
            <a class="online_link1" href="/online">Все</a>
            <img src="/view/img/ico16-separator.png" class="mlr5" width="16" height="16" alt="|">
            <a class="online_link0" href="/online?club=true">Без клуба</a>
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
          <div class="wr_c4 font_14 left cntr">
            <table class="tlist mt5 mb10">
              <tbody>
                <tr class="c_black tlheader">
                  <td>Имя</td>
                  <td>Уровень</td>
                </tr>
                <?php foreach($list as $pet){ ?>
                  <tr>
                    <td class="left">
                      <img class="price_img" src="/view/image/avatar_s<?=$pet['pet']?>.png?v=2">
                      <a class="c_brown3 td_un" href="/profile?id=<?=$pet['id']?>"><?=$pet['name']?></a>
                    </td>
                    <td class="cntr">
                      <?=$pet['level']?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <div class="pgn">
              <?php if($page_num > 1): ?>
                <a class="page_link" href="?page=1">&lt;&lt;</a>
              <?php endif; ?>
              <?php if($page_num >= 2): ?>
                <a class="page_link <?=$page_num?>" href="?page=<?=$page_num-1?>"><?=$page_num-1?></a>
              <?php endif; ?>
              <a class="page_link_current cur" href="?page=<?=$page_num?>"><?=$page_num?></a>
              <?php if($maxpage > $page_num): ?>
                <a class="page_link" href="?page=<?=$page_num+1?>"><?=$page_num+1?></a>
              <?php endif; ?>
              <?php if($page_num < $maxpage): ?>
                <a class="page_link" href="?page=<?=$maxpage?>">&gt;&gt;</a>
              <?php endif; ?>
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
            Список активных игроков за последние 5 минут
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
                  <a href="/search_pet" class="mb_ttl search">Поиск питомца</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>