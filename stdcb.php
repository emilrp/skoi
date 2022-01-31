k<?php include "header.php";?>
<div class="row">

<div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">STANDAR PENILAIAN CABANG OLAHRAGA</h6>
                </div>
                <div class="card-body">
                  <?php if(empty($_GET['ed'])){ ?>
                  <form action='aksi.php' method='POST'>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Cabang Olahraga</label>
                      <div class='col-sm-9'>
                      <select class='form-control' id='exampleFormControlSelect1' name='idc'>
                          <?php $qo=mysqli_query($kon, "SELECT * FROM cabor");
                            while($q=mysqli_fetch_assoc($qo)){
                              echo"<option value='$q[id]'>$q[nm]</option>";} ?>
                      </select>
                      </div>
                    </div>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Standar Penilaian</label>
                      <div class='col-sm-9'>
                      <select class='form-control' id='exampleFormControlSelect1' name='idk'>
                          <?php $do=mysqli_query($kon, "SELECT * FROM stdnl");
                            while($d=mysqli_fetch_assoc($do)){
                              echo"<option value='$d[id]'>$d[nm]</option>";} ?>
                      </select>
                      </div>
                    </div>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Nilai</label>
                      <div class='col-sm-9'>
                      <select class='form-control' id='exampleFormControlSelect1' name='nil'>
                          <?php $ko=mysqli_query($kon, "SELECT * FROM kat");
                            while($k=mysqli_fetch_assoc($ko)){
                              echo"<option value='$k[id]'>$k[nm] ($k[nil])</option>";} ?>
                      </select>
                      </div>
                    </div>
                    <input type='hidden' name='cek' value='m'>
                    <div class='form-group row'>
                      <div class='col-sm-10'>
                        <button type='submit' class='btn btn-primary'>Simpan</button>
                      </div>
                    </div>
                  </form>
                  <?php }else{ 
                    $e=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM stdcb WHERE id='$_GET[id]'"));
                    echo"<form action='aksi.php' method='POST'>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Cabang Olahraga</label>
                      <div class='col-sm-9'>
                        <select class='form-control' id='exampleFormControlSelect1' name='idc'>
                          <option value='' disabled>Pilih Cabor</option>";
                          $w1 = mysqli_query($kon, "SELECT * FROM cabor");
                          while ($w=mysqli_fetch_assoc($w1)){
                          if ($w['id']==$e['idc']){ $sel = "selected"; }else{ $sel = ""; }
                          echo "<option value='$w[id]' $sel>$w[nm]</option>";
                          }
                        echo "</select>
                      </div>
                    </div>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Standar Penilaian</label>
                      <div class='col-sm-9'>
                      <select class='form-control' id='exampleFormControlSelect1' name='idk'>
                          <option value='' disabled>Pilih Standar Penilaian</option>";
                          $c1 = mysqli_query($kon, "SELECT * FROM stdnl");
                          while ($c=mysqli_fetch_assoc($c1)){
                          if ($c['id']==$e['idk']){ $sec = "selected"; }else{ $sec = ""; }
                          echo "<option value='$c[id]' $sec>$c[nm]</option>";
                          }
                        echo "</select>
                      </div>
                    </div>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Nilai</label>
                      <div class='col-sm-9'>
                      <select class='form-control' id='exampleFormControlSelect1' name='nil'>
                          <option value='' disabled>Pilih Kategori</option>";
                          $o1 = mysqli_query($kon, "SELECT * FROM kat");
                          while ($o=mysqli_fetch_assoc($o1)){
                          if ($o['id']==$e['idk']){ $sep = "selected"; }else{ $sep = ""; }
                          echo "<option value='$o[id]' $sep>$o[nm] ($o[nil])</option>";
                          }
                        echo "</select>
                      </div>
                    </div>
                    <input type='hidden' name='cek' value='n'>
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
                        <th>Cabang Olah Raga</th>
                        <th>Standar Penilaian</th>
                        <th>Nilai</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Cabang Olah Raga</th>
                        <th>Standar Penilaian</th>
                        <th>Nilai</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $ro=mysqli_query($kon, "SELECT * FROM stdcb");
                    while($r=mysqli_fetch_assoc($ro)){
                        $ca=mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM cabor WHERE id='$r[idc]'"));
                        $sn=mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM stdnl WHERE id='$r[idk]'"));
                        $ka=mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM kat WHERE id='$r[nil]'"));
                        echo"<tr><td>$n</td><td>$ca[nm]</td><td>$sn[nm]</td><td>$ka[nm] ($ka[nil])</td>
                        <td><a href='stdcb.php?id=$r[id]&ed=ed'>Edit</a></td>
                        <td><a href='hps.php?h=stdcb&id=$r[id]' onClick=\"return confirm('Anda Yakin Ingin Menghapus Data Ini ?')\">hapus</a></td>
                        </tr>";
                    $n++;}
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
<?php include "footer.php"; ?>