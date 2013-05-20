<?php

/*

	Kelas berisi halaman utama

*/


class Etalase extends CI_Controller {
	
	public function __construct(){
		parent::__construct();   

			//load model database user
			$this->load->model('user_model');
			$this->load->library('session');
			$this->load->model('provinsi_model');
		}
	
	public function index()
    {
        $data['judul'] = '';

        $data['provinsi_model'] = "";
        foreach($this->provinsi_model->get_all_provinsi() as $prov){
        	$data['provinsi_model'] .= "<option value='$prov->id_provinsi'>$prov->nama_provinsi</option>";
        }

        $this->load->view('template/head');
		$this->load->view('template/header_bar_utama	');
		$this->load->view('template/content_head');
		$this->load->view('utama', $data); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');    
    }


}

?>