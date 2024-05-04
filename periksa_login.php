<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND passwords='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);
	$_SESSION['id'] = $data['id'];
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['level'] = $data['user_level'];

	if($data['user_level'] == "kasir"){
		$_SESSION['status'] = "kasir_login";
		header("location:admin/");
	}else if($data['user_level'] == "gudang"){
		$_SESSION['status'] = "gudang_login";
		header("location:manajemen/");
	}else{
		header("location:index.php?alert=gagal");
	}
}else{
	header("location:index.php?alert=gagal");
}
