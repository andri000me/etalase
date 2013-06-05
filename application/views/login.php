
				<div id="kategori">
					<div class="kiri">
						<div class="container_2">
							<div class="content">

								<h1>Mari bergabung!</h1>

								<center>
									<img src="<?php echo base_url()?>img/logo_full.png" width="150px"/>
								</center>
								<br/>
								Anda belum tergabung dengan Etalase? Bergabunglah <a href="<?php echo base_url()?>index.php/user/daftar">disini</a>
							</div> <!-- Content -->
						</div> <!-- container_2 -->
					</div>

					<div class="kanan">
						<div class="container_2">
							<div class="content">
								<!-- Login -->
								<h1>Login</h1>
								<?php echo $error?>
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