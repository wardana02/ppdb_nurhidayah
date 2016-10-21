<div class="row">
    <div class="col-md-12">
        <hr />
        <?php 
            echo Tb::breadcrumbs(array('links' => array('Home' => site_url(),'Pendaftaran'))); 
        ?>
        <hr />
    </div>
</div>
<div class="well">
<form name="pendaftaran" method="POST" action="<?php echo site_url().'buatakun/simpan_pendaftaran' ?>" class="form-horizontal">
  <fieldset>
    <legend>Formulir Pembuatan Akun Pendaftaran</legend>
    <div class="form-group">
      <label for="namalengkap" class="col-md-3 control-label">NIK Orang Tua</label>
      <div class="col-md-9">
        <input type="text" name="nik" value="" onkeypress="return runScript(event)" maxlength="16" class="form-control">
        <?php 
            echo form_error('nik','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="namalengkap" class="col-md-3 control-label">Nama Lengkap Orang Tua</label>
      <div class="col-md-9">
        <?php 
            echo form_input($namalengkap); 
            echo form_error('namalengkap','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="nohp" class="col-md-3 control-label">Nomor Handphone</label>
      <div class="col-md-9">
         <?php
        echo form_input($nohp); 
            echo form_error('nohp','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');    
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-md-3 control-label">Alamat Email</label>
      <div class="col-md-9">
        <?php 
            echo form_input($email); 
            echo form_error('email','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-2 col-md-offset-3">
        <?php echo $image ?>
      </div>
      <div class="col-md-5">
        <input type="text" name="security_code" class="form-control" value="<?php echo $this->input->post('security_code') ?>" placeholder="Masukkan kode disini..." maxlength="10"  />
            <?php echo form_error('security_code','<div class=\'alert alert-dismissable alert-danger\'>', '</div>'); ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-9 col-md-offset-3">
        <input type="submit" class="btn btn-primary" name="submit" value="Simpan" />
        <input type="reset" class="btn btn-default" name="reset" value="Cancel" />
      </div>
    </div>
  </fieldset>
</form>
</div>
<hr />