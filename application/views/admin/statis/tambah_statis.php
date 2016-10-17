<?php echo $mce; ?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">TAMBAH HALAMAN STATIS</h1>
        <h1 class="page-subhead-line">Menambahkan halaman statis. </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-9">
        <div class="panel panel-info">
            <div class="panel-heading">
                FORM TAMBAH HALAMAN STATIS
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <form enctype="multipart/form-data" name="tambah_statis" method="POST" action="<?php echo site_url().'management/simpan_statis' ?>" role="form">
                    <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" type="text" required="true" name="judul" value="<?php echo $this->input->post('judul') ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Isi Halaman Statis</label>
                        <textarea name="isi_halaman" class="form-control" style="height: 400px;"><?php echo $this->input->post('isi_halaman') ?></textarea>
                    </div>     
                    <div class="form-group">
                        <label>Gambar</label>
                        <input class="form-control" type="file" name="gambar"/>
                    </div>
                    <input type="submit" name="submit" value="Simpan" class="btn btn-info" />                        
                </form>
            </div>
            </div>
        </div>
    </div>
</div>