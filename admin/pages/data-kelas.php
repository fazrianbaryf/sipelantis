<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");

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
                                            <div>
                                                <!-- Modal Edit Staff -->
                                                <button type="button" class="btn btn-warning btn-sm bi bi-pencil-square"
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
                                                <button type="button" class="btn btn-danger btn-sm bi bi-trash-fill"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#delete-user<?=$row['id_kelas'];?>">
                                                </button>

                                                <div class="modal fade-sm" id="delete-user<?=$row['id_kelas'];?>"
                                                    data-bs-backdrop="false">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete Users?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <a type="button"
                                                                    href="../backend/prosses-data-kelas.php?id_kelas=<?=$row['id_kelas'];?>"
                                                                    class="btn btn-primary">Delete</a>
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