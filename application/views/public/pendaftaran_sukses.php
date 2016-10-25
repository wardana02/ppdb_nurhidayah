<div class="row">
    <div class="col-md-12">
        <hr />
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url() ?>">Home</a></li>
            <li class="active">Pendaftaran Sukses</li>
        </ul>
        <hr />
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                PENDAFTARAN SUKSES
            </div>
            <div class="panel-body" style="font-size:15px">
            <?php 
            echo "<p>Yth. Bapak/Ibu <b>".$this->session->userdata('namaAkun')."</b>, pendaftaran akun anda</b> sukses. 
                 Untuk dapat melanjutkan proses pendaftaran, silahkan login terlebih dahulu, dengan menggunakan 
                 </p>";
            echo "<p> Username :".$this->session->userdata('d_username')." </p>";
            echo "<p> Password :".$this->session->userdata('d_password')." </p>";
            echo "<p> Untuk Mencetak Kartu Akun, silahkan Klik Tombol Cetak pada halaman ini</p>";
            echo"<p>Kemudian setelah login, silakan melakukan pengajuan pendaftaran dengan cara klik menu <b> Ajukan Pendaftaran</b> atau <a href=".base_url("pengajuan")."> Klik Disini</a>
                 </p>";


           
            //SEND SMS
            /*
            $nohp   = $this->session->userdata('nohp');
	        $pesan  = "Yth Ibu ".$this->session->userdata('namaibu').", pendaftaran account sukses. Untuk dapat melanjutkan proses pendaftaran silakan membayar biaya pendaftaran sebesar Rp. 275.".$this->session->userdata('kd_unik')." dengan Transfer ke Bank Muamalat a.n. ARI PUSPITOWATI, SPD Nomor Rekening : 5210072901";
	        $response = sendsms($nohp, $pesan);
            */
            ?>
            <a href="" class="btn btn-primary"> Cetak Kartu Akun</a>
            
            </div>
        </div>
        <hr />
    </div>
</div>