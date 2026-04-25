<span class="ava_stat">
  <a href="/profile">
    <img src="/view/img/ava<?=$core->user['pet']?>_mini.png" alt="pet">
  </a>
</span>

<div class="hdr">
	<span class="stat">
    <img class="price_img" src="/view/image/icons/beauty.png" alt=""><?=$core->user['beauty']?>
  </span>
	<span class="stat">
    <img class="price_img" src="/view/image/icons/coin.png" alt=""><?=$core->user['coin']?>
  </span>
	<span class="stat">
    <img class="price_img" src="/view/image/icons/heart.png" alt=""><?=$core->formatNumber($core->user['heart'])?>
  </span>
</div>

<div class="top_right_cont">
  <?php if($mess->getUnreadCount($core->user['id']) > 0){ ?>
    <a class="post_btn_top" href="/messages">
	  </a>
  <?php } ?>
</div>

<div class="rplate">
  <div class="rp_r">
    <div class="rp_c">
      <div class="wr">
        <table class="small h24 bold">
          <tbody>
            <tr>
              <td class="vm plr5 c_brown3 nwr pt2">
                <img class="vm mb3" src="/view/img/ico16-up.png" height="16" width="16" alt="">
                <?=$core->user['level']?>
              </td>
			        <td class="vm w100">
                <div class="prg">
                  <div class="end">
                    <div class="rate" style="width:<?=$core->user['exp_p']?>%;">
                      <div class="rr">
                        <div class="rl">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <td class="vm plr5 c_brown3">
                <?=$core->user['exp_p']?>%
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>