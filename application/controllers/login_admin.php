<?php defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Marsono Saputro
 * @copyright 2014
 **/ 

class Login_admin extends CI_Controller
{
    function __construct()
    {
       parent::__construct();
       $this->load->model('loginadmin_mdl', 'login', true);
       $this->load->library('form_validation');
    }  
    
    function index()
    {
        $this->load->view('login_admin');
    }
    
    function login()
    {
        $this->load->view('login_admin');
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
        $data = $this->login->cek_password($this->input->post('password'));
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
        
        if($this->form_validation->run() == FALSE)
        {
            $this->login();
        }
        else
        {
            $data = $this->login->cek_data_login($this->input->post('username'), sha1($this->input->post('password')));
            $data_sess = array('login'=>true,
                               'admin'=>true,
                               'username'=>$data->username,
                               'namalengkap'=>$data->namalengkap,
                               'level'=>$data->level);
            $this->session->set_userdata($data_sess);
            redirect(site_url().'management');
        }
    }
    
    function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url().'management');
    }
} 