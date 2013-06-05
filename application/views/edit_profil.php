				<div id="kategori">
					<div class="kiri">
						<div class="container_3 border-g">
							<div class="content">
								<br/>
								Edit profil
							</div> <!-- Content -->
						</div> <!-- container_2 -->
					</div>

					<div class="kanan">
						<div class="container_2p3 border-g">
							<div class="content">
								<br/>

								<hr/>

								<form action="<?php echo base_url()?>index.php/user/simpan_edit_profil" method="POST">
								
									Username<br/>
									<?php echo $username?><br/>
									<br/>
									
									Nama<br/>
									<input type="text" required class="input-form" name="nama_lengkap" value="<?php echo $nama_lengkap?>"/><br/>
									<br/>
														
									Alamat<br/>
									<textarea  name="alamat" required class="input-form" style="height:80px"><?php echo $alamat?></textarea><br/>

									<br/>
									Provinsi<br/>
									<select class="input-form-long" required name="id_provinsi" onChange="pilihProvinsiTambahIklan('<?php echo base_url()?>');" id="select_provinsi_tambah_iklan">
										<option value="">Pilih provinsi</option>
										<?php 
										foreach ($provinsi_list as $k) {
										?>
										<option value="<?php echo $k->id_provinsi?>" <?php if($provinsi == $k->id_provinsi) echo "selected";?> >
											<?php echo $k->nama_provinsi?>
										</option>
										<?
										}
										?>
									</select>
									<br/>
									kota<br/>
									<select class="input-form-long" required name="id_kota" id="select_kota_tambah_iklan">
										<option value="">Pilihan kota</option>
										<?php 
										foreach ($kota_list as $k) {
										?>
										<option value="<?php echo $k->id_kota?>" <?php if($kabkota == $k->id_kota) echo "selected";?> >
											<?php echo $k->nama_kota?>
										</option>
										<?
										}
										?>
									</select>

									<br/>
									
									Facebook<br/>
									<input type="text" name="fb" class="input-form" value="<?php echo $fb?>"/><br/>
									
									Yahoo Messenger<br/>
									<input type="text" name="yahoo" class="input-form" value="<?php echo $yahoo?>"/><br/>
									
									Twitter<br/>
									<input type="text" name="twitter" class="input-form" value="<?php echo $twitter?>"/><br/>
									<br/>
									
									Bio<br/>
									<textarea class="input-form" required name="bio" style="height:80px"><?php echo $bio?></textarea><br/>
									
									<br/>

									No. Telepon<br/>
									<input type="text" name="tlp" class="input-form" value="<?php echo $tlp?>"/><br/>
									<br/>
									
									Pin BB<br/>
									<input type="text" name="pin_bb" class="input-form" value="<?php echo $pin_bb?>"/><br/>

									<input type="checkbox" name="tampilkan_no_tlp" <?php if($tampilkan_no_tlp == 1) echo "checked";?>/> Tampilkan nomor telepon saya di iklan
									

									<br/><br/>

									<input type="submit" class="input-button" value="Update"/>
									


								</form>


							<hr/>

								Foto profil
								<div id="output" class="photo_profile">
									<?php
									if ($photo != "") {
										echo "<img src='".base_url()."uploads/profile/".$photo."' width='100%' height='100%'/>";
									}else{
										echo "belum ada pp";
									}
									?>
								</div>
								<form action="<?php echo base_url()?>index.php/user/upload_gambar" method="post" enctype="multipart/form-data" id="UploadForm">
										<input name="ImageFile" type="file" id="inputFile"/>
										<input type="submit"  id="SubmitButton" value="Upload" class="btn"/>
								</form>
								


								<!--
								<form action="<?php echo base_url()?>index.php/user/edit_photo" method="post" enctype="multipart/form-data" name="FormUpload" id="FormUpload">
									Foto<br/>

									<img src="<?php echo base_url()?>img/foto.png" height="80px" width="80px"/>
									<input type="file">
									<br/>
									<br/>
									<input type="button" class="input-button" value="upload foto"/>
								</form>
								-->

							</div><!-- content -->

						</div>
					</div>

					<div class="clear"></div>
					</div>

					<script> 



			$(document).ready(function() { 

					$('#UploadForm').on('submit', function(e) {
						e.preventDefault();
						$('#SubmitButton').attr('disabled', ''); // disable upload button
						//show uploading message
						$("#output").html('<div style="padding:10px"><img src="<?php echo base_url()?>img/ajax-loader.gif" alt="Please Wait"/> <span>Uploading...</span></div>');
						$(this).ajaxSubmit({
							target: '#output',
							success:  afterSuccess, //call function after success
						});
					});

				

			}); 



			function afterSuccess()  { 
				$('#SubmitButton').removeAttr('disabled'); //enable submit button

				$('#UploadForm').hide();

				
			} 

			function retryUpload(kode){
				$('#output'+kode).html("");
				$("#UploadForm"+kode).resetForm();
				$('#UploadForm'+kode).show();
			}


			</script>