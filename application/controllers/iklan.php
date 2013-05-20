<?php
	class iklan extends CI_Controller{

		public function __construct(){

			parent::__construct();

			$this->load->model('iklan_model');
			$this->load->model('kategori_model');
			$this->load->model('provinsi_model');
		}

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

		//MENAMPILKAN LIST IKLAN BERDASARKAN JENIS IKLAN
		public function list_iklan(){
			$id_category_iklan = $this->uri->segment(3);

			//menampilkan nama-nama provinsi untuk search
			$data['provinsi_model'] = "";
	        foreach($this->provinsi_model->get_all_provinsi() as $prov){
	        	$data['provinsi_model'] .= "<option value='$prov->id_provinsi'>$prov->nama_provinsi</option>";
	        }


			$data['list_iklan'] = "";

			$iklan_by_category = $this->iklan_model->get_iklan_by_category($id_category_iklan);

			foreach ($iklan_by_category as $i) {

				$kondisi = "";


				//mengecek kondisi
				if ($i->kondisi == 1) {
					$kondisi = "baru";
				}else{
					$kondisi = "bekas";
				}

				$data['list_iklan'] .= "<div class='card'>
										<div class='content'>
											<div class='kiri'>
											<div class='photo border-g'>
											</div>
										</div>

										<div class='kiri content info_iklan'>
										<b><a href='#'>".$i->judul."</a></b><br/>
											<span class='info_small'>Provinsi: ".$i->id_provinsi."</span><br/>
											<span class='info_small'>Kondisi: ".$kondisi."</span><br/>
											<span class='info_small'>".$i->waktu_tayang."</span><br/>
										</div>

										<div class='kanan'>
											<b>".$i->harga."</b>
										</div>

										<div class='clear'></div>
									</div>
								</div>";

			}

			$nama_kategori = $this->kategori_model->get_kategori_by_id($id_category_iklan);
			$data['nama_kategori'] = $nama_kategori->nama_kategori;
			



			//Menampilkan View
			$this->load->view('template/head', $data);
			$this->load->view('template/header_bar', $data);
			$this->load->view('template/content_head', $data);
			$this->load->view('list_iklan', $data);
			$this->load->view('template/content_foot', $data);
			$this->load->view('template/foot', $data);
			

		}
	}