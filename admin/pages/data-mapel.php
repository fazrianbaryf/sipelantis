<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");

?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Mata Pelajaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Data Mata Pelajaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Table Mata Pelajaran</h5>
                            <!-- Vertically centered Modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#verticalycentered">
                                <i class="bi bi-journal-plus"></i>
                                Tambah Mata Pelajaran
                            </button>
                            <div class="modal fade" id="verticalycentered" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <i class="bi bi-journal-plus pe-2"></i>
                                            <h5 class="modal-title">Tambah Mata Pelajaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row g-3" action="../backend/prosses-data-mapel.php"
                                                method="post">
                                                <div class="col-12">
                                                    <label for="kodeMapel" class="form-label">Kode Mapel</label>
                                                    <input type="text" class="form-control" name="kodeMapel">
                                                </div>
                                                <div class="col-12">
                                                    <label for="namaMapel" class="form-label">Nama Mata
                                                        Pelajaran</label>
                                                    <input type="text" class="form-control" name="namaMapel">
                                                </div>
                                                <div class="col-12">
                                                    <label for="namaJurusan" class="form-label">Jurusan</label>
                                                    <input type="text" class="form-control" name="namaJurusan">
                                                </div>

                                                <div class="col-12">
                                                    <label for="namaPeriode" class="form-label">Periode</label>
                                                    <input type="text" class="form-control" name="namaPeriode">
                                                </div>
                                                <div class="col-md-12">
                                                    <?php
                                                require '../config/db.php';

                                                $guruQuery = mysqli_query($mysqli, "SELECT * FROM tbl_m_guru");
                                                $guruOptions = array();

                                                    while ($guruRow = mysqli_fetch_assoc($guruQuery)) {
                                                        $guruOptions[] = $guruRow['nama_guru'];
                                                        }

                                                    ?>
                                                    <label for="guruPengampu" class="form-label">Guru
                                                        Pengampu</label>
                                                    <select class="form-select" id="guruPengampu" required
                                                        name="guruPengampu">
                                                        <option value="" disabled selected>Pilih Guru Pengampu...
                                                        </option>
                                                        <?php foreach ($guruOptions as $guruOption) { ?>
                                                        <option value="<?= $guruOption; ?>">
                                                            <?= $guruOption; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary" name="add-mapel">
                                                    <i class="bi bi-journal-plus"></i>
                                                    Tambah Mata Pelajaran
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Vertically centered Modal-->
                        </div>
                        <!-- Bordered Table -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Mapel</th>
                                    <th scope="col">Nama Mata Pelajaran</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Periode</th>
                                    <th scope="col">Guru Pengampu</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require '../config/db.php';

                                    $mapel = mysqli_query($mysqli,"SELECT * FROM tbl_m_mapel");
                                    $no = 1;

                                    while($row = mysqli_fetch_assoc($mapel)) {
                                ?>
                                <tr>
                                    <th scope="row"><?=$no++;?></th>
                                    <td><?=$row['kode_mapel'];?></td>
                                    <td><?=$row['nama_mapel'];?></td>
                                    <td><?=$row['jurusan'];?></td>
                                    <td><?=$row['periode'];?></td>
                                    <td><?=$row['guru_pengampu'];?></td>
                                    <td class="text-center d-flex justify-content-center">
                                        <div>
                                            <!-- Modal Edit Guru -->
                                            <button class="btn btn-warning btn-sm bi bi-pencil-square  "
                                                style="cursor: pointer;" data-bs-toggle="modal"
                                                data-bs-target="#edit-Mapel<?=$row['id_mapel'];?>"
                                                title="Edit Guru"></button>

                                            <div class="modal fade" id="edit-Mapel<?=$row['id_mapel'];?>" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <i class="bi bi-building-fill-gear pe-2"></i>
                                                            <h5 class="modal-title">Edit Mata Pelajaran</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="row g-3"
                                                                action="../backend/prosses-data-mapel.php"
                                                                method="post">
                                                                <input type="hidden" value="<?=$row['id_mapel'];?>"
                                                                    name="id_mapel">
                                                                <div class="col-12">
                                                                    <label for="kodeMapel" class="form-label">Nama Mata
                                                                        Pelajaran</label>
                                                                    <input type="text" class="form-control"
                                                                        name="kodeMapel"
                                                                        value="<?=$row['kode_mapel'];?>">
                                                                </div>
                                                                <div class="col-12">
                                                                    <label for="namaMapel" class="form-label">Nama Mata
                                                                        Pelajaran</label>
                                                                    <input type="text" class="form-control"
                                                                        name="namaMapel"
                                                                        value="<?=$row['nama_mapel'];?>">
                                                                </div>
                                                                <div class="col-12">
                                                                    <label for="namaJurusan"
                                                                        class="form-label">Jurusan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="namaJurusan"
                                                                        value="<?=$row['jurusan'];?>">
                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="namaPeriode"
                                                                        class="form-label">Periode</label>
                                                                    <input type="text" class="form-control"
                                                                        name="namaPeriode"
                                                                        value="<?=$row['periode'];?>">
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="guruPengampu" class="form-label">Guru
                                                                        Pengampu</label>
                                                                    <select class="form-select" id="guruPengampu"
                                                                        required name="guruPengampu">
                                                                        <option value="" disabled selected>Pilih Guru
                                                                            Pengampu...
                                                                        </option>
                                                                        <?php foreach ($guruOptions as $guruOption) { ?>
                                                                        <option value="<?= $guruOption; ?>">
                                                                            <?= $guruOption; ?>
                                                                        </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary"
                                                                    name="edit-mapel">
                                                                    <i class="bi bi-building-fill-add"></i>
                                                                    Tambah Mata Pelajaran
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- End Edit Modal-->
                                            <!-- Disabled Backdrop Modal -->
                                            <button class="btn btn-danger btn-sm bi bi-trash-fill"
                                                style="cursor: pointer;" data-bs-toggle="modal"
                                                data-bs-target="#delete-mapel<?=$row['id_mapel'];?>"
                                                title="Delete"></button>

                                            <div class="modal fade-sm" id="delete-mapel<?=$row['id_mapel'];?>"
                                                tabindex="-1" data-bs-backdrop="false">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Mata Pelajaran ?</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <a type="button"
                                                                href="../backend/prosses-data-mapel.php?id_mapel=<?=$row['id_mapel'];?>"
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