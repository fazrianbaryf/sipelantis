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

// Jika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses generate jadwal otomatis
    require_once("../backend/generate.php");
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Generate Jadwal</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Generate Jadwal</h5>
                        <form class="row g-3" action="../backend/generate.php" method="post">
                            <?php
                                require '../config/db.php';

                                $periodeQuery = mysqli_query($mysqli, "SELECT * FROM tbl_periode");
                                $periodeOptions = array();

                                while ($periodeRow = mysqli_fetch_assoc($periodeQuery)) {
                                    $periodeOptions[] = $periodeRow['nama_periode'];
                                }
                            ?>
                            <div class="col-12">
                                <label for="generate" class="form-label">Generate</label>
                                <select class="form-select" id="generate" required name="generate">
                                    <option value="" disabled selected>Pilih Periode...</option>
                                    <?php foreach ($periodeOptions as $periodeOption) { ?>
                                    <option value="<?= $periodeOption; ?>"><?= $periodeOption; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Generate Jadwal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div><!-- End Left side columns -->
    </div>
    </section>
</main><!-- End #main -->

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>