<?php 
    session_start();
    require 'admin/header.php';
    require 'admin/sql.php';
    require 'tts/weather.php';
    include 'tts/TextToVoice.php';

	if(empty($_SESSION['user']) || empty($_SESSION['mail'])||empty($_POST["place"]))
	{
		$conn->close();
		header('location:index.php');
		exit();
	}   
	else
	{
			$sql="select * from `placetable` where `plcaeName`='".$_POST["place"]."'";
			$result=$conn->query($sql);
			$allData=$result->fetch_assoc();
	} 


    $place=strtolower(mysqli_real_escape_string($conn,test_input($_POST["place"])));
$conn->close();
?>
<body>
	<div class="container">
	<a href="index.php"><button class="btn btn-danger btn-lg"> &#8592 Home</button></a>
	<h2 class="text-center center-block">Visiting places details</h2>
	 <div class="table-responsive "> 
	 	 <table class="table table-bordered">
	 	 	    <thead>
			      <tr>
			        <th>Plcae</th>
			        <th>Details</th>
			        <th>Category</th>
			        <th>Hotel</th>
			        <th>Capacity</th>
			        <th>Count</th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php
				    echo "<td>".$allData["plcaeName"]."</td>";
					echo "<td>".$allData["details"]."</td>";
					echo "<td>".$allData["category"]."</td>";
					echo "<td>".$allData["hotel"]."</td>";
					echo "<td>".$allData["capacity"]."</td>";
					echo "<td>".$allData["count"]."</td>";
				?>
			    </tbody>

	 	 </table>
	</div>
		<?php //echo '<audio src="' . getVoice($allData["details"]) . '" autoplay="true"></audio>';?>
	<h1 class="text-center center-block">Weather Info of <?php echo $place; ?></h1>
	<h3 class="text-center center-block"><?php weatherData($place); ?></h3>
	<a href="book.php"><button class="btn btn-success btn-lg">Book Now</button></a>
	</div>
</body>