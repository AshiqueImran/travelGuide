<?php 
    session_start();
    require 'admin/header.php';
    require 'admin/sql.php';
    require 'tts/weather.php';

	if(empty($_SESSION['user']) || empty($_SESSION['mail'])||empty($_POST["place"]))
	{
		$conn->close();
		header('location:index.php');
		exit();
	}    

    $place=strtolower(mysqli_real_escape_string($conn,test_input($_POST["place"])));
$conn->close();
?>
<h1><?php echo $place; ?></h1>
<h2><?php weatherData($place); ?></h2>