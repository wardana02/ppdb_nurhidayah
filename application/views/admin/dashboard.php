<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Pendaftar PPDB Online SDIT Nur Hidayah</div>
            <div class="panel-body">
                <div class="box-header">
                  <p>
                    Tabel Monitoring anggaran ini, dikelompokan berdasarkan Anggaran yang ada per Komponen kegiatan.
                    Dibandingkan dengan jumlah pegawai event perjalanan yang menggunakan anggaran dana komponen kegiatan tersebut.
                  </p>
                  &nbsp;

                   <div id="adah_chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                   <!--
                  <a href=<?php echo site_url('cetak/download/1'); ?> target="_blank" class="btn btn-info">
                    <i class="glyphicon glyphicon-cloud-download"></i> Download to PDF<br>
                  </a>
                  -->
                </div> &nbsp;



                <!-- ISI DARI TABEL TAMPIL-->
                <div class="box-body">
                  <table id="datatable" class="table table-bordered table-striped">
                 <thead>
                 <th class="sorting">Tahun</th>
                 <?php 
                      $i=0+1;
                      foreach($jml_pendaftar as $data){?>
                      <th class="sorting">Tahun <?=$data->periode?></th>
                <?php } ?>
                 </thead>
                 
                 <tbody>
                 <td>Jumlah Siswa </td>
                 <?php 
                      $i=0+1;
                      foreach($jml_pendaftar as $data){?>
                      <td><?php echo $data->jml ?></td>
                 <?php } ?>
                 </tbody>

                  </table>
                  <i class="pull-left">Sumber : Database PPDB Online SDIT Nur Hidayah</i>
                <i class="pull-right">Satuan : Siswa</i> 
                <br>
                <br> 
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>
</div>
