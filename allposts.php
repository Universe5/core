<?php
// (C) Copyright Tristan Farkas 2018
// Enter SQL Details here!
$servername = "";
$username = "";
$password = "";
$dbname = "";
// The website page to the installation location.
$installloc = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("An error has occurred. Sorry about that. Please contact the server administrator!");
} 

$sql = "SELECT id, username, image, caption FROM posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='post_" . $row["id"]. "'>User: " . $row["username"]. "<br> <img width='642' height='642' src='https://" . $installloc . "/image-deliver/" . $row["image"]. " '> <br>" . $row["caption"]. "</div><br>";
    }
} else {
    echo "<h1>DEBUG FAIL, PLEASE CHECK CONFIGURATION FOR ERRORS, NO ITEMS IN TABLE FOUND.</h1>";
}
$conn->close();
?>