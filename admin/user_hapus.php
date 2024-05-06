<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from pelanggan where kode_pelanggan='$id'");
header("location:index.php?p=user");