<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";
$installloc = "";
$userget = filter_var($_GET["u"], FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="//twemoji.maxcdn.com/2/twemoji.min.js?2.6"></script>
  <title>Uni-5 | <?php echo($userget); ?> profile</title>
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
    div.Uni5-VerifiedEmote {
        position: relative;
        right:-25px;
        top: -20px;
    }
    div.eclipse {
        position: relative;
        right:30px;
        top: -62px;
    }
  </style>
</head>
<body>
<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("The connection failed. Sorry about that");
} 

$sql = "SELECT id, username, profileimage, bio, badge1, badge2 FROM users where username = '" . $userget  ."'";
$resultz = $conn->query($sql);
?>
<?php
if ($resultz->num_rows > 0) {
    // output data of each row
    while($rows = $resultz->fetch_assoc()) {
        echo "<div class='col-sm-9'><div class='well'><div class='post_" . $rows["id"]. "'>User: " . $rows["username"]. "<br> <" . $rows[imgorvideo] ." style='width:100%;' src='https://trilleplay.net/universe-5-NExTMedia/image-deliver/" . $rows["image"]. " '> <br>" . $rows["caption"]. "</div></div></div><br>";
    }
} else {
    echo "0 results";
}
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img style='width:25%;' src="//trilleplay.net/universe-5-NExTMedia/Universe-5%20Logo.svg"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="https://trilleplay.net/universe-5-NExTMedia/dashboard.php">Home</a></li>
        <li><a href="https://trilleplay.net/universe-5-NExTMedia/imagemeup/form_upload.php">Post</a></li>
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
        <p>@<?php echo($userget); ?></p>
        <img src="https://trilleplay.net/universe-5-NExTMedia/profileimg/index.png" class="img-circle" height="85" width="85" alt="Avatar">
        <br>
        <div class="Uni5-VerifiedEmote">
            <img src="https://twemoji.maxcdn.com/72x72/1f609.png" height="25" width="25" alt="Verified" title="Verified">
        </div>
        <div class="eclipse">
            <img src="http://trilleplay.net/universe-5-NExTMedia/icon/eclipsemember.png" title="Eclipse Member" height="60" width="60" alt="Eclipse">
        </div>
      </div>
      <p>Hello there, my name is Tristan Farkas, I'm a Swedish game developer and the developer of Universe-5.</p>
    </div>
    <div class="col-sm-7">
          <div class="row">
<?php
$conn->close();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("The connection failed. Sorry about that");
} 

$sql = "SELECT id, username, image, caption, imgorvideo FROM posts where username = '" . $userget  ."' order by id desc";
$result = $conn->query($sql);
?>
<?php
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
</body>