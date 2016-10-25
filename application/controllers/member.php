<?php defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Marsono Saputro
 * @copyright 2014
 **/ 

class Member extends CI_Controller 
{
   function __construct()
   {
       parent::__construct();
       $this->load->model('formulir_mdl', 'formulir', true);
       $this->load->model('pendaftaran_mdl', 'pendaftaran', true);
       $this->load->model('Member_mdl', 'member', true);
       $this->load->library('form_validation');
       $this->load->library('fpdf');
       require_once(APPPATH.'libraries/apifunction.php');
   }
   
   function valid_login()
   {
        if($this->session->userdata('member') != 'aktif')
        {
            $this->login();
        }
   }
    
   function index()
   {
       if($this->session->userdata('member') == 'aktif')
       {
            $this->requestPendaftaran();
       }
       else
       {
            $this->login();
       }
   }
   
   function login()
   {
       $this->load->helper('captcha');
        $vals = array(
                'word'       => random_string('numeric', 4),
                'img_path'	 => './captcha/',
                'img_url'	 => base_url().'captcha/',
                'font_path'  => './system/fonts/impact.ttf',
                'img_width'	 => '100',
                'img_height' => 36,
                'border'     => 0, 
                'expiration' => 7200
            );
       $cap = create_captcha($vals);
       $this->session->set_userdata('captcha_login', $cap['word']);
       $data['image']  = $cap['image'];
       $data['sidebar'] = 'sidebar';
       $data['main']    = 'login';
       $this->load->view('template', $data);
   }

   public function requestPendaftaran($value='')
   {
          $data['main']    = 'member/request_pendaftaran';
          $data['sidebar'] = 'sidebar';
          $data['ayah'] = $this->member->view_dataayah();
          $data['ibu']  = $this->member->view_dataibu();
        
          $this->load->view('template', $data);
   }
   
   
   
   function member_aktif()
   {
       if($this->session->userdata('member') == 'aktif')
       {
          //print_r($this->session->userdata);exit();
          $data = $this->formulir->form_datasiswa($this->session->userdata('id_siswa'));
          $data['siswa']= $this->formulir->data_siswa($this->session->userdata('id_siswa'));
          $data['ayah'] = $this->member->view_dataayah();
          $data['ibu']  = $this->member->view_dataibu();
          $data['alamat'] = $this->member->view_dataalamat();
          $data['sdr']  = $this->member->view_datasaudara();
          $data['biaya']= $this->member->view_databiaya();
          $data['tgl']  = $this->pendaftaran->tanggal();
          $data['bln']  = $this->pendaftaran->bulan();
          $data['thn']  = $this->pendaftaran->tahun();
          $data['klmn'] = $this->pendaftaran->jenis_kelamin();
        
          $data['main']    = 'member/member';
          $data['sidebar'] = 'sidebar';
        
          $this->load->view('template', $data);
        }
        else
        {
            $this->login();
        }
   }
   
   function data_siswa()
   {
       if($this->session->userdata('member') == 'aktif')
       {
          $data = $this->formulir->form_datasiswa($this->session->userdata('id_siswa'));
          $data['siswa']= $this->formulir->data_siswa($this->session->userdata('id_siswa'));
          $data['tgl']  = $this->pendaftaran->tanggal();
          $data['bln']  = $this->pendaftaran->bulan();
          $data['thn']  = $this->pendaftaran->tahun();
          $data['klmn'] = $this->pendaftaran->jenis_kelamin();
          $data['sidebar']= 'sidebar';
          $data['main'] = 'member/data_siswa';
          $this->load->view('template', $data);
       } 
       else
       {
          $this->login();
       }
       
   }
   
