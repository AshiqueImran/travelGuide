<?php 
    session_start();
    require 'admin/header.php';
    require 'admin/sql.php';
    require 'tts/weather.php';
    include 'tts/TextToVoice.php';

	if(empty($_SESSION['user']) || empty($_SESSION['mail'])||empty($_GET["place"]))
	{
		$conn->close();
		header('location:index.php');
		exit();
	}   
	else
	{
			$sql="select * from `placetable` where `plcaeName`='".$_GET["place"]."'";
			$result=$conn->query($sql);
			$allData=$result->fetch_assoc();
	} 


    $place=strtolower(mysqli_real_escape_string($conn,test_input($_GET["place"])));
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
		<?php echo '<audio src="' . getVoice($allData["details"]) . '" autoplay="true"></audio>';?>
	<h1 class="text-center center-block">Weather Info of <?php echo $place; ?></h1>
	<h3 class="text-center center-block"><?php //weatherData($place); ?></h3>
	<div class="text-center center-block">
	<?php 
	if ($place=='bandarban') 
	{
		echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d948451.1146573967!2d91.80945713360256!3d21.784627533788427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad8232812958fd%3A0x626d2d94bda10341!2sBandarban+District!5e0!3m2!1sen!2sbd!4v1513156151448" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
	
	 }
	 else if ($place=='coxs_bazar') 
	 {
	 	echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118830.37497990689!2d91.93286114679411!3d21.450883578510823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adc7ea2ab928c3%3A0x3b539e0a68970810!2sCox&#39;s+Bazar!5e0!3m2!1sen!2sbd!4v1513156640876" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
	 }
	 else if ($place=='rangamati') 
	 {
	 	echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1882994.342407633!2d91.15816526525482!3d22.812713643717075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3752ba825b22f935%3A0x16694440255859d5!2sRangamati+Hill+District!5e0!3m2!1sen!2sbd!4v1513156789818" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
	 }
	 else if($place=='sundarban')
	 {
	 	echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d946898.4175168929!2d88.72647747341428!3d22.018132421110156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a004caac2c7b315%3A0x4716abcfbb16c93c!2sSundarbans!5e0!3m2!1sen!2sbd!4v1513156986695" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
	 }
	 else if($place=='sylhet')
	 {
	 	echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57903.166045745944!2d91.82688409696448!3d24.89975946289852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375054d3d270329f%3A0xf58ef93431f67382!2sSylhet!5e0!3m2!1sen!2sbd!4v1513157256936" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
	 }
	 else if($place=='kuakata')
	 {
	 	echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29632.79578027241!2d90.10029290231522!3d21.815087226957246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30aa7d1b38a082bd%3A0xce33209b2416f816!2sKuakata!5e0!3m2!1sen!2sbd!4v1513157365271" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
	 }
	 else if($place=='rajshahi')
	 {
	 	echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58144.57124323851!2d88.57095049387128!3d24.380061376224162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fbefa96a38d031%3A0x10f93a950ed6f410!2sRajshahi!5e0!3m2!1sen!2sbd!4v1513157436524" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
	 }
	 else if($place=='kushtia')
	 {
	 	echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d466727.3004671549!2d88.75214565884201!3d23.949580621792375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39febca82f6a21ed%3A0x4040980d7c6874f8!2sKushtia+District!5e0!3m2!1sen!2sbd!4v1513157502148" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
	 }
	 else
	 {
	 	echo '<h1>Sorry! map not found</h1>';
	 }
	 ?>
	</div><br>
	<?php echo '<a href="bookNow.php?place1='.$place.'"'. 'class="btn btn-success btn-lg text-center">Book Now</a>'; ?>
	</div>
</body>
</html>