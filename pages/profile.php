<?php

$id = $_REQUEST['id'];
$model = new Petugas();
$petugas = $model->getPetugas($id);

$img =  (empty($petugas['foto'])) ? "https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930" : 'public/template/images/banner/' . $petugas['foto'];

// Session Hak akses
$sesi = $_SESSION['PETUGAS'];
if (isset($sesi) && $sesi['role'] == 'admin' || $sesi['role'] == 'staff') {
    // if (isset($sesi)) {
?>

    <section id="main-container" class="main-container">
        <div class="container">

            <div class="row">
                <div class="col-lg-5 text-center">
                    <img loading="lazy" src="<?= $img ?>" height="300px" width="300px" style='border-radius: 100%; border: 5px solid #DEE2E6'>
                </div><!-- Slider col end -->

                <div class="col-lg-4 mt-5 mt-lg-0">

                    <h3 class="column-title mrt-0"><?= $petugas['nama'] ?></h3>
                    <p class="font-italic"><?= $petugas['username'] ?></p>

                    <ul class="project-info list-unstyled">
                        <li>
                            <p class="project-info-label">NIP</p>
                            <p class="project-info-content"><?= $petugas['nip'] ?></p>
                        </li>
                        <li>
                            <p class="project-info-label">Gender</p>
                            <p class="project-info-content"><?= $petugas['email'] ?></p>
                        </li>
                        <li>
                            <p class="project-info-label">No. Telpon</p>
                            <p class="project-info-content"><?= $petugas['no_telp'] ?></p>
                        </li>
                        <li>
                            <p class="project-info-label">Alamat</p>
                            <p class="project-info-content"><?= $petugas['alamat'] ?></p>
                        </li>
                        <li>
                            <p class="project-info-label">Email</p>
                            <p class="project-info-content"><?= $petugas['email'] ?></p>
                        </li>
                        <li>
                            <p class="project-info-label">Role</p>
                            <p class="project-info-content"><?= $petugas['role'] ?></p>
                        </li>
                        <li>
                            <p class="project-link">
                                <a class="btn btn-primary" href="#!">Edit Data</a>
                            </p>
                        </li>
                    </ul>

                </div><!-- Content col end -->

            </div><!-- Row end -->

        </div><!-- Conatiner end -->
    </section><!-- Main container end -->

<?php } else {
    // header('Location:index.php?page=pages/register');
    echo '<script>window.location.replace("index.php?page=pages/error/403");</script>';
} ?>