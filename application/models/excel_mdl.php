<?php if(!defined('BASEPATH')) exit('NOT ALLOWED');

/**
 * @author Marsono Saputro
 * @copyright 2014
 */

class Excel_mdl extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function data_siswa()
    {
        return $this->db->get('data_siswa')->result();
    }
    
    function data_ayah()
    {
        return $this->db->get('data_ayah')->result();
    }
    
    function data_ibu()
    {
        return $this->db->get('data_ibu')->result();
    }
    
    function data_alamat()
    {
        return $this->db->get('data_alamat')->result();
    }
    
    function data_saudara()
    {
        return $this->db->get('data_saudara')->result();
    }
    
    function data_biaya()
    {
        return $this->db->get('data_biaya')->result();
    }
    
}