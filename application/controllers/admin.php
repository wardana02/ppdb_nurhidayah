<?php defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Marsono Saputro
 * @copyright 2014
 **/ 

class Admin extends CI_Controller 
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Admin_mdl', 'admin', TRUE);
        require_once(APPPATH.'libraries/apifunction.php');
    }
	
    function index()
    {
        $this->view_admin();
    }
    
    function view_admin()
    {
        $data = $this->admin->form_add();
        $data['admin'] = $this->admin->get_admin();
        $data['main']  = 'admin/admin';
        $this->load->view('admin', $data);
    }
    
    function add_admin()
    {
        $data = $this->admin->form_add();
        $data['main']  = 'admin/add_admin';
        $this->load->view('admin', $data);
    }
    
    function simpan_admin()
    {
        $this->admin->simpan_admin();
    }
    
    function edit_admin($id)
    {
        echo $id;
    }
    
    
}

/* End of file admin.php */
/* Location: ./application/controllers/Admin.php */