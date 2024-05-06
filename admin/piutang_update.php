<?php 
include '../koneksi.php';
$id = $_POST ['id']
$tanggal = $_POST['tanggal'];
$pelanggan = $_POST['pelanggan'];
$kode_pelanggan  = $_POST['kpelanggan'];
$nominal  = $_POST['nominal'];
$keterangan  = $_POST['keterangan'];

mysqli_query($koneksi, "update piutang set tanggal='$tanggal',pelanggan='$pelanggan', kpelanggan='$kode_pelanggan' nominal ='$nominal', keterangan='$keterangan' where id='$id'") ;
header("location:index.php?p=piutang");