<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");

session_start();

$allowed_roles = ['kepala_lab', 'staff_lab'];

if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $allowed_roles)) {
    echo '<script>window.location.href="dashboard.php";</script>';
    exit();
}

?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Kelas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Data Kelas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Table Kelas</h5>
                            <!-- Vertically centered Modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#verticalycentered">
                                <i class="bi bi-person-add"></i>
                                Tambah Kelas
                            </button>
                            <div class="modal fade" id="verticalycentered" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <i class="bi bi-person-add pe-2"></i>
                                            <h5 class="modal-title">Tambah Kelas</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row g-3" action="../backend/prosses-data-kelas.php"
                                                method="post">
                                                <div class="col-12">
                                                    <label for="kelas" class="form-label">Nama Kelas</label>
                                                    <input type="text" class="form-control" id="kelas" name="namaKelas">
                                                </div>
                                                <div class="col-12">
                                                    <label for="jumlah-siswa" class="form-label">Jumlah Siswa</label>
                                                    <input type="text" class="form-control" id="jumlah-siswa"
                                                        name="jumlahSiswa">
                                                </div>
                                                <button type="submit" class="btn btn-primary" name="add-kelas">
                                                    <i class="bi bi-person-add"></i>
                                                    Tambah Kelas
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Vertically centered Modal-->
                        </div>
                        <!-- Alert start -->
                        <!-- Alert Untuk Menambahkan -->
                        <?php
                        $isOperationSuccess = isset($_GET['success']) && $_GET['success'] === 'true';
                        $isDataEdited = isset($_GET['edited']) && $_GET['edited'] === 'true';
                        $isDataDeleted = isset($_GET['deleted']) && $_GET['deleted'] === 'true';
                        ?>
                        <?php if ($isOperationSuccess): ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <i class="bi bi-plus-circle me-1"></i>
                            Data Berhasil Ditambahkan!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            <script>
                            const url = new URL(window.location.href);
                            url.searchParams.delete('success');
                            window.history.replaceState({}, document.title, url.href);

                            setTimeout(function() {
                                document.querySelector('.alert-primary').style.display = 'none';
                            }, 2000);
                            </script>

                        </div>
                        <?php endif; ?>
                        <!-- End Alert Untuk Menambahkan -->
                        <!-- Alert Untuk Edit -->
                        <?php if ($isDataEdited): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-pencil-square me-1"></i>
                            Data Berhasil Diubah!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            <script>
                            const url = new URL(window.location.href);
                            url.searchParams.delete('edited');
                            window.history.replaceState({}, document.title, url.href);

                            setTimeout(function() {
                                document.querySelector('.alert-warning').style.display = 'none';
                            }, 2000);
                            </script>

                        </div>
                        <?php endif; ?>
                        <!-- End Alert Untuk Edit -->
                        <!-- Alert Untuk Delete -->
                        <?php if ($isDataDeleted): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-trash-fill me-1"></i>
                            Data Berhasil Dihapus!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            <script>
                            const url = new URL(window.location.href);
                            url.searchParams.delete('deleted');
                            window.history.replaceState({}, document.title, url.href);

                            setTimeout(function() {
                                document.querySelector('.alert-danger').style.display = 'none';
                            }, 2000);
                            </script>

                        </div>
                        <?php endif; ?>
                        <!-- End Alert Untuk Delete -->
                        <!-- ALert end -->
                        <!-- Bordered Table -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Kelas</th>
                                        <th scope="col">Jumlah Kelas</th>
                                        <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require '../config/db.php';

                                        $dataKelas = mysqli_query($mysqli,"SELECT * FROM tbl_m_kelas");
                                        $no = 1;

                                        while($row = mysqli_fetch_assoc($dataKelas)) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?=$no++;?></th>
                                        <td><?=$row['nama_kelas'];?></td>
                                        <td><?=$row['jumlah_siswa'];?></td>

                                        <td class="text-center d-flex justify-content-center">
                                            <div class="d-flex">
                                                <!-- Modal Edit Staff -->
                                                <button type="button"
                                                    class="btn btn-warning btn-sm bi bi-pencil-square ms-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editmodal<?=$row['id_kelas'];?>"
                                                    data-user-id="<?=$row['id_kelas'];?>">
                                                </button>


                                                <div class="modal fade" id="editmodal<?=$row['id_kelas'];?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <i class="bi bi-person-gear pe-2"></i>
                                                                <h5 class="modal-title">Edit Users</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="text-start modal-body">
                                                                <form class="row g-3"
                                                                    action="../backend/prosses-data-kelas.php"
                                                                    method="post">
                                                                    <input type="hidden" name="id_kelas"
                                                                        value="<?=$row['id_kelas'];?>">
                                                                    <div class="col-12">
                                                                        <label for="namaKelas" class="form-label">Nama
                                                                            Kelas</label>
                                                                        <input type="text" class="form-control"
                                                                            id="namaKelas"
                                                                            value="<?= $row['nama_kelas']; ?>"
                                                                            name="namaKelas">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="jumlahSiswa"
                                                                            class="form-label">Jumlah Siswa</label>
                                                                        <input type="text" class="form-control"
                                                                            id="jumlahSiswa"
                                                                            value="<?= $row['jumlah_siswa']; ?>"
                                                                            name="jumlahSiswa">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        name="edit-kelas">
                                                                        <i class="bi bi-person-add"></i>
                                                                        Edit Users
                                                                    </button>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End Edit Modal-->
                                                <!-- Disabled Backdrop Modal -->
                                                <button type="button"
                                                    class="btn btn-danger btn-sm bi bi-trash-fill ms-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#delete-user<?=$row['id_kelas'];?>">
                                                </button>

                                                <div class="modal fade-md" id="delete-user<?=$row['id_kelas'];?>"
                                                    data-bs-backdrop="false">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Data Kelas</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5 class="text-center">Apakah anda yakin akan
                                                                    menghapus
                                                                    data ini?<br>
                                                                    <span class="text-danger"><?=$row['nama_kelas'];?>
                                                                    </span>
                                                                </h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <a type="button"
                                                                    href="../backend/prosses-data-kelas.php?id_kelas=<?=$row['id_kelas'];?>"
                                                                    class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End Disabled Backdrop Modal-->
                                            </div>
                                        </td>
                                        <?php } ?>

                                </tbody>
                            </table>
                            <!-- End Bordered Table -->
                        </div>
                    </div>

                </div>
            </div>
    </section>

</main><!-- End #main -->
<?php

require_once("{$base_dir}pages{$ds}core{$ds}footer.php");

?>