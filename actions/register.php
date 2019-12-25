<?php
include "../config/config.php";

if (isset($_POST['register_btn'])) {
    $email = trim($_POST['email']);
    $name = trim($_POST['name']);
    $password = $_POST['password'];
    $age = trim($_POST['age']);
    $role = "user";

    $check_email_sql = "SELECT * FROM users WHERE email='$email'";
    $check_email_qry = mysqli_query($conn, $check_email_sql);
    if (mysqli_num_rows($check_email_qry) > 0) {
        header("Location: ../register.php?email=duplicate");
    } else {

        $ins_sql = "INSERT INTO users (name, email, age, password, role) VALUES ('$name', '$email', '$age', '$password', '$role')";
        if (mysqli_query($conn, $ins_sql)) {
            header("Location: ../login.php?register=success");
        } else{
            header("Location: ../register.php?register=error");
        }
    }
}

?>