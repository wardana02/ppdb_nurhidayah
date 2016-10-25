<?php
function ym($id, $style)
{
    echo "<a href='ymsgr:sendim?$id'><img border=0 src='http://opi.yahoo.com/online?u=$id&amp;m=g&amp;t=$style' /> </a>";
}

$data_account = $this->db->count_all('data_account');
$data_siswa   = $this->db->count_all('data_siswa');
$total = $data_account + $data_siswa;

?>
<div class="row">
    <div class="col-md-12">
        <!-- FORM LOGIN -->
                <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Sekilas Info</h3>
            </div>
            <div class="panel-body">
                <h5>Total Pendaftar : <?php echo sprintf("%03s", $total); ?></h5>
                <?php if($this->session->userdata('member') == 'aktif'){ ?>
                <!--
                <div class="row">
                    <div class="col-md-5">
                        <h5>ID Pendaftaran</h5>
                    </div>
                    <div class="col-md-7">
                        <h5>: <?php echo $this->session->userdata('id_siswa') ?></h5>
                    </div>
                </div>
                -->
                <div class="row">
                    <div class="col-md-12">
                        Identitas Akun
                        <h3><?php echo $this->session->userdata('nama_lengkap') ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        E-Mail
                        <h4><?php echo $this->session->userdata('email') ?></h4>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <?php 
        $jml = $this->member->get_jml_aju();
        if($this->session->userdata('member') == 'aktif'){ ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Finalisasi Ajuan Siswa</h3>
            </div>
            <div class="panel-body"> 
                <div class="row">
                    <div class="col-md-12">
                        <p>Apabila Data Ajuan sudah benar, silahkan klik tombol Finalisasi untuk melakukan checkout pengajuan
                        dan menampilkan cetak pembayaran.</p>
                    </div>
                    <div class="col-md-6">
                        <a href=<?=base_url("member/finalisasi")?> class="btn btn-primary"> <i class="fa fa-plus-circle"></i> Finalisasi Ajuan</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php 
        $jml = $this->member->get_jml_aju();
        if($this->session->userdata('member') == 'aktif'){ ?>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Pengajuan Pendaftaran Siswa</h3>
            </div>
            <div class="panel-body"> 
                <div class="row">
                    <div class="col-md-12">
                        <h5>Jumlah Ajuan Siswa Anda Tahun <?=date("Y")?></h5>
                    </div>
                    <div class="col-md-12">
                        <h3> <?=$jml->jml?> Siswa</h3>
                    </div>
                    <div class="col-md-6">
                        <a href=<?=base_url("member/ajukan")?> class="btn btn-success"> <i class="fa fa-plus-circle"></i> Lakukan Ajuan Pendaftaran</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- MENU AKTIF ACCOUNT -->
        <?php if($this->session->userdata('member') == true) { ?>
        <div class="panel panel-primary">
            <div class="panel-heading">Data Pokok yang harus dilengkapi</div>
                <div class="list-group">
                    <!--<a href="<?php echo site_url().'member/data_siswa'; ?>" class="list-group-item">&raquo; Data Siswa</a>-->
                    <a href="<?php echo site_url().'member/data_ayah'; ?>" class="list-group-item">&raquo; Data Ayah</a>
                    <a href="<?php echo site_url().'member/data_ibu'; ?>" class="list-group-item">&raquo; Data Ibu</a>
                    <a href="<?php echo site_url().'member/data_alamat'; ?>" class="list-group-item">&raquo; Data Alamat</a>
                    <a href="<?php echo site_url().'member/data_anak'; ?>" class="list-group-item">&raquo; Data Anak</a>
                    <!--<a href="<?php echo site_url().'member/data_observasi'; ?>" class="list-group-item">&raquo; Observasi Siswa</a>
                    <a href="<?php echo site_url().'member/data_wawancara'; ?>" class="list-group-item">&raquo; Data Wawancara Ortu</a> -->
                    <!--<a href="<?php echo site_url().'member/data_biaya'; ?>" class="list-group-item">&raquo; Data Biaya</a> -->
                    <a href="<?php echo site_url().'member/kartu_observasi'; ?>" class="list-group-item">&raquo; Download Kartu Observasi</a>
                </div>
            </div>
        <?php } ?>
            <!-- ONLINE SERVICE -->
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Online Service</h3>
            </div>
            <div class="panel-body">
                <p>Jika mengalami kesulitan silahkan kontak dengan petugas kami di bawah ini!</p>
                <div class="row">
                    <div class="col-md-8">
                        <img src="<?php echo base_url()."assets/images/wa_taqwin.jpg"; ?>" class="img img-responsive" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <img src="<?php echo base_url()."assets/images/wa_ku.jpg"; ?>" class="img img-responsive" />
                    </div>
                </div>
                
            </div>
        </div>  

        <!-- Sponsor -->
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Didukung oleh:</h3>
            </div>
            <div class="panel-body">
                <img src="<?php echo base_url()."assets/images/muamalat.png"; ?>" class="img img-responsive">
            </div>
        </div>       

    </div>
</div>