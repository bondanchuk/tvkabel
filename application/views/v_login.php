
<!DOCTYPE html>

<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />

    <title>Tv Kabel</title>
    <meta name="description" content="Latest updates and statistic charts">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->

    <!--begin::Base Styles -->



    <link href="<?php echo base_url();?>assets/css/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/alertify.min.css">
    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/alertify.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
    <!--end::Base Styles -->

    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
</head>
<!-- end::Head -->


<!-- end::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >



<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">


    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--singin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(./assets/img/bg-3.jpg);">
        <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
            <div class="m-login__container">
                <?php
                if ($this->session->flashdata('error')){?>

                        <script>
                            alertify.error('Username / Password Salah !');
                        </script>

                <?php } ?>
                <div class="m-login__logo">
                    <a href="#">
                        <img src="./assets/app/media/img//logos/logo-1.png">
                    </a>
                </div>
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">Sign In</h3>
                    </div>

                        <?php
                        $attributes = array('class' => 'm-login__form m-form');
                        echo form_open('Login/authentication', $attributes); ?>

                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Username" name="username" id="username" autocomplete="off" required>
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password" id="username" required>
                        </div>

                        <div class="m-login__form-action">
                            <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Sign In</button>
                        </div>
                            <?php form_close();?>

                </div>

            </div>
        </div>
    </div>





</div>
<!-- end:: Page -->


<!--begin::Base Scripts -->
<script src="<?php echo base_url();?>assets/js/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/scripts.bundle.js" type="text/javascript"></script>
<!--end::Base Scripts -->





<!--begin::Page Snippets
<script src="<?php echo base_url();?>assets/js/login.js" type="text/javascript"></script>-->
<!--end::Page Snippets -->

<!-- end::Body -->
</html>