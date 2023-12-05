<?php

require '../config/db.php';

if(isset($_POST['add-guru'])){
    global $mysqli;

    $NIP = mysqli_real_escape_string($mysqli, $_POST['NIP']);
    $NAME = mysqli_real_escape_string($mysqli, $_POST['namaGuru']);
    $NO_TELP = mysqli_real_escape_string($mysqli, $_POST['no_telp']);
    $P_MAPEL = mysqli_real_escape_string($mysqli, $_POST['pengampuMapel']);
    $JK = mysqli_real_escape_string($mysqli, $_POST['jk']);

    $QueryAddGuru = "INSERT INTO tbl_m_guru(nip_guru, nama_guru, "



?>