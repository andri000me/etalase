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
									<?php
										$now_nama_search = $this->input->get("nama_search");
										$now_id_kategori = $this->input->get("id_provinsi");
										$now_id_kota = $this->input->get("id_kota");
									?>
									<form action="<?php echo base_url()?>index.php/iklan/search" method="GET">
										Cari
										<input type="text" class="input-form" name="nama_search" value = "<?php echo $now_nama_search?>"/>

										Kategori
										<select required name="id_kategori" id="select_provinsi_tambah_iklan">
											<option value="">Pilih kategori</option>
											<?php 
											foreach ($kategori_list_search as $k) {
											?>
											<option value="<?php echo $k->id_kategori?>"  <?php if($now_id_kategori == $k->id_kategori) echo "selected";?> >
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
											<option value="<?php echo $k->id_provinsi?>"  <?php if($now_id_kota == $k->id_provinsi) echo "selected";?> >
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