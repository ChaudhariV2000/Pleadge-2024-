<?php
require 'db_config.php';

$email = $password = $Userid = $first_name = $Last_name = $confirm_pass = '1234';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (empty(trim($_POST['user_id']))) {
    echo "<script>alert('Enter ID');</script>";
    echo "<script>window.location.href = 'Vol_reg.html';</script>";
  } else if (empty(trim($_POST['first_name']))) {
    echo "<script>alert('Enter First Name');</script>";
    echo "<script>window.location.href = 'Vol_reg.html';</script>";
  } else if (empty(trim($_POST['Last_name']))) {
    echo "<script>alert('Enter Last Name');</script>";
    echo "<script>window.location.href = 'Vol_reg.html';</script>";
  } else if (empty(trim($_POST['Password']))) {
    echo "<script>alert('Enter Password');</script>";
    echo "<script>window.location.href = 'Vol_reg.html';</script>";
  } else if (empty(trim($_POST['Email']))) {
    echo "<script>alert('Enter Email address');</script>";
    echo "<script>window.location.href = 'Vol_reg.html';</script>";
  } else if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Enter Valid Email');</script>";
    echo "<script>window.location.href = 'Vol_reg.html';</script>";
  } else {
    $email = trim($_POST['Email']);
    $password = trim($_POST['Password']);
    $userid = trim($_POST['user_id']);
    $first_name = trim($_POST['first_name']);
    $Last_name = trim($_POST['Last_name']);

    include 'connect.php';
    $sql_userid = "SELECT id from volunteer_login WHERE id='$userid'";

    //$rows=mysqli_num_rows($resultset);
    //echo $rows;
    if ($resultset = mysqli_query($conn, $sql_userid)) {
      $rows_no = mysqli_num_rows($resultset);
      if ($rows_no == 0) {

        $sql = "INSERT into volunteer_login (id,first_name, Last_name, Password, Email) Values('$userid','$first_name','$Last_name','$password','$email')";
        if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Record Created Successfully');</script>";
          // session_start();
          // $_SESSION['loggedin'] = true;
          // $_SESSION['name'] = $_POST['Name'];
          // $_SESSION['email'] = $rows['Email'];
          // setcookie("user_id",$userid,time()+86400);//cookies set
          header('location: LandingPage.html');
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      } else {
        echo "<script>alert('User Id already Exists');</script>";
        echo "<script>window.location.href = 'Vol_reg.html';</script>";
      }
    }
  }


}
?>