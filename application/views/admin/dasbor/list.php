
  <?php $pesanan = $this->db->get('header_transaksi')->num_rows(); ?>
  <?php $menu = $this->db->get('menu')->num_rows(); ?>
  <?php $pelanggan = $this->db->get('pelanggan')->num_rows(); ?>
  <section class="content">

    <div class="row">

      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo $pesanan ?></h3>

            <p>Jumlah Transaksi</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-list"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo $menu ?></h3>

            <p>Jumlah Menu Makanan</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo $pelanggan ?></h3>

            <p>Jumlah Pelanggan</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
        </div>
      </div>