<?php
	$host = "feenix-mariadb.swin.edu.au";
	$user = "s104169549"; // your user name
	$pwd = "220504"; // your password (date of birth ddmmyy unless changed)
	$sql_db = "s104169549_db"; // your database

	$conn = @mysqli_connect(
    $host, 
    $user, 
    $pwd, 
    $sql_db
  );
?>