<?php include "header.php";?>
<?php include "koneksi.php";?>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                <a href="admin_tambah.php" class="btn btn-sm btn-primary">+</a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Usernmae</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Usernmae</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $no = 1;
                            $query_admin = mysqli_query($koneksi,'SELECT * FROM admin');
                            while($admin = mysqli_fetch_array($query_admin)){
                        ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $admin['username']?></td>
                            <td>
                                <a href="admin_edit.php?id=<?php echo $admin['id'];?>" class="btn btn-sm btn-warning">Edit</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>