	<?php
	//AMBIL DATA MENU DARI KONFIGURASI 
	$nav_menu		= $this->konfigurasi_model->nav_menu();
	$nav_menu_mobile	= $this->konfigurasi_model->nav_menu();

	?>
	<div class="wrap_header">
		<!-- Logo -->
		<a href="<?php echo base_url('home') ?>" class="logo">
			<img src="<?php echo base_url('assets/upload/image/thumbs/' . $site->logo) ?>"  width="300px" height="100px">
		</a>

		<!-- Menu -->
		<div class="wrap_menu" style="padding-left: 300px;">
			<nav class="menu">
				<ul class="main_menu">
					<li>
						<!-- menu home -->
						<a href="<?php echo base_url() ?>">BERANDA</a>
					</li>


					<!-- MENU MAKANAN DAN KATEGORI MENU -->
					<li>
						<a href="<?php echo base_url('menu') ?>">KATEGORI MENU</a>
						<ul class="sub_menu">
							<?php foreach ($nav_menu as $nav_menu) { ?>
								<li><a href="<?php echo base_url('menu/kategori/' . $nav_menu->slug_kategori) ?>">
										<?php echo $nav_menu->nama_kategori ?>
									</a></li>
							<?php } ?>
						</ul>
					</li>



					</li>

					<li>
						<a href="<?php echo base_url('home/kontak') ?>">KONTAK KAMI</a>
					</li>
					<li>
						<a href="<?php echo base_url('home/panduan') ?>">INFORMASI PEMESANAN</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="wrap_menu"  style="padding-left: 150px;">
			<nav class="menu" >
				<ul class="main_menu" >
					<?php if($this->session->userdata('email')) { ?>
					<li>
						<a href="#" >
						<img src="<?php echo base_url() ?>assets/assets_frontend/images/icons/icon-header-01.png" class="header-icon1" alt="ICON"> <?php echo $this->session->userdata('nama_pelanggan'); ?>&nbsp;
						</a>
						<ul class="sub_menu">
							
							<li>
								<a href="<?php echo base_url('dasbor') ?>">Dashboard Pelanggan</a>
							</li>
							<li>
								<a href="<?php echo base_url('masuk/logout') ?>">Logout</a>
							</li>
							
						</ul>
					</li>
					<?php 
					}
					else
					{ 
					?>
					<a href="<?php echo base_url('masuk') ?>" >Login</a>

					<?php } ?>
				</ul>
			</nav>
		</div>
			<span class="linedivide1"></span>

			<div class="header-wrapicon2">
				<?php
				//cek belanajaan ada ga
				$keranjang = $this->cart->contents();
				?>
				<img src="<?php echo base_url() ?>assets/assets_frontend/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
				<span class="header-icons-noti"><?php echo count($keranjang) ?></span>

				<!-- Header cart noti -->
				<div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
						<?php if (empty($keranjang)) : ?>
							<li class="header-cart-item">
								<p class="alert alert-success">Keranjang belanja kosong</p>
							</li>
						<?php else : ?>
							<?php

							foreach ($keranjang as $key => $value) :

								//$id_menu = $value['id'];
								//$menunya = $this->menu_model->detail($id_menu);
							?>
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url() . 'assets/upload/image/thumbs/' . $value['img'] ?>" alt="">
									</div>

									<div class="header-cart-item-txt">
										<?php echo $value['name'] ?>
										</a>

										<span class="header-cart-item-info">
											<?php echo $value['qty'] ?> x Rp. <?php echo number_format($value['price'], '0', ',', '.') ?>
										</span>
									</div>
								</li>
							<?php endforeach ?>
						<?php endif ?>

					</ul>

					<div class="header-cart-total">
						Total: <?php echo 'Rp' . number_format($this->cart->total(), '0', ',', '.') ?>
					</div>

					<div class="header-cart-buttons">
						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="<?php echo base_url('belanja') ?>" class="flex-c-m size2 bg1 bo-rad-20 hov1 s-text1 trans-0-4 text-center">
								lihat Keranjang
							</a>
						</div>

						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="<?php echo base_url('belanja/checkout') ?>" class="flex-c-m size2 bg1 bo-rad-20 hov1 s-text1 trans-0-4 text-center">
								Bayar Semua
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

	<!-- Header Mobile -->
	<div class="wrap_header_mobile">
		<!-- Logo moblie -->
		<a href="<?php echo base_url() ?>" class="logo-mobile">
			<img src="<?php echo base_url('assets/upload/image/thumbs/' . $site->logo) ?>"  width="100px" height="200px">
		</a>
		<!-- Button show menu -->
		<div class="btn-show-menu">
			<!-- Header Icon mobile -->
			<div class="header-icons-mobile">
				<a href="<?php echo base_url('masuk') ?>" class="header-wrapicon1 dis-block">
					<img src="<?php echo base_url() ?>assets/assets_frontend/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
				</a>

				<span class="linedivide2"></span>

				<div class="header-wrapicon2">
					<?php
					//cek belanajaan ada ga
					$keranjang = $this->cart->contents();
					?>
					<img src="<?php echo base_url() ?>assets/assets_frontend/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
					<span class="header-icons-noti"><?php echo count($keranjang) ?></span>

					<!-- Header cart noti -->
					<div class="header-cart header-dropdown">
						<ul class="header-cart-wrapitem">
							<?php if (empty($keranjang)) : ?>
								<li class="header-cart-item">
									<p class="alert alert-success">Keranjang belanja kosong</p>
								</li>
							<?php else : ?>
								<?php

								foreach ($keranjang as $key => $value) :
								?>
									<li class="header-cart-item">
										<div class="header-cart-item-img">
											<img src="<?php echo base_url() . 'assets/upload/image/thumbs/' . $value['img'] ?>" alt="">
										</div>

										<div class="header-cart-item-txt">
											<a href="#" class="header-cart-item-name">
												<?php echo $value['name'] ?>
											</a>

											<span class="header-cart-item-info">
												<?php echo $value['qty'] ?> x Rp. <?php echo number_format($value['price'], '0', ',', '.') ?>
											</span>
										</div>
									</li>
								<?php endforeach ?>
							<?php endif ?>
						</ul>

						<div class="header-cart-total">
							Total: <?php echo 'Rp' . number_format($this->cart->total(), '0', ',', '.') ?>
						</div>

						<div class="header-cart-buttons">
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="<?php echo base_url('belanja') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									Lihat Keranjang
								</a>
							</div>

							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="<?php echo base_url('belanja/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									Bayar Semua
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>
	</div>

	<!-- Menu Mobile -->
	<div class="wrap-side-menu">
		<nav class="side-menu">
			<ul class="main-menu">
				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<span class="topbar-child1">
						<?php echo $site->alamat ?>
					</span>
				</li>

				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<div class="topbar-child2-mobile">
						<span class="topbar-email">
							<?php echo $site->email ?>
						</span>

						<div class="topbar-language rs1-select2">
							<select class="selection-1" name="time">
								<option><?php echo $site->telepon ?></option>
								<option><?php echo $site->email ?></option>
							</select>
						</div>
					</div>
				</li>

				<li class="item-topbar-mobile p-l-10">

					<div class="topbar-social-mobile">
						<a href="<?php echo $site->facebook ?>" class="topbar-social-item fa fa-facebook"></a>
						<a href="<?php echo $site->instagram ?>" class="topbar-social-item fa fa-instagram"></a>
					</div>
				</li>
				<!-- MENU MOBILE HOMEPAGE -->
				<li class="item-menu-mobile">
					<a href="<?php echo base_url() ?>">BERANDA</a>
				</li>
				<!-- MENU MOBILE MENU MAKANAN -->
				<li class="item-menu-mobile">
					<a href="<?php echo base_url('menu') ?>">KATEGORI MENU</a>
					<ul class="sub-menu">
						<?php foreach ($nav_menu_mobile as $nav_menu_mobile) { ?>

							<li><a href="<?php echo base_url('menu/kategori/' . $nav_menu_mobile->slug_kategori) ?>">
									<?php echo $nav_menu_mobile->nama_kategori ?>
								</a></li>
						<?php } ?>








						<li class="item-menu-mobile">

					</ul>
					<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
				</li>


				<!-- menu kontak mobile -->
				<li class="item-menu-mobile">
					<a href="<?php echo base_url('kontak') ?>">KONTAK KAMI</a>
				</li>
				<li class="item-menu-mobile">
						<a href="<?php echo base_url('panduan') ?>">INFORMASI PEMESANAN</a>
					</li>
				</ul>
			</nav>
		
			</ul>
		</nav>
	</div>
	</header>