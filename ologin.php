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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background:url('img/owner1.jpg');background-repeat: no-repeat; background-size: cover">

<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Apartment Management</a>
    </div>
    <ul class="nav navbar-nav pull-right">

      <li><a href="index.php">Developer Login</a></li>
      <li class="active"><a href="ologin.php">Owner Login</a></li>
      <li><a href="tlogin.php">Tenant Login</a></li>
    </ul>
  </div>
</nav>


<div class="container">


    <div style="width: 400px;margin-left: 35%;margin-top: 0%;//box-shadow: 0px 0px 5px #660066;padding:20px">
        <div style='text-align:center;font-size:40px;//padding:20px;//background: linear-gradient(To top right,#033,#3cc);color:#f1c40f;//border-radius: 25% 25% 0% 0%'>Owner Login</div>

        <form class="form-horizontal" action="loginHandler.php" method="post">
  <div class="form-group" style="margin-top: 10px">
    <span style="color:#f1c40f"><label class="control-label col-sm-2" for="email">Email:</label></span>
    <div class="col-sm-11" >
      <input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
  <span style="color:#f1c40f"><label class="control-label col-sm-2" for="pwd">Password:</label></span>
    <div class="col-sm-11">
      <input type="password" class="form-control" name="pwd" placeholder="Enter password">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
    <center><button class="btn btn-warning" name="ownerBtn" type="submit" class="btn btn-default">Submit</button></center>
    </div>
  </div>
</form>
</div>
</div>
</body>
</html>
