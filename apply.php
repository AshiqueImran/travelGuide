<?php 
    session_start();
    require 'admin/header.php';
    require 'admin/sql.php';

    	if (isset($_POST["date"])&&isset($_POST["trx"])) 
			{
				$query="INSERT INTO `bookingtable`(`bookingplace`, `hotel`, `bookedby`, `mobile`, `time`, `TrxID`, `price`, `status`) VALUES ('".$_SESSION["place"]."','".$_SESSION["hotel"]."','".$_SESSION['mail']."','".$_SESSION['mobile']."','".$_POST["date"]."','".$_POST["trx"]."','".$_SESSION["price"]."','applied')";
					if ($conn->query($query) === TRUE) //insert data sent to DB
					  {
						  echo'<h1 class="text-center center-block greenColor">One data added</h1>';
						} 
						else 
						{
						    //echo "Error: " . $sql . "<br>" . $conn->error;
						    echo '<h1  class="text-center center-block redColor">Sorry!! Something went wrong</h1>';
						}
					echo '<a href="index.php"><button class="btn btn-danger btn-lg"> &#8592 Home</button></a>';
				exit();
			}
    	if(empty($_SESSION['user']) || empty($_SESSION['mail']))
			{
				$conn->close();
				header('location:index.php');
				exit();

			}
			else
			{
				if(empty($_GET["id"]))
					{
					exit();
				 }
				 else
				 {
				$id=strtolower(mysqli_real_escape_string($conn,test_input($_GET["id"])));
				$sql="SELECT * FROM `hotelinfo` WHERE `id`='".$id."'";
				$result=$conn->query($sql);
				$allData=$result->fetch_assoc();
				$_SESSION["price"]=$allData["price"];
				$_SESSION["place"]=$allData["place"];
				$_SESSION["hotel"]=$allData["hotel"];
			}

			}
?>
<body>
	<div class="container">
		  <div class="header text-center center-block">
	    	<h2>Send money to 017XXXXXXXX</h2>
	  	</div>
		<form action="apply.php" method="post">
			<div class="form-group">
				      <label for="date">Visiting Date</label>
				      <input type="date" class="form-control" name="date" required> 
				      <br/>
				      <label for="trx">Bkash TrxID</label>
				      <input type="text" class="form-control" name="trx" required> 
				      <br/>
			</div>
		    <div class="footer text-center center-block">
		    <button type="submit" class="btn btn-danger btn-lg">APPLY</button>
		    </div>
		</form>
	</div>

</body>