<?php 
	$query_hit = mysqli_query($mysqli, "SELECT * FROM hit");
	$total = 0;

	while($result_hit = mysqli_fetch_array($query_hit)){
		$total = $result_hit['total'] + 1;
	}

	mysqli_query($mysqli, "UPDATE hit SET total='$total'");
 ?>