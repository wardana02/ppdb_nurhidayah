<?php if( !defined('BASEPATH')) exit('NO direct allowed');

/**
 * @author Marsono Saputro
 * @copyright 2014
 **/
$pesan = $this->session->flashdata('update_saudara');
if(!empty($pesan)){
?>
<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert"><span class="btn glyphicon glyphicon-remove"></span></button>
  <b><?php echo $pesan; ?></b>
  <div class="pull-right">
    <a href="<?php echo site_url().'member/data_biaya' ?>" class="btn btn-xs glyphicon glyphicon-forward"> LANJUT </a>
  </div>
</div>
<?php } ?>

<div class="well">
<form name="pendaftaran" method="POST" action="<?php echo site_url().'member/update_datasaudara' ?>" class="form-horizontal">
  <fieldset>
    <legend>Data Saudara</legend>
    <div class="form-group">
      <label for="namalengkap" class="col-md-3 control-label">Nama Lengkap</label>
      <div class="col-md-9">
        <?php 
            echo form_input($nama); 
            echo form_error('namalengkap','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="kelamin" class="col-md-3 control-label">Kelamin </label>
      <div class="col-md-9">
        <?php 
            //echo form_input($kelamin); 
            echo form_dropdown('kelamin', array(''=>'', 'L'=>'Laki-laki', 'P'=>'Perempuan'), $this->input->post('kelamin'), 'class=form-control');
            echo form_error('kelamin','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="ttl" class="col-md-3 control-label">TTL</label>
      <div class="col-md-9">
        <?php 
            echo form_input($ttl); 
            echo form_error('ttl','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="sekolah" class="col-md-3 control-label">Sekolah</label>
      <div class="col-md-9">
        <?php 
            echo form_input($sekolah); 
            echo form_error('sekolah','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="keterangan" class="col-md-3 control-label">Keterangan</label>
      <div class="col-md-9">
        <?php 
            echo form_input($keterangan); 
            echo form_error('keterangan','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-9 col-md-offset-3">
        <input type="submit" class="btn btn-primary" name="submit" value="Simpan" />
      </div>
    </div>
  </fieldset>
</form>
</div>