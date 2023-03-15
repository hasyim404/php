<?php

$model = new Karyawan();
$data_k = $model->dataKaryawan();

// Session Hak akses
$sesi = $_SESSION['PETUGAS'];
if (isset($sesi) && $sesi['role'] == 'admin') {
    // if (isset($sesi)) {
?>

    <div id="banner-area" class="banner-area" style="background-image:url(public/template/images/banner/banner1.jpg)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Data Karyawan</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Daftar Karyawan</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->


    <section id="main-container" class="main-container pb-4">
        <div class="container">
            <div class="mb-5 text-center">
                <a class="btn btn-success" href="index.php?page=pages/karyawan/form"><i class="fa fa-plus"> Tambah Karyawan </i></a>
            </div>

            <div class="row justify-content-center">

                <?php
                $no = 1;
                foreach ($data_k as $data) :
                    $img =  (empty($data['foto'])) ? "https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930" : 'public/template/images/banner/' . $data['foto']; ?>
                    <div class="col-lg-3 col-sm-6 mb-5 p-3 m-3" style='border-radius: 5%; border: 5px solid #DEE2E6'>
                        <div class="ts-team-wrapper">
                            <div class="team-img-wrapper text-center">
                                <img loading="lazy" src="<?= $img ?>" class="img-fluid" alt="team-img" width='220px' height='220px' style='border-radius: 10%; border: 1px solid #E9E9E9'>
                            </div>
                            <div class="ts-team-content-classic">
                                <h3 class="ts-name"><?= $data['nama'] ?></h3>
                                <p class="ts-designation">Karyawan <?= $no++ ?></p>
                                <p class="ts-designation">NIP: <?= $data['nip'] ?></p>
                                <p class="ts-designation">
                                    Gender:
                                    <?php if ($data['gender'] == 'L') {
                                        echo 'Laki-laki';
                                    } else {
                                        echo 'Perempuan';
                                    } ?>
                                </p>
                                <p class="ts-description">Alamat: <?= $data['alamat'] ?></p>
                                <div class="team-social-icons">
                                    <a href="#!"><i class="fab fa-whatsapp"></i><?= $data['no_telp'] ?></a>
                                </div>
                                <!--/ social-icons-->
                            </div>
                            <div class="text-center mt-4">

                                <a href="index.php?page=pages/karyawan/view_detail&id=<?= $data['id'] ?>">
                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-success mr-2">
                                        Detail
                                    </button>
                                </a>

                                <a href="index.php?page=pages/karyawan/form&edit-id=<?= $data['id'] ?>">
                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning text-white ml-2">
                                        Edit
                                    </button>
                                </a>
                            </div>
                        </div>
                        <!--/ Team wrapper 1 end -->
                    </div><!-- Col end -->

                <?php endforeach ?>

            </div><!-- Content row 1 end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->
<?php } else {
    // header('Location:index.php?page=pages/register');
    echo '<script>window.location.replace("index.php?page=pages/error/403");</script>';
} ?>