<?php

$model = new Kategori();
$data_k = $model->dataKategori();

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
                            <h1 class="banner-title">Data Kategori</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php?page=pages/home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Daftar Kategori</li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->



    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-6-md">
                    <table class="table table-hover table-responsive-md">

                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $no = 1;
                            foreach ($data_k as $data) : ?>
                                <tr>
                                    <th><?= $no++ ?>.</th>
                                    <td class=""><?= $data['nama'] ?></td>
                                    <!-- <td></td> -->
                                    <td>No action</td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>

<?php } else {
    // header('Location:index.php?page=pages/register');
    echo '<script>window.location.replace("index.php?page=pages/error/403");</script>';
}
?>