<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");

session_start();
// Roles yang diizinkan mengakses data-staff.php
$allowed_roles = ['super_admin'];

// Jika user tidak memiliki session atau rolenya tidak sesuai
if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $allowed_roles)) {
    echo '<script>window.location.href="dashboard.php";</script>';
    exit();
}
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Staff</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Data Staff</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Table Staff</h5>
                            <!-- Vertically centered Modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#verticalycentered">
                                <i class="bi bi-person-add"></i>
                                Tambah Users
                            </button>
                            <div class="modal fade" id="verticalycentered">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <i class="bi bi-person-add bi-lg pe-2"></i>
                                            <h5 class="modal-title">Tambah Users</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row g-3" action="../backend/prosses-data-staff.php"
                                                method="post">
                                                <div class="col-12">
                                                    <label for="name" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="name" name="name">
                                                </div>
                                                <div class="col-12">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email">
                                                </div>
                                                <div class="col-12">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password">
                                                </div>
                                                <div class="col-12">
                                                    <label for="password" class="form-label">Confirm Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="confirm_pw">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="role" class="form-label">Role</label>
                                                    <select class="form-select" id="role" name="role" required>
                                                        <option selected disabled value="">Choose...</option>
                                                        <option>Kepala_lab</option>
                                                        <option>Staff_lab</option>
                                                    </select>
                                                </div>

                                                <button type="input" class="btn btn-primary" name="add-users">
                                                    <i class="bi bi-person-add"></i>
                                                    Tambah Staff
                                                </button>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div><!-- End Vertically centered Modal-->
                        </div>
                        <!-- Alert start -->
                        <!-- Alert Untuk Menambahkan -->
                        <?php
                        $isOperationSuccess = isset($_GET['success']) && $_GET['success'] === 'true';
                        $isDataEdited = isset($_GET['edited']) && $_GET['edited'] === 'true';
                        $isDataDeleted = isset($_GET['deleted']) && $_GET['deleted'] === 'true';
                        ?>
                        <?php if ($isOperationSuccess): ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <i class="bi bi-plus-circle me-1"></i>
                            Data Berhasil Ditambahkan!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            <script>
                            const url = new URL(window.location.href);
                            url.searchParams.delete('success');
                            window.history.replaceState({}, document.title, url.href);

                            setTimeout(function() {
                                document.querySelector('.alert-primary').style.display = 'none';
                            }, 2000);
                            </script>

                        </div>
                        <?php endif; ?>
                        <!-- End Alert Untuk Menambahkan -->
                        <!-- Alert Untuk Edit -->
                        <?php if ($isDataEdited): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-pencil-square me-1"></i>
                            Data Berhasil Diubah!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            <script>
                            const url = new URL(window.location.href);
                            url.searchParams.delete('edited');
                            window.history.replaceState({}, document.title, url.href);

                            setTimeout(function() {
                                document.querySelector('.alert-warning').style.display = 'none';
                            }, 2000);
                            </script>

                        </div>
                        <?php endif; ?>
                        <!-- End Alert Untuk Edit -->
                        <!-- Alert Untuk Delete -->
                        <?php if ($isDataDeleted): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-trash-fill me-1"></i>
                            Data Berhasil Dihapus!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            <script>
                            const url = new URL(window.location.href);
                            url.searchParams.delete('deleted');
                            window.history.replaceState({}, document.title, url.href);

                            setTimeout(function() {
                                document.querySelector('.alert-danger').style.display = 'none';
                            }, 2000);
                            </script>

                        </div>
                        <?php endif; ?>
                        <!-- End Alert Untuk Delete -->
                        <!-- ALert end -->
                        <!-- Bordered Table -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require '../config/db.php';

                                        $staff_users = mysqli_query($mysqli,"SELECT * FROM tbl_m_user");
                                        $no = 1;

                                        while($row = mysqli_fetch_assoc($staff_users)) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?=$no++;?></th>
                                        <td><?=$row['name_m_user'];?></td>
                                        <td><?=$row['email_m_user'];?></td>
                                        <td><?=$row['role_m_user'];?></td>

                                        <td class="text-center d-flex justify-content-center">
                                            <div class="d-flex">
                                                <!-- Modal Edit Staff -->
                                                <button type="button"
                                                    class="btn btn-warning btn-sm bi bi-pencil-square ms-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editmodal<?=$row['id_m_user'];?>"
                                                    data-user-id="<?=$row['id_m_user'];?>">
                                                </button>


                                                <div class="modal fade" id="editmodal<?=$row['id_m_user'];?>">
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
                                                                    action="../backend/prosses-data-staff.php"
                                                                    method="post">
                                                                    <input type="hidden" name="id_m_user"
                                                                        value="<?=$row['id_m_user'];?>">
                                                                    <div class="col-12">
                                                                        <label for="name"
                                                                            class="form-label">Nama</label>
                                                                        <input type="text" class="form-control"
                                                                            id="name"
                                                                            value="<?= $row['name_m_user']; ?>"
                                                                            name="name">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="email"
                                                                            class="form-label">Email</label>
                                                                        <input type="text" class="form-control"
                                                                            id="email"
                                                                            value="<?= $row['email_m_user']; ?>"
                                                                            name="email">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="password"
                                                                            class="form-label">Password</label>
                                                                        <input type="password" class="form-control"
                                                                            id="password" name="password">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="password" class="form-label">Confirm
                                                                            Password</label>
                                                                        <input type="password" class="form-control"
                                                                            id="password" name="ConfirmPassword">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="role"
                                                                            class="form-label">Role</label>
                                                                        <select class="form-select" id="role" required
                                                                            name="role">
                                                                            <option><?= $row['role_m_user']; ?></option>
                                                                            <option>Kepala_lab</option>
                                                                            <option>Staff_lab</option>
                                                                        </select>
                                                                    </div>

                                                                    <button type="submit" class="btn btn-primary"
                                                                        name="edit-users">
                                                                        <i class="bi bi-person-add"></i>
                                                                        Edit Users
                                                                    </button>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End Edit Modal-->
                                                <!-- Disabled Backdrop Modal -->
                                                <button type="button"
                                                    class="btn btn-danger btn-sm bi bi-trash-fill ms-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#delete-user<?=$row['id_m_user'];?>">
                                                </button>

                                                <div class="modal fade-ms" id="delete-user<?=$row['id_m_user'];?>"
                                                    data-bs-backdrop="false">
                                                    <div class="modal-dialog modal-ms">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Data Staff</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5 class="text-center">Apakah anda yakin akan menghapus
                                                                    data ini?<br>
                                                                    <span class="text-danger"><?=$row['name_m_user'];?>
                                                                    </span>
                                                                </h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <a type="button"
                                                                    href="../backend/prosses-data-staff.php?id_m_user=<?=$row['id_m_user'];?>"
                                                                    class="btn btn-danger">Delete</a>
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