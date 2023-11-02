<?php
require 'db_config.php';

$password = $Name = $Location = $Description = $Phone_no = $Website = $confirm_pass ='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(empty(trim($_POST['Name']))){
        echo "<script>alert('Enter the Organisation Name');</script>";
        echo "<script>window.location.href = 'Org_reg.html';</script>";
    } 
    else if(empty(trim($_POST['Password']))){
      echo "<script>alert('Enter the Password');</script>";
      echo "<script>window.location.href = 'Org_reg.html';</script>";
    }
    else if(empty(trim($_POST['Location']))){
        echo "<script>alert('Enter the location');</script>";
        echo "<script>window.location.href = 'Org_reg.html';</script>";
    }  
    else if(empty(trim($_POST['Description']))){
      echo "<script>alert('Enter the Description');</script>";
      echo "<script>window.location.href = 'Org_reg.html';</script>";
    } 
    
    else if(empty(trim($_POST['Phone_no']))){
      echo "<script>alert('Enter the Number');</script>";
      echo "<script>window.location.href = 'Org_reg.html';</script>";
    }
    else if(!preg_match('/^[0-9]{10}+$/', $_POST['Phone_no'])) {
        echo "<script>alert('Enter Valid Phone Number');</script>";
        echo "<script>window.location.href = 'Org_reg.html';</script>";
    }  
    else if(empty(trim($_POST['Website']))){
      echo "<script>alert('Enter the Website');</script>";
      echo "<script>window.location.href = 'Org_reg.html';</script>";
    } 
    else{
        $Name = trim($_POST['Name']);
        $Location = trim($_POST['Location']);
        $password = trim($_POST['Password']);
        $Description = trim($_POST['Description']);
        $Phone_no = trim($_POST['Phone_no']);
        $Website = trim($_POST['Website']);
    
    
        $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
        $sql_user="SELECT Name from org_login WHERE Name='$Name'";
        //$rows=mysqli_num_rows($resultset);
        //echo $rows;
        if($resultset=mysqli_query($conn,$sql_user))
        { 
            $rows_no=mysqli_num_rows($resultset);
            if($rows_no==0)
            {
     
                $sql = "INSERT into org_login (Name, Password, Location, Description, Phone_no, Website) Values('$Name', '$password', '$Location', '$Description', '$Phone_no', '$Website')";
                if (mysqli_query($conn, $sql))
                {
                echo "<script>alert('Record Created Successfully');</script>";
                header('location: LandingPage.html');
                } 
                else 
                {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
            else{
                echo "<script>alert('User Id already Exists');</script>";
                echo "<script>window.location.href = 'Org_reg.html';</script>";
            }
      }
    }
    
    
}
?>