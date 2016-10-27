<?php
error_reporting(0);
?>
          <?php if($this->session->userdata('member') == 'aktif'){ ?>
          <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Pendaftaran Siswa</h3>
            </div>
            <div class="panel-body">
                
                <p> Terimakasih telah mendaftarkan putra/putri Bapak,Ibu. Berikut kami tampilkan daftar putra/putri yang telah diverifikasi dan melengkapi data guna pendaftaran siswa SDIT Nur Hidayah</p>
                <p> Silahkan cetak biodata siswa untuk keperluan administrasi pendaftaran.</p>
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                      <th class="sorting">#</th>
                      <th class="sorting">Nama Anak</th>
                      <th class="sorting">Tgl Lahir</th>
                      <th class="sorting">Kode Pembayaran</th>
                      <th class="sorting">Biodata</th>
                    </tr>
                  </thead>
                  <?php
                  $n=1;
                    foreach ($dataAnak as $dt) {
                      $url = base_url("cetak/biodata/".$dt->id_siswa);
                      $umur = umur($dt->tgl_lahir);
                      echo "<tr>";
                      echo "<td> $n </td>";
                      echo "<td> $dt->namalengkap </td>";
                      echo "<td> ".dateindo($dt->tgl_lahir)." </td>";
                      echo "<td> ".$dt->kd_unik." </td>";
                      echo "<td> <a href='$url' target='_blank' class='btn btn-primary'><i class='fa fa-print'></i> Cetak Biodata</a></td>";
                      echo "</tr>";
                      $n++;
                    }
                  ?>
                </table>
            </div>
        </div>
        <?php } ?>

<div class="row">
    <div class="col-lg-12">
    <div class="alert alert-dismissable alert-success">
    <button type="button" class="close" data-dismiss="alert"><b>x</b></b></span></button>
      <h4>Assalamualaikum wr. wb.</h4>
      <p>
        Yth. Bapak/Ibu orang tua calon Siswa SDIT Nur Hidayah Surakarta, kami ucapkan selamat dan terima kasih atas 
        partisipasinya dalam mendaftarkan Putra/Putri nya ke SDIT Nur Hidayah Surakarta. 
      </p>
      <p>
        Silahkan Lengkapi Data Diri Bapak dan Ibu pada Formulir dibawah ini, kemudian dapat mengajukan pendaftaran putra/putri sekalian.
      </p>
    </div>
    <!-- DATA SISWA -->
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="datasiswa">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <b>Data Orang Tua</b>
        </a>
      </h4>

    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="datasiswa">
      <div class="panel-body">
        <?php $foto = !empty($siswa->foto) ? base_url().'foto/'.$siswa->foto : '' ?>
            <div class="table-responsive">
             <table class="table table-condensed table-bordered table-striped">
                <thead>
                    <tr><th>Keterangan</th><th>Ayah</th><th>Ibu</th></tr>
                </thead>
                <tbody>
                    <tr><td>NIK</td><td><?php echo $ayah->nik; ?></td><td><?php echo $ibu->nik; ?></td></tr>
                    <tr><td>Nama Lengkap</td><td><?php echo $ayah->namalengkap; ?></td><td><?php echo $ibu->namalengkap; ?></td></tr>
                    <tr><td>Tempat tanggal Lahir</td><td><?php echo $ayah->tempatlahir.', '.dateindo($ayah->tgllahir); ?></td><td><?php echo $ibu->tempatlahir.', '.dateindo($ibu->tgllahir); ?></td></tr>
                    <tr><td>Pendidikan</td><td><?php echo $ayah->pendidikan; ?></td><td><?php echo $ibu->pendidikan; ?></td></tr>
                    <tr><td>Pekerjaan</td><td><?php echo $ayah->pekerjaan; ?></td><td><?php echo $ibu->pekerjaan; ?></td></tr>
                    <tr><td>Alamat Kantor</td><td><?php echo $ayah->alamatkantor; ?></td><td><?php echo $ibu->alamatkantor; ?></td></tr>
                    <tr><td>Jarak Ke Kantor</td><td><?php echo $ayah->jarakkekantor; ?></td><td><?php echo $ibu->jarakkekantor; ?></td></tr>
                    <tr><td>Penghasilan</td><td><?php echo $ayah->gaji; ?></td><td><?php echo $ibu->gaji; ?></td></tr>
                    <tr><td>Nomor Handphone</td><td><?php echo $ayah->nohp; ?></td><td><?php echo $ibu->nohp; ?></td></tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <div class="pull-right">
                                <a href="<?php echo site_url().'member/data_ayah' ?>" class="btn btn-sm btn-info glyphicon glyphicon-edit" title="Klik untuk mengubah"></a>
                            </div>
                        </td>
                        <td>
                            <div class="pull-right">
                                <a href="<?php echo site_url().'member/data_ibu' ?>" class="btn btn-sm btn-info glyphicon glyphicon-edit" title="Klik untuk mengubah"></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
      </div>
    </div>
  </div>

 
 
</div>
    </div>
</div>
