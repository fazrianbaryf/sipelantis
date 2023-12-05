<?php
require '../config/db.php';

//Menambahkan Users pada data staff
if(isset($_POST['add-users'])){
    global $mysqli;

    $NAME = mysqli_real_escape_string($mysqli, $_POST['name']);
    $EMAIL = mysqli_real_escape_string($mysqli, $_POST['email']);
    $PASSWORD = mysqli_real_escape_string($mysqli, $_POST['password']);
    $CONFIRM_PW = mysqli_real_escape_string($mysqli, $_POST['confirm_pw']);
    $ROLE = mysqli_real_escape_string($mysqli, $_POST['role']);

    if($CONFIRM_PW != $PASSWORD) {
        echo "password tidak sesuai dengan konfirmasi password";
        die;
    }

    $usedEmail = mysqli_query($mysqli,"SELECT email_m_user FROM tbl_m_user WHERE email_m_user = '$EMAIL'");
    if(mysqli_num_rows($usedEmail) > 0) {
        echo "email sudah digunakan";
        die;
    }
    
    $QueryAddUser = "INSERT INTO tbl_m_user(name_m_user, email_m_user, password_m_user, role_m_user, created_by_m_user) VALUES ('".$NAME."','".$EMAIL."','".$PASSWORD."','".$ROLE."',1)";

    $ResultQueryAddUser = mysqli_query($mysqli, $QueryAddUser);

    // Tambahkan logika lainnya jika diperlukan, seperti menampilkan pesan sukses atau redirect ke halaman tertentu
    if ($ResultQueryAddUser) {
        echo "Tambah user berhasil.";
    } else {
        echo "Gagal menambah user: " . mysqli_error($mysqli);
    }

}

if(isset($_POST['edit-users'])) {
    global $mysqli;

    $ID = mysqli_real_escape_string($mysqli, $_POST['id_m_user']);
    $NAME = mysqli_real_escape_string($mysqli, $_POST['tname']);
    $EMAIL = mysqli_real_escape_string($mysqli, $_POST['temail']);
    $PASSWORD = mysqli_real_escape_string($mysqli, $_POST['tpassword']);
    $CONFIRM_PW = mysqli_real_escape_string($mysqli, $_POST['tConfirmPassword']);
    $ROLE = mysqli_real_escape_string($mysqli, $_POST['trole']);

    if($CONFIRM_PW != $PASSWORD) {
        echo "password tidak sesuai dengan konfirmasi password";
        die;
    }

    $usedEmail = mysqli_query($mysqli,"SELECT email_m_user FROM tbl_m_user WHERE email_m_user = '$EMAIL'");
    if(mysqli_num_rows($usedEmail) > 0) {
        echo "email sudah digunakan";
        die;
    }

    $queryUpdateUser = "UPDATE tbl_m_user SET 
                        name_m_user='$NAME', 
                        email_m_user='$EMAIL', 
                        password_m_user='$PASSWORD', 
                        role_m_user='$ROLE' 
                        WHERE id_m_user='$ID'";

    $resultUpdateUser = mysqli_query($mysqli, $queryUpdateUser);

    if ($resultUpdateUser) {
        echo "Edit user berhasil.";
    } else {
        echo "Gagal mengedit user: " . mysqli_error($mysqli);
    }
}

//delete users
if(isset($_GET['id_m_user'])){
    global $mysqli;
    
    mysqli_query($mysqli, "delete FROM tbl_m_user WHERE id_m_user='$_GET[id_m_user]'");
    echo "Data Sudah di hapus";
}

?>