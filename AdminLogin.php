<?php
if ($_POST["user_id"] == "Admin" && $_POST["Password"] == "1234") {
    echo "valid login";

    header("Location:AdminPage.php");
    exit();

} else {
    echo "Invalid login";
}

?>