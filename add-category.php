<?php

include "config/config.php";


include "partials/header_top.php";
?>
    <link rel="stylesheet" type="text/css" href="assets/category.css">

<?php
include "partials/header.php";
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
                <p style="color: red;">Something Went Wrong to add Category. check it manually</p>
                <?php
            }
            ?>
            <form action="actions/add-category.php" method="post">
                <div class="box">
                    <h1>Category</h1>

                    <input type="text" name="name" placeholder="Type New Category Name" class="email" required/>

                    <input type="submit" value="Add Category" id="btn2" name="add_category_btn">

                </div> <!-- End Box -->

            </form>
        </div>

    </div>
    <!--page wraper-->

<?php
include "partials/footer.php";
include "partials/footer_bottom.php";

?>