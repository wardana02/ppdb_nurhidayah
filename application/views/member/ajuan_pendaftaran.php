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
  <div class="pull-right">
    <a href="<?php echo site_url().'member' ?>" class="btn btn-xs glyphicon glyphicon-stop"> Selesai </a>
  </div>
</div>
<?php } ?>


<div class="well">
    <legend>Data Anak</legend>
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
      if($dt->kd_unik!=NULL){
        echo "<td> <a class='btn btn-primary'><i class='fa fa-edit'></i> Proses Pengajuan SDIT</a></td>";
      }
      elseif(($umur>=6)&&($umur<8)){
        echo "<td> <a href='".base_url('member/ajukan_anak/'.$dt->id_saudara)."' class='btn btn-success'><i class='fa fa-edit'></i> Ajukan Pendaftaran</a></td>";
      }else{
        echo "<td> <a class='btn btn-warning'><i class='fa fa-edit'></i> Usia Melebihi</a></td>";
      }
      
      echo "</tr>";
      $n++;
    }
  ?>
      <td></td>

  </tbody>

</table>
</div>