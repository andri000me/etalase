<?php
	class iklan extends CI_Controller{
		public function index(){
			$data['title'] = 'Iklan Etalase';
			$data['provinsi_model'] = "";
	        foreach($this->provinsi_model->get_all_provinsi() as $prov){
	        	$data['provinsi_model'] .= "<option value='$prov->id_provinsi'>$prov->nama_provinsi</option>";
	        }
			//Menampilkan View
			$this->load->view('template/head', $data);
			$this->load->view('template/content_head', $data);
			$this->load->view('iklan', $data);
			$this->load->view('template/content_foot', $data);
			$this->load->view('template/foot', $data);
			}
	}
?>
