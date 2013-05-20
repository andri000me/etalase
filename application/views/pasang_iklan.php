
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
								
							</div> <!-- Content -->
						</div> <!-- container_2 -->
					</div>

					<div class="kanan">
						<div class="container_2p3 border-g">
							<div class="content">
								<br/>

								<!-- Form profil -->


								<form>
									
									Tipe iklan:<br/>

									<input type="radio" name="tipe"/> Dicari
									<input type="radio" name="tipe"/> Dijual
									<input type="radio" name="tipe"/> Disewakan
									<input type="radio" name="tipe"/> Jasa

									<br/>
									<br/>

									Judul<br/>
									<textarea class="input-form-long" style="height:80px"></textarea><br/>
									
									<br/>

									Kategori<br/>
									<select class="input-form-long">
										<option>
											Pilihan sub kategori
										<option>
									</select>
									<br/>
									Sub Kategori<br/>
									<select class="input-form-long">
										<option>
											Pilihan sub kategori
										<option>
									</select>
									<br/>

									<br/>
									Harga<br/>
									<input type="text" class="input-form-long"/><br/>
									<br/>

									Kondisi<br/>
									<select class="input-form-long">
										<option>
											Pilihan sub kategori
										<option>
									</select>
									<br/>

									<br/>
									Deskripsi<br/>
									<textarea class="input-form-long"></textarea>


									<br/><br/>
									<input type="checkbox"/> Saya telah membaca persyaratan, setuju


									<br/><br/>

									<input type="submit" class="input-button" value="Update"/>
									


								</form>
							</div><!-- content -->

						</div>
					</div>

					<div class="clear"></div>
</div>