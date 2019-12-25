<?php

include "config/config.php";
include "custom_functions.php";

$page_title = "All Post || Saad-Blog";
include "partials/header_top.php";
?>
    <link rel="stylesheet" type="text/css" href="assets/post-list.css">

<?php
include "partials/header.php";
?>
    <!--page wraper-->
    <div class="page-wrapper">

        <div class="add-category-wrapper">

            <?php
            if (isset($_GET['post_add']) && ($_GET['post_add'] == 'success')) {
                ?>
                <p style="color: green;">Post Added Successfully... </p>
                <?php
            }
            elseif (isset($_GET['error']) && ($_GET['error'] == 'invalid_post')) {
                ?>
                <p style="color: red;">Invalid Post... </p>
                <?php
            }elseif (isset($_GET['error']) && ($_GET['error'] == 'empty_post')) {
                ?>
                <p style="color: red;">Empty Post... </p>
                <?php
            }elseif (isset($_GET['error']) && ($_GET['error'] == 'empty_post')) {
                ?>
                <p style="color: red;">Invalid Post... </p>
                <?php
            }elseif (isset($_GET['post_upd']) && ($_GET['post_upd'] == 'success')) {
                ?>
                <p style="color: green;">Post Updated Successfully... </p>
                <?php
            }elseif (isset($_GET['post_dlt']) && ($_GET['post_dlt'] == 'success')) {
                ?>
                <p style="color: green;">Post Deleted Successfully... </p>
                <?php
            }elseif (isset($_GET['post_dlt']) && ($_GET['post_dlt'] == 'error')) {
                ?>
                <p style="color: red;">Something Went Wrong To Delete Post! Please Check it manually... </p>
                <?php
            }
            ?>

            <div class="box-top">
                <a class="btn" href="add-post.php">Add New Post</a>
            </div>
            <div class="box">
                <table class="table" border="1">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Published</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $all_post_sql = "SELECT p.* , u.name AS u_name FROM posts p LEFT JOIN users u ON p.user=u.id";
                    $all_post_qry = mysqli_query($conn, $all_post_sql);
                    $show_sl = 1;
                    if (mysqli_num_rows($all_post_qry) > 0) {
                        while ($row = mysqli_fetch_array($all_post_qry)) {
                            ?>
                            <tr>
                                <td><?php echo $show_sl++;?></td>
                                <td><?php echo $row['title'];?></td>
                                <td><?php echo show_sub_string($row['description'], 10);?></td>
                                <td>
                                    <img class="table_image" src="uploads/<?php echo $row['image'];?>" alt="">
                                </td>
                                <td>
                                    <?php
                                    if ($row['published'] == 1)
                                        echo "Yes";
                                    else
                                        echo "No";
                                    ?>
                                </td>
                                <td><?php echo $row['u_name']; ?></td>
                                <td>
                                    <?php
                                    if ($row['status'] == 1)
                                        echo "Active";
                                    else
                                        echo "In-Active";
                                    ?>
                                </td>
                                <td>
                                    <a href="edit-post.php?id=<?php echo $row['id'];?>" class="btn-info">Edit</a>
                                    <a href="actions/delete-post.php?delete_post=<?php echo $row['id'];?>" onclick="return confirm('Are You Sure To Delete it??')" class="btn-danger">Delete</a>
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