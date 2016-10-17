<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Marsono Saputro" />
    <meta http-equiv="content-type" content="text/html" />
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="PPDB SIT Nur Hidayah Surakarta"/>
    <meta name="robots" content="index,follow" />

	<title>PPDB SDIT</title>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css' ?>" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap-theme.min.css' ?>" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootswatch.min.css' ?>" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/style.css' ?>" media="screen" />
    
    <link rel="stylesheet/less" type="text/css" href="<?php echo base_url().'assets/less/bootswatch.less' ?>" />
    <link rel="stylesheet/less" type="text/css" href="<?php echo base_url().'assets/less/variables.less' ?>" />

    
</head>

<body>
<!-- FACEBOOK -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&appId=253386318032084&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- FACEBOOK -->

<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo site_url(); ?>" class="navbar-brand visible-xs">PPDB SDIT</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <div style="color: white; margin-bottom: -18px; margin-left: 26px;"> MENU</div>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse  col-md-12" id="navbar-main">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url(); ?>" class="active">Beranda</a></li>
            <li><a href="<?php echo base_url().'beranda/prosedur'; ?>">Prosedur</a></li>
            <li><a href="<?php echo base_url().'beranda/agenda'; ?>">Agenda</a></li>
            <?php if($this->session->userdata('member') == false){ ?>
                <li><a href="<?php echo base_url().'beranda/pendaftaran'; ?>">Pendaftaran</a></li>
            <?php } else { ?>
                <li><a href="<?php echo base_url().'member'; ?>">AKTIF AREA</a></li>
            <?php } ?>
            <!--<li><a href="<?php echo base_url().'beranda/data_pendaftar'; ?>">Data Pendaftar</a></li>-->
            <li><a href="<?php echo base_url().'beranda/faq'; ?>">Diskusi</a></li>
            <!-- <li><a href="<?php echo base_url().'beranda/contact'; ?>">Kontak</a></li> -->
            <?php if($this->session->userdata('member') == true) { ?>
                <li><a href="<?php echo base_url().'login/logout'; ?>"class="glyphicon glyphicon-off"> LOGOUT</a></li>
            <?php } else { ?>
                <li><a href="<?php echo base_url().'login'; ?>">LOGIN</a></li>
            <?php } ?>
          </ul>

        </div>
      </div>
    </div>
    
<!-- HEADER -->
<div style="height: 60px;"></div>

<!-- MAIN -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- UTAMA -->
            <section>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <?php !empty($main) ? $this->load->view($main) : ''; ?>
                        </div>
                    </div>
                </div>
            </section>
                        
            <!-- SIDEBAR -->
            <aside>
                <div class="col-md-4">
                    <?php (!empty($sidebar)) ? $this->load->view('sidebar') : '' ?>
                </div>
            </aside>
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="copy">
                <hr style="margin-bottom: -5px;" />
				<h5>Developed by ICT Nur Hidayah <small>Copyright &copy; 2014</small></h5>
            </div>
        </div>
    </div>
</div>
</footer>

<!-- ============= JAVASCRIPT ========================== -->
<script src="<?php echo base_url().'assets/bootstrap/js/jquery.js' ?>"></script> 
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url().'assets/bootstrap/js/less.min.js' ?>"></script>

</body>
</html>