<?php
require 'db_config.php';

$email = $password = $Userid=$first_name = $Last_name = $confirm_pass ='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(empty(trim($_POST['Email']))){
      die("Please enter your email");
    } 
    else{
      $email = trim($_POST['Email']);
    }
    
    if(empty(trim($_POST['Password']))){
        die("Please enter your password");
    } 
    else{
        $password = trim($_POST['Password']);
    }
    
    if(empty(trim($_POST['user_id']))){
        die("Please enter your name");
    } 
    else{
        $userid= trim($_POST['user_id']);
    }
    if(empty(trim($_POST['first_name']))){
      die("Please enter your Last name");
  } 
  else{
      $first_name = trim($_POST['first_name']);
  }

    if(empty(trim($_POST['Last_name']))){
        die("Please enter your Last name");
    } 
    else{
        $Last_name = trim($_POST['Last_name']);
    }
    $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
       $sql_userid="SELECT id from volunteer_login WHERE id='$userid'";
       
       //$rows=mysqli_num_rows($resultset);
       //echo $rows;
      if($resultset=mysqli_query($conn,$sql_userid))
       { $rows_no=mysqli_num_rows($resultset);
          if($rows_no==0)
          {
     
       $sql = "INSERT into volunteer_login (id,first_name, Last_name, Password, Email) Values('$userid','$first_name','$Last_name','$password','$email')";
        if (mysqli_query($conn, $sql))
         {
            echo "New record created successfully";
            // session_start();
            // $_SESSION['loggedin'] = true;
            // $_SESSION['name'] = $_POST['Name'];
            // $_SESSION['email'] = $rows['Email'];
            // setcookie("user_id",$userid,time()+86400);//cookies set
            header('location: LandingPage.html');
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
        }else{
          echo "UserID already Exists";
        }
      }
    
}
?>