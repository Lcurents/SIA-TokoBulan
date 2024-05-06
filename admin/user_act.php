<?php 
include '../koneksi.php';
$kode_pelanggan  = $_POST['kodepelanggan'];
$nama_pelanggan  = $_POST['namapelanggan'];
$alamat_pelanggan  = $_POST['alamatpelaggan'];
$nohandphone  = $_POST['nohandphone'];


mysqli_query($koneksi, "insert into pelanggan values ('$kode_pelanggan','$nama_pelanggan','$alamat_pelanggan','$nohandphone')")or die(mysqli_error($koneksi));
header("location:index.php?p=user");