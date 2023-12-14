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
        <h1>Data Periode</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Data Periode </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Table Periode</h5>
                            <!-- Vertically centered Modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#verticalycentered">
                                <i class="bi bi-building-fill-add"></i>
                                Tambah Periode
                            </button>
                            <div class="modal fade" id="verticalycentered" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <i class="bi bi-building-fill-add pe-2"></i>
                                            <h5 class="modal-title">Tambah Periode</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row g-3" action="../backend/prosses-data-periode.php"
                                                method="post">
                                                <div class="col-12">
                                                    <label for="namaPeriode" class="form-label">Nama Periode</label>
                                                    <input type="text" class="form-control" name="namaPeriode">
                                                </div>
                                                <div class="col-12">
                                                    <label for="TahunPeriode" class="form-label">Tahun
                                                        Periode</label>
                                                    <input type="number" class="form-control" name="TahunPeriode"
                                                        placeholder="20231">
                                                </div>
                                                <button type="submit" class="btn btn-primary" name="add-periode">
                                                    <i class="bi bi-building-fill-add"></i>
                                                    Tambah Periode
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
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Periode</th>
                                    <th scope="col">Tahun Ajaran</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require '../config/db.php';

                                    $periode = mysqli_query($mysqli,"SELECT * FROM tbl_periode");
                                    $no = 1;

                                    while($row = mysqli_fetch_assoc($periode)) {
                                ?>
                                <tr>
                                    <th scope="row"><?=$no++;?></th>
                                    <td><?=$row['nama_periode'];?></td>
                                    <td><?=$row['tahun_ajaran'];?></td>
                                    <td class="text-center d-flex justify-content-center">
                                        <div class="d-flex">
                                            <!-- Modal Edit Guru -->
                                            <button class="btn btn-warning btn-sm bi bi-pencil-square ms-1"
                                                style="cursor: pointer;" data-bs-toggle="modal"
                                                data-bs-target="#edit-periode<?=$row['id_periode'];?>"
                                                title="Edit Guru"></button>
                                            <div class="modal fade" id="edit-periode<?=$row['id_periode'];?>"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <i class="bi bi-building-fill-gear pe-2"></i>
                                                            <h5 class="modal-title">Edit periode</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="row g-3"
                                                                action="../backend/prosses-data-periode.php"
                                                                method="post">
                                                                <input type="hidden" value="<?=$row['id_periode'];?>"
                                                                    name="id_periode">
                                                                <div class="col-12">
                                                                    <label for="namaperiode" class="form-label">Nama
                                                                        periode</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?=$row['nama_periode'];?>"
                                                                        name="namaPeriode">
                                                                </div>
                                                                <div class="col-12">
                                                                    <label for="Tahunperiode" class="form-label">Tahun
                                                                        periode</label>
                                                                    <input type="number" class="form-control"
                                                                        value="<?=$row['tahun_ajaran'];?>"
                                                                        name="tahunPeriode">
                                                                </div>
                                                                <button type="submit" class="btn btn-primary"
                                                                    name="edit-periode">
                                                                    <i class="bi bi-building-fill-add"></i>
                                                                    Tambah periode
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- End Edit Modal-->
                                            <!-- Disabled Backdrop Modal -->
                                            <button type="button" class="btn btn-danger btn-sm bi bi-trash-fill ms-1"
                                                data-bs-toggle="modal"
                                                data-bs-target="#delete-user<?=$row['id_periode'];?>">
                                            </button>

                                            <div class="modal fade-md" id="delete-user<?=$row['id_periode'];?>"
                                                data-bs-backdrop="false">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Data Periode Lab</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="text-center">Apakah anda yakin akan
                                                                menghapus
                                                                data ini?<br>
                                                                <span class="text-danger"><?=$row['nama_periode'];?>
                                                                </span>
                                                            </h5>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <a type="button"
                                                                    href="../backend/prosses-data-periode.php?id_periode=<?=$row['id_periode'];?>"
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