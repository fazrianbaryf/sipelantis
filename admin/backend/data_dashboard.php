<?php
// backend/data_dashboard.php

// Koneksi ke database
include __DIR__ . '/../config/db.php';

// Query untuk mengambil data guru dan jumlahnya
$queryGuru = "SELECT COUNT(*) AS total_guru FROM tbl_m_guru";
$resultGuru = mysqli_query($mysqli, $queryGuru);

// Check for errors and fetch the data
if ($resultGuru) {
    $dataGuru = mysqli_fetch_assoc($resultGuru);
    $totalGuru = $dataGuru['total_guru']; // Get the total number of teachers
} else {
    // Handle errors
    $totalGuru = 0;
}

// Query untuk mengambil data ruangan dan jumlahnya
$queryRuangan = "SELECT COUNT(*) AS total_ruangan FROM tbl_m_ruangan";
$resultRuangan = mysqli_query($mysqli, $queryRuangan);

// Check for errors and fetch the data
if ($resultRuangan) {
    $dataRuangan = mysqli_fetch_assoc($resultRuangan);
    $totalRuangan = $dataRuangan['total_ruangan']; // Get the total number of rooms
} else {
    // Handle errors
    $totalRuangan = 0;
}

// Query untuk mengambil data kelas dan jumlahnya
$queryKelas = "SELECT COUNT(*) AS total_kelas FROM tbl_m_kelas";
$resultKelas = mysqli_query($mysqli, $queryKelas);

// Check for errors and fetch the data
if ($resultKelas) {
    $dataKelas = mysqli_fetch_assoc($resultKelas);
    $totalKelas = $dataKelas['total_kelas']; // Get the total number of classes
} else {
    // Handle errors
    $totalKelas = 0;
}

// Query untuk mengambil data mapel dan jumlahnya
$queryMapel = "SELECT COUNT(*) AS total_mapel FROM tbl_m_mapel";
$resultMapel = mysqli_query($mysqli, $queryMapel);

// Check for errors and fetch the data
if ($resultMapel) {
    $dataMapel = mysqli_fetch_assoc($resultMapel);
    $totalMapel = $dataMapel['total_mapel']; // Get the total number of subjects
} else {
    // Handle errors
    $totalMapel = 0;
}

?>