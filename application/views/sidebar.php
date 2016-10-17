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
                <div class="row">
                    <div class="col-md-5">
                        <h5>ID Pendaftaran</h5>
                    </div>
                    <div class="col-md-7">
                        <h5>: <?php echo $this->session->userdata('id_siswa') ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <h5>Nama Lengkap</h5>
                    </div>
                    <div class="col-md-7">
                        <h5>: <?php echo $this->session->userdata('namalengkap') ?></h5>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- MENU AKTIF ACCOUNT -->
        <?php if($this->session->userdata('member') == true) { ?>
        <div class="panel panel-primary">
            <div class="panel-heading">Formulir yang harus dilengkapi</div>
                <div class="list-group">
                    <a href="<?php echo site_url().'member/data_siswa'; ?>" class="list-group-item">&raquo; Data Siswa</a>
                    <a href="<?php echo site_url().'member/data_ayah'; ?>" class="list-group-item">&raquo; Data Ayah</a>
                    <a href="<?php echo site_url().'member/data_ibu'; ?>" class="list-group-item">&raquo; Data Ibu</a>
                    <a href="<?php echo site_url().'member/data_alamat'; ?>" class="list-group-item">&raquo; Data Alamat</a>
                    <a href="<?php echo site_url().'member/data_saudara'; ?>" class="list-group-item">&raquo; Data Saudara</a>
                    <!--<a href="<?php echo site_url().'member/data_observasi'; ?>" class="list-group-item">&raquo; Observasi Siswa</a>
                    <a href="<?php echo site_url().'member/data_wawancara'; ?>" class="list-group-item">&raquo; Data Wawancara Ortu</a> -->
                    <a href="<?php echo site_url().'member/data_biaya'; ?>" class="list-group-item">&raquo; Data Biaya</a>
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