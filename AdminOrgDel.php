<?php

include "connect.php";

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "DELETE FROM `org_login` WHERE `id`='$user_id'";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "Record deleted successfully.";
        header('Location: AdminPage.php');
        exit;
    } else {

        echo $user_id;
    }
}

?>