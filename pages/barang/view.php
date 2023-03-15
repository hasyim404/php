<?php

$model = new Barang();
$data_b = $model->dataBarang();

// Session Hak akses
$sesi = $_SESSION['PETUGAS'];
if (isset($sesi) && $sesi['role'] == 'admin' || $sesi['role'] == 'staff') {
    // if (isset($sesi)) {
?>

    <div id="banner-area" class="banner-area" style="background-image:url(public/template/images/banner/banner1.jpg)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Data Barang</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php?page=pages/home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Daftar Barang</li>
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
                <a class="btn btn-success" href="index.php?page=pages/barang/form"><i class="fa fa-plus"> Tambah Barang </i></a>
            </div>
            <div class="row">
                <table class="table table-hover table-responsive-md">

                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Foto</th>
                            <!-- <th scope="col">Keterangan</th> -->
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $no = 1;
                        foreach ($data_b as $data) :
                            $img =  (empty($data['foto'])) ? "https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930" : 'public/template/images/banner/' . $data['foto']; ?>
                            <tr>
                                <th><?= $no++ ?>.</th>

                                <td class="text-capitalize"><?= $data['kode'] ?></td>
                                <td class="text-capitalize"><?= $data['nama'] ?></td>
                                <td>Rp. <?= number_format($data['harga'], 0, '', '.') ?></td>
                                <td><?= $data['satuan'] ?></td>
                                <td><?= $data['jumlah'] ?></td>
                                <td><?= $data['kategori'] ?></td>
                                <td class="text-capitalize">
                                    <img src="<?= $img ?>" alt="" width='90px' height='90px' style='border-radius: 10%; border: 1px solid #DEE2E6'>
                                </td>
                                <!-- <td></td> -->
                                <td>
                                    <form action="ControllerBarang.php" method="post">
                                        <a href="index.php?page=pages/barang/view_detail&id=<?= $data['id'] ?>">
                                            <button class="btn btn-info" type="button" data-toggle="tooltip" data-placement="top" title="Detail">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="index.php?page=pages/barang/form&edit-id=<?= $data['id'] ?>">
                                            <button class="btn btn-warning" type="button" title="Edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <?php if (isset($sesi) && $sesi['role'] == 'admin') { ?>
                                            <button class="btn btn-danger" title="Delete" type="submit" name="process" value="delete" onclick="return confirm('Anda Yakin ingin menghapus\ndata barang [ <?= $data['nama']   ?> ] ?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        <?php } ?>
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