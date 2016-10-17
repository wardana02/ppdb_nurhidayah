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
            echo "<p>Yth. Ibu <b>".$this->session->userdata('namaibu')."</b>, pendaftaran account ananda <b>".$this->session->userdata('namalengkap')."</b> sukses. 
                 Untuk dapat melanjutkan proses pendaftaran silakan membayar biaya pendaftaran sebesar <b>Rp. 275.".$this->session->userdata('kd_unik').",-</b> 
                 dengan cara transfer ke rekening <b>Bank Muamalat</b> nomor rekening : <b>5210072901</b> a/n <b>ARI PUSPITOWATI, SPD</b>.</p>";
            echo "<p>Setelah melakukan pembayaran silakan konfirmasi dengan cara mengirim sms ke sms center <b>(0857 7819 1979)</b>
                 dengan format <b>\"@sditnh nama calon siswa#nama ibu#jumlah transfer\"</b>.</p>";
            echo "<p class='text-danger'>NB: Untuk memudahkan pengeceken kami, pastikan jumlah transfer sesuai dengan jumlah yang tercantum diatas.</p>";
            
            //SEND SMS
            $nohp   = $this->session->userdata('nohp');
	        $pesan  = "Yth Ibu ".$this->session->userdata('namaibu').", pendaftaran account sukses. Untuk dapat melanjutkan proses pendaftaran silakan membayar biaya pendaftaran sebesar Rp. 275.".$this->session->userdata('kd_unik')." dengan Transfer ke Bank Muamalat a.n. ARI PUSPITOWATI, SPD Nomor Rekening : 5210072901";
	        $response = sendsms($nohp, $pesan);
            ?>
            </div>
        </div>
        <hr />
    </div>
</div>