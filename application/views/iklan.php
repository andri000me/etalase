					
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
									<form>
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
						<div class="container_2p3 border-g">
							<div class="content">

								<!-- Judul di atas iklan -->

								<?php echo $konten_detail_iklan ?>

								
							</div> <!-- Content -->
						</div> <!-- container_2 -->
					</div>

					<div class="kanan">
							<div class="container_3 border-g">

								<?php echo $konten_info_iklan ?>
								<!-- <div class="content">

									HARGA

									<hr/>
									<div class="kiri">
										<img src="<?php echo base_url()?>img/foto.png" height="80px" width="80px"/>
									</div>
									<div class="kiri content" id="iklan_userabout">
										<span class="judul_user"><a href="#">username</a></span><br/>
										<span class="info_small">Member sejak: 2 Agustus 2010</span>
									</div>

									<div class="clear"></div>
									<br/>
									Nomor Telepon<br/>
									<span class="judul_user">085251059399</span><br/>
									
								</div> -->
							</div> <!-- container_2 -->
						</div>



					<div class="clear"></div>
					</div>