<?php

include "config/config.php";

if (!isset($_SESSION['user_logged_in']) || ($_SESSION['user_logged_in'] !== true) || ($_SESSION['user_type'] != 'admin')) {
    header("Location: index.php?error=permission");
}

$page_title = "All Category || Saad-Blog";
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
            if (isset($_GET['user_add']) && ($_GET['user_add'] == 'success')) {
                ?>
                <p style="color: green;">User Added Successfully... </p>
                <?php
            } elseif (isset($_GET['error']) && ($_GET['error'] == 'invalid_user')) {
                ?>
                <p style="color: red;">Invalid User... </p>
                <?php
            } elseif (isset($_GET['error']) && ($_GET['error'] == 'empty_user')) {
                ?>
                <p style="color: red;">Empty User... </p>
                <?php
            } elseif (isset($_GET['error']) && ($_GET['error'] == 'empty_user')) {
                ?>
                <p style="color: red;">Invalid User... </p>
                <?php
            } elseif (isset($_GET['user_upd']) && ($_GET['user_upd'] == 'success')) {
                ?>
                <p style="color: green;">User Updated Successfully... </p>
                <?php
            } elseif (isset($_GET['user_dlt']) && ($_GET['user_dlt'] == 'success')) {
                ?>
                <p style="color: green;">User Deleted Successfully... </p>
                <?php
            } elseif (isset($_GET['user_dlt']) && ($_GET['user_dlt'] == 'error')) {
                ?>
                <p style="color: red;">Something Went Wrong To Delete User! Please Check it manually... </p>
                <?php
            } elseif (isset($_GET['block']) && ($_GET['block'] == 'success')) {
                ?>
                <p style="color: green;">User Blocked Successfully... </p>
                <?php
            }
            ?>

            <div class="box">
                <table class="table" border="1">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $all_user_sql = "SELECT * FROM users";
                    $all_user_qry = mysqli_query($conn, $all_user_sql);
                    $show_sl = 1;
                    if (mysqli_num_rows($all_user_qry) > 0) {
                        while ($user_row = mysqli_fetch_array($all_user_qry)) {
                            ?>
                            <tr>
                                <td><?php echo $show_sl++; ?></td>
                                <td><?php echo $user_row['name']; ?></td>
                                <td><?php echo $user_row['email']; ?></td>
                                <td><?php echo $user_row['age']; ?></td>
                                <td><?php echo strtoupper($user_row['role']); ?></td>
                                <td>
                                    <?php
                                    if ($user_row['status'] == 1)
                                        echo "Active";
                                    else
                                        echo "In-Active";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($user_row['id'] != $_SESSION['user_id']) {
                                        ?>
                                    <a href="actions/block-user.php?block_user=<?php echo $user_row['id']; ?>"
                                       onclick="return confirm('Are You Sure To Block this user it??')"
                                       class="btn-danger">Block</a>

                                        <a href="actions/delete-user.php?delete_user=<?php echo $user_row['id']; ?>"
                                           onclick="return confirm('Are You Sure To Delete this user??')"
                                           class="btn-danger">Delete</a>
                                        <?php
                                    } else {
                                        echo "You";
                                    }
                                    ?>
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