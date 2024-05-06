<?php 
include '../koneksi.php';
$id  = $_GET['id'];
$data = mysqli_query($koneksi, "select * from piutang where id='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($koneksi, "delete from piutang where id='$id'");
header("location:index.php?p=piutang");