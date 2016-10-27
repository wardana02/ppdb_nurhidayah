<?php defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Marsono Saputro
 * @copyright 2014
 **/ 
 
class Management_mdl extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }   
    
    function get_statis()
    {
        return $this->db->get('halamanstatis')->result();
    }
    
    function simpan_statis()
    {
        //UPLOAD IMAGE
        $config['upload_path']   = 'assets/images';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']      = '500';
        $config['max_width']     = '1000';
        $config['max_height']    = '500';
        
        $this->load->library('upload', $config);
        if( ! $this->upload->do_upload('gambar'))
        {
            $data = array('judul'=>$this->input->post('judul'),
                          'isi_halaman'=>$this->input->post('isi_halaman'),
                          'tgl_posting'=>date('Y-m-d'));
            $this->db->insert('halamanstatis', $data);
        }
        else
        {
            $data_upload = $this->upload->data();
            $data = array('judul'=>$this->input->post('judul'),
                          'isi_halaman'=>$this->input->post('isi_halaman'),
                          'tgl_posting'=>date('Y-m-d'),
                          'gambar'=>$data_upload['file_name']);
            $this->db->insert('halamanstatis', $data);
        }
    }
    
    function simpan_edit_statis()
    {
        //UPLOAD IMAGE
        $config['upload_path']   = 'assets/images';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']      = '500';
        $config['max_width']     = '1000';
        $config['max_height']    = '500';
        
        $this->load->library('upload', $config);
        if( ! $this->upload->do_upload('gambar'))
        {
            $data = array('judul'=>$this->input->post('judul'),
                          'isi_halaman'=>$this->input->post('isi_halaman'),
                          'tgl_posting'=>date('Y-m-d'));
            $this->db->where('id_halaman', $this->input->post('id_halaman'));
            $this->db->update('halamanstatis', $data);
        }
        else
        {
            unlink('assets/images/'.$this->input->post('file_gambar'));
            $data_upload = $this->upload->data();
            $data = array('judul'=>$this->input->post('judul'),
                          'isi_halaman'=>$this->input->post('isi_halaman'),
                          'tgl_posting'=>date('Y-m-d'),
                          'gambar'=>$data_upload['file_name']);
            $this->db->where('id_halaman', $this->input->post('id_halaman'));
            $this->db->update('halamanstatis', $data);
        }
    }
    
    function hapus_gambar_statis($gambar)
    {
        return unlink('assets/images/'.$gambar);
    }
    
    function hapus_statis($id)
    {
        return $this->db->delete('halamanstatis', array('id_halaman'=>$id));
    }
    
    function edit_statis($id)
    {
        return $this->db->get_where('halamanstatis', array('id_halaman'=>$id))->row();
    }
    
    function get_nohp()
    {
        $this->db->select('namalengkap, namaIbu, nohp, kd_unik');
        $d = $this->db->get('data_account')->result();
        $x[''] = '';
        foreach($d as $r)
        {
            $x[$r->nohp] = $r->namalengkap.' | '.$r->namaIbu;
        }
        return $x;
    }
    
    function total_account()
    {
        return $this->db->get('data_account')->num_rows();
    }
    
    function view_account2($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('data_account')->result();
    }

        function view_account($limit, $offset)
    {
        return $this->db->query("select a.kelamin,s.kd_unik,s.tgl_daftar,id_siswa,a.namalengkap,a.kelamin,i.namalengkap namaibu,c.nohp from data_siswa s 
        join data_anak a on s.id_anak=a.id_saudara
        JOIN data_ibu i on a.id_akun=i.id_akun 
        JOIN data_account c on a.id_akun=c.id_account where is_finalisasi='1' LIMIT ".$limit." OFFSET ".$offset."")->result();
    }
    
    function view_data_account($id)
    {
        return $this->db->get_where('data_account', array('id_account'=>$id))->row();
    }
    
    function create_id($kelamin)
    {
        $count = $this->db->get_where('data_siswa', array('kelamin'=>$kelamin))->num_rows();
        return $kelamin.'-'.sprintf("%03s", ($count + 1));
    }
    
    function password($tgl)
    {
        $p = explode("-", $tgl);
        return 'ppdb'.$p[0].$p[2];
    }
    
    function aktifasi($id)
    {
        $data = array('is_finalisasi'=>'2',
                      'tgl_verifikasi'=>date('Y-m-d H:i:s')
                      );
        $biaya = array('id_siswa'=> $id);
        $this->db->trans_start();
        $this->db->where('id_siswa', $id);
        $this->db->update('data_siswa', $data);
        $this->db->insert('data_biaya', $biaya);
        $this->db->trans_complete();
        $this->session->set_userdata($data);
        $this->session->set_flashdata('sukses', 'Verifikasi pengajuan siswa a.n'.$r->namalengkap.' berhasil');
    }
    
    function delete_account($id)
    {
        return $this->db->delete('data_siswa', array('id_siswa'=>$id));
    }
    
    function send_email()
    {
        $kepada = $this->session->userdata('email');
        $judul="Konfirmasi Aktivasi Pendaftaran";
        $dari = "From: sdit@nurhidayah.sch.id \n";
        $dari.= "Content-type: text/html \r\n";
        $pesan="<b><i>Assalamualaikum wr. wb. </i></b> <br />
                Yth. Ibu <b>".$this->session->userdata('namaibu')."</b>  <br />
                Terima kasih atas kepercayaannya mendaftarkan putra-putri Ibu <b>".$this->session->userdata('namaibu')."</b> di Sekolah kami.<br /><br />
    
                Email ini menginformasikan bahwa:
                <ul>
                    <li>Pembayaran / transfer Ibu ".$this->session->userdata('namaibu')." berhasil</li>
                    <li>Account pendaftaran Ibu ".$this->session->userdata('namaibu')." sudah kami Aktifkan</li>
                </ul>
    
                Untuk selanjutnya silakan melengkapi pendaftaran putra/putri Ibu dengan cara login terlebih dahulu ke system
                PPDB Online SDIT Nur Hidayah dan Login dengan username dan password di bawah ini:
                <table>
                <tr><td><b>Username</b></td> <td><b> : ".$this->session->userdata('username')."</b></td></tr>
                <tr><td><b>Password</b></td> <td><b> : ".$this->password($this->session->userdata('tgllahir'))."</b></td></tr>
                </table>

                Demikian konfirmasi pendaftaran dari kami, jika pesan ini sudah tidak di perlukan, silakan untuk dihapus.<br><br><br>
                <b><i>Wassalamualaikum wr. wb. </i></b>
                Hormat Kami<br><br><br>

                Panitia PPDB SDIT Nur Hidayah<br>
                Tahun Ajaran 2015/2016<br>
                <small>admin: marsonosaputro@gmail.com </small>";
        mail($kepada,$judul,$pesan,$dari);
    }
    
    function data_pendaftar($limit, $offset)
    {
        return $this->db->query("select id_siswa,a.namalengkap,a.kelamin,i.namalengkap namaibu,c.nohp from data_siswa s 
        join data_anak a on s.id_anak=a.id_saudara
        JOIN data_ibu i on a.id_akun=i.id_akun 
        JOIN data_account c on a.id_akun=c.id_account where is_finalisasi='2' LIMIT ".$limit." OFFSET ".$offset."")->result();
    }
    
    function simpan_slide()
    {
        //UPLOAD IMAGE
        $config['upload_path']   = 'assets/images/slideshow';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']      = '500';
        $config['max_width']     = '1000';
        $config['max_height']    = '500';
        
        $this->load->library('upload', $config);
        if( $this->upload->do_upload('gambar'))
        {
            $data_upload = $this->upload->data();
            $data = array('gambar'=>$data_upload['file_name']);
            $this->db->insert('slideshow', $data);
            $this->session->set_flashdata('sukses', 'Upload Gambar Sukses!');
        }
        else
        {
            $this->session->set_flashdata('pesan', 'Upload gambar gagal, silakan diulangi!');
        }
    }
    
    function view_slide($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $this->db->order_by('id', 'DESC');
        return $this->db->get('slideshow')->result();
    }
    
    function delete_slide($id)
    {
        $r = $this->db->get_where('slideshow', array('id'=>$id))->row();
        if(!empty($r->gambar))
        {
            $del = unlink('assets/images/slideshow/'.$r->gambar);
            if($del)
            {
                $this->session->set_flashdata('sukses', 'Gambar berhasil dihapus...');
                $this->db->delete('slideshow', array('id'=>$id));
            }
            else
            {
                $this->session->set_flashdata('gagal', 'Gagal menghapus gambar');
            }  
        }
    }
    
    function update_slide_status($id)
    {
        $r = $this->db->get_where('slideshow', array('id'=>$id))->row();
        $d = $r->status == '1' ? '0' : '1';
        $total = $this->db->count_all_results('slideshow');
        if($total > 1)
        {
            $data = array('status'=>$d);
            $this->db->where('id', $id);
            $this->db->update('slideshow', $data);
            $ket = $d =='1' ? 'diaktifkan' : 'dinonaktifkan';
            $this->session->set_flashdata('sukses', 'Gambar slide berhasil di '.$ket);
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Gambar Slideshow gagal di'.$ket);
        }
        
    }

    function data_blm_aktivasi()
    {
        return $this->db->get('data_account')->result();
    }

    function data_sdh_aktivasi()
    {
        return $this->db->get('data_siswa')->result();
    }
}