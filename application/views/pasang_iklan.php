
				<div id="profil-bar">

					<div id="profil-kiri" class="kiri">
						<div id="profil-photo">
							
						</div>
					</div>
					
					<div id="profil-kanan" class="kanan">

						<div class="kanan">
							<div class="container_1">
								<div class="content">
									<b>Cari di Etalase.com</b>
									<!-- Pencarian -->
									<form action="<?php echo base_url ()?>index.php/pasang_iklan/add_iklan" method="POST">
										Cari
										<input type="text" class="input-form">

										<select class="input-form">
											<?php echo $provinsi_model?>
										</select>

										<select class="input-form">
											<option>
												Pilihan sub kategori
											<option>
										</select>

										<input type="submit" class="input-button" value="Cari"/>
									</form>
								</div>
							</div>	
						</div>

					</div>
					
					

					<div class="clear"></div>
				</div>

				<div id="kategori">
					<div class="kiri">
						<div class="container_3 border-g">
							<div class="content">
								<br/>
								
								FOTO:
								<div id="Wrapper">

									<div align="center">
										<table border="1">

											<!-- gambar 1 -->
											<tr>
												<td>
													Gambar utama
													<div id="output1">
														<form action="<?php echo base_url()?>index.php/iklan/upload_gambar" method="post" enctype="multipart/form-data" id="UploadForm1">
															<input name="ImageFile" type="file" />
															<input type="submit"  id="SubmitButton" value="Upload" />
														</form>
													</div>
												</td>
											</tr>

											<!-- gambar 2 -->
											<tr>
												<td>
													<div id="output2">
														<form action="<?php echo base_url()?>index.php/iklan/upload_gambar" method="post" enctype="multipart/form-data" id="UploadForm2">
															<input name="ImageFile" type="file" />
															<input type="submit"  id="SubmitButton" value="Upload" />
														</form>
													</div>
												</td>
											</tr>

											<!-- gambar 3 -->
											<tr>
												<td>
													<div id="output3">
														<form action="<?php echo base_url()?>index.php/iklan/upload_gambar" method="post" enctype="multipart/form-data" id="UploadForm3">
															<input name="ImageFile" type="file" />
															<input type="submit"  id="SubmitButton" value="Upload" />
														</form>
													</div>
												</td>
											</tr>

											<!-- gambar 4 -->
											<tr>
												<td>
													<div id="output4">
														<form action="<?php echo base_url()?>index.php/iklan/upload_gambar" method="post" enctype="multipart/form-data" id="UploadForm4">
															<input name="ImageFile" type="file" />
															<input type="submit"  id="SubmitButton" value="Upload" />
														</form>
													</div>
												</td>
											</tr>
										</table>
									</div>
								</div>

							</div> <!-- Content -->
						</div> <!-- container_2 -->
					</div>

					<div class="kanan">
						<div class="container_2p3 border-g">
							<div class="content">
								<br/>

								<?php echo form_open("iklan/proses_pasang")?>


									
									Tipe iklan:<br/>

									<input type="radio" name="tipe" value="1"/> Dicari
									<input type="radio" name="tipe" value="2"/> Dijual
									<input type="radio" name="tipe" value="3"/> Disewakan
									<input type="radio" name="tipe" value="4"/> Jasa

									<br/>
									<br/>

									Judul<br/>
									<input type="text" class="input-form-long" name="judul"/><br/>
									
									<br/>

									Kategori<br/>
									<select class="input-form-long" name="id_kategori" onChange="pilihKategoriTambahIklan('<?php echo base_url()?>');" id="select_kategori_tambah_iklan">
										<option value="-1">Pilih kategori</option>
										<?php 
										foreach ($kategori as $k) {
										?>
										<option value="<?php echo $k->id_kategori?>">
											<?php echo $k->nama_kategori?>
										</option>
										<?
										}
										?>
									</select>
									<br/>
									Sub Kategori<br/>
									<select class="input-form-long" name="id_sub_kategori" id="select_subkategori_tambah_iklan">
										<option value="-1">Pilihan sub kategori</option>
									</select>
									<br/>

									<br/>
									Harga<br/>
									<input type="text" class="input-form-long" name="harga"/><br/>
									<br/>

									Kondisi<br/>
									<select class="input-form-long" name="kondisi">
										<option value="1">
											Baru
										</option>
										<option value="2">
											Bekas
										</option>
									</select>
									<br/>

									<br/>
									Deskripsi<br/>
									<textarea class="input-form-long" name="deskripsi"></textarea>


									<br/>
									Status nego<br/>
									<input type="radio" name="status_nego" value="1"/> Boleh nego
									<input type="radio" name="status_nego" value="0"/> Tidak boleh nego

									<br/><br/>
									<input type="checkbox" name="setuju" value="setuju"/> Saya telah membaca persyaratan, setuju


									<br/><br/>

									<input type="submit" class="input-button" value="Tambah iklan"/>
								</form>

							</div><!-- content -->

						</div>
					</div>

					<div class="clear"></div>
</div>
			<script> 
			$(document).ready(function() { 
				$('#UploadForm1').on('submit', function(e) {
					e.preventDefault();
					$('#SubmitButton').attr('disabled', ''); // disable upload button
					//show uploading message
					$("#output1").html('<div style="padding:10px"><img src="<?php echo base_url()?>img/ajax-loader.gif" alt="Please Wait"/> <span>Uploading...</span></div>');
					$(this).ajaxSubmit({
						target: '#output1',
						success:  afterSuccess //call function after success
					});
				});

				$('#UploadForm2').on('submit', function(e) {
					e.preventDefault();
					$('#SubmitButton').attr('disabled', ''); // disable upload button
					//show uploading message
					$("#output2").html('<div style="padding:10px"><img src="<?php echo base_url()?>img/ajax-loader.gif" alt="Please Wait"/> <span>Uploading...</span></div>');
					$(this).ajaxSubmit({
						target: '#output2',
						success:  afterSuccess //call function after success
					});
				});

				$('#UploadForm3').on('submit', function(e) {
					e.preventDefault();
					$('#SubmitButton').attr('disabled', ''); // disable upload button
					//show uploading message
					$("#output3").html('<div style="padding:10px"><img src="<?php echo base_url()?>img/ajax-loader.gif" alt="Please Wait"/> <span>Uploading...</span></div>');
					$(this).ajaxSubmit({
						target: '#output3',
						success:  afterSuccess //call function after success
					});
				});

				$('#UploadForm4').on('submit', function(e) {
					e.preventDefault();
					$('#SubmitButton').attr('disabled', ''); // disable upload button
					//show uploading message
					$("#output4").html('<div style="padding:10px"><img src="<?php echo base_url()?>img/ajax-loader.gif" alt="Please Wait"/> <span>Uploading...</span></div>');
					$(this).ajaxSubmit({
						target: '#output4',
						success:  afterSuccess //call function after success
					});
				});
			}); 

			function afterSuccess()  { 
				$('#UploadForm').resetForm();  // reset form
				$('#SubmitButton').removeAttr('disabled'); //enable submit button

			} 
			</script> 
	