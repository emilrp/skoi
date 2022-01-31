<?php 
ob_start();
include "header.php"; ?>
<?php

include "koneksi.php";
$id = $_SESSION['id_pelatih'];
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Pelatih</h6>
                <a href="p_dataPelatih_tambah.php" class="btn btn-sm btn-primary">+</a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Periode</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Periode</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        $query_pelatih = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pelatih WHERE id = '$id'"));
                        $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_pelatih WHERE id_pelatih = '$id'");
                        while ($pelatih = mysqli_fetch_array($query_detail)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>
                                    <?php
                                    if ($query_pelatih['id'] == $pelatih['id_pelatih']) {
                                        echo $query_pelatih['nip'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($query_pelatih['id'] == $pelatih['id_pelatih']) {
                                        echo $query_pelatih['nama'];
                                    }
                                    ?>
                                </td>
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
                                <td>
                                    <?= $pelatih['thn_daftar']; ?>
                                </td>
                                <td>
                                    <?php if ($pelatih['status'] == '0') { ?>
                                        <form action="p_dataPelatih.php?id=<?= $pelatih['id'] ?>" method="post">
                                            <a href="p_dataPelatih_show.php?id=<?= $pelatih['id'] ?>" class="btn btn-sm btn-info">Detail</a>
                                            <input type="hidden" name="status" value="1" id="">
                                            <input type="submit" value="Verifikasi" name="<?= $pelatih['id']?>" class="btn btn-sm btn-success" onclick="return confirm('Apakah Anda Ingin Mengirim Data Anda? ')">
                                            <?php 
                                                if(isset($_POST[$pelatih['id']])){
                                                    $status = $_POST['status'];
                                                    $sukses = mysqli_query($koneksi, "UPDATE detail_pelatih set status = '$status' WHERE id = '$pelatih[id]'");
                                                    header('Location:p_dataPelatih.php');
                                                }
                                            ?>
                                        </form>
                                    <?php } elseif ($pelatih['status'] == '1') { ?>
                                        <a href="p_dataPelatih_show.php?id=<?= $pelatih['id'] ?>" class="btn btn-sm btn-info">Detail | Data Terkirim</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>