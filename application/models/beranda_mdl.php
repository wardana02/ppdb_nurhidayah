<?php defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Marsono Saputro
 * @copyright 2014
 **/ 

class Beranda_mdl extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    
    function get_static($id)
    {
        return $this->db->get_where('halamanstatis', array('id_halaman'=>$id))->row();
    }
    
    function get_slide_aktive()
    {
        $this->db->where('status', '1');
        $this->db->limit(1,0);
        return $this->db->get('slideshow')->row();
    }
    
    function get_slideshow()
    {
        $this->db->where('status', '1');
        $this->db->limit(3,1);
        return $this->db->get('slideshow')->result();
    }
    
    function view_pendaftar($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get('data_siswa')->result();
    }
}