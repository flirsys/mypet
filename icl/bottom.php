<div class="marea mt5 dbmenu">
	<div class="bmenu">
		<table class="tbmenu">
			<tbody>
        <tr>
					<td class="va-t ">
						<span class="wbmenu">
							<a href="/">
								<img src="/view/img/bmenu-home.png" width="75" height="67" alt="Главная">
								<span class="ttl-m green">
                  <span class="tr">
                    <span class="tc">Главная</span>
                  </span>
                </span>
							</a>
						</span>
					</td>
					<td class="va-t ">
						<span class="wbmenu">
							<a href="/profile">
								<img src="/view/img/ava<?=$core->user['pet']?>.png" height="67" alt="Питомец">
								<span class="ttl-m lyell">
                  <span class="tr">
                    <span class="tc">Питомец</span>
                  </span>
                </span>
							</a>
						</span>
					</td>
					<?php if($core->user['level'] >= 5): ?>
						<td class="va-t">
							<span class="wbmenu">
								<a href="/club">
									<img src="/view/img/bmenu-club.png" width="75" height="67" alt="Клуб">
									<span class="ttl-m lblue">
          	        <span class="tr">
            	        <span class="tc">Клуб</span>
              	    </span>
                	</span>
								</a>
							</span>
						</td>
					<?php endif; ?>
				</tr>
			</tbody>
    </table>
	</div>
</div>


<div class="rplate mt10">
  <div class="rp_r">
    <div class="rp_c">
      <div class="wr pt3">
        <a href="/forum" class="td_no">Форум</a>
				<?php if($core->user['level'] >= 4){ ?>
					<span class="separator"></span>
					<a href="/chat" class="td_no">Чат</a>
				<?php } ?>
				<span class="separator"></span>
        <a href="/about" class="td_no">Об игре</a>
      </div>
    </div>
  </div>
</div>