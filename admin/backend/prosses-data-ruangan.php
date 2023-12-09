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
        header("Location: ../pages/data-ruangan.php?success=true");
        exit();
    } else {
        echo "<script>alert('Gagal Menambahkan Data'); window.location.href = '../pages/data-ruangan.php';</script> " . mysqli_error($mysqli);
    }
}

if(isset($_POST['edit-ruangan'])){
    global $mysqli;

    $ID = mysqli_real_escape_string($mysqli, $_POST['id_ruangan']);
    $NAMA_RUANGAN = mysqli_real_escape_string($mysqli, $_POST['namaRuangan']);
    $K_LAB = mysqli_real_escape_string($mysqli, $_POST['kapasitasRuangan']);

    $QueryUpdateRuangan = "UPDATE tbl_m_ruangan SET 
                        nama_ruangan ='$NAMA_RUANGAN', 
                        kapasitas_ruangan ='$K_LAB', 
                        updated_by_tmr = '2',
                        updated_date_tmr = NOW()
                        WHERE id_ruangan='$ID'";


    $ResultUpdateRuangan = mysqli_query($mysqli, $QueryUpdateRuangan);

    if ($ResultUpdateRuangan) {
        header("Location: ../pages/data-ruangan.php?edited=true");
        exit();
    } else {
        echo "<script>alert('Data Berhasil DI Hapus'); window.location.href = '../pages/data-ruangan.php';</script>" . mysqli_error($mysqli);
    }


}

//delete users
if(isset($_GET['id_ruangan'])){
    global $mysqli;
    
    mysqli_query($mysqli, "delete FROM tbl_m_ruangan WHERE id_ruangan='$_GET[id_ruangan]'");
    header("Location: ../pages/data-ruangan.php?deleted=true");
    exit();
}

?>