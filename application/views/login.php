
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
											<option>
												Pilihan kategori
											<option>
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

								<h1>Mari bergabung!</h1>

								<center>
									<img src="<?php echo base_url()?>img/logo_full.png" width="150px"/>
								</center>
								<br/>
								Anda belum tergabung dengan Etalase? Bergabunglah <a href="user/daftar">disini</a>
							</div> <!-- Content -->
						</div> <!-- container_2 -->
					</div>

					<div class="kanan">
						<div class="container_2">
							<div class="content">
								<!-- Login -->
								<h1>Login</h1>

								<form method="POST" action="<?php echo base_url()?>index.php/login/proses_login">
									Username<br/>
									<input type="text" name="username" class="input-form"/><br/>
									Password<br/>
									<input type="password" name="password" class="input-form"/><br/>
									<input type="submit" class="input-button" value="Login"/>


								</form>
							</div><!-- content -->

						</div>
					</div>

					<div class="clear"></div>

</div>