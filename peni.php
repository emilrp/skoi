<?php include "header.php";
$user = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM pelatih WHERE username = '$_SESSION[username]'"));
$cn=1;
?>
<div class="row">

           
<div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">PENILAIAN</h6>
                </div>
                <div class="card-body">
                  <?php if(empty($_GET['ed'])){ 
                            if(empty($_POST['ids'])){
                      ?>
                  <form action='peni.php' method='POST'>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Pilih Siswa</label>
                      <div class='col-sm-9'>
                      <select class='form-control' id='exampleFormControlSelect1' name='ids'>
                          <?php $qo=mysqli_query($kon, "SELECT * FROM siswa WHERE cn=0 ");
                            while($q=mysqli_fetch_assoc($qo)){
                              echo"<option value='$q[id]'>$q[nama]</option>";} ?>
                      </select>
                      </div>
                    </div>
                    <div class='form-group row'>
                      <div class='col-sm-10'>
                        <button type='submit' class='btn btn-primary'>Pilih</button>
                      </div>
                    </div>
                  </form>
                  <?php }else{ 
                      $csw=mysqli_num_rows(mysqli_query($kon, "SELECT * FROM peni WHERE ids='$_POST[ids]'"));
                      if($csw==0){
                      ?>
                    <form action='aksi.php' method='POST'>
                    <div class='form-group row'>
                      <label for='inputPassword3' class='col-sm-3 col-form-label'>Nama Siswa</label>
                      <div class='col-sm-9'>
                      <?php $si=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM siswa WHERE id='$_POST[ids]'"));
                        echo"<input type='text' class='form-control' id='inputPassword3' value='$si[nama]' disabled>
                        <input type='hidden' name='idp' value='$user[id]'>
                        <input type='hidden' name='ids' value='$si[id]'>"; ?>
                      </div>
                    </div>
                    <?php $qo=mysqli_query($kon, "SELECT * FROM stdnl");
                            while($q=mysqli_fetch_assoc($qo)){
                              echo"
                    <div class='form-group row'>
                      <label for='inputPassword3' class='col-sm-3 col-form-label'>$q[nm]</label>
                      <div class='col-sm-9'>
                      <input type='hidden' name='idn[$cn]' value='$q[id]'>
                        <input type='text' class='form-control' id='inputPassword3' placeholder='Nilai $q[nm]' name='nil[$cn]'>
                      </div>
                    </div>
                    "; $cn++; } ?>
                    
                    <input type='hidden' name='cek' value='o'>
                    <div class='form-group row'>
                      <div class='col-sm-10'>
                        <button type='submit' class='btn btn-primary'>Simpan</button>
                      </div>
                    </div>
                  </form>
                  <?php }else{
                      echo"DATA SISWA INI SUDAH ANDA ISI";
                  }
                  
                }

                  }else{ 
                    $e=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM peni WHERE id='$_GET[id]'"));
                    $si=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM siswa WHERE id='$e[ids]'"));
                    $ni=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM stdnl WHERE id='$e[idn]'"));
                    echo"<form action='aksi.php' method='POST'>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Nama Siswa</label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='inputEmail3' value='$si[nama]' name='nm' disabled>
                      </div>
                    </div>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Nilai $ni[nm]</label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='inputEmail3' value='$e[nil]' name='nil'>
                      </div>
                    </div>
                    <input type='hidden' name='cek' value='p'>
                    <input type='hidden' name='id' value='$e[id]' />
                    <div class='form-group row'>
                      <div class='col-sm-10'>
                        <button type='submit' class='btn btn-primary'>UPDATE</button>
                      </div>
                    </div>
                  </form>";

                    ?>

                  <?php } ?>
                </div>
              </div>
            </div>
            </div>

            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Penilaian</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kategori Penilaian</th>
                        <th>Nilai</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kategori Penilaian</th>
                        <th>Nilai</th>
                        <th>Edit</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $ro=mysqli_query($kon, "SELECT * FROM peni WHERE idp='$user[id]'");
                    while($r=mysqli_fetch_assoc($ro)){
                        $no=mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM siswa WHERE id='$r[ids]'"));
                        $sn=mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM stdnl WHERE id='$r[idn]'"));
                        echo"<tr><td>$n</td><td>$no[nama]</td><td>$sn[nm]</td><td>$r[nil]</td>
                        <td><a href='peni.php?id=$r[id]&ed=ed'>Edit</a></td>
                        </tr>";
                    $n++;}
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
<?php include "footer.php"; ?>