<?php
include "../config/config.php";


if (isset($_GET['delete_user'])) {
    $user_id = trim($_GET['delete_user']);

    $dlt_sql = "DELETE FROM users WHERE id='$user_id'";

    if (mysqli_query($conn, $dlt_sql)) {
        header("Location: ../all-user.php?delete=success");
    } else{
        header("Location: ../all-user.php?delete=error");
    }

}

?>