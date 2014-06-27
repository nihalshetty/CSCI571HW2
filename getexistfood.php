<?php
	
	$q = $_GET['q'];
	$con = mysqli_connect('localhost','root','lionelm10','restaurant');
	if (!$con) {
	  die('Could not connect: ' . mysqli_error($con));
	}
	$stmt = mysqli_query($con,"SELECT * FROM Food INNER JOIN Sales ON Food.Food_id=Sales.Food_id ORDER BY Food.Food_name");

	while($row = mysqli_fetch_array($stmt)) {
	  echo $row[0].",".$row[2]."|";
	}
	
	mysqli_close($con);
?>

