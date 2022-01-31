<?php ob_start();
include "header.php"; 
include "koneksi.php"; 
?>
<div class="row">
    <div class="col">
        <!-- General Element -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Pelatih</h6>
            </div>
            <div class="card-body">
                <form action="pelatih_tambah.php" method="post">
                    <div class="form-group">
                        <label for="">Nomor Induk Pegawai</label>
                        <input type="text" class="form-control" name="nip">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pelatih</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" id="" class="form-control">
                            <option value="">Pilih</option>
                            <option value="1">Laki-Laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success" name="submit">
                    </div>
                </form>
                <?php 
                if(isset($_POST['submit'])){
                    $nama = $_POST['nama'];
                    $nip = $_POST['nip'];
                    $jk = $_POST['jk'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $query = mysqli_query($koneksi,"INSERT INTO pelatih SET nama='$nama',nip='$nip',jk='$jk',password='$password',username='$username'");
                    header("Location:pelatih.php"); 
                }
                ?>
            </div>
        </div>
        <!-- Input Group -->
    </div>
    <?php include "footer.php"; ?>