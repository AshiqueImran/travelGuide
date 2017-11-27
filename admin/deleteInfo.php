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
			$sql="select * from `placetable` ORDER BY `plcaeName` ASC limit $start,$end";
			$result=$conn->query($sql);
		}
	else
		{
			header('location:adminLogin.php');
		}
if(!empty($_GET["id"]))
{
	$query="DELETE FROM `placetable` WHERE `id`=".$_GET["id"];
	if ($conn->query($query) === TRUE) //insert data sent to DB

	    {
		  echo'<h1 class="text-center center-block greenColor">One data deleted</h1>';
		  $link='deleteInfo.php?start='.$_GET["start"].'&end='.$_GET["end"].'&button=next"';
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
if($_GET["button"]=="pre"&&$_GET["start"]>=$result->num_rows && empty($_GET["id"]))
{
	$_GET["end"]=$_GET["start"];
	$_GET["start"]=$_GET["start"]-5;
}

?>

<h2 class="text-center center-block">Visiting places</h2>
<div class="table-responsive"> 
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Plcae</th>
        <th>Details</th>
        <th>Category</th>
        <th>Delete Button</th>
      </tr>
    </thead>

    <tbody>
    <?php
    if($result->num_rows > 0)
    {
      while($allData=$result->fetch_assoc())
		  {
			echo "<tr>";
				echo "<td>".$allData["plcaeName"]."</td>";
				echo "<td>".$allData["details"]."</td>";
				echo "<td>".$allData["category"]."</td>";
				echo '<td><button><a href="deleteInfo.php?start='.$_GET["start"].'&end='.$_GET["end"].'&id='.$allData["id"].'">Delete</a></button></td>';
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
echo '<a href="deleteInfo.php?start='.$_GET["start"].'&end='.$_GET["end"].'&button=next"><button type="button" class="text-center center-block btn btn-primary adminButton">Next &#8594</button></a>';
echo '<a href="deleteInfo.php?start='.$_GET["start"].'&end='.$_GET["end"].'&button=pre"><button type="button" class="text-center center-block btn btn-warning adminButton">&#8592 Previous</button></a>';
?>
</body>
</html>