<?php defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Marsono Saputro
 * @copyright 2014
 **/ 

class Buatakun extends CI_Controller 
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Akun_mdl', 'akun', true);
        $this->load->library('form_validation');
        require_once(APPPATH.'libraries/apifunction.php');
    }
	
    public function index()
    {
        echo random_string('numeric', 3);
        $this->pendaftaran();
    }
    
    public function pendaftaran()
    {
        $data         = $this->akun->user_form();
        $data['tgl']  = $this->akun->tanggal();
        $data['bln']  = $this->akun->bulan();
        $data['thn']  = $this->akun->tahun();
        $data['klmn'] = $this->akun->jenis_kelamin();
        
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
        $this->session->set_userdata('mycaptcha', $cap['word']);
        $data['image']  = $cap['image'];
        $data['sidebar']= 'sidebar';
        $data['main']   = 'public/buatakun';
        $this->load->view('template', $data);
    }
    
    function check_captcha()
    {
        if($this->input->post('security_code') == $this->session->userdata('mycaptcha'))
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message('check_captcha', 'Kode yang dimasukkan salah, silakan masukkan kembali...!');
            return false;
        }
    }
    
    function simpan_pendaftaran()
    {
        $rules = $this->akun->validasi();
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == false)
        {
            $this->pendaftaran();
        }
        else
        {
            $this->akun->simpan();
            redirect('pendaftaran/sukses');
        }
    }
    
    function sukses()
    {
        $this->akun->send_email();
        $data['main'] = 'public/pendaftaran_sukses';
        $data['sidebar']= 'sidebar';
        $this->load->view('template', $data);
    }
}

/* End of file Pendaftaran.php */
/* Location: ./application/controllers/Pendaftaran.php */