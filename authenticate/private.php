<?php 

    require("common.php"); 
      
    if(empty($_SESSION['user'])) 
    {  
        header("Location: login.php"); 
         
        die("Redirecting to login.php"); 
    } 
     
// (C) Copyright Tristan Farkas 2018
$installloc = "";
?> 
Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>, welcome to Uni-5!<br /> 

<a href="https://<?php echo "$installloc" ?>dashboard.php">Go to your dashboard.</a>
<a href="edit_account.php">Edit account information.</a><br /> 
<a href="logout.php">Logout</a>