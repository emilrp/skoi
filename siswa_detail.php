<?php ob_start();
include "header.php"; ?>
<?php include "koneksi.php";
$id = $_GET['id'];
$qur = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE id='$id'"));
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-body">
                <?php if ($qur['status'] == '1') { ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $qur['id']; ?>"> Verifikasi</i>
                    </button>
                    <div class="modal fade" id="exampleModal<?= $qur['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Verifikasi</h5>
                                    <button type="button" class="btn btn-sm btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                </div>
                                <div class="modal-body">
                                    <form action="siswa_detail.php?id=<?= $id ?>" method="POST">
                                        <div class="mb-3">
                                            Apakah Anda Ingin Mengverifikasi Data Anda?
                                            <br>
                                            <select name="status" id="" class="form-control">
                                                <option value="2">Ditolak</option>
                                                <option value="3">Diterima</option>
                                                <option value="4">Perbaikan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            Komentar
                                            <br>
                                            <textarea name="komen" class="form-control" id="" cols="30" rows="10">-</textarea>
                                        </div>
                                        <div class="d-grid gap-2 d-md-block">
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</i></button>
                                            <button type="submit" name="verifikasi" class="btn btn-sm btn-success">Kirim</i></button>
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['verifikasi'])) {
                                        $status = $_POST['status'];
                                        $komen = $_POST['komen'];
                                        $query = mysqli_query($koneksi, "UPDATE siswa SET status='$status',komen='$komen' where id='$id'");
                                        header('location:siswa_detail.php?id=' . $id);
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } elseif ($qur['status'] == '2') { ?>
                    <input type="submit" class="btn btn-sm btn-danger" value="Ditolak" id="">
                <?php } elseif ($qur['status'] == '3') { ?>
                    <input type="submit" class="btn btn-sm btn-success" value="Diterima" id="">
                <?php } elseif ($qur['status'] == '4') { ?>
                    <?= $qur['komen']; ?>
                    <div style="float: right;">
                        <input type="submit" class="btn btn-sm btn-warning" value="Perbaikan" id="">
                    </div>
                <?php } else { ?>
                    <input type="submit" class="btn btn-sm btn-success" value="Terkirim" id="">
                <?php } ?>
                <?php
                if (isset($_POST['kirim'])) {
                    $query = mysqli_query($koneksi, "UPDATE siswa SET status='1' where id='$id'");
                    header('location:siswa_detail.php?id=sukses');
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card mb-4" style="height: 480px;">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                <?php if ($qur['status'] == null) { ?>
                    <a href="siswa_edit.php?id=<?= $id ?>" class="btn btn-sm btn-warning">Edit</a>
                <?php } ?>

            </div>
            <div class="table-responsive p-3">
                <table class="table table-sm table-borderless">
                    <?php
                    $no = 1;
                    $query_siswa = mysqli_query($koneksi, "SELECT * FROM siswa where id ='$id'");
                    while ($siswa = mysqli_fetch_array($query_siswa)) {
                    ?>

                        <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td><?= $siswa['nis'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $siswa['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>
                                <?php
                                if ($siswa['jk'] == 1) {
                                    echo "Laki-laki";
                                } else {
                                    echo "Perempuan";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td><?= $siswa['tgl'] ?></td>
                        </tr>
                        <tr>
                            <td>Asal Sekolah</td>
                            <td>:</td>
                            <td><?= $siswa['asal_sekolah'] ?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td><?= $siswa['agama'] ?></td>
                        </tr>
                        <tr>
                            <td>No. Hp</td>
                            <td>:</td>
                            <td><?= $siswa['no_hp'] ?></td>
                        </tr>
                        <tr>
                            <td>Cabor</td>
                            <td>:</td>
                            <td><?= $siswa['cabor'] ?></td>
                        </tr>
                        <tr>
                            <td>Tinggi Badan</td>
                            <td>:</td>
                            <td><?= $siswa['tinggi'] ?></td>
                        </tr>
                        <tr>
                            <td>Berat Badan</td>
                            <td>:</td>
                            <td><?= $siswa['berat'] ?></td>
                        </tr>
                        <tr>
                            <td>Cacat/Kebugaran Fisik</td>
                            <td>:</td>
                            <td><?= $siswa['cacat'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Berkas Siswa</h6>
                <div style="float: right;">


                </div>
            </div>
            <div class="table-responsive p-3">
                <table class="table table-sm table-borderless">
                    <?php
                    $no = 1;
                    $query_siswa = mysqli_query($koneksi, "SELECT * FROM siswa where id ='$id'");
                    while ($siswa = mysqli_fetch_array($query_siswa)) {
                    ?>
                        <tr>
                            <td>Foto</td>
                            <td>:</td>
                            <td>
                                <?php if ($siswa['foto'] != null) { ?>
                                    <a href="berkas_admin/foto.php?id=<?= $siswa['id'] ?>" class="btn btn-sm btn-info" target="_blank">Lihat</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Akte</td>
                            <td>:</td>
                            <td>
                                <?php if ($siswa['akte'] != null) { ?>
                                    <a href="berkas_admin/akte.php?id=<?= $siswa['id'] ?>" class="btn btn-sm btn-info" target="_blank">Lihat</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Kartu Keluarga</td>
                            <td>:</td>
                            <td>
                                <?php if ($siswa['kk'] != null) { ?>
                                    <a href="berkas_admin/kk.php?id=<?= $siswa['id'] ?>" class="btn btn-sm btn-info" target="_blank">Lihat</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>BPJS</td>
                            <td>:</td>
                            <td>
                                <?php if ($siswa['bpjs'] != null) { ?>
                                    <a href="berkas_admin/bpjs.php?id=<?= $siswa['id'] ?>" class="btn btn-sm btn-info" target="_blank">Lihat</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Surat Aktif</td>
                            <td>:</td>
                            <td>
                                <?php if ($siswa['aktif'] != null) { ?>
                                    <a href="berkas_admin/aktif.php?id=<?= $siswa['id'] ?>" class="btn btn-sm btn-info" target="_blank">Lihat</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Kartu NISN</td>
                            <td>:</td>
                            <td>
                                <?php if ($siswa['kartu_nisn'] != null) { ?>
                                    <a href="berkas_admin/kartu_nisn.php?id=<?= $siswa['id'] ?>" class="btn btn-sm btn-info" target="_blank">Lihat</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Surat Bebas Narkoba</td>
                            <td>:</td>
                            <td>
                                <?php if ($siswa['narkoba'] != null) { ?>
                                    <a href="berkas_admin/narkoba.php?id=<?= $siswa['id'] ?>" class="btn btn-sm btn-info" target="_blank">Lihat</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Piagam</td>
                            <td>:</td>
                            <td>
                                <?php if ($siswa['piagam'] != null) { ?>
                                    <a href="berkas_admin/piagam.php?id=<?= $siswa['id'] ?>" class="btn btn-sm btn-info" target="_blank">Lihat</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Rekomendasi Club</td>
                            <td>:</td>
                            <td>
                                <?php if ($siswa['rekom'] != null) { ?>
                                    <a href="berkas_admin/rekom.php?id=<?= $siswa['id'] ?>" class="btn btn-sm btn-info" target="_blank">Lihat</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Vaksin Covid-19</td>
                            <td>:</td>
                            <td>
                                <?php if ($siswa['vaksin'] != null) { ?>
                                    <a href="berkas_admin/vaksin.php?id=<?= $siswa['id'] ?>" class="btn btn-sm btn-info" target="_blank">Lihat</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mb-4" style="height: 480px;">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Orang Tua</h6>
                <?php if ($qur['status'] == null) {
                    if ($orang['id_siswa'] == null) {  ?>
                        <form action="siswa_beranda_act.php" method="post">
                            <input type="hidden" name="id_siswas" value="<?= $id ?>">
                            <input type="hidden" name="cek" value="a">
                            <input type="submit" class="btn btn-sm btn-warning" value="edit">
                        </form>

                    <?php } else { ?>
                        <a href="siswa_orangtua_edit.php?id=<?= $id ?>" class="btn btn-sm btn-warning">Edit</a>
                    <?php  } ?>
                <?php } ?>

            </div>
            <div class="table-responsive p-3">
                <table class="table table-sm table-borderless">
                    <?php $orang_tua = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM orang_tua where id_siswa ='$id'")); ?>
                    <tr>
                        <td>Nama Ayah</td>
                        <td>:</td>
                        <td><?= $orang_tua['nm_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan Ayah</td>
                        <td>:</td>
                        <td><?= $orang_tua['pekerjaan_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Ibu</td>
                        <td>:</td>
                        <td><?= $orang_tua['nama_ibu'] ?></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan Ibu</td>
                        <td>:</td>
                        <td><?= $orang_tua['pekerjaan_ibu'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $orang_tua['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td>No. Hp</td>
                        <td>:</td>
                        <td><?= $orang_tua['no_hp'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mb-4" style="height: 480px;">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Sekolah</h6>
                <?php if ($qur['status'] == null) {
                    if ($sekolah['id_siswa'] == null) {  ?>
                        <form action="siswa_beranda_act.php" method="post">
                            <input type="hidden" name="siswa_id" value="<?= $id ?>">
                            <input type="hidden" name="cek" value="b">
                            <input type="submit" class="btn btn-sm btn-warning" value="edit">
                        </form>
                    <?php } else { ?>
                        <a href="siswa_sekolah_edit.php?id=<?= $id ?>" class="btn btn-sm btn-warning">Edit</a>
                    <?php  } ?>
                <?php } ?>

            </div>
            <div class="table-responsive p-3">
                <table class="table table-sm table-borderless">
                    <?php $sekolah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM sekolah where id_siswa ='$id'")); ?>
                    <tr>
                        <td>Asal Sekolah</td>
                        <td>:</td>
                        <td><?= $sekolah['asal_sekolah'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Sekolah</td>
                        <td>:</td>
                        <td><?= $sekolah['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td>Kelas (Saat ini)</td>
                        <td>:</td>
                        <td><?= $sekolah['kelas'] ?></td>
                    </tr>
                    <tr>
                        <td>Prestasi</td>
                        <td>:</td>
                        <td><?= $sekolah['prestasi'] ?></td>
                    </tr>
                    <tr>
                        <td>No. Ijazah</td>
                        <td>:</td>
                        <td><?= $sekolah['ijazah'] ?></td>
                    </tr>
                    <tr>
                        <td>No. SKHU</td>
                        <td>:</td>
                        <td><?= $sekolah['skhu'] ?></td>
                    </tr>
                </table>
                <br>
                <h6 class="m-0 font-weight-bold text-primary">Riwayat Sekolah</h6>
                <table>
                    <tr>
                        <td style="width: 300px;">Sejak Kapan Mengikuti Cabor</td>
                        <td>:</td>
                        <td><?= $sekolah['mulai'] ?></td>
                    </tr>
                    <tr>
                        <td>Apakah Bergabung Dengan Club/Perguruan/Organisasi Olahraga</td>
                        <td>:</td>
                        <td><?= $sekolah['riwayat_orga'] ?></td>
                    </tr>
                    <tr>
                        <td>Dimana</td>
                        <td>:</td>
                        <td><?= $sekolah['alamat_cabor'] ?></td>
                    </tr>
                    <tr>
                        <td>Prestasi Olahraga</td>
                        <td>:</td>
                        <td><?= $sekolah['prestasi'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>