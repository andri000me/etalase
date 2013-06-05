<?php

/*

	Kelas API pendukung

*/


class api extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('kategori_model');
		$this->load->model('sub_kategori_model');
		$this->load->model('kota_model');
		$this->load->model('provinsi_model');
	}

	public function getSubKategori($id_kategori){
		$sub_kategori = $this->sub_kategori_model->get_subkategori_by_kategori($id_kategori);

		$result = array();
		foreach ($sub_kategori as $key) {
			array_push($result, array('nama'=>$key->nama_sub_kategori,
								 	  'id'=>$key->id_sub_kategori));
		}

		$result = json_encode($result);

		echo $result;
	}

	public function getKota($id_provinsi){
		$kota = $this->kota_model->get_kota_by_id_provinsi($id_provinsi);

		$result = array();
		foreach ($kota as $key) {
			array_push($result, array('nama'=>$key->nama_kota,
								 	  'id'=>$key->id_kota));
		}

		$result = json_encode($result);

		echo $result;
	}
}
	