<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');

	class Cetak extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->helper('download');
			$this->load->helper('Terbilang');
			$this->load->helper('rupiah');


			$this->load->model('formulir_mdl', 'formulir', true);
	        $this->load->model('pendaftaran_mdl', 'pendaftaran', true);
	        $this->load->model('Member_mdl', 'member', true);
		}


		function download($id){

			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');

			$data['conten'] = "backend/admin/Cetak/index";
			$data['data_foto'] 	= $this->md_upload->get_data_foto($id); 
			$data['data'] 	= $this->cetak_md->get_st_data($id);
			$data['option'] = $this->cetak_md->get_all_data($id);

				$this->load->view('backend/dashboard/index', $data);


		}

		function akun(){

			$data['data_akun'] = $this->member->get_data_akun();
			$html = $this->load->view('blangko/cetak_akun',$data,TRUE);
			$pdfFilePath = "Akun_Pendaftaran_PPDB.pdf";
			$this->load->library("pdf");
			$param = 'P';
			$pdf = $this->pdf->load($param);
			$pdf->defaultheaderline = 1;
			$pdf->defaultfooterline = 1;

			$date = date('d-m-Y h:I:s');
			//$pdf->SetFooter('Cetak Data Buku by @aaji || Page{PAGENO} of {nb} || Printed at'.$date);
			$stylesheet = file_get_contents(base_url().'assets/mpdf_css/mpdfstyletables.css');

			$pdf->WriteHTML($stylesheet,1);

			//generate pdf file form the given HTML

			$pdf->WriteHTML($html,2);
			//pdf->debug = TRUE;

			//Output
			$pdf->Output($pdfFilePath,"I");
			//I=>WITH PREVIEW BROWSER
			//D=>DIRECT DOWNLOAD
		
		}

		function tagihan($id){

			$data['dt_periode'] = $this->formulir->get_periode_aktif();
			$data['data_akun'] = $this->member->get_siswa_daftar($id);
			$html = $this->load->view('blangko/cetak_tagihan',$data,TRUE);
			$pdfFilePath = "Biaya_Pendaftaran_".$data['data_akun']->namalengkap.".pdf";
			$this->load->library("pdf");
			$param = 'P';
			$pdf = $this->pdf->load($param);
			$pdf->defaultheaderline = 1;
			$pdf->defaultfooterline = 1;

			$date = date('d-m-Y h:I:s');
			//$pdf->SetFooter('Cetak Data Buku by @aaji || Page{PAGENO} of {nb} || Printed at'.$date);
			$stylesheet = file_get_contents(base_url().'assets/mpdf_css/mpdfstyletables.css');

			$pdf->WriteHTML($stylesheet,1);

			//generate pdf file form the given HTML

			$pdf->WriteHTML($html,2);
			//pdf->debug = TRUE;

			//Output
			$pdf->Output($pdfFilePath,"I");
			//I=>WITH PREVIEW BROWSER
			//D=>DIRECT DOWNLOAD
		
		}



		function index($id,$kode){


			if($id=='spd_dpn'){
				$data['data'] = $this->cetak_md->get_specific_data($kode);
				$html = $this->load->view('template/blangko/siap/spd_depan',$data,TRUE);	
				//file for user download
				$pdfFilePath = "spd_depan.pdf";
			} else if ($id=='spd_blk') {
				$data['data'] = $this->cetak_md->get_specific_data($kode);
				$html = $this->load->view('template/blangko/siap/spd_blk',$data,TRUE);	
				//file for user download
				$pdfFilePath = "spd_blk.pdf";
			} else if ($id=='kuitansi') {
				$data['data'] = $this->cetak_md->get_specific_data($kode);
				
					//$data['terbilang'] = $this->terbilang->_($data['data']['uang_harian']);
				
				
				$html = $this->load->view('template/blangko/siap/kuitansi',$data,TRUE);	
				//file for user download
				$pdfFilePath = "kuitansi.pdf";
			} 



			if($id=='st' OR $id=='lp'){
				//load mPDF Libs
				$this->load->library("pdf");
				$param = 'L';
				$pdf = $this->pdf->load($param);
			}
			else {
				$this->load->library("pdf");
				$param = 'P';
				$pdf = $this->pdf->load($param);
			}
			

			$date = date('d-m-Y h:I:s');
			//$pdf->SetFooter('Cetak Data Buku by @aaji || Page{PAGENO} of {nb} || Printed at'.$date);
			$stylesheet = file_get_contents(base_url().'assets/mpdf_css/mpdfstyletables.css');

			$pdf->WriteHTML($stylesheet,1);

			//generate pdf file form the given HTML

			$pdf->WriteHTML($html,2);
//			$pdf->debug = TRUE;

			//Output
			$pdf->Output($pdfFilePath,"I");
			//I=>WITH PREVIEW BROWSER
			//D=>DIRECT DOWNLOAD
		}

		

}
