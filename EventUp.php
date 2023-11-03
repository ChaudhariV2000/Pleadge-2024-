<?php

include "connect.php";
$Ev_ID = $_GET['id'];

?>
<?php

include "connect.php";

if (isset($_POST['Update'])) {

    $Event_name = $_POST['Event_name'];


    $Event_location = $_POST['Event_location'];



    $Event_date = $_POST['Event_date'];

    $Event_description = $_POST['Event_description'];


    $sql = "UPDATE `org_event_post` SET `Event_location`='$Event_location',`Event_date`='$Event_date',`Event_description`='$Event_description' WHERE `id`='$Ev_ID'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Record updated successfully.";
        header('Location: org-profile.php');
        exit;

    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

}
$sql2 = "SELECT Event_name FROM `org_event_post` WHERE `id`='$Ev_ID'";

$resultset = $conn->query($sql2);
$e_name = mysqli_fetch_assoc($resultset)
    ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create event</title>
    <link rel="stylesheet" href="newpost.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="pledgelogo.png">
</head>
<h1> Edit post </h1>
<form method="post" `autocomplete="off" enctype="multipart/form-data">
    <fieldset>

        <legend><span class="number"></span> Event Info</legend>

        <label for="Event_name">Event Name:</label>
        <label for="Event_name">
            <?php echo $e_name['Event_name']; ?>
        </label>

        <label for="Event_location">Event Location: </label>
        <input type="text" id="Location" name="Event_location">

        <label for="Event_date">Event Date:</label>
        <input type="date" id="date" name="Event_date">


        <label for="Event_description">Event Description:</label>
        <textarea id="desc" name="Event_description" rows="4" cols="50"></textarea>

    </fieldset>
    <button type="submit" name="Update">Update</button>

</form>