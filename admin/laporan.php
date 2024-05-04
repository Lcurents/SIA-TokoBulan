<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LAPORAN
      <small>Data Laporan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Filter Laporan</h3>
          </div>
          <div class="box-body">
            <form method="get" action="">
              <div class="row">
                <div class="col-md-3">

                  <div class="form-group">
                    <label>Mulai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_dari'])){echo $_GET['tanggal_dari'];}else{echo "";} ?>" name="tanggal_dari" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Sampai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_sampai'])){echo $_GET['tanggal_sampai'];}else{echo "";} ?>" name="tanggal_sampai" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control" required="required">
                      <option value="semua">- Semua Kategori -</option>
                      <?php 
                      $kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
                      while($k = mysqli_fetch_array($kategori)){
                        ?>
                        <option <?php if(isset($_GET['kategori'])){ if($_GET['kategori'] == $k['kategori_id']){echo "selected='selected'";}} ?>  value="<?php echo $k['kategori_id']; ?>"><?php echo $k['kategori']; ?></option>
                        <?php 
                      }
                      ?>
                    </select>
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <br/>
                    <input type="submit" value="TAMPILKAN" class="btn btn-sm btn-primary btn-block">
                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Laporan Pemasukan & Pegeluaran</h3>
          </div>
          <div class="box-body">

            <?php 
            if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['kategori'])){
              $tgl_dari = $_GET['tanggal_dari'];
              $tgl_sampai = $_GET['tanggal_sampai'];
              $kategori = $_GET['kategori'];
              ?>

              <div class="row">
                <div class="col-lg-6">
                  <table class="table table-bordered">
                    <tr>
                      <th width="30%">DARI TANGGAL</th>
                      <th width="1%">:</th>
                      <td><?php echo $tgl_dari; ?></td>
                    </tr>
                    <tr>
                      <th>SAMPAI TANGGAL</th>
                      <th>:</th>
                      <td><?php echo $tgl_sampai; ?></td>
                    </tr>
                    <tr>
                      <th>KATEGORI</th>
                      <th>:</th>
                      <td>
                        <?php 
                        if($kategori == "semua"){
                          echo "SEMUA KATEGORI";
                        }else{
                          $k = mysqli_query($koneksi,"select * from kategori where kategori_id='$kategori'");
                          $kk = mysqli_fetch_assoc($k);
                          echo $kk['kategori'];
                        }
                        ?>

                      </td>
                    </tr>
                  </table>
                  
                </div>
              </div>

              <a href="laporan_pdf.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>&kategori=<?php echo $kategori ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp CETAK PDF</a>
              <a href="laporan_print.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>&kategori=<?php echo $kategori ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="1%" rowspan="2">NO</th>
                      <th width="10%" rowspan="2" class="text-center">TANGGAL</th>
                      <th rowspan="2" class="text-center">KATEGORI</th>
                      <th rowspan="2" class="text-center">KETERANGAN</th>
                      <th colspan="2" class="text-center">JENIS</th>
                    </tr>
                    <tr>
                      <th class="text-center">PEMASUKAN</th>
                      <th class="text-center">PENGELUARAN</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no=1;
                    $total_pemasukan=0;
                    $total_pengeluaran=0;
                    if($kategori == "semua"){
                      $data = mysqli_query($koneksi,"SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
                    }else{
                      $data = mysqli_query($koneksi,"SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori and kategori_id='$kategori' and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
                    }
                    while($d = mysqli_fetch_array($data)){

                      if($d['transaksi_jenis'] == "Pemasukan"){
                        $total_pemasukan += $d['transaksi_nominal'];
                      }elseif($d['transaksi_jenis'] == "Pengeluaran"){
                        $total_pengeluaran += $d['transaksi_nominal'];
                      }
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td class="text-center"><?php echo date('d-m-Y', strtotime($d['transaksi_tanggal'])); ?></td>
                        <td><?php echo $d['kategori']; ?></td>
                        <td><?php echo $d['transaksi_keterangan']; ?></td>
                        <td class="text-center">
                          <?php 
                          if($d['transaksi_jenis'] == "Pemasukan"){
                            echo "Rp. ".number_format($d['transaksi_nominal'])." ,-";
                          }else{
                            echo "-";
                          }
                          ?>
                        </td>
                        <td class="text-center">
                          <?php 
                          if($d['transaksi_jenis'] == "Pengeluaran"){
                            echo "Rp. ".number_format($d['transaksi_nominal'])." ,-";
                          }else{
                            echo "-";
                          }
                          ?>
                        </td>
                      </tr>
                      <?php 
                    }
                    ?>
                    <tr>
                      <th colspan="4" class="text-right">TOTAL</th>
                      <td class="text-center text-bold text-success"><?php echo "Rp. ".number_format($total_pemasukan)." ,-"; ?></td>
                      <td class="text-center text-bold text-danger"><?php echo "Rp. ".number_format($total_pengeluaran)." ,-"; ?></td>
                    </tr>
                    <tr>
                      <th colspan="4" class="text-right">SALDO</th>
                      <td colspan="2" class="text-center text-bold text-white bg-primary"><?php echo "Rp. ".number_format($total_pemasukan - $total_pengeluaran)." ,-"; ?></td>
                    </tr>
                  </tbody>
                </table>



              </div>

              <?php 
            }else{
              ?>

              <div class="alert alert-info text-center">
                Silahkan Filter Laporan Terlebih Dulu.
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </section>
    </div>


<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>

<script src="../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../assets/bower_components/raphael/raphael.min.js"></script>
<script src="../assets/bower_components/morris.js/morris.min.js"></script>

<script src="../assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>


<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<script src="../assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>

<script src="../assets/bower_components/moment/min/moment.min.js"></script>
<script src="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>

<script src="../assets/dist/js/adminlte.min.js"></script>

<script src="../assets/dist/js/pages/dashboard.js"></script>

<script src="../assets/dist/js/demo.js"></script>
<script src="../assets/bower_components/ckeditor/ckeditor.js"></script>
<script src="../assets/bower_components/chart.js/Chart.min.js"></script>

<script>
  $(document).ready(function(){

   // $(".edit").hide();

   $('#table-datatable').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : true,
    'ordering'    : false,
    'info'        : true,
    'autoWidth'   : true,
    "pageLength": 50
  });



 });
  
  $('#datepicker').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
  }).datepicker("setDate", new Date());

  $('.datepicker2').datepicker({
    autoclose: true,
    format: 'yyyy/mm/dd',
  });


