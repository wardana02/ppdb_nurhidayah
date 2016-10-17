<?php defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Marsono Saputro
 * @copyright 2014
 **/ 
 
class Management extends CI_Controller
{
   function __construct()
   {
       parent::__construct();
       $this->load->model('Management_mdl', 'management', true);
       $this->load->library('pagination');
       require_once(APPPATH.'libraries/apifunction.php');
   }
    
   function index()
   {
       $this->cek_admin();
   }
   
   function cek_admin()
   {
        if($this->session->userdata('login') == true && $this->session->userdata('admin') == 'true')
       {
            $this->activasi();
       }
       else
       {
            redirect(site_url().'login_admin');
       }
   }
   
   function statis()
   {
        $data['statis'] = $this->management->get_statis();
        $data['main']   = 'admin/statis/statis';
        $this->load->view('admin', $data);
   }
   
   function tambah_statis()
   {
        $data['mce']    = $this->scripttiny_mce();
        $data['main']   = 'admin/statis/tambah_statis';
        $this->load->view('admin', $data);
   }
   
   function simpan_statis()
   {
        $this->management->simpan_statis();
        redirect('management/statis');
   }
   
   function edit_statis()
   {
        $data['mce']    = $this->scripttiny_mce();
        $data['edit']   = $this->management->edit_statis($this->uri->segment(3));
        $data['main']   = 'admin/statis/edit_statis';
        $this->load->view('admin', $data);
   }
   
   function simpan_edit_statis()
   {
        $this->management->simpan_edit_statis();
        redirect('management/statis');
   }
   
   function hapus_statis()
   {
        $this->management->hapus_statis($this->uri->segment(3));
        $this->management->hapus_gambar_statis($this->uri->segment(4));
        redirect('management/statis');    
   }
   
   function sms_inbox()
   {
        $page  = $this->uri->segment(3);
        $limit = 10;
		    if(!$page):
		      $offset = 1;
		    else:
		      $offset = $page;
		    endif;
        
        $config['base_url']   = base_url().'management/sms_inbox';
        $config['total_rows'] = countinbox();
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
        $data['inbox'] = readinbox($offset, $limit);
        $data['main']  = 'admin/sms/inbox';
        $this->load->view('admin', $data);
   }
   
   function del_sms_inbox()
   {
        delinbox($this->uri->segment(3));
        redirect('management/sms_inbox');
   }
   
   function sms_outbox()
   {
        $page  = $this->uri->segment(3);
        $limit = 10;
		    if(!$page):
		      $offset = 1;
		    else:
		      $offset = $page;
		    endif;
        
        $config['base_url']   = base_url().'management/sms_outbox';
        $config['total_rows'] = countoutbox();
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
        $data['outbox'] = readoutbox($offset, $limit);
        $data['main']  = 'admin/sms/outbox';
        $this->load->view('admin', $data);
   }
   
   function del_sms_outbox()
   {
        deloutbox($this->uri->segment(3));
        redirect('management/sms_outbox');
   }
   
   function sms_broadcast()
   {
        $data['main'] = 'admin/sms/broadcast';
        $this->load->view('admin', $data);
   }

   function send_broadcast()
   {
      $blm_aktivasi = $this->management->data_blm_aktivasi();
      $aktivasi = $this->management->data_sdh_aktivasi();
      if ($this->input->post('tujuan') == 1) {
        foreach ($blm_aktivasi as $r) {
          sendsms($r->nohp, $this->input->post('pesan'));
        }
      }
      elseif ($this->input->post('tujuan') == 2) {
        foreach ($aktivasi as $r) {
          sendsms($r->nohp, $this->input->post('pesan'));
        }
      }
   }
   
   function sms_reply()
   {
        $data['hinbox'] = historyinbox($this->uri->segment(3),1,5);
        $data['main'] = 'admin/sms/reply';
        $this->load->view('admin', $data);
   }

