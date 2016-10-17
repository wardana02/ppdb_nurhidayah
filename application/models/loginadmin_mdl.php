<?php if(!defined('BASEPATH')) exit('NOT ALLOWED');

/**
 * @author Marsono Saputro
 * @copyright 2014
 */

class Loginadmin_mdl extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    function cek_username($username)
    {
        return $this->db->get_where('user', array('username'=>$username))->num_rows();
    }
    
    function cek_password($password)
    {
        return $this->db->get_where('user', array('password'=>sha1($password)))->num_rows();
    }
    
    function cek_data_login($user, $pass)
    {
        return $this->db->get_where('user', array('username'=>$user, 'password'=>$pass))->row();
    }
}