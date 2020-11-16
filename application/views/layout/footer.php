<?php 
//load data konfigurasi_website
$site				= $this->konfigurasi_model->listing();
$nav_menu_footer	= $this->konfigurasi_model->nav_menu();
 ?>

<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					KONTAK KAMI 
				</h4>

				<div>
					<p class="s-text7 w-size27">
						<?php echo nl2br($site->alamat) ?>
						<br><i class="fa fa-envelope"></i> <?php echo $site->email  ?>
						<br><i class="fa fa-phone"></i> <?php echo $site->telepon  ?>
					</p>

					<div class="flex-m p-t-30">
						<a href="<?php echo $site->facebook ?>" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="<?php echo $site->instagram ?>" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Kategori  Makanan 
				</h4>

				<ul>
					<?php foreach ($nav_menu_footer as $nav_menu_footer) { ?>
					<li class="p-b-9">
						<a href="<?php echo base_url('menu/kategori/'.$nav_menu_footer->slug_kategori)?>" class="s-text7">
							<?php echo $nav_menu_footer->nama_kategori ?>
						</a>
					</li>
					<?php } ?>
					
				</ul>
			</div>

			<br>

		<div class="t-center p-l-15 p-r-15">


			<div class="t-center s-text8 p-t-20">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.390295589929!2d106.6499010143089!3d-6.077993561328045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a03eac366411f%3A0x43f7d96043397e36!2stoko%20beras%20hikmah!5e0!3m2!1sid!2sid!4v1589951915878!5m2!1sid!2sid" width="600" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				
			</div>
		</div>

	</footer>
	<center>Copyright © 2020 All rights reserved. | Almeera Hikmah Catering <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Tugas akhir RESQI</a></center>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_frontend/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_frontend/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_frontend/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_frontend/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_frontend/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_frontend/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_frontend/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_frontend/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_frontend/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/assets_frontend/js/main.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready( function () {
    $('#myTable').DataTable();
	} );
	</script>

</body>
</html>