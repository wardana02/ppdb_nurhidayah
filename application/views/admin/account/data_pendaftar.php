<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">DATA PENDAFTARAN</h1>
        <h1 class="page-subhead-line">Menampilkan semua pendaftar aktif. </h1>
        <div class="pull-right" style="margin-top: -75px;">
            <a href="<?php echo site_url().'management/download_excel' ?>" class="btn btn-default glyphicon glyphicon-download"> EXCEL</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-condensed table-striped table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID Siswa</th>
                        <th>Nama Lengkap</th>
                        <th>Kelamin</th>
                        <th>Nama Ibu</th>
                        <th>No HP</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $no=1 + $this->uri->segment(3);
                    foreach ($pendaftar as $r)
                    {
                        echo "<tr>
                                <td>".$no."</td>
                                <td>".$r->id_siswa."</td>
                                <td>".$r->namalengkap."</td>
                                <td>".$r->kelamin."</td>
                                <td>".$r->namaibu."</td>
                                <td>".$r->nohp."</td>
                                </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="pull-right" style="margin-top: -25px;"><?php //echo $page; ?></div>
    </div>
</div>
