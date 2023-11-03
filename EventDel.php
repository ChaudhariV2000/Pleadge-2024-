<?php

include "connect.php";

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "DELETE FROM `org_event_post` WHERE `id`='$user_id'";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "Record deleted successfully.";
        header('Location: org-profile.php');
        exit;
    } else {

        echo $user_id;
    }
}

?>