<?php defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Marsono Saputro
 * @copyright 2014
 **/ 
 
class Registrasi extends CI_Controller
{
   function __construct()
   {
       parent::__construct();
       $this->load->helper('captcha');       
   }
   
   public function index()
	{ 
        // if form was submitted and given captcha word matches one in session
        if ($this->input->post() && ($this->input->post('secutity_code') == $this->session->userdata('mycaptcha'))) {
			echo 'Sukses';
        }
		else
		{
            $this->session->flashdata('message','Captcha Wrong...');
            $vals = array(
                'img_path'	 => './captcha/',
                'img_url'	 => base_url().'captcha/',
                'font_path'  => 'system/fonts/impact.ttf',
                'pool'       => '0123456789abcdefghijklmnopqrstuvwxyz',
                'word_length'=> 10,
                'img_width'	 => '200',
                'img_height' => '40',
                'border' => 0, 
                'expiration' => 7200
            );
 
            // create captcha image
            $cap = create_captcha($vals);
 
            // store image html code in a variable
            $data['image'] = $cap['image'];
            $data['main']  = 'captcha';
            // store the captcha word in a session
            $this->session->set_userdata('mycaptcha', $cap['word']);
        
            $this->load->view('template', $data);
 
        }
	}

}