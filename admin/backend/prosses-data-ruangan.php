<?php

require('../config/db.php');

//Menambahkan Kelas
if(isset($_POST['add-ruangan'])){
    global $mysqli;

    $NAMA_RUANGAN = mysqli_real_escape_string($mysqli, $_POST['namaRuangan']);
    $K_LAB = mysqli_real_escape_string($mysqli, $_POST['kapasitasRuangan']);

    $QueryAddRuangan = "INSERT INTO tbl_m_ruangan(nama_ruangan, kapasitas_ruangan, created_by_tmr) VALUES ('".$NAMA_RUANGAN."','".$K_LAB."',1)";

    $ResultQueryAddRuangan = mysqli_query($mysqli, $QueryAddRuangan);

    if ($ResultQueryAddRuangan) {
        echo "<script>alert('Data Berhasil Di Tambahkan'); window.location.href = '../pages/data-ruangan.php';</script>";
    } else {
        echo "<script>alert('Gagal Menambahkan Data'); window.location.href = '../pages/data-ruangan.php';</script> " . mysqli_error($mysqli);
    }
}

if(isset($_POST['edit-ruangan'])){
    global $mysqli;

    $ID = mysqli_real_escape_string($mysqli, $_POST['id_ruangan']);
    $NAMA_RUANGAN = mysqli_real_escape_string($mysqli, $_POST['namaRuangan']);
    $K_LAB = mysqli_real_escape_string($mysqli, $_POST['kapasitasLab']);

    $QueryUpdateRuangan = "UPDATE tbl_m_ruangan SET 
                        nama_ruangan ='$NAMA_RUANGAN', 
                        kapasitas_ruangan ='$K_LAB', 
                        updated_by_tmr=NOW()
                        WHERE id_ruangan='$ID'";


    $ResultUpdateRuangan = mysqli_query($mysqli, $QueryUpdateRuangan);

    if ($ResultUpdateRuangan) {
        echo "<script>alert('Data Berhasil Di edit'); window.location.href = '../pages/data-ruangan.php';</script>";
    } else {
        echo "<script>alert('Data Berhasil DI Hapus'); window.location.href = '../pages/data-ruangan.php';</script>" . mysqli_error($mysqli);
    }


}

//delete users
if(isset($_GET['id_ruangan'])){
    global $mysqli;
    
    mysqli_query($mysqli, "delete FROM tbl_m_ruangan WHERE id_ruangan='$_GET[id_ruangan]'");
    echo "<script>alert('Data Sudah di hapus'); window.location.href = '../pages/data-ruangan.php';</script>";
}

?>