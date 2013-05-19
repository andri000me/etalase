<?php
	class pasang_iklan extends CI_Controller{
		function __construct(){
			parent :: __construct();
			$this->load->model('iklan_model');
		}
		
		public function index(){
			$data['title'] = 'Iklan Etalase';
			//Menampilkan View
			$this->load->view('template/head', $data);
			$this->load->view('template/content_head', $data);
			$this->load->view('pasang_iklan', $data);
			$this->load->view('template/content_foot', $data);
			$this->load->view('template/foot', $data);
			}
		
		//Buat Pasang Iklan
		public function add_iklan(){
			if(isset($_POST['submit'])){
				$data = array 
						('tipe' => $this->input->post('tipe'),
						'judul' => $this->input->post('judul'),
						'kategori' => $this->input->post('kategori'),
						'sub_kategori' => $this->input->post('sub_kategori'),
						'harga' => $this->input->post('harga'),
						'kondisi' => $this->input->post('kondisi'),
						'deskripsi' => $this->input->post('deskripsi'));
						
						$hasil = $this->iklan_model->insert_iklan($data);
						
						if($hasil){
							echo"Add Iklan Berhasil";
						}else{
							echo"Add Iklan Gagal";
						}
						echo "<br/>";
			}
		}
	}
?>