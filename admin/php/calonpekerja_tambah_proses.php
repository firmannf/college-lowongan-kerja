<?php
	require "../../php/connection.php";
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$kota_id = $_POST['kota_id'];
	$jk = $_POST['jk'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$status_pernikahan = $_POST['status_pernikahan'];
	$email = $_POST['email'];
	$telepon = $_POST['telepon'];
	$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
	$tempat_pendidikan_terakhir = $_POST['tempat_pendidikan_terakhir'];
	$tempat_bekerja_terakhir = $_POST['tempat_bekerja_terakhir'];
	$pekerjaan_bekerja_terakhir = $_POST['pekerjaan_bekerja_terakhir'];

	$username = $_POST['username'];
	$password = $_POST['password'];

	if($_FILES['file_cv']['size'] == 0) {
		$encPassword = md5($password);
		$strQuery = "INSERT INTO login VALUES(null,'$username', '$encPassword', 'Calon Pekerja')";
		$query = mysqli_query($connection, $strQuery);
		if($query){
			$login_id = mysqli_insert_id($connection);
			$strQuery = "INSERT INTO calon_pekerja(
				calon_pekerja_nama_lengkap,
				calon_pekerja_alamat,
				kota_id,
				calon_pekerja_jenis_kelamin,
				calon_pekerja_tempat_lahir,
				calon_pekerja_tanggal_lahir,
				calon_pekerja_status_pernikahan,
				calon_pekerja_email,
				calon_pekerja_telepon,
				calon_pekerja_pendidikan_terakhir,
				calon_pekerja_tempat_pendidikan_terakhir,
				calon_pekerja_tempat_bekerja_terakhir,
				calon_pekerja_pekerjaan_bekerja_terakhir,
				calon_pekerja_file_cv,
				login_id
			) VALUES( 
				'$nama', 
				'$alamat', 
				'$kota_id', 
				'$jk', 
				'$tempat_lahir', 
				'$tanggal_lahir', 
				'$status_pernikahan',
				'$email',  
				'$telepon',  
				'$pendidikan_terakhir',  
				'$tempat_pendidikan_terakhir',  
				'$tempat_bekerja_terakhir',  
				'$pekerjaan_bekerja_terakhir',  
				'',
				'$login_id' 
			)";
			$query = mysqli_query($connection, $strQuery);
			if($query){				
				echo "<script language=javascript>document.location.href='../calonpekerja.php'</script>";
				mysqli_close($connection);
			}else{
				echo "<script language=javascript>document.location.href='../calonpekerja.php'</script>";
				mysqli_close($connection);
			}
		}else {
			echo "<script language=javascript>document.location.href='../calonpekerja.php'</script>";
			mysqli_close($connection);
		}
	} else {	
		$target_dir = "../../upload/cv/";
		$cv = str_replace(" ","", $nama);
		$temp = explode(".", $_FILES["file_cv"]["name"]);
		$cv = strtolower($cv . date('YmdHis') . "." . end($temp));
		$target_file = $target_dir . basename($cv);
		if (move_uploaded_file($_FILES['file_cv']['tmp_name'], $target_file)) {
			$encPassword = md5($password);
			$strQuery = "INSERT INTO login VALUES(null,'$username', '$encPassword', 'Calon Pekerja')";
			$query = mysqli_query($connection, $strQuery);
			if($query){
				$login_id = mysqli_insert_id($connection);
				$strQuery = "INSERT INTO calon_pekerja(
					calon_pekerja_nama_lengkap,
					calon_pekerja_alamat,
					kota_id,
					calon_pekerja_jenis_kelamin,
					calon_pekerja_tempat_lahir,
					calon_pekerja_tanggal_lahir,
					calon_pekerja_status_pernikahan,
					calon_pekerja_email,
					calon_pekerja_telepon,
					calon_pekerja_pendidikan_terakhir,
					calon_pekerja_tempat_pendidikan_terakhir,
					calon_pekerja_tempat_bekerja_terakhir,
					calon_pekerja_pekerjaan_bekerja_terakhir,
					calon_pekerja_file_cv,
					login_id
				) VALUES( 
					'$nama', 
					'$alamat', 
					'$kota_id', 
					'$jk', 
					'$tempat_lahir', 
					'$tanggal_lahir', 
					'$status_pernikahan',
					'$email',  
					'$telepon',  
					'$pendidikan_terakhir',  
					'$tempat_pendidikan_terakhir',  
					'$tempat_bekerja_terakhir',  
					'$pekerjaan_bekerja_terakhir',  
					'$cv',
					'$login_id' 
				)";
				$query = mysqli_query($connection, $strQuery);
				if($query){				
					echo "<script language=javascript>document.location.href='../calonpekerja.php'</script>";
					mysqli_close($connection);
				}else{
					echo "<script language=javascript>document.location.href='../calonpekerja.php'</script>";
					mysqli_close($connection);
				}
			}else {
				echo "<script language=javascript>document.location.href='../calonpekerja.php'</script>";
				mysqli_close($connection);
			}
		} else {	
			echo "<script language=javascript>document.location.href='../calonpekerja.php'</script>";
			mysqli_close($connection);
		}
	}
?>