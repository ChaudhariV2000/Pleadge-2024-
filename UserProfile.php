<?php
if (!isset($_COOKIE["user_id"])) {
    header("location: vol_reg.html");
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="VClogo.png">
    <!-- FontAwesome JS-->
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet'
        type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Global CSS -->
    <link href="css/myvals.min.css" rel="stylesheet">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/prism/prism.css">
</head>

<body>
    <!-- Navbar -->
    <header id="header " class="header">
        <nav id="main-nav" class="main-nav navbar navbar-expand-md bg-primary ">
            <div class="container-fluid text-white">
                <a class="navbar-brand logo scrollto" href="LandingPage.html">
                    <span class="logo-title text-white">Pledge</span>
                </a>
            </div><!--//navabr-collapse-->
            </div>
        </nav><!--//main-nav-->
    </header>
    <h1 class="p-3">Opportunities to volunteer near you</h1>
    <center>
        <iframe type
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7536.8468827843!2d72.85890169030745!3d19.17669906172401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b707df0a2869%3A0x7614bda6fb9d3e97!2sMalad%2C%20Dindoshi%2C%20Malad%20East%2C%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1698909442582!5m2!1sen!2sin"
            width="80%" height="550vw" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </center>
    <!--cards:-->

    <div class="card-deck row">
        <?php
        include_once("connect.php");
        $sql = "SELECT id, Event_name, Event_location, Event_date, Event_organizer_id, Event_description, Volunteers_required, Volunteers_ready, Event_image FROM org_event_post";
        $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
        while ($record = mysqli_fetch_assoc($resultset)) {
            ?>
            <div class="card hovercard p-5 w-50 border-0 shadow-sm">
                <div class="cardheader">
                    <div class="avatar">
                        <img alt="assume image here" src="greenearth.png" style="width:180px">
                    </div>
                </div>
                <div class="card-body info">
                    <div class="title">
                        <h3 class="text-secondary">
                            <?php echo $record['Event_name']; ?>
                        </h3>
                    </div>
                    <div class="desc"> <a target="_blank" href="<?php echo $record['Event_location']; ?>"></a></div>
                    <div class="desc">
                        <?php echo $record['Event_description']; ?>
                    </div>
                    <div class="desc">Date:
                        <?php echo $record['Event_date']; ?>
                    </div>
                    <div class="desc">Organized by:
                        <?php echo $record['Event_organizer_id']; ?>
                    </div>
                </div>

                <form class="" method="post">
                    <?php
                    $curr = $record['id'];

                    $user = $_COOKIE['user_id'];
                    echo $user;
                    $sql = "SELECT * FROM interested_users WHERE Event_id =$curr AND user_ids='$user';";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {

                        ?>
                        <button type="button" disabled>I'm interested</button>
                        <?php
                    } else {

                        ?>
                        <button type="submit" id="1" name="expressInterest">I'm interested</button>
                        <?php

                        // Handle the form submission
                
                    }
                    ?>
                </form>
            </div>

        <?php }
        if (isset($_POST['expressInterest'])) {
            $sql = "INSERT INTO interested_users (Event_id, user_ids) VALUES ('$curr','$user')";
            mysqli_query($conn, $sql);
        }
        ?>

    </div>
</body>