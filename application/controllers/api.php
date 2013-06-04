<?php

/*

	Kelas API pendukung

*/


class Api extends CI_Controller {

	public function __construct(){
		$this->load->database('kategori');
		$this->load->database('sub_kategori');
	}

	public function getSubKategori($id_kategori){
		$kategori = 
	}
}
	