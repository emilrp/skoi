<?php include "header.php";
$user = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM pelatih WHERE username = '$_SESSION[username]'"));
$cn=1;
?>
<div class="row">

        <?php if(empty($_GET['ed'])){ 
                }else{ ?>
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">REPORT SCOUTING</h6>
                </div>
                <div class="card-body">
                  <?php
                    $e=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM siswa WHERE id='$_GET[id]'"));
                    $nr=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM norma WHERE id='$e[idn]'"));
                    echo"<form action='aksi.php' method='POST'>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Nama Siswa</label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='inputEmail3' value='$e[nama]' name='nm' disabled>
                      </div>
                    </div>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Norma</label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='inputEmail3' value='$nr[nm]' name='nm' disabled>
                      </div>
                    </div>";?>
                    <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Detail Penilaian</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <tbody>
                      <tr><th>Kategori</th>
                        <?php $pkaa=mysqli_query($kon, "SELECT * FROM stdnl ORDER BY id ASC");
                        while($pka=mysqli_fetch_array($pkaa)){
                          echo"<td>$pka[nm]</td>";
                        }
                        ?>
                      </tr>
                      <tr><th>Nilai</th>
                        <?php $pnaa=mysqli_query($kon, "SELECT * FROM peni WHERE ids='$_GET[id]' ORDER BY idn ASC");
                        while($pna=mysqli_fetch_array($pnaa)){
                          $id=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM stdnl WHERE id='$pna[idn]'"));
                          if($id['sor']=='i'){
                            $ni=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM nil WHERE idn='$e[idn]' AND ids='$id[id]' AND nil<'$pna[nil]'"));
                            $nni=mysqli_num_rows(mysqli_query($kon, "SELECT * FROM nil WHERE idn='$e[idn]' AND ids='$id[id]' AND nil<'$pna[nil]'"));
                            if($nni==0){$ni2=1;}else{$ni2=$ni['idk'];}
                          }else{
                            $ni=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM nil WHERE idn='$e[idn]' AND ids='$id[id]' AND nil>'$pna[nil]'"));
                            $nni=mysqli_num_rows(mysqli_query($kon, "SELECT * FROM nil WHERE idn='$e[idn]' AND ids='$id[id]' AND nil>'$pna[nil]'"));
                            if($nni==0){$ni2=5;}else{$ni2=$ni['idk'];}    
                          }
                          $kat=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM kat WHERE id='$ni2'"));
                          echo"<td>$pna[nil] : $kat[nm] ($kat[nil])</td>";
                        }
                        ?>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Cabang Olah Raga</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <tbody>
                      <tr><th>Nama \ Kategori</th>
                        <?php $pkaa=mysqli_query($kon, "SELECT * FROM stdnl ORDER BY id ASC");
                        while($pka=mysqli_fetch_array($pkaa)){
                          echo"<th>$pka[nm]</th>";
                        }
                        ?>
                        <th>Keterangan</th>
                      </tr>
                      <?php
                        $ca=mysqli_query($kon, "SELECT * FROM cabor ORDER BY id ASC");
                        while($c=mysqli_fetch_array($ca)){
                          $ho=0;
                          echo"<tr><th>$c[nm]</th>";
                          $np=mysqli_query($kon, "SELECT * FROM stdnl ORDER BY id ASC");
                          while($nl=mysqli_fetch_array($np)){
                            $si=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM peni WHERE ids='$e[id]' AND idn='$nl[id]'"));
                            $st1=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM stdcb WHERE idc='$c[id]' AND idk='$nl[id]'"));
                            $k1=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM kat WHERE id='$st1[nil]'"));
                            if($si['idk'] < $k1['nil']){echo "<td>$k1[nm]</td>";}else{echo"<td><b>$k1[nm]<b></td>";$ho++;}
                          }
                          if($ho==6){$h="LULUS";}else{$h="TIDAK LULUS";}
                          echo"<td>$h</td>";
                          echo"</tr>";
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                <div class="card-footer"></div>
              </div>
                    
                  <?php echo"</form>";

                    ?>
                </div>
              </div>
            </div>
            </div>
            <?php } ?>

            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Report Scouting</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>LTBT</th>
                        <th>LBB</th>
                        <th>LT</th>
                        <th>LK</th>
                        <th>Lari 40 Meter</th>
                        <th>MFT</th>
                        <th>Nilai Akhir</th>
                        <th>Status</th>
                        <th>Detail</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>LTBT</th>
                        <th>LBB</th>
                        <th>LT</th>
                        <th>LK</th>
                        <th>Lari 40 Meter</th>
                        <th>MFT</th>
                        <th>Nilai Akhir</th>
                        <th>Status</th>
                        <th>Detail</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $ro=mysqli_query($kon, "SELECT * FROM siswa WHERE cn='$user[id]'");
                    while($r=mysqli_fetch_assoc($ro)){
                        $n1=mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM peni WHERE ids='$r[id]' AND idn=1 "));
                        $n2=mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM peni WHERE ids='$r[id]' AND idn=2 "));
                        $n3=mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM peni WHERE ids='$r[id]' AND idn=5 "));
                        $n4=mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM peni WHERE ids='$r[id]' AND idn=6 "));
                        $n5=mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM peni WHERE ids='$r[id]' AND idn=7 "));
                        $n6=mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM peni WHERE ids='$r[id]' AND idn=8 "));
                        echo"<tr><td>$n</td><td>$r[nama]</td><td>$n1[nil]</td><td>$n2[nil]</td><td>$n3[nil]</td><td>$n4[nil]</td><td>$n5[nil]</td><td>$n6[nil]</td>
                        <td>nilai akir</td><td>status</td>
                        <td><a href='reso.php?id=$r[id]&ed=ed'>Detail</a></td>
                        </tr>";

                        $w11=mysqli_query($kon, "SELECT * FROM peni WHERE ids='$r[id]' ORDER BY idn ASC");
                        while($w1=mysqli_fetch_array($w11)){
                          $id1=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM stdnl WHERE id='$w1[idn]'"));
                          if($id1['sor']=='i'){
                            $n1=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM nil WHERE idn='$r[idn]' AND ids='$id1[id]' AND nil<'$w1[nil]'"));
                            $nn1=mysqli_num_rows(mysqli_query($kon, "SELECT * FROM nil WHERE idn='$r[idn]' AND ids='$id1[id]' AND nil<'$w1[nil]'"));
                            if($nn1==0){$n12=1;}else{$n12=$n1['idk'];}
                          }else{
                            $n1=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM nil WHERE idn='$r[idn]' AND ids='$id1[id]' AND nil>'$w1[nil]'"));
                            $nn1=mysqli_num_rows(mysqli_query($kon, "SELECT * FROM nil WHERE idn='$r[idn]' AND ids='$id1[id]' AND nil>'$w1[nil]'"));
                            if($nn1==0){$n12=5;}else{$n12=$n1['idk'];}    
                          }
                          $ka1=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM kat WHERE id='$n12'"));
                          mysqli_query($kon, "UPDATE peni SET idk='$ka1[id]' WHERE idp='$user[id]' AND ids='$r[id]' AND idn='$w1[idn]'");
                        }

                    $n++;}
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
<?php include "footer.php"; ?>