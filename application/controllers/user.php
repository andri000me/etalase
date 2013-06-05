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

        $this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('template/search_bar', $data);
		$this->load->view('login', $data); //view yang diganti
		$this->load->view('template/content_foot');
		$this->load->view('template/foot');    
    }

	//DAFTAR
	function daftar()
    {

        $data['judul'] = 'Insert Data User';
        $this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('template/search_bar', $data);
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
    	$data['username'] = $username;

        $data['data_iklan'] = $this->iklan_model->get_iklan_by_id_user($id_user);

        $this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('template/search_bar', $data);
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
		$tampilkan_no_tlp = $userdata->tampilkan_no_tlp;
		$photo = $userdata->photo;

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
		$data['tampilkan_no_tlp'] = $tampilkan_no_tlp;
		$data['photo'] = $photo;



		$this->load->view('template/head');
		$this->load->view('template/header_bar');
		$this->load->view('template/content_head');
		$this->load->view('template/search_bar', $data);
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

			$tampilkan_no_tlp = ($this->input->post('tampilkan_no_tlp')=="on"?1:0);
		

			$this->user_model->update_profil_by_id_user($id_user, array('nama_lengkap'=>$nama_lengkap,
																        'id_provinsi'=>$id_provinsi,
																        'id_kabkota'=>$id_kota,
																        'alamat'=>$alamat,
																        'fb'=>$fb,
																        'yahoo'=>$yahoo,
																        'twitter'=>$twitter,
																        'bio'=>$bio,
																        'tlp'=>$tlp,
																        'pin_bb'=>$pin_bb,
																        'tampilkan_no_tlp'=>$tampilkan_no_tlp));
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
				$this->load->view('template/search_bar', $data);
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


	public function upload_gambar(){
		//Sumber referensi http://www.saaraan.com/2012/05/ajax-image-upload-and-resize-with-jquery-and-php
		//dengan beberapa perubahan

		//id dari gambar
		$posisi = $this->input->post("posisi");

		//Some Settings
		$ThumbSquareSize 		= 200; //Thumbnail will be 200x200
		$BigImageMaxSize 		= 500; //Image Maximum height or width
		$ThumbPrefix			= "thumb_"; //Normal thumb Prefix
		$PosisiAplikasi			= getcwd();
		$DestinationDirectory	= $PosisiAplikasi.'/uploads/profile/'; //Upload Directory ends with / (slash)
		$Quality 				= 90;

		// check $_FILES['ImageFile'] array is not empty
		// "is_uploaded_file" Tells whether the file was uploaded via HTTP POST
		if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name']))
		{
				die('Something went wrong with Upload! <a href="#" onClick="retryUpload('.$posisi.')">retry</a>'); // output error when above checks fail.
		}
		
		// Random number for both file, will be added after image name
		$RandomNumber 	= rand(0, 9999999999); 

		// Elements (values) of $_FILES['ImageFile'] array
		//let's access these values by using their index position
		$ImageName 		= str_replace(' ','-',strtolower($_FILES['ImageFile']['name'])); 
		$ImageSize 		= $_FILES['ImageFile']['size']; // Obtain original image size
		$TempSrc	 	= $_FILES['ImageFile']['tmp_name']; // Tmp name of image file stored in PHP tmp folder
		$ImageType	 	= $_FILES['ImageFile']['type']; //Obtain file type, returns "image/png", image/jpeg, text/plain etc.

		//Let's use $ImageType variable to check wheather uploaded file is supported.
		//We use PHP SWITCH statement to check valid image format, PHP SWITCH is similar to IF/ELSE statements 
		//suitable if we want to compare the a variable with many different values
		switch(strtolower($ImageType))
		{
			case 'image/png':
				$CreatedImage =  imagecreatefrompng($_FILES['ImageFile']['tmp_name']);
				break;
			case 'image/gif':
				$CreatedImage =  imagecreatefromgif($_FILES['ImageFile']['tmp_name']);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				$CreatedImage = imagecreatefromjpeg($_FILES['ImageFile']['tmp_name']);
				break;
			default:
				die('Unsupported File! <a href="#" onClick="retryUpload('.$posisi.')">retry</a>'); //output error and exit
		}
		
		//PHP getimagesize() function returns height-width from image file stored in PHP tmp folder.
		//Let's get first two values from image, width and height. list assign values to $CurWidth,$CurHeight
		list($CurWidth,$CurHeight)=getimagesize($TempSrc);
		//Get file extension from Image name, this will be re-added after random name
		$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	  	$ImageExt = str_replace('.','',$ImageExt);
		
		//remove extension from filename
		$ImageName 		= preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName); 
		
		//Construct a new image name (with random number added) for our new image.
		$NewImageName = $ImageName.'-'.$RandomNumber.'.'.$ImageExt;
		//set the Destination Image

		$thumb_DestRandImageName 	= $DestinationDirectory.$ThumbPrefix.$NewImageName; //Thumb name
		$DestRandImageName 			= $DestinationDirectory.$NewImageName; //Name for Big Image
		

		//Resize image to our Specified Size by calling resizeImage function.
		if($this->resizeImage($CurWidth,$CurHeight,$BigImageMaxSize,$DestRandImageName,$CreatedImage,$Quality,$ImageType))
		{
			/*
			At this point we have succesfully resized and created thumbnail image
			We can render image to user's browser or store information in the database
			For demo, we are going to output results on browser.
			*/
			echo '<img class="img-polaroid" id="gambar_'.$posisi.'" src="'.base_url().'uploads/profile/'.$NewImageName.'" alt="Resized Image" width="100%" height="100%"/>';

			//hapus gambar sebelumnya
			$userdata = $this->user_model->select_user_by_id($this->session->userdata('uid'));
			$old_photo = $userdata->photo;
			if ($old_photo != "") {
				$this->deleteImage($old_photo);
			}
			


			$this->user_model->update_profil_by_id_user($this->session->userdata('uid'), array("photo"=>$NewImageName));
			
			/*
			// Insert info into database table!
			mysql_query("INSERT INTO myImageTable (ImageName, ThumbName, ImgPath)
			VALUES ($DestRandImageName, $thumb_DestRandImageName, 'uploads/')");
			*/

		}else{
			die('Resize Error <a href="#" onClick="retryUpload('.$posisi.')">retry</a>'); //output error
		}
	}

	function deleteImage($nama_image){
		$this->sessionlogin->cek_login();

		$alamat = getcwd()."/uploads/".$nama_image;

		if (file_exists($alamat)) {
			if (unlink($alamat)){
				echo "";	
			}
		}else{
			die("Tidak bisa menghapus foto. Coba refresh laman");
		}
		
	}


	// This function will proportionally resize image 
	function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType)
	{
		//Check Image size is not 0
		if($CurWidth <= 0 || $CurHeight <= 0) 
		{
			return false;
		}
		
		//Construct a proportional size of new image
		$ImageScale      	= min($MaxSize/$CurWidth, $MaxSize/$CurHeight); 
		$NewWidth  			= ceil($ImageScale*$CurWidth);
		$NewHeight 			= ceil($ImageScale*$CurHeight);
		$NewCanves 			= imagecreatetruecolor($NewWidth, $NewHeight);
		
		// Resize Image
		if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight))
		{
			switch(strtolower($ImageType))
			{
				case 'image/png':
					imagepng($NewCanves,$DestFolder);
					break;
				case 'image/gif':
					imagegif($NewCanves,$DestFolder);
					break;			
				case 'image/jpeg':
				case 'image/pjpeg':
					imagejpeg($NewCanves,$DestFolder,$Quality);
					break;
				default:
					return false;
			}
		//Destroy image, frees memory	
		if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
		return true;
		}

	}

	
}

?>