   function send_reply()
   {
      sendsms($this->input->post('tujuan'), $this->input->post('pesan'));
      redirect('management/sms_outbox');
   }
   
   function send_sms()
   {
        $data['tujuan'] = $this->management->get_nohp();
        $data['main']   = 'admin/sms/send_sms';
        $this->load->view('admin', $data);
   }
   
   function activasi()
   {
        $page  = $this->uri->segment(3);
        $limit = 10;
		if(!$page):
		  $offset = 0;
		else:
		  $offset = $page;
		endif;
        
        $config['base_url']   = base_url().'management/activasi';
        $config['total_rows'] = $this->management->total_account();
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
        $data['account'] = $this->management->view_account($limit, $offset);
        $data['main']  = 'admin/account/activasi';
        $this->load->view('admin', $data);
   }
   
   function aktifkan()
   {
        $this->management->aktifasi($this->uri->segment(3));
        $this->management->delete_account($this->uri->segment(3));
        $this->sms_password();
        $this->management->send_email();
        redirect('management/activasi', 'refresh');
   }
   
   function delete_account($id)
   {
        $this->management->delete_account($this->uri->segment(3));
        redirect('management/activasi', 'refresh');
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
        
        $config['base_url']   = base_url().'management/data_pendaftar';
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
        $data['pendaftar'] = $this->management->data_pendaftar($limit, $offset);
        $data['main']  = 'admin/account/data_pendaftar';
        $this->load->view('admin', $data);
   }
   
   function slideshow()
   {
        $page  = $this->uri->segment(3);
        $limit = 2;
		if(!$page):
		  $offset = 0;
		else:
		  $offset = $page;
		endif;
        
        $config['base_url']   = base_url().'management/slideshow';
        $config['total_rows'] = $this->db->count_all_results('slideshow');
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
        $data['slide'] = $this->management->view_slide($limit, $offset);
        $data['main'] = 'admin/slideshow';
        $this->load->view('admin', $data);
   }
   
   function simpan_slideshow()
   {
        $this->management->simpan_slide();
        redirect('management/slideshow');
   }
   
   function delete_slide()
   {
        $this->management->delete_slide($this->uri->segment(3));
        redirect('management/slideshow');
   }
   
   function update_slide_status()
   {
        $this->management->update_slide_status($this->uri->segment(3));
        redirect('management/slideshow');
   }
   
   function sms_password()
   {
        $nohp   = $this->session->userdata('nohp');
        $pesan  = "Yth Ibu ".$this->session->userdata('namaibu').", pendaftaran sudah kami aktifkan. Selanjutnya silakan login ke system PPDB untuk melengkapi data pendaftaran dengan username: ".$this->session->userdata('username')." dan password: ".$this->management->password($this->session->userdata('tgllahir'))."";
	    $response = sendsms($nohp, $pesan);
   }
   
   function download_excel()
   {
        $this->load->model('excel_mdl', 'excel', true);
        $this->load->library('phpexcel');
        $data['siswa'] = $this->excel->data_siswa();
        $data['ayah']  = $this->excel->data_ayah();
        $data['ibu']   = $this->excel->data_ibu();
        $data['alamat']= $this->excel->data_alamat();
        $data['saudara']= $this->excel->data_saudara();
        $data['biaya'] = $this->excel->data_biaya();
        $this->load->view('admin/data_excel', $data);
   }
   
   
   /** TINY MCE **/    
    private function scripttiny_mce() 
    {
		return '
		<!-- TinyMCE -->
		<script type="text/javascript" src="'.base_url().'assets/admin/jscripts/tiny_mce/tiny_mce_src.js"></script>
		<script type="text/javascript">
        
		tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,
        theme_advanced_font_sizes : "12px,13px,14px,16px,18px,20px",
        font_size_style_values : "12px,13px,14px,16px,18px,20px",
        
	   });
       </script>';	
	}
}