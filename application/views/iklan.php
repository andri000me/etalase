					
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

								<span class='judul_iklan'><?php echo $data_iklan->judul ?></span><br/>
								<div id='keterangan_iklan'>
									<div class='kiri'>
										<span class='info_small'><?php echo $data_iklan->id_provinsi?></span>&nbsp&nbsp&nbsp&nbsp
										<span class='info_small'><?php echo ($data_iklan->kondisi=="1"?"baru":"bekas");?></span>&nbsp&nbsp&nbsp&nbsp
										<span class='info_small'><?php echo $data_iklan->waktu_tayang?></span>&nbsp&nbsp&nbsp&nbsp
									</div>

									<div class='kanan'>
										<span class='info_small'>Nomor iklan: <b><?php echo$data_iklan->id_iklan?></b></span>
									</div>
								</div>

								<div class='clear'></div>

								<hr/>

								Foto produk
								<div id="myCarousel" class="carousel slide">
									<ol class="carousel-indicators">
										<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
										<?php for ($i=2; $i <= 4; $i++){
									    	if($data_iklan->{"photo".$i} != "") {
									    		?>
									    		<li data-target="#myCarousel" data-slide-to="<?php echo $i?>"></li>
									    		<?php
									    	}
								    	}
								    	?>
									    
									  </ol>
								  <!-- Carousel items -->
								  <div class="carousel-inner">
								    <div class="active item"><img src="<?php echo base_url()?>uploads/<?php echo $data_iklan->photo1?>"></div>
								    <?php for ($i=2; $i <= 4; $i++){

								    	if($data_iklan->{"photo".$i} != "") {
								    		?>
								    		<div class="item"><img src="<?php echo base_url()?>uploads/<?php echo $data_iklan->{"photo".$i}?>"></div>
								    	<?php
								   		 }
									}

								    ?>
								  </div>
								  <!-- Carousel nav -->
								  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
								  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
								</div>
								<hr/>
								<br/>

								<?php echo $data_iklan->deskripsi;?>

								
							</div> <!-- Content -->
						</div> <!-- container_2 -->
					</div>

					<div class="kanan">
							<div class="container_3 border-g">

								<div class='content'>

									<?php echo $data_iklan->harga?>

									<hr/>
									<div class='kiri'>
										<img src='<?php echo base_url()?>img/foto.png' height='80px' width='80px'/>
									</div>
									<div class='kiri content' id='iklan_userabout'>
										<span class='judul_user'><a href='#'>username</a></span><br/>
										<span class='info_small'>Member sejak: 2 Agustus 2010</span>
									</div>

									<div class='clear'></div>
									<br/>
									Nomor Telepon<br/>
									<span class='judul_user'>085251059399</span><br/>
								</div>
							</div> <!-- container_2 -->
						</div>



					<div class="clear"></div>
					</div>



					<script>
						$('.carousel').carousel({
							interval: false
						});
					</script>