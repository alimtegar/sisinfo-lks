<?php 
	$host = "localhost";
	$user = "root";
	$passwd = "";
	$db = "db_sisteminfolks";

	$mysqli = mysqli_connect($host,$user,$passwd,$db);

	session_start();

	if(isset($_SESSION['akses']) && isset($_SESSION['id'])){
		$akses = $_SESSION['akses'];
		$id = $_SESSION['id'];
	}
 ?>