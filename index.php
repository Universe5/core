<?php
// (C) Copyright Tristan Farkas 2018
$servername = "";
$username = "";
$password = "";
$dbname = "";
$serverlloc = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Uni-5 | Welcome</title>
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
        div.fixuni5img {
        position: relative;
        top: -15px;
    }
  </style>
</head>
<body>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <div class="fixuni5img">
       <a class="navbar-brand" href="https://trilleplay.net/universe-5-NExTMedia/index.php"><img style='width:33%;' src="//trilleplay.net/universe-5-NExTMedia/Universe-5%20Logo.svg"></a>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Welcome!</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      </ul>
    </div>
  </div>
</nav>
  
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3 well">
      <div class="well">
        <p>Welcome to universe-5, you're currently on the public site, if you want to access member only parts of the site please use the first link below.</p>
      </div>
      <p><a href="https://trilleplay.net/universe-5-NExTMedia/dashboard.php">Dashboard</a></p>
    </div>
    <div class="col-sm-7">
    
      
      <div class="row">
          <p1>These are posts made by public figures, you can only see those, unless you create a universe-5 account.</p1>
<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("There seems to be an issue. Sorry about that");
} 

$sql = "SELECT id, username, image, caption, imgorvideo FROM posts order by id desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='col-sm-9'><div class='well'><div class='post_" . $row["id"]. "'>User: " . $row["username"]. "<br> <" . $row[imgorvideo] ." style='width:100%;' src='https://<?php echo "$serverlloc"; ?>image-deliver/" . $row["image"]. " '> <br>" . $row["caption"]. "</div></div></div><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
          </div>
      </div>

<footer class="container-fluid text-center">
  <p>&copy; Copyright 2018 Tristan Farkas</p>
</footer>

</body>
</html>