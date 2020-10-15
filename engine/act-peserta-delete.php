<?php 
	include "conn.php";

	if(isset($_GET['id-peserta'])){
		$id_peserta = $_GET['id-peserta'];

		$query_peserta = mysqli_query($mysqli, "DELETE FROM peserta WHERE id='$id_peserta'");
		$query_nilai = mysqli_query($mysqli, "DELETE FROM nilai WHERE id='$id_peserta'");

		if($query_peserta && $query_nilai){
			header('location:../nilai.php?i=Hapus+peserta+sukses'); 
		}else{ header('location:../nilai.php?w=Terdapat+kesalah+dalam+perintah%2c+harap+coba+lagi'); }
	}else{ header('location:../nilai.php?w=Hapus+peserta+gagal%2c+harap+coba+lagi'); } 
 ?>