<?php error_reporting(0); 
$t = explode('-', $detailAnak->tgl_lahir);
if( !defined('BASEPATH')) exit('NO direct allowed');

/**
 * @author Marsono Saputro
 * @copyright 2014
 **/
$pesan = $this->session->flashdata('aju_anak');
if(!empty($pesan)){
?>
<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert"><span class="btn glyphicon glyphicon-remove"></span></button>
  <b><?php echo $pesan; ?></b>
</div>
<?php } ?>

<div class="well">
<legend>Finalisasi</legend>

<div align="justify"> Setelah Melakukan finalisasi pengajuan, kemudian Cetak Tagihan Pembayaran, Tunggu verifikasi dari Admin PPDB SDIT Nur Hidayah, Segera lakukan konfirmasi via WhatsApp, Email setelah melakukan pembayaran.</div>
</div>


<div class="well">
    <legend>Daftar Calon Siswa Yang Diajukan</legend>
<table id="example1" class="table table-hover table-striped">
  <thead>
    <tr>
      <th class="sorting">Nomor</th>
      <th class="sorting">Nama Anak</th>
      <th class="sorting">Jenis Kelamin</th>
      <th class="sorting">Tgl Lahir</th>
      <th class="sorting">Usia</th>
      <th class="sorting">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  //print_r($data);exit();
  $n=1;
  if(count($dataAnak)==0){
    echo "<tr>";
      echo "<td colspan='6'> <h3> Maaf, Data Anak Kosong, Silahkan isi data anak terlebih dahulu </h3> </td>";
    echo "</tr>";
  }
    foreach ($dataAnak as $dt) {
      $umur = umur($dt->tgl_lahir);
      echo "<tr>";
      echo "<td> $n </td>";
      echo "<td> $dt->namalengkap </td>";
      echo "<td> $dt->kelamin </td>";
      echo "<td> ".dateindo($dt->tgl_lahir)." </td>";
      echo "<td> ".$umur." </td>";
      echo "<td> Siswa SDIT </td>";
      if($dt->is_finalisasi==NULL){
        echo "<td> <a href='".base_url('member/finals/'.$dt->id_siswa)."' class='btn btn-warning' onclick='return confirm_delete()' ><i class='fa fa-edit'></i> Finalisasi</a></td>";
      }
      elseif(($dt->is_finalisasi>0)){
        echo "<td> <a href='".base_url('cetak/tagihan/'.$dt->id_siswa)."' class='btn btn-primary' onclick='return confirm_delete()' target='_blank'><i class='fa fa-edit'></i> Cetak Tagihan Pembayaran</a></td>";
      }elseif($dt->is_finalisasi==2){
        echo "<td> <a class='btn btn-success'><i class='fa fa-edit'></i> Lengkapi Formulir</a></td>";
      }
      
      echo "</tr>";
      $n++;
    }
  ?>
      <td></td>

  </tbody>

</table>
</div>
<div class="well">
<legend>Lengkapi Data</legend>

<div align="justify"> Kemudian Lengkapi data Formulir siswa sesuai dengan siswa yang telah diajukan.</div>
</div>

<div class="well">
    <legend>Daftar Siswa Sudah Verifikasi</legend>
<table id="example1" class="table table-hover table-striped">
  <thead>
    <tr>
      <th class="sorting">Nomor</th>
      <th class="sorting">Nama Anak</th>
      <th class="sorting">Jenis Kelamin</th>
      <th class="sorting">Tgl Lahir</th>
      <th class="sorting">Usia</th>
      <th class="sorting">Tanggal Verifikasi</th>
    </tr>
  </thead>
  <tbody>
  <?php
  //print_r($data);exit();
  $n=1;
  if(count($dataAnak)==0){
    echo "<tr>";
    echo "<td colspan='6'> <h3> Maaf, Data Anak Kosong, Silahkan isi data anak terlebih dahulu </h3> </td>";
    echo "</tr>";
  }
    foreach ($dataVerif as $dt) {
      $umur = umur($dt->tgl_lahir);
      echo "<tr>";
      echo "<td> $n </td>";
      echo "<td> $dt->namalengkap </td>";
      echo "<td> $dt->kelamin </td>";
      echo "<td> ".dateindo($dt->tgl_lahir)." </td>";
      echo "<td> ".$umur." </td>";
      echo "<td> ".$dt->tgl_verifikasi." </td>";
      if($dt->is_finalisasi==2){
        echo "<td> <a href='".base_url('member/data_siswa/'.$dt->id_siswa)."'class='btn btn-success'><i class='fa fa-edit'></i> Lengkapi Formulir</a></td>";
      }else{
        echo "<td> <a class='btn btn-success'><i class='fa fa-edit'></i> Lengkapi Formulir</a></td>";
      }
      
      echo "</tr>";
      $n++;
    }
  ?>
      <td></td>

  </tbody>

</table>
</div>
