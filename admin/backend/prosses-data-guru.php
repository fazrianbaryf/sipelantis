<?php

require '../config/db.php';

if(isset($_POST['add-guru'])){
    global $mysqli;

    $K_GURU = mysqli_real_escape_string($mysqli, $_POST['kodeGuru']);
    $NIP = mysqli_real_escape_string($mysqli, $_POST['NIP']);
    $NAME = mysqli_real_escape_string($mysqli, $_POST['namaGuru']);
    $NO_TELP = mysqli_real_escape_string($mysqli, $_POST['no_telp']);
    $P_MAPEL = mysqli_real_escape_string($mysqli, $_POST['pengampuMapel']);
    $JK = mysqli_real_escape_string($mysqli, $_POST['jk']);

    $QueryAddGuru = "INSERT INTO tbl_m_guru(kode_guru, nip_guru, nama_guru, no_telp_guru, pengampu_mapel, jenis_kelamin, create_date_tmg, create_by_tmg) 
    VALUES ('".$K_GURU."','".$NIP."','".$NAME."','".$NO_TELP."', '".$P_MAPEL."', '".$JK."', NOW(), 1)";

    
    $ResultQueryAddGuru = mysqli_query($mysqli, $QueryAddGuru);

    if ($ResultQueryAddGuru) {
        echo "Tambah user berhasil.";
    } else {
        echo "Gagal menambah user: " . mysqli_error($mysqli);
    }

}
?>