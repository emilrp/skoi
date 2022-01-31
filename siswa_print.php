<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logos.png" rel="icon">
    <title>SKOI - KALTIM</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>
    <table class="table table-sm table-bordered" id="dataTable">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query_siswa = mysqli_query($koneksi, 'SELECT * FROM siswa');
            while ($siswa = mysqli_fetch_array($query_siswa)) {
                if ($siswa['status'] == '2' || $siswa['status'] == '3') {
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

                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>