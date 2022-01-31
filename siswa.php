<?php include "header.php"; ?>
<?php include "koneksi.php"; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                <div style="float: right;">
                    <a href="siswa_tambah.php" class="btn btn-sm btn-primary">+</a>
                    <a href="siswa_print.php" target="_blank" class="btn btn-sm btn-info">Print</a>
                </div>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        $query_siswa = mysqli_query($koneksi, 'SELECT * FROM siswa');
                        while ($siswa = mysqli_fetch_array($query_siswa)) {
                            if ($siswa['status'] != null) {
                        ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $siswa['nis'] ?></td>
                                    <td><?php echo $siswa['nama'];
                                        echo $siswa['status'] ?></td>
                                    <td>
                                        <?php
                                        if ($siswa['jk'] == "1") {
                                            echo "Laki-laki";
                                        } else {
                                            echo "Perempuan";
                                        }

                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($siswa['status'] == "1") {
                                            echo "Belum Diverifikasi";
                                        } elseif ($siswa['status'] == "2") {
                                            echo "Ditolak";
                                        } elseif ($siswa['status'] == "3") {
                                            echo "Diterima  ";
                                        }

                                        ?>
                                    </td>
                                    <td>
                                        <!-- <a href="siswa_edit.php?id=<?php echo $siswa['id']; ?>" class="btn btn-sm btn-warning">Edit</a> -->
                                        <a href="siswa_detail.php?id=<?php echo $siswa['id']; ?>" class="btn btn-sm btn-info">Detail</a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>