<?php if(!defined('BASEPATH')) exit("NOT ALLOWED");

/**
 * @author Marsono Saputro
 * @copyright 2014
 */


class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_mdl', 'login', TRUE);
        $this->load->library('form_validation');  
        $this->load->library('session');      
    }
    
    function index()
    {
        if($this->session->userdata('login') == false)
        {
            $this->login();
        }
        else
        {
            redirect('home');   
        }
    }
    
    function login()
    {
        $this->load->helper('captcha');
        $vals = array(
                'img_path'   => './captcha/',
                'img_url'    => base_url().'captcha/',
                'font_path'  => './system/fonts/impact.ttf',
                'img_width'  => '100',
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
    
    function check_captcha_login()
   {
        if($this->input->post('mycaptcha') == $this->session->userdata('captcha_login'))
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message('check_captcha_login', 'Kode yang dimasukkan salah, silakan masukkan kembali...!');
            return false;
        }
   }
   
   function password($pass)
   {
        $secret    = "qpwoeiruty12345";
        $pass      = md5($pass);
        $password  = md5($pass.$secret.$pass);
        //echo $password;exit();
        return $password;
   }
   
   function cek_username()
   {
        $data = $this->login->cek_username($this->input->post('username'));
        if($data >= 1){
            return true;
        }else{
            $this->form_validation->set_message('cek_username', 'Username tidak valid');
            return false;
        }
   }
   
   function cek_password()
   {
        $data = $this->login->cek_password($this->password($this->input->post('password')));
        if($data >= 1){
            return true;
        }else{
            $this->form_validation->set_message('cek_password', 'Password tidak valid');
            return false;
        }
   }
    
   function cek_login()
   {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_cek_username');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_cek_password');
        //$this->form_validation->set_rules('mycaptcha', 'Kode Validasi', 'trim|required|callback_check_captcha_login');
        if($this->form_validation->run() == FALSE)
        {
            $this->login();
        }
        else
        {
            
           $d = $this->db->get_where('data_siswa', array('username'=>$this->input->post('username')))->row();
            
            $data_sess = array('login'      => TRUE,
                               'member'     => 'aktif',
                               'id_siswa'   => $d->id_siswa,
                               'namalengkap'=> $d->namalengkap,
                               'kelamin'    => $d->kelamin);
            $this->session->set_userdata($data_sess);
            redirect(site_url().'member');
            
        }
   }
    
    function logout()
    {
        $this->session->sess_destroy();
		redirect(site_url(), 'refresh');
    }
}