<?php
	require "../../php/connection.php";
	$id = $_POST['id'];
			
	$strQuery = "DELETE FROM lamaran WHERE lamaran_id = $id";
	$query = mysqli_query($connection, $strQuery);
	if($query){
		echo "<script language=javascript>document.location.href='../lamaran.php'</script>";
		mysqli_close($connection);
	}else{
		echo "<script language=javascript>document.location.href='../lamaran.php'</script>";
		mysqli_close($connection);
	}
?>