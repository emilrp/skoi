<?php
session_start();
include "../koneksi.php";
$id = $_GET['id'];
$siswa = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM siswa WHERE id ='$id'"));
?>
<embed src="../file/siswa/kartu_nisn/<?= $siswa['kartu_nisn']?>" width="100%" height="100%" type="application/pdf">