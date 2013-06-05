<?php

class User extends CI_Controller {
	
	public function __construct(){
		parent::__construct();   

			//load model database user
			$this->load->model('user_model');
			$this->load->library('session');
			$this->load->model('provinsi_model');
			$this->load->model('kota_model');
			$this->load->model('iklan_model');
		}
	
	public function index()
    {
        $data['judul'] = '';
        $data['provinsi_model'] = "";
        foreach($this->provinsi_model->get_all_provinsi() as $prov){
        	$data['provinsi_model'] .= "<option value='$prov->id_provinsi'>$prov->nama_provinsi</option>";
        }

        $this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('login', $data); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');    
    }

	//DAFTAR
	function daftar()
    {
    	$data['provinsi_model'] = "";
        foreach($this->provinsi_model->get_all_provinsi() as $prov){
        	$data['provinsi_model'] .= "<option value='$prov->id_provinsi'>$prov->nama_provinsi</option>";
        }
        $data['judul'] = 'Insert Data User';
        $this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('daftar', $data); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');
    }
	

	//PROSES MEMASUKKAN USER
	function user_daftar()
    {   
		$this->load->model('user_model');
        $this->user_model->simpan_user();
        $data['notifikasi'] = 'Data berhasil disimpan';
        $data['judul']='Insert Data Berhasil';
        redirect('login');
    }


    function profil(){

		$this->sessionlogin->cek_login();

		$username = $this->session->userdata('username');
		$id_user = $this->session->userdata('uid');

    	$data['judul'] = '';
    	$data['provinsi_model'] = "";
    	$data['username'] = $username;


        foreach($this->provinsi_model->get_all_provinsi() as $prov){
        	$data['provinsi_model'] .= "<option value='$prov->id_provinsi'>$prov->nama_provinsi</option>";
        }

        $data['data_iklan'] = $this->iklan_model->get_iklan_by_id_user($id_user);

        $this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('profil', $data); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot'); 
    }
	
	//EDIT USER
	
	function edit_profil(){
    	$data['title'] = "Edit_Profile";

    	$this->sessionlogin->cek_login();
		$this->load->model('user_model');

		$uid = $this->session->userdata("uid");
		$userdata = $this->user_model->select_user_by_id($uid);

		$username = $this->session->userdata("username");
		$nama_lengkap = $userdata->nama_lengkap;
		$alamat = $userdata->alamat;
		$provinsi = $userdata->id_provinsi;
		$kabkota = $userdata->id_kabkota;
		$fb = $userdata->fb;
		$yahoo = $userdata->yahoo;
		$twitter = $userdata->twitter;
		$bio = $userdata->bio;
		$tlp = $userdata->tlp;
		$pin_bb = $userdata->pin_bb;



		$data['provinsi_list'] = $this->provinsi_model->get_all_provinsi();
		$data['kota_list']	   = $this->kota_model->get_kota_where_prov($provinsi);

		$data['username'] = $username;
		$data['nama_lengkap'] = $nama_lengkap;
		$data['alamat'] = $alamat;
		$data['provinsi'] = $provinsi;
		$data['kabkota'] = $kabkota;
		$data['fb'] = $fb;
		$data['yahoo'] = $yahoo;
		$data['twitter'] = $twitter;
		$data['bio'] = $bio;
		$data['tlp'] = $tlp;
		$data['pin_bb'] = $pin_bb;





		$this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('edit_profil',$data); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');
    }
	
	function simpan_edit_profil(){
			$this->sessionlogin->cek_login();
			$username = $this->session->userdata("username");
			$id_user = $this->session->userdata("uid");

			$datauser = $this->user_model->select_user($username);

			$data['username'] = $username;
			
			//melakukan edit data
			$nama_lengkap = $this->input->post('nama_lengkap');
			$alamat = $this->input->post('alamat');
			$id_provinsi  = $this->input->post('id_provinsi');
			$id_kota  = $this->input->post('id_kota');
			$fb  = $this->input->post('fb');
			$yahoo = $this->input->post('yahoo');
			$twitter = $this->input->post('twitter');
			$bio = $this->input->post('bio');
			$tlp = $this->input->post('tlp');
			$pin_bb = $this->input->post('pin_bb');
		
			$this->user_model->update_profil_by_id_user($id_user,$nama_lengkap, $alamat, $id_provinsi, $id_kota,
														$fb, $yahoo, $twitter, $bio, $tlp, $pin_bb);
			redirect('user/edit_profil');
	}
	
	public function edit_photo(){

			//mengecek login
			if ($this->session->userdata('LOGGED_IN')) {
				$username = $this->session->userdata("username");

				$datauser = $this->user_model->select_user($username);

				$data['username'] = $username;

				
				$data['error'] = "";


				$namafolder= "photo/"; //folder tempat menyimpan file

				/****   UPLOAD GAMBAR  *****/

				  if (!empty($_FILES["photo"]["tmp_name"]))
				  {
				      $jenis_gambar=$_FILES['photo']['type'];
				      if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
				      {      

				      	  $basename_gambar = $datauser->id_user.basename($_FILES['photo']['name']);
				          $gambar = $namafolder .$basename_gambar;
				          if (move_uploaded_file($_FILES['photo']['tmp_name'], $gambar)) {
				              
				              //file yang lama dihapus
				              $foto_lama = $datauser->photo;

				              if ($foto_lama !=  "0" && file_exists($namafolder.$foto_lama)) {
				              		unlink($namafolder.$foto_lama);
				              }

			              	//simpan nama gambar di database
				            $this->user_model->simpan_update_user($datauser->id_user, array("photo"=>$basename_gambar));
				           	$data['error'] = "Foto berhasil diupload";

				          } else {
				             $data['error'] = "Foto gagal diupload";
				          }

				      } else {
				          $data['error'] = "Foto harus berjenis .jpg .gif .png";
				      }
				  
				  }else {
				        $data['error'] = "Anda belum memilih gambar";
				  }


				//data yang ditampilkan di halaman edit
				$data_pengguna = $this->user_model->select_user($username);

				$foto = $data_pengguna->photo;
				$foto_tampil = "";
				if ($foto == 0) {
					$foto_tampil = "<img src='".base_url()."img/kosong.png' width='80px' height='80px'/>";
				}else{
					$foto_tampil = "<img src='".base_url()."photo/".$foto."' width='80px' height='80px'/>";
				}

				$data['photo'] = $foto_tampil;


				$this->load->view('template/head');
				$this->load->view('template/header_bar');
				$this->load->view('template/content_head');
				$this->load->view('edit_profil'); //view yang diganti
				$this->load->view('template/content_foot');
				$this->load->view('template/foot');
				

			}
		}
	
	function logout() {
			$this->session->sess_destroy();
			// $this->load->view('template/head');
			// $this->load->view('template/header_bar_utama');
			// $this->load->view('template/content_head');
			// $this->load->view('utama');	//view yang diganti
			// $this->load->view('template/content_foot');
			// $this->load->view('template/foot');

			redirect('etalase/index');
	}

	
}

?>