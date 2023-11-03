<?php

// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: org-profile.php");
//     exit;
// }
//ocean

                                        if(isset($_COOKIE['user_id']))
                                        {
                                        header('location: UserProfile.php');
                                        }
                                        else if(isset($_COOKIE['org_id']))
                                        {
                                        header("location: org-profile.php");
                                        }
require 'db_config.php';
$field=$_POST['optradio'];
$password = $UserID = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(empty(trim($_POST['userid']))){
        die("Please enter your name");
    } 
    else{
        $UserID = trim($_POST['userid']);
    }
    
    if(empty(trim($_POST['Password']))){
        die("Please enter your password");
    } 
    else{
        $password = trim($_POST['Password']);
    }
    if($field=='organizer')
    {
    $sql = "SELECT Id, Password FROM org_login WHERE Name = '$UserID'";
    $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($result);
    //echo mysqli_num_rows($result);
    if (mysqli_num_rows($result) == 1){
        if ($password == $rows['Password']){
            echo "Login Successful!";
            $id=$rows['Id'];
            setcookie("org_id",$id,time()+8400);
            // session_start();
            // $_SESSION['loggedin'] = true;
            // $_SESSION['id'] = $rows['Id'];
            
            header('location: org-profile.php');
        }
        else{
            echo "Wrong Password";
        }
    }
    else if (mysqli_num_rows($result) === 0){
        echo "User does not exist";
    }
    
    }

    if($field=='volunteer')
    {echo "hoo";
        $sql = "SELECT Id,Password FROM volunteer_login WHERE id = '$UserID'";
    $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) === 1){
        if ($password === $rows['Password']){
            echo "<script>alert('Login Successful!')</script>";
            
            $id=$rows['Id'];    
            setcookie("user_id",$id,time()+8400);
            header('location: UserProfile.php');
        }
        else{
            echo "Wrong Password";
        }
    }
    else if (mysqli_num_rows($result) === 0){
        echo "User does not exist";
    }
    }

    else{
        echo "Something went wrong, please try again later";
    }
}
?>