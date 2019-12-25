<?php
include "../config/config.php";


if (isset($_GET['delete_post'])) {
    $post_id= trim($_GET['delete_post']);

    $dlt_sql = "DELETE FROM posts WHERE id='$post_id'";

    if (mysqli_query($conn, $dlt_sql)) {
        header("Location: ../all-post.php?post_dlt=success");
    } else{
        header("Location: ../all-post.php?post_dlt=error");
    }

}

?>