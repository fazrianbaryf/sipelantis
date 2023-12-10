<?php
session_start();

require '../config/db.php';

if(isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = mysqli_query($mysqli,"SELECT * FROM tbl_m_user WHERE email_m_user = '$email'");
    if(mysqli_num_rows($user) > 0) {
        $data = mysqli_fetch_assoc($user);

        if(password_verify($password, $data['password_m_user'])) {

            // Otorisasi
            $_SESSION['name'] = $data['name_m_user'];
            $_SESSION['role'] = $data['role_m_user'];

            if ($_SESSION['role'] == 'super_admin') {
                // Hanya super admin yang bisa mengakses sidebar "Data Users"
                header('Location:../pages/dashboard');
            } else {
                // Redirect ke dashboard biasa untuk peran lain
                header('Location:../pages/dashboard');
            }

        } else {
            header('Location:../login?error=1');
            die;
        }

    } else {
        header('Location:../login?error=invalid_credentials');
        die;
    }
}

mysqli_close($mysqli);
?>