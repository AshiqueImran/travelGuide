<?php
    session_start();
    ob_start();
    require '../admin/header.php';
    require '../admin/sql.php';

    if(empty($_SESSION['user']) && empty($_SESSION['mail']))
    {
      $_SESSION['user']=false;
      $_SESSION['mail']=false;
    }
    else
    {
      header('location: ../index.php');
      exit();
    }

    if(empty($_POST["email"]) || empty($_POST["pass"]))
    {
      if($_SESSION['user']===false || $_SESSION['mail']===false)
      {
       echo '<h1 class="text-center center-block redColor">Fill the text box.</h1>';
      }
    }
  else
  {

    $mail = mysqli_real_escape_string($conn,test_input($_POST["email"]));
    $password= mysqli_real_escape_string($conn,test_input($_POST["pass"]));

     $sql ="SELECT `name`, `password`, `email`, `mobile` FROM `usertable` WHERE `email` ='".$mail."'";
     $result = $conn->query($sql);
     $row = $result->fetch_assoc();

      if($row["email"]==$mail && password_verify($password,$row["password"]))
      {
        $_SESSION['user']=$row["name"];
        $_SESSION['mail']=$row["email"];
        $_SESSION['mobile']=$row["mobile"];
        header('location: ../index.php');
        exit();
      }
      else
      {
        echo'<h1 class="text-center center-block redColor"> Email or Password did not match</h1>';
        
     }
  }
  $conn->close();
?>

<body>

<div class="container">
  <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
  <div class="header text-center center-block">
    <h2>Login to Intelligent Travel Guide</h2>
  </div>

  <form action="login.php" method="post">
    <a href="reg.php"><button type="button" class="btn btn-warning">< Go to Registration</button></a>
    <a href="../admin/adminLogin.php"><button type="button" class="btn btn-info pull-right">Go to Admin ></button></a>
    <p class="text-center">*Give your Email and Password or Press <b>Go to Registration<b>*</p>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" required> 
      <br/>
      
      <label for="pass">Passowrd</label>
      <input type="password" class="form-control" name="pass" required></input>
    </div>
    <div class="footer text-center center-block">
    <button type="submit" class="btn btn-danger btn-lg">LOGIN</button>
    </div>
  </form>
  </div>
  <div class="col-md-2"></div>
  </div>
</div>

</body>
</html>
