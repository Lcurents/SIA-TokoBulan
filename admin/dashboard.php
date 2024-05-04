
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
  <section class="content">
    <!-- Total Barang -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
              $query = "SELECT COUNT(*) AS total FROM gudang";
              $result = mysqli_query($koneksi, $query);
              $row = mysqli_fetch_assoc($result);
              $total_rows = $row['total'];
            ?>
            <p>Total Barang</p>
            <center>
              <h3 style="font-weight: bolder"><?php echo $total_rows; ?></h3>
            </center>
          </div>
          <a href="gudang.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    <!-- Akhir total barang -->

    <!-- Total Users -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <?php 
              $sqlUsers = "SELECT COUNT(*) AS total FROM users";
              $barisUsers = mysqli_fetch_assoc(mysqli_query($koneksi, $sqlUsers));
              $total_barisUsers = $barisUsers['total'];
            ?>
            <p>Total Users</p>
            <center>
              <h3 style="font-weight: bolder"><?php echo $total_barisUsers; ?></h3>
            </center>
            
          </div>
          <a href="gudang.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    <!-- Akhir Total Users -->

    <!-- Total Piutang -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
              $sqlUsers = "SELECT COUNT(*) AS total FROM users";
              $barisUsers = mysqli_fetch_assoc(mysqli_query($koneksi, $sqlUsers));
              $total_barisUsers = $barisUsers['total'];
            ?>
            <p>Total Piutang</p>
            <center>
              <h3 style="font-weight: bolder"><?php echo $total_rows; ?></h3>
            </center>
            
          </div>
          <a href="gudang.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    <!-- Akhir total piutang -->

    <!-- Total pelanggan -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <?php 
              $sqlPelanggan = "SELECT COUNT(*) AS total FROM Pelanggan";
              $barisPelanggan = mysqli_fetch_assoc(mysqli_query($koneksi, $sqlPelanggan));
              $total_barisPelanggan = $barisPelanggan['total'];
            ?>
            <p>Total Pelanggan</p>
            <center>
              <h3 style="font-weight: bolder"><?php echo $total_barisPelanggan; ?></h3>
            </center>
            
          </div>
          <a href="gudang.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- Akhir total pelanggan -->
  </section>
</div>
