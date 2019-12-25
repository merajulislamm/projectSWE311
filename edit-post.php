<?php

include "config/config.php";


include "partials/header_top.php";
?>
    <link rel="stylesheet" type="text/css" href="assets/post.css">

<?php
include "partials/header.php";


if (!isset($_GET['id']) || ($_GET['id'] == '')) {
    header("Location: all-post.php?error=empty_post");
}
$post_id = $_GET['id'];
$post_sql = "SELECT * FROM posts WHERE id='$post_id'";
$post_qry = mysqli_query($conn, $post_sql);
if (mysqli_num_rows($post_qry) <= 0) {
    header("Location: all-post.php?error=invalid_post");
}
$post = mysqli_fetch_array($post_qry);
?>
    <!--page wraper-->
    <div class="page-wrapper">

        <div class="add-category-wrapper">

            <?php
            if (isset($_GET['post']) && ($_GET['post'] == 'error')) {
                ?>
                <p style="color: red;">Something Went Wrong to add Post. check it manually</p>
                <?php
            }
            ?>
            <form action="actions/update-post.php" method="post" enctype="multipart/form-data">
                <div class="box">
                    <h1>Post</h1>

                    <input type="text" value="<?php echo $post['title']; ?>" name="title" placeholder="Type New Post Title" class="email" required/>

                    <select name="category" class="email" id="" required>
                        <option value="">Select Category</option>
                        <?php
                        $cat_sql = "SELECT * FROM categories WHERE status='1'";
                        $cat_qry = mysqli_query($conn, $cat_sql);
                        if (mysqli_num_rows($cat_qry) > 0) {
                            while ($cat_row = mysqli_fetch_array($cat_qry)) {
                                ?>
                                <option value="<?php echo $cat_row['id']; ?>" <?php if ($post['category'] == $cat_row['id']) echo "selected"; ?>><?php echo $cat_row['name']; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                    <textarea name="description" id="" cols="30" rows="10" class="email"
                              placeholder="Enter Post Description" required><?php echo $post['description']; ?></textarea>

                    <img src="uploads/<?php echo $post['image']; ?>" alt="" style="width: 60px; height: 60px;">
                    <input type="file" accept="image/*" class="email" name="image">

                    <br>
                    <br>
                    <input type="radio" name="published" value="1" <?php if ($post['published'] == 1) echo "checked"; ?> id="published" required>
                    <label for="published">Published</label>
                    &nbsp;
                    &nbsp;
                    <input type="radio" name="published" value="0" <?php if ($post['published'] == 0) echo "checked"; ?> id="unpublished" required>
                    <label for="unpublished">Un-Published</label>
                    <br>

                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                    <input type="submit" value="Update Post" id="btn2" name="update_post_btn">

                </div> <!-- End Box -->

            </form>
        </div>

    </div>
    <!--page wraper-->

<?php
include "partials/footer.php";
include "partials/footer_bottom.php";

?>