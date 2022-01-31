<?php ob_start();
include "header.php";
include "koneksi.php";
$id = $_GET['id'];
$sekolah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM sekolah WHERE id_siswa = $id"));
?>
<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Orang Tua</h6>
            </div>
            <div class="card-body">
                <form action="siswa_sekolah_edit.php?id=<?php echo $id ?>" method="post">
                    <div class="form-group">
                        <label for="">Asal Sekolah</label>
                        <input type="text" class="form-control" name="asal_sekolah" value="<?php echo $sekolah['asal_sekolah'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Sekolah</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $sekolah['alamat'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Kelas (saat ini)</label>
                        <input type="text" class="form-control" name="kelas" value="<?php echo $sekolah['kelas'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Prestasi Akademik(Bila Ada)</label>
                        <input type="text" class="form-control" name="prestasi" value="<?php echo $sekolah['prestasi'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">No. Ijazah</label>
                        <input type="text" class="form-control" name="ijazah" value="<?php echo $sekolah['ijazah'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">No. SKHU</label>
                        <input type="text" class="form-control" name="skhu" value="<?php echo $sekolah['skhu'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Sejak Kapan Mengikuti Cabor</label>
                        <input type="text" class="form-control" name="mulai" value="<?php echo $sekolah['mulai'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Apakah Bergabung Dengan Club/Perguruan/Organisasi Olahraga</label>
                        <input type="text" class="form-control" name="riwayat_orga" value="<?php echo $sekolah['riwayat_orga'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Bila Iya, Dimana</label>
                        <input type="text" class="form-control" name="alamat_cabor" value="<?php echo $sekolah['alamat_cabor'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Prestasi Olahraga</label>
                        <input type="text" class="form-control" name="prestasi_olahraga" value="<?php echo $sekolah['prestasi_olahraga'] ?>">
                    </div>
                    
                   

                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success" name="submit">
                    </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $asal_sekolah = $_POST['asal_sekolah'];
                    $kelas = $_POST['kelas'];
                    $alamat = $_POST['alamat'];
                    $prestasi = $_POST['prestasi'];
                    $ijazah = $_POST['ijazah'];
                    $skhu = $_POST['skhu'];
                    $riwayat_orga = $_POST['riwayat_orga'];
                    $alamat_cabor = $_POST['alamat_cabor'];
                    $mulai = $_POST['mulai'];
                    $riwayat_orga = $_POST['riwayat_orga'];
                    $alamat_cabor = $_POST['alamat_cabor'];
                    $prestasi_olahraga = $_POST['prestasi_olahraga'];

                    $query = mysqli_query($koneksi, "UPDATE sekolah SET id_siswa='$id', asal_sekolah='$asal_sekolah',alamat='$alamat',kelas='$kelas',prestasi='$prestasi',skhu='$skhu',ijazah = '$ijazah',riwayat_orga='$riwayat_orga',alamat_cabor='$alamat_cabor',alamat_cabor='$alamat_cabor',prestasi_olahraga='$prestasi_olahraga',mulai='$mulai'");
                    header("Location:siswa_beranda.php");
                }
                ?>
            </div>
        </div>
        <!-- Input Group -->
    </div>
</div>
<?php include "footer.php"; ?>