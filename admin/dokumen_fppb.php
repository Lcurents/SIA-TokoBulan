

<div class="content-wrapper">

  <section class="content-header">

<h3 style="text-align: center;">FORM PERMINTAAN PEMBELIAN BARANG</h3>
    <h3 style="text-align: center;">(FPPB)</h3>


    <br>

    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> Tambah
              </button>

              

              <!-- Modal -->
              <form action="piutang_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah Piutang</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Unit Kerja/Bagian</label>
                        <input type="text" name="tanggal" required="required" class="form-control datepicker2">
                      </div>

                      <div class="form-group">
                        <label>Tanggal Permintaan</label>
                        <input type="text" name="tanggal" required="required" class="form-control datepicker2">
                      </div>


                      <div class="form-group">
                        <label>Status Pengadaan:</label>
                        <p>
        
                        <label for="urgent">URGENT</label>
                        <input type="radio" id="urgent" name="statusPengadaan" value="URGENT" required>

                        <label for="reguler">REGULER</label>
                        <input type="radio" id="reguler" name="statusPengadaan" value="REGULER">
                        <span>(Pilih Salah Satu)</span>
                        </p>
                    </div>


                      
                      <div class="form-group">
                        <label>Status Penggunaan:</label>
                        <p>
                        
                        <label for="langsungPakai">LANGSUNG PAKAI</label>
                        <input type="radio" id="langsungPakai" name="statusPenggunaan" value="LANGSUNG PAKAI" required>
                    
                        <label for="stock">STOCK</label>
                        <input type="radio" id="stock" name="statusPenggunaan" value="STOCK" required>
                        <span>(Pilih Salah Satu)</span>
                        </p>
                        </div>

                      <div class="form-group">
                        <label>Kode Barang</label>
                        <input name="pelanggan" required="required" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input name="kpelanggan" required="required" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>QTY</label>
                        <input type="number" name="nominal" required="required" class="form-control" placeholder="">
                      </div>

                      <div class="form-group">
                        <label>Satuan</label>
                        <input type="number" name="nominal" required="required" class="form-control" placeholder="">
                      </div>

                      

                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="4"></textarea>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>


            <!-- akhir modal -->

            <br>


    <p>Berdasarkan kebutuhan barang di Unit Kerja/ Bagian kami, bersama ini kami lampirkan data kebutuhan <br>pengadaan barang yang ada dengan rincian sebagai berikut :</p>
    
    <table>
        <tr>
            <th >NO</th>
            <th>KODE BARANG</th>
            <th>NAMA BARANG</th>
            <th>QTY</th>
            <th>SATUAN</th>
            <th>KETERANGAN</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> Kirim
              </button>

              <br>

    <p> 
        Catatan:
        - Status Pengadaan URGENT : FPPB diterima maksimal jam 12.00 wib untuk dapat diadakan pada hariyang sama, jika lewat dari jam tersebut maka pengadaan akan dilakukan hari berikutnya.
        - Pengajuan yang dilakukan pada hari jum'at lewat jam 12.00 wib maka akan diproses pada hari seninminggu selanjutnya.
    </p>
    </div>
    </section>