<?php

require('../config/db.php');

//Menambahkan Kelas
if(isset($_POST['add-mapel'])){
    global $mysqli;

    $KODE_MAPEL = mysqli_real_escape_string($mysqli, $_POST['kodeMapel']);
    $NAMA_MAPEL = mysqli_real_escape_string($mysqli, $_POST['namaMapel']);
    $JURUSAN = mysqli_real_escape_string($mysqli, $_POST['namaJurusan']);
    $PERIODE = mysqli_real_escape_string($mysqli, $_POST['namaPeriode']);
    $GURU_PENGAMPU = mysqli_real_escape_string($mysqli, $_POST['guruPengampu']);

    $QueryAddMapel = "INSERT INTO tbl_m_mapel (kode_mapel, nama_mapel, jurusan, periode, guru_pengampu, created_by_tmm, created_date_tmm) 
                      VALUES ('$KODE_MAPEL', '$NAMA_MAPEL', '$JURUSAN', '$PERIODE', '$GURU_PENGAMPU', 1, NOW())";

    $ResultQueryAddMapel = mysqli_query($mysqli, $QueryAddMapel);

    if ($ResultQueryAddMapel) {
        echo "Tambah user berhasil.";
    } else {
        echo "Gagal menambah user: " . mysqli_error($mysqli);
    }
}

if(isset($_POST['edit-mapel'])){
    global $mysqli;

    $ID = mysqli_real_escape_string($mysqli, $_POST['id_mapel']);
    $KODE_MAPEL = mysqli_real_escape_string($mysqli, $_POST['kodeMapel']);
    $NAMA_MAPEL = mysqli_real_escape_string($mysqli, $_POST['namaMapel']);
    $JURUSAN = mysqli_real_escape_string($mysqli, $_POST['namaJurusan']);
    $PERIODE = mysqli_real_escape_string($mysqli, $_POST['namaPeriode']);
    $GURU_PENGAMPU = mysqli_real_escape_string($mysqli, $_POST['guruPengampu']);

    $QueryUpdateRuangan = $QueryUpdateMapel = "UPDATE tbl_m_mapel SET 
                            kode_mapel = '$KODE_MAPEL',
                            nama_mapel = '$NAMA_MAPEL',
                            jurusan = '$JURUSAN',
                            periode = '$PERIODE',
                            guru_pengampu = '$GURU_PENGAMPU',
                            updated_by_tmm = '2',
                            updated_date_tmm = NOW()
                            WHERE id_mapel = '$ID'";

    


    $ResultUpdateMapel = mysqli_query($mysqli, $QueryUpdateMapel);

    if ($ResultUpdateMapel) {
        echo "Edit pengguna berhasil.";
    } else {
        echo "Gagal mengedit pengguna: " . mysqli_error($mysqli);
    }


}

//delete users
if(isset($_GET['id_mapel'])){
    global $mysqli;
    
    mysqli_query($mysqli, "delete FROM tbl_m_mapel WHERE id_mapel='$_GET[id_mapel]'");
    echo "Data Sudah di hapus";
}

?>