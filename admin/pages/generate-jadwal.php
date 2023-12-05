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
                        <form class="row g-3">
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Periode</label>
                                <input type="text" class="form-control">
                            </div>
                            <a href="generate-jadwal.php" class="btn btn-primary">Generate Jadwal</a>
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