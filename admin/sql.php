<?php

$servername = "localhost";
$username = "root";//user your database username and password
$password = "";
$dbname = "travelguide";

function test_input($data) {

	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
}

		$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
		if (mysqli_connect_errno()) 
		{
		    //die("Connection failed: " . mysqli_connect_errno());
		    die("Connection failed: Database problem");
		}

?>