<?php
      
        setcookie("user_id", "", time() - 8400);
        setcookie("id", "", time() - 8400);
        echo "logged Out Successfully";
        header("Location: LandingPage.html");
?>