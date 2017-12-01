<?php
    session_start();
    require 'admin/header.php';
    require 'admin/sql.php';


    if(empty($_SESSION['user']) || empty($_SESSION['mail']))
    {
    	echo '<body class="backPic"><div class="container"><div class="row space"><div class="col-md-2"></div><div class="col-md-8 text-center">';
    	echo'<h1 class="text-center center-block intelligent">Intelligent Travel Guide</h1>';
      echo'<h2 class="travelGuideHeader" style="color: white">Your <span class="travelGuide">travel guide,</span> at your service.</h2>';
    	echo '<a href="user/login.php"><button type="button" class="btn btn-success btn-lg adminButton">Go to Login</button></a><br>';
	   	echo '<a href="user/reg.php"><button type="button" class="btn btn-warning btn-lg adminButton2">Go to Registration</button></a><br>';
	   	echo '</div><div class="col-md-2"></div></div></div></body></html>';
	   	exit(); //does not look the codes under this line.
    }
    else
    {
          include 'tts/TextToVoice.php';
          $text="Hello ".$_SESSION['user'].".you can choose destination from search box or press auto suggest to get suggested based on your favourite category.";

         echo '<audio src="' . getVoice($text) . '" autoplay="true"></audio>';
    }

?>
<body class="backPic">
<div class="container">
  <div class="row">
  <div class="col-md-2"></div>
    <div class="col-md-8">
		<div class="btn-group text-center center-block adminButton">
		<a href="#"><button type="button" class="btn btn-success">My bookings</button></a>
    <a href="#"><button type="button" class="btn btn-warning">Change Password</button></a>
    <a href="user/logout.php"><button type="button" class="btn btn-primary">Logout</button></a>
		</div>
      <form style="border : none;" action="details.php" method="post">
	    <h3 class="text-center center-block intelligent space">Welcome!!</h3><br />  
	    <label class="redColor text-center center-block">Enter Place Name</label>  
	    <input type="text" name="place" id="country" class="form-control" placeholder="Enter Place Name" />  
	    <div id="countryList"></div><br>

      <div class="text-center center-block">
      <button type="submit" class="btn btn-danger btn-lg">Search</button>
      </div>

      </form>
	</div>
  <div class="col-md-2"></div>
  </div>
</div>
</body>
</html>
 <script>  
 $(document).ready(function(){  
      $('#country').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#countryList').fadeIn();  
                          $('#countryList').html(data);  
                     }  
                });  
           }
           else
           {
            $('#countryList').fadeOut(); 
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#country').val($(this).text());  
           $('#countryList').fadeOut();  
      });  
 });  
 </script>  