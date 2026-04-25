<div class="ovh" style="padding-top: 1px;">
</div>

<div class="content">
	<div class="start">
		<div class="msg mrg_msg1 mt10 c_brown4">
			<div class="wr_bg">
				<div class="wr_c1">
					<div class="wr_c2">
						<div class="wr_c3">
							<div class="wr_c4 font_14">
								<img src="/view/image/welcome.png?"><br>
								<div class="mb10">
									<a href="/start" class="bbtn mt5 mb5" style="width: 120px">
										<span class="br">
											<span class="bc">Начать игру</span>
										</span>
									</a>
									<br>Привет! Я твой питомец, люби и ухаживай за мной и я отплачу тебе любовью, преданностью и победами на выставках!
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="msg mrg_msg1 mt5 c_brown4">
			<div class="wr_bg">
				<div class="wr_c1">
					<div class="wr_c2">
						<div class="wr_c3">
							<div class="wr_c4 font_14">
								<form action="/" method="POST">
									<div class="mb3">Имя</div>
									<input class="login_input mb10" type="text" name="name" value=""><br>
									<div class="mb3">Пароль</div>
									<input class="login_input mb10" type="password" name="password"><br>
      	          <?php if($error) { ?><div class="c_red mt5 mb5"><?=$error?></div><?php } ?>
									<div class="bbtn_sm mt3 mb10">
										<div class="br">
											<input style="width: 72px" type="submit" value="Войти">
										</div>
									</div>
								</form>
								<?php if(1 == 0){ ?>
									<div class="mb10">
										<a href="/recover_pw" class="darkgreen_link">Забыли пароль?</a>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>