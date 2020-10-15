<?php 
	include "conn.php";

	if(isset($_POST['submit-sunting-peserta'])){
		$id_peserta = mysqli_real_escape_string($mysqli, $_POST['id']);
		$nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
		$passwd = mysqli_real_escape_string($mysqli, $_POST['passwd']);
		$bidang = mysqli_real_escape_string($mysqli, $_POST['bidang']);
		$kelas = mysqli_real_escape_string($mysqli, $_POST['kelas']);
		$asalsmk = mysqli_real_escape_string($mysqli, $_POST['asalsmk']);
		$umur = mysqli_real_escape_string($mysqli, $_POST['umur']);

		$query_peserta = mysqli_query($mysqli, "UPDATE peserta SET nama='$nama',passwd='$passwd',bidang='$bidang',kelas='$kelas',asalsmk='$asalsmk',umur='$umur' WHERE id='$id_peserta'");

		if($query_peserta){
			header('location:../nilai.php?i=Sunting+peserta+sukses'); 
		}else{ header('location:../nilai.php?w=Terdapat+kesalah+dalam+perintah%2c+harap+coba+lagi'); }
	}else{ header('location:../nilai.php?w=Sunting+peserta+gagal%2c+harap+coba+lagi'); } 
 ?>