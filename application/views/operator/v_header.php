
<!DOCTYPE html>

<html lang="en">

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
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <link href="<?php echo base_url(); ?>assets/css/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/alertify.min.css">
    <link rel="shortcut icon" href="assets/demo/demo5/media/img/logo/favicon.ico" />




</head>



<body class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default"  >

<div class="m-grid m-grid--hor m-grid--root m-page">

    <!-- begin::Header -->
    <header class="m-grid__item		m-header "  data-minimize="minimize" data-minimize-offset="200" data-minimize-mobile-offset="200" >
        <div class="m-header__top">
            <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
                <div class="m-stack m-stack--ver m-stack--desktop">
                    <!-- begin::Brand -->
                    <div class="m-stack__item m-brand">
                        <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                            <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                <a href="?page=index&demo=demo5" class="m-brand__logo-wrapper">
                                    <img alt="" src="./assets/demo/demo5/media/img/logo/logo.png"/>
                                </a>
                            </div>

                        </div>
                    </div>
                    <!-- end::Brand -->
                    <!-- begin::Topbar -->
                    <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                        <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                            <div class="m-stack__item m-topbar__nav-wrapper">
                                <ul class="m-topbar__nav m-nav m-nav--inline">

                                    <li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"  data-dropdown-toggle="click">
                                        <a href="#" class="m-nav__link m-dropdown__toggle">
                                            <span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
                                            <span class="m-nav__link-icon">
                                                        <span class="m-nav__link-icon-wrapper">
                                                            <i class="flaticon-share"></i>
                                                        </span>
                                                    </span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__header m--align-center" style="background: url(./assets/app/media/img/misc/quick_actions_bg.jpg); background-size: cover;">
                                                    <span class="m-dropdown__header-title">Quick Actions</span>
                                                    <span class="m-dropdown__header-subtitle">Shortcuts</span>
                                                </div>
                                                <div class="m-dropdown__body m-dropdown__body--paddingless">
                                                    <div class="m-dropdown__content">
                                                        <div class="m-scrollable" data-scrollable="false" data-max-height="380" data-mobile-max-height="200">
                                                            <div class="m-nav-grid m-nav-grid--skin-light">
                                                                <div class="m-nav-grid__row">
                                                                    <a href="#" class="m-nav-grid__item">
                                                                        <i class="m-nav-grid__icon flaticon-file"></i>
                                                                        <span class="m-nav-grid__text">Generate Report</span>
                                                                    </a>
                                                                    <a href="#" class="m-nav-grid__item">
                                                                        <i class="m-nav-grid__icon flaticon-time"></i>
                                                                        <span class="m-nav-grid__text">Add New Event</span>
                                                                    </a>
                                                                </div>
                                                                <div class="m-nav-grid__row">
                                                                    <a href="#" class="m-nav-grid__item">
                                                                        <i class="m-nav-grid__icon flaticon-folder"></i>
                                                                        <span class="m-nav-grid__text">Create New Task</span>
                                                                    </a>
                                                                    <a href="#" class="m-nav-grid__item">
                                                                        <i class="m-nav-grid__icon flaticon-clipboard"></i>
                                                                        <span class="m-nav-grid__text">Completed Tasks</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                                        <a href="#" class="m-nav__link m-dropdown__toggle">
                                            <span class="m-topbar__welcome">Selamat Datang,&nbsp;</span>
                                            <span class="m-topbar__username"><?php echo $this->session->userdata("username"); ?></span>
                                            <span class="m-topbar__userpic">
                                                        <img src="./assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
                                                    </span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">

                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav m-nav--skin-light">
                                                            <li class="m-nav__item">
                                                                <a href="?page=profile&demo=demo5" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                    <span class="m-nav__link-title">
                                                                        <span class="m-nav__link-wrap">
                                                                            <span class="m-nav__link-text">Ganti Password</span>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__separator m-nav__separator--fit">
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="?page=snippets/pages/user/login-1&demo=default" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-header__bottom">
            <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
                <div class="m-stack m-stack--ver m-stack--desktop">
                    <!-- begin::Horizontal Menu -->
                    <div class="m-stack__item m-stack__item--middle m-stack__item--fluid">

                        <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>

                        <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light "  >
                            <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">


                                <li class="m-menu__item  m-menu__item--active"  aria-haspopup="true">
                                    <a  href="Home" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <span class="m-menu__link-text">Home</span>
                                    </a>
                                </li>


                                <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" aria-haspopup="true">
                                    <a  href="#" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__item-here"></span>
                                        <span class="m-menu__link-text">Master Data</span>
                                        <i class="m-menu__hor-arrow la la-angle-down"></i>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>

                                    <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                        <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                        <ul class="m-menu__subnav">

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="<?php echo site_url('operator/Kolektor')?>" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-add"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Master Kolektor</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="<?php echo site_url('operator/Teknisi')?>" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-add"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Master Teknisi</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="<?php echo site_url('operator/Marketing')?>" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-add"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Master Marketing</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>


                                <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" aria-haspopup="true">
                                    <a  href="#" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__item-here"></span>
                                        <span class="m-menu__link-text">Pelayanan</span>
                                        <i class="m-menu__hor-arrow la la-angle-down"></i>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>

                                    <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                        <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                        <ul class="m-menu__subnav">

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="<?php echo site_url('operator/Registrasi')?>" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-add"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Registrasi Pelanggan</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="<?php echo site_url('operator/IuranKolektor')?>" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-business"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Iuran Kolektor</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="?page=inner&demo=demo5" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-tool"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Pengaduan</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="<?php echo site_url('operator/Mutasi')?>" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-file"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Registrasi Mutasi</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="<?php echo site_url('operator/Paralel')?>" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-file"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Registrasi Paralel</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="<?php echo site_url('operator/Pemutusan')?>" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-file"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Registrasi Pemutusan</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="?page=inner&demo=demo5" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Closing Pembayaran</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="<?php echo site_url('operator/CetakKwitansi')?>" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-paper-plane"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Cetak Kwitansi</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>


                                <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" aria-haspopup="true">
                                    <a  href="#" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__item-here"></span>
                                        <span class="m-menu__link-text">Administrasi</span>
                                        <i class="m-menu__hor-arrow la la-angle-down"></i>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>

                                    <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                        <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                        <ul class="m-menu__subnav">

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="<?php echo site_url('operator/Status')?>" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-technology"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Status Pelanggan</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="<?php echo site_url('operator/Cari')?>" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-technology"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Cari Pelanggan</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>


                                </li>

                                <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" aria-haspopup="true">
                                    <a  href="#" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__item-here"></span>
                                        <span class="m-menu__link-text">Teknik</span>
                                        <i class="m-menu__hor-arrow la la-angle-down"></i>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>

                                    <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                        <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                        <ul class="m-menu__subnav">

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="?page=inner&demo=demo5" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-diagram"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Setting Aplikasi</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>


                                <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" aria-haspopup="true">
                                    <a  href="#" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__item-here"></span>
                                        <span class="m-menu__link-text">Report Master Data</span>
                                        <i class="m-menu__hor-arrow la la-angle-down"></i>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>

                                    <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                        <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                        <ul class="m-menu__subnav">

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="?page=inner&demo=demo5" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-diagram"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Setting Aplikasi</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>


                                <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" aria-haspopup="true">
                                    <a  href="#" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__item-here"></span>
                                        <span class="m-menu__link-text">Report Transaksi</span>
                                        <i class="m-menu__hor-arrow la la-angle-down"></i>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>

                                    <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                        <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                        <ul class="m-menu__subnav">

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="<?php echo site_url('operator/Transaksi')?>" class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-coins"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Transaksi</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="m-menu__item "  aria-haspopup="true">
                                                <a  href="<?php echo site_url('operator/Tunggakan')?>" class="m-menu__link ">
                                                    <i class="m-menu__link-icon la la-exclamation"></i>
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">Tunggakan Tagihan</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <!-- end::Horizontal Menu -->
                </div>
            </div>
        </div>
    </header>
    <!-- end::Header -->