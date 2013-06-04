<?php
	class iklan extends CI_Controller{

		public function __construct(){

			parent::__construct();

			$this->load->model('iklan_model');
			$this->load->model('kategori_model');
			$this->load->model('provinsi_model');
		}

		public function index(){
			
		}

		public function pasang(){	
			$this->load->helper('form');

			//cek sudah login
			$this->sessionlogin->cek_login();
				$data['title'] = "Pasang iklan";
				$data['kategori'] = $this->kategori_model->get_all_kategori();
				
				//Menampilkan View
				$this->load->view('template/head', $data);
				$this->load->view('template/header_bar', $data);
				$this->load->view('template/content_head', $data);
				$this->load->view('pasang_iklan', $data);
				$this->load->view('template/content_foot', $data);
				$this->load->view('template/foot', $data);
		}

		public function proses_pasang(){

		}


		public function detail(){
			$id_iklan = $this->uri->segment(3);

			$data_iklan = $this->iklan_model->get_iklan_by_id_iklan($id_iklan);

			if(count($data_iklan)){
				$data['title'] = 'Iklan Etalase';
				$data['provinsi_model'] = "";
		        foreach($this->provinsi_model->get_all_provinsi() as $prov){
		        	$data['provinsi_model'] .= "<option value='$prov->id_provinsi'>$prov->nama_provinsi</option>";
		        }

				$data['konten_info_iklan'] = "<div class='content'>

										".$data_iklan->harga."

										<hr/>
										<div class='kiri'>
											<img src='".base_url()."img/foto.png' height='80px' width='80px'/>
										</div>
										<div class='kiri content' id='iklan_userabout'>
											<span class='judul_user'><a href='#''>username</a></span><br/>
											<span class='info_small'>Member sejak: 2 Agustus 2010</span>
										</div>

										<div class='clear'></div>
										<br/>
										Nomor Telepon<br/>
										<span class='judul_user'>085251059399</span><br/>
										</div>";


				$kondisi = "";
				if ($data_iklan->kondisi == 1 ) {
					$kondisi = "baru";
				}else{
					$kondisi = "bekas";
				}


				$data['konten_detail_iklan'] = "<span class='judul_iklan'>".$data_iklan->judul."</span><br/>
													<div id='keterangan_iklan'>
														<div class='kiri'>
															<span class='info_small'>".$data_iklan->id_provinsi."</span>&nbsp&nbsp&nbsp&nbsp
															<span class='info_small'>".$kondisi."</span>&nbsp&nbsp&nbsp&nbsp
															<span class='info_small'>".$data_iklan->waktu_tayang."</span>&nbsp&nbsp&nbsp&nbsp
														</div>

														<div class='kanan'>
															<span class='info_small'>Nomor iklan: <b>".$data_iklan->id_iklan."</b></span>
														</div>
													</div>

													<div class='clear'></div>

													<hr/>
													FOTO
													<hr/>
													<br/>

													".$data_iklan->deskripsi;



				//Menampilkan View
				$this->load->view('template/head', $data);
				$this->load->view('template/header_bar', $data);
				$this->load->view('template/content_head', $data);
				$this->load->view('iklan', $data);
				$this->load->view('template/content_foot', $data);
				$this->load->view('template/foot', $data);
			}

			
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
										<b><a href='".base_url()."index.php/iklan/detail/".$i->id_iklan."'>".$i->judul."</a></b><br/>
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