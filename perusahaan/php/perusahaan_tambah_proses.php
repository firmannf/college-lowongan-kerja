<?php
	require "../../php/connection.php";
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$kota_id = $_POST['kota_id'];
	$email = $_POST['email'];
	$telepon = $_POST['telepon'];

	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['konfirmasi_password'];

if($password == $confirm_password){
	$encPassword = md5($password);
	$strQuery = "INSERT INTO login VALUES(null,'$username', '$encPassword', 'Perusahaan')";
	$query = mysqli_query($connection, $strQuery);
	if($query){
		$login_id = mysqli_insert_id($connection);
		$strQuery = "INSERT INTO perusahaan VALUES( 
			null,
			'$nama', 
			'$alamat', 
			'$kota_id', 
			'$email',  
			'$telepon',
			'$login_id'
		)";
		$query = mysqli_query($connection, $strQuery);
		if($query){	
			echo "<script language=javascript>alert('Registrasi Berhasil.');</script>";			
			echo "<script language=javascript>document.location.href='../login.php'</script>";
			mysqli_close($connection);
		}else{
			echo "<script language=javascript>alert('Registrasi Berhasil.');</script>";		
			echo "<script language=javascript>document.location.href='../login.php'</script>";
			mysqli_close($connection);
		}
	}else {
		echo "<script language=javascript>alert('Username Sudah Dipakai!');</script>";
		echo "<script language=javascript>document.location.href='../signup.php'</script>";
		mysqli_close($connection);
	}
}else{
	echo "<script language=javascript>alert('Password Salah!');</script>";
	echo "<script language=javascript>document.location.href='../signup.php'</script>";
	mysqli_close($connection);
}
?>