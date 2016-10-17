<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_mdl extends CI_Model
{
    function __construct()
    {
        parent::__construct();
              
    }
    public function cek_data_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        print_r($this->db);
        exit();
        return $this->db->get('data_siswa')->row();

    }
    public function cek_username($username)
    {
        return $this->db->get_where('data_account', array('username'=>$username))->num_rows();
    }
    
    public function cek_password($password)
    {
        return $this->db->get_where('data_account', array('password'=>$password))->num_rows();
    }
    
    function view_datasiswa()
    {
        return $this->db->get_where('data_siswa', array('id_siswa'=>$this->session->userdata('id_siswa')))->row();
    }
        
    
    
    
}