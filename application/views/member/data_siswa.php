<?php if( !defined('BASEPATH')) exit('NO direct allowed');

/**
 * @author Marsono Saputro
 * @copyright 2014
 **/

$pesan = $this->session->flashdata('update_siswa');
if(!empty($pesan)){
?>
<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert"><span class="btn glyphicon glyphicon-remove"></span></button>
  <b><?php echo $pesan; ?></b>
  <div class="pull-right">
    <a href="<?php echo site_url().'member/data_ayah' ?>" class="btn btn-xs glyphicon glyphicon-forward"> LANJUT </a>
  </div>
</div>
<?php } ?>
<div class="well"> 
<form name="siswa" id="form_siswa" enctype="multipart/form-data" method="POST" action="<?php echo site_url().'member/update_datasiswa' ?>" class="form-horizontal">
  <fieldset>
    <legend>Data Siswa</legend> 
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
      <label for="namalengkap" class="col-md-3 control-label">Nama Panggilan</label>
      <div class="col-md-9">
        <?php 
            echo form_input($namapanggilan); 
            echo form_error('namapanggilan','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
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
    $t = explode('-',$siswa->tgllahir);
    ?>
    <div class="form-group">
      <label for="tgllahir" class="col-md-3 control-label">Tanggal lahir</label>
      <div class="col-md-3">
        <?php 
            echo form_dropdown('tanggal', $tgl, $t[2], 'class=form-control'); 
            echo form_error('tanggal','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');    
        ?>
      </div>
      <div class="col-md-3">
        <?php 
            echo form_dropdown('bulan', $bln, $t[1], 'class=form-control'); 
            echo form_error('bulan','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
      <div class="col-md-3">
        <?php 
            echo form_dropdown('tahun', $thn, $t[0], 'class=form-control'); 
            echo form_error('tahun','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');    
        ?>
      </div>
    </div>
    <div class="form-group">
        <label for="kelamin" class="col-md-3 control-label">Jenis Kelamin</label>
        <div class="col-md-9">
            <?php 
            echo form_dropdown('jenis_kelamin', $klmn, $siswa->kelamin, 'class="form-control"'); 
            echo form_error('jenis_kelamin','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');    
        ?>
        </div>
    </div>
    <div class="form-group">
      <label for="namaibu" class="col-md-3 control-label">Nama Ibu</label>
      <div class="col-md-9">
        <?php 
            echo form_input($namaibu);
            echo form_error('namaibu','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
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
      <label for="email" class="col-md-3 control-label">Asal Sekolah</label>
      <div class="col-md-9">
        <?php 
            echo form_input($asalsekolah); 
            echo form_error('asalsekolah','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-md-3 control-label">Alamat Sekolah</label>
      <div class="col-md-9">
        <?php 
            echo form_input($alamatsekolah); 
            echo form_error('alamatsekolah','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-md-3 control-label">Tinggi Badan</label>
      <div class="col-md-4">
        <div class="input-group">
        <?php 
            echo form_input($tb);
            echo "<span class=\"input-group-addon\">Cm</span></div>"; 
            echo form_error('tb','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
      <label for="email" class="col-md-2 control-label">Berat Badan</label>
      <div class="col-md-3">
        <div class="input-group">
        <?php 
            echo form_input($bb);
            echo "<span class=\"input-group-addon\">Kg</span></div>"; 
            echo form_error('bb','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-md-3 control-label">Jarak Ke Sekolah</label>
      <div class="col-md-4">
        <?php 
            echo form_dropdown('jarak', array(''=>'','1'=>'kurang dari 1 km', '2'=>'lebih dari 1 km'), $siswa->jarak, 'class=form-control'); 
            echo form_error('jarak','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
      <label for="email" class="col-md-2 control-label">dalam km</label>
      <div class="col-md-3">
        <div class="input-group">
        <?php 
            echo form_input($km);
            echo "<span class=\"input-group-addon\">Km</span></div>"; 
            echo form_error('km','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-md-3 control-label">Penerimaan KPS</label>
      <div class="col-md-2">
        <?php 
            $kps = explode('|', $siswa->kps);
            echo form_dropdown('kps1', array(''=>'','Ya'=>'Ya', 'Tidak'=>'Tidak'), $kps[0], 'class="form-control" id="kps"'); 
            echo form_error('kps1','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
      <label for="email" class="col-md-1 control-label">Nomor</label>
      <div class="col-md-6">
        <?php 
            echo form_input(array('name'=>'kps2', 'value'=>!empty($kps[1]) ? $kps[1]:'', 'class'=>'form-control', 'id'=>'nokps'));
            echo form_error('kps2','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 col-md-offset-3">
        <?php if(!empty($siswa->foto)){ ?>
            <img src="<?php echo base_url().'foto/'.$siswa->foto ?>" class="img-responsive img-thumbnail" />
        <?php } ?>
        </div>
    </div>
    <div class="form-group">
      <label for="foto" class="col-md-3 control-label">Foto <br /> <small style="color: red;">Ukuran (236 x 354)px</small></label>
      <div class="col-md-9">
        <?php 
            echo form_upload(array('name'=>'foto', 'class'=>'form-control')); 
            echo form_error('prestasi','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-9 col-md-offset-3">
        <input type="submit" class="btn btn-primary" name="submit" value="Simpan" />
      </div>
    </div>
</form>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.11.1.min.js' ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        if($("#kps").val() == ''){
            $("#nokps").prop('disabled', 'disabled');
        }else if($("#kps").val() == 'Tidak'){
            $("#nokps").prop('disabled', 'disabled');
        }
        
        $("#kps").change(function(){
            if ($("#kps").val() == "Ya") {
                $("#nokps").removeAttr("disabled");
                $("#nokps").focus();
                $("#nokps").prop('required', 'required');
            }else {
                $("#nokps").prop('disabled', 'disabled');
            }
        });
    });
</script>