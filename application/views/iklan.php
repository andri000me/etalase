					
				

				<div id="kategori">
					<div class="kiri">
						<div class="container_2p3 border-g">
							<div class="content">

								<!-- Judul di atas iklan -->

								<span class='judul_iklan'><?php echo $data_iklan->judul ?></span><br/>
								<div id='keterangan_iklan'>
									<div class='kiri'>
										<span class='info_small'>Lokasi:</span>
										<b>
											<span class='info_small'><?php echo $provinsi->nama_provinsi?></span>,
											<span class='info_small'><?php echo $kota->nama_kota?></span>
										</b>
										<br/>
										<span class='info_small'>Kategori:</span>
										<b>
											<span class='info_small'><?php echo $kategori->nama_kategori?></span>
										</b>
										<br/>
										<span class='info_small'>Kondisi:</span>
										<b>
											<span class='info_small'><?php echo ($data_iklan->kondisi=="1"?"baru":"bekas");?></span>
										</b>
										<br/>
										<b>
											<span class='info_small'><?php echo $data_iklan->waktu_tayang?></span>&nbsp&nbsp&nbsp&nbsp
										</b>
									</div>

									<div class='kanan'>
										<span class='info_small'>Nomor iklan: <b><?php echo$data_iklan->id_iklan?></b></span>
									</div>
								</div>

								<div class='clear'></div>

								<hr/>
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
								    <div class="active item"><img src="<?php echo base_url().($data_iklan->photo1 !=""?"uploads/".$data_iklan->photo1:"img/empty_pic_long.png")?>"></div>
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

								<?php echo nl2br($data_iklan->deskripsi);?>

								
							</div> <!-- Content -->
						</div> <!-- container_2 -->
					</div>

					<div class="kanan">
							<div class="container_3 border-g">

								<div class='content'>

									<h3>Rp <?php echo $data_iklan->harga?></h3>
									<?php echo ($data_iklan->status_nego==1?"bisa nego":"tidak bisa nego")?>
									<hr/>
							
									<div class='kiri content' id='iklan_userabout'>
										<center>
											<?php 
												echo "<img src='".base_url()."uploads/profile/".$pembuat_iklan->photo."' width='100%' height='100%' class='photo_profile img-polaroid'/>";
											?>
											<h3>
												<a href="<?php echo base_url()."index.php/user/p/".$pembuat_iklan->id_user?>">
												<?php echo $pembuat_iklan->username ?>
												</a>
											</h3>
										</center>
											<hr/>
											<span class="info_small">Facebook</span><br/>
											<b><?php echo $pembuat_iklan->fb ?></b>

											<br/>

											<span class="info_small">Yahoo!</span><br/>
											<b><?php echo $pembuat_iklan->yahoo ?></b>

											<br/>

											<span class="info_small">twitter</span><br/>
											<b><?php echo $pembuat_iklan->twitter ?></b>

											<br/>

											<span class="info_small">pin bb</span><br/>
											<b><?php echo $pembuat_iklan->pin_bb ?></b>

											<hr/>

										
									</div>

									<div class='clear'></div>
									<br/>
									Nomor Telepon<br/>
									<span class='judul_user'><?php echo ($pembuat_iklan->tampilkan_no_tlp=="1"?$pembuat_iklan->tlp:"-")?></span><br/>
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