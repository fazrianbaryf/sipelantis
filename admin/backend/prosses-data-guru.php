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

if (isset($_POST['edit-guru'])) {
    global $mysqli;

    $ID = mysqli_real_escape_string($mysqli, $_POST['id_guru']);
    $KODE_GURU = mysqli_real_escape_string($mysqli, $_POST['kodeGuru']);
    $NIP = mysqli_real_escape_string($mysqli, $_POST['NIP']);
    $NAMA_GURU = mysqli_real_escape_string($mysqli, $_POST['namaGuru']);
    $TLP_GURU = mysqli_real_escape_string($mysqli, $_POST['no_telp']);
    $P_MAPEL = mysqli_real_escape_string($mysqli, $_POST['pengampuMapel']);
    $JK = mysqli_real_escape_string($mysqli, $_POST['jk']);

    $queryUpdateGuru = "UPDATE tbl_m_guru SET 
                            kode_guru='$KODE_GURU', 
                            nip_guru='$NIP', 
                            nama_guru ='$NAMA_GURU',
                            no_telp_guru ='$TLP_GURU',
                            pengampu_mapel ='$P_MAPEL',
                            jenis_kelamin ='$JK',
                            updated_date_tmg=NOW()
                            WHERE id_guru='$ID'";
    

    $resultUpdateGuru = mysqli_query($mysqli, $queryUpdateGuru);

    if ($resultUpdateGuru) {
        echo "Edit pengguna berhasil.";
    } else {
        echo "Gagal mengedit pengguna: " . mysqli_error($mysqli);
    }

}

//delete users
if(isset($_GET['id_guru'])){
    global $mysqli;
    
    mysqli_query($mysqli, "delete FROM tbl_m_guru WHERE id_guru='$_GET[id_guru]'");
    echo "Data Sudah di hapus";
}
?>