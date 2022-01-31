<?php ob_start();
include "header.php";
include "koneksi.php";
$id = $_SESSION['id_siswa'];
?>
<div class="row">
    <div class="col">
        <!-- General Element -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Upload Berkas Siswa</h6>
            </div>
            <div class="card-body">
                <form action="siswa_berkas.php" method="post" enctype='multipart/form-data'>
                    <div class="form-group">
                        <label for="">Scan Akte Kelahiran</label>
                        <input type="file" class="form-control" name="akte">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Kartu Keluarga</label>
                        <input type="file" class="form-control" name="kk">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Kartu BPJS</label>
                        <input type="file" class="form-control" name="bpjs">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Surat Aktif Sekolah(dari Kepala Sekolah)</label>
                        <input type="file" class="form-control" name="aktif">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Legalisir Kartu NISN</label>
                        <input type="file" class="form-control" name="kartu_nisn">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Surat Keterangan Bebas Narkoba dari Instansi Pemerintahan (minimal 3 indikator)</label>
                        <input type="file" class="form-control" name="narkoba">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Photo 3x4</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Piagam minimal Tingkat Kab/Kota(bagi yang memiliki)</label>
                        <input type="file" class="form-control" name="piagam">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Surat Rekomendasi Dari Club/Pengurus Cabang Olahraga di Tingkat Kab/Kota/Prov</label>
                        <input type="file" class="form-control" name="rekom">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Bukti Vaksin Covid-19(bagi yang memiliki) </label>
                        <input type="file" class="form-control" name="vaksin">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success" name="submit">
                    </div>
                </form>
                <?php
                $siswa = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE id = '$id'"));
                if (isset($_POST['submit'])) {
                    if ($_FILES['akte']["name"] != NULL) {
                        $file_akte = $_FILES["akte"]["name"];
                        $tmp_akte = $_FILES["akte"]["tmp_name"];
                        $path_akte = "file/siswa/akte/" . $file_akte;
                        $move_akte = move_uploaded_file($tmp_akte, $path_akte);
                    } else {
                        echo $file_akte = $siswa['akte'];
                    }

                    if ($_FILES['kk']["name"] != NULL) {
                        $file_kk = $_FILES["kk"]["name"];
                        $tmp_kk = $_FILES["kk"]["tmp_name"];
                        $path_kk = "file/siswa/kk/" . $file_kk;
                        $move_kk = move_uploaded_file($tmp_kk, $path_kk);
                    } else {
                        $file_kk = $siswa['kk'];
                    }

                    if ($_FILES['bpjs']["name"] != NULL) {
                        $file_bpjs = $_FILES["bpjs"]["name"];
                        $tmp_bpjs = $_FILES["bpjs"]["tmp_name"];
                        $path_bpjs = "file/siswa/bpjs/" . $file_bpjs;
                        $move_bpjs = move_uploaded_file($tmp_bpjs, $path_bpjs);
                    } else {
                        $file_bpjs = $siswa['bpjs'];
                    }

                    if ($_FILES['aktif']["name"] != NULL) {
                        $file_aktif = $_FILES["aktif"]["name"];
                        $tmp_aktif = $_FILES["aktif"]["tmp_name"];
                        $path_aktif = "file/siswa/aktif/" . $file_aktif;
                        $move_aktif = move_uploaded_file($tmp_aktif, $path_aktif);
                    } else {
                        $file_aktif = $siswa['aktif'];
                    }

                    if ($_FILES['narkoba']["name"] != NULL) {
                        $file_narkoba = $_FILES["narkoba"]["name"];
                        $tmp_narkoba = $_FILES["narkoba"]["tmp_name"];
                        $path_narkoba = "file/siswa/narkoba/" . $file_narkoba;
                        $move_narkoba = move_uploaded_file($tmp_narkoba, $path_narkoba);
                    } else {
                        $file_narkoba = $siswa['narkoba'];
                    }

                    if ($_FILES['foto']["name"] != NULL) {
                        $file_foto = $_FILES["foto"]["name"];
                        $tmp_foto = $_FILES["foto"]["tmp_name"];
                        $path_foto = "file/siswa/foto/" . $file_foto;
                        $move_foto = move_uploaded_file($tmp_foto, $path_foto);
                    } else {
                        $file_foto = $siswa['foto'];
                    }

                    if ($_FILES['kartu_nisn']["name"] != NULL) {
                        $file_kartu_nisn = $_FILES["kartu_nisn"]["name"];
                        $tmp_kartu_nisn = $_FILES["kartu_nisn"]["tmp_name"];
                        $path_kartu_nisn = "file/siswa/kartu_nisn/" . $file_kartu_nisn;
                        $move_kartu_nisn = move_uploaded_file($tmp_kartu_nisn, $path_kartu_nisn);
                    } else {
                        $file_kartu_nisn = $siswa['kartu_nisn'];
                    }

                    if ($_FILES['piagam']["name"] != NULL) {
                        $file_piagam = $_FILES["piagam"]["name"];
                        $tmp_piagam = $_FILES["piagam"]["tmp_name"];
                        $path_piagam = "file/siswa/piagam/" . $file_piagam;
                        $move_piagam = move_uploaded_file($tmp_piagam, $path_piagam);
                    } else {
                        $file_piagam = $siswa['piagam'];
                    }

                    if ($_FILES['rekom']["name"] != NULL) {
                        $file_rekom = $_FILES["rekom"]["name"];
                        $tmp_rekom = $_FILES["rekom"]["tmp_name"];
                        $path_rekom = "file/siswa/rekom/" . $file_rekom;
                        $move_rekom = move_uploaded_file($tmp_rekom, $path_rekom);
                    } else {
                        $file_rekom = $siswa['rekom'];
                    }

                    if ($_FILES['vaksin']["name"] != NULL) {
                        $file_vaksin = $_FILES["vaksin"]["name"];
                        $tmp_vaksin = $_FILES["vaksin"]["tmp_name"];
                        $path_vaksin = "file/siswa/vaksin/" . $file_vaksin;
                        $move_vaksin = move_uploaded_file($tmp_vaksin, $path_vaksin);
                    } else {
                        $file_vaksin = $siswa['vaksin'];
                    }

                    $query = mysqli_query($koneksi, "UPDATE siswa SET akte='$file_akte',kk='$file_kk',bpjs='$file_bpjs',foto='$file_foto',kartu_nisn='$file_kartu_nisn',narkoba='$file_narkoba',piagam = '$file_piagam',rekom='$file_rekom',vaksin='$file_vaksin',aktif='$file_aktif' where id ='$id'");
                    header("Location:siswa_beranda.php");
                }
                ?>
            </div>
        </div>
        <!-- Input Group -->
    </div>
</div>
<?php include "footer.php"; ?>