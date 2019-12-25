<?php

include "config/config.php";


include "partials/header_top.php";
?>
    <link rel="stylesheet" type="text/css" href="assets/category-list.css">

<?php
include "partials/header.php";
?>
    <!--page wraper-->
    <div class="page-wrapper">

        <div class="add-category-wrapper">

            <?php
            if (isset($_GET['category_add']) && ($_GET['category_add'] == 'success')) {
                ?>
                <p style="color: green;">Category Added Successfully... </p>
                <?php
            }
            elseif (isset($_GET['error']) && ($_GET['error'] == 'invalid_cat')) {
                ?>
                <p style="color: red;">Invalid Category... </p>
                <?php
            }elseif (isset($_GET['error']) && ($_GET['error'] == 'empty_cat')) {
                ?>
                <p style="color: red;">Empty Category... </p>
                <?php
            }elseif (isset($_GET['error']) && ($_GET['error'] == 'empty_cat')) {
                ?>
                <p style="color: red;">Invalid Category... </p>
                <?php
            }elseif (isset($_GET['category_upd']) && ($_GET['category_upd'] == 'success')) {
                ?>
                <p style="color: green;">Category Updated Successfully... </p>
                <?php
            }elseif (isset($_GET['category_dlt']) && ($_GET['category_dlt'] == 'success')) {
                ?>
                <p style="color: green;">Category Deleted Successfully... </p>
                <?php
            }elseif (isset($_GET['category_dlt']) && ($_GET['category_dlt'] == 'error')) {
                ?>
                <p style="color: red;">Something Went Wrong To Delete Category! Please Check it manually... </p>
                <?php
            }
            ?>

            <div class="box-top">
                <a class="btn" href="add-category.php">Add New</a>
            </div>
            <div class="box">
                <table class="table" border="1">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Created By</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $all_cat_sql = "SELECT c.id AS c_id, c.name AS c_name, c.status AS c_status, u.name AS u_name FROM categories c LEFT JOIN users u ON c.user=u.id";
                    $all_cat_qry = mysqli_query($conn, $all_cat_sql);
                    $show_sl = 1;
                    if (mysqli_num_rows($all_cat_qry) > 0) {
                        while ($cat_row = mysqli_fetch_array($all_cat_qry)) {
                            ?>
                            <tr>
                                <td><?php echo $show_sl++;?></td>
                                <td><?php echo $cat_row['c_name'];?></td>
                                <td><?php echo $cat_row['u_name'];?></td>
                                <td>
                                    <?php
                                        if ($cat_row['c_status'] == 1)
                                            echo "Active";
                                        else
                                            echo "In-Active";
                                    ?>
                                </td>
                                <td>
                                    <a href="edit-category.php?id=<?php echo $cat_row['c_id'];?>" class="btn-info">Edit</a>
                                    <a href="actions/delete-category.php?delete_category=<?php echo $cat_row['c_id'];?>" onclick="return confirm('Are You Sure To Delete it??')" class="btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                    ?>
                    <tr>
                        <td colspan="5">No Record Found</td>
                        <?php
                        }
                        ?>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
    <!--page wraper-->

<?php
include "partials/footer.php";
include "partials/footer_bottom.php";

?>