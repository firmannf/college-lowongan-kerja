<?php
	require "../../php/connection.php";
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$kota_id = $_POST['kota_id'];
	$email = $_POST['email'];
	$telepon = $_POST['telepon'];

	$login_id = $_POST['login_id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
			
	$strQuery = "UPDATE perusahaan SET 
	perusahaan_nama = '$nama', 
	perusahaan_alamat = '$alamat', 
	kota_id = '$kota_id', 
	perusahaan_email = '$email',  
	perusahaan_telepon = '$telepon'
	WHERE perusahaan_id = $id";
	$query = mysqli_query($connection, $strQuery);
	if($query){
		if(!empty($password)){
			$encPassword = md5($password);
			$strQuery = "UPDATE login SET login_username = '$username', login_password = '$encPassword' WHERE login_id = $login_id";
			$query = mysqli_query($connection, $strQuery);
		}else {
			$encPassword = md5($password);
			$strQuery = "UPDATE login SET login_username = '$username' WHERE login_id = $login_id";
			$query = mysqli_query($connection, $strQuery);
		}	
		echo "<script language=javascript>document.location.href='../perusahaan.php'</script>";
		mysqli_close($connection);
	}else{
		echo "<script language=javascript>document.location.href='../perusahaan.php'</script>";
		mysqli_close($connection);
	}
?>