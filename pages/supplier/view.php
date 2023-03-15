<?php

$model = new Supplier();
$data_s = $model->dataSupplier();

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
                            <h1 class="banner-title">Data Supplier</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php?page=pages/home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Daftar Supplier</li>
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
                <a class="btn btn-success" href="index.php?page=pages/supplier/form"><i class="fa fa-plus"> Tambah Supplier </i></a>
            </div>
            <div class="row">
                <table class="table table-hover table-responsive-md">

                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No. Telephone</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $no = 1;
                        foreach ($data_s as $data) : ?>
                            <tr>
                                <th><?= $no++ ?>.</th>
                                <td class="text-capitalize"><?= $data['kode'] ?></td>
                                <td class="text-capitalize"><?= $data['nama'] ?></td>
                                <td><?= $data['no_telp'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <!-- <td></td> -->
                                <td>
                                    <form action="ControllerSupplier.php" method="post">
                                        <a href="index.php?page=pages/supplier/form&edit-id=<?= $data['id'] ?>">
                                            <button class="btn btn-warning" type="button" title="Edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <button disabled class="btn btn-danger" title="Delete" type="submit" name="process" value="delete" onclick="return confirm('Anda Yakin ingin menghapus\ndata barang [ <?= $data['nama']   ?> ] ?')" data-toggle="tooltip" data-placement="top" title="Delete">
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

    // echo '<script>
    //         alert("Access Denied");
    //         history.back();
    //       </script>';
} ?>