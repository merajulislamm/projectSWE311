<?php
include "config/config.php";

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
            if (isset($_GET['email']) && ($_GET['email'] == 'duplicate')) {
                ?>
                    <p style="color: red;">Email has been already registered</p>
                <?php
            } elseif (isset($_GET['register']) && ($_GET['register'] == 'error')) {
                ?>
                <p style="color: red;">Something Went Wrong to register new account. check it manually</p>
                <?php
            }
            ?>
            <form method="post" action="actions/register.php">
                <div class="box">
                    <h1>Register</h1>

                    <input type="text" name="name" placeholder="Type Your Name" required class="email"/>


                    <input type="email" name="email" placeholder="Type Your Email" required class="email"/>

                    <input type="password" name="password" placeholder="Type Your Login Password" required
                           class="email"/>

                    <input type="number" name="age" placeholder="Type Your Age" class="email"/>

                    <input type="submit" value="Sign Up" id="btn2" name="register_btn">

                </div> <!-- End Box -->

            </form>
        </div>


    </div>
    <!--page wraper-->

<?php
include "partials/footer.php";
include "partials/footer_bottom.php";

?>