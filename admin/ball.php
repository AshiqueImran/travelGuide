<?php 

$servername = "localhost";
$username = "tiger";
$password = "353535";
$dbname = "travelguide";


		$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
		if (mysqli_connect_errno()) {
		    die("Connection failed: " . mysqli_connect_errno());
		    //die("Connection failed: Database problem");
		}
				    $sql="SELECT * FROM `placetable` limit 5,10";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
print_r($result);
	//var_dump(password_verify("7794",$row["password"]));
		$conn->close();
?>