<?php

$id = $_REQUEST['id'];
$model = new Karyawan();
$karyawan = $model->getKaryawan($id);

$img =  (empty($karyawan['foto'])) ? "https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930" : 'public/template/images/banner/' . $karyawan['foto'];

// Session Hak akses
$sesi = $_SESSION['PETUGAS'];
if (isset($sesi) && $sesi['role'] == 'admin') {
    // if (isset($sesi)) {
?>


    <section id="main-container" class="main-container" style="background-image:url(public/template/images/banner/banner1.jpg)">
        <div class="banner-text">
            <div class="container text-center ">
                <h1 class="text-white">Detail Karyawan</h1>
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </section>


    <section id="main-container" class="main-container">
        <div class="container">
            <div class="author-box d-nlock d-sm-flex">
                <div class="mb-4 mb-md-0 mr-5 ml-1">
                    <img loading="lazy" src="<?= $img ?>" height="200px" width="200px" style='border-radius: 10%; border: 1px solid #DEE2E6'>
                </div>
                <div class="author-info ">
                    <h3><?= $karyawan['nama'] ?><span>NIP: <?= $karyawan['nip'] ?></span></h3>
                    <p class="mb-2">
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item">
                            Gender:
                            <?php if ($karyawan['gender'] == 'L') {
                                echo 'Laki-laki';
                            } else {
                                echo 'Perempuan';
                            } ?>
                        </li>
                        <li class="list-group-item">No. Telephone: <?= $karyawan['no_telp'] ?></li>
                        <li class="list-group-item">Alamat: <?= $karyawan['alamat'] ?></li>
                    </ul>
                    </p>
                </div>

            </div> <!-- Author box end -->
        </div>
        <div class="container mt-5 text-right">
            <a class="btn btn-info" href="index.php?page=pages/karyawan/view"><i class="fa fa-arrow-left"> Kembali </i></a>
        </div>
    </section>

<?php } else {
    // header('Location:index.php?page=pages/register');
    echo '<script>window.location.replace("index.php?page=pages/error/403");</script>';
} ?>