k<?php include "header.php";?>
<div class="row">
           
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">KATEGORI PENILAIAN</h6>
                </div>
                <div class="card-body">
                  <?php if(empty($_GET['ed'])){ ?>
                  <form action='aksi.php' method='POST'>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Nama Kategori</label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='inputEmail3' placeholder='nama' name='nm'>
                      </div>
                    </div>
                    <div class='form-group row'>
                      <label for='inputPassword3' class='col-sm-3 col-form-label'>Nilai Kategori</label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='inputPassword3' placeholder='nilai' name='nil'>
                      </div>
                    </div>
                    <input type='hidden' name='cek' value='a'>
                    <div class='form-group row'>
                      <div class='col-sm-10'>
                        <button type='submit' class='btn btn-primary'>Simpan</button>
                      </div>
                    </div>
                  </form>
                  <?php }else{ 
                    $e=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM kat WHERE id='$_GET[id]'"));
                    echo"<form action='aksi.php' method='POST'>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Nama Kategori</label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='inputEmail3' value='$e[nm]' name='nm'>
                      </div>
                    </div>
                    <div class='form-group row'>
                      <label for='inputPassword3' class='col-sm-3 col-form-label'>Nilai Kategori</label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='inputPassword3' value='$e[nil]' name='nil'>
                      </div>
                    </div>
                    <input type='hidden' name='cek' value='b'>
                    <input type='hidden' name='id' value='$e[id]' />
                    <div class='form-group row'>
                      <div class='col-sm-10'>
                        <button type='submit' class='btn btn-primary'>Simpan</button>
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Kategori Penilaian</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nilai</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nilai</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $ro=mysqli_query($kon, "SELECT * FROM kat");
                    while($r=mysqli_fetch_assoc($ro)){
                        echo"<tr><td>$n</td><td>$r[nm]</td><td>$r[nil]</td>
                        <td><a href='kat.php?id=$r[id]&ed=ed'>Edit</a></td>
                        <td><a href='hps.php?h=kat&id=$r[id]' onClick=\"return confirm('Anda Yakin Ingin Menghapus Data Ini ?')\">hapus</a></td>
                        </tr>";
                    $n++;}
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
<?php include "footer.php"; ?>