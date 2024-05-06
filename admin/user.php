
<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Pelanggan
      <small>Data Pelanggan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-10 col-lg-offset-1">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Pelanggan</h3>
            <div class="btn-group pull-right">            

            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Data Pelanggan
            </button>     

             </div>
             </div>
          
          <div class="box-body">
             <!-- Modal -->
             <form action="user_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah Data Pelanggan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Kode Pelanggan</label>
                        <input type="number" name="kodepelanggan" required="required" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" name="namapelanggan" required="required" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>Alamat Pelanggan</label>
                        <input type="alamat" name="alamatpelaggan" required="required" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>No Handphone</label>
                        <input type="number" name="nohandphone" required="required" class="form-control">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>

            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th>KODE PELANGGAN</th>
                    <th>NAMA PELANGGAN</th>
                    <th>ALAMAT PELANGGAN</th>
                    <th>NO HANDPHONE</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM pelanggan");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $d['kode_pelanggan'] ?></td>
                      <td><?php echo $d['nama_pelanggan']; ?></td>
                      <td><?php echo $d['alamat']; ?></td>
                      <td><?php echo $d['nomor_telepon']; ?></td>
                      <td>                                                
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $d['kode_pelanggan'] ?>">
                          <i class="fa fa-trash"></i>
                      </button> 
                     </td>
                    </tr>
                    
                  <!-- modal hapus -->
                  <div class="modal fade" id="hapus<?= $d['kode_pelanggan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Peringatan!</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <p>Yakin ingin menghapus data ini ?</p>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="user_hapus.php?id=<?php echo $d['kode_pelanggan'] ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div><?php 
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
