<?php error_reporting(0); 
$t = explode('-', $detailAnak->tgl_lahir);
if( !defined('BASEPATH')) exit('NO direct allowed');

/**
 * @author Marsono Saputro
 * @copyright 2014
 **/
$pesan = $this->session->flashdata('update_anak');
if(!empty($pesan)){
?>
<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert"><span class="btn glyphicon glyphicon-remove"></span></button>
  <b><?php echo $pesan; ?></b>
  <div class="pull-right">
    <a href="<?php echo site_url().'member' ?>" class="btn btn-xs glyphicon glyphicon-stop"> Selesai </a>
  </div>
</div>
<?php } ?>

<div class="well">
<legend>Data Anak</legend>

<div align="justify"> Berikut ditampilkan data anak yang sudah terdaftar kedalam akun ini. Kemudian untuk mengajukan pendaftaran
atas nama anak yang sudah tercantum di daftar anak ini, silahkan dengan mengeklik tombol <a href=<?=base_url("member/ajukan")?> class='btn btn-success'> Lakukan Ajuan Pendaftaran</a></div>
</div>

<div class="well">
<table id="example1" class="table table-hover table-striped">
  <thead>
    <tr>
      <th class="sorting">Nomor</th>
      <th class="sorting">Nama Anak</th>
      <th class="sorting">Jenis Kelamin</th>
      <th class="sorting">Usia</th>
      <th class="sorting">Status</th>
      <th class="sorting">Ubah</th>
    </tr>
  </thead>
  <tbody>
  <?php
  //print_r($data);exit();
  $n=1;
    foreach ($dataAnak as $dt) {
      echo "<tr>";
      echo "<td> $n </td>";
      echo "<td> $dt->namalengkap </td>";
      echo "<td> $dt->kelamin </td>";
      echo "<td> $dt->tgl_lahir </td>";
      echo "<td> Siswa SDIT </td>";
      echo "<td> <a href='".base_url('member/ubah_anak/'.$dt->id_saudara)."' class='btn btn-primary'><i class='fa fa-edit'></i> Edit</a></td>";
      echo "</tr>";
      $n++;
    }
  ?>
      <td></td>

  </tbody>

</table>
</div>


<div class="well">
<form name="pendaftaran" method="POST" action="<?php echo site_url().'member/update_dataanak' ?>" class="form-horizontal">
  <fieldset>
    <legend>Data Anak</legend>
    <div class="form-group">
      <label for="namalengkap" class="col-md-3 control-label">Nama Lengkap</label>
      <div class="col-md-9">
        <?php
            echo form_hidden('id', $detailAnak->id_saudara);

          $nama = array(
              'name'        => 'namalengkap',
              'value'       => $detailAnak->namalengkap,
              'class'       => 'form-control',
            );
            echo form_input($nama);
            echo form_error('namalengkap','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="kelamin" class="col-md-3 control-label">Kelamin </label>
      <div class="col-md-9">
        <?php 
            $BATCH = $detailAnak->kelamin;
            echo form_dropdown('kelamin', array(''=>'', 'L'=>'Laki-laki', 'P'=>'Perempuan'), $BATCH,'class=form-control');
            echo form_error('kelamin','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="ttl" class="col-md-3 control-label">Tempat Lahir</label>
      <div class="col-md-9">
        <?php 
            $ttl = array(
              'name'        => 'ttl',
              'value'       => $detailAnak->tmp_lahir,
              'class'       => 'form-control',
            );
            echo form_input($ttl); 
            echo form_error('ttl','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
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
      <label for="sekolah" class="col-md-3 control-label">Sekolah</label>
      <div class="col-md-9">
        <?php 
            $sekolah = array(
              'name'        => 'sekolah',
              'value'       => $detailAnak->sekolah,
              'class'       => 'form-control',
            );
            echo form_input($sekolah); 
            echo form_error('sekolah','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="keterangan" class="col-md-3 control-label">Keterangan</label>
      <div class="col-md-9">
        <?php 
        $keterangan = array(
              'name'        => 'keterangan',
              'value'       => $detailAnak->keterangan,
              'class'       => 'form-control',
            );
            echo form_input($keterangan); 
            echo form_error('keterangan','<div class=\'alert alert-dismissable alert-danger\'>', '</div>');
        ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-9 col-md-offset-3">
        <input type="submit" class="btn btn-primary" name="submit" value=<?=$val?> />
      </div>
    </div>
  </fieldset>
</form>
</div>