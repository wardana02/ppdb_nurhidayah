<?php defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Marsono Saputro
 * @copyright 2014
 **/ 
 
class Admin_mdl extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_admin()
    {
        return $this->db->get('admin')->result();
    }
    
    function form_add()
    {
        $namalengkap = array('name'=>'namalengkap', 'id'=>'namalengkap', 'set_value'=>'namalengkap', 'class'=>'form-control');
        $email = array('name'=>'email', 'id'=>'email', 'set_value'=>'email', 'class'=>'form-control');
        $nohp = array('name'=>'nohp', 'id'=>'nohp', 'set_value'=>'nohp', 'class'=>'form-control');
        $username = array('name'=>'username', 'id'=>'username', 'set_value'=>'username', 'class'=>'form-control');
        $password = array('name'=>'password', 'id'=>'password', 'set_value'=>'password', 'class'=>'form-control');
        $password2 = array('name'=>'password2', 'id'=>'password2', 'set_value'=>'password2', 'class'=>'form-control');
        
        $r = array();
        $r['namalengkap'] = $namalengkap;
        $r['email'] = $email;
        $r['nohp'] = $nohp;
        $r['username'] = $username;
        $r['password'] = $password;
        $r['password2']= $password2;
        
        return $r;
    }
    
    function validasi_add()
    {
        $validasi = array(array('field'=>'namalengkap', 'label'=>'Nama Lengkap', 'rules'=>'trim|required|xss_clean'),
                          array('field'=>'email', 'label'=>'Email', 'rules'=>'trim|required|xss_clean'),
                          );
        return $validasi;
    }
    
    function simpan_admin()
    {
        $data = array('username'=>strtolower($this->input->post('username')),
                      'password'=>md5(strtolower($this->input->post('password'))),
                      'namalengkap'=>ucwords(strtolower($this->input->post('namalengkap'))),
                      'email'=>$this->input->post('email'),
                      'nohp'=>$this->input->post('nohp'),
                      'blokir'=>'N'
                      );
        $this->db->insert('admin', $data);
        return $data;
    }
}