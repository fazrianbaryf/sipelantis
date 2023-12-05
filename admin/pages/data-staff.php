<?php

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");

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
                                            <form class="row g-3" action="../backend/prosses-staff.php" method="post">
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
                                                    <input type="text" class="form-control" id="password"
                                                        name="password">
                                                </div>
                                                <div class="col-12">
                                                    <label for="password" class="form-label">Confirm Password</label>
                                                    <input type="text" class="form-control" id="password"
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
                                            <div>
                                                <!-- Modal Edit Staff -->
                                                <button type="button"
                                                    class="btn btn-success rounded-pill btn-sm btn-edit-user"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editmodal<?=$row['id_m_user'];?>"
                                                    data-user-id="<?=$row['id_m_user'];?>">
                                                    <i class="bi bi-person-gear"></i>
                                                    Edit Users
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
                                                                    action="../backend/prosses-staff.php" method="post">
                                                                    <input type="hidden" name="id_m_user"
                                                                        value="<?=$row['id_m_user'];?>">
                                                                    <div class="col-12">
                                                                        <label for="name"
                                                                            class="form-label">Nama</label>
                                                                        <input type="text" class="form-control"
                                                                            id="name"
                                                                            value="<?= $row['name_m_user']; ?>"
                                                                            name="tname">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="email"
                                                                            class="form-label">Email</label>
                                                                        <input type="text" class="form-control"
                                                                            id="email"
                                                                            value="<?= $row['email_m_user']; ?>"
                                                                            name="temail">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="password"
                                                                            class="form-label">Password</label>
                                                                        <input type="password" class="form-control"
                                                                            id="password" name="tpassword">
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="password" class="form-label">Confirm
                                                                            Password</label>
                                                                        <input type="password" class="form-control"
                                                                            id="password" name="tConfirmPassword">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="role"
                                                                            class="form-label">Role</label>
                                                                        <select class="form-select" id="role" required
                                                                            name="trole">
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
                                                <button type="button" class="btn btn-danger rounded-pill btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#delete-user<?=$row['id_m_user'];?>">
                                                    <i class="bi bi-person-gear"></i>
                                                    Delete
                                                </button>
                                                <div class="modal fade-sm" id="delete-user<?=$row['id_m_user'];?>"
                                                    data-bs-backdrop="false">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete Users?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <a type="button"
                                                                    href="../backend/prosses-staff.php?id_m_user=<?=$row['id_m_user'];?>"
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