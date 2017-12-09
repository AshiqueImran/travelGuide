<?php 
	session_start();
	require 'header.php';
	require 'sql.php';

	if($_SESSION['name']!=false && $_SESSION['email']!=false)
		{
			if(empty($_POST["oldPass"]) || empty($_POST["newPass1"])|| empty($_POST["newPass2"]))
			{
				echo'<h1 class="text-center center-block redColor"> Fill the data table</h1>';
			}
			else
			{
				$oldPass=strtolower(mysqli_real_escape_string($conn,test_input($_POST["oldPass"])));
				$pass1=strtolower(mysqli_real_escape_string($conn,test_input($_POST["newPass1"])));
				$pass2=strtolower(mysqli_real_escape_string($conn,test_input($_POST["newPass2"])));

				$checkSql="SELECT `password` FROM `admin` WHERE `email`='".$_SESSION['email']."'";
				$result=$conn->query($checkSql);
				$passDB = $result->fetch_assoc();

				if(password_verify($oldPass,$passDB["password"]))
				{
					if($pass1===$pass2)
					{
						$sql="UPDATE `admin` SET `password`='".password_hash($pass1, PASSWORD_DEFAULT)."' WHERE `email`='".$_SESSION['email']."'";
						if ($conn->query($sql) === TRUE) //insert data sent to DB

					    {
						  echo'<h1 class="text-center center-block greenColor">One data updated</h1>';
						} 
					else 
					{
					    //echo "Error: " . $sql . "<br>" . $conn->error;
					    echo '<h1  class="text-center center-block redColor">Sorry!! Something went wrong</h1>';
					}
				}
					else
					{
						echo '<h1  class="text-center center-block redColor">New password did not match</h1>';
					}
				}
				else
				{
					echo '<h1  class="text-center center-block redColor">Old password did not match</h1>';
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
  <h2>Admin Panel Change Password</h2>
  </div>
  <form action="changePass.php" method="post">
    <div class="form-group">
	  <label for="oldPass">Old Passowrd</label>
      <input type="password" class="form-control" name="oldPass" required>
      <br/>
	        
      <label for="newPass1">New Passowrd</label>
      <input type="password" class="form-control" name="newPass1" required></input>
	  <br>
	  <label for="newPass2">Confirm New Passowrd</label>
      <input type="password" class="form-control" name="newPass2" required></input>
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