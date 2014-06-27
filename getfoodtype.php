<?php
	$q = $_GET['q'];
	$con = mysqli_connect('localhost','root','lionelm10','restaurant');
	if (!$con) {
	  die('Could not connect: ' . mysqli_error($con));
	}
	$stmt = mysqli_query($con,"SELECT * FROM Food_type");

	while($row = mysqli_fetch_array($stmt)) {
	  echo $row[0].",".$row[1]."|";
	}


	mysqli_close($con);
?>