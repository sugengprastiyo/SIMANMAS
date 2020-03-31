<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="<?= base_url('assets/template_user/')?>img/favicon.png" rel="icon">
    <link href="<?= base_url('assets/template_user/')?>img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="<?= base_url('assets/template_user/')?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="<?= base_url('assets/template_user/')?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/template_user/')?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/template_user/')?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/template_user/')?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/template_user/')?>lib/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="<?= base_url('assets/template_user/')?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/template_adminlte/')?>plugins/fontawesome-free/css/all.min.css">
    <!-- Main Stylesheet File -->
    <link href="<?= base_url('assets/template_user/')?>css/style.css" rel="stylesheet">

    <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>


<body id="body">

    <!--==========================
    Top Bar
  ============================-->
    <section id="topbar" class="d-none d-lg-block">
        <div class="container clearfix">
            <div class="contact-info float-left">
                <i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">contact@example.com</a>
                <i class="fa fa-phone"></i> +1 5589 55488 55
            </div>
            <div class="social-links float-right">
                <?php if(($this->fungsi->user_login()['type']) == "user" ) { ?>
                    <span><i class="fas fa-user"></i> <?= $this->fungsi->user_login()['nama'] ?></span>
                    <a href="<?= base_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"> Logout</i></a>
                    <?php }else{?>
                    <a href="<?= base_url('general/login') ?>"><i class="fas fa-sign-in-alt"> Login</i></a>
                <?php } ?>
            </div>
        </div>
    </section>

    <!--==========================
    Header
  ============================-->
  <marquee class="bg-primary text-white" style="padding: 5px">Jadwal Adzan Malang <?= date('d M Y')?> &emsp;&emsp; Shubuh: <?= $subuh ?> &emsp;&emsp; Dhuhur: <?= $dzuhur ?> &emsp;&emsp; Ashar: <?= $ashar ?> &emsp;&emsp; Maghrib: <?= $magrib ?> &emsp;&emsp; Isya: <?= $isya ?></marquee>
    <header id="header">
        <div class="container">
            <div id="logo" class="pull-left">
                <h1><a href="#body" class="scrollto">Sistem Informasi Masjid</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#body">Home</a></li>
                    <li><a href="#about">Aktifitas</a></li>
                    <li><a href="#services">Artikel</a></li>
                    <li><a href="#portfolio">Dokumentasi</a></li>
                    <li><a href="#team">Masjid</a></li>
                    <li><a href="#contact">Administrasi</a></li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->

    <!--==========================
    Intro Section
  ============================-->
    <section id="intro">

        <div class="intro-content">
            <h2>Sistem Informasi<br>Masjid</h2>
        </div>

        <div id="intro-carousel" class="owl-carousel">
            <div class="item" style="background-image: url('img/intro-carousel/1.jpg');"></div>
            <div class="item" style="background-image: url('img/intro-carousel/2.jpg');"></div>
            <div class="item" style="background-image: url('img/intro-carousel/3.jpg');"></div>
            <div class="item" style="background-image: url('img/intro-carousel/4.jpg');"></div>
            <div class="item" style="background-image: url('img/intro-carousel/5.jpg');"></div>
        </div>

    </section><!-- #intro -->