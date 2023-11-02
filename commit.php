<?php
 include_once("connect.php");

 $user = $_COOKIE['user_id'];
 $curr=$_POST['event_id'];
 if (isset($_POST['expressInterest'])) {
    $sql = "INSERT INTO interested_users (Event_id, user_ids) VALUES ('$curr','$user')";
    mysqli_query($conn, $sql);
    header('location: UserProfile.php');
}
?>