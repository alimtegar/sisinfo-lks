<?php 
	include "conn.php";

	if(isset($_POST['submit-daftar'])){
		if(isset($_POST['bidang'])
		&& isset($_POST['id'])
		&& isset($_POST['nama'])
		&& isset($_POST['passwd'])
		&& isset($_POST['passwd-conf'])){
			$bidang = mysqli_real_escape_string($mysqli, $_POST['bidang']);
			$id = mysqli_real_escape_string($mysqli, $_POST['id']);
			$nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
			$passwd = mysqli_real_escape_string($mysqli, $_POST['passwd']);
			$passwd_conf = mysqli_real_escape_string($mysqli, $_POST['passwd-conf']);
			$umur = mysqli_real_escape_string($mysqli, $_POST['umur']);
			$asalsmk = mysqli_real_escape_string($mysqli, $_POST['asalsmk']);
			$kelas = mysqli_real_escape_string($mysqli, $_POST['kelas']);
			
			if($passwd !== $passwd_conf){
				header('location:../index.php?w=Kata+sandi+salah+%2c+harap+coba+lagi');

				return false;
			}

			$query_peserta = mysqli_query($mysqli, "INSERT INTO peserta (id,nama,passwd,bidang,umur,asalsmk,kelas) VALUES ('$id','$nama','$passwd','$bidang','$umur','$asalsmk','$kelas')");
			$query_nilai = mysqli_query($mysqli, "INSERT INTO nilai (id,nilai) VALUES ('$id',NULL)");

			if($query_peserta && $query_nilai){
				$_SESSION['akses'] = "peserta";
				$_SESSION['id'] = $id;

				header('location:../nilai.php');
			}else{ header('location:../index.php?w=Terdapat+kesalah+dalam+perintah%2c+harap+coba+lagi'); }
		}else{ header('location:../index.php?w=Kolom+ada+yang+kosong%2c+harap+coba+lagi'); }
	}else{ header('location:../index.php?w=Daftar+gagal%2c+harap+coba+lagi'); }
 ?>