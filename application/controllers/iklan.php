<?php
	class iklan extends CI_Controller{

		public function __construct(){

			parent::__construct();

			
			$this->load->model('iklan_model');
			$this->load->model('kategori_model');
			$this->load->model('provinsi_model');
			$this->load->model('user_model');
			$this->load->model('sub_kategori_model');
			$this->load->model('kota_model');
			$this->load->library('pagination');
			$this->load->library('table');
		}

		public function index(){
			
		
        
		
			
		}

		public function pasang(){	
			$this->load->helper('form');

			//cek sudah login
			$this->sessionlogin->cek_login();
			$data['title'] = "Pasang iklan";
			$data['kategori'] = $this->kategori_model->get_all_kategori();
			$data['provinsi'] = $this->provinsi_model->get_all_provinsi();


			//Menampilkan View
			$this->load->view('template/head', $data);
			$this->load->view('template/header_bar', $data);
			$this->load->view('template/content_head', $data);
			$this->load->view('template/search_bar', $data);
			$this->load->view('pasang_iklan', $data);
			$this->load->view('template/content_foot', $data);
			$this->load->view('template/foot', $data);
		}

		public function edit($id_iklan){	
			$this->load->helper('form');
			//cek sudah login
			$this->sessionlogin->cek_login();

			//data iklan
			$data_iklan = $this->iklan_model->get_iklan_by_id_iklan($id_iklan);

			$data['id_iklan'] = $data_iklan->id_iklan;
			$data['tipe'] = $data_iklan->tipe;
			$data['id_kategori'] = $data_iklan->id_kategori;
			$data['id_sub_kategori'] = $data_iklan->id_sub_kategori;
			$data['judul'] = $data_iklan->judul;
			$data['tipe'] = $data_iklan->tipe;
			$data['harga'] = $data_iklan->harga;
			$data['id_provinsi'] = $data_iklan->id_provinsi;
			$data['id_kota'] = $data_iklan->id_kota;
			$data['kondisi'] = $data_iklan->kondisi;
			$data['deskripsi'] = $data_iklan->deskripsi;
			$data['status_nego'] = $data_iklan->status_nego;
			$data['photo1'] = $data_iklan->photo1;
			$data['photo2'] = $data_iklan->photo2;
			$data['photo3'] = $data_iklan->photo3;
			$data['photo4'] = $data_iklan->photo4;


			$data['title'] = "Edit iklan";


			$data['list_kategori'] = $this->kategori_model->get_all_kategori();
			$data['list_sub_kategori'] = $this->sub_kategori_model->get_subkategori_by_kategori($data['id_kategori']);
			
			$data['list_provinsi'] = $this->provinsi_model->get_all_provinsi();
			$data['list_kota']	   = $this->kota_model->get_kota_where_prov($data['id_provinsi']);

			//Menampilkan View
			$this->load->view('template/head', $data);
			$this->load->view('template/header_bar', $data);
			$this->load->view('template/content_head', $data);
			$this->load->view('template/search_bar', $data);
			$this->load->view('edit_iklan', $data);
			$this->load->view('template/content_foot', $data);
			$this->load->view('template/foot', $data);
		}

		public function proses_pasang(){
			$this->sessionlogin->cek_login();

			$setuju = $this->input->post("setuju");

			if ($setuju == "setuju") {
				$tipe = $this->input->post("tipe");
				$judul = $this->input->post("judul");
				$id_kategori = $this->input->post("id_kategori");
				$id_sub_kategori = $this->input->post("id_sub_kategori");
				$id_user = $this->session->userdata("uid");
				$harga = $this->input->post("harga");
				$kondisi = $this->input->post("kondisi");
				$status_nego = $this->input->post("status_nego");
				$id_provinsi = $this->input->post("id_provinsi");
				$id_kota = $this->input->post("id_kota");
				$photo1 = $this->input->post("photo1");
				$photo2 = $this->input->post("photo2");
				$photo3 = $this->input->post("photo3");
				$photo4 = $this->input->post("photo4");
				$deskripsi = $this->input->post("deskripsi");
				$kondisi = $this->input->post("kondisi");

				$this->iklan_model->insert_iklan(array("id_user"=>$id_user,
													   "id_kategori"=>$id_kategori,
													   "id_sub_kategori"=>$id_sub_kategori,
													   "judul"=>$judul,
													   "tipe"=>$tipe,
													   "harga"=>$harga,
													   "status_nego"=>$status_nego,
													   "id_provinsi"=>$id_provinsi,
													   "id_kota"=>$id_kota,
													   "photo1"=>$photo1,
													   "photo2"=>$photo2,
													   "photo3"=>$photo3,
													   "photo4"=>$photo4,
													   "deskripsi"=>$deskripsi,
													   "kondisi"=>$kondisi
													   ));
				redirect("user/profil");
			}

			

		}

		public function proses_edit(){
			$this->sessionlogin->cek_login();

			$setuju = $this->input->post("setuju");

			if ($setuju == "setuju") {
				$tipe = $this->input->post("tipe");
				$judul = $this->input->post("judul");
				$id_kategori = $this->input->post("id_kategori");
				$id_sub_kategori = $this->input->post("id_sub_kategori");
				$id_user = $this->session->userdata("uid");
				$harga = $this->input->post("harga");
				$kondisi = $this->input->post("kondisi");
				$status_nego = $this->input->post("status_nego");
				$id_provinsi = $this->input->post("id_provinsi");
				$id_kota = $this->input->post("id_kota");
				$photo1 = $this->input->post("photo1");
				$photo2 = $this->input->post("photo2");
				$photo3 = $this->input->post("photo3");
				$photo4 = $this->input->post("photo4");
				$deskripsi = $this->input->post("deskripsi");
				$id_iklan = $this->input->post("id_iklan");
				$kondisi = $this->input->post("kondisi");

				$this->iklan_model->set_iklan_by_id_iklan($id_iklan, array("id_user"=>$id_user,
																		   "id_kategori"=>$id_kategori,
																		   "id_sub_kategori"=>$id_sub_kategori,
																		   "judul"=>$judul,
																		   "tipe"=>$tipe,
																		   "harga"=>$harga,
																		   "status_nego"=>$status_nego,
																		   "id_provinsi"=>$id_provinsi,
																		   "id_kota"=>$id_kota,
																		   "photo1"=>$photo1,
																		   "photo2"=>$photo2,
																		   "photo3"=>$photo3,
																		   "photo4"=>$photo4,
																		   "deskripsi"=>$deskripsi,
																		   "kondisi"=>$kondisi
																		   ));
				redirect("user/profil");
			}

			

		}



		public function detail(){
			$id_iklan = $this->uri->segment(3);

			$data_iklan = $this->iklan_model->get_iklan_by_id_iklan($id_iklan);

			$data['pembuat_iklan'] = $this->user_model->select_user_by_id($data_iklan->id_user);

			$data['data_iklan'] = $data_iklan;

			$data['provinsi'] = $this->provinsi_model->get_provinsi_by_id($data_iklan->id_provinsi);
			$data['kota'] = $this->kota_model->get_kota_by_id($data_iklan->id_kota);

			$data['title'] = 'Iklan Etalase';

			//Menampilkan View
			$this->load->view('template/head', $data);
			$this->load->view('template/header_bar', $data);
			$this->load->view('template/content_head', $data);
			$this->load->view('template/search_bar', $data);
			$this->load->view('iklan', $data);
			$this->load->view('template/content_foot', $data);
			$this->load->view('template/foot', $data);
			
		}

		//MENAMPILKAN LIST IKLAN BERDASARKAN JENIS IKLAN
		public function list_iklan(){
			$id_category_iklan = $this->uri->segment(3);

			$config['base_url'] = 'http://localhost/tubesasli2/index.php/iklan/list_iklan';
			$config['total_rows'] = $this->db->get('iklan')->num_rows();
			$config['per_page'] = 4;
			$config['num_links'] = 1;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
		
			$this->pagination->initialize($config);
			$data['records'] = $this->db->get('iklan', $config['per_page'], $this->uri->segment(3));
			
			$data['data_iklan'] = $this->iklan_model->get_iklan_by_category($id_category_iklan);


			$nama_kategori = $this->kategori_model->get_kategori_by_id($id_category_iklan);
			$data['nama_kategori'] = $nama_kategori->nama_kategori;

				
			//Menampilkan View
			$this->load->view('template/head', $data);
			$this->load->view('template/header_bar', $data);
			$this->load->view('template/content_head', $data);
			$this->load->view('template/search_bar', $data);
			$this->load->view('list_iklan', $data);
			$this->load->view('template/content_foot', $data);
			$this->load->view('template/foot', $data);
		}

		public function upload_gambar($id_iklan){
			//Sumber referensi http://www.saaraan.com/2012/05/ajax-image-upload-and-resize-with-jquery-and-php
			//dengan beberapa perubahan

			//id dari gambar
			$posisi = $this->input->post("posisi");

			//Some Settings
			$ThumbSquareSize 		= 200; //Thumbnail will be 200x200
			$BigImageMaxSize 		= 500; //Image Maximum height or width
			$ThumbPrefix			= "thumb_"; //Normal thumb Prefix
			$PosisiAplikasi			= getcwd();
			$DestinationDirectory	= $PosisiAplikasi.'/uploads/'; //Upload Directory ends with / (slash)
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
				echo '<a href="#" onclick="hapusGambar('.$posisi.');"><i class="icon-trash"></i>Hapus<br/></a>';
				echo '<img class="img-polaroid" id="gambar_'.$posisi.'" src="'.base_url().'uploads/'.$NewImageName.'" alt="Resized Image" width="250px">';

				if ($id_iklan != -1) {
					$this->iklan_model->set_iklan_by_id_iklan($id_iklan, array("photo".$posisi=>$NewImageName));
				}
				
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


		/**
		 *	Hapus gambar buat edit
		 */
		function deleteEditImage($nama_image){
			$id_iklan = $this->uri->segment(4);
			$gambar_ke = $this->uri->segment(5);

			$this->sessionlogin->cek_login();

			$alamat = getcwd()."/uploads/".$nama_image;
			if (file_exists($alamat)) {
				if (unlink($alamat)){
					$this->iklan_model->set_iklan_by_id_iklan($id_iklan, array("photo".$gambar_ke=>""));
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