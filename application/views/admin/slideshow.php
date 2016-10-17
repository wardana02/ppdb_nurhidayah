<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">SLIDE SHOW</h1>
        <!-- <h1 class="page-subhead-line">Menambahkan dan menghapus slideshow. </h1> -->
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?php 
        $pesan = $this->session->flashdata('pesan'); 
        $sukses = $this->session->flashdata('sukses'); 
        echo !empty($pesan) ? '<div class=\'alert alert-warning\'>'.$pesan.'</div>' : '';
        echo !empty($sukses) ? '<div class=\'alert alert-success\'>'.$sukses.'</div>' : '';
        ?>
        
        <div class="panel panel-default">
            <div class="panel-heading">Upload Image Slideshow</div>
            <div class="panel-body">
                <form name="slide" enctype="multipart/form-data" action="<?php echo site_url().'management/simpan_slideshow' ?>" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-lg-4">Pilih Image</label>
                        <div class="col-lg-8">
                            <input type="file" name="gambar" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 col-lg-offset-4">
                            <input type="submit" name="submit" value="Simpan" class="btn btn-default" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 col-lg-offset-4">
                            <p class="text-danger" style="font-weight: bold; font-size: 90%;">*) Ukuran Gambar: (760 x 310) px</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- KOLOM KANAN -->
    <div class="col-md-6">
        <?php 
        $gagal = $this->session->flashdata('gagal'); 
        $sukses = $this->session->flashdata('sukses'); 
        echo !empty($gagal) ? '<div class=\'alert alert-warning\'>'.$gagal.'</div>' : '';
        echo !empty($sukses) ? '<div class=\'alert alert-success\'>'.$sukses.'</div>' : '';
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">Gambar Slideshow</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10%;">No</th>
                                <th style="width: 60%;">Gambar</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            <?php
                            $no = 1 + $this->uri->segment(3);
                            foreach($slide as $r)
                            {
                                $cmd = $r->status == '1' ? 
                                        anchor('management/update_slide_status/'.$r->id,img(base_url().'assets/images/uncheck.png')) : 
                                        anchor('management/update_slide_status/'.$r->id,img(base_url().'assets/images/check.png'));
                                echo "<tr>
                                        <td>".$no."</td>
                                        <td><img src='".base_url()."assets/images/slideshow/".$r->gambar."' class='img-responsive img-rounded' /></td>
                                        <td>".$cmd."</td>
                                        <td>".anchor('management/delete_slide/'.$r->id,img(base_url().'assets/images/delete.png'), 
                                                     array('onclick'=>"return confirm('Apakah Anda yakin akan menghapus gambar ini?')"))."</td>
                                      </tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="pull-right" style="margin-top: -25px;"><?php echo $page; ?></div> 
            </div>
        </div>
    </div>
</div>