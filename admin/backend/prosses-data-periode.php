<?php

require('../config/db.php');

//Menambahkan Kelas
if(isset($_POST['add-periode'])){
    global $mysqli;

    $NAMA_PERIODE = mysqli_real_escape_string($mysqli, $_POST['namaPeriode']);
    $TAHUN_PERIODE = mysqli_real_escape_string($mysqli, $_POST['TahunPeriode']);

    $QueryAddPeriode = "INSERT INTO tbl_periode(nama_periode, tahun_ajaran, created_by_tp) VALUES ('".$NAMA_PERIODE."','".$TAHUN_PERIODE."',1)";

    $ResultQueryAddPeriode = mysqli_query($mysqli, $QueryAddPeriode);

    if ($ResultQueryAddPeriode) {
        header("Location: ../pages/data-periode.php?success=true");
        exit();
    } else {
        echo "<script>alert('Gagal Menambahkan Data'); window.location.href = '../pages/data-Periode.php';</script> " . mysqli_error($mysqli);
    }
}

if(isset($_POST['edit-periode'])){
    global $mysqli;

    $ID = mysqli_real_escape_string($mysqli, $_POST['id_periode']);
    $NAMA_PERIODE = mysqli_real_escape_string($mysqli, $_POST['namaPeriode']);
    $TAHUN_PERIODE = mysqli_real_escape_string($mysqli, $_POST['tahunPeriode']);

    $QueryUpdatePeriode = "UPDATE tbl_periode SET 
                        nama_periode ='$NAMA_PERIODE', 
                        tahun_ajaran ='$TAHUN_PERIODE', 
                        updated_by_tp = '2',
                        updated_date_tp = NOW()
                        WHERE id_periode='$ID'";


    $ResultUpdatePeriode = mysqli_query($mysqli, $QueryUpdatePeriode);

    if ($ResultUpdatePeriode) {
        header("Location: ../pages/data-periode.php?edited=true");
        exit();
    } else {
        echo "<script>alert('Data Berhasil DI Hapus'); window.location.href = '../pages/data-periode.php';</script>" . mysqli_error($mysqli);
    }


}

//delete users
if(isset($_GET['id_periode'])){
    global $mysqli;
    
    mysqli_query($mysqli, "delete FROM tbl_periode WHERE id_periode='$_GET[id_periode]'");
    header("Location: ../pages/data-periode.php?deleted=true");
    exit();
}

?>