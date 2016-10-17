<div class="row">
    <div class="col-md-12">
        <hr />
        <?php 
            echo Tb::breadcrumbs(array('links' => array('Home' => site_url(),'Login'))); 
        ?>
        <hr />
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="well">
            <form name="pendaftaran" method="POST" action="<?php echo site_url().'login/cek_login' ?>" class="form-horizontal">
                <fieldset>
                    <legend>Formulir Login</legend>
                        <div class="form-group">
                            <label for="username" class="col-md-3 control-label">Username</label>
                            <div class="col-md-9">
                                <input type="text" name="username" value="<?php echo set_value('username') ?>" class="form-control" />
                                <?php echo form_error('username','<div class=\'alert alert-dismissable alert-danger\'>', '</div>'); ?>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Password</label>
                            <div class="col-md-9">
                                <input type="password" name="password" value="<?php echo set_value('password') ?>" class="form-control" />
                                <?php echo form_error('password','<div class=\'alert alert-dismissable alert-danger\'>', '</div>'); ?>
                            </div>
                        </div>  
                        <div class="form-group">
                            <div class="col-lg-2 col-lg-offset-3">
                                <?php echo $image; ?>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="mycaptcha" class="form-control" placeholder="Isikan kode disini!" />
                                <?php echo form_error('mycaptcha','<div class=\'alert alert-dismissable alert-danger\'>', '</div>'); ?>
                            </div>
                        </div>   
                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <input type="submit" name="submit" value="Login" class="btn btn-primary" />
                            </div>
                        </div> 
                </fieldset>
            </form>
        </div>
    <hr />
    </div>
</div>