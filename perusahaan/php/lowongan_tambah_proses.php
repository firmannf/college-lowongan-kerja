<?php
	require "../../php/connection.php";
	session_start();
	$perusahaan_id = $_SESSION['perusahaan_id'];
	$judul = $_POST['judul'];
	$kategori_id = $_POST['kategori_id'];
	$tgl_buka = $_POST['tgl_buka'];
	$tgl_tutup = $_POST['tgl_tutup'];
	$deskripsi = $_POST['deskripsi'];
	$deskripsi = mysqli_real_escape_string($connection, $deskripsi);
			
	$strQuery = "INSERT INTO lowongan VALUES(null,'$perusahaan_id', '$kategori_id', '$judul', '$deskripsi', '$tgl_buka', '$tgl_tutup')";
	$query = mysqli_query($connection, $strQuery);
	if($query){
		$id = mysqli_insert_id($connection);
		echo "<script language=javascript>document.location.href='../lowongan_tambah_syarat.php?id=$id'</script>";
		mysqli_close($connection);
	}else{
		echo "<script language=javascript>document.location.href='../lowongan_tambah_syarat.php'</script>";
		mysqli_close($connection);
	}
?>