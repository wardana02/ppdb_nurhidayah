<?php
function tanggal($tgl)
{
    $x = explode('-', $tgl);
    return $x[2].'-'.$x[1].'-'.$x[0];
}
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">DATA ACCOUNT ORANG TUA</h1>
        <h1 class="page-subhead-line">Menampilkan semua daftar account orang tua siswa. </h1>
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1 + $this->uri->segment(3);
                    foreach ($account as $r)
                    {
                        if($r->aktif==1){
                            $stat = "<label class='label label-success'>Aktif</label>";
                            $tombol = "<a href= ".site_url('management/aktif_acc/'.$r->id_account.'/0')." class='btn btn-warning'> Non Aktifkan</a>";
                        }else{
                            $stat = "<label class='label label-danger'>Non Aktif</label>";
                            $tombol = "<a href= ".site_url('management/aktif_acc/'.$r->id_account.'/1')." class='btn btn-success'> Aktifkan</a>";
                        }
                        echo "<tr>
                                <td>".$no."</td>
                                <td>".$r->nik."</td>
                                <td>".$r->namalengkap."</td>
                                <td>".$r->email."</td>
                                <td>".$r->nohp."</td>
                                <td>".dateindo($r->tgldaftar)."</td>
                                <td>".$r->last_log."</td>
                                <td>".$stat."</td>
                                <td>". $tombol ."</td>
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
