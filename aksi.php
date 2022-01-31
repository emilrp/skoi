<?php 
include "cok.php";
$h=$_POST['cek'];
$n=1;
	
	if ($h=='a'){
	mysqli_query($kon, "INSERT INTO kat (id, nm, nil) VALUES ('', '$_POST[nm]', '$_POST[nil]')");
  	header('location:kat.php'); }
	
	if ($h=='b'){
	mysqli_query($kon, "UPDATE kat SET nm='$_POST[nm]', nil='$_POST[nil]' WHERE id='$_POST[id]'");
	header('location:kat.php'); }

	if ($h=='c'){
	mysqli_query($kon, "INSERT INTO norma (id, nm) VALUES ('', '$_POST[nm]')");
	header('location:norma.php'); }

	if ($h=='d'){
	mysqli_query($kon, "UPDATE norma SET nm='$_POST[nm]' WHERE id='$_POST[id]'");
	header('location:norma.php'); }

	if ($h=='e'){
	mysqli_query($kon, "INSERT INTO stdnl (id, nm, sor) VALUES ('', '$_POST[nm]', '$_POST[io]')");
	header('location:stdnl.php'); }

	if ($h=='f'){
	mysqli_query($kon, "UPDATE stdnl SET nm='$_POST[nm]', sor='$_POST[io]' WHERE id='$_POST[id]'");
	header('location:stdnl.php'); }

	if ($h=='g'){
	mysqli_query($kon, "INSERT INTO cabor (id, nm) VALUES ('', '$_POST[nm]')");
	header('location:cabor.php'); }

	if ($h=='h'){
	mysqli_query($kon, "UPDATE cabor SET nm='$_POST[nm]' WHERE id='$_POST[id]'");
	header('location:cabor.php'); }
	
	if ($h=='i'){
	mysqli_query($kon, "INSERT INTO kla (id, nm, nil) VALUES ('', '$_POST[nm]', '$_POST[nil]')");
	header('location:kla.php'); }

	if ($h=='j'){
	mysqli_query($kon, "UPDATE kla SET nm='$_POST[nm]', nil='$_POST[nil]' WHERE id='$_POST[id]'");
	header('location:kla.php'); }	
	
	if ($h=='k'){
	mysqli_query($kon, "INSERT INTO nil (id, idn, ids, idk, nil) VALUES ('', '$_POST[idn]', '$_POST[ids]', '$_POST[idk]', '$_POST[nil]')");
	header('location:nil.php'); }

	if ($h=='l'){
	mysqli_query($kon, "UPDATE nil SET idn='$_POST[idn]', ids='$_POST[ids]', idk='$_POST[idk]', nil='$_POST[nil]' WHERE id='$_POST[id]'");
	header('location:nil.php'); }
	
	if ($h=='m'){
	mysqli_query($kon, "INSERT INTO stdcb (id, idc, idk, nil) VALUES ('', '$_POST[idc]', '$_POST[idk]', '$_POST[nil]')");
	header('location:stdcb.php'); }

	if ($h=='n'){
	mysqli_query($kon, "UPDATE stdcb SET idc='$_POST[idc]', idk='$_POST[idk]', nil='$_POST[nil]' WHERE id='$_POST[id]'");
	header('location:stdcb.php'); }

	if ($h=='o'){
		$n=1;
		$ha=mysqli_query($kon,"SELECT * FROM stdnl");
		while($k=mysqli_fetch_array($ha)){
			$ty=$_POST['idn'][$n];
			$tq=$_POST['nil'][$n];
			mysqli_query($kon, "INSERT INTO peni (id, idp, ids, idn, nil) VALUES('', '$_POST[idp]', '$_POST[ids]', '$ty', '$tq')");
			mysqli_query($kon, "UPDATE siswa SET cn='$_POST[idp]' WHERE id='$_POST[ids]'");
		$n++;	
		}
	header('location:peni.php'); }

	if ($h=='p'){
	mysqli_query($kon, "UPDATE peni SET nil='$_POST[nil]' WHERE id='$_POST[id]'");
	header('location:peni.php'); }
	
		
?>