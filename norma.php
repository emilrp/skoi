k<?php include "header.php";?>
<div class="row">
<div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">NORMA PENILAIAN</h6>
                </div>
                <div class="card-body">
                  <?php if(empty($_GET['ed'])){ ?>
                  <form action='aksi.php' method='POST'>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Nama Norma Penilaian</label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='inputEmail3' placeholder='nama' name='nm'>
                      </div>
                    </div>
                    <input type='hidden' name='cek' value='c'>
                    <div class='form-group row'>
                      <div class='col-sm-10'>
                        <button type='submit' class='btn btn-primary'>Simpan</button>
                      </div>
                    </div>
                  </form>
                  <?php }else{ 
                    $e=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM norma WHERE id='$_GET[id]'"));
                    echo"<form action='aksi.php' method='POST'>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Nama Kategori</label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='inputEmail3' value='$e[nm]' name='nm'>
                      </div>
                    </div>
                    <input type='hidden' name='cek' value='d'>
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Norma Penilaian</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $ro=mysqli_query($kon, "SELECT * FROM norma");
                    while($r=mysqli_fetch_assoc($ro)){
                        echo"<tr><td>$n</td><td>$r[nm]</td>
                        <td><a href='norma.php?id=$r[id]&ed=ed'>Edit</a></td>
                        <td><a href='hps.php?h=norma&id=$r[id]' onClick=\"return confirm('Anda Yakin Ingin Menghapus Data Ini ?')\">hapus</a></td></tr>";
                    $n++;}
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
<?php include "footer.php"; ?>