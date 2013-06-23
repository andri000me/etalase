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
        $config['base_url'] = 'http://localhost/tubesasli2/index.php/etalase/index';
		$config['total_rows'] = $this->db->get('kategori')->num_rows();
		$config['per_page'] = 7;
		$config['num_links'] = 2;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
		$data['records'] = $this->db->get('kategori', $config['per_page'], $this->uri->segment(3));
		$data['judul'] = '';


        $data['list_kategori'] = "";

        foreach ($this->kategori_model->get_all_kategori() as $kat) {
        	$data['list_kategori'] .= "<a href='".base_url()."index.php/iklan/list_iklan/$kat->id_kategori'>$kat->nama_kategori</a><br/>";
        }

        $this->load->view('template/head');

        if ($this->session->userdata("LOGGED_IN") == false) {
        	$this->load->view('template/header_bar_utama');
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