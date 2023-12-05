<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIPELAN'TIS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="admin/assets/img/favicon.png" rel="icon">
    <link href="admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="admin/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="">
            <img class="" width="150" height="50" src="admin/assets/img/logo-sipelantis.png" alt="">
            <div class="d-flex align-items-center justify-content-between">
                <a href="#" class="mx-2">Home</a>
                <a href="pages/jadwal.php" class="mx-2">Jadwal Lab</a>
            </div>
        </a>
    </div><!-- End Logo -->
    <div class="ms-auto me-3">
        <a href="admin/login.php" class="btn btn-primary" type="submit">Login</a>
    </div>
</header><!-- End Header -->

<body>

    <div class=" container-fluid">
        <section id="content" class="content">
            <div class="row overflow-hidden">
                <div class="">
                    <!-- Slides with indicators -->
                    <div id="carouselExampleIndicators" class="d-block mx-auto carousel slide" data-bs-ride="carousel"
                        style="height: 87vh;">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="admin/assets/img/slides-1.jpg" class="d-block mx-auto w-100"
                                    style="height: 85vh;" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="admin/assets/img/slides-2.jpg" class="d-block mx-auto w-100"
                                    style="height: 85vh;" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="admin/assets/img/slides-3.jpg" class="d-block mx-auto w-100"
                                    style="height: 85vh;" alt="...">
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="container d-flex flex-column align-items-center justify-content-center text-center">
                    <h3>SIPELAN'TIS</h3>
                    <p>Selamat Datang Di Sistem Penjadwalan Otomatis SMK Binakarya 1</p>
                    <p>SMK Bina Karya 1 menyediakan program kejuruan di berbagai bidang, seperti teknik, industri,
                        bisnis, dan kejuruan lainnya sesuai dengan kebutuhan industri dan pasar kerja setempat. Dengan
                        fasilitas modern dan pendekatan pembelajaran yang terkini, sekolah ini berkomitmen untuk
                        menciptakan lingkungan belajar yang kondusif bagi perkembangan siswa secara akademis dan
                        praktis.</p>

                    <p>Fasilitas pendidikan SMK Bina Karya 1 melibatkan ruang kelas yang nyaman, laboratorium yang
                        dilengkapi dengan peralatan terkini, perpustakaan untuk mendukung riset dan pengembangan
                        pengetahuan, dan fasilitas olahraga untuk mendukung aspek kesehatan dan kebugaran siswa.</p>

                    <p>Sebagai bagian dari pendekatan pendidikan yang holistik, SMK Bina Karya 1 juga menekankan
                        kegiatan ekstrakurikuler, partisipasi siswa dalam kegiatan sosial, dan kerjasama dengan industri
                        lokal untuk memberikan pengalaman praktis kepada siswa.</p>
                </div>
                <!-- Default Card -->
                <div class="card justify-content-center">
                    <div class=" card-body">
                        <h5 class="card-title text-center">Maps Lokasi SMK BINA KARYA 1</h5>
                        <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no"
                                marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?width=720&amp;height=600&amp;hl=en&amp;q=SMK%20BINA%20KARYA%201%20KARAWANG+(Sekolah)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                                    href="https://www.maps.ie/population/">Population calculator map</a></iframe>
                        </div>
                    </div>
                </div>
            </div>
    </div><!-- End Default Card -->
    </div>
    </section>
    </div>
    <!-- ======= Footer ======= -->
    <footer class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="admin/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="admin/assets/vendor/echarts/echarts.min.js"></script>
    <script src="admin/assets/vendor/quill/quill.min.js"></script>
    <script src="admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="admin/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="admin/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="admin/assets/js/main.js"></script>

</body>

</html>