   function update_datasiswa()
   {
        $rules = $this->formulir->validasi_datasiswa();
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == false)
        {
            $this->data_siswa();
        }
        else
        {
            $this->member->update_datasiswa();
            redirect(site_url().'member/data_siswa');
        }
   }
   
   function data_ayah()
   {
       if($this->session->userdata('member') == 'aktif')
       {
          $data = $this->formulir->form_dataortu($this->session->userdata('id_akun'), 'data_ayah');
          $data['ayah'] = $this->formulir->data_ortu($this->session->userdata('id_akun'), 'data_ayah');
          $data['tgl']  = $this->pendaftaran->tanggal();
          $data['bln']  = $this->pendaftaran->bulan();
          $data['thn']  = $this->member->tahun();
          $data['gaji'] = $this->member->opsi_gaji();
          $data['gj']   = $this->member->view_dataayah();
          $data['pdk']  = $this->member->opsi_pendidikan();
          $data['sidebar']= 'sidebar';
          $data['main'] = 'member/data_ayah';
          $this->load->view('template', $data);
        }
        else
        {
            $this->login();
        }
   }
   
   function update_dataayah()
   {
        $rules = $this->formulir->validasi_dataortu();
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == false)
        {
            $this->data_ayah();
        }
        else
        {
            $this->member->update_dataortu('data_ayah');
            redirect(site_url().'member/data_ayah');
        }
   }
   
   function data_ibu()
   {
       if($this->session->userdata('member') == 'aktif')
       {
          $data = $this->formulir->form_dataortu($this->session->userdata('id_akun'), 'data_ibu');
          $data['ayah'] = $this->formulir->data_ortu($this->session->userdata('id_akun'), 'data_ibu');
          $data['tgl']  = $this->pendaftaran->tanggal();
          $data['bln']  = $this->pendaftaran->bulan();
          $data['thn']  = $this->member->tahun();
          $data['gaji'] = $this->member->opsi_gaji();
          $data['gj']   = $this->member->view_dataibu();
          $data['pdk']  = $this->member->opsi_pendidikan();
          $data['sidebar']= 'sidebar';
          $data['main'] = 'member/data_ibu';
          $this->load->view('template', $data);
        }
        else
        {
            $this->login();
        }
   }
   
   function update_dataibu()
   {
        $rules = $this->formulir->validasi_dataortu();
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == false)
        {
            $this->data_ibu();
        }
        else
        {
            $this->member->update_dataortu('data_ibu');
            redirect(site_url().'member/data_ibu');
        }
   }
   
   function data_alamat()
   {
       if($this->session->userdata('member') == 'aktif')
       {
          $data = $this->formulir->form_dataalamat($this->session->userdata('id_akun'));
          $data['transport'] = $this->member->opsi_transport();
          $data['trans'] = $this->member->view_dataalamat();
          $data['sidebar']= 'sidebar';
          $data['main']   = 'member/data_alamat';
          $this->load->view('template', $data);
        }
        else
        {
            $this->login();
        }
   }
   
   function update_dataalamat()
   {
        $rules = $this->formulir->validasi_dataalamat();
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == false)
        {
            $this->data_alamat();
        }
        else
        {
            $this->member->update_dataalamat();
            redirect(site_url().'member/data_alamat');   
        }
   }

   function data_anak()
   {
       if($this->session->userdata('member') == 'aktif')
       {
          

          $data = $this->formulir->form_dataanak();
          $data['dataAnak'] = $this->member->get_anak();
          $data['tgl']  = $this->pendaftaran->tanggal();
          $data['bln']  = $this->pendaftaran->bulan();
          $data['thn']  = $this->member->tahun();
          $data['val']  = "Tambah";
          $data['sidebar'] = 'sidebar';
          $data['main']    = 'member/data_anak';
          $this->load->view('template', $data);
        }
        else
        {
          $this->login();
        }
   }

  function ubah_anak($id)
   {
       if($this->session->userdata('member') == 'aktif')
       {
          

          $data = $this->formulir->form_dataanak();
          $data['dataAnak'] = $this->member->get_anak();
          $data['detailAnak'] = $this->member->get_id_anak($id);
          $data['tgl']  = $this->pendaftaran->tanggal();
          $data['bln']  = $this->pendaftaran->bulan();
          $data['thn']  = $this->member->tahun();
          $data['val']  = "Simpan";
          $data['sidebar'] = 'sidebar';
          $data['main']    = 'member/data_anak';
          $this->load->view('template', $data);
        }
        else
        {
          $this->login();
        }
   }

   function finalisasi()
   {
       if($this->session->userdata('member') == 'aktif')
       {
          

          $data = $this->formulir->form_dataanak();
          $data['dataAnak'] = $this->member->get_anak_aju("");
          $data['sidebar'] = 'sidebar';
          $data['main']    = 'member/ajuan_finalisasi';
          $this->load->view('template', $data);
        }
        else
        {
          $this->login();
        }
   }

   function finals($id)
   {
       if($this->session->userdata('member') == 'aktif')
       {
          
          $data = array('is_finalisasi'=> 1);
          $this->db->where('id_siswa', $id);
          $this->db->update('data_siswa',$data);
          $this->session->set_flashdata('aju_anak', 'Finalisasi Ajuan Siswa Berhasil');
          redirect('member/finalisasi');
        }
        else
        {
          $this->login();
        }
   }

   function ajukan()
   {
       if($this->session->userdata('member') == 'aktif')
       {
          

          $data = $this->formulir->form_dataanak();
          $data['dataAnak'] = $this->member->get_anak_aju("LEFT");
          $data['tgl']  = $this->pendaftaran->tanggal();
          $data['bln']  = $this->pendaftaran->bulan();
          $data['thn']  = $this->member->tahun();
          $data['sidebar'] = 'sidebar';
          $data['main']    = 'member/ajuan_pendaftaran';
          $this->load->view('template', $data);
        }
        else
        {
          $this->login();
        }
   }

   function ajukan_anak($id)
   {
       if($this->session->userdata('member') == 'aktif')
       {
          $c = $this->validasi_anak($id);
          if($c){
            $periode = $this->formulir->get_periode_aktif();
            $kode = $this->formulir->get_kode_aktif();
            $data = array(
                'id_anak' => $id,
                'id_periode_pendaftaran'  => $periode->id_data_periode,
                'kd_unik' =>  $kode->kd_unik,
              );
            $this->db->insert('data_siswa', $data);
            $kd = array('IS_DIGUNAKAN'=>1);
            $this->db->where('kd_unik', $kode->kd_unik);
            $this->db->update('kd_unik',$kd);

            $this->session->set_flashdata('aju_anak', 'Penambahan Ajuan Siswa Berhasil');
            redirect('member/ajukan');
          }else{
            redirect('member/ajukan');
          }
          
        }
        else
        {
          $this->login();
        }
   }

   function update_dataanak($id)
   {
        $this->form_validation->set_rules($this->formulir->validasi_dataanak());
        if($this->form_validation->run() == false)
        {
            $this->data_anak();
        }
        else
        {
          $c = $this->input->post('submit');
          $id = $this->input->post('id');

          if($c=='Simpan'){
            //echo $c." / ".$id;exit();
            $this->member->update_dataanak($id);
          }else{
            $this->member->tambah_dataanak();
          }
            
            redirect(site_url().'member/data_anak');
        }
   }
   
   function data_saudara()
   {
       if($this->session->userdata('member') == 'aktif')
       {
          $data = $this->formulir->form_datasaudara();
          $data['sidebar'] = 'sidebar';
          $data['main']    = 'member/data_saudara';
          $this->load->view('template', $data);
        }
        else
        {
          $this->login();
        }
   }
   
   function update_datasaudara()
   {
        $this->form_validation->set_rules($this->formulir->validasi_datasaudara());
        if($this->form_validation->run() == false)
        {
            $this->data_saudara();
        }
        else
        {
            $this->member->update_datasaudara();
            redirect(site_url().'member/data_saudara');
        }
   }
   
   function data_observasi()
   {
        $this->valid_login();
        $data['sidebar'] = 'sidebar';
        $data['main']    = 'member/data_observasi';
        $this->load->view('template', $data);
   }
   
   function data_wawancara()
   {
        $this->valid_login();
        $data['sidebar'] = 'sidebar';
        $data['main']    = 'member/data_wawancara';
        $this->load->view('template', $data);
   }
   
   function data_biaya()
   {
        if($this->session->userdata('member') == 'aktif')
        {
          $data['biaya']   = $this->member->view_databiaya();
          $data['sidebar'] = 'sidebar';
          $data['main']    = 'member/data_biaya';
          $this->load->view('template', $data);
        }
        else
        {
          $this->login();
        }
   }
   
   function update_databiaya()
   {
        $this->valid_login();
        $this->member->update_databiaya();
        redirect(site_url().'member/data_biaya');    
   }

   function kartu_observasi()
   {
      if($this->session->userdata('member') == 'aktif')
      {
        $data['siswa']= $this->formulir->data_siswa($this->session->userdata('id_siswa'));
        $this->load->view('member/kartu_observasi', $data);
      }
      else
      {
        $this->login();
      }
   }

   public function validasi_anak($id)
   {
     $anak = $this->db->get_where('data_anak', array('id_saudara'=>$id,'id_akun'=>$this->session->userdata('id_akun')))->row();
          $umur = umur($anak->tgl_lahir);
          if(($anak)&&(($umur>=6)&&($umur<8))){
            return true;
          }else{
            return false;
          }
   }

   
   function logout()
   {
        $this->session->sess_destroy();
        redirect(site_url());
   }
    
}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */