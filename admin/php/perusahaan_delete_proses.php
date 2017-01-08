<?php
	require "../../php/connection.php";
	$id = $_POST['id'];
	$login_id = $_POST['login_id'];

	mysqli_begin_transaction($connection, MYSQLI_TRANS_START_READ_WRITE);
	mysqli_autocommit($connection, FALSE);
		
	$strQuery = "DELETE FROM perusahaan WHERE perusahaan_id = $id";
	$query = mysqli_query($connection, $strQuery);
	if($query){
		$strQuery = "DELETE FROM login WHERE login_id = $login_id";
		$query = mysqli_query($connection, $strQuery);
		if($query){
			mysqli_commit($connection);
		}else {
			mysqli_rollback($connection);
			echo "<script language=javascript>alert('Terjadi Kesalahan Saat Menghapus Data Perusahaan');</script>";
		}
	}else{
		mysqli_rollback($connection);
		echo "<script language=javascript>alert('Terjadi Kesalahan Saat Menghapus Data Login Perusahaan');</script>";
	}

	mysqli_autocommit($connection, TRUE);
	echo "<script language=javascript>document.location.href='../perusahaan.php'</script>";
	mysqli_close($connection);
?>