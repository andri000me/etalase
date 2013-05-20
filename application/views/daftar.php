
					
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
						<div class="container_2">
							<div class="content">
								<br/>
								<b>Etalase</b>
								<br/>
								partner anda dalam berdagang
								<br/><br/>
								<center>
									<img src="<?php echo base_url()?>img/logo_full.png" width="150px"/>
								</center>
							</div> <!-- Content -->
						</div> <!-- container_2 -->
					</div>

					<div class="kanan">
						<div class="container_2">
							<div class="content">
								<!-- Daftar -->
								<h1>Daftar</h1>
									
								<form action="user_daftar" method="post">
									Username<br/>
									<input type="text" name="username" class="input-form"/><br/>
									Email<br/>
									<input type="text" name="email" class="input-form"/><br/>
									Password<br/>
									<input type="password" name="password" class="input-form"/><br/>
									Password lagi<br/>
									<input type="password" name="password2" class="input-form"/><br/>
									<input type="submit" class="input-button" value="Simpan"/>


								</form>
							</div><!-- content -->

						</div>
					</div>

					<div class="clear"></div>

		</div>