<?php include "cok.php";
$a=$_GET['h'];

if($a=='norma'){
	mysqli_query($kon, "DELETE FROM norma WHERE id='$_GET[id]'");
	header("Location: norma.php");	
}

if($a=='kat'){
	mysqli_query($kon, "DELETE FROM kat WHERE id='$_GET[id]'");
	header("Location: kat.php");	
}

if($a=='stdnl'){
	mysqli_query($kon, "DELETE FROM stdnl WHERE id='$_GET[id]'");
	header("Location: stdnl.php");	
}

if($a=='cabor'){
	mysqli_query($kon, "DELETE FROM cabor WHERE id='$_GET[id]'");
	header("Location: cabor.php");	
}

if($a=='nil'){
	mysqli_query($kon, "DELETE FROM nil WHERE id='$_GET[id]'");
	header("Location: nil.php");	
}

if($a=='stdcb'){
	mysqli_query($kon, "DELETE FROM stdcb WHERE id='$_GET[id]'");
	header("Location: stdcb.php");	
}

if($a=='kla'){
	mysqli_query($kon, "DELETE FROM kla WHERE id='$_GET[id]'");
	header("Location: kla.php");	
}
?>