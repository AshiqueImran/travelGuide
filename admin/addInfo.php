<?php 
	session_start();
	require 'header.php';
	require 'sql.php';


	if($_SESSION['name']!=false && $_SESSION['email']!=false)
	{
		if(empty($_POST["name"]) || empty($_POST["details"]) || empty($_POST["category"]))
		{
			echo'<h1 class="text-center center-block redColor"> Fill the data table</h1>';
		}
		else
		{
			$name=strtolower(mysqli_real_escape_string($conn,test_input($_POST["name"])));
			$details=mysqli_real_escape_string($conn,test_input($_POST["details"]));
			$category=mysqli_real_escape_string($conn,test_input($_POST["category"]));
			$checkSql="SELECT `id` FROM `placetable` WHERE `plcaeName`='".$name."'";

			$result=$conn->query($checkSql);
			$row = $result->fetch_assoc();
			if(empty($row["id"]))
			{
				$sql="INSERT INTO `placetable`(`plcaeName`, `details`, `lastEdit`, `category`) VALUES ('" .$name."','".$details."','".$_SESSION['email']."','".$category."')";
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
			  echo'<h1  class="text-center center-block redColor">Place Name already exist</h1>';
			}
		}
			$_POST["name"]="";
			$_POST["details"]="";
			$conn->close();
		}
	else
	{
		header('location:adminLogin.php');
	}
?>
<body>

<div class="container">
  <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
  <div class="header text-center center-block">
  <h2>Add new info</h2>
  </div>
  <form action="addInfo.php" method="post">
    <div class="form-group">
      <label for="name">Name of the place</label>
      <input type="text" class="form-control" name="name" maxlength="90" required> 
      <br/>
      
       <label for="details">Details about the place</label>
      <textarea class="form-control" rows="5" name="details" maxlength="220" required></textarea>

   <label for="category">Category</label><br>
   <select name="category" class="dropdown" required>
    <option disabled selected value> -- select an option -- </option>
    <option value="beach">Beach</option>
    <option value="forest">Forest</option>
    <option value="hill">Hill</option>
    <option value="fountain">Fountain</option>
    <option value="cultural">Cultural places</option>
    <option value="historic ">Historical places</option>
  </select>
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