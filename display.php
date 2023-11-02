<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "volconn";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['event_name'])) {
    $event_name = $_GET['event_name'];
    
} else {
  
}
$sql = "SELECT image_data, image_type FROM images WHERE event ='$event_name'"; // Adjust the WHERE clause to match the image you want to display.
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imageData = $row["image_data"];
    $imageType = $row["image_type"];

    header("Content-type: $imageType");
    echo $imageData;
} else {
    echo "Image not found.";
}

$conn->close();
?>
