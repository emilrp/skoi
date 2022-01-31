k<?php include "header.php";?>
<div class="row">

<div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">KATEGORI STANDAR PENILAIAN</h6>
                </div>
                <div class="card-body">
                  <?php if(empty($_GET['ed'])){ ?>
                  <form action='aksi.php' method='POST'>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Nama Standar Penilaian</label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='inputEmail3' placeholder='nama' name='nm'>
                      </div>
                    </div>
                    <fieldset class='form-group'>
                      <div class='row'>
                        <legend class='col-form-label col-sm-3 pt-0'>Increase / Decrease</legend>
                        <div class='col-sm-9'>
                          <div class='custom-control custom-radio'>
                            <input type='radio' id='customRadio1' name='io' class='custom-control-input' value='i'>
                            <label class='custom-control-label' for='customRadio1'>Increase</label>
                          </div>
                          <div class='custom-control custom-radio'>
                            <input type='radio' id='customRadio2' name='io' class='custom-control-input' value='d'>
                            <label class='custom-control-label' for='customRadio2'>Decrease</label>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    <input type='hidden' name='cek' value='e'>
                    <div class='form-group row'>
                      <div class='col-sm-10'>
                        <button type='submit' class='btn btn-primary'>Simpan</button>
                      </div>
                    </div>
                  </form>
                  <?php }else{ 
                    $e=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM stdnl WHERE id='$_GET[id]'"));
                    if($e['sor']=="i"){$i="checked"; $d="";}else{$d="checked"; $i="";}
                    echo"<form action='aksi.php' method='POST'>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Nama Kategori</label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='inputEmail3' value='$e[nm]' name='nm'>
                      </div>
                    </div>
                    <fieldset class='form-group'>
                      <div class='row'>
                        <legend class='col-form-label col-sm-3 pt-0'>Increase / Decrease</legend>
                        <div class='col-sm-9'>
                          <div class='custom-control custom-radio'>
                            <input type='radio' id='customRadio1' name='io' class='custom-control-input' value='i' $i>
                            <label class='custom-control-label' for='customRadio1'>Increase</label>
                          </div>
                          <div class='custom-control custom-radio'>
                            <input type='radio' id='customRadio2' name='io' class='custom-control-input' value='d' $d>
                            <label class='custom-control-label' for='customRadio2'>Decrease</label>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    <input type='hidden' name='cek' value='f'>
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Standar Penilaian</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>I/D</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>I/D</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $ro=mysqli_query($kon, "SELECT * FROM stdnl");
                    while($r=mysqli_fetch_assoc($ro)){
                        echo"<tr><td>$n</td><td>$r[nm]</td><td>$r[sor]</td>
                        <td><a href='stdnl.php?id=$r[id]&ed=ed'>Edit</a></td>
                        <td><a href='hps.php?h=stdnl&id=$r[id]' onClick=\"return confirm('Anda Yakin Ingin Menghapus Data Ini ?')\">hapus</a></td>
                        </tr>";
                    $n++;}
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
<?php include "footer.php"; ?>