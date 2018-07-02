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
define("UPLOAD_DIR", "/customers/3/b/8/trilleplay.net//httpd.www/universe-5-NExTMedia/image-deliver/");

if (!empty($_FILES["myFile"])) {
    $myFile = $_FILES["myFile"];

    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }

    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"],
        UPLOAD_DIR . $name);
    if (!$success) { 
        echo "<p>Unable to save file.</p>";
        exit;
    }

    // set proper permissions on the new file
    chmod(UPLOAD_DIR . $name, 0644);
}
?>
<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";
$usrname = $_SESSION['user']['username'];
$caption = $_POST["caption"];
$captionsane = filter_var($caption, FILTER_SANITIZE_STRING);
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO posts (username, image, caption)
    VALUES ('$usrname', '$name', '$captionsane')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Image Uploaded!";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
<html>
</html>