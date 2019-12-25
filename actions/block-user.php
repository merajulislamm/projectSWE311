<?php
include "../config/config.php";

if (isset($_GET['block_user'])) {

    $user_id = $_GET['block_user'];

    $check_user_sql = "SELECT * FROM users WHERE id='$user_id'";
    $check_user_qry = mysqli_query($conn, $check_user_sql);
    if (mysqli_num_rows($check_user_qry) <= 0) {
        header("Location: all-user.php?error=invalid_user");
    }

    $upd_sql = "UPDATE users SET status='0' WHERE id='$user_id'";
    if (mysqli_query($conn, $upd_sql)) {
        header("Location: ../all-user.php?block=success");
    } else{
        header("Location: ../edit-user.php?block_user=$user_id&block=error");
    }

}

?>