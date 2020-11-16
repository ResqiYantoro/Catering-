<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="<?php echo base_url() ?>" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="<?php echo base_url('menu') ?>" class="s-text16">
			Menu Makanan
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>


		<span class="s-text17">
			<?php echo $title ?>
		</span>
	</div>
	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					

							<div class="wrap-pic-w">
								<img src="<?php echo base_url('assets/upload/image/thumbs/'.$menu->gambar) ?>">
							</div>
						
					
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h1 class="product-detail-name m-text20 p-b-13">
					<?php echo $title ?>
				</h1>
				<?php 
				echo form_open(base_url('belanja/add')); 

			echo form_hidden('id', $menu->id_menu);
			//echo form_hidden('qty', 1);
			echo form_hidden('price', $menu->harga);
			echo form_hidden('name', $menu->nama_menu); // 
			echo form_hidden('img', $menu->gambar);

			//elemen redirect
			echo form_hidden('redirect_page', str_replace('index.php/','',current_url())); 
			
			?>
				<span class="m-text14">
					IDR <?php echo number_format($menu	->harga,'0',',','.') ?>
				</span>
				<p class="m-text14">KODE MENU : <?php echo $menu->kode_menu ?></p>
				
				<p class="s-text8 p-t-10">
					<?php echo $menu->keterangan ?>
				</p>

				<!--  -->
				
					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<button type="submit" name="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Tambahkan keranjang
								</button>
							</div>
						</div>
					</div>
				</div>
			<?php 
			//closing form
			echo form_close();
			 ?>
			</div>
		</div>


				
	
		</div>
	</section>
