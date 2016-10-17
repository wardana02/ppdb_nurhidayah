<div class="row">
    <div class="col-lg-12">
    <div class="alert alert-dismissable alert-success">
    <button type="button" class="close" data-dismiss="alert"><b>x</b></b></span></button>
      <h4>Assalamualaikum wr. wb.</h4>
      <p>
        Yth. Bapak/Ibu orang tua calon Siswa SDIT Nur Hidayah Surakarta, kami ucapkan selamat dan terima kasih atas 
        partisipasinya dalam Jaring Generasi Emas SDIT eNHa tahun pelajaran 2015/2016. 
      </p>
      
      <p>
        Selanjutnya silakan melaksanakan observasi kesehatan di Poliklinik Nur Hidayah dan melengkapi formulir yang sudah kami sediakan di system ini!
        Untuk mengisi formulir Bapak/Ibu dapat membuka formulir pada menu di samping, atau juga Bapak Ibu menggunanakan smartphone menu 
        isian berada di bagian bawah halaman ini.
      </p>
    </div>
    <!-- DATA SISWA -->
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="datasiswa">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <b>Data Siswa</b>
        </a>
      </h4>

    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="datasiswa">
      <div class="panel-body">
        <?php $foto = !empty($siswa->foto) ? base_url().'foto/'.$siswa->foto : '' ?>
            <div class="table-responsive">
            <table class="table table-condensed table-bordered table-striped">
                <tbody>
                    <tr><td>NIK</td><td><?php echo $siswa->nik ?></td><td>Foto</td></tr>
                    <tr><td>Nama Lengkap</td><td><?php echo $siswa->namalengkap ?></td>
                        <td rowspan="8" class="col-md-3"><img src="<?php echo $foto; ?>" class="img-responsive img-thumbnail" /></td></tr>
                    <tr><td>Nama Panggilan</td><td><?php echo $siswa->namapanggilan ?></td></tr>
                    <tr><td>NIK</td><td><?php echo $siswa->nik ?></td></tr>
                    <tr><td>Tempat Tanggal Lahir</td><td><?php echo $siswa->tempatlahir.', '.$siswa->tgllahir ?></td></tr>
                    <tr><td>Jenis Kelamin</td><td>
                                                <?php 
                                                    if($siswa->kelamin == 'L') $k = 'Laki-laki';
                                                    elseif($siswa->kelamin == 'P') $k = 'Perempuan';
                                                    echo $k;
                                                ?>
                                                </td></tr>
                    <tr><td>Nama Ibu</td><td><?php echo $siswa->namaibu ?></td></tr>
                    <tr><td>No. Handphone</td><td><?php echo $siswa->nohp ?></td></tr>
                    <tr><td>Email</td><td><?php echo $siswa->email ?></td></tr>
                    <tr><td>Asal Sekolah</td><td colspan="2"><?php echo $siswa->asalsekolah ?></td></tr>
                    <tr><td>Alamat Sekolah</td><td colspan="2"><?php echo $siswa->alamatsekolah ?></td></tr>
                    <tr><td>Berat Badan/Tinggi Badan</td><td colspan="2"><?php echo $siswa->bb.' kg / '.$siswa->tb.' cm' ?></td></tr>
                    <tr><td>Jarak ke Sekolah</td><td colspan="2">
                                                 <?php 
                                                 echo ($siswa->jarak == 1) ? 'kurang dari 1km' : 'lebih dari 2 km ';
                                                 echo '('.$siswa->km.' km)';
                                                 $k = explode("|", $siswa->kps);
                                                 ?>
                                                 </td></tr>
                    <tr><td>Penerimaan KPS</td><td colspan="2"><?php echo $k[0]; echo !empty($k[1]) ? ' / No: '.$k[1] : ''; ?></td></tr>
                </tbody>
            </table>
            </div>
            <div class="pull-right">
                <a href="<?php echo site_url().'member/data_siswa' ?>" class="btn btn-sm btn-info glyphicon glyphicon-edit" title="Klik untuk mengubah"></a>
            </div>
      </div>
    </div>
  </div>
  <!-- DATA ORTU -->
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="dataortu">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <b>Data Orang Tua</b>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="dataortu">
      <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-condensed table-bordered table-striped">
                <thead>
                    <tr><th>Keterangan</th><th>Ayah</th><th>Ibu</th></tr>
                </thead>
                <tbody>
                    <tr><td>NIK</td><td><?php echo $ayah->nik; ?></td><td><?php echo $ibu->nik; ?></td></tr>
                    <tr><td>Nama Lengkap</td><td><?php echo $ayah->namalengkap; ?></td><td><?php echo $ibu->namalengkap; ?></td></tr>
                    <tr><td>Tempat tanggal Lahir</td><td><?php echo $ayah->tempatlahir.', '.$ayah->tgllahir; ?></td><td><?php echo $ibu->tempatlahir.', '.$ibu->tgllahir; ?></td></tr>
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
  <!-- DATA ALAMAT -->
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="dataalamat">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <b>Data Alamat</b>
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="dataalamat">
      <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-condensed table-striped">
                <tbody>
                    <tr><td>Dusun</td><td><?php echo $alamat->dusun; ?></td><td>RT/RW</td><td><?php echo $alamat->rt.', RW '.$alamat->rw ?></td></tr>
                    <tr><td>Desa</td><td><?php echo $alamat->desa ?></td><td>Kecamatan</td><td><?php echo $alamat->kecamatan ?></td></tr>
                    <tr><td>Kabupaten/Kota</td><td><?php echo $alamat->kabupaten ?></td><td>Status Rumah</td><td><?php echo $alamat->statusrumah ?></td></tr>
                    <tr><td>Jarak Rumah ke Sekolah</td><td><?php echo $alamat->jarakkesekolah ?></td><td>Moda Transportasi </td><td><?php echo $alamat->transportasi ?></td></tr>
                    <tr><td>Tlp Rumah</td><td><?php echo $alamat->tlp ?></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                </tbody>
            </table>
        </div>
        <div class="pull-right">
                <a href="<?php echo site_url().'member/data_alamat' ?>" class="btn btn-sm btn-info glyphicon glyphicon-edit" title="Klik untuk mengubah"></a>
        </div>
      </div>
    </div>
  </div>
  <!-- DATA SAUDARA -->
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="datasaudara">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#saudara" aria-expanded="false" aria-controls="collapseThree">
          <b>Data Saudara</b>
        </a>
      </h4>
    </div>
    <div id="saudara" class="panel-collapse collapse" role="tabpanel" aria-labelledby="datasaudara">
      <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-condensed table-striped">
                <thead>
                    <tr><th>No</th><th>Nama Lengkap</th><th>Kelamin</th><th>TTL</th><th>Sekolah</th><th colspan="2">Keterangan</th></tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    foreach($sdr as $r)
                    {
                        echo "<tr><td>".$no."</td><td>".$r->namalengkap."</td><td>".$r->kelamin."</td><td>".$r->ttl."</td><td>".$r->sekolah."</td><td>".$r->keterangan."</td>
                        <td><a href='#' class='btn btn-xs btn-danger glyphicon glyphicon-remove' title='Hapus'></a></td></tr>";
                        $no++;
                    }
                ?>
                </tbody> 
            </table>
        </div>
        <div class="pull-right">
            <a href="<?php echo site_url().'member/data_saudara' ?>" class="btn btn-sm btn-info glyphicon glyphicon-plus" title="Klik untuk mengubah"></a>
        </div>
      </div>
    </div>
  </div>
  <!-- DATA OBSERVASI 
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="dataobservasi">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#observasi" aria-expanded="false" aria-controls="collapseThree">
          <b>Data Observasi</b>
        </a>
      </h4>
    </div>
    <div id="observasi" class="panel-collapse collapse" role="tabpanel" aria-labelledby="dataobservasi">
      <div class="panel-body">
        Data Observasi
      </div>
    </div>
  </div> -->
  <!-- DATA WAWANCARA ORTU
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="datawortu">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#wortu" aria-expanded="false" aria-controls="collapseThree">
          Data Wawancara Ortu
        </a>
      </h4>
    </div>
    <div id="wortu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="datawortu">
      <div class="panel-body">
        <b>Data Wawancara Ortu</b>
      </div>
    </div>
  </div>  -->
  <!-- DATA BIAYA -->
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="databiaya">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#biaya" aria-expanded="false" aria-controls="collapseThree">
          <b>Data Pembiayaan</b>
        </a>
      </h4>
    </div>
    <div id="biaya" class="panel-collapse collapse" role="tabpanel" aria-labelledby="databiaya">
      <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-condensed table-striped">
                <thead>
                    <tr>
                        <th>No</th><th>Rincian</th><th style="text-align: right;">Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $seragam = 450000;
                    $buku    = 200000;
                    $kegiatan= 300000;
                    $total = $seragam + $buku + $kegiatan + $biaya->spp + $biaya->gedung + $biaya->grawadi;
                    ?>
                    <tr>
                        <td>1</td><td>Syahriyah / SPP</td><td style="text-align: right;"><?php echo number_format($biaya->spp,0,',','.'); ?></td>
                    </tr>
                    <tr>
                        <td>2</td><td>Pembangunan / Gedung</td><td style="text-align: right;"><?php echo number_format($biaya->gedung,0,',','.'); ?></td>
                    </tr>
                    <tr>
                        <td>3</td><td>Infak Grawadi</td><td style="text-align: right;"><?php echo number_format($biaya->grawadi,0,',','.'); ?></td>
                    </tr>
                    <tr>
                        <td>4</td><td>Biaya seragam (4 Stel) </td><td style="text-align: right;"><?php echo number_format($seragam,0,',','.'); ?></td>
                    </tr>
                    <tr>
                        <td>5</td><td>Biaya buku  </td><td style="text-align: right;"><?php echo number_format($buku,0,',','.'); ?></td>
                    </tr>
                    <tr>
                        <td>6</td><td>perkiraan Kegiatan </td><td style="text-align: right;"><?php echo number_format($kegiatan,0,',','.'); ?></td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th colspan="2">Total Biaya yang harus dibayar</th>
                        <th style="text-align: right;"><?php echo number_format($total,0,',','.'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="pull-right">
            <a href="<?php echo site_url().'member/data_biaya' ?>" class="btn btn-sm btn-info glyphicon glyphicon-edit" title="Klik untuk mengubah"></a>
        </div>
      </div>
    </div>
  </div>
  
</div>
    
    
    
    
    
    
    </div>
</div>
