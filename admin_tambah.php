<?php ob_start();
if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:admin/index.php");
}else{
	header("location:index.php?pesan=gagal");
}
include "header.php"; 
include "koneksi.php"; 

?>
<div class="row">
    <div class="col">
        <!-- General Element -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Admin</h6>
            </div>
            <div class="card-body">
                <form action="admin_tambah.php" method="post">
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
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $query = mysqli_query($koneksi,"INSERT INTO admin SET password='$password',username='$username'");
                    header("Location:admin.php"); 
                }
                ?>
            </div>
        </div>
        <!-- Input Group -->
    </div>
    <?php include "footer.php"; ?>