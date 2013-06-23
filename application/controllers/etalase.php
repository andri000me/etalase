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
			$this->load->model('kategori_model');



		}
	
	public function index()
    {
			
		
		$this->load->library('pagination');
		$this->load->library('table');
        
		
		$data['judul'] = '';


        $data['list_kategori'] = "";

        foreach ($this->kategori_model->get_all_kategori() as $kat) {
        	$data['list_kategori'] .= "<a href='".base_url()."index.php/iklan/list_iklan/$kat->id_kategori'>$kat->nama_kategori</a><br/>";
        }

        $this->load->view('template/head');

        //data buat search
        $data['kategori_list_search'] = $this->kategori_model->get_all_kategori();
        $data['provinsi_list_search'] = $this->provinsi_model->get_all_provinsi();

        if ($this->session->userdata("LOGGED_IN") == false) {
        	$this->load->view('template/header_bar_utama', $data);
        }else{
			$this->load->view('template/header_bar');
        }
		$this->load->view('template/content_head');
		$this->load->view('template/search_bar', $data);
		$this->load->view('utama', $data); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');    
    }


}

?>