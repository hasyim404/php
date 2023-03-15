<?php

$model = new Petugas();
$data_p = $model->dataPetugas();

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
                            <h1 class="banner-title">Data Petugas</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php?page=pages/home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Daftar Petugas</li>
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
            <div class="mb-5 text-right">
                <a class="btn btn-success" href="index.php?page=pages/petugas/form">
                    <i class="fa fa-plus"> Tambah Petugas </i></a>
            </div>
            <div class="row">
                <table class="table table-hover table-responsive-md">

                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Gender</th>
                            <th scope="col">No. Telp</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $no = 1;
                        foreach ($data_p as $data) :
                            $img =  (empty($data['foto'])) ? "https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930" : 'public/template/images/banner/' . $data['foto'];
                        ?>
                            <tr>
                                <th><?= $no++ ?>.</th>
                                <!-- <td class="text-capitalize"></td> -->
                                <td><?= $data['nip'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td>
                                    <?php if ($data['gender'] == 'L') {
                                        echo 'Laki-laki';
                                    } else {
                                        echo 'Perempuan';
                                    } ?>
                                </td>
                                <td><?= $data['no_telp'] ?></td>
                                <td><?= $data['username'] ?></td>
                                <td><?= $data['email'] ?></td>
                                <td><?= $data['role'] ?></td>
                                <td>
                                    <img src="<?= $img ?>" alt="" width='90px' height='90px' style='border-radius: 10%; border: 1px solid #DEE2E6'>
                                </td>
                                <!-- <td></td> -->
                                <td>
                                    <form action="ControllerPetugas.php" method="post">
                                        <a href="index.php?page=pages/petugas/form&edit-id=<?= $data['id'] ?>">
                                            <button class="btn btn-warning" type="button" title="Edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <button disabled class="btn btn-danger" title="Delete" type="submit" name="process" value="delete" onclick="return confirm('Anda Yakin ingin menghapus data Petugas\natas nama [ <?= $data['nama']   ?> ] ?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <input type="hidden" name="idx" value="<?= $data['id'] ?>">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

<?php } else {
    // header('Location:index.php?page=pages/register');
    echo '<script>window.location.replace("index.php?page=pages/error/403");</script>';
}
?>