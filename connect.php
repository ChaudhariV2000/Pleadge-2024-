<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "volconn";
$conn = mysqli_connect($servername, $username, $password, $dbname) or 
die("Connection failed: " . mysqli_connect_error());
?>