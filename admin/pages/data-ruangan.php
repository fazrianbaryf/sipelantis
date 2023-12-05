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
                <li class="breadcrumb-item active">Data Ruangan </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Table Ruangan</h5>
                            <!-- Vertically centered Modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#verticalycentered">
                                <i class="bi bi-building-fill-add"></i>
                                Tambah Ruangan
                            </button>
                            <div class="modal fade" id="verticalycentered" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <i class="bi bi-building-fill-add pe-2"></i>
                                            <h5 class="modal-title">Tambah Ruangan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row g-3">
                                                <div class="col-12">
                                                    <label for="inputNanme4" class="form-label">Nama Ruangan</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputEmail4" class="form-label">Kapasitas
                                                        Ruangan</label>
                                                    <input type="number" class="form-control">
                                                </div>
                                                <button type="button" class="btn btn-primary">
                                                    <i class="bi bi-building-fill-add"></i>
                                                    Tambah Ruangan
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
                                    <th scope="col">Nama Ruangan</th>
                                    <th scope="col">Kapasitas</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Brandon Jacob</td>
                                    <td>100</td>
                                    <td class="text-center d-flex justify-content-center">
                                        <div>
                                            <!-- Modal Edit Guru -->
                                            <button type="button" class="btn btn-success rounded-pill btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#edit-ruangan">
                                                <i class="bi bi-building-fill-gear"></i>
                                                Edit Ruangan
                                            </button>
                                            <div class="modal fade" id="edit-ruangan" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <i class="bi bi-building-fill-gear pe-2"></i>
                                                            <h5 class="modal-title">Edit Ruangan</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="text-start modal-body">
                                                            <form class="row g-3">
                                                                <div class="col-12">
                                                                    <label for="inputNanme4" class="form-label">Nama
                                                                        Ruangan</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                                <div class="col-12">
                                                                    <label for="inputEmail4"
                                                                        class="form-label">Kapasitas
                                                                        Ruangan</label>
                                                                    <input type="number" class="form-control">
                                                                </div>
                                                                <button type="button" class="btn btn-primary">
                                                                    <i class="bi bi-building-fill-add"></i>
                                                                    Tambah Ruangan
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- End Edit Modal-->
                                            <!-- Disabled Backdrop Modal -->
                                            <button type="button" class="btn btn-danger rounded-pill btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#delete-ruangan">
                                                <i class="bi bi-building-fill-dash"></i>
                                                Delete
                                            </button>
                                            <div class="modal fade-sm" id="delete-ruangan" tabindex="-1"
                                                data-bs-backdrop="false">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Ruangan ?</h5>
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