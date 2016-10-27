<?php if(!defined('BASEPATH')) exit('NOT ALLOWED');

/**
 * @author Marsono Saputro
 * @copyright 2014
 */

class Akun_mdl extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function tanggal()
    {
        $x[''] = 'tgl';
        for($i=1; $i<=31; $i++)
        {
            $x[$i] = $i;
        }
        return $x;
    }
    
    function bulan()
    {
        $x[''] = 'bln';
        $x['01'] = 'Januari';
        $x['02'] = 'Februari';
        $x['03'] = 'Maret';
        $x['04'] = 'April';
        $x['05'] = 'Mei';
        $x['06'] = 'Juni';
        $x['07'] = 'Juli';
        $x['08'] = 'Agustus';
        $x['09'] = 'September';
        $x['10'] = 'Oktober';
        $x['11'] = 'Nopember';
        $x['12'] = 'Desember';
        return $x;
    }
    
    function tahun()
    {
        $thn[''] = 'thn';
        for($i='2005'; $i<= '2009'; $i++)
        {
            $thn[$i] = $i;
        }
        return $thn;
    }
    
    function jenis_kelamin()
    {
        $x['']  = 'Jenis Kelamin';
        $x['L'] = 'Laki - laki';
        $x['P'] = 'Perempuan';
        return $x;
    }
    
    function user_form()
    {
        $namalengkap = array('name'=>'namalengkap', 'value'=>$this->input->post('namalengkap'), 'class'=>'form-control'); 
        $tanggal     = array('name'=>'tanggal', 'value'=>$this->input->post('tanggal'), 'class'=>'form-control');  
        $bulan       = array('name'=>'bulan', 'value'=>$this->input->post('bulan'), 'class'=>'form-control');
        $tahun       = array('name'=>'tahun', 'value'=>$this->input->post('tahun'), 'class'=>'form-control');
        $namaibu     = array('name'=>'namaibu', 'value'=>$this->input->post('namaibu'), 'class'=>'form-control');
        $nohp        = array('name'=>'nohp', 'value'=>$this->input->post('nohp'), 'class'=>'form-control');
        $email       = array('name'=>'email', 'value'=>$this->input->post('email'), 'class'=>'form-control');
        
        $r = array();
        $r['namalengkap'] = $namalengkap;
        $r['tanggal']     = $tanggal;
        $r['bulan']       = $bulan;
        $r['tahun']       = $tahun;
        $r['namaibu']     = $namaibu;
        $r['nohp']        = $nohp;
        $r['email']       = $email;
        
        return $r;
    }
    
    function validasi()
    {
        $validasi = array(
                        array('field'=>'nik', 'label'=>'NIK Orang Tua', 'rules'=>'trim|required|numeric|min_length[16]|max_length[16]|xss_clean'),
                        array('field'=>'namalengkap', 'label'=>'Nama Lengkap', 'rules'=>'trim|required|min_length[3]|xss_clean'),
                        array('field'=>'nohp', 'label'=>'Nomor HP', 'rules'=>'trim|required|numeric|min_length[10]|max_length[14]|xss_clean'),
                        array('field'=>'email', 'label'=>'Alamat Email', 'rules'=>'trim|required|valid_email|is_unique[data_account.email]|xss_clean'),
                        array('field'=>'security_code', 'label'=>'Kode Captcha', 'rules'=>'trim|required|callback_check_captcha')
                        );
                          
        return $validasi;
    }
    
    function tgl_lahir()
    {
        return $this->input->post('tahun').'-'.$this->input->post('bulan').'-'.$this->input->post('tanggal');
    }
    
    function cek_umur($tgl, $bln, $thn)
    {
        $y = date('Y');
        $m = date('m');
        $d = date('d');
 
        // kelahiran dijadikan dalam format tanggal semua
	    $lahir = $tgl + ($bln*30) + ($thn*365);
 
	    // sekarang dijadikan dalam format tanggal semua
	    $now = $d + ($m*30) + ($y*365);
 
	    // dari format tanggal jadikan tahun, bulan, hari
	    $tahun = ($now - $lahir) / 365;
	    $bulan = (($now - $lahir) % 365) / 30;
   	    $hari  = (($now - $lahir) % 365) % 30;	
    
        $umur_hari = $now - $lahir;
        //echo  'Usia anda sekarang '.floor($tahun).'th, '.floor($bulan).'bl, '.floor($hari).'hr <br />';
        //echo  'Usia anda sekarang '.$umur_hari.' hari <br />';
        
        return $umur_hari;	
    }
    
    function username($namalengkap, $tgl, $kdunik)
    {
        $x = str_replace(" ","",$namalengkap);
        $y = str_replace("'","",$x);
        $z = str_replace(".","",$y);
        $a = strtolower($z);
        $b = substr($a,0,5);
        $c = $kdunik;
        return $b.$tgl.$c;
    }
    
    function password2($thn, $tgl)
    {
        $secret    = "qpwoeiruty12345";
        $pass      = md5('ppdb'.$thn.$tgl);
        $password  = md5($pass.$secret.$pass);
        return $password;
    }

    function password($pass)
       {
            $secret    = "qpwoeiruty12345";
            $pass      = md5($pass);
            $password  = md5($pass.$secret.$pass);
            return $password;
       }
    
    function kd_unik()
    {
        $k = $this->db->query("SELECT * FROM kd_unik where IS_DIGUNAKAN=0 LIMIT 1")->row();
        return $k;
    }
    
    function simpan()
    {
        $uname = explode('@', $this->input->post('email'));
        $data = array('namalengkap'=>$this->input->post('namalengkap'),
                      'nik'=>$this->input->post('nik'),
                      'nohp'=>$this->input->post('nohp'),
                      'email'=>$this->input->post('email'),
                      'username'=>$uname[0],
                      'password'=>$this->password($this->input->post('nohp')),
                      'tgldaftar'=>date('Y-m-d H:i:s'),
                      'aktif'=> '1'
                      );

        $this->db->trans_start();
        $this->db->insert('data_account', $data);
        $id = $this->db->insert_id();
        $dataAyah = array('id_akun' => $id); $this->db->insert('data_ayah', $dataAyah);
        $dataIbu = array('id_akun' => $id); $this->db->insert('data_ibu', $dataIbu);
        $dataAlamat = array('id_akun' => $id); $this->db->insert('data_alamat', $dataAlamat);


        $this->db->trans_complete();

        $array = array(
            'd_username' => $this->input->post('email'),
            'd_password' => $this->input->post('nohp'),
            'namaAkun' => $this->input->post('namalengkap'),
            'id_siswa' => $id
            );
        
        $this->session->set_userdata( $array );

        return $data;
    }
    
    function send_email()
    {
        $kepada = $this->session->userdata('email');
        $judul="Konfirmasi Pendaftaran";
        $dari = "From: sdit@nurhidayah.sch.id \n";
        $dari.= "Content-type: text/html \r\n";
        $pesan="<b><i>Assalamualaikum wr. wb. </i></b> <br /><br />
        Yth. Ibu <b>".$this->session->userdata('namaibu')."</b>  <br />
        Terima kasih atas kepercayaan Ibu mendaftarkan putra-putrinya  di Sekolah kami.<br />
        Pendaftaran account Ibu sudah kami terima, selanjutnya kami akan mengaktifkan account tersebut setelah kami menerima bukti pembayaran Ibu.<br /><br />
    
        <h3>Cara mengaktifkan account: </h3>
        <ol>
            <li>Transfer ke <b>Bank Muamalat a.n. Ari Puspitowati qq SDIT Nur Hidayah Nomor Rekening : 5210072901 </b> </li>
            <li>Konfirmasi pembayaran Ibu dengan cara sms ke <b>Nomor SMS centre kami di 0857 7819 1979</b> dengan format <b>\"@sditnh nama calon siswa#nama ibu#jumlah transfer\" contoh:@sditnh Al Fatih#Sri rejeki#250.914</b> atau telephone ke sekolah kami. </li>
            <li>Tunggu beberapa saat untuk Aktivasi dari staff kami. Setelah Account Ibu di-Aktifkan, Ibu akan mendapatkan konfirmasi bahwa Account Ibu sudah aktif melalui email 
            dan sms dari kami. </li>        
        </ol>
    
        <h3>Rincian Pembayaran:</h3>
        <ul>
            <li>Biaya Pendaftaran Rp. 275.000,00</li>
            <li>Tambahan kode unik Rp. ".$this->session->userdata('kd_unik').",00</li>
            <li><b>Total yang harus dibayar Rp. 275.".$this->session->userdata('kd_unik').",-</b></li>
        </ul>

        Demikian konfirmasi pendaftaran dari kami, jika pesan ini sudah tidak di perlukan, silakan untuk dihapus.<br><br><br>
        <b><i>Wassalamualaikum wr. wb. </i></b><br />
        Hormat Kami<br><br><br>

        Panitia PPDB SDIT Nur Hidayah<br>
        Tahun Ajaran 2015/2016<br>
        <small>admin: marsonosaputro@gmail.com </small>";

        mail($kepada,$judul,$pesan,$dari);
    }
    
    function data()
    {
        return $this->db->get_where('data_pendaftar')->result();
    }
    
    
}