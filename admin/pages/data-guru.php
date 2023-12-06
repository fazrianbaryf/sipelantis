<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");

?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Guru</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Data Guru</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Table Guru</h5>
                            <!-- Vertically centered Modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#verticalycentered">
                                <i class="bi bi-person-add"></i>
                                Tambah Guru
                            </button>
                            <div class="modal fade" id="verticalycentered" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <i class="bi bi-person-add bi-lg pe-2"></i>
                                            <h5 class="modal-title">Tambah Guru</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row g-3" action="../backend/prosses-data-guru.php"
                                                method="post">
                                                <div class="col-12">
                                                    <label for="kodeGuru" class="form-label">Kode Guru</label>
                                                    <input type="text" class="form-control" id="kodeGuru"
                                                        name="kodeGuru">
                                                </div>
                                                <div class="col-12">
                                                    <label for="NIP" class="form-label">NIP</label>
                                                    <input type="text" class="form-control" id="NIP" name="NIP">
                                                </div>
                                                <div class="col-12">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="namaGuru">
                                                </div>
                                                <div class="col-12">
                                                    <label for="no_telp" class="form-label">No Telepon</label>
                                                    <input type="text" class="form-control" id="no_telp" name="no_telp">
                                                </div>
                                                <div class="col-12">
                                                    <label for="pengampuMapel" class="form-label">Pengampu
                                                        Mapel</label>
                                                    <input type="text" class="form-control" id="pengampuMapel"
                                                        name="pengampuMapel">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="jk" class="form-label">Jenis
                                                        Kelamin</label>
                                                    <select class="form-select" id="jk" required name="jk">
                                                        <option selected disabled value="">Choose...</option>
                                                        <option>Laki-Laki</option>
                                                        <option>Perempuan</option>
                                                    </select>
                                                </div>

                                                <button type="input" class="btn btn-primary" name="add-guru">
                                                    <i class="bi bi-person-add"></i>
                                                    Tambah Guru
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
                                        <th scope="col">Kode Guru</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">No Tlpn</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">pengampu Mapel</th>
                                        <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                require '../config/db.php';

                $guru = mysqli_query($mysqli,"SELECT * FROM tbl_m_guru");
                $no = 1;

                while($row = mysqli_fetch_assoc($guru)) {
            ?>
                                    <tr>
                                        <th scope="row"><?=$no++;?></th>
                                        <td><?=$row['kode_guru'];?></td>
                                        <td><?=$row['nip_guru'];?></td>
                                        <td><?=$row['nama_guru'];?></td>
                                        <td><?=$row['no_telp_guru'];?></td>
                                        <td><?=$row['jenis_kelamin'];?></td>
                                        <td><?=$row['pengampu_mapel'];?></td>

                                        <td class="text-center d-flex justify-content-center">
                                            <div>
                                                <!-- Modal Edit Guru -->
                                                <button class="btn btn-warning btn-sm bi bi-pencil-square  "
                                                    style="cursor: pointer;" data-bs-toggle="modal"
                                                    data-bs-target="#editmodal" title="Edit Guru"></button>

                                                <div class="modal fade" id="editmodal" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <i class="bi bi-person-gear pe-2"></i>
                                                                <h5 class="modal-title">Edit Guru</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="text-start modal-body">
                                                                <form class="row g-3" action="" method="post">

                                                                    <div class="col-12">
                                                                        <label for="kodeGuru" class="form-label">Kode
                                                                            Guru</label>
                                                                        <input type="text" class="form-control"
                                                                            id="kodeGuru" name="kodeGuru">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="NIP" class="form-label">NIP</label>
                                                                        <input type="text" class="form-control" id="NIP"
                                                                            name="NIP">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="nama"
                                                                            class="form-label">Nama</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nama" name="namaGuru">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="no_telp" class="form-label">No
                                                                            Telepon</label>
                                                                        <input type="text" class="form-control"
                                                                            id="no_telp" name="no_telp">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="pengampuMapel"
                                                                            class="form-label">Pengampu
                                                                            Mapel</label>
                                                                        <input type="text" class="form-control"
                                                                            id="pengampuMapel" name="pengampuMapel">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="jk" class="form-label">Jenis
                                                                            Kelamin</label>
                                                                        <select class="form-select" id="jk" required
                                                                            name="jk">
                                                                            <option selected disabled value="">Choose...
                                                                            </option>
                                                                            <option>Laki-Laki</option>
                                                                            <option>Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="bi bi-person-gear"></i>
                                                                        Edit Guru
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End Edit Modal-->
                                                <!-- Disabled Backdrop Modal -->
                                                <button class="btn btn-danger btn-sm bi bi-trash-fill"
                                                    style="cursor: pointer;" data-bs-toggle="modal"
                                                    data-bs-target="#delete-user" title="Delete"></button>

                                                <div class="modal fade-sm" id="delete-user" tabindex="-1"
                                                    data-bs-backdrop="false">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete Guru ?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="button"
                                                                    class="btn btn-primary">Delete</button>
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