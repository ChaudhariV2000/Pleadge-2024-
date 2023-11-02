<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "volconn";
$conn = mysqli_connect($servername, $username, $password, $dbname) or 
die("Connection failed: " . mysqli_connect_error());
$curr= $_POST['event_id'];
    $user=$_COOKIE['user_id'];
    $sql = "INSERT INTO interested_users (Event_id, user_ids) VALUES ('$curr','$user')";
    mysqli_query($conn, $sql);
header('location: UserProfile.php');

?>