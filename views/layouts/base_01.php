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
    </head>
    <body class="d-flex flex-column h-100 g-sidenav-show   bg-gray-100">
<?php $this->beginBody() ?>

<div class="min-height-300 bg-primary position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"aria-hidden="true"id="iconSidenav"></i>
        <a class="navbar-brand m-0"href="https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "target="_blank">

            <span class="ms-1 font-weight-bold">D29 Sender Store</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto "id="sidenav-collapse-main">
        <?php if(\app\models\ShopUsers::is_buyer() && \app\models\ShopUsers::is_LoggedIn()){?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link "href="<?=Yii::$app->params['base_url']?>account/smtps">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i  class="ni ni-send text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Smtps</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "href="<?=Yii::$app->params['base_url']?>/account/webmails">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-email-83 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Webmails</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "href="<?=Yii::$app->params['base_url']?>/account/shells">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Shells</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "href="<?=Yii::$app->params['base_url']?>/account/cpanel">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">cPanels</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "href="<?=Yii::$app->params['base_url']?>/softwares-tools/index">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-settings text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Tools & Software</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "href="<?=Yii::$app->params['base_url']?>tools-license/index" >
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-badge text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Software license</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "href="<?=Yii::$app->params['base_url']?>rdp/index">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">RDP Restart</span>
                    </a>
                </li>
            </ul>
        <?php } elseif(\app\models\ShopUsers::is_LoggedIn() && \app\models\ShopUsers::is_seller()){ ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link "href="<?=Yii::$app->params['base_url']?>user/index">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i  class="ni ni-single-02 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link "href="<?=Yii::$app->params['base_url']?>/softwares-tools/index">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-settings text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Tools & Software</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?=Yii::$app->params['base_url']?>tools-license/index">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-badge text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Software license</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "href="<?=Yii::$app->params['base_url']?>rdp/index">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">RDP Restart</span>
                    </a>
                </li>
            </ul>
        <?php } elseif (\app\models\ShopUsers::is_LoggedIn() && \app\models\ShopUsers::is_support()){  ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active"href="<?=Yii::$app->params['base_url']?>/report/index"">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i  class="ni ni-books text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Reports</span>
                    </a>
                </li>

        <?php } ?>


    </div>
    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none"id="sidenavCard">
            <img class="w-50 mx-auto"src="<?=yii::$app->params["base_url"]?>asset_01/img/illustrations/icon-documentation.svg"alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold mb-0">Contact us : </p>
                </div>
            </div>
        </div>
        <a href="https://icq.im/d29admin"target="_blank"class="btn btn-dark btn-sm w-100 mb-3">Add to ICQ</a>
        <a class="btn btn-primary btn-sm mb-0 w-100"href="https://t.me/d29sender"type="button">Add to Telegram</a>
    </div>
