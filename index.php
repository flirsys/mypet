<?php
  session_start();
  $start = microtime(true);
  date_default_timezone_set('Europe/Moscow');
  // ini_set('error_reporting', E_ALL);
  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  
  define('DIR', $_SERVER['DOCUMENT_ROOT']);
  define('URL', $_SERVER['REQUEST_URI']);
  define('QUERY', $_SERVER['QUERY_STRING'] ?? "");
  
  spl_autoload_register();

  $url_str = explode('?', URL);
  if(mb_substr($url_str[0], 0, 1) === "/")
    $url_str[0] = substr($url_str[0], 1);
  $url_str = explode('/', $url_str[0]);
  $url = str_replace('/', '', $url_str[0]);

  $core = new core\Core();
  
  if(!$core->user){
    if($url != 'start') {
      if(!$core->user) $url = "login";
    }
  }
  
  if($core->user){
    if($core->user['pet'] === null){
      $url = 'start';
    }else{
      $mess = new core\Messages();
    }
  }

  if (!file_exists("pages/$url.php")) $url = "home";
  $page = "pages/$url.php";
  if (file_exists("action/$url.php")) include_once DIR."/action/$url.php";

  
?>
<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MyPet</title>
    <link rel="icon" href="view/image/avatar_icon.png" type="image/png">

    <?php $verstyles = 3;//time(); ?>
    <link href="view/style/style.css?ver=<?=$verstyles?>" rel="stylesheet" type="text/css" />
  </head>
  <body>
    
    <?php if($core->user && $core->user['pet'] !== null){
      include_once DIR."/icl/top.php";
    } ?>

    <div class="container">
      <main>
        <?php if (defined('NEW_DAY')) { ?>
          <div class="msg mrg_msg1 mt10 c_brown">
            <div class="wr_bg">
              <div class="wr_c1">
                <div class="wr_c2">
                  <div class="wr_c3">
                    <div class="wr_c4">
                      <span class="darkgreen_link">
                        Ежедневный подарок <img class="price_img" src="/view/image/icons/coin.png">10 монет!
                        <br>Приходи завтра и получишь еще монет.
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php include_once DIR."/".$page; ?>
      </main>
    </div>

    <?php if($core->user && $core->user['pet'] !== null){
      include_once DIR."/icl/bottom.php";
    } ?>

    <div class="small mt20 mb20 c_lbrown cntr td_un">
      <?php
        $end = microtime(true);
        $loadTime = $end - $start;
        $currentTime = date("H:i:s");
      ?>
			<div class="mb10">
			  <?php if($core->user && $core->user['pet'] !== null){ ?>
          <a href="/settings" class="ib mlr8">Настройки</a>
			    <a href="/online" class="ib mlr8">Онлайн: <?=$core->getOnlineCount()?></a>
		    <?php }else{ ?>
          Онлайн: <?=$core->getOnlineCount()?>
        <?php } ?>
      </div>
  	  <div class="mt5 mb5">
			  <?=round($loadTime, 4)?> сек, <?=$currentTime?><br>
			  <a href="https://foxso.gq" target="_blank">FOXso</a> © 2025, 14+<br>
        ver 0.0.1b
		  </div>
  	  <div class="mt10 mb5">
			  <div class="mt10">
          <a target="_blank" href="http://mpets.mobi">Оригинал</a>
        </div>
      </div>
    </div>
    <div class="ovh">
	    <br>
    </div>
  </body>
</html>