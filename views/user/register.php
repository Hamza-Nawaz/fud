<?php

?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=yii::$app->params["base_url"]?>asset_01/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?=yii::$app->params["base_url"]?>asset_01/img/favicon.png">
    <title>
        Argon Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?=yii::$app->params["base_url"]?>asset_01/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?=yii::$app->params["base_url"]?>asset_01/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?=yii::$app->params["base_url"]?>asset_01/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?=yii::$app->params["base_url"]?>asset_01/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">

<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Register</h1>
                    <p class="text-lead text-white">Please use active email to signup and verify.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>Register with</h5>
                    </div>
                    <div class="row px-xl-5 px-sm-4 px-3">
                    </div>
                    <div class="card-body">
                        <form method="post" action="register">
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username" required aria-label="Name">
                            </div>
                            <div class="mb-3">

                                <input type="text" name="email" class="form-control" placeholder="Email Address" required aria-label="Email">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required aria-label="Password">
                            </div>
                            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                            </div>
                            <p class="text-sm mt-3 mb-0">Already have an account? <a href="<?=Yii::$app->params['base_url']?>/user/login" class="text-dark font-weight-bolder">Sign in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<!--   Core JS Files   -->
<script src="<?=yii::$app->params["base_url"]?>asset_01/js/core/popper.min.js"></script>
<script src="<?=yii::$app->params["base_url"]?>asset_01/js/core/bootstrap.min.js"></script>
<script src="<?=yii::$app->params["base_url"]?>asset_01/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?=yii::$app->params["base_url"]?>asset_01/js/plugins/smooth-scrollbar.min.js"></script>
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
</body>


</html>
