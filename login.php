<?php


include "partials/header_top.php";
?>
    <link rel="stylesheet" type="text/css" href="assets/login.css">

<?php
include "partials/header.php";
?>

    <!--page wraper-->
    <div class="page-wrapper">

        <div class="login-wrapper">
            <?php
            if (isset($_GET['register']) && ($_GET['register'] == 'success')) {
                ?>
                <p style="color: green;">Account Registered Successfully Completed. Please Login From Here... </p>
                <?php
            } elseif (isset($_GET['login']) && ($_GET['login'] == 'error')) {
                ?>
                <p style="color: red;">Email or Password was wrong. Please input correct information </p>
                <?php
            } elseif (isset($_GET['login']) && ($_GET['login'] == 'inactive')) {
                ?>
                <p style="color: red;">Your Account Was Disabled. Contact With Admin</p>
                <?php
            }
            ?>
            <form method="post" action="actions/login.php">
                <div class="box">
                    <h1>Login</h1>

                    <input type="email" name="email" placeholder="Type Your Email" class="email" />

                    <input type="password" name="password" placeholder="Type Your password" class="email" />

                    <input type="submit" value="Sign In" id="btn2" name="login_btn">

                </div> <!-- End Box -->

            </form>
        </div>


    </div>
    <!--page wraper-->

<?php
include "partials/footer.php";
include "partials/footer_bottom.php";

?>