<?php if( !defined('BASEPATH')) exit('NO direct allowed');

/**
 * @author Marsono Saputro
 * @copyright 2014
 **/

$pesan = $this->session->flashdata('update_ortu');
if(!empty($pesan)){
?>
<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert"><span class="btn glyphicon glyphicon-remove"></span></button>
  <b><?php echo $pesan; ?></b>
  <div class="pull-right">
    <a href="<?php echo site_url().'member/data_ibu' ?>" class="btn btn-xs glyphicon glyphicon-forward"> LANJUT </a>
  </div>
</div>
<?php } ?>

<div class="well">
<form name="pendaftaran" method="POST" action="<?php echo site_url().'member/update_dataayah' ?>" class="form-horizontal">
  <fieldset>
    <legend>Data Ayah</legend>
    <div class="form-group">
      <label for="namalengkap" class="col-md-3 control-label">NIK</label>
      <div class="col-md-9">
        <?php 
            echo form_input($nik); 
            echo form_error('nik','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="namalengkap" class="col-md-3 control-label">Nama Lengkap</label>
      <div class="col-md-9">
        <?php 
            echo form_input($namalengkap); 
            echo form_error('namalengkap','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="namalengkap" class="col-md-3 control-label">Tempat Lahir</label>
      <div class="col-md-9">
        <?php 
            echo form_input($tempatlahir); 
            echo form_error('tempatlahir','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <?php
    $t = explode('-',$ayah->tgllahir);
    
    ?>
    <div class="form-group">
      <label for="tgllahir" class="col-md-3 control-label">Tanggal lahir</label>
      <div class="col-md-3">
        <?php 
            echo form_dropdown('tanggal', $tgl, !empty($t[2]) ? $t[2] : ' ', 'class=form-control'); 
            echo form_error('tanggal','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');    
        ?>
      </div>
      <div class="col-md-3">
        <?php 
            echo form_dropdown('bulan', $bln, !empty($t[1]) ? $t[1] : ' ', 'class=form-control'); 
            echo form_error('bulan','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
      <div class="col-md-3">
        <?php 
            echo form_dropdown('tahun', $thn, !empty($t[0]) ? $t[0] : ' ', 'class=form-control'); 
            echo form_error('tahun','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');    
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="namalengkap" class="col-md-3 control-label">Pendidikan</label>
      <div class="col-md-9">
        <?php 
            //echo form_input($pendidikan);
            echo form_dropdown('pendidikan', $pdk, $ayah->pendidikan, 'class=form-control'); 
            echo form_error('pendidikan','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="namalengkap" class="col-md-3 control-label">Pekerjaan</label>
      <div class="col-md-9">
        <?php 
            echo form_input($pekerjaan); 
            echo form_error('pekerjaan','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="namalengkap" class="col-md-3 control-label">Alamat Kantor</label>
      <div class="col-md-9">
        <?php 
            echo form_input($alamatkantor); 
            echo form_error('alamatkantor','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="namalengkap" class="col-md-3 control-label">Jarak ke kantor</label>
      <div class="col-md-5">
        <div class="input-group">  
        <?php 
            echo form_input($jarakkekantor); 
            echo "<span class=\"input-group-addon\">KM</span>";
            echo '</div>';
            echo form_error('jarakkekantor','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="namalengkap" class="col-md-3 control-label">Penghasilan</label>
      <div class="col-md-5">
        <?php 
            //print_r($gj);
            echo form_dropdown('gaji', $gaji, $gj->gaji, 'class=form-control');
            echo form_error('gaji','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="namalengkap" class="col-md-3 control-label">Nomor Handphone</label>
      <div class="col-md-9">
        <?php 
            echo form_input($nohp); 
            echo form_error('nohp','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
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