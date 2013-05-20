
					
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
						<div class="container_1 border-g">
							<div class="content">
							
								<!-- iklan -->
								<!-- <div class="card">
									<div class="content">
										<div class="kiri">
											<div class="photo border-g">
											</div>
										</div>

										<div class="kiri content info_iklan">
											<b><a href="#">Nama Iklan</a></b><br/>
											<span class="info_small">Lokasi</span><br/>
											<span class="info_small">Kondisi</span><br/>
											<span class="info_small">Harga</span><br/>
											<span class="info_small">Waktu Tayang</span><br/>
										</div>

										<div class="kanan">
											<b>Rp 2.000.000</b>
										</div>

										<div class="clear"></div>
									</div>
								</div> -->

								<?php echo $list_iklan ?>

							</div> <!-- Content -->
						</div> <!-- container_2 -->
					</div>



					<div class="clear"></div>
</div>