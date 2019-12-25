<?php

include "config/config.php";


include "partials/header_top.php";
?>
    <link rel="stylesheet" type="text/css" href="assets/post.css">

<?php
include "partials/header.php";
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
            <form action="actions/add-post.php" method="post" enctype="multipart/form-data">
                <div class="box">
                    <h1>Post</h1>

                    <input type="text" name="title" placeholder="Type New Post Title" class="email" required/>

                    <select name="category" class="email" id="" required>
                        <option value="">Select Category</option>
                        <?php
                        $cat_sql = "SELECT * FROM categories WHERE status='1'";
                        $cat_qry = mysqli_query($conn, $cat_sql);
                        if (mysqli_num_rows($cat_qry) > 0) {
                            while ($cat_row = mysqli_fetch_array($cat_qry)) {
                                ?>
                                <option value="<?php echo $cat_row['id']; ?>"><?php echo $cat_row['name']; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                    <textarea name="description" id="" cols="30" rows="10" class="email"
                              placeholder="Enter Post Description" required></textarea>

                    <input type="file" accept="image/*" class="email" name="image">

                    <br>
                    <br>
                    <input type="radio" name="published" value="1" id="published" required>
                    <label for="published">Published</label>
                    &nbsp;
                    &nbsp;
                    <input type="radio" name="published" value="0" id="unpublished" required>
                    <label for="unpublished">Un-Published</label>
                    <br>
                    <input type="submit" value="Add Post" id="btn2" name="add_post_btn">

                </div> <!-- End Box -->

            </form>
        </div>

    </div>
    <!--page wraper-->

<?php
include "partials/footer.php";
include "partials/footer_bottom.php";

?>