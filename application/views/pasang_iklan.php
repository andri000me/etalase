
				<div id="kategori">
					<div class="kiri">
						<div class="container_3 border-g">
							<div class="content">
								<br/>
								
								FOTO
								<div id="Wrapper">

									<div align="center">
										<table class="table table-striped">

											<?php for ($i=1;$i <= 4; $i++) { ?>

											
											<!-- gambar 1 -->
											<tr>
												<td>
													<?php echo ($i==1?"<center><b>Gambar utama</b></center>":"");?>
													
														<form action="<?php echo base_url()?>index.php/iklan/upload_gambar/-1" method="post" enctype="multipart/form-data" id="UploadForm<?php echo $i?>">
															<input name="ImageFile" type="file" id="inputFile<?php echo $i?>"/>
															<input type="submit"  id="SubmitButton<?php echo $i?>" value="Upload" class="btn"/>
															<input type="hidden" name="posisi" value="<?php echo $i?>"/>
														</form>
													<div id="output<?php echo $i?>">
													</div>
												</td>
											</tr>

											<?php
												}
											?>

											
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

									<label class="radio inline">
										<input type="radio" name="tipe" value="1"/> Dicari
									</label>
									<label class="radio inline">
										<input type="radio" name="tipe" value="2"/> Dijual
									</label>
									<label class="radio inline">
										<input type="radio" name="tipe" value="3"/> Disewakan
									</label>
									<label class="radio inline">
										<input type="radio" name="tipe" value="4" required/> Jasa
									</label>
									<br/>
									<br/>

									Judul<br/>
									<input type="text" class="input-form-long" name="judul" required/><br/>
									
									<br/>

									Kategori<br/>
									<select class="input-form-long" required name="id_kategori" onChange="pilihKategoriTambahIklan('<?php echo base_url()?>');" id="select_kategori_tambah_iklan">
										<option value="">Pilih kategori</option>
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
									<select class="input-form-long" required name="id_sub_kategori" id="select_subkategori_tambah_iklan">
										<option value="">Pilihan sub kategori</option>
									</select>
									<br/>
									<br/>

									<b>Lokasi</b><br/>
									Provinsi<br/>
									<select class="input-form-long" required name="id_provinsi" onChange="pilihProvinsiTambahIklan('<?php echo base_url()?>');" id="select_provinsi_tambah_iklan">
										<option value="">Pilih provinsi</option>
										<?php 
										foreach ($provinsi as $k) {
										?>
										<option value="<?php echo $k->id_provinsi?>">
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
									</select>
									<br/>
									<br/>
									Harga<br/>
									<input type="text" class="input-form-long" name="harga"/><br/>
									<br/>

									Kondisi<br/>
									<select class="input-form-long" name="kondisi" required>
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
									<textarea class="input-form-long" name="deskripsi" rows="5" required></textarea>


									<br/>
									<b>Status nego</b>
									<br/>
									<label class="radio">
										<input type="radio" name="status_nego" value="1"/> Boleh nego
									</label>
									<label class="radio">
										<input type="radio" name="status_nego" value="0" required/> Tidak boleh nego
									</label>

									<br/><br/>
									<input type="checkbox" name="setuju" value="setuju" required/> Saya telah membaca persyaratan, setuju

									<input type="hidden" name="photo1" id="photo1" value=""/>
									<input type="hidden" name="photo2" id="photo2" value=""/>
									<input type="hidden" name="photo3" id="photo3" value=""/>
									<input type="hidden" name="photo4" id="photo4" value=""/>

									<br/><br/>

									<input type="submit" class="input-button" value="Tambah iklan" onSubmit="finalSubmit"/>
								</form>

							</div><!-- content -->

						</div>
					</div>

					<div class="clear"></div>
</div>
			<script> 

			$(document).ajaxComplete(function(event,request, settings) {
				for (kode = 1; kode <=4 ;kode++) {
					//masukkan nama gambar di form utama
					console.log("ini gambar" + $('#gambar_'+kode).attr('src'));
					var alamat = $("#gambar_" + kode).attr('src');

					if (alamat != null) {

						var fileNameIndex = alamat.lastIndexOf("/")+1;
						var fileName = alamat.substr(fileNameIndex);

						console.log("masukkan " + fileName);
						$('#photo'+kode).val(fileName);	
					}
					
				}
			});


			$(document).ready(function() { 


				<?php
				for ($i = 1; $i <=4;$i++ ) {
					?>
					$('#UploadForm<?php echo $i?>').on('submit', function(e) {
						e.preventDefault();
						$('#SubmitButton').attr('disabled', ''); // disable upload button
						//show uploading message
						$("#output<?php echo $i?>").html('<div style="padding:10px"><img src="<?php echo base_url()?>img/ajax-loader.gif" alt="Please Wait"/> <span>Uploading...</span></div>');
						$(this).ajaxSubmit({
							target: '#output<?php echo $i?>',
							success:  afterSuccess(<?php echo $i?>), //call function after success
						});
					});

					<?php
				}

				?>

				

			}); 



			function afterSuccess(kode)  { 
				$('#SubmitButton'+kode).removeAttr('disabled'); //enable submit button

				$('#UploadForm'+kode).hide();

				
			} 

			function hapusGambar(kode) {
				console.log("hapus gambar");
				console.log("hapus "+$("#gambar_"+kode).attr('src'));
				var alamat = $("#gambar_"+kode).attr('src');
				var fileNameIndex = alamat.lastIndexOf("/")+1;
				var fileName = alamat.substr(fileNameIndex);
				$.ajax({
					  url: "<?php echo base_url()?>"+"index.php/iklan/deleteImage/"+fileName,
					  cache: false
					}).done(function(msg) {
					  $('#output'+kode).html(msg);
					  $("#UploadForm"+kode).resetForm();
					  $('#UploadForm'+kode).show();
					  $('#photo'+kode).val("");
					});
					
			}

			function retryUpload(kode){
				$('#output'+kode).html("");
				$("#UploadForm"+kode).resetForm();
				$('#UploadForm'+kode).show();
			}


			</script> 
	