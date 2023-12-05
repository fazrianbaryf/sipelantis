<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-heading">Laboratorium</li>

        <?php if ($_SESSION['role'] == 'staff_lab' || $_SESSION['role'] == 'kepala_lab') : ?>
        <!-- Items accessible by super admin -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="jadwal.php">
                <i class="bi bi-calendar3"></i>
                <span>Jadwal Laboratorium</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="generate-jadwal.php">
                <i class="bi bi-calendar2-plus"></i>
                <span>Generate Jadwal</span>
            </a>
        </li>

        <li class="nav-heading">Data</li>
        <!-- Items accessible by super admin -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="data-guru.php">
                <i class="bi bi-person-lines-fill"></i>
                <span>Guru</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="data-mapel.php">
                <i class="bi bi-journals"></i>
                <span>Mata Pelajaran</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="data-ruangan.php">
                <i class="bi bi-buildings"></i>
                <span>Ruangan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="data-kelas.php">
                <i class="bi bi-building"></i>
                <span>Kelas</span>
            </a>
        </li>
        <?php endif; ?>
        <?php if ($_SESSION['role'] == 'super_admin') : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="data-staff.php">
                <i class="bi bi-people-fill"></i>
                <span>Data Staff</span>
            </a>
        </li>

        <?php endif; ?>

        <li class="nav-item" style="margin-top: 20px">
            <a class="nav-link collapsed" href=".././backend/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
            </a>
        </li><!-- End Error 404 Page Nav -->
    </ul>


</aside><!-- End Sidebar-->