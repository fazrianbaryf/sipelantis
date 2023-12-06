<?php

require '../config/db.php';

if(isset($_POST['add-guru'])){
    global $mysqli;

    $NIP = mysqli_real_escape_string($mysqli, $_POST['NIP']);
    $K_GURU = mysqli_real_escape_string($mysqli, $_POST['kodeGuru']);
    $NAME = mysqli_real_escape_string($mysqli, $_POST['namaGuru']);
    $NO_TELP = mysqli_real_escape_string($mysqli, $_POST['no_telp']);
    $P_MAPEL = mysqli_real_escape_string($mysqli, $_POST['pengampuMapel']);
    $JK = mysqli_real_escape_string($mysqli, $_POST['jk']);

    $QueryAddGuru = "INSERT INTO tbl_m_guru(kode_guru, nip_guru, nama_guru, no_telp_guru, jenis_kelamin, pengampu_mapel, created_by_tmg) VALUES ('$NIP','$K_GURU','$NAME','$NO_TELP','$JK','$P_MAPEL', 1)";

    $ResultQueryAddGuru = mysqli_query($mysqli, $QueryAddGuru); 

    if ($ResultQueryAddGuru){
        echo "Data Guru Berhasil Di tambahkan"; 
    } else {
        echo "Gagal menambahkan User" . mysqli_error($mysqli);
    }

}
?>