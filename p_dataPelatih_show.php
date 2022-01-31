<?php include "header.php"; ?>
<?php
include "koneksi.php";
// $id = $_SESSION['id_pelatih'];
$id = $_GET['id'];
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Pelatih</h6>
                <a href="p_dataPelatih_tambah.php" class="btn btn-sm btn-primary">Kembali</a>
            </div>
            <div class="table-responsive p-3">
                <table class="table table-sm table-borderless" id="dataTable">
                    <?php
                    $pelatih = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM detail_pelatih WHERE id = '$id'"));
                    $query_pelatih = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pelatih WHERE id = '$pelatih[id_pelatih]'"));
                    ?>
                    <tr>
                        <td style="width: 100px;">NIP</td>
                        <td style="width: 30px;">:</td>
                        <td>
                            <?php
                            if ($query_pelatih['id'] == $pelatih['id_pelatih']) {
                                echo $query_pelatih['nip'];
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>
                            <?php
                            if ($query_pelatih['id'] == $pelatih['id_pelatih']) {
                                echo $query_pelatih['nama'];
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            <?php
                            if ($query_pelatih['id'] == $pelatih['id_pelatih']) {
                                if ($query_pelatih['jk'] == '1') {
                                    echo "Laki-Laki";
                                } else {
                                    echo "Perempuan";
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Periode</td>
                        <td>:</td>
                        <td>
                            <?= date('Y');?>
                        </td>
                    </tr>
                    <tr>
                        <td>KTP</td>
                        <td>:</td>
                        <td>
                            <img src="file/ktp/<?= $pelatih['ktp']?>" alt="" style="width: 100px;">
                        </td>
                    </tr>
                    <tr>
                        <td>Ijazah</td>
                        <td>:</td>
                        <td>
                            <img src="file/ijazah/<?= $pelatih['ijazah']?>" alt="" style="width: 100px;">
                        </td>
                    </tr>
                    <tr>
                        <td>NPWP</td>
                        <td>:</td>
                        <td>
                            <img src="file/npwp/<?= $pelatih['npwp']?>" alt="" style="width: 100px;">
                        </td>
                    </tr>
                    <tr>
                        <td>SKP</td>
                        <td>:</td>
                        <td>
                            <img src="file/skp/<?= $pelatih['skp']?>" alt="" style="width: 100px;">
                        </td>
                    </tr>
                    <tr>
                        <td>SPK</td>
                        <td>:</td>
                        <td>
                            <img src="file/spk/<?= $pelatih['spk']?>" alt="" style="width: 100px;">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>