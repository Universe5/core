<?php
$serverlloc = ""; 
// (C) Copyright Tristan Farkas 2018

    require("authenticate/common.php"); 
     
    if(empty($_SESSION['user'])) 
    {  
        header("Location: " . $serverlloc . "/authenticate/login.php"); 
         
        die("Redirecting to " . $serverlloc . "/authenticate/login.php"); 
    } 
    

$servername = "";
$username = "";
$password = "";
$dbname = "";
?>
<!DOCTYPE html>
<html lang="en">
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
      <a class="navbar-brand" href="#"><img style='width:25%;' src="https://<?php echo "$serverlloc"; ?>Universe-5%20Logo.svg"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="https://<?php echo "$serverlloc"; ?>imagemeup/form_upload.php">Post</a></li>
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
  
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3 well">
      <div class="well">
        <p><a href="#">My Profile</a></p>
        <img src="https://<?php echo "$serverlloc"; ?>/profileimg/<?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>/index.png" class="img-circle" height="65" width="65" alt="Avatar">
      </div>
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong></strong></p>
        You don't have a profile page, you'll need to wait about 7 days inorder to get one.
      </div>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>
    <div class="col-sm-7">
    
      
      <div class="row">
<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("The connection failed. Sorry about that");
} 

$sql = "SELECT id, username, image, caption, imgorvideo FROM posts order by id desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='col-sm-9'><div class='well'><div class='post_" . $row["id"]. "'>User: " . $row["username"]. "<br> <" . $row[imgorvideo] ." style='width:100%;' src='https://<?php echo "$serverlloc"; ?>image-deliver/" . $row["image"]. " '> <br>" . $row["caption"]. "</div></div></div><br>";
    }
} else {
    echo "Hmm, seems there are no posts here yet, try posting something! :)";
}
$conn->close();
?>
          </div>
        </div>
      </div>
    </div>

<footer class="container-fluid text-center">
  <p>&copy; Copyright 2018 Tristan Farkas</p>
</footer>

</body>
</html>