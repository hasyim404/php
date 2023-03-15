<?php

$model = new Peminjaman();
$data_p = $model->dataPeminjaman();

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
                            <h1 class="banner-title">Data Peminjaman</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php?page=pages/home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Daftar Peminjaman</li>
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
                <a class="btn btn-success" href="index.php?page=pages/peminjaman/form">
                    <i class="fa fa-plus"> Tambah Peminjaman </i></a>
            </div>
            <div class="row">
                <table class="table table-hover table-responsive-md">

                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Karyawan</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Tgl. Pinjam</th>
                            <th scope="col">Tgl. Pengembalian</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Petugas</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $no = 1;
                        foreach ($data_p as $data) : ?>
                            <tr>
                                <th><?= $no++ ?>.</th>
                                <!-- <td class="text-capitalize"></td> -->
                                <td class=""><?= $data['karyawan'] ?></td>
                                <td class=""><?= $data['barang'] ?></td>
                                <td><?= $data['kode'] ?></td>
                                <td><?= $data['tgl_peminjaman'] ?></td>
                                <td><?= $data['tgl_pengembalian'] ?></td>
                                <td><?= $data['keterangan'] ?></td>
                                <td><?= $data['petugas'] ?></td>
                                <td>
                                    <form action="ControllerPeminjaman.php" method="post">
                                        <a href="index.php?page=pages/peminjaman/form&edit-id=<?= $data['id'] ?>">
                                            <button class="btn btn-warning" type="button" title="Edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <?php if (isset($sesi) && $sesi['role'] == 'admin') { ?>
                                            <button class="btn btn-danger" title="Delete" type="submit" name="process" value="delete" onclick="return confirm('Anda Yakin ingin menghapus data peminjaman\natas nama karyawan [ <?= $data['karyawan']   ?> ] ?')" data-toggle="tooltip" data-placement="top" title="Delete">
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
}
?>