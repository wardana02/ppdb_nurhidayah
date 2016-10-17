<?php defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Marsono Saputro
 * @copyright 2014
 **/ 

class Pendaftaran extends CI_Controller 
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Pendaftaran_mdl', 'pendaftaran', true);
        $this->load->library('form_validation');
        require_once(APPPATH.'libraries/apifunction.php');
    }
	
    public function index()
    {
        $this->pendaftaran();
    }
    
    public function pendaftaran()
    {
        $data         = $this->pendaftaran->user_form();
        $data['tgl']  = $this->pendaftaran->tanggal();
        $data['bln']  = $this->pendaftaran->bulan();
        $data['thn']  = $this->pendaftaran->tahun();
        $data['klmn'] = $this->pendaftaran->jenis_kelamin();
        
        $this->load->helper('captcha');
        $vals = array(
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
        $data['main']   = 'public/pendaftaran';
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
        $rules = $this->pendaftaran->validasi();
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == false)
        {
            $this->pendaftaran();
        }
        else
        {
            $this->pendaftaran->simpan();
            redirect('pendaftaran/sukses');
        }
    }
    
    function sukses()
    {
        $this->pendaftaran->send_email();
        $data['main'] = 'public/pendaftaran_sukses';
        $data['sidebar']= 'sidebar';
        $this->load->view('template', $data);
    }
}

/* End of file Pendaftaran.php */
/* Location: ./application/controllers/Pendaftaran.php */