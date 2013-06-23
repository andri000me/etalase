				<div id="kategori">
					<div class="kiri">
						<div class="container_1 border-g">
							<div class="content">
								
								<?php echo $this->table->generate($records); ?>
								<?php echo $this->pagination->create_links(); ?>
								
								<h1><?php echo $nama_kategori?></h1>


								<?php foreach ($data_iklan as $dai){ 
								$provinsi = $this->provinsi_model->get_provinsi_by_id($dai->id_provinsi);
								$tipe = "";
								switch($dai->tipe){
									case 1:
									$tipe = "Dicari";
									break;
									case 2:
									$tipe = "Dijual";
									break;
									case 3:
									$tipe = "Disewakan";
									break;
									case 4:
									$tipe = "Jasa";
									break;
									}
								?>
									<div class='card'>
										<div class='content'>
												<div class='kiri'>
												<div class='photo border-g'>
													<img src="<?php echo base_url().($dai->photo1!=""?"uploads/".$dai->photo1:"img/empty_pic.png")?>" width="100%" height="100%">
												</div>
											</div>
					
											<div class='kiri content info_iklan'>
											<b><a href='<?php echo base_url()."index.php/iklan/detail/".$dai->id_iklan?>'><?php echo $dai->judul ?></a></b><br/>
												<span class='info_small'><b><?php echo $tipe?></b></span><br/>
												<span class='info_small'>Provinsi: <?php echo $provinsi->nama_provinsi?></span><br/>
												<span class='info_small'>Kondisi: <?php echo ($dai->kondisi==1?"baru":"bekas")?></span><br/>
												<span class='info_small'><?php echo $dai->waktu_tayang?></span><br/>
											</div>

											<div class='kanan'>
												<b>Rp <?php echo $dai->harga?></b>
											</div>

											<div class='clear'></div>
										</div>
									
									</div>
								<?php }?>

					
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


							</div> <!-- Content -->
						</div> <!-- container_2 -->
					</div>



					<div class="clear"></div>
</div>