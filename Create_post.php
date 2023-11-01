<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "volconn";
$conn = mysqli_connect($servername, $username, $password, $dbname) or 
die("Connection failed: " . mysqli_connect_error());


if (isset($_POST)){
    $ename=$_POST['Event_name'];
    $elocation=$_POST['Event_location'];
    $edate=$_POST['Event_date'];
    $eorg="arbitrary organization";
    $edesc=$_POST['Event_description'];
    
    $sql = "INSERT INTO org_event_post(Event_name,Event_location,Event_date,Event_organizer_id,Event_description) VALUES('$ename','$elocation','$edate','$eorg',' $edesc');";
    mysqli_query($conn,$sql);
}
header('Location: org-profile.php');
exit;
?>