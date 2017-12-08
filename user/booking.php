<?php 
	session_start();
    require '../admin/header.php';
    require '../admin/sql.php';

    if(empty($_GET["start"]) || empty($_GET["end"]) || empty($_GET["button"]))
	{
		$_GET["start"]=0;
		$_GET["end"]=5;
		$_GET["button"]="next";
	}

	if(empty($_SESSION['user']) || empty($_SESSION['mail']))
		{
			header('location:login.php');
		}
	else
		{
			$start=$_GET["start"];
			$end=$_GET["end"];
			$checkSql="SELECT `bookingplace`, `time`, `status` FROM `bookingtable` WHERE `bookedby` ='".$_SESSION['mail']."' order by `time` DESC limit $start,$end";
			$result=$conn->query($checkSql);
			//print_r($result);
			if($_GET["button"]=="next"&&$_GET["end"]<=$result->num_rows)
				{
					$_GET["start"]=$_GET["end"];
					$_GET["end"]=$_GET["end"]+5;
				}
		}
?>
<h2 class="text-center center-block">Visiting places</h2>
<div class="table-responsive"> 
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Plcae</th>
        <th>Date</th>
        <th>Current Status</th>
      </tr>
    </thead>

    <tbody>
    <?php
    if($result->num_rows > 0)
    {
      while($allData=$result->fetch_assoc())
		  {
			echo "<tr>";
				echo "<td>".$allData["bookingplace"]."</td>";
				echo "<td>".$allData["time"]."</td>";
				echo "<td>".$allData["status"]."</td>";
			echo "</tr>";
		  }
	}
	else
	{
		echo "<h3>No results</h3>";
	}
	$conn->close();
    ?>
    </tbody>
 </table>
 </div>
<?php
echo '<a href="booking.php?start='.$_GET["start"].'&end='.$_GET["end"].'&button=next"><button type="button" class="text-center center-block btn btn-primary adminButton">Next &#8594</button></a>';
?>
</body>
</html>