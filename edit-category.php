<?php

include "config/config.php";


include "partials/header_top.php";
?>
    <link rel="stylesheet" type="text/css" href="assets/category.css">

<?php
include "partials/header.php";

if (!isset($_GET['id']) || ($_GET['id'] == '')) {
    header("Location: all-category.php?error=empty_cat");
}
$cat_id = $_GET['id'];
$category_sql = "SELECT * FROM categories WHERE id='$cat_id'";
$category_qry = mysqli_query($conn, $category_sql);
if (mysqli_num_rows($category_qry) <= 0) {
    header("Location: all-category.php?error=invalid_cat");
}
$category = mysqli_fetch_array($category_qry);
?>
    <!--page wraper-->
    <div class="page-wrapper">

        <div class="add-category-wrapper">

            <?php
            if (isset($_GET['category']) && ($_GET['category'] == 'duplicate')) {
                ?>
                <p style="color: red;">Category has been already added</p>
                <?php
            } elseif (isset($_GET['category']) && ($_GET['category'] == 'error')) {
                ?>
                <p style="color: red;">Something Went Wrong to update Category. check it manually</p>
                <?php
            }
            ?>
            <form action="actions/update-category.php" method="post">
                <div class="box">
                    <h1>Category</h1>

                    <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                    <input type="text" name="name" placeholder="Type New Category Name" value="<?php echo $category['name']; ?>" class="email" />

                    <input type="submit" value="Update Category" id="btn2" name="update_category_btn">

                </div> <!-- End Box -->

            </form>
        </div>

    </div>
    <!--page wraper-->

<?php
include "partials/footer.php";
include "partials/footer_bottom.php";

?>