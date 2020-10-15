<!DOCTYPE html>
<html>
<head>
<?php 
	$page_title = "Beranda";

	include "engine/conn.php";

	if(isset($id) && $akses == "admin"){
		header('location:nilai.php');
	}elseif(isset($id) && $akses == "peserta"){
		header('location:profil.php');
	}

	include "engine/hit.php";
	include "engine/head.php";	
 ?>
</head>
<body>
<?php 
	include "engine/alert.php";	
	include "engine/modal-profil.php";	
	include "engine/nav.php";	
	include "engine/section-homepage.php";	
	include "engine/footer.php";	
 ?>
</body>
</html>