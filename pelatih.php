<?php include "header.php";?>
<?php include "koneksi.php";?>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Pelatih</h6>
                <a href="pelatih_tambah.php" class="btn btn-sm btn-primary">+</a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Usernmae</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Usernmae</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $no = 1;
                            $query_pelatih = mysqli_query($koneksi,'SELECT * FROM pelatih');
                            while($pelatih = mysqli_fetch_array($query_pelatih)){
                        ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $pelatih['nip']?></td>
                            <td><?php echo $pelatih['nama']?></td>
                            <td>
                                <?php  
                                if ($pelatih['jk']=="1") {
                                    echo "Laki-laki";
                                } else {
                                    echo "Perempuan";
                                }
                                
                                ?>
                            </td>
                            <td><?php echo $pelatih['username']?></td>
                            <!-- <td>
                                <a href="pelatih_show.php?id=<?php echo $pelatih['id'];?>" class="btn btn-sm btn-info">Detail</a>
                            </td> -->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>