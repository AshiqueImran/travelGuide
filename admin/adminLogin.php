<?php
    
    require 'header.php';
?>

<body>

<div class="container">
  <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
  <div class="header text-center center-block">
    <h2>Admin Panel of Intelligent Travel Guide</h2>
  </div>

  <form action="action_admin.php" method="post">
    <a href="../user/login.php"><button type="button" class="btn btn-warning">< Go to user login</button></a>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" required> 
      <br/>
      
      <label for="pass">Passowrd</label>
      <input type="password" class="form-control" name="pass" required></input>
    </div>
    <div class="footer text-center center-block">
    <button type="submit" class="btn btn-danger btn-lg">Submit</button>
    </div>
  </form>
  </div>
  <div class="col-md-2"></div>
  </div>
</div>

</body>
</html>
