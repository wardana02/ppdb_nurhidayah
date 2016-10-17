<div class="row">
    <div class="col-md-12">
        <hr />
        <?php 
            echo Tb::breadcrumbs(array('links' => array('Home' => site_url(),'Data Pendaftar'))); 
        ?>
        <hr />
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4>Data Pendaftar</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-condensed table-striped">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>ID SISWA</th>
                        <th>NAMA LENGKAP</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1 + $this->uri->segment(3);
                foreach($siswa as $d)
                {
                    echo "<tr>
                            <td>".$no."</td>
                            <td>".$d->id_siswa."</td>
                            <td>".$d->namalengkap."</td>
                          </tr>";
                    $no++;
                }
                ?>
                </tbody>
            </table>
        </div>
        <div style="margin-top: -20px;"><?php echo $page; ?></div>
        <hr />
    </div>
</div>