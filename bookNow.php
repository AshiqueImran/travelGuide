<?php 
    session_start();
    require 'admin/header.php';
    require 'admin/sql.php';

    	if(empty($_SESSION['user']) || empty($_SESSION['mail'])||empty($_GET["place1"]))
			{
				$conn->close();
				header('location:index.php');
				exit();
			}
		else
		{
			$place=strtolower(mysqli_real_escape_string($conn,test_input($_GET["place1"])));
			echo  '<h1 class="text-center">Booking Place: '.$place.'</h1>';
			$sql="SELECT * FROM `hotelinfo` WHERE `place`='".$place."'";
			$result=$conn->query($sql);

		}
$conn->close();
?>
<body>
	<div class="container">
		<div class="table-responsive "> 
	 	 <table class="table table-bordered">
	 	 	    <thead>
			      <tr>
			        <th>Hotel Name</th>
			        <th>Place</th>
			        <th>Address</th>
			        <th>Price(taka)/Room</th>
			        <th>Book Button</th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php
			    while($allData=$result->fetch_assoc())
			    {
				    echo "<tr>";
					echo "<td>".$allData["hotel"]."</td>";
					echo "<td>".$allData["place"]."</td>";
					echo "<td>".$allData["address"]."</td>";
					echo "<td>".$allData["price"]."</td>";
					echo '<td><a href="apply.php?id='.$allData["id"].'"><button>Book This</button></a></td';
					echo "<tr>";
				}
				?>
			    </tbody>

	 	 </table>	 
	</div>

  </div>
</body>
</html>