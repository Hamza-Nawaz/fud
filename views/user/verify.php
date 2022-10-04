<?php
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$_SERVER['SERVER_NAME']?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/owl.carousel.css">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/owl.theme.css">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/wave/waves.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/notika-custom-icon.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?=Yii::$app->params['base_url']?>/asset/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- 404 Page area Start-->
<div class="error-page-area">
    <div class="error-page-wrap">
        <i class="notika-icon notika-close"></i>
        <h2>Attention</h2>
        <br/>
        <h3>Verify Your Email</h3>
        <p>Check Your Mail Inbox or Spam Folder to Verify your Email. Thank you</p>
        <a href="<?=Yii::$app->params['base_url']?>/user/login" class="btn">Login</a>
        <a href="<?=Yii::$app->params['base_url']?>/user/login" class="btn error-btn-mg">Back</a>
    </div>
</div>
<!-- 404 Page area End-->
<!-- jquery
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/jquery-price-slider.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/owl.carousel.min.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/jquery.scrollUp.min.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/meanmenu/jquery.meanmenu.js"></script>
<!-- counterup JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/counterup/jquery.counterup.min.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/counterup/waypoints.min.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/counterup/counterup-active.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- sparkline JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/sparkline/jquery.sparkline.min.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/sparkline/sparkline-active.js"></script>
<!-- flot JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/flot/jquery.flot.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/flot/jquery.flot.resize.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/flot/flot-active.js"></script>
<!-- knob JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/knob/jquery.knob.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/knob/jquery.appear.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/knob/knob-active.js"></script>
<!--  wave JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/wave/waves.min.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/wave/wave-active.js"></script>
<!--  Chat JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/chat/jquery.chat.js"></script>
<!--  todo JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/todo/jquery.todo.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="<?=Yii::$app->params['base_url']?>/asset/js/main.js"></script>
</body>

</html>
