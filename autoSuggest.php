<?php 
    session_start();
    require 'admin/header.php';
    require 'admin/sql.php';

	if(empty($_SESSION['user']) || empty($_SESSION['mail']))
		{
			header('location:login.php');
		}
		else
		{
			$checkSql="SELECT `bookingplace` FROM `bookingtable` WHERE `bookedby` ='".$_SESSION['mail']."'";
			$result=$conn->query($checkSql);

			$column = array();

			while($row = $result->fetch_assoc())
			{
			    array_push($column, $row["bookingplace"]);
			}

		}

			$sql="select `plcaeName` from `placetable`";
			$result2=$conn->query($sql);

$conn->close();
 ?>
 <body>
	<div class="container">

<a href="index.php" class="btn btn-danger btn-lg"> &#8592 Home</a><br>
<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-4">
<h2 >Places you did not visit</h2>
<ol>
	<?php 
			while($allData=$result2->fetch_assoc())
				{
					if (!in_array($allData["plcaeName"], $column)) 
						{
						    echo '<li><a href=details.php?place='.$allData["plcaeName"].'>'.$allData["plcaeName"].'</a></li>';
						}
				}
	?>
	</ol>
	</div>
<div class="col-md-4">
</div>
	</div>
	</div>
	</body>