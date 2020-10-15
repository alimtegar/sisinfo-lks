<?php 
	include "conn.php";

	if(isset($_POST['submit-sunting-nilai'])){
		$id_peserta = mysqli_real_escape_string($mysqli, $_POST['id']);
		$nilai = mysqli_real_escape_string($mysqli, $_POST['nilai']);

		$query_nilai = mysqli_query($mysqli, "UPDATE nilai SET nilai='$nilai' WHERE id='$id_peserta'");

		if($query_nilai){
			header('location:../nilai.php?i=Sunting+nilai+sukses'); 
		}else{ header('location:../nilai.php?w=Terdapat+kesalah+dalam+perintah%2c+harap+coba+lagi'); }
	}else{ header('location:../nilai.php?w=Sunting+nilai+gagal%2c+harap+coba+lagi'); } 
 ?>