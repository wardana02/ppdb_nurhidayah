<?php if( !defined('BASEPATH')) exit('NO direct allowed');

/**
 * @author Marsono Saputro
 * @copyright 2014
 **/
$pesan = $this->session->flashdata('update_alamat');
if(!empty($pesan)){
?>
<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert"><span class="btn glyphicon glyphicon-remove"></span></button>
  <b><?php echo $pesan; ?></b>
  <div class="pull-right">
    <a href="<?php echo site_url().'member/data_saudara' ?>" class="btn btn-xs glyphicon glyphicon-forward"> LANJUT </a>
  </div>
</div>
<?php } ?>

<div class="well">
<form name="pendaftaran" method="POST" action="<?php echo site_url().'member/update_dataalamat' ?>" class="form-horizontal">
  <fieldset>
    <legend>Data Alamat</legend>
    <div class="form-group">
      <label for="dusun" class="col-md-3 control-label">Dusun / Jln. </label>
      <div class="col-md-9">
        <?php 
            echo form_input($dusun); 
            echo form_error('dusun','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="rt" class="col-md-3 control-label">RT </label>
      <div class="col-md-4">
        <?php 
            echo form_input($rt); 
            echo form_error('rt','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
      <label for="rt" class="col-md-1 control-label">RW</label>
      <div class="col-md-4">
        <?php 
            echo form_input($rw); 
            echo form_error('rw','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="desa" class="col-md-3 control-label">Desa/Kelurahan</label>
      <div class="col-md-9">
        <?php 
            echo form_input($desa); 
            echo form_error('desa','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="kecamatan" class="col-md-3 control-label">Kecamatan</label>
      <div class="col-md-9">
        <?php 
            echo form_input($kec); 
            echo form_error('kecamatan','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="kabupaten" class="col-md-3 control-label">Kabupaten/Kota</label>
      <div class="col-md-9">
        <?php 
            echo form_input($kab); 
            echo form_error('kabupaten','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="statusrumah" class="col-md-3 control-label">Status Rumah</label>
      <div class="col-md-3">
        <?php
            if($trans->statusrumah == ''){
                $status = '';
                $status2= '';
            }elseif($trans->statusrumah == 'Milik Sendiri'){
                $status = $trans->statusrumah;
                $status2= '';
            }elseif($trans->statusrumah == 'Sewa'){
                $status = $trans->statusrumah;
                $status2= '';
            }elseif($trans->statusrumah == 'Ikut Orang Tua'){
                $status = $trans->statusrumah;
                $status2= '';
            }elseif($trans->statusrumah == 'Dinas'){
                $status = $trans->statusrumah;
                $status2= '';
            }else{
                $status = 'Lainnya';
                $status2 = $trans->statusrumah;
            }
            
            $rumah = array(''=>'', 'Milik Sendiri'=>'Milik Sendiri', 'Sewa'=>'Sewa', 'Ikut Orang Tua'=>'Ikut Orang Tua', 'Dinas'=>'Dinas', 'Lainnya'=>'Lainnya'); 
            //echo form_input($status); 
            echo form_dropdown('statusrumah', $rumah, $status, 'class="form-control" id="rmh"');
            echo form_error('statusrumah','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
      <div class="col-md-6">
        <?php
        $lainnya = array('name'=>'statusrumah2', 'value'=>$status2, 'class'=>'form-control', 'id'=>'rmh2');
        echo form_input($lainnya);
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="jarak" class="col-md-3 control-label">Jarak ke Sekolah</label>
      <div class="col-md-3">
        <div class="input-group">
        <?php 
            echo form_input($jarak); 
            echo "<div class=\"input-group-addon\">KM</div>";
            echo form_error('jarakkesekolah','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="tlp" class="col-md-3 control-label">Tlp Rumah</label>
      <div class="col-md-9">
        <?php 
            echo form_input($tlp); 
            echo form_error('tlp','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="transport" class="col-md-3 control-label">Moda Transportasi</label>
      <div class="col-md-9">
        <?php 
            echo form_dropdown('transportasi', $transport, $trans->transportasi, 'class=form-control'); 
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

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.11.1.min.js' ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        if($("#rmh").val() == ''){
            $("#rmh2").prop('disabled', 'disabled');
        }
        if($("#rmh").val() != 'Lainnya'){
            $("#rmh2").prop('disabled', 'disabled');
        }
        
        $("#rmh").change(function(){
            if($("#rmh").val() == 'Lainnya'){
                $("#rmh2").removeAttr('disabled');
                $("#rmh2").focus();
                $("#rmh2").prop('required', 'required');
            }else{
                $("#rmh2").prop('disabled', 'disabled');
            }
        });
    });
</script>