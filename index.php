<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

  <head>
  <title>Apartment Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('img/4.jpg');background-attachment: fixed; background-repeat: no-repeat; background-size: cover">

<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Apartment Management</a>
    </div>
    <ul class="nav navbar-nav pull-right">

      <li class="action"><a href="index.php">Developer Login</a></li>
      <li><a href="ologin.php">Owner Login</a></li>
      <li><a href="tlogin.php">Tenant Login</a></li>

    </ul>
  </div>
</nav>


<div class="container">


    <div style="width: 400px;margin-left: 35%">
    <center><span style="color:#f1c40f"padding:15px;background-image:linear-gradient( white , #2c3e50);font-family: serif;><b><H1>Admin Login</b></h1></center></span>
 <form class="form-horizontal" action="loginHandler.php" method="post">
  <div class="form-group">
    <span style="color:#f1c40f"><label class="control-label col-sm-2" for="email"><b>Email:</b></label></span>
    <div class="col-sm-11">
      <input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
  <span style="color:#f1c40f"><label class="control-label col-sm-2" for="pwd"><b>Password:</b></label></span>
    <div class="col-sm-11">
      <input type="password" class="form-control" name="pwd" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
      <center><button class="btn btn-warning" name="adminBtn" type="submit" class="btn btn-default">Submit</button></center>


    </div>
  </div>
</form>
</div>


</div>

</body>


</html>
