<?php 
	session_start();
	require 'header.php';
	require 'sql.php';
	if(empty($_SESSION["id"]))
	{
		$_SESSION["id"]=0;
	}

	if($_SESSION['name']!=false && $_SESSION['email']!=false)
	{
		if(empty($_POST["name"]) || empty($_POST["details"]) || empty($_POST["category"]))
		{
			echo'<h1 class="text-center center-block redColor"> Fill the data table To Edit</h1>';
		}
		else
		{
			$name=strtolower(mysqli_real_escape_string($conn,test_input($_POST["name"])));
			$details=mysqli_real_escape_string($conn,test_input($_POST["details"]));
			$category=mysqli_real_escape_string($conn,test_input($_POST["category"]));
			$capacity=mysqli_real_escape_string($conn,test_input($_POST["capacity"]));
			$hotel=mysqli_real_escape_string($conn,test_input($_POST["hotel"]));

			$query="update `placetable` set plcaeName='".$name."',"."details='".$details."',"."category='".$category."',"."hotel='".$hotel."',"."capacity='".$capacity."',lastEdit='".$_SESSION['email']."' where id=".$_SESSION["id"];
			
			if ($conn->query($query) === TRUE)
			{
				$link='editInfo.php?id='.$_SESSION["id"];
				$_SESSION["id"]=0;
				header('location:'.$link);
			}
			else
			{
				echo '<h1  class="text-center center-block redColor">Sorry!! Something went wrong</h1>';
			}
		}

		if(!empty($_GET["id"]))
		{
			$sql="select * from `placetable` where `id`=".$_GET["id"];
			$_SESSION["id"]=$_GET["id"];
			$result=$conn->query($sql);
			$allData=$result->fetch_assoc();
		}
		else
		{
			echo '<h1 class="text-center center-block redColor">No data to show</h1>';
		}
	}
	else
	{
		$conn->close();
		header('location:adminLogin.php');
		exit();
	}
	$conn->close();
?>
<body>

<div class="container">
  <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
  <div class="header text-center center-block">
  <h2>Edit info</h2>
  </div>
  <form action="editInfo.php" method="post">
    <div class="form-group">
      <label for="name">Name of the place</label>
      <input type="text" class="form-control" name="name" maxlength="90"
      placeholder="<?php echo $allData["plcaeName"] ?>" required> 
      <br/>
      
       <label for="details">Details about the place</label>
      <textarea class="form-control" rows="5" name="details" maxlength="220" placeholder="<?php echo $allData["details"] ?>" required></textarea>
      <br/>

        <label for="hotel">Hotel</label>
      <textarea class="form-control" rows="3" name="hotel" maxlength="200" placeholder="<?php echo $allData["hotel"] ?>" required></textarea>
      <br/>

       <label for="capacity">Capacity</label>
      <input type="number" class="form-control" name="capacity" placeholder="<?php echo $allData["capacity"] ?>" required> 
      <br/>

   <label for="category">Category(Previous: <?php echo $allData["category"] ?>)</label><br>
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