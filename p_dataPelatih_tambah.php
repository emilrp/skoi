<?php ob_start();
include "header.php";
include "koneksi.php";
$id = $_SESSION['id_pelatih'];
$pelatih = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pelatih WHERE id ='$id'"));
?>
<div class="row">
    <div class="col">
        <!-- General Element -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Ulang</h6>
            </div>
            <div class="card-body">
                <form action="p_dataPelatih_tambah.php" method="post" enctype='multipart/form-data'>
                    <div class="form-group">
                        <label for="">Nomor Induk Pegawai</label>
                        <input type="text" class="form-control" name="nip" value="<?= $pelatih['nip'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pelatih</label>
                        <input type="text" class="form-control" name="nama" value="<?= $pelatih['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" id="" class="form-control">
                            <?php if ($pelatih['jk'] == '1') { ?>
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
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">KTP</label>
                        <input type="file" name="ktp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Ijazah</label>
                        <input type="file" name="ijazah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">NPWP</label>
                        <input type="file" name="npwp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">SKP</label>
                        <input type="file" name="skp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">SPK</label>
                        <input type="file" name="spk" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success" name="submit">
                    </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nama = $_POST['nama'];
                    $nip = $_POST['nip'];
                    $jk = $_POST['jk'];

                    $tgl = date('Y');
                    $tgl_lahir = $_POST['tgl_lahir'];

                    $file_ktp = $_FILES["ktp"]["name"];
                    $tmp_ktp = $_FILES["ktp"]["tmp_name"];
                    $path_ktp = "file/ktp/" . $file_ktp;
                    $move_ktp = move_uploaded_file($tmp_ktp, $path_ktp);

                    $file_ijazah = $_FILES["ijazah"]["name"];
                    $tmp_ijazah = $_FILES["ijazah"]["tmp_name"];
                    $path_ijazah = "file/ijazah/" . $file_ijazah;
                    $move_ijazah = move_uploaded_file($tmp_ijazah, $path_ijazah);

                    $file_npwp = $_FILES["npwp"]["name"];
                    $tmp_npwp = $_FILES["npwp"]["tmp_name"];
                    $path_npwp = "file/npwp/" . $file_npwp;
                    $move_npwp = move_uploaded_file($tmp_npwp, $path_npwp);

                    $file_skp = $_FILES["skp"]["name"];
                    $tmp_skp = $_FILES["skp"]["tmp_name"];
                    $path_skp = "file/skp/" . $file_skp;
                    $move_skp = move_uploaded_file($tmp_skp, $path_skp);

                    $file_spk = $_FILES["spk"]["name"];
                    $tmp_spk = $_FILES["spk"]["tmp_name"];
                    $path_spk = "file/spk/" . $file_spk;
                    $move_spk = move_uploaded_file($tmp_spk, $path_spk);

                    $query = mysqli_query($koneksi,"INSERT INTO detail_pelatih SET thn_daftar = '$tgl', tgl_lahir = '$tgl_lahir',id_pelatih = '$pelatih[id]',ktp = '$file_ktp', ijazah = '$file_ijazah',npwp ='$file_npwp',skp ='$file_skp',spk='$file_spk'");

                    $query = mysqli_query($koneksi, "UPDATE pelatih SET nama='$nama',nip='$nip',jk='$jk' where id = $id");
                    header("Location:p_dataPelatih.php");
                }
                ?>
            </div>
        </div>
        <!-- Input Group -->
    </div>
    <?php include "footer.php"; ?>