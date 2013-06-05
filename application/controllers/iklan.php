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
			$data['provinsi'] = $this->provinsi_model->get_all_provinsi();


			//Menampilkan View
			$this->load->view('template/head', $data);
			$this->load->view('template/header_bar', $data);
			$this->load->view('template/content_head', $data);
			$this->load->view('pasang_iklan', $data);
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


				$this->iklan_model->insert_iklan(array("id_user"=>$id_user,
													   "id_kategori"=>$id_kategori,
													   "id_sub_kategori"=>$id_sub_kategori,
													   "judul"=>$judul,
													   "tipe"=>$tipe,
													   "harga"=>$harga,
													   "status_nego"=>$status_nego,
													   "id_provinsi"=>$id_provinsi,
													   "id_kota"=>$id_kota
													   ));
				redirect("user/profil");
			}

			

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
				echo '<a href="#" onclick="hapusGambar(1);">Hapus<br/></a>';
				echo '<img id="gambar_'.$posisi.'" src="'.base_url().'uploads/'.$NewImageName.'" alt="Resized Image" width="250px">';

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
			if (unlink($alamat)){
				echo "";	
			}else{
				echo "no delete";
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