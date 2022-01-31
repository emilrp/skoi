<?php
include "cok.php";
$cek =$_POST['cek'];
if ($cek == 'a' ) {
    $id_siswas = $_POST['id_siswas'];
    $tua = mysqli_query($kon, "INSERT INTO orang_tua set id_siswa= $id_siswas");
    // var_dump($tua);
    header('loaction:siswa_orangtua_edit.php?id=' . $id_siswas);

}
if ($cek == 'b' ) {
    $siswa_id = $_POST['siswa_id'];
    $shcool = mysqli_query($kon, "INSERT INTO sekolah SET id_siswa = '$siswa_id' ");
    header('loaction:siswa_orangtua_edit.php?id='.$siswa_id);
}
