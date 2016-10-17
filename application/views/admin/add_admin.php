<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Form tambah Admin</div>
            <div class="panel-body">
                <form name="slide" action="<?php //echo site_url().'admin/simpan_admin' ?>" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-lg-4">Nama Lengkap</label>
                        <div class="col-lg-8">
                            <?php 
                            echo form_input($namalengkap);
                            echo form_error('namalengkap','<div class=\'alert alert-danger\'>', '</div>');
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Email</label>
                        <div class="col-lg-8">
                            <?php 
                            echo form_input($email); 
                            echo form_error('email','<div class=\'alert alert-danger\'>', '</div>');
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Nomor HP</label>
                        <div class="col-lg-8">
                            <?php 
                            echo form_input($nohp); 
                            echo form_error('nohp','<div class=\'alert alert-danger\'>', '</div>');
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Username</label>
                        <div class="col-lg-8">
                            <?php 
                            echo form_input($username);
                            echo form_error('username','<div class=\'alert alert-danger\'>', '</div>');
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Password</label>
                        <div class="col-lg-8">
                            <?php 
                            echo form_password($password); 
                            echo form_error('password','<div class=\'alert alert-danger\'>', '</div>');
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Konfirmasi Password</label>
                        <div class="col-lg-8">
                            <?php
                            echo form_password($password2); 
                            echo form_error('password2','<div class=\'alert alert-danger\'>', '</div>');
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 col-lg-offset-4">
                            <input type="submit" name="submit" value="Simpan" id="btnSimpan" class="btn btn-default" />
                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
