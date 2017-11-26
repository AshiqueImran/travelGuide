	  $input= mysqli_real_escape_string( $connect,$_POST["query"]);
    $query = "SELECT * FROM placetable WHERE plcaeName LIKE '".$input."%'";
