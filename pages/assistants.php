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

<div class="ttl lgreen mrg_ttl mt10 mb10">
	<div class="tr">
		<div class="tc">Работники</div>
	</div>
</div>

<div class="msg mrg_msg1 mt10 c_brown4">
	<div class="wr_bg">
		<div class="wr_c1">
			<div class="wr_c2">
				<div class="wr_c3">
					<div class="wr_c4">
						<div class="shop_item left">
							<img src="/view/image/assistant/jeweler.png">
							<div class="text_item">
								<span class="span1 mt5">
									<span class="mb3 ib">Ювелир <?php if($assi1['level'] > 0) {?>+<img class="price_img ml2" src="/view/image/icons/beauty.png"><?=$assi1['beauty']?>%<?php } ?></span>
								</span>
								<?php if($_my){ ?>
									<span class="span2 font_14 mb3">
										<span class="">
											<?php if($assi1['level'] > 0) {?>
												Драгоценности в ларце дают на <?=$assi1['beauty']?>% больше <span><img class="price_img" src="/view/image/icons/beauty.png">красоты</span>
												<br><span class="ib mt3"><span class="font_14">Уровень: <?=$assi1['level']?></span></span>
											<?php }else{ ?>
												<span class="gray_color">Не нанят на работу</span>
												<br>Известный ювелир улучшит ваш ларец, сделав его красивее
											<?php } ?>
										</span>
									</span>
								<?php }else{ ?>
									<br><br>
								<?php } ?>
							</div>
							<?php if($_my){ ?>
								<div class="cntr">
									<a href="/assistants?up=1" class="bbtn mt5 mb5">
										<span class="br">
											<span class="bc"><?=$assi1['level'] > 0 ? 'Тренировать' : 'Нанять'?> за <img class="price_img" src="/view/image/icons/coin.png"><?=$assi1['price']?></span>
										</span>
									</a>
								</div>
							<?php } ?>
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
					<div class="wr_c4">
						<div class="shop_item left">
							<img src="/view/image/assistant/gardener.png">
							<div class="text_item">
								<span class="span1 mt5">
									<span class="mb3 ib">Садовник <?php if($assi2['level'] > 0) {?>+<img class="price_img ml2" src="/view/image/icons/beauty.png"><?=$assi2['beauty']?>%<?php } ?></span>
								</span>
								<?php if($_my){ ?>
									<span class="span2 font_14 mb3">
										<span class="">
											<?php if($assi2['level'] > 0) {?>
												Цветы в саду дают на <?=$assi2['beauty']?>% больше <span><img class="price_img" src="/view/image/icons/beauty.png">красоты</span>
												<br><span class="ib mt3"><span class="font_14">Уровень: <?=$assi2['level']?></span></span>
											<?php }else{ ?>
												<span class="gray_color">Не нанят на работу</span>
												<br>Известный садовник улучшит ваш сад, сделав его красивее
											<?php } ?>
										</span>
									</span>
								<?php }else{ ?>
									<br><br>
								<?php } ?>
							</div>
							<?php if($_my){ ?>
								<div class="cntr">
									<a href="/assistants?up=2" class="bbtn mt5 mb5">
										<span class="br">
											<span class="bc"><?=$assi2['level'] > 0 ? 'Тренировать' : 'Нанять'?> за <img class="price_img" src="/view/image/icons/coin.png"><?=$assi2['price']?></span>
										</span>
									</a>
								</div>
							<?php } ?>
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
					<div class="wr_c4">
						<div class="shop_item left">
							<img src="/view/image/assistant/designer.png">
							<div class="text_item">
								<span class="span1 mt5">
									<span class="mb3 ib">Дизайнер <?php if($assi3['level'] > 0) {?>+<img class="price_img ml2" src="/view/image/icons/beauty.png"><?=$assi3['beauty']?>%<?php } ?></span>
								</span>
								<?php if($_my){ ?>
									<span class="span2 font_14 mb3">
										<span class="">
											<div class="mb3">
												<?php if($assi3['level'] > 0) {?>
													Вещи в доме дают на <?=$assi3['beauty']?>% больше <span><img class="price_img" src="/view/image/icons/beauty.png">красоты</span>
													<br><span class="ib mt3"><span class="font_14">Уровень: <?=$assi3['level']?></span></span>
												<?php }else{ ?>
													<span class="gray_color">Не нанят на работу</span>
													<br>Известный дизайнер улучшит интерьер вашего домика, сделав его красивее
												<?php } ?>
											</div>
										</span>
									</span>
								<?php }else{ ?>
									<br><br>
								<?php } ?>
							</div>
							<?php if($_my){ ?>
								<div class="cntr">
									<a href="/assistants?up=3" class="bbtn mt5 mb5">
										<span class="br">
											<span class="bc"><?=$assi3['level'] > 0 ? 'Тренировать' : 'Нанять'?> за <img class="price_img" src="/view/image/icons/coin.png"><?=$assi3['price']?></span>
										</span>
									</a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if($_my){ ?>
	<div class="msg mrg_msg1 mt10 c_brown3">
		<div class="wr_bg">
			<div class="wr_c1">
				<div class="wr_c2">
					<div class="wr_c3">
						<div class="wr_c4">
							Работники нанимаются один раз и остаются с вами навсегда. Тренируйте работников чтобы получить еще больше красоты.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }else{ ?>
  <div class="marea mt10">
    <div class="wr_bg">
      <div class="wr_c1">
        <div class="wr_c2">
          <div class="wr_c3">
            <div class="wr_c4">
              <div class="mbtn">
                <div class="mb_r">
                  <div class="mb_c">
                    <a href="/profile?id=<?=$user['id']?>" class="mb_ttl back">Назад</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>