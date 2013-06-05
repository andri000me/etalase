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
						<div class="container_3 border-g">
							<div class="content">

								<?php echo $username ?>

								<br/>
									<a href="edit_profil">
								Edit profil
									</a>
							</div> <!-- Content -->
						</div> <!-- container_3 -->
					</div>

					<div class="kanan">

						<div class="container_2p3 border-g">
							<div class="content">
							
								<?php

										foreach ($data_iklan as $data) {
											$lokasi = $this->kota_model->get_kota_by_id($data->id_kota);
											$tipe = "";
											$kondisi = "";
											switch ($data->tipe) {
												case 1:
													$tipe = "dicari";
													break;
												case 2:
													$tipe = "dijual";
													break;
												case 3:
													$tipe = "disewakan";
													break;
												case 4:
													$tipe = "jasa";
													break;
											}

											switch($data->kondisi){
												case 1:
													$kondisi = "baru";
													break;
												case 2:
													$kondisi = "bekas";
													break;
											}
											?>
								<!-- iklan -->
								<div class="card">
									<div class="content">
										<div class="kiri">
											<div class="photo border-g">
											</div>
										</div>


										
										<div class="kiri content info_iklan">
											<b><a href="#"><?php echo $data->judul?></a></b><br/>
											<span class="info_small"><?php echo $tipe?></span><br/>
											<span class="info_small"><?php echo $lokasi->nama_kota?></span><br/>
											<span class="info_small"><?php echo $data->kondisi?></span><br/>
											<span class="info_small"><?php echo $data->waktu_tayang?></span><br/>
										</div>				

										<div class="kanan">
											<b>Rp <?php echo $data->harga?></b>
										</div>

										<div class="clear"></div>
									</div>
								</div>
								<?php
								}
								?>

							</div> <!-- Content -->
						</div> <!-- container_2 -->
					</div>



					<div class="clear"></div>
				</div>
