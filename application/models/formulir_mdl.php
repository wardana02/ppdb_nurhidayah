<?php if( !defined('BASEPATH')) exit('NO direct allowed');

/**
 * @author Marsono Saputro
 * @copyright 2014
 **/

class Formulir_mdl extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_periode_aktif()
    {
        $DATA = $this->db->query("SELECT * FROM data_periode p where p.tanggal_awal<=NOW() AND NOW()<=p.tanggal_akhir")->row();
        return $DATA;
    }

    function get_kode_aktif()
    {
        $DATA = $this->db->query("SELECT * FROM kd_unik p where p.IS_DIGUNAKAN=0 ORDER BY RAND() LIMIT 1")->row();
        return $DATA;
    }    
    
    function data_siswa($id_siswa)
    {
        echo "ID SISWA :> ".$id_siswa."<br>";
        $data = $this->db->query("SELECT * FROM data_siswa WHERE id_siswa='$id_siswa'")->row();
        //$data = $this->db->get_where('data_siswa', array('id_siswa'=>$id_siswa))->row();
        //print_r($data);exit();
        return $data;

    }
    
    function form_datasiswa($id_siswa)
    {
        $d = $this->data_siswa($id_siswa);
        $namalengkap = array('name'=>'namalengkap', 'value'=>$d->namalengkap, 'class'=>'form-control');
        $nik = array('name'=>'nik', 'value'=>$d->nik, 'class'=>'form-control');
        $namapanggilan = array('name'=>'namapanggilan', 'value'=>!empty($d->namapanggilan) ? $d->namapanggilan : $this->input->post('namapanggilan'), 'class'=>'form-control');
        $tempatlahir = array('name'=>'tempatlahir', 'value'=>$d->tempatlahir, 'class'=>'form-control');
        $tgllahir = array('name'=>'tgllahir', 'value'=>$d->tgllahir, 'class'=>'form-control');
        $namaibu = array('name'=>'namaibu', 'value'=>$d->namaibu, 'class'=>'form-control');
        $nohp = array('name'=>'nohp', 'value'=>$d->nohp, 'class'=>'form-control');
        $email = array('name'=>'email', 'value'=>$d->email, 'class'=>'form-control');
        $asalsekolah = array('name'=>'asalsekolah', 'value'=>$d->asalsekolah, 'class'=>'form-control');
        $alamatsekolah = array('name'=>'alamatsekolah', 'value'=>$d->alamatsekolah, 'class'=>'form-control');
        $bb = array('name'=>'bb', 'value'=>$d->bb, 'class'=>'form-control');
        $tb = array('name'=>'tb', 'value'=>$d->tb, 'class'=>'form-control');
        $jarak = array('name'=>'jarak', 'value'=>$d->jarak, 'class'=>'form-control');
        $km = array('name'=>'km', 'value'=>$d->km, 'class'=>'form-control');
        
        $r = array();
        $r['nik'] = $nik;
        $r['namalengkap'] = $namalengkap;
        $r['namapanggilan'] = $namapanggilan;
        $r['tempatlahir'] = $tempatlahir;
        $r['tgllahir'] = $tgllahir;
        $r['namaibu'] = $namaibu;
        $r['nohp'] = $nohp;
        $r['email'] = $email;
        $r['asalsekolah'] = $asalsekolah;
        $r['alamatsekolah'] = $alamatsekolah;
        $r['bb'] = $bb;
        $r['tb'] = $tb;
        $r['jarak'] = $jarak;
        $r['km'] = $km;
        
        return $r;
    }
    
    function validasi_datasiswa()
    {
        $validasi = array(array('field'=>'nik', 'label'=>'NIK', 'rules'=>'trim|numeric|min_length[12]|max_length[16]|xss_clean'),
                          array('field'=>'namalengkap', 'label'=>'Nama Lengkap', 'rules'=>'trim|required|xss_clean'),
                          array('field'=>'namapanggilan', 'label'=>'Nama Panggilan', 'rules'=>'trim|max_length[10]|xss_clean'),
                          array('field'=>'tempatlahir', 'label'=>'Tempat Lahir', 'rules'=>'trim|max_length[30]|xss_clean'),
                          array('field'=>'tanggal', 'label'=>'Tanggal Lahir', 'rules'=>'trim|required|xss_clean'),
                          array('field'=>'bulan', 'label'=>'Bulan Lahir', 'rules'=>'trim|required|xss_clean'),
                          array('field'=>'tahun', 'label'=>'Tahun Lahir', 'rules'=>'trim|required|xss_clean'),
                          array('field'=>'jenis_kelamin', 'label'=>'Jenis Kelamin', 'rules'=>'trim|required|xss_clean'),
                          array('field'=>'namaibu', 'label'=>'Nama Ibu', 'rules'=>'trim|required|max_length[100]|xss_clean'),
                          array('field'=>'nohp', 'label'=>'Nomor HP', 'rules'=>'trim|required|numeric|min_length[10]|max_length[14]|xss_clean'),
                          array('field'=>'email', 'label'=>'Alamat Email', 'rules'=>'trim|required|valid_email|xss_clean'),
                          array('field'=>'asalsekolah', 'label'=>'Asal Sekolah', 'rules'=>'trim|max_length[100]|xss_clean'),
                          array('field'=>'alamatsekolah', 'label'=>'Alamat Sekolah', 'rules'=>'trim|max_length[200]|xss_clean'),
                          array('field'=>'tb', 'label'=>'Tinggi Badan', 'rules'=>'trim|min_length[2]|numeric|xss_clean'),
                          array('field'=>'bb', 'label'=>'Berat Badan', 'rules'=>'trim|min_length[2]|numeric|xss_clean'),
                          array('field'=>'jarak', 'label'=>'Jarak', 'rules'=>'trim|min_length[1]|xss_clean'),
                          array('field'=>'km', 'label'=>'Jarak', 'rules'=>'trim|min_length[1]|numeric|xss_clean')
                          );
                          
        return $validasi;
    }
    
    function update_datasiswa()
    {
        
    }
    
