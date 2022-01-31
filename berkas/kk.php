<?php
session_start();
include "../koneksi.php";
$id = $_SESSION['id_siswa'];
$siswa = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM siswa WHERE id ='$id'"));
?>
<embed src="../file/siswa/kk/<?= $siswa['kk']?>" width="100%" height="100%" type="application/pdf">