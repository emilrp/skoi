<?php ob_start();
include "header.php";
include "koneksi.php";
$id = $_GET['id'];
$siswa = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE id = $id"));
// var_dump($siswa);
?>
<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Siswa</h6>
            </div>
            <div class="card-body">
                <form action="siswa_edit.php?id=<?php echo $id ?>" method="post">
                    <div class="form-group">
                        <label for="">Nomor Induk Siswa</label>
                        <input type="text" class="form-control" name="nis" value="<?php echo $siswa['nis'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $siswa['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Tgl Lahir</label>
                        <input type="date" class="form-control" name="tgl" value="<?php echo $siswa['tgl'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" id="" class="form-control">
                            <?php if ($siswa['jk'] == "1") { ?>
                                <option value="">Pilih</option>
                                <option value="1" selected>Laki-Laki</option>
                                <option value="2">Perempuan</option>
                            <?php } else { ?>
                                <option value="">Pilih</option>
                                <option value="1">Laki-Laki</option>
                                <option value="2" selected>Perempuan</option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Asal Sekolah</label>
                        <input type="text" class="form-control" name="asal_sekolah" value="<?php echo $siswa['asal_sekolah'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Agama</label>
                        <input type="text" class="form-control" name="agama" value="<?php echo $siswa['agama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">No. Hp</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">+62</span>
                            <input type="text" class="form-control" name="no_hp" value="<?php echo $siswa['no_hp'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Cabor</label>
                        <input type="text" class="form-control" name="cabor" value="<?php echo $siswa['cabor'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Tinggi Badan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="tinggi" value="<?php echo $siswa['tinggi'] ?>">
                            <span class="input-group-text">Cm</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Berat Badan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="berat" value="<?php echo $siswa['berat'] ?>">
                            <span class="input-group-text">Kg</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Cacat / Kebugaran Fisik</label>
                        <input type="text" class="form-control" name="cacat" value="<?php echo $siswa['cacat'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success" name="submit">
                    </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nama = $_POST['nama'];
                    $nis = $_POST['nis'];
                    $tgl = $_POST['tgl'];
                    $jk = $_POST['jk'];
                    $asal_sekolah = $_POST['asal_sekolah'];
                    $agama = $_POST['agama'];
                    $no_hp = $_POST['no_hp'];
                    $cabor = $_POST['cabor'];
                    $tinggi = $_POST['tinggi'];
                    $berat = $_POST['berat'];
                    $cacat = $_POST['cacat'];
                    $query = mysqli_query($koneksi, "UPDATE siswa SET nama='$nama',nis='$nis',jk='$jk',agama='$agama',no_hp='$no_hp',asal_sekolah = '$asal_sekolah',tgl='$tgl',tinggi='$tinggi',cabor='$cabor',berat = '$berat',cacat='$cacat' where id = '$id'");
                    var_dump($query);
                    header("Location:siswa_beranda.php");
                }
                ?>
            </div>
        </div>
        <!-- Input Group -->
    </div>
</div>
<?php include "footer.php"; ?>