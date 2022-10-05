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
<html lang="<?= Yii::$app->language ?>"class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible"content="ie=edge">
        <title><?=$_SERVER['SERVER_NAME']?></title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"rel="stylesheet"/>
        <!-- Nucleo Icons -->
        <link href="<?=yii::$app->params["base_url"]?>asset_01/css/nucleo-icons.css"rel="stylesheet"/>
        <link href="<?=yii::$app->params["base_url"]?>asset_01/css/nucleo-svg.css"rel="stylesheet"/>
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js"crossorigin="anonymous"></script>
        <link href="<?=yii::$app->params["base_url"]?>asset_01/css/nucleo-svg.css"rel="stylesheet"/>
        <!-- CSS Files -->
        <link id="pagestyle"href="<?=yii::$app->params["base_url"]?>asset_01/css/argon-dashboard.css?v=2.0.4"rel="stylesheet"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>








        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Dashboard V.1 | Nalika - Material Admin Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon
            ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="<?=yii::$app->params["base_url"]?>asset_1/img/favicon.ico">
        <!-- Google Fonts
            ============================================ -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
        <!-- Bootstrap CSS
            ============================================ -->
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/bootstrap.min.css">
        <!-- Bootstrap CSS
            ============================================ -->
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/font-awesome.min.css">
        <!-- nalika Icon CSS
            ============================================ -->
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/nalika-icon.css">
        <!-- owl.carousel CSS
            ============================================ -->
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/owl.carousel.css">
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/owl.theme.css">
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/owl.transitions.css">
        <!-- animate CSS
            ============================================ -->
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/animate.css">
        <!-- normalize CSS
            ============================================ -->
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/normalize.css">
        <!-- meanmenu icon CSS
            ============================================ -->
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/meanmenu.min.css">
        <!-- main CSS
            ============================================ -->
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/main.css">
        <!-- morrisjs CSS
            ============================================ -->
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/morrisjs/morris.css">
        <!-- mCustomScrollbar CSS
            ============================================ -->
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/scrollbar/jquery.mCustomScrollbar.min.css">
        <!-- metisMenu CSS
            ============================================ -->
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/metisMenu/metisMenu.min.css">
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/metisMenu/metisMenu-vertical.css">
        <!-- calendar CSS
            ============================================ -->
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/calendar/fullcalendar.min.css">
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/calendar/fullcalendar.print.min.css">
        <!-- style CSS
            ============================================ -->
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/style.css">
        <!-- responsive CSS
            ============================================ -->
        <link rel="stylesheet" href="<?=yii::$app->params["base_url"]?>asset_1/css/responsive.css">
        <!-- modernizr JS
            ============================================ -->
        <script src="<?=yii::$app->params["base_url"]?>asset_1/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
   



    <body>
    <?php $this->beginBody() ?>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="<?=yii::$app->params["base_url"]?>asset_1/img/logo/logo.png" alt="" /></a>
                <strong><img src="<?=yii::$app->params["base_url"]?>asset_1/img/logo/logosn.png" alt="" /></strong>
            </div>
            <?php if(\app\models\ShopUsers::is_buyer() && \app\models\ShopUsers::is_LoggedIn()){?>
                <div class="left-custom-menu-adp-wrap comment-scrollbar">
                    <nav class="sidebar-nav left-sidebar-menu-pro">
                        <ul class="metismenu" id="menu1">

                            <li class="active">
                                <a class="has-arrow" href="index.html">
                                    <i class="icon nalika-home icon-wrap"></i>
                                    <span class="mini-click-non">Smtps</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li><a title="Ionos" href="<?=Yii::$app->params['base_url']?>account/smtp-ionos"><span class="mini-sub-pro">Ionos</span></a></li>
                                    <li><a title="Rackspace" href="<?=Yii::$app->params['base_url']?>account/smtp-rackspace"> <span class="mini-sub-pro">Rackspace</span></a></li>
                                    <li><a title="Inbox.lv" href="<?=Yii::$app->params['base_url']?>account/smtp-inboxlv">Inbox.lv</span></a></li>
                                    <li><a title="GMX" href="<?=Yii::$app->params['base_url']?>account/smtp-gmx"><span class="mini-sub-pro">GMX</span></a></li>
                                    <li><a title="Office 365" href="<?=Yii::$app->params['base_url']?>account/smtp-office365"><span class="mini-sub-pro">Office 365</span></a></li>
                                    <li><a title="Strato" href="<?=Yii::$app->params['base_url']?>account/smtp-strato"><span class="mini-sub-pro">Strato</span></a></li>
                                    <li><a title="Sendgrid" href="<?=Yii::$app->params['base_url']?>account/smtp-sendgrid"><span class="mini-sub-pro">Sendgrid</span></a></li>
                                    <li><a title="Big Lobe" href="<?=Yii::$app->params['base_url']?>account/smtp-biglobe"><span class="mini-sub-pro">Biglobe</span></a></li>
                                    <li><a title="All Webmails" href="<?=Yii::$app->params['base_url']?>account/smtps"><span class="mini-sub-pro">All Smtps</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-mail icon-wrap"></i> <span class="mini-click-non">Web mails</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="Ionos" href="<?=Yii::$app->params['base_url']?>/account/webmails-ionos"><span class="mini-sub-pro">Ionos</span></a></li>
                                    <li><a title="Zimbra" href="<?=Yii::$app->params['base_url']?>/account/webmails-zimbra">Zimbra</span></a></li>
                                    <li><a title="Rackspace" href="<?=Yii::$app->params['base_url']?>/account/webmails-rackspace">Rackspace</span></a></li>
                                    <li><a title="Strato" href="<?=Yii::$app->params['base_url']?>/account/webmails-starto">Strato</span></a></li>
                                    <li><a title="T-Online" href="<?=Yii::$app->params['base_url']?>/account/webmails-t-online"><span class="mini-sub-pro">T-Online</span></a></li>
                                    <li><a title="Kagoya" href="<?=Yii::$app->params['base_url']?>/account/webmails-kagoya"><span class="mini-sub-pro">Kagoya</span></a></li>
                                    <li><a title="Biglobe JP" href="<?=Yii::$app->params['base_url']?>/account/webmails-biglobejp"><span class="mini-sub-pro">Biglobe JP</span></a></li>
                                    <li><a title="Aruba" href="<?=Yii::$app->params['base_url']?>/account/webmails-aruba"><span class="mini-sub-pro">Aruba</span></a></li>
                                    <li><a title="All Webmails" href="<?=Yii::$app->params['base_url']?>/account/webmails"><span class="mini-sub-pro">All Webmails</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-non">Hosts</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="Shell" href="<?=Yii::$app->params['base_url']?>/account/shells"><span class="mini-sub-pro">Shell</span></a></li>
                                    <li><a title="C-Panels" href="<?=Yii::$app->params['base_url']?>/account/cpanel"><span class="mini-sub-pro">C-Panels</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-pie-chart icon-wrap"></i> <span class="mini-click-non">Tools & Software</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="Senders" href="<?=Yii::$app->params['base_url']?>/softwares-tools/senders"><span class="mini-sub-pro">Senders</span></a></li>
                                    <li><a title="Verifiers" href="<?=Yii::$app->params['base_url']?>/softwares-tools/verifiers"><span class="mini-sub-pro">Verifiers</span></a></li>
                                    <li><a title="Others" href="<?=Yii::$app->params['base_url']?>/softwares-tools/senders"><span class="mini-sub-pro">Others</span></a></li>
                                    <li><a title="Alls" href="<?=Yii::$app->params['base_url']?>/softwares-tools/index"><span class="mini-sub-pro">Alls</span></a></li>
                                </ul>
                            </li><li><a title="Software & Licence" href="<?=Yii::$app->params['base_url']?>tools-license/index"> <span class="mini-sub-pro">Software & Licence</span></a></li>
                            <li><a title="RDP Restart" href="<?=Yii::$app->params['base_url']?>rdp/index"><span class="mini-sub-pro">RDP Restart</span></a></li>
                        </ul>
                    </nav>
                </div>
            <?php } elseif(\app\models\ShopUsers::is_LoggedIn() && \app\models\ShopUsers::is_seller()){ ?>
                <div class="left-custom-menu-adp-wrap comment-scrollbar">
                    <nav class="sidebar-nav left-sidebar-menu-pro">
                        <ul class="metismenu" id="menu1">
                            <li><a title="Software & Licence" href="<?=Yii::$app->params['base_url']?>user/index"> <span class="mini-sub-pro">Users</span></a></li>
                            <li>
                                <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-pie-chart icon-wrap"></i> <span class="mini-click-non">Tools & Software</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="Senders" href="<?=Yii::$app->params['base_url']?>/softwares-tools/senders"><span class="mini-sub-pro">Senders</span></a></li>
                                    <li><a title="Verifiers" href="<?=Yii::$app->params['base_url']?>/softwares-tools/verifiers"><span class="mini-sub-pro">Verifiers</span></a></li>
                                    <li><a title="Others" href="<?=Yii::$app->params['base_url']?>/softwares-tools/senders"><span class="mini-sub-pro">Others</span></a></li>
                                    <li><a title="Alls" href="<?=Yii::$app->params['base_url']?>/softwares-tools/index"><span class="mini-sub-pro">Alls</span></a></li>
                                </ul>
                            </li>
                            <li><a title="Software & Licence" href="<?=Yii::$app->params['base_url']?>tools-license/index"> <span class="mini-sub-pro">Software & Licence</span></a></li>
                            <li><a title="RDP Restart" href="<?=Yii::$app->params['base_url']?>rdp/index"><span class="mini-sub-pro">RDP Restart</span></a></li>
                        </ul>
                    </nav>
                </div>
            <?php } elseif (\app\models\ShopUsers::is_LoggedIn() && \app\models\ShopUsers::is_support()){  ?>
                <div class="left-custom-menu-adp-wrap comment-scrollbar">
                    <nav class="sidebar-nav left-sidebar-menu-pro">
                        <ul class="metismenu" id="menu1">


                            <li><a title="Software & Licence" href="<?=Yii::$app->params['base_url']?>/report/index"> <span class="mini-sub-pro">Reports</span></a></li>
                        </ul>
                    </nav>
                </div>
            <?php } ?>

        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="<?=yii::$app->params["base_url"]?>asset_1/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="icon nalika-menu-task"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n hd-search-rp">
                                            <div class="breadcome-heading">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <?php if(\app\models\ShopUsers::is_buyer() && \app\models\ShopUsers::is_LoggedIn()){?>
                                        <div class="header-right-info" style="margin-top: 15px">
                                            <span style="padding: 3px"><a href="https://icq.im/mr_coder@inbox.ru" class="btn btn-success btn-sm active" role="button" aria-pressed="true">Add on ICQ<a></span>
                                            <span style="padding: 3px"><a href="https://t.me/fudsender" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Add on Telegram<a></span>
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <i class="icon nalika-user"></i>
                                                        <span class="admin-name">Fud Sender</span>
                                                    </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="<?=Yii::$app->params['base_url']?>user-balance/add-balance"><span class="icon nalika-home author-log-ic"></span>Your Balance(  <span class="badge badge-primary text-white"><?=\app\models\WebUsersBalance::check_balance(); ?></span>)</a>
                                                        </li>
                                                        <li><a href="<?=Yii::$app->params['base_url']?>/orders/index"><span class="icon nalika-user author-log-ic"></span>Your Order</a>
                                                        </li>
                                                        <li><a href="<?=Yii::$app->params['base_url']?>/user/change-password"><span class="icon nalika-diamond author-log-ic"></span>Change Password</a>
                                                        </li>
                                                        <li><a href="<?=Yii::$app->params['base_url']?>user/logout"><span class="icon nalika-unlocked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </div>
                                        <?php } elseif(\app\models\ShopUsers::is_LoggedIn() && \app\models\ShopUsers::is_seller()){ ?>
                                            <div class="header-right-info" style="margin-top: 15px">
                                                <span style="padding: 3px"><a href="https://icq.im/mr_coder@inbox.ru" class="btn btn-success btn-sm active" role="button" aria-pressed="true">Add on ICQ<a></span>
                                                <span style="padding: 3px"><a href="https://t.me/fudsender" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Add on Telegram<a></span>
                                                <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                    <li class="nav-item">
                                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <i class="icon nalika-user"></i>
                                                            <span class="admin-name">Fud Sender</span>
                                                        </a>
                                                        <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                            <li><a href="<?=Yii::$app->params['base_url']?>/orders/index"><span class="icon nalika-user author-log-ic"></span>All Order</a>
                                                            </li>
                                                            <li><a href="<?=Yii::$app->params['base_url']?>/user/change-password"><span class="icon nalika-diamond author-log-ic"></span>Change Password</a>
                                                            </li>
                                                            <li><a href="<?=Yii::$app->params['base_url']?>user/logout"><span class="icon nalika-unlocked author-log-ic"></span>Log Out</a>
                                                            </li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </div>
                                        <?php } elseif (\app\models\ShopUsers::is_LoggedIn() && \app\models\ShopUsers::is_support()){  ?>
                                            <div class="header-right-info" style="margin-top: 15px">
                                                <span style="padding: 3px"><a href="https://icq.im/mr_coder@inbox.ru" class="btn btn-success btn-sm active" role="button" aria-pressed="true">Add on ICQ<a></span>
                                                <span style="padding: 3px"><a href="https://t.me/fudsender" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Add on Telegram<a></span>
                                                <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                    <li class="nav-item">
                                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <i class="icon nalika-user"></i>
                                                            <span class="admin-name">Fud Sender</span>
                                                        </a>
                                                        <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                            </li>
                                                            <li><a href="<?=Yii::$app->params['base_url']?>user/logout"><span class="icon nalika-unlocked author-log-ic"></span>Log Out</a>
                                                            </li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </div>
                                        <?php } ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Smtps <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a title="Ionos" href="<?=Yii::$app->params['base_url']?>account/smtp-ionos"><span class="mini-sub-pro">Ionos</span></a></li>
                                                <li><a title="Rackspace" href="<?=Yii::$app->params['base_url']?>account/smtp-rackspace"> <span class="mini-sub-pro">Rackspace</span></a></li>
                                                <li><a title="Inbox.lv" href="<?=Yii::$app->params['base_url']?>account/smtp-inboxlv">Inbox.lv</span></a></li>
                                                <li><a title="GMX" href="<?=Yii::$app->params['base_url']?>account/smtp-gmx"><span class="mini-sub-pro">GMX</span></a></li>
                                                <li><a title="Office 365" href="<?=Yii::$app->params['base_url']?>account/smtp-office365"><span class="mini-sub-pro">Office 365</span></a></li>
                                                <li><a title="Strato" href="<?=Yii::$app->params['base_url']?>account/smtp-strato"><span class="mini-sub-pro">Strato</span></a></li>
                                                <li><a title="Sendgrid" href="<?=Yii::$app->params['base_url']?>account/smtp-sendgrid"><span class="mini-sub-pro">Sendgrid</span></a></li>
                                                <li><a title="Big Lobe" href="<?=Yii::$app->params['base_url']?>account/smtp-biglobe"><span class="mini-sub-pro">Biglobe</span></a></li>
                                                <li><a title="All Webmails" href="<?=Yii::$app->params['base_url']?>account/smtps"><span class="mini-sub-pro">All Smtps</span></a></li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Webmails <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a title="Ionos" href="<?=Yii::$app->params['base_url']?>/account/webmails-ionos"><span class="mini-sub-pro">Ionos</span></a></li>
                                                <li><a title="Zimbra" href="<?=Yii::$app->params['base_url']?>/account/webmails-zimbra">Zimbra</span></a></li>
                                                <li><a title="Rackspace" href="<?=Yii::$app->params['base_url']?>/account/webmails-rackspace">Rackspace</span></a></li>
                                                <li><a title="Strato" href="<?=Yii::$app->params['base_url']?>/account/webmails-starto">Strato</span></a></li>
                                                <li><a title="T-Online" href="<?=Yii::$app->params['base_url']?>/account/webmails-t-online"><span class="mini-sub-pro">T-Online</span></a></li>
                                                <li><a title="Kagoya" href="<?=Yii::$app->params['base_url']?>/account/webmails-kagoya"><span class="mini-sub-pro">Kagoya</span></a></li>
                                                <li><a title="Biglobe JP" href="<?=Yii::$app->params['base_url']?>/account/webmails-biglobejp"><span class="mini-sub-pro">Biglobe JP</span></a></li>
                                                <li><a title="Aruba" href="<?=Yii::$app->params['base_url']?>/account/webmails-aruba"><span class="mini-sub-pro">Aruba</span></a></li>
                                                <li><a title="All Webmails" href="<?=Yii::$app->params['base_url']?>/account/webmails"><span class="mini-sub-pro">All Webmails</span></a></li>
                                            </ul>
                                        <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Hosts <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                                <li><a title="Shell" href="<?=Yii::$app->params['base_url']?>/account/shells"><span class="mini-sub-pro">Shell</span></a></li>
                                                <li><a title="C-Panels" href="<?=Yii::$app->params['base_url']?>/account/cpanel"><span class="mini-sub-pro">C-Panels</span></a></li>
                                            </ul>
                                        </li>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#others" href="#">Software & Tools <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="others" class="collapse dropdown-header-top">
                                                <li><a title="Senders" href="<?=Yii::$app->params['base_url']?>/softwares-tools/senders"><span class="mini-sub-pro">Senders</span></a></li>
                                                <li><a title="Verifiers" href="<?=Yii::$app->params['base_url']?>/softwares-tools/verifiers"><span class="mini-sub-pro">Verifiers</span></a></li>
                                                <li><a title="Others" href="<?=Yii::$app->params['base_url']?>/softwares-tools/senders"><span class="mini-sub-pro">Others</span></a></li>
                                                <li><a title="Alls" href="<?=Yii::$app->params['base_url']?>/softwares-tools/index"><span class="mini-sub-pro">Alls</span></a></li>
                                            </ul>
                                        </li>

                                        </li><li><a title="Software & Licence" href="<?=Yii::$app->params['base_url']?>tools-license/index"> <span class="mini-sub-pro">Software & Licence</span></a></li>
                                        <li><a title="RDP Restart" href="<?=Yii::$app->params['base_url']?>rdp/index"><span class="mini-sub-pro">RDP Restart</span></a></li>


                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>
    <div style="margin-top: 50px;margin-left: 50px">
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>
    </div>

    <!-- jquery
		============================================ -->
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/metisMenu/metisMenu.min.js"></script>
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/metisMenu/metisMenu-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/calendar/moment.min.js"></script>
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/calendar/fullcalendar.min.js"></script>
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/calendar/fullcalendar-active.js"></script>
    <!-- float JS
        ============================================ -->
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/flot/jquery.flot.js"></script>
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/flot/jquery.flot.resize.js"></script>
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/flot/curvedLines.js"></script>
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/flot/flot-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?=yii::$app->params["base_url"]?>asset_1/js/main.js"></script>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

