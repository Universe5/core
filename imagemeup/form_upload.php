<?php
$serverlloc = ""; 


    require("authenticate/common.php"); 
     
    if(empty($_SESSION['user'])) 
    {  
        header("Location: " . $serverlloc . "/authenticate/login.php"); 
         
        die("Redirecting to " . $serverlloc . "/authenticate/login.php"); 
    } 
     
 
?>
<?php
// (C) Copyright Tristan Farkas 2018
?>
<!DOCTYPE html>

<html>
<head>
  <title>Uni-5 | Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img style='width:25%;' src="//<?php echo "$serverlloc"; ?>Universe-5%20Logo.svg"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="https://<?php echo "$serverlloc"; ?>dashboard.php">Home</a></li>
        <li class="active"><a href="#">Post</a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
      </ul>
    </div>
  </div>
</nav>
<form action="upload.php" method="post" enctype="multipart/form-data"> 
 <input type="file" name="myFile">
 <br>
 Caption: <input type="text" name="caption"><br>
 <input type="submit" value="Upload">
</form>


</body>
</html>
<html>
<style>
</style>
</html>