<?php
$servername = "localhost";
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
    $image = $_FILES['image']['tmp_name'];
    $imageData = file_get_contents($image);
    $imageType = $_FILES['image']['type'];


    $stmt = $conn->prepare("INSERT INTO images (event,image_data, image_type) VALUES ('$ename', ?, ?)");
    $stmt->bind_param("ss", $imageData, $imageType);
    // $stmt2=$conn->prepare("INSERT INTO org_event_post (Event_name,Event_location, Event_date) VALUES (ved,bande,$edate);");
    // $stmt2->exeute();
    if ($stmt->execute()) {
      echo "Image uploaded and inserted into the database successfully.";
  } else {
      echo "Error uploading and inserting the image.";
  }
  $sql = "INSERT INTO org_event_post(Event_name,Event_location,Event_date,Event_organizer_id,Event_description) VALUES('$ename','$elocation','$edate','$eorg',' $edesc');";
  mysqli_query($conn,$sql);

  $stmt->close();
header('Location: org-profile.php');
      }
?>