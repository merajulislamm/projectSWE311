<?php
include "../config/config.php";

if (isset($_POST['login_btn'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $check_acc_sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $check_acc_qry = mysqli_query($conn, $check_acc_sql);
    if (mysqli_num_rows($check_acc_qry) > 0) {
        $user = mysqli_fetch_array($check_acc_qry);
        if ($user['status'] == 0) {
            header("Location: ../login.php?login=inactive");
            exit();
        }
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_age'] = $user['age'];
        $_SESSION['user_type'] = $user['role'];

        header("Location: ../index.php?login=success");
    } else {
        header("Location: ../login.php?login=error");
    }
}

?>