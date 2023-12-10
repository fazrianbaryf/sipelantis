<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '') . $ds;
require_once("{$base_dir}core{$ds}header.php");

?>

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
                                <img src="admin/assets/img/slide1-.jpg" class="d-block mx-auto w-100"
                                    style="height: 85vh;" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="admin/assets/img/slide2--.jpg" class="d-block mx-auto w-100"
                                    style="height: 85vh;" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="admin/assets/img/slide3--.jpg" class="d-block mx-auto w-100"
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
                <div class="container d-flex flex-column align-items-center justify-content-center text-center"
                    style="max-width: 1350px; margin: 0 auto; margin-bottom: 20px;">
                    <h3 class="mb-4">SIPELAN'TISssssssssss/h3>
                        <p>Selamat datang di Sistem Penjadwalan Otomatis SMK Binakarya 1.</p>

                        <p style="text-align: justify; text-indent: 40px;">
                            SMK Bina Karya 1 menyediakan program kejuruan di berbagai bidang, seperti teknik, industri,
                            bisnis, dan kejuruan lainnya sesuai dengan kebutuhan industri dan pasar kerja setempat.
                            Dengan
                            fasilitas modern dan pendekatan pembelajaran yang terkini, sekolah ini berkomitmen untuk
                            menciptakan lingkungan belajar yang kondusif bagi perkembangan siswa secara akademis dan
                            praktis. Kurikulum yang disusun secara hati-hati mencakup kombinasi mata pelajaran teoritis
                            dan
                            pelatihan praktis, memastikan
                            bahwa setiap siswa tidak hanya memperoleh pengetahuan akademis yang solid, tetapi juga
                            keterampilan
                            praktis yang dibutuhkan dalam industri. Fasilitas modern seperti laboratorium teknologi,
                            workshop, dan perpustakaan yang lengkap mendukung proses pembelajaran yang interaktif dan
                            inovatif.

                        </p>

                        <p style="text-align: justify; text-indent: 40px;">
                            Fasilitas pendidikan SMK Bina Karya 1 melibatkan ruang kelas yang nyaman, laboratorium yang
                            dilengkapi dengan peralatan terkini, perpustakaan untuk mendukung riset dan pengembangan
                            pengetahuan, serta fasilitas olahraga untuk mendukung aspek kesehatan dan kebugaran siswa.
                            Di samping itu, SMK Bina Karya 1 juga memberikan penekanan pada pengembangan
                            keterampilan soft skills, kepemimpinan, dan kolaborasi antar siswa. Melalui program
                            ekstrakurikuler dan kegiatan sosial, sekolah ini bertujuan untuk membentuk karakter siswa
                            yang
                            tangguh, kreatif, dan siap menghadapi tantangan dunia kerja modern.


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
    <?php

    require_once("{$base_dir}core{$ds}footer.php");

    ?>