<?php

	session_start();
	require 'header.php';
	require 'sql.php';
	if(empty($_GET["start"]) || empty($_GET["end"]) || empty($_GET["button"]))
	{
		$_GET["start"]=0;
		$_GET["end"]=5;
		$_GET["button"]="next";
	}
	if($_SESSION['name']!=false && $_SESSION['email']!=false)
		{
			$end=$_GET["end"];
			$start=$_GET["start"];
			$sql="select * from `bookingtable` ORDER BY `time` DESC limit $start,$end";
			$result=$conn->query($sql);
			//var_dump($result);
		}
	else
		{
			header('location:adminLogin.php');
		}
if(!empty($_GET["id"]))
{
	$query="DELETE FROM `bookingtable` WHERE `id`=".$_GET["id"];
	if ($conn->query($query) === TRUE) //insert data sent to DB

	    {
		  echo'<h1 class="text-center center-block greenColor">One data deleted</h1>';
		  $link='confirmBooking.php?start='.$_GET["start"].'&end='.$_GET["end"].'&button=next"';
		  header('location:'.$link);
		} 
	else 
	{
	    echo '<h1  class="text-center center-block redColor">Sorry!! Something went wrong</h1>';
	}
}
if(!empty($_GET["confirmID"]))
{
	$query="UPDATE `bookingtable` SET status='confirmed' WHERE `id`=".$_GET["confirmID"];
	if ($conn->query($query) === TRUE) //insert data sent to DB

	    {
		  echo'<h1 class="text-center center-block greenColor">One data deleted</h1>';
		  $link='confirmBooking.php?start='.$_GET["start"].'&end='.$_GET["end"].'&button=next"';
		  header('location:'.$link);
		} 
	else 
	{
	    echo '<h1  class="text-center center-block redColor">Sorry!! Something went wrong</h1>';
	}
}
if($_GET["button"]=="next"&&$_GET["end"]<=$result->num_rows && empty($_GET["id"]))
{
	$_GET["start"]=$_GET["end"];
	$_GET["end"]=$_GET["end"]+5;
}
$conn->close();
?>

<h2 class="text-center center-block">Bookings</h2>
<div class="table-responsive"> 
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Place</th>
        <th>Booked By</th>
        <th>Mobile</th>
        <th>Date</th>
        <th>TrxID</th>
        <th>Bill</th>
        <th>Delete Button</th>
        <th>Confirm Button</th>
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
				echo "<td>".$allData["bookedby"]."</td>";
				echo "<td>".$allData["mobile"]."</td>";
				echo "<td>".$allData["time"]."</td>";
				echo "<td>".$allData["TrxID"]."</td>";
				echo "<td>".$allData["price"]."</td>";
				echo '<td><button><a href="confirmBooking.php?start='.$_GET["start"].'&end='.$_GET["end"].'&id='.$allData["id"].'">Delete</a></button></td>';
				if($allData["status"]!='confirmed')
				{
					echo '<td><button><a href="confirmBooking.php?start='.$_GET["start"].'&end='.$_GET["end"].'&confirmID='.$allData["id"].'">Confirm It</a></button></td>';
				}
				else
				{
					echo "<td>".$allData["status"]."</td>";
				}
			echo "</tr>";
		  }
	}
	else
	{
		echo "<h3>No results</h3>";
	}
    ?>
    </tbody>
 </table>
 </div>
<?php
echo '<a href="confirmBooking.php?start='.$_GET["start"].'&end='.$_GET["end"].'&button=next"><button type="button" class="text-center center-block btn btn-primary adminButton">Next &#8594</button></a>';
?>
</body>
</html>