<?php 
include '../koneksi.php';
$tanggal  = $_POST['tanggal'];
$kode_pelanggan  = $_POST['kpelanggan'];
$nominal  = $_POST['nominal'];
$keterangan  = $_POST['keterangan'];

mysqli_query($koneksi, "insert into piutang values (NULL,'$tanggal','$kode_pelanggan','$nominal','$keterangan')")or die(mysqli_error($koneksi));
header("location:index.php?p=piutang");