/** ========= DATA ORTU ====================== **/    
    function data_ortu($id_siswa, $nama_tabel)
    {
        return $this->db->get_where($nama_tabel, array('id_akun'=>$id_siswa))->row();
    }
    
    function form_dataortu($id_siswa, $nama_tabel)
    {
        $d = $this->db->get_where($nama_tabel, array('id_akun'=>$id_siswa))->row();
        $nik = array('name'=>'nik', 'value'=>$d->nik, 'class'=>'form-control');
        $namalengkap = array('name'=>'namalengkap', 'value'=>$d->namalengkap, 'class'=>'form-control');
        $tempatlahir = array('name'=>'tempatlahir', 'value'=>$d->tempatlahir, 'class'=>'form-control');
        $tgllahir = array('name'=>'tgllahir', 'value'=>$d->tgllahir, 'class'=>'form-control');
        $pendidikan = array('name'=>'pendidikan', 'value'=>$d->pendidikan, 'class'=>'form-control');
        $pekerjaan = array('name'=>'pekerjaan', 'value'=>$d->pekerjaan, 'class'=>'form-control');
        $alamatkantor = array('name'=>'alamatkantor', 'value'=>$d->alamatkantor, 'class'=>'form-control');
        $jarakkekantor = array('name'=>'jarakkekantor', 'value'=>$d->jarakkekantor, 'class'=>'form-control');
        $nohp = array('name'=>'nohp', 'value'=>$d->nohp, 'class'=>'form-control');
        
        $r = array();
        $r['nik'] = $nik;
        $r['namalengkap'] = $namalengkap;
        $r['tempatlahir'] = $tempatlahir;
        $r['tgllahir'] = $tgllahir;
        $r['pendidikan'] = $pendidikan;
        $r['pekerjaan'] = $pekerjaan;
        $r['alamatkantor'] = $alamatkantor;
        $r['jarakkekantor'] = $jarakkekantor;
        $r['nohp'] = $nohp;
        
        
        return $r;
    }
    
    function validasi_dataortu()
    {
        $rules = array(array('field'=>'nik', 'label'=>'NIK', 'rules'=>'trim|numeric|min_length[12]|max_length[16]|xss_clean'),
                       array('field'=>'namalengkap', 'label'=>'Nama Lengkap', 'rules'=>'trim|max_length[100]|xss_clean'),
                       array('field'=>'tempatlahir', 'label'=>'Tempat Lahir', 'rules'=>'trim|max_length[30]|xss_clean'),
                       array('field'=>'tanggal', 'label'=>'Tanggal Lahir', 'rules'=>'trim|numeric|max_length[2]|xss_clean'),
                       array('field'=>'bulan', 'label'=>'Bulan Lahir', 'rules'=>'trim|max_length[2]|numeric|xss_clean'),
                       array('field'=>'tahun', 'label'=>'Tahun Lahir', 'rules'=>'trim|max_length[4]|numeric|xss_clean'),
                       array('field'=>'pendidikan', 'label'=>'Pendidikan', 'rules'=>'trim|max_length[100]|xss_clean'),
                       array('field'=>'pekerjaan', 'label'=>'Pekerjaan', 'rules'=>'trim|max_length[150]|xss_clean'),
                       array('field'=>'alamatkantor', 'label'=>'Alamat Kantor', 'rules'=>'trim|max_length[150]|xss_clean'),
                       array('field'=>'jarakkekantor', 'label'=>'Jarak ke Kantor', 'rules'=>'trim|max_length[50]|xss_clean'),
                       array('field'=>'nohp', 'label'=>'Nomor HP', 'rules'=>'trim|numeric|min_length[10]|max_length[15]xss_clean'));
        return $rules;
    }

