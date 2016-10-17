<?php echo $mce; ?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">EDIT HALAMAN STATIS</h1>
        <h1 class="page-subhead-line">Mengubah isi halaman statis. </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-9">
        <div class="panel panel-info">
            <div class="panel-heading">
                FORM EDIT HALAMAN STATIS
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <form enctype="multipart/form-data" name="tambah_statis" method="POST" action="<?php echo site_url().'management/simpan_edit_statis' ?>" role="form">
                    <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" type="text" required="true" name="judul" value="<?php echo $edit->judul; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Isi Halaman Statis</label>
                        <textarea class="form-control" name="isi_halaman" style="height: 400px;"><?php echo $edit->isi_halaman; ?></textarea>
                    </div>     
                    <div class="form-group">
                        <?php 
                        if(!empty($edit->gambar))
                        {
                            ?>
                            <img src="<?php echo base_url().'assets/images/'.$edit->gambar ?>" class="img-responsive img-thumbnail" />
                            <?php
                        }
                        ?>
                        <label>Gambar</label>
                        <input class="form-control" type="file" name="gambar"/>
                    </div>
                    <input type="hidden" name="id_halaman" value="<?php echo $edit->id_halaman ?>" />
                    <input type="hidden" name="file_gambar" value="<?php echo $edit->gambar ?>" />
                    <input type="submit" name="submit" value="Simpan" class="btn btn-info" />                        
                </form>
            </div>
            </div>
        </div>
    </div>
</div>