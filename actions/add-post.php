<?php
include "../config/config.php";

if (isset($_POST['add_post_btn'])) {
    $title = trim(mysqli_real_escape_string($conn, $_POST['title']));
    $category = trim($_POST['category']);
    $description = trim(mysqli_real_escape_string($conn, $_POST['description']));
    $published = trim($_POST['published']);

    $user = $_SESSION['user_id'];
    $current_date = date('Y-m-d H:i:s');

    $img_url = NULL;

    if (isset($_FILES["image"]["tmp_name"]) && $_FILES["image"]["tmp_name"] != '') {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $target_file = basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $image_name = time() . "." . $imageFileType;
            $target_dir = "../uploads/" . $image_name;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir)) {
                $img_url = $image_name;
            }
        }
    }

    $ins_sql = "INSERT INTO posts (title, description, image, category, date, published, user) VALUES ('$title', '$description', '$img_url', '$category', '$current_date', '$published', $user)";

    if (mysqli_query($conn, $ins_sql)) {
        header("Location: ../all-post.php?post_add=success");
    } else{
        header("Location: ../add-post.php?post=error");
    }

}

?>