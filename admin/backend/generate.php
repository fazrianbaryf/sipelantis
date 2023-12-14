<?php
// Pemrosesan penjadwalan otomatis

// Koneksi ke database
require '../config/db.php';

// Ambil data mata pelajaran, guru, dan ruangan dari database
$mapelQuery = mysqli_query($mysqli, "SELECT * FROM tbl_m_mapel");
$guruQuery = mysqli_query($mysqli, "SELECT * FROM tbl_m_guru");
$ruanganQuery = mysqli_query($mysqli, "SELECT * FROM tbl_m_ruangan");

$mapelOptions = [];
$guruOptions = [];
$ruanganOptions = [];

while ($mapelRow = mysqli_fetch_assoc($mapelQuery)) {
    $mapelOptions[] = $mapelRow;
}

while ($guruRow = mysqli_fetch_assoc($guruQuery)) {
    $guruOptions[] = $guruRow;
}

while ($ruanganRow = mysqli_fetch_assoc($ruanganQuery)) {
    $ruanganOptions[] = $ruanganRow;
}

// Algoritma penjadwalan (contoh greedy)
$jadwal = [];

foreach ($mapelOptions as $mapel) {
    $guru = $guruOptions[array_rand($guruOptions)];
    $ruangan = $ruanganOptions[array_rand($ruanganOptions)];

    $jadwal[] = [
        'mapel_id' => $mapel['id_mapel'],
        'guru_id' => $guru['id_guru'],
        'ruangan_id' => $ruangan['id_ruangan'],
        'jam_mulai' => '07:00', // Sesuaikan dengan kebutuhan
        'jam_selesai' => '08:00', // Sesuaikan dengan kebutuhan
    ];
}

// Update database dengan jadwal baru (contoh)
foreach ($jadwal as $item) {
    $query = "INSERT INTO tbl_jadwal (mapel_id, guru_id, ruangan_id, jam_mulai, jam_selesai) VALUES 
            ('{$item['mapel_id']}', '{$item['guru_id']}', '{$item['ruangan_id']}', '{$item['jam_mulai']}', '{$item['jam_selesai']}')";
    mysqli_query($mysqli, $query);
}

// Tampilkan jadwal (contoh)
echo "<h1>Jadwal Terbuat</h1>";
echo "<ul>";
foreach ($jadwal as $item) {
    echo "<li>{$item['jam_mulai']} - {$item['jam_selesai']}: Mapel {$item['mapel_id']}, Guru {$item['guru_id']}, Ruangan {$item['ruangan_id']}</li>";
}
echo "</ul>";

// Tutup koneksi ke database
mysqli_close($mysqli);
?>