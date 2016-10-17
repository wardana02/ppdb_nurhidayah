<?php defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Marsono Saputro
 * @copyright 2014
 **/ 

class Beranda extends CI_Controller 
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('beranda_mdl', 'beranda', TRUE);
        $this->load->library('pagination');
    }
	
    function index()
    {
        $data['static'] = $this->beranda->get_static('4'); 
        $data['active'] = $this->beranda->get_slide_aktive();
        $data['slide']  = $this->beranda->get_slideshow();
        $data['sidebar']= 'sidebar';
        $data['main']   = 'public/home';
        $this->load->view('template', $data);
    }
    
    function prosedur()
    {
        $data['static'] = $this->beranda->get_static('5');
        $data['sidebar']= 'sidebar';
        $data['main'] = 'public/prosedur';
        $this->load->view('template', $data);
    }
    
    function agenda()
    {
        $data['static'] = $this->beranda->get_static('6');
        $data['sidebar']= 'sidebar';
        $data['main'] = 'public/agenda';
        $this->load->view('template', $data);
    }
    
    function pendaftaran()
    {
        redirect('pendaftaran');
    }
    
    function data_pendaftar()
    {
        $page  = $this->uri->segment(3);
        $limit = 10;
		if(!$page):
		  $offset = 0;
		else:
		  $offset = $page;
		endif;
        
        $config['base_url']   = base_url().'beranda/data_pendaftar';
        $config['total_rows'] = $this->db->count_all_results('data_siswa');
        $config['per_page']   = $limit;
        $config['uri_segment']= 3;
                
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_links'] = 5;
        
        $config['prev_link'] = '&lt; Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next &gt;';
        $config['next_tag_open'] = '<li class=next>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);
        $data['page']  = $this->pagination->create_links();
        $data['siswa'] = $this->beranda->view_pendaftar($limit, $offset);
        
        $data['sidebar']= 'sidebar';
        $data['main']   = 'public/data_pendaftar';
        $this->load->view('template', $data);
    }
    
    function faq()
    {
        $data['sidebar']= 'sidebar';
        $data['main']   = 'public/faq';
        $this->load->view('template', $data);
    }
    
    function contact()
    {
        $data['sidebar']= 'sidebar';
        $data['main']   = 'public/contact';
        $this->load->view('template', $data);
    }

    
}

/* End of file beranda.php */
/* Location: ./application/controllers/Beranda.php */