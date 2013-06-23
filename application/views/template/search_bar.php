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

										Kategori
										<select required name="id_provinsi" onChange="pilihProvinsiTambahIklan('<?php echo base_url()?>');" id="select_provinsi_tambah_iklan">
											<option value="">Pilih kategori</option>
											<?php 
											foreach ($kategori_list_search as $k) {
											?>
											<option value="<?php echo $k->id_kategori?>">
												<?php echo $k->nama_kategori?>
											</option>
											<?
											}
											?>
										</select>
										
										Provinsi
										<select required name="id_kota" id="select_kota_tambah_iklan">
											<option value="">Pilihan provinsi</option>
											<?php 
											foreach ($provinsi_list_search as $k) {
											?>
											<option value="<?php echo $k->id_provinsi?>">
												<?php echo $k->nama_provinsi?>
											</option>
											<?
											}
											?>
										</select>
											&nbsp
											<input type="submit" class="input-button" value="Cari"/>
									</form>
								</div>
							</div>	
						</div>

					</div>
					
					

					<div class="clear"></div>
				</div>