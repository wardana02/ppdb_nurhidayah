<?php if(!defined('BASEPATH')) exit('NOT ALLOWED');

/**
 * @author Marsono Saputro
 * @copyright 2014
 */

class Member_mdl extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function cek_data_login($username, $password)
    {
        return $this->db->get_where('data_siswa', array('username'=>$username, 'password'=>$password))->row();
    }
    
    public function cek_username($username)
    {
        return $this->db->get_where('data_siswa', array('username'=>$username))->num_rows();
    }
    
    public function cek_password($password)
    {
        return $this->db->get_where('data_siswa', array('password'=>$password))->num_rows();
    }
    
    function view_datasiswa()
    {
        return $this->db->get_where('data_siswa', array('id_siswa'=>$this->session->userdata('id_siswa')))->row();
    }
    
    function view_dataayah()
    {
        return $this->db->get_where('data_ayah', array('id_akun'=>$this->session->userdata('id_akun')))->row();
    }
    
    function view_dataibu()
    {
        return $this->db->get_where('data_ibu', array('id_akun'=>$this->session->userdata('id_akun')))->row();
    }
    
    function view_dataalamat()
    {
        return $this->db->get_where('data_alamat', array('id_akun'=>$this->session->userdata('id_akun')))->row();
    }
    
    function view_datasaudara()
    {
        return $this->db->get_where('data_saudara', array('id_siswa'=>$this->session->userdata('id_siswa')))->result();
    }
    
    function view_databiaya()
    {
        return $this->db->get_where('data_biaya', array('id_siswa'=>$this->session->userdata('id_siswa')))->row();
    }

    function get_anak()
    {
        return $this->db->get_where('data_anak', array('id_akun'=>$this->session->userdata('id_akun')))->result();
    }

    function get_jml_aju()
    {
        $id = $this->session->userdata('id_akun');
        $DATA = $this->db->query("SELECT count(a.namalengkap) as jml FROM data_anak a join data_siswa s on a.id_saudara=s.id_anak WHERE id_akun='$id'")->row();
        return $DATA;
    }

    function get_anak_aju($j)
    {
        $id = $this->session->userdata('id_akun');
        $DATA = $this->db->query("SELECT id_siswa,is_finalisasi,a.id_saudara,a.namalengkap,a.kelamin,a.tgl_lahir,s.kd_unik FROM data_anak a ".$j." join data_siswa s on a.id_saudara=s.id_anak WHERE id_akun='$id'")->result();
        return $DATA;
    }

    function get_id_anak($id)
    {
        return $this->db->get_where('data_anak', array('id_saudara'=>$id))->row();
    }

    function tahun()
    {
        $thn[''] = 'thn';
        for($i='1970'; $i<=date("Y"); $i++)
        {
            $thn[$i] = $i;
        }
        return $thn;
    }
    
    function hapus_foto()
    {
        $foto = $this->db->query("SELECT foto FROM data_siswa WHERE id_siswa='".$this->session->userdata('id_siswa')."'")->row();
        return unlink('foto/'.$foto->foto);
    }
    
    function uang($uang)
    {
        $x = str_replace(',','',$uang);
        return str_replace('.','',$x);
    }
    
    function opsi_pendidikan()
    {
        $pendidikan = $this->db->get('opt_pendidikan')->result();
        $p = array();
        $p = '';
        foreach($pendidikan as $d)
        {
            $p[$d->keterangan] = $d->keterangan;
        }
        return $p;
    }
    
    function opsi_gaji()
    {
        $gaji = array(''=>'',
                      'kurang dari Rp. 500.000'=>'kurang dari Rp. 500.000',
                      'Rp. 500.000 - Rp. 999.999'=>'Rp. 500.000 - Rp. 999.999',
                      'Rp. 1.000.000 - Rp. 1.999.999'=>'Rp. 1.000.000 - Rp. 1.999.999',
                      'Rp. 2.000.000 - Rp. 4.999.999'=>'Rp. 2.000.000 - Rp. 4.999.999',
                      'Rp. 5.000.000 - Rp. 20.000.000'=>'Rp. 5.000.000 - Rp. 20.000.000',
                      'lebih dari Rp. 20.000.000'=>'lebih dari Rp. 20.000.000');
        return $gaji;
    }
    
    function opsi_transport()
    {
        $this->db->order_by('keterangan', 'ASC');
        $transport = $this->db->get('opt_transport')->result();
        $trans = array();
        $trans[''] = '';
        foreach($transport as $t)
        {
            $trans[$t->keterangan] = $t->keterangan;
        }
        return $trans;
    }
    
    public function update_datasiswa()
    {
        $thn = $this->input->post('tahun');
        $bln = $this->input->post('bulan');
        $tgl = $this->input->post('tanggal');
        
        //UPLOAD FOTO
        $config['upload_path']   = 'foto';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']      = '500';
        $config['max_width']     = '470';
        $config['max_height']    = '708';
        
        $this->load->library('upload', $config);
        if($this->upload->do_upload('foto'))
        {
            $dok = $this->upload->data();
            $data['upload_data'] = $dok;
            if($dok['file_name'])
            {
                $filedoks = $dok['file_name'];
            }
            
            $this->hapus_foto();
            $data = array('nik'=>$this->input->post('nik'),
                      'namalengkap'=>$this->input->post('namalengkap'),
                      'namapanggilan'=>$this->input->post('namapanggilan'),
                      'tempatlahir'=>$this->input->post('tempatlahir'),
                      'tgllahir'=>$thn.'-'.$bln.'-'.$tgl,
                      'namaibu'=>$this->input->post('namaibu'),
                      'email'=>$this->input->post('email'),
                      'asalsekolah'=>$this->input->post('asalsekolah'),
                      'alamatsekolah'=>$this->input->post('alamatsekolah'),
                      'bb'=>$this->input->post('bb'),
                      'tb'=>$this->input->post('tb'),
                      'jarak'=>$this->input->post('jarak'),
                      'km'=>$this->input->post('km'),
                      'kps'=>$this->input->post('kps1').'|'.$this->input->post('kps2'),
                      'foto'=>$filedoks);
            $this->db->where('id_siswa', $this->session->userdata('id_siswa'));
            $this->db->update('data_siswa', $data);
            $this->session->set_flashdata('update_siswa', 'Perubahan data berhasil disimpan');
        }
        else
        {
            $data = array('nik'=>$this->input->post('nik'),
                      'namalengkap'=>$this->input->post('namalengkap'),
                      'namapanggilan'=>$this->input->post('namapanggilan'),
                      'tempatlahir'=>$this->input->post('tempatlahir'),
                      'tgllahir'=>$thn.'-'.$bln.'-'.$tgl,
                      'namaibu'=>$this->input->post('namaibu'),
                      'email'=>$this->input->post('email'),
                      'asalsekolah'=>$this->input->post('asalsekolah'),
                      'alamatsekolah'=>$this->input->post('alamatsekolah'),
                      'bb'=>$this->input->post('bb'),
                      'tb'=>$this->input->post('tb'),
                      'jarak'=>$this->input->post('jarak'),
                      'km'=>$this->input->post('km'),
                      'kps'=>$this->input->post('kps1').'|'.$this->input->post('kps2'),);
            $this->db->where('id_siswa', $this->session->userdata('id_siswa'));
            $this->db->update('data_siswa', $data);
            $this->session->set_flashdata('update_siswa', 'Perubahan data berhasil disimpan');
        }
    } 
    
    function update_dataortu($namatable)
    {
        $data = array('nik'=>$this->input->post('nik'),
                      'namalengkap'=>$this->input->post('namalengkap'),
                      'tempatlahir'=>$this->input->post('tempatlahir'),
                      'tgllahir'=>$this->input->post('tahun').'-'.$this->input->post('bulan').'-'.$this->input->post('tanggal'),
                      'pendidikan'=>$this->input->post('pendidikan'),
                      'pekerjaan'=>$this->input->post('pekerjaan'),
                      'alamatkantor'=>$this->input->post('alamatkantor'),
                      'jarakkekantor'=>$this->input->post('jarakkekantor'),
                      'gaji'=>$this->input->post('gaji'),
                      'bacaanquran'=>$this->input->post('bacaanquran'),
                      'haji'=>$this->input->post('haji'),
                      'nohp'=>$this->input->post('nohp'));
        $this->db->where('id_akun', $this->session->userdata('id_akun'));
        $this->db->update($namatable, $data);
        $this->session->set_flashdata('update_ortu', 'Perubahan data berhasil disimpan');
    }
    
    function update_dataalamat()
    {
        $rmh = $this->input->post('statusrumah');
        $rmh2= $this->input->post('statusrumah2');
        
        $data = array('dusun'=>$this->input->post('dusun'),
                      'rt'=>$this->input->post('rt'),
                      'rw'=>$this->input->post('rw'),
                      'desa'=>$this->input->post('desa'),
                      'kecamatan'=>$this->input->post('kecamatan'),
                      'kabupaten'=>$this->input->post('kabupaten'),
                      'statusrumah'=>!empty($rmh2) ? $rmh2 : $rmh,
                      'jarakkesekolah'=>$this->input->post('jarakkesekolah'),
                      'tlp'=>$this->input->post('tlp'),
                      'transportasi'=>$this->input->post('transportasi'));
        $this->db->where('id_akun', $this->session->userdata('id_akun'));
        $this->db->update('data_alamat', $data);
        $this->session->set_flashdata('update_alamat', 'Perubahan data berhasil disimpan');
    }
    
    function update_datasaudara()
    {
        $data = array('id_akun'=>$this->session->userdata('id_akun'),
                      'namalengkap'=>$this->input->post('namalengkap'),
                      'kelamin'=>$this->input->post('kelamin'),
                      'tmp_lahir'=>$this->input->post('ttl'),
                      'tgl_lahir' =>  $this->input->post('tahun').'-'.$this->input->post('bulan').'-'.$this->input->post('tanggal'),
                      'sekolah'=>$this->input->post('sekolah'),
                      'keterangan'=>$this->input->post('keterangan'));
        $this->db->insert('data_saudara', $data);
        $this->session->set_flashdata('update_saudara', 'Perubahan data berhasil disimpan');
    }

    function tambah_dataanak()
    {
        $data = array('id_akun'=>$this->session->userdata('id_akun'),
                      'namalengkap'=>$this->input->post('namalengkap'),
                      'kelamin'=>$this->input->post('kelamin'),
                      'tmp_lahir'=>$this->input->post('ttl'),
                      'tgl_lahir' =>  $this->input->post('tahun').'-'.$this->input->post('bulan').'-'.$this->input->post('tanggal'),
                      'sekolah'=>$this->input->post('sekolah'),
                      'keterangan'=>$this->input->post('keterangan'));
        $this->db->insert('data_anak', $data);
        $this->session->set_flashdata('update_anak', 'Penambahan data berhasil disimpan');
    }

    function update_dataanak($id)
    {
        $data = array(
                      'namalengkap'=>$this->input->post('namalengkap'),
                      'kelamin'=>$this->input->post('kelamin'),
                      'tmp_lahir'=>$this->input->post('ttl'),
                      'tgl_lahir' =>  $this->input->post('tahun').'-'.$this->input->post('bulan').'-'.$this->input->post('tanggal'),
                      'sekolah'=>$this->input->post('sekolah'),
                      'keterangan'=>$this->input->post('keterangan'));
        $this->db->where('id_saudara', $id);
        $this->db->update('data_anak', $data);
        $this->session->set_flashdata('update_anak', 'Perubahan data berhasil disimpan');
    }
    
    function update_databiaya()
    {
        $spp1     = $this->input->post('spp');
        $spp2     = $this->uang($this->input->post('spp2'));
        $gedung1  = $this->input->post('gedung');
        $gedung2  = $this->uang($this->input->post('gedung2'));
        $grawadi1 = $this->input->post('grawadi');
        $grawadi2 = $this->uang($this->input->post('grawadi2'));
        
        $data = array('spp'=>!empty($spp2) ? $spp2 : $spp1,
                      'gedung'=>!empty($gedung2) ? $gedung2 : $gedung1,
                      'grawadi'=>!empty($grawadi2) ? $grawadi2 : $grawadi1);
        $this->db->where('id_siswa', $this->session->userdata('id_siswa'));
        $this->db->update('data_biaya', $data);
        $this->session->set_flashdata('update_biaya', 'Perubahan data berhasil disimpan');
    }
}