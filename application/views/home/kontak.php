<!-- New Product -->
<section class="newproduct bgwhite p-t-45 p-b-105">
<div class="container">
<div class="sec-title p-b-60">
	<h3 class="m-text5 t-center">
		Kontak <?php echo $site->namaweb ?>
	</h3>
</div>

<!-- Slide2 -->
<div class="row">
	<div class="col-md-3 ">               
    </div>
	<div class="col-md-6 ">
        <div class="testimonial" style="margin-left: 50px;">
            Alamat          : <b><?php echo ucfirst($site->alamat)  ?></b><br>
            <br>
            No.Telfon       : <b><?php echo ucfirst($site->telepon)  ?></b><br>
            <br>
            Email           : <b><?php echo ucfirst($site->email)  ?></b><br>
            <!-- No. Rekening : <b><?php echo ucfirst($site->nama_rekening); echo " / "; echo  $site->rekening_pembayaran  ?></b><br> -->
            <br>
            Facebook        : <b><a target="_newblank" href="<?php echo $site->facebook ?>"><?php echo $site->namaweb ?></a></b><br>
            <br>
            Instagram       : <b><a target="_newblank" href="<?php echo $site->instagram ?>"><?php echo $site->namaweb ?></a></b>
        </div>                
    </div>
    <div class="col-md-3 ">               
    </div>
</div>

</div>
</section>