</script>


<script>
  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

  var barChartData = {
    labels : ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
    datasets : [
    {
      label: 'Pemasukan',
      fillColor : "rgba(51, 240, 113, 0.61)",
      strokeColor : "rgba(11, 246, 88, 0.61)",
      highlightFill: "rgba(220,220,220,0.75)",
      highlightStroke: "rgba(220,220,220,1)",
      data : [
      <?php
      for($bulan=1;$bulan<=12;$bulan++){
        $thn_ini = date('Y');
        $pemasukan = mysqli_query($koneksi,"select sum(transaksi_nominal) as total_pemasukan from transaksi where transaksi_jenis='Pemasukan' and month(transaksi_tanggal)='$bulan' and year(transaksi_tanggal)='$thn_ini'");
        $pem = mysqli_fetch_assoc($pemasukan);

        // $total = str_replace(",", "44", number_format($pem['total_pemasukan']));
        $total = $pem['total_pemasukan'];
        if($pem['total_pemasukan'] == ""){
          echo "0,";
        }else{
          echo $total.",";
        }

      }
      ?>
      ]
    },
    {
      label: 'Pengeluaran',
      fillColor : "rgba(255, 51, 51, 0.8)",
      strokeColor : "rgba(248, 5, 5, 0.8)",
      highlightFill : "rgba(151,187,205,0.75)",
      highlightStroke : "rgba(151,187,205,1)",
      data : [
      <?php
      for($bulan=1;$bulan<=12;$bulan++){
        $thn_ini = date('Y');
        $pengeluaran = mysqli_query($koneksi,"select sum(transaksi_nominal) as total_pengeluaran from transaksi where transaksi_jenis='pengeluaran' and month(transaksi_tanggal)='$bulan' and year(transaksi_tanggal)='$thn_ini'");
        $peng = mysqli_fetch_assoc($pengeluaran);

        // $total = str_replace(",", "44", number_format($peng['total_pengeluaran']));
        $total = $peng['total_pengeluaran'];
        if($peng['total_pengeluaran'] == ""){
          echo "0,";
        }else{

          echo $total.",";
        }
      }
      ?>
      ]
    }
    ]

  }


  var barChartData2 = {
    labels : [
    <?php 
    $tahun = mysqli_query($koneksi,"select distinct year(transaksi_tanggal) as tahun from transaksi order by year(transaksi_tanggal) asc");
    while($t = mysqli_fetch_array($tahun)){
      ?>
      "<?php echo $t['tahun']; ?>",
      <?php 
    }
    ?>
    ],
    datasets : [
    {
      label: 'Pemasukan',
      fillColor : "rgba(51, 240, 113, 0.61)",
      strokeColor : "rgba(11, 246, 88, 0.61)",
      highlightFill: "rgba(220,220,220,0.75)",
      highlightStroke: "rgba(220,220,220,1)",
      data : [
      <?php
      $tahun = mysqli_query($koneksi,"select distinct year(transaksi_tanggal) as tahun from transaksi order by year(transaksi_tanggal) asc");
      while($t = mysqli_fetch_array($tahun)){
        $thn = $t['tahun'];
        $pemasukan = mysqli_query($koneksi,"select sum(transaksi_nominal) as total_pemasukan from transaksi where transaksi_jenis='Pemasukan' and year(transaksi_tanggal)='$thn'");
        $pem = mysqli_fetch_assoc($pemasukan);
        $total = $pem['total_pemasukan'];
        if($pem['total_pemasukan'] == ""){
          echo "0,";
        }else{
          echo $total.",";
        }

      }
      ?>
      ]
    },
    {
      label: 'Pengeluaran',
      fillColor : "rgba(255, 51, 51, 0.8)",
      strokeColor : "rgba(248, 5, 5, 0.8)",
      highlightFill : "rgba(151,187,205,0.75)",
      highlightStroke : "rgba(254, 29, 29, 0)",
      data : [
      <?php
      $tahun = mysqli_query($koneksi,"select distinct year(transaksi_tanggal) as tahun from transaksi order by year(transaksi_tanggal) asc");
      while($t = mysqli_fetch_array($tahun)){
        $thn = $t['tahun'];
        $pemasukan = mysqli_query($koneksi,"select sum(transaksi_nominal) as total_pengeluaran from transaksi where transaksi_jenis='Pengeluaran' and year(transaksi_tanggal)='$thn'");
        $pem = mysqli_fetch_assoc($pemasukan);
        $total = $pem['total_pengeluaran'];
        if($pem['total_pengeluaran'] == ""){
          echo "0,";
        }else{
          echo $total.",";
        }

      }
      ?>
      ]
    }
    ]

  }



  window.onload = function(){
    var ctx = document.getElementById("grafik1").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
     responsive : true,
     animation: true,
     barValueSpacing : 5,
     barDatasetSpacing : 1,
     tooltipFillColor: "rgba(0,0,0,0.8)",
     multiTooltipTemplate: "<%= datasetLabel %> - Rp.<%= value.toLocaleString() %>,-"
   });

   var ctx = document.getElementById("grafik2").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData2, {
     responsive : true,
     animation: true,
     barValueSpacing : 5,
     barDatasetSpacing : 1,
     tooltipFillColor: "rgba(0,0,0,0.8)",
     multiTooltipTemplate: "<%= datasetLabel %> - Rp.<%= value.toLocaleString() %>,-"
   });




    


  }












</script>
  </section>
</div>
</body>
</html>