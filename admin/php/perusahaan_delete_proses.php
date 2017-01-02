<?php
	require "../../php/connection.php";
	$id = $_POST['id'];
	$login_id = $_POST['login_id'];
			
	$strQuery = "DELETE FROM perusahaan WHERE perusahaan_id = $id";
	$query = mysqli_query($connection, $strQuery);
	if($query){
		$strQuery = "DELETE FROM login WHERE login_id = $login_id";
		$query = mysqli_query($connection, $strQuery);
		if($query){
			echo "<script language=javascript>document.location.href='../perusahaan.php'</script>";
			mysqli_close($connection);
		}else {
		echo "<script language=javascript>document.location.href='../perusahaan.php'</script>";
		mysqli_close($connection);
		}
	}else{
		echo "<script language=javascript>document.location.href='../perusahaan.php'</script>";
		mysqli_close($connection);
	}
?>