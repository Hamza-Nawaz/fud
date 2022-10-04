<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$_SERVER['SERVER_NAME']?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/owl.carousel.css">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/owl.theme.css">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/owl.transitions.css">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/meanmenu/meanmenu.min.css">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/animate.css">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/normalize.css">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/notika-custom-icon.css">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/wave/waves.min.css">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/wave/button.css">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/main.css">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/style.css">
    <link rel="stylesheet" href="<?=Yii::$app->params['base_url']?>/asset/css/responsive.css">


    <script src="<?=Yii::$app->params['base_url']?>/asset/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body  style="background: #F6F8FA;">
<?php $this->beginBody() ?>
<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo-area">
                    <a href="#"><img src="<?=Yii::$app->params['base_url']?>logo-10.png" alt="" /></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">

                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link"><span style=" font-size: 15px;">Account</span></a>
                            <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">

                                <?php if(\app\models\ShopUsers::is_LoggedIn() && \app\models\ShopUsers::is_buyer()){ ?>
                                    <div class="hd-mg-tt">
                                        <h2>Hello Mr.<?=Yii::$app->session->get('buyer_username') ?></h2>
                                    </div>
                                <div class="hd-message-info" style="text-align: left">
                                    <div class="hd-message-info" style="text-align: left">
                                        <a href="<?=Yii::$app->params['base_url']?>user-balance/add-balance">
                                            <div class="hd-message-sn">
                                                <div class="hd-mg-ctn">
                                                    <p><i class="fa-solid fa-coins"></i>  Your Balance  ( <span class="badge badge-primary"><?=\app\models\WebUsersBalance::check_balance(); ?>  </span>  )</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="<?=Yii::$app->params['base_url']?>/orders/index">
                                            <div class="hd-message-sn">
                                                <div class="hd-mg-ctn">
                                                    <p>  <i class="fa-solid fa-bag-shopping"></i> Your Orders</p>
                                                </div>
                                            </div>
                                        </a>

<!--                                        <a href="--><?//=Yii::$app->params['base_url']?><!--/report/index">-->
<!--                                            <div class="hd-message-sn">-->
<!--                                                <div class="hd-mg-ctn">-->
<!--                                                    <p>  <i class="fas fa-flag"></i> Your Reports</p>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </a>-->


                                    <a href="<?=Yii::$app->params['base_url']?>/user/change-password">
                                        <div class="hd-message-sn">
                                            <div class="hd-mg-ctn">
                                                <p><i class="fa-solid fa-key"></i> Change Password</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="<?=Yii::$app->params['base_url']?>user/logout">
                                        <div class="hd-message-sn">
                                            <div class="hd-mg-ctn">
                                                <p><i class="fa-solid fa-right-from-bracket"></i>Logout</p>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <?php }
                                else if(\app\models\ShopUsers::is_LoggedIn() && \app\models\ShopUsers::is_admin()){ ?>
                                    <div class="hd-mg-tt">
                                        <h2>Hello Mr.<?=Yii::$app->session->get('admin_username') ?></h2>
                                    </div>
                                    <a href="<?=Yii::$app->params['base_url']?>/orders/index">
                                        <div class="hd-message-sn">
                                            <div class="hd-mg-ctn">
                                                <p>  <i class="fa-solid fa-bag-shopping"></i> Total Orders</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="<?=Yii::$app->params['base_url']?>/report/index">
                                        <div class="hd-message-sn">
                                            <div class="hd-mg-ctn">
                                                <p>  <i class="fas fa-flag"></i> Total Reports</p>
                                            </div>
                                        </div>
                                    </a>
                                <div class="hd-message-info" style="text-align: left">
                                    <a href="<?=Yii::$app->params['base_url']?>/user/change-password">
                                        <div class="hd-message-sn">
                                            <div class="hd-mg-ctn">
                                                <p><i class="fa-solid fa-key"></i> Change Password</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="<?=Yii::$app->params['base_url']?>/user/logout">
                                        <div class="hd-message-sn">
                                            <div class="hd-mg-ctn">
                                                <p><i class="fa-solid fa-right-from-bracket"></i>Logout</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php }
                                else if((\app\models\ShopUsers::is_LoggedIn() && \app\models\ShopUsers::is_seller() )||( \app\models\ShopUsers::is_LoggedIn() && \app\models\ShopUsers::is_support())){ ?>
                                <a href="<?=Yii::$app->params['base_url']?>/user/logout">
                                    <div class="hd-message-sn">
                                        <div class="hd-mg-ctn">
                                            <p><i class="fa-solid fa-right-from-bracket"></i>Logout</p>
                                        </div>
                                    </div>
                                </a>
                                <?php }?>
                            </div>
                        </li>

                    </ul>
                    <?php if(\app\models\ShopUsers::is_buyer()){ ?>
<!--                    <ul class="nav navbar-nav notika-top-nav">-->
<!--                        <li class="nav-item"> <a href="--><?//=Yii::$app->params['base_url']?><!--user-balance/add-balance"  role="button"  class="nav-link"><span style="font-size: 20px; margin-left: -20%;">  <span class="badge badge-primary"><i class="fas fa-sack-dollar"></i> Balance - --><?//=\app\models\WebUsersBalance::check_balance(); ?><!-- </span></span></a></li>-->
<!--                    </ul>-->
<!---->
<!--                    <ul class="nav navbar-nav notika-top-nav">-->
<!--                        <li class="nav-item"><a href="--><?//=Yii::$app->params['base_url']?><!--/orders/index"  role="button"  class="nav-link"><span style="font-size: 20px; margin-left: -60%;">  <span class="badge badge-info"><i class="fas fa-shopping-bag"></i>Orders</span> </span></a></li>-->
<!--                    </ul>-->
    <?php } ?>
                      <ul class="nav navbar-nav notika-top-nav">
                        <li class="nav-item"> <a href="https://icq.im/BuySpamTools"  role="button" aria-expanded="false" class="nav-link"><span style="font-size: 25px; margin-left: -360%;">  <span class="badge badge-secondary"><i class="fab fa-telegram"></i>Add on Telegram</span></span></a></li>
                    </ul>
                       <ul class="nav navbar-nav notika-top-nav">
                        <li class="nav-item"> <a href="https://t.me/buyspamtools"  role="button" aria-expanded="false" class="nav-link"><span style="font-size: 25px; margin-left: -500%;">  <span class="badge badge-success"><i class="fas fa-comment"></i>Add on ICQ  </span></span></a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <?php if(\app\models\ShopUsers::is_admin() || \app\models\ShopUsers::is_seller()){ ?>
                            <li>
                                <a data-toggle="collapse" data-target="#user" href="<?=Yii::$app->params['base_url']?>/user/index">Users</a>
                            </li>
                            <?php }?>
                            <li><a data-toggle="collapse" data-target="#democrou" href="#">Webmails</a>
                                <ul class="notika-main-menu-dropdown">
                                    <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-ionos">Ionos</a>
                                    </li>
                                    <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-zimbra">Zimbra</a>
                                    </li>
                                    <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-rackspace">Rackspace</a>
                                    </li>
                                    <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-starto">Strato</a>
                                    </li>
                                    <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-t-online">T-Online</a>
                                    </li>

                                    <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-kagoya">Kagoya</a>
                                    </li>
                                    <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-biglobejp">Biglobe JP</a>
                                    </li>
                                    <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-aruba">Aruba</a>
                                    </li>
                                    <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails">All Webmails</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a data-toggle="collapse" data-target="#" href="#">Software license</a>
                            </li>
                            <li>
                                <a data-toggle="collapse" data-target="#" href="#">RDP Restart</a>
                            </li>

                            <li><a data-toggle="collapse" data-target="#demolibra" href="#">Tools & Software</a>
                                <ul id="demolibra" class="collapse dropdown-header-top">
                                    <li><a href="flot-charts.html">Senders</a></li>
                                    <li><a href="bar-charts.html">Verifiers</a></li>
                                    <li><a href="line-charts.html">Others</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demodepart" href="#">Host</a>
                                <ul id="demodepart" class="collapse dropdown-header-top">
                                    <li><a href="normal-table.html">Shells</a></li>
                                    <li><a href="data-table.html">cPanels</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <?php if(\app\models\ShopUsers::is_admin() || \app\models\ShopUsers::is_seller()){ ?>
                    <li ><a  href="<?=Yii::$app->params['base_url']?>user/index"><i class="notika-icon notika-star"></i>Users</a>
                    </li>
                    <?php  }?>
                    <?php if(\app\models\ShopUsers::is_buyer()){ ?>
                    <li><a data-toggle="tab" href="#smtp"><i class="notika-icon notika-menus"></i>Smtps</a>
                    </li>
                    <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-app"></i>Webmails</a>
                    </li>
                    <li><a data-toggle="tab" href="#Tables"><i class="notika-icon notika-windows"></i>Host</a>
                    </li>

                    <?php } ?>
                    <?php if(\app\models\ShopUsers::is_support()){ ?>
                        <li><a  href="<?=Yii::$app->params['base_url']?>report/index"><i class="notika-icon notika-paperclip"></i>Reports</a>
                        </li>
                    <?php } ?>
                    <?php if(!\app\models\ShopUsers::is_support()){ ?>
                    <li><a data-toggle="tab" href="#Charts"><i class="notika-icon notika-settings"></i>Tools & Software</a>
                    </li>
                    <li><a  href="<?=Yii::$app->params['base_url']?>tools-license/index"><i class="notika-icon notika-star"></i>Software License</a>
                    </li>
                    <li><a  href="<?=Yii::$app->params['base_url']?>rdp/index"><i class="notika-icon notika-social"></i>RDP Restart</a>
                    </li>
                    <?php }?>
                </ul>
                <div class="tab-content custom-menu-content">
                    <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="<?=Yii::$app->params['base_url']?>/softwares-tools/senders">Senders</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>/softwares-tools/verifiers">Verifiers</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>/softwares-tools/senders">Others</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>/softwares-tools/index">All</a>
                            </li>
                        </ul>
                    </div>
                    <?php if(\app\models\ShopUsers::is_buyer()){ ?>
                    <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-ionos">Ionos</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-zimbra">Zimbra</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-rackspace">Rackspace</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-starto">Strato</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-t-online">T-Online</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-kagoya">Kagoya</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-biglobejp">Biglobe JP</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails-aruba">Aruba</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>/account/webmails">All Webmails</a>
                            </li>
                            </li>
                        </ul>
                    </div>


                    <div id="smtp" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="<?=Yii::$app->params['base_url']?>account/smtp-ionos">Ionos</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>account/smtp-rackspace">Rackspace</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>account/smtp-inboxlv">Inbox.lv</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>account/smtp-gmx">GMX</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>account/smtp-office365">Office365</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>account/smtp-strato">Strato</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>account/smtp-sendgrid">Sendgrid</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>account/smtp-biglobe">Biglobe</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>account/smtps">All Smtps</a>
                            </li>
                        </ul>
                    </div>
                    <div id="Tables" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="<?=Yii::$app->params['base_url']?>/account/shells">Shells</a>
                            </li>
                            <li><a href="<?=Yii::$app->params['base_url']?>/account/cpanel">cPanels</a>
                            </li>
                        </ul>
                    </div>
                    <?php } ?>
                </div>

                </div>
            </div>
        </div>
    </div>
