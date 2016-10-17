<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">HALAMAN STATIS</h1>
        <h1 class="page-subhead-line">Konten statis di halaman user seperi prosedur, agenda, dll.  </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <a href="<?php echo site_url().'management/tambah_statis' ?>" class="btn btn-primary btn-sm">Tambah Halaman</a>
            <div style="clear: both; height: 10px;"></div>
        <div class="table-responsive">
            <table class="table table-bordered table-condensed table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Edit</th>
                        <th>Del</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    foreach($statis as $t)
                    {
                        $edit  = anchor(site_url().'management/edit_statis/'.$t->id_halaman, img(base_url().'assets/images/update.png'));
                        $hapus = anchor(site_url().'management/hapus_statis/'.$t->id_halaman.'/'.$t->gambar, img(base_url().'assets/images/delete.png'));
                        echo "<tr>
                                <td>".$no."</td>
                                <td>".$t->judul."</td>
                                <td>".$edit."</td>
                                <td>".$hapus."</td>
                             </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>