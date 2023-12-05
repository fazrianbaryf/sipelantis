<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");

?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Guru</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-lines-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>1</h6>
                                    <span class="text-muted small pt-2 ps-1">Guru</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Mata Pelajaran</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-journals"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>1</h6>
                                    <span class="text-muted small pt-2 ps-1">Mapel</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Kelas</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>1</h6>
                                    <span class="text-muted small pt-2 ps-1">Kelas</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Ruangan</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-buildings"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>1</h6>
                                    <span class="text-muted small pt-2 ps-1">Ruangan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Selling -->
            <div class="row">
                <div class="col-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <h3 class="card-subtitle mb-2 mt-4 text-dark fw-bold">Selamat Datang</h3>
                            <h3 class="card-subtitle mb-2 text-dark fw-bold">Di Sistem Penjadwalan Otomatis</h3>
                            <h3 class="card-subtitle mb-2 text-dark fw-bold">SMK BINA KARYA 1</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php

require_once("{$base_dir}pages{$ds}core{$ds}footer.php");

?>