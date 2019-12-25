<?php
include "../config/config.php";

if (isset($_POST['update_category_btn'])) {
    $name = trim($_POST['name']);
    $cat_id = trim($_POST['id']);
    $user = $_SESSION['user_id'];

    $check_category_sql = "SELECT * FROM categories WHERE id='$cat_id'";
    $check_category_qry = mysqli_query($conn, $check_category_sql);
    if (mysqli_num_rows($check_category_qry) <= 0) {
        header("Location: all-category.php?error=invalid_cat");
    }

    $check_exist_category_sql = "SELECT * FROM categories WHERE name='$name' AND id !='$cat_id'";
    $check_exist_category_qry = mysqli_query($conn, $check_exist_category_sql);
    if (mysqli_num_rows($check_exist_category_qry) > 0) {
        header("Location: ../edit-category.php?id=$cat_id&category=duplicate");
    } else {

        $upd_sql = "UPDATE categories SET name='$name' WHERE id='$cat_id'";
        if (mysqli_query($conn, $upd_sql)) {
            header("Location: ../all-category.php?category_upd=success");
        } else{
            header("Location: ../edit-category.php?id=$cat_id&category=error");
        }
    }
}

?>