<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>



<div class="footer-copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="footer-copy-right">
                    <p>Copyright © 2022 All rights reserved.  MarketPlace.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var base_url= "<?= Yii::$app->params['base_url'] ?>"
</script>

<script src="<?=Yii::$app->params['base_url']?>/asset/js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/bootstrap.min.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/wow.min.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/jquery-price-slider.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/owl.carousel.min.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/jquery.scrollUp.min.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/meanmenu/jquery.meanmenu.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/counterup/jquery.counterup.min.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/counterup/waypoints.min.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/counterup/counterup-active.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/sparkline/jquery.sparkline.min.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/sparkline/sparkline-active.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/flot/jquery.flot.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/flot/jquery.flot.resize.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/flot/flot-active.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/knob/jquery.knob.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/knob/jquery.appear.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/knob/knob-active.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/icheck/icheck.min.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/icheck/icheck-active.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/chat/jquery.chat.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/todo/jquery.todo.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/plugins.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/main.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/buytools.js?<?php echo date('Y-m-d_H:i:s'); ?>"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/buyaccounts.js?<?php echo date('Y-m-d_H:i:s'); ?>"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/reporting.js?<?php echo date('Y-m-d_H:i:s'); ?>"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/restpass.js?<?php echo date('Y-m-d_H:i:s'); ?>"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


