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
		}
	
	public function index()
    {
        $data['judul'] = '';
        $this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('utama'); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');    
    }


}

?>