</aside>
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl "id="navbarBlur"data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4"id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center" style="padding: 20px">
                        <a href="javascript:;"class="nav-link text-white p-0"id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;"class="nav-link text-white p-0"id="dropdownMenuButton"data-bs-toggle="dropdown"aria-expanded="false">
                            <i class="fa fa-user cursor-pointer"></i>
                        </a>
                        <?php if(\app\models\ShopUsers::is_buyer() && \app\models\ShopUsers::is_LoggedIn()){?>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md"href="<?=Yii::$app->params['base_url']?>user-balance/add-balance">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="<?=yii::$app->params["base_url"]?>asset_01/img/small-logos/cash.svg"class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold text-dark">Your Balance  :(<span class="badge badge-primary text-dark"><?=\app\models\WebUsersBalance::check_balance();?></span>) </span>
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md"href="<?=Yii::$app->params['base_url']?>/orders/index">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="<?=yii::$app->params["base_url"]?>asset_01/img/small-logos/shopping_cart-blue.svg"class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold text-dark">Your Order</span>
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md"href="<?=Yii::$app->params['base_url']?>/user/change-password">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="<?=yii::$app->params["base_url"]?>asset_01/img/small-logos/ftpassword.svg"class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold text-dark">Change Password</span>
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md"href="<?=Yii::$app->params['base_url']?>user/logout">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="<?=yii::$app->params["base_url"]?>asset_01/img/small-logos/log-out.svg"class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold text-dark">Log Out</span>
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        <?php } elseif(\app\models\ShopUsers::is_LoggedIn() && \app\models\ShopUsers::is_seller()){ ?>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md"href="<?=Yii::$app->params['base_url']?>/orders/index">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="<?=yii::$app->params["base_url"]?>asset_01/img/small-logos/shopping_cart-blue.svg"class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold text-dark">All Order</span>
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md"href="<?=Yii::$app->params['base_url']?>/user/change-password">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="<?=yii::$app->params["base_url"]?>asset_01/img/small-logos/ftpassword.svg"class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold text-dark">Change Password</span>
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md"href="<?=Yii::$app->params['base_url']?>user/logout">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="<?=yii::$app->params["base_url"]?>asset_01/img/small-logos/log-out.svg"class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold text-dark">Log Out</span>
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        <?php } elseif (\app\models\ShopUsers::is_LoggedIn() && \app\models\ShopUsers::is_support()){  ?>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md"href="<?=Yii::$app->params['base_url']?>user/logout">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="<?=yii::$app->params["base_url"]?>asset_01/img/small-logos/log-out.svg"class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold text-dark">Log Out</span>
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>
</main>
<div class="fixed-plugin">
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3 ">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Argon Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0 overflow-auto">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)"class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active"data-color="primary"onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark"data-color="dark"onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info"data-color="info"onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success"data-color="success"onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning"data-color="warning"onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger"data-color="danger"onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2"data-class="bg-white"onclick="sidebarType(this)">White</button>
                <button class="btn bg-gradient-primary w-100 px-3 mb-2"data-class="bg-default"onclick="sidebarType(this)">Dark</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="d-flex my-3">
                <h6 class="mb-0">Navbar Fixed</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto"type="checkbox"id="navbarFixed"onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <div class="mt-2 mb-5 d-flex">
                <h6 class="mb-0">Light / Dark</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto"type="checkbox"id="dark-version"onclick="darkMode(this)">
                </div>
            </div>
            <a class="btn bg-gradient-dark w-100"href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
            <a class="btn btn-outline-dark w-100"href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
            <div class="w-100 text-center">
                <a class="github-button"href="https://github.com/creativetimofficial/argon-dashboard"data-icon="octicon-star"data-size="large"data-show-count="true"aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
                <h6 class="mt-3">Thank you for sharing!</h6>
                <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard"class="btn btn-dark mb-0 me-2"target="_blank">
                    <i class="fab fa-twitter me-1"aria-hidden="true"></i> Tweet
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard"class="btn btn-dark mb-0 me-2"target="_blank">
                    <i class="fab fa-facebook-square me-1"aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    var base_url= "<?= Yii::$app->params['base_url'] ?>"
</script>
<!--   Core JS Files   -->
<script src="<?=yii::$app->params["base_url"]?>asset_01/js/core/popper.min.js"></script>
<script src="<?=yii::$app->params["base_url"]?>asset_01/js/core/bootstrap.min.js"></script>
<script src="<?=yii::$app->params["base_url"]?>asset_01/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?=yii::$app->params["base_url"]?>asset_01/js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/buytools.js?<?php echo date('Y-m-d_H:i:s'); ?>"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/buyaccounts.js?<?php echo date('Y-m-d_H:i:s'); ?>"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/reporting.js?<?php echo date('Y-m-d_H:i:s'); ?>"></script>
<script src="<?=Yii::$app->params['base_url']?>/asset/js/restpass.js?<?php echo date('Y-m-d_H:i:s'); ?>"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?=yii::$app->params["base_url"]?>asset_01/js/argon-dashboard.min.js?v=2.0.4"></script>


<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

