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
    if($_FILES["image"]["error"] == 4){
        echo
        "<script> alert('Image Does Not Exist'); </script>"
        ;
      }
      else{
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
    
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if ( !in_array($imageExtension, $validImageExtension) ){
          echo
          "
          <script>
            alert('Invalid Image Extension');
          </script>
          ";
        }
        else if($fileSize > 1000000){
          echo
          "
          <script>
            alert('Image Size Is Too Large');
          </script>
          ";
        }
        else{
          $newImageName = uniqid();
          $newImageName .= '.' . $imageExtension;
    
          move_uploaded_file($tmpName, 'img/' . $newImageName);
         
          
    $sql = "INSERT INTO org_event_post(Event_name,Event_location,Event_date,Event_organizer_id,Event_description,Event_image) VALUES('$ename','$elocation','$edate','$eorg',' $edesc','$newImageName');";
    mysqli_query($conn,$sql);
}
header('Location: org-profile.php');
      }}
?>