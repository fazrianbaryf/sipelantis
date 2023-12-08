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
    $PASSWORD = password_hash($PASSWORD,PASSWORD_DEFAULT);
    
    $QueryAddUser = "INSERT INTO tbl_m_user(name_m_user, email_m_user, password_m_user, role_m_user, created_by_m_user) VALUES ('".$NAME."','".$EMAIL."','".$PASSWORD."','".$ROLE."',1)";

    $ResultQueryAddUser = mysqli_query($mysqli, $QueryAddUser);

    if ($ResultQueryAddUser) {
        echo "Tambah user berhasil.";
    } else {
        echo "Gagal menambah user: " . mysqli_error($mysqli);
    }

}

// Edit Users
if (isset($_POST['edit-users'])) {
    global $mysqli;

    $ID = mysqli_real_escape_string($mysqli, $_POST['id_m_user']);
    $NAME = mysqli_real_escape_string($mysqli, $_POST['name']);
    $EMAIL = mysqli_real_escape_string($mysqli, $_POST['email']);
    $PASSWORD = mysqli_real_escape_string($mysqli, $_POST['password']);
    $CONFIRM_PW = mysqli_real_escape_string($mysqli, $_POST['ConfirmPassword']);
    $ROLE = mysqli_real_escape_string($mysqli, $_POST['role']);

    // Dapatkan alamat email saat ini dari database untuk pengguna yang diedit
    $currentEmailQuery = mysqli_query($mysqli, "SELECT email_m_user FROM tbl_m_user WHERE id_m_user = '$ID'");
    $currentEmailRow = mysqli_fetch_assoc($currentEmailQuery);
    $currentEmail = $currentEmailRow['email_m_user'];

    if ($CONFIRM_PW != $PASSWORD) {
        echo "Password tidak sesuai dengan konfirmasi password";
        die;
    }

    // Periksa apakah pengguna mengubah alamat email dan alamat email baru sudah digunakan
    if ($EMAIL != $currentEmail) {
        $usedEmailQuery = mysqli_query($mysqli, "SELECT email_m_user FROM tbl_m_user WHERE email_m_user = '$EMAIL'");
        if (mysqli_num_rows($usedEmailQuery) > 0) {
            echo "Alamat email sudah digunakan oleh pengguna lain.";
            die;
        }
    }

    $PASSWORD = password_hash($PASSWORD,PASSWORD_DEFAULT);

    // Tambahkan logika untuk memeriksa apakah password baru diisi atau tidak
    if (!empty($PASSWORD)) {
        $queryUpdateUser = "UPDATE tbl_m_user SET 
                            name_m_user='$NAME', 
                            email_m_user='$EMAIL', 
                            password_m_user='$PASSWORD', 
                            role_m_user='$ROLE',
                            updated_date_m_user=NOW()
                            WHERE id_m_user='$ID'";
    } else {
        // Jika password tidak diisi, biarkan password tetap menggunakan yang lama
        $queryUpdateUser = "UPDATE tbl_m_user SET 
                            name_m_user='$NAME', 
                            email_m_user='$EMAIL', 
                            role_m_user='$ROLE',
                            updated_date_m_user=NOW()
                            WHERE id_m_user='$ID'";
    }

    $resultUpdateUser = mysqli_query($mysqli, $queryUpdateUser);

    if ($resultUpdateUser) {
        echo "Edit pengguna berhasil.";
    } else {
        echo "Gagal mengedit pengguna: " . mysqli_error($mysqli);
    }
}



//delete users
if(isset($_GET['id_m_user'])){
    global $mysqli;
    
    mysqli_query($mysqli, "delete FROM tbl_m_user WHERE id_m_user='$_GET[id_m_user]'");
    echo "Data Sudah di hapus";
}

?>