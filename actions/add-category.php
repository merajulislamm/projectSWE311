<?php
include "../config/config.php";

if (isset($_POST['add_category_btn'])) {
    $name = trim($_POST['name']);
    $user = $_SESSION['user_id'];

    $check_category_sql = "SELECT * FROM categories WHERE name='$name'";
    $check_category_qry = mysqli_query($conn, $check_category_sql);
    if (mysqli_num_rows($check_category_qry) > 0) {
        header("Location: ../add-category.php?category=duplicate");
    } else {

        $ins_sql = "INSERT INTO categories (name, user) VALUES ('$name', '$user')";
        if (mysqli_query($conn, $ins_sql)) {
            header("Location: ../all-category.php?category_add=success");
        } else{
            header("Location: ../add-category.php?category=error");
        }
    }
}

?>