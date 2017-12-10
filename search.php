 <?php
 session_start();
 $connect = mysqli_connect("localhost", "root", "", "travelguide");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $input= mysqli_real_escape_string( $connect,$_POST["query"]);
      $query = "SELECT * FROM placetable WHERE plcaeName LIKE '".$input."%'";      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["plcaeName"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>Not Found</li>';  
      }  
      $output .= '</ul>'; 

      if(isset($_SESSION['user']) || isset($_SESSION['mail'])||isset($_POST["place"]))
       {
        echo $output;
       }  
 }  
 ?> 