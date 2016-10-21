<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error404 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data['sidebar']= 'sidebar';
        $data['main']   = '404';
        $this->load->view('template', $data);
        /*
		$LG = $this->session->userdata('login');
		if($LG==TRUE){
			$data['nama_user'] = $this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
		$data['conten'] = 'backend/admin/Override/404';
			$this->load->view('backend/dashboard/index',$data);
		}
		else {
			$data['conten'] = "frontend/404";
			$this->load->view('backend/dashboard/index2', $data);
		}
		*/
		
	}
}