/** =============== DATA ALAMAT ================ **/    
    function form_dataalamat($id_akun)
    {
        $d = $this->db->get_where('data_alamat', array('id_akun'=>$id_akun))->row();
        $dusun = array('name'=>'dusun', 'value'=>$d->dusun, 'class'=>'form-control');
        $rt    = array('name'=>'rt', 'value'=>$d->rt, 'class'=>'form-control');
        $rw    = array('name'=>'rw', 'value'=>$d->rw, 'class'=>'form-control');
        $desa  = array('name'=>'desa', 'value'=>$d->desa, 'class'=>'form-control');
        $kec   = array('name'=>'kecamatan', 'value'=>$d->kecamatan, 'class'=>'form-control');
        $kab   = array('name'=>'kabupaten', 'value'=>$d->kabupaten, 'class'=>'form-control');
        $status= array('name'=>'statusrumah', 'value'=>$d->statusrumah, 'class'=>'form-control');
        $jarak = array('name'=>'jarakkesekolah', 'value'=>$d->jarakkesekolah, 'class'=>'form-control');
        $tlp   = array('name'=>'tlp', 'value'=>$d->tlp, 'class'=>'form-control'); 
        
        $r = array();
        $r['dusun'] = $dusun;
        $r['rt']    = $rt;
        $r['rw']    = $rw;
        $r['desa']  = $desa;
        $r['kec']   = $kec;
        $r['kab']   = $kab;
        $r['status']= $status;
        $r['jarak'] = $jarak;
        $r['tlp']   = $tlp;
        
        return $r;
    }
    
    function validasi_dataalamat()
    {
        $val = array(array('field'=>'dusun', 'label'=>'Dusun', 'rules'=>'trim|min_length[3]|xss_clean'),
                     array('field'=>'rt', 'label'=>'RT', 'rules'=>'trim|max_length[3]|numeric|xss_clean'),
                     array('field'=>'rw', 'label'=>'RW', 'rules'=>'trim|max_length[3]|numeric|xss_clean'),
                     array('field'=>'desa', 'label'=>'Desa / Kelurahan', 'rules'=>'trim|max_length[30]|xss_clean'),
                     array('field'=>'kecamatan', 'label'=>'Kecamatan', 'rules'=>'trim|max_length[30]|xss_clean'),
                     array('field'=>'kabupaten', 'label'=>'Kabupaten / Kota', 'rules'=>'trim|max_length[30]|xss_clean'),
                     array('field'=>'statusrumah', 'label'=>'Status Rumah', 'rules'=>'trim|max_length[30]|xss_clean'),
                     array('field'=>'jarakkesekolah', 'label'=>'Jarak ke sekolah', 'rules'=>'trim|max_length[3]|numeric|xss_clean'),
                     array('field'=>'tlp', 'label'=>'Tlp rumah', 'rules'=>'trim|max_length[15]|min_length[6]|numeric|xss_clean'),
                     );
        return $val;
    }
    
/** =============DATA SAUDARA ===================== **/
    function form_datasaudara()
    {
        $nama    = array('name'=>'namalengkap', 'value'=>$this->input->post('namalengkap'), 'class'=>'form-control');
        $kelamin = array('name'=>'kelamin', 'value'=>$this->input->post('kelamin'), 'class'=>'form-control');
        $ttl     = array('name'=>'ttl', 'value'=>$this->input->post('ttl'), 'class'=>'form-control');
        $sekolah = array('name'=>'sekolah', 'value'=>$this->input->post('sekolah'), 'class'=>'form-control');
        $keterangan = array('name'=>'keterangan', 'value'=>$this->input->post('keterangan'), 'class'=>'form-control');
        
        $r = array();
        $r['nama']       = $nama;
        $r['kelamin']    = $kelamin;
        $r['ttl']        = $ttl;
        $r['sekolah']    = $sekolah;
        $r['keterangan'] = $keterangan;
        
        return $r;
    }
    
    function validasi_datasaudara()
    {
        $val = array(array('field'=>'namalengkap', 'label'=>'Nama Lengkap', 'rules'=>'trim|required|max_length[50]|xss_clean'),
                     array('field'=>'kelamin', 'label'=>'Jenis Kelamin', 'rules'=>'trim|required|max_length[10]|xss_clean'),
                     array('field'=>'ttl', 'label'=>'TTL', 'rules'=>'trim|required|max_length[50]|xss_clean'),
                     array('field'=>'sekolah', 'label'=>'Sekolah', 'rules'=>'trim|required|max_length[50]|xss_clean'),
                     array('field'=>'keterangan', 'label'=>'Keterangan', 'rules'=>'trim|required|max_length[100]|xss_clean'));
        return $val;
    }

    /** =============DATA SAUDARA ===================== **/
    function form_dataanak()
    {
        $nama    = array('name'=>'namalengkap', 'value'=>$this->input->post('namalengkap'), 'class'=>'form-control');
        $kelamin = array('name'=>'kelamin', 'value'=>$this->input->post('kelamin'), 'class'=>'form-control');
        $ttl     = array('name'=>'ttl', 'value'=>$this->input->post('ttl'), 'class'=>'form-control');
        $sekolah = array('name'=>'sekolah', 'value'=>$this->input->post('sekolah'), 'class'=>'form-control');
        $keterangan = array('name'=>'keterangan', 'value'=>$this->input->post('keterangan'), 'class'=>'form-control');
        
        $r = array();
        $r['nama']       = $nama;
        $r['kelamin']    = $kelamin;
        $r['ttl']        = $ttl;
        $r['sekolah']    = $sekolah;
        $r['keterangan'] = $keterangan;
        
        return $r;
    }
    
    function validasi_dataanak()
    {
        $val = array(array('field'=>'namalengkap', 'label'=>'Nama Lengkap', 'rules'=>'trim|required|max_length[50]|xss_clean'),
                     array('field'=>'kelamin', 'label'=>'Jenis Kelamin', 'rules'=>'trim|required|max_length[10]|xss_clean'),
                     array('field'=>'ttl', 'label'=>'TTL', 'rules'=>'trim|required|max_length[50]|xss_clean'),
                     array('field'=>'sekolah', 'label'=>'Sekolah', 'rules'=>'trim|required|max_length[50]|xss_clean'),
                     array('field'=>'keterangan', 'label'=>'Keterangan', 'rules'=>'trim|required|max_length[100]|xss_clean'));
        return $val;
    }
}