<?php ob_start();
include "header.php"; 
include "koneksi.php"; 
?>
<div class="row">
    <div class="col">
        <!-- General Element -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Siswa</h6>
            </div>
            <div class="card-body">
                <form action="siswa_tambah.php" method="post">
                    <div class="form-group">
                        <label for="">Nomor Induk Siswa</label>
                        <input type="text" class="form-control" name="nis">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="">Tgl Lahir</label>
                        <input type="date" class="form-control" name="tgl">
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
                        <label for="">Asal Sekolah</label>
                        <input type="text" class="form-control" name="asal_sekolah">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Ayah</label>
                        <input type="text" class="form-control" name="nm_ayah">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Ibu</label>
                        <input type="text" class="form-control" name="nm_ibu">
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
                        <label for="">Scan Akte Kelahiran</label>
                        <input type="file" class="form-control" name="akte">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Kartu Keluarga</label>
                        <input type="file" class="form-control" name="kk">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Kartu BPJS</label>
                        <input type="file" class="form-control" name="bpjs">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Surat Aktif Sekolah(dari Kepala Sekolah)</label>
                        <input type="file" class="form-control" name="aktif">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Legalisir Kartu NISN</label>
                        <input type="file" class="form-control" name="kartu_nisn">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Surat Keterangan Bebas Narkoba dari Instansi Pemerintahan (minimal 3 indikator)</label>
                        <input type="file" class="form-control" name="narkoba">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Photo 3x4</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Piagam minimal Tingkat Kab/Kota(bagi yang memiliki)</label>
                        <input type="file" class="form-control" name="piagam">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Surat Rekomendasi Dari Club/Pengurus Cabang Olahraga di Tingkat Kab/Kota/Prov</label>
                        <input type="file" class="form-control" name="rekom">
                    </div>
                    <div class="form-group">
                        <label for="">Scan Bukti Vaksin Covid-19(bagi yang memiliki) </label>
                        <input type="file" class="form-control" name="vaksin">
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success" name="submit">
                    </div>
                </form>
                <?php 
                if(isset($_POST['submit'])){
                    $nama = $_POST['nama'];
                    $nis = $_POST['nis'];
                    $tgl = $_POST['tgl'];
                    $jk = $_POST['jk'];
                    $asal_sekolah = $_POST['asal_sekolah'];
                    $nm_ayah = $_POST['nm_ayah'];
                    $nm_ibu = $_POST['nm_ibu'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    
                    $file_akte = $_FILES["akte"]["name"];
                    $tmp_akte = $_FILES["akte"]["tmp_name"];
                    $path_akte = "file/akte/" . $file_akte;
                    $move_akte = move_uploaded_file($tmp_akte, $path_akte);

                    $file_kk = $_FILES["kk"]["name"];
                    $tmp_kk = $_FILES["kk"]["tmp_name"];
                    $path_kk = "file/kk/" . $file_kk;
                    $move_kk = move_uploaded_file($tmp_kk, $path_kk);

                    $file_bpjs = $_FILES["bpjs"]["name"];
                    $tmp_bpjs = $_FILES["bpjs"]["tmp_name"];
                    $path_bpjs = "file/bpjs/" . $file_bpjs;
                    $move_bpjs = move_uploaded_file($tmp_bpjs, $path_bpjs);

                    $file_aktif = $_FILES["aktif"]["name"];
                    $tmp_aktif = $_FILES["aktif"]["tmp_name"];
                    $path_aktif = "file/aktif/" . $file_aktif;
                    $move_aktif = move_uploaded_file($tmp_aktif, $path_aktif);

                    $file_narkoba = $_FILES["narkoba"]["name"];
                    $tmp_narkoba = $_FILES["narkoba"]["tmp_name"];
                    $path_narkoba = "file/narkoba/" . $file_narkoba;
                    $move_narkoba = move_uploaded_file($tmp_narkoba, $path_narkoba);

                    $file_foto = $_FILES["foto"]["name"];
                    $tmp_foto = $_FILES["foto"]["tmp_name"];
                    $path_foto = "file/foto/" . $file_foto;
                    $move_foto = move_uploaded_file($tmp_foto, $path_foto);

                    $file_kartu_nisn = $_FILES["kartu_nisn"]["name"];
                    $tmp_kartu_nisn = $_FILES["kartu_nisn"]["tmp_name"];
                    $path_kartu_nisn = "file/kartu_nisn/" . $file_kartu_nisn;
                    $move_kartu_nisn = move_uploaded_file($tmp_kartu_nisn, $path_kartu_nisn);

                    $file_foto = $_FILES["foto"]["name"];
                    $tmp_foto = $_FILES["foto"]["tmp_name"];
                    $path_foto = "file/foto/" . $file_foto;
                    $move_foto = move_uploaded_file($tmp_foto, $path_foto);

                    $file_piagam = $_FILES["piagam"]["name"];
                    $tmp_piagam = $_FILES["piagam"]["tmp_name"];
                    $path_piagam = "file/piagam/" . $file_piagam;
                    $move_piagam = move_uploaded_file($tmp_piagam, $path_piagam);

                    $file_rekom = $_FILES["rekom"]["name"];
                    $tmp_rekom = $_FILES["rekom"]["tmp_name"];
                    $path_rekom = "file/rekom/" . $file_rekom;
                    $move_rekom = move_uploaded_file($tmp_rekom, $path_rekom);

                    $file_vaksin = $_FILES["vaksin"]["name"];
                    $tmp_vaksin = $_FILES["vaksin"]["tmp_name"];
                    $path_vaksin = "file/vaksin/" . $file_vaksin;
                    $move_vaksin = move_uploaded_file($tmp_vaksin, $path_vaksin);

                    $query = mysqli_query($koneksi,"INSERT INTO siswa SET nama='$nama',nis='$nis',jk='$jk',nm_ayah='$nm_ayah',nm_ibu='$nm_ibu',asal_sekolah = '$asal_sekolah',tgl='$tgl',password='$password',username='$username',
                    akte='$file_akte',kk='$file_kk',bpjs=");
                    header("Location:siswa.php"); 
                }
                ?>
            </div>
        </div>
        <!-- Input Group -->
    </div>
    <?php include "footer.php"; ?>