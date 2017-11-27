<?php 

session_start();
if(empty($_SESSION['name']) && empty($_SESSION['email']))
{
	$_SESSION['name']=false;
	$_SESSION['email']=false;
}

if(empty($_POST["email"]) || empty($_POST["pass"]))
	{
		if($_SESSION['name']===false || $_SESSION['email']===false)
		{
		 echo "<h1>Sorry!! Textbox was empty.</h1>";
		}
	}
else
	{

		require 'sql.php'; //connect to database by "sql.php"

		// to secure from any sql injunction
		 $mail = mysqli_real_escape_string($conn,test_input($_POST["email"]));
		 $password= mysqli_real_escape_string($conn,test_input($_POST["pass"]));

		 $sql ="SELECT `name`, `password`, `email` FROM `admin` WHERE `email` ='".$mail."'";
		 $result = $conn->query($sql);
		 $row = $result->fetch_assoc();
		 //var_dump($row["password"]);
		 if($row["email"]==$mail && password_verify($password,$row["password"]))
		  {
			//echo "<h1>bingo</h1>";
				$_SESSION['name']=$row["name"];
				$_SESSION['email']=$row["email"];
				
		  }
		 else
		 {
			header('location:adminLogin.php');
		 }
		$conn->close();
	}
	if($_SESSION['name']!=false && $_SESSION['email']!=false)
	{
	   	require 'header.php';
	   	echo '<body><div class="container"><div class="row"><div class="col-md-2"></div><div class="col-md-8 text-center">';
	   	echo "<h1>Admin Profile Info: </h1>";
	   	echo "<h2>".$_SESSION['name']."</h2>";
	   	echo "<h3>".$_SESSION['email']."</h3><hr>";
	   	echo "<h1>Choose any option: </h1>";
	   	echo '<a href="newAdmin.php"><button type="button" class="btn btn-success btn-lg adminButton">Add new admin</button></a><br>';
	   	echo '<a href="changePass.php"><button type="button" class="btn btn-primary btn-lg adminButton">Change password</button></a><br>';
	   	echo '<a href="#"><button type="button" class="btn btn-warning btn-lg adminButton">Show bookings</button></a><br>';
	   	echo '<a href="addInfo.php"><button type="button" class="btn btn-info btn-lg adminButton">Add new info</button></a><br>';
	   	echo '<a href="deleteInfo.php"><button type="button" class="btn btn-danger btn-lg adminButton">Delete info</button></a><br>';
	   	echo '<a href="logout.php"><button type="button" class="btn btn-basic btn-lg adminButton">Logout</button></a><br>';
	   	echo '</div><div class="col-md-2"></div></div></div></body></html>';
   	}
?>