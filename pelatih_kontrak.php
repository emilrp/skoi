<?php
ob_start();
include "header.php"; ?>
<?php

include "koneksi.php";
?>
<style>
    .tabcontent {
        display: none;
        padding: 6px 12px;
        /* border: 1px solid #ccc; */
        border-top: none;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<div class="row">
    <div class="col-lg-12">

        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Pelatih</h6>
                <a href="p_dataPelatih_tambah.php" class="btn btn-sm btn-primary">+</a>

            </div>
            <div class="card-body">
                <button class="btn btn-sm btn-primary active" id="defaultOpen" onclick="openCity(event, 'witing')">Belum Diterima</button>
                <button class="btn btn-sm btn-success" onclick="openCity(event, 'London')">Diterima</button>
                <button class="btn btn-sm btn-danger" onclick="openCity(event, 'Paris')">Ditolak</button>
                <!-- Tab content -->
                <div id="London" class="tabcontent">
                    <br>
                    <h3>Diterima</h3>
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
                                $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_pelatih ORDER BY thn_daftar DESC");
                                while ($pelatih = mysqli_fetch_array($query_detail)) {
                                    if ($pelatih['status'] == 2) {
                                ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td>
                                                <?php
                                                $query_pelatih = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pelatih where id = '$pelatih[id_pelatih]'"));

                                                echo $query_pelatih['nip'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $query_pelatih['nama'];
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
                                                <a href="pelatih_kontrak_detail.php?id=<?= $pelatih['id'] ?>" target="_blank"class="btn btn-sm btn-info">Detail</a>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="Paris" class="tabcontent">
                    <br>
                    <h3>Ditolak</h3>
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
                                $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_pelatih ORDER BY thn_daftar DESC");
                                while ($pelatih = mysqli_fetch_array($query_detail)) {
                                    if ($pelatih['status'] == 3) {
                                ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td>
                                                <?php
                                                $query_pelatih = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pelatih where id = '$pelatih[id_pelatih]'"));

                                                echo $query_pelatih['nip'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $query_pelatih['nama'];
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
                                                <a href="pelatih_kontrak_detail.php?id=<?= $pelatih['id'] ?>" target="_blank"class="btn btn-sm btn-info">Detail</a>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="witing" class="tabcontent">
                    <br>
                    <h3>Belum Diterima</h3>
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
                                $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_pelatih ORDER BY thn_daftar DESC");
                                while ($pelatih = mysqli_fetch_array($query_detail)) {
                                    if ($pelatih['status'] == 1) {
                                ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td>
                                                <?php
                                                $query_pelatih = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pelatih where id = '$pelatih[id_pelatih]'"));

                                                echo $query_pelatih['nip'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $query_pelatih['nama'];
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
                                                <?php if ($pelatih['status'] == '1') { ?>
                                                    <a href="pelatih_kontrak_detail.php?id=<?= $pelatih['id'] ?>" target="_blank"class="btn btn-sm btn-info">Detail</a>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $pelatih['id']; ?>">
                                                        Verifikasi
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal<?= $pelatih['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda Mensetuji Kontrak Kerja ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                                                    <form action="pelatih_kontrak.php?id=<?= $pelatih['id'] ?>" method="post">
                                                                        <input type="submit" value="Tolak" name="t<?= $pelatih['id'] ?>" class="btn btn-danger">
                                                                        <input type="submit" value="Terima" name="s<?= $pelatih['id'] ?>" class="btn btn-success">
                                                                        <?php
                                                                        if (isset($_POST['s' . $pelatih['id']])) {
                                                                            $sukses = mysqli_query($koneksi, "UPDATE detail_pelatih set status = '2' WHERE id = '$pelatih[id]'");
                                                                            header('Location:pelatih_kontrak.php');
                                                                        }
                                                                        if (isset($_POST['t' . $pelatih['id']])) {
                                                                            $sukses = mysqli_query($koneksi, "UPDATE detail_pelatih set status = '3' WHERE id = '$pelatih[id]'");
                                                                            header('Location:pelatih_kontrak.php');
                                                                        }
                                                                        ?>
                                                                    </form>
                                                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } elseif ($pelatih['status'] == '1') { ?>
                                                    <a href="pelatih_kontrak_detail.php?id=<?= $pelatih['id'] ?>" target="_blank" class="btn btn-sm btn-info">Detail | Data Terkirim</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            document.getElementById("defaultOpen").click();
        </script>

        <?php include "footer.php"; ?>