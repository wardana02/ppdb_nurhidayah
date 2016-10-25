<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_mdl extends CI_Model
{
    function __construct()
    {
        parent::__construct();
              
    }

    //ency pass
    function do_ency_pass($pass)
       {
            $secret    = "qpwoeiruty12345";
            $pass      = md5($pass);
            $password  = md5($pass.$secret.$pass);
            return $password;
       }

    function password($thn, $tgl)
    {
        $secret    = "qpwoeiruty12345";
        $pass      = md5('ppdb'.$thn.$tgl);
        $password  = md5($pass.$secret.$pass);
        return $password;
    }


        // cek status user, login atau tidak?
    public function cek_user()
    {
        $username = $this->input->post('username');
        $q        = $this->input->post('password');

        //untuk mengatasi injection
        $a = $username;
        $w = $q;
        $b = $this->do_ency_pass($w);
        //echo("$username $password");exit();
        $q = "SELECT 
            *
            FROM data_account 
            where username='$a' AND password='$b'
            AND aktif='1'";
            //echo $q;exit();
        $query = $this->db->query($q);
        
        if ($query->num_rows() == 1)
        {        
            $DT=date("Y-m-d H:i:s");    
            $data = array(  
                            'login'     => TRUE,
                            'login_time' => $DT,
                            'member'     => 'aktif',
                            'id_akun'    => $query->row()->id_account,
                            'nama_lengkap'    => $query->row()->namalengkap,
                            'email'    => $query->row()->email
                            );
            //print_r($data);exit();

            // buat data session jika login benar
            $this->session->set_userdata($data);
            
            //$I = $query->row()->id_user;
            //$this->db->query("UPDATE user SET last_log='$DT' WHERE id_user='$I'");
            
            return TRUE;
        }
        else
        {
            return FALSE;
        }
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