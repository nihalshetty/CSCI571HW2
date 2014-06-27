<?php
	$q = $_GET['q'];
	$con = mysqli_connect('localhost','root','lionelm10','restaurant');
	if (!$con) {
	  die('Could not connect: ' . mysqli_error($con));
	}
	$stmt = mysqli_query($con,"SELECT * FROM Food");

	while($row = mysqli_fetch_array($stmt)) {
	  echo $row[0].",".$row[2]."|";
	}


	mysqli_close($con);
?>