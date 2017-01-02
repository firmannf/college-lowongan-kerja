<?php
	require "../../php/connection.php";
	$id = $_POST['id'];
	$login_id = $_POST['login_id'];
			
	$strQuery = "DELETE FROM calon_pekerja WHERE calon_pekerja_id = $id";
	$query = mysqli_query($connection, $strQuery);
	if($query){
		$strQuery = "DELETE FROM login WHERE login_id = $login_id";
		$query = mysqli_query($connection, $strQuery);
		if($query){
			echo "<script language=javascript>document.location.href='../calonpekerja.php'</script>";
			mysqli_close($connection);
		}else {
		echo "<script language=javascript>document.location.href='../calonpekerja.php'</script>";
		mysqli_close($connection);
		}
	}else{
		echo "<script language=javascript>document.location.href='../calonpekerja.php'</script>";
		mysqli_close($connection);
	}
?>