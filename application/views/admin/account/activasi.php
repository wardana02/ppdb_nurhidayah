<?php
function tanggal($tgl)
{
    $x = explode('-', $tgl);
    return $x[2].'-'.$x[1].'-'.$x[0];
}
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">DATA ACCOUNT</h1>
        <h1 class="page-subhead-line">Menampilkan semua pendaftar account baru. </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
    <?php 
    $pesan = $this->session->flashdata('sukses');
    echo !empty($pesan) ? '<div class=\'alert alert-info\'>'.$pesan.'</div>' : '';
    ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
   
            <table class="table table-bordered table-condensed table-striped table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>EMAIL</th>
                        <th>No HP</th>
                        <th>Tanggal Daftar</th>
                        <th>Terakhir Login</th>
                        <th>Status</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1 + $this->uri->segment(3);
                    foreach ($account as $r)
                    {
                        echo "<tr>
                                <td>".$no."</td>
                                <td>".$r->nik."</td>
                                <td>".$r->namalengkap."</td>
                                <td>".$r->email."</td>
                                <td>".$r->nohp."</td>
                                <td>".dateindo($r->tgldaftar)."</td>
                                <td>".$r->last_log."</td>
                                <td>".$r->aktif."</td>
                                <td>".anchor('management/aktifkan/'.$r->id_account,img(base_url().'assets/images/check.png'), array('onclick'=>'return confirm(\'Apakah Anda yakin akan mengaktifkan account ini?\')'))."</td>
                                <td>".anchor('management/delete_account/'.$r->id_account,img(base_url().'assets/images/delete.png'), array('onclick'=>'return confirm(\'Apakah Anda yakin akan menghapus data ini?\')'))."</td>
                            </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>

        </div>
        <div class="pull-right" style="margin-top: -25px;"></div>
    </div>
</div>
