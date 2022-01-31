<?php 
session_start();
include 'cok.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$admin = mysqli_query($kon,"select * from admin where username='$username' and password='$password'");
$siswa = mysqli_query($kon,"select * from siswa where username='$username' and password='$password'");
$pelatih = mysqli_query($kon,"select * from pelatih where username='$username' and password='$password'");
 
$cek_1 = mysqli_num_rows($admin);
$cek_2 = mysqli_num_rows($siswa);
$cek_3 = mysqli_num_rows($pelatih);

if($cek_1 > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	$_SESSION['log'] = "admin";
	$_SESSION['nama'] = "admin";
	header("location:admin.php");
}elseif($cek_2 > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	$_SESSION['log'] = "siswa";
	$sis = mysqli_fetch_array($siswa);
	$_SESSION['id_siswa'] = $sis['id'];
	$_SESSION['nama'] = $sis['nama'];
	header("location:siswa_beranda.php");
}elseif($cek_3 > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	$_SESSION['log'] = "pelatih";
	$pelat = mysqli_fetch_array($pelatih);
	$_SESSION['id_pelatih'] = $pelat['id'];
	$_SESSION['nama'] = $pelat['nama'];
	header('location:p_dataPelatih.php?id='.$pelat['id']);
}else{
	header("location:index.php?pesan=gagal");
}