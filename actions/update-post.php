<?php
include "../config/config.php";

if (isset($_POST['update_post_btn'])) {
    $title = trim(mysqli_real_escape_string($conn, $_POST['title']));
    $category = trim($_POST['category']);
    $description = trim(mysqli_real_escape_string($conn, $_POST['description']));
    $published = trim($_POST['published']);
    $post_id = trim($_POST['id']);

    $user = $_SESSION['user_id'];
    $current_date = date('Y-m-d H:i:s');


    $check_post_sql = "SELECT * FROM posts WHERE id='$post_id'";
    $check_post_qry = mysqli_query($conn, $check_post_sql);
    if (mysqli_num_rows($check_post_qry) <= 0) {
        header("Location: ../all-post.php?error=invalid_post");
    }

    $pre_post = mysqli_fetch_array($check_post_qry);

    $img_url = $pre_post['image'];

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


    $upd_sql = "UPDATE posts SET title='$title', description='$description', image='$img_url', category='$category', published='$published'  WHERE id='$post_id'";

    if (mysqli_query($conn, $upd_sql)) {
        header("Location: ../all-post.php?post_upd=success");
    } else{
        header("Location: ../edit-post.php?id=$post_id&post=error");
    }

}

?>