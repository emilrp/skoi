<?php ob_start();
include "header.php";
include "koneksi.php";
$id = $_GET['id'];
$sekolah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM orang_tua WHERE id_siswa = $id"));
?>
<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Orang Tua</h6>
            </div>
            <div class="card-body">
                <form action="siswa_orangtua_edit.php?id=<?php echo $id ?>" method="post">
                    <div class="form-group">
                        <label for="">Nama Ayah</label>
                        <input type="text" class="form-control" name="nm_ayah" value="<?php echo $sekolah['nm_ayah'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Pekerjaan Ayah</label>
                        <input type="text" class="form-control" name="pekerjaan_ayah" value="<?php echo $sekolah['pekerjaan_ayah'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Ibu</label>
                        <input type="text" class="form-control" name="nama_ibu" value="<?php echo $sekolah['nama_ibu'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" name="pekerjaan_ibu" value="<?php echo $sekolah['pekerjaan_ibu'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $sekolah['alamat'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">No. Hp /  No. WA</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">+62</span>
                            <input type="text" class="form-control" name="no_hp" value="<?php echo $sekolah['no_hp'] ?>">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success" name="submit">
                    </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nm_ayah = $_POST['nm_ayah'];
                    $nama_ibu = $_POST['nama_ibu'];
                    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
                    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
                    $alamat = $_POST['alamat'];
                    $no_hp = $_POST['no_hp'];
                    $query = mysqli_query($koneksi, "UPDATE orang_tua SET id_siswa='$id', nm_ayah='$nm_ayah',pekerjaan_ayah='$pekerjaan_ayah',nama_ibu='$nama_ibu',pekerjaan_ibu='$pekerjaan_ibu',no_hp='$no_hp',alamat = '$alamat'");
                    header("Location:siswa_beranda.php");
                }
                ?>
            </div>
        </div>
        <!-- Input Group -->
    </div>
</div>
<?php include "footer.php"; ?>