<?php
include "../config/config.php";


if (isset($_GET['delete_category'])) {
    $cat_id = trim($_GET['delete_category']);

    $dlt_sql = "DELETE FROM categories WHERE id='$cat_id'";

    if (mysqli_query($conn, $dlt_sql)) {
        header("Location: ../all-category.php?category_dlt=success");
    } else{
        header("Location: ../all-category.php?category_dlt=error");
    }

}

?>