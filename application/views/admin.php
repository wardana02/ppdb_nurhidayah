﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>.:: Management PPDB Online ::.</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url().'assets/admin/' ?>css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url().'assets/admin/' ?>css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="<?php echo base_url().'assets/admin/' ?>css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="<?php echo base_url().'assets/admin/' ?>css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url().'management' ?>">PPDB ONLINE</a>
            </div>

            <div class="header-right">
                <a href="#" class="btn btn-info" title="New Message"><b> Sisa kredit SMS <?php echo cekkredit(); ?> </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="#" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="<?php echo site_url().'login_admin/logout' ?>" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="<?php echo base_url().'assets/admin/' ?>img/user.png" class="img-thumbnail" />
                            <div class="inner-text">
                                Administrator
                            <br />
                                <small>Last Login : 2 Weeks Ago </small>
                            </div>
                        </div>
                    </li>

                    <li><a class="active-menu" href="<?php echo site_url().'management' ?>"><i class="fa fa-dashboard "></i>Dashboard</a>                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Management SMS <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li><a href="<?php echo site_url().'management/sms_inbox' ?>"><i class="fa fa-toggle-on"></i>Inbox</a></li>
                            <li><a href="<?php echo site_url().'management/sms_outbox' ?>"><i class="fa fa-bell "></i>Outbox</a></li>
                            <li><a href="<?php echo site_url().'management/sms_broadcast' ?>"><i class="fa fa-circle-o "></i>Broadcast</a></li>
                            <li><a href="<?php echo site_url().'management/send_sms' ?>"><i class="fa fa-eyedropper "></i>Send SMS</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo site_url().'management/activasi' ?>"><i class="fa fa-yelp "></i>Aktivasi Account</a>
                    </li>
                    <li><a href="<?php echo site_url().'management/data_pendaftar' ?>"><i class="fa fa-flash "></i>Data Pendaftar </a></li>
                    <li><a href="<?php echo site_url().'management/statis' ?>"><i class="fa fa-bicycle "></i>Halaman Statis</a></li>
                    <li><a href="<?php echo site_url().'management/slideshow' ?>"><i class="fa fa-square-o "></i>Slideshow</a></li>
                    <li><a href="<?php echo site_url().'admin' ?>"><i class="fa fa-bug "></i>Management Admin</a></li>
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
              <?php !empty($main) ? $this->load->view($main) : ""; ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        &copy; 2014 ICT Nur Hidayah | Programmer By : <a href="http://www.itsupport.nurhidayah.sch.id/" target="_blank">Marsono Saputro</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url().'assets/admin/' ?>js/jquery-1.11.1.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url().'assets/admin/' ?>js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url().'assets/admin/' ?>js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url().'assets/admin/' ?>js/custom.js"></script>
    
</body>
</html>