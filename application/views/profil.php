				<div id="kategori">

					<div class="kiri">
						<div class="container_3 border-g">
							<div class="content">

								<center>
								<?php 
									echo "<img src='".base_url()."uploads/profile/".$data_user->photo."' width='100%' height='100%' class='photo_profile img-polaroid'/>";
								?>
								<h3><?php echo $data_user->username ?></h3>

								<?php echo $data_user->bio ?>
								</center>

								<hr/>

								<span class="info_small">Nama lengkap</span><br/>
								<b><?php echo $data_user->nama_lengkap ?></b>
								<br/>

								<span class="info_small">Provinsi</span><br/>
								<b>
								<?php 
								$provinsi = $this->provinsi_model->get_provinsi_by_id($data_user->id_provinsi)->nama_provinsi;
								echo $provinsi; ?>
								</b>
								<br/>

								<span class="info_small">Kabupaten/kota</span><br/>
								<b>
								<?php 
								$provinsi = $this->kota_model->get_kota_by_id($data_user->id_kabkota)->nama_kota;
								echo $provinsi; ?>
								</b>
								<br/>
								<hr/>
								<span class="info_small">Facebook</span><br/>
								<b><?php echo $data_user->fb ?></b>

								<br/>

								<span class="info_small">Yahoo!</span><br/>
								<b><?php echo $data_user->yahoo ?></b>

								<br/>

								<span class="info_small">twitter</span><br/>
								<b><?php echo $data_user->twitter ?></b>

								<br/>

								<span class="info_small">pin bb</span><br/>
								<b><?php echo $data_user->pin_bb ?></b>

								<br/>

								Nomor Telepon<br/>
								<span class='judul_user'><?php echo ($data_user->tampilkan_no_tlp=="1"?$data_user->tlp:"-")?></span><br/>

								<hr/>
								<span class="info_small">Tanggal bergabung</span><br/>
								<b><?php echo $data_user->tgl_gabung ?></b>

								<br/>

								<?php if ($this->session->userdata('uid') == $data_user->id_user){ ?>
									<br/>
									<a href="<?php echo base_url()."index.php/user/edit_profil"?>">
										Edit profil
									</a>
								<?php } ?>
							</div> <!-- Content -->
						</div> <!-- container_3 -->
					</div>

					<div class="kanan">

						<div class="container_2p3 border-g">
							<div class="content">
							
								<!-- List iklan terpasang -->

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
												<img src="<?php echo base_url().($data->photo1!=""?"uploads/".$data->photo1:"img/empty_pic.png")?>" width="100%" height="100%">
											</div>
										</div>


										
										<div class="kiri content info_iklan">
											<b><a href="<?php echo base_url()."index.php/iklan/detail/".$data->id_iklan?>"><?php echo $data->judul?></a></b><br/>
											<span class="info_small"><?php echo $tipe?></span><br/>
											<span class="info_small"><?php echo $lokasi->nama_kota?></span><br/>
											<span class="info_small"><?php echo $data->kondisi?></span><br/>
											<span class="info_small"><?php echo $data->waktu_tayang?></span><br/>
										</div>				

										<div class="kanan rata-kanan">
											<b>Rp <?php echo $data->harga?></b>
											<br/>

											<?php if ($this->session->userdata('uid') == $data_user->id_user){ ?>
											<div class="btn-group">
												  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
												  Pengaturan iklan  <span class="caret"></span>
												  </a>
												  <ul class="dropdown-menu rata-kiri">
												    <li>
												    	<a href="<?php echo base_url()."index.php/iklan/edit/".$data->id_iklan?>"><i class='icon-edit'></i> Edit iklan</a>
												    </li>
												    <li>
												    	<a href="#"><i class='icon-trash'></i> Hapus iklan</a>
												    </li>
												  </ul>
											</div>
											<?php } ?>

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
