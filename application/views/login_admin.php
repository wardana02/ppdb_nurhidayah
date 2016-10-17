<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>:: Admin System PPDB ::</title>

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
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="<?php echo base_url() ?>assets/images/logo-invoice.png" />
            </div>
        </div>
         <div class="row ">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form role="form" method="POST" name="login" action="<?php echo site_url().'login_admin/cek_login' ?>">
                                    <hr />
                                    <h5>Enter Username dan Password</h5>
                                       
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="username" value="<?php echo $this->input->post('username') ?>" class="form-control" placeholder="Username " />
                                        </div>
                                        <?php echo form_error('username','<div class=\'alert alert-dismissable alert-danger\'>', '</div>'); ?>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="password" value="<?php echo $this->input->post('password') ?>" class="form-control"  placeholder="Password" />
                                        </div>
                                        <?php echo form_error('password','<div class=\'alert alert-dismissable alert-danger\'>', '</div>'); ?>
                                     <input type="submit" name="submit" class="btn btn-primary" value="Login" />
                                     Kembali ke <a href="<?php echo site_url(); ?>">Beranda</a> 
                                    <hr />
                                    Developed By <a href="https://www.facebook.com/marsonosaputro" target="_blank">Marsono Saputro</a> 
                                    </form>
                            </div>
                        </div>
        </div>
    </div>

</body>
</html>
