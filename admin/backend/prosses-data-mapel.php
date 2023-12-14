<?php

require('../config/db.php');

//Menambahkan Kelas
if(isset($_POST['add-mapel'])){
    global $mysqli;

    $KODE_MAPEL = mysqli_real_escape_string($mysqli, $_POST['kodeMapel']);
    $NAMA_MAPEL = mysqli_real_escape_string($mysqli, $_POST['namaMapel']);
    $JURUSAN = mysqli_real_escape_string($mysqli, $_POST['namaJurusan']);
    $JM_MULAI = mysqli_real_escape_string($mysqli, $_POST['jamMapelMulai']);
    $JM_SELESAI = mysqli_real_escape_string($mysqli, $_POST['jamMapelSelesai']);
    // $PERIODE = mysqli_real_escape_string($mysqli, $_POST['namaPeriode']);
    $GURU_PENGAMPU = mysqli_real_escape_string($mysqli, $_POST['guruPengampu']);

    $QueryAddMapel = "INSERT INTO tbl_m_mapel (kode_mapel, nama_mapel, jurusan, jam_mulai, jam_selesai, guru_pengampu, created_by_tmm, created_date_tmm) 
                    VALUES ('$KODE_MAPEL', '$NAMA_MAPEL', '$JURUSAN', '$JM_MULAI', '$JM_SELESAI',
                    (SELECT id_guru FROM tbl_m_guru WHERE nama_guru = '$GURU_PENGAMPU'), 1, NOW())";


    $ResultQueryAddMapel = mysqli_query($mysqli, $QueryAddMapel);

    if ($ResultQueryAddMapel) {
        header("Location: ../pages/data-mapel?success=true");
        exit();
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
    // $PERIODE = mysqli_real_escape_string($mysqli, $_POST['namaPeriode']);
    $JM_MULAI = mysqli_real_escape_string($mysqli, $_POST['jamMapelMulai']);
    $JM_SELESAI = mysqli_real_escape_string($mysqli, $_POST['jamMapelSelesai']);
    $GURU_PENGAMPU = mysqli_real_escape_string($mysqli, $_POST['guruPengampu']);

    $QueryUpdateMapel = "UPDATE tbl_m_mapel SET 
                            kode_mapel = '$KODE_MAPEL',
                            nama_mapel = '$NAMA_MAPEL',
                            jurusan = '$JURUSAN',
                            jam_mulai = '$JM_MULAI',
                            jam_selesai = '$JM_SELESAI',
                            guru_pengampu = (SELECT id_guru FROM tbl_m_guru WHERE nama_guru = '$GURU_PENGAMPU'),
                            updated_by_tmm = '2',
                            updated_date_tmm = NOW()
                            WHERE id_mapel = '$ID'";

    


    $ResultUpdateMapel = mysqli_query($mysqli, $QueryUpdateMapel);

    if ($ResultUpdateMapel) {
        header("Location: ../pages/data-mapel?success=edited");
        exit();
    } else {
        echo "Gagal mengedit pengguna: " . mysqli_error($mysqli);
    }


}

//delete users
if(isset($_GET['id_mapel'])){
    global $mysqli;
    
    mysqli_query($mysqli, "delete FROM tbl_m_mapel WHERE id_mapel='$_GET[id_mapel]'");
    header("Location: ../pages/data-mapel?success=deleted");
        exit();
}

?>