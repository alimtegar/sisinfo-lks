<?php 
	include "conn.php";

	if(isset($_POST['submit-masuk'])){
		if(isset($_POST['id'])
		&& isset($_POST['passwd'])){
			$id = mysqli_real_escape_string($mysqli, $_POST['id']);
			$passwd = mysqli_real_escape_string($mysqli, $_POST['passwd']);

			$query = mysqli_query($mysqli, "SELECT * FROM admin WHERE id='$id' AND passwd='$passwd'");

			if($result = mysqli_fetch_array($query)){
				$_SESSION['akses'] = "admin";
				$_SESSION['id'] = $id;

				echo $id;

				header('location:../nilai.php');
			}else{
				$query = mysqli_query($mysqli, "SELECT * FROM peserta WHERE id='$id' AND passwd='$passwd'");

				if($result = mysqli_fetch_array($query)){
					$_SESSION['akses'] = "peserta";
					$_SESSION['id'] = $id;

					header('location:../nilai.php');
				}else{ header('location:../index.php?w=Pengguna+tidak+ada%2c+harap+coba+lagi'); }
			}
		}else{ header('location:../index.php?w=Kolom+ada+yang+kosong%2c+harap+coba+lagi'); }
	}else{ header('location:../index.php?w=Masuk+gagal%2c+harap+coba+lagi'); }
 ?>