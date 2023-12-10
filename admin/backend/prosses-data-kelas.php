<?php

require('../config/db.php');

//Menambahkan Kelas
if(isset($_POST['add-kelas'])){
    global $mysqli;

    $NAMA_KELAS = mysqli_real_escape_string($mysqli, $_POST['namaKelas']);
    $J_KELAS = mysqli_real_escape_string($mysqli, $_POST['jumlahSiswa']);

    $QueryAddKelas = "INSERT INTO  tbl_m_kelas(nama_kelas, jumlah_siswa, created_by_tmk) VALUES ('".$NAMA_KELAS."','".$J_KELAS."',1)";

    $ResultQueryAddKelas = mysqli_query($mysqli, $QueryAddKelas);

    if ($ResultQueryAddKelas) {
        header("Location: ../pages/data-kelas.php?success=true");
        exit();
    } else {
        echo "Gagal menambah user: " . mysqli_error($mysqli);
    }
}

if(isset($_POST['edit-kelas'])){
    global $mysqli;

    $ID = mysqli_real_escape_string($mysqli, $_POST['id_kelas']);
    $NAMA_KELAS = mysqli_real_escape_string($mysqli, $_POST['namaKelas']);
    $J_KELAS = mysqli_real_escape_string($mysqli, $_POST['jumlahSiswa']);

    $QueryUpdateKelas = "UPDATE tbl_m_kelas SET 
                        nama_kelas ='$NAMA_KELAS', 
                        jumlah_siswa ='$J_KELAS', 
                        updated_date_tmk=NOW()
                        WHERE id_kelas='$ID'";


    $ResultUpdateKelas = mysqli_query($mysqli, $QueryUpdateKelas);

    if ($ResultUpdateKelas) {
        header("Location: ../pages/data-kelas.php?edited=true");
        exit();
    } else {
        echo "Gagal mengedit pengguna: " . mysqli_error($mysqli);
    }


}

//delete users
if(isset($_GET['id_kelas'])){
    global $mysqli;
    
    mysqli_query($mysqli, "delete FROM tbl_m_kelas WHERE id_kelas='$_GET[id_kelas]'");
    header("Location: ../pages/data-kelas.php?deleted=true");
        exit();
}

?>