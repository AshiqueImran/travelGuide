<?php
	session_start();
	require 'header.php';
	require 'sql.php';
	
	if($_SESSION['name']!=false && $_SESSION['email']!=false)
	{
		if(empty($_POST["email"]) || empty($_POST["name"])|| empty($_POST["pass1"])|| empty($_POST["pass2"]))
			{
				echo'<h1 class="text-center center-block redColor"> Fill the data table</h1>';
			}
		else
		{
			$name=ucwords(mysqli_real_escape_string($conn,test_input($_POST["name"])));
			$email=strtolower(mysqli_real_escape_string($conn,test_input($_POST["email"])));
			$pass1=strtolower(mysqli_real_escape_string($conn,test_input($_POST["pass1"])));
			$pass2=strtolower(mysqli_real_escape_string($conn,test_input($_POST["pass2"])));
			
			$checkSql="SELECT `name` FROM `admin` WHERE `email`='".$email."'";
			$result=$conn->query($checkSql);
			$row = $result->fetch_assoc();

			if(empty($row["name"]))
			{
			if($pass1===$pass2)
			{
				$sql="INSERT INTO `admin`(`name`, `password`, `email`, `addedBy`) VALUES ('" .$name."','".password_hash($pass1, PASSWORD_DEFAULT)."','".$email."','".$_SESSION['email']."')";
				if ($conn->query($sql) === TRUE) //insert data sent to DB
				  {
					  echo'<h1 class="text-center center-block greenColor">One data added</h1>';
					} 
					else 
					{
					    //echo "Error: " . $sql . "<br>" . $conn->error;
					    echo '<h1  class="text-center center-block redColor">Sorry!! Something went wrong</h1>';
					}
				  }
				else
				{
					echo'<h1 class="text-center center-block redColor">Password missmatch</h1>';
				}
		  }
		  else
			{
			  echo'<h1  class="text-center center-block redColor">Place Email already exist</h1>';
			}
		}
	}
	else
	{
		header('location:adminLogin.php');
	}

$conn->close();
?>
<body>

<div class="container">
  <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
  <div class="header text-center center-block">
  <h2>Admin Panel Registration</h2>
  </div>
  <form action="newAdmin.php" method="post">
    <div class="form-group">
	  <label for="name">Name</label>
      <input type="text" class="form-control" name="name" required>
      <br/>
	  
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" required> 
      <br/>
      
      <label for="pass1">Passowrd</label>
      <input type="password" class="form-control" name="pass1" required></input>
	  <br>
	  <label for="pass2">Confirm Passowrd</label>
      <input type="password" class="form-control" name="pass2" required></input>
    </div>
    <div class="footer text-center center-block">
    <button type="submit" class="btn btn-danger btn-lg">Submit</button>
    </div>
  </form>
  </div>
  <div class="col-md-2"></div>
  </div>
</div>

</body>
</html>