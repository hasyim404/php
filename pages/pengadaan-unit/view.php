<?php

$model = new PengadaanUnit();
$data_p = $model->dataPengadaanUnit();

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
                            <h1 class="banner-title">Data Pengadaan-Unit</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php?page=pages/home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Daftar Pengadaan-Unit</li>
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
                <a class="btn btn-success" href="index.php?page=pages/pengadaan-unit/form">
                    <i class="fa fa-plus"> Tambah Pengadaan-Unit </i></a>
            </div>
            <div class="row">
                <table class="table table-hover table-responsive-md">

                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">No. Pengadaan</th>
                            <!-- <th scope="col">Tgl. Pengadaan</th> -->
                            <th scope="col">Supplier</th>
                            <th scope="col">Jenis Pengadaan</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Deskripsi Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $no = 1;
                        foreach ($data_p as $data) : ?>
                            <tr>
                                <th><?= $no++ ?>.</th>
                                <td class=""><?= $data['no_pengadaan'] ?></td>
                                <!-- <td class=""><?php // $data['tgl_pengadaan'] 
                                                    ?></td> -->
                                <td><?= $data['nama_supp'] ?></td>
                                <td><?= $data['jenis'] ?></td>
                                <td><?= $data['barang'] ?></td>
                                <td><?= $data['deskripsi_barang'] ?></td>
                                <td>Rp. <?= number_format($data['harga'], 0, '', '.') ?></td>
                                <td><?= $data['jumlah'] ?></td>
                                <td>
                                    <form action="ControllerPengadaanUnit.php" method="post">
                                        <a href="index.php?page=pages/pengadaan-unit/form&edit-id=<?= $data['id'] ?>">
                                            <button class="btn btn-warning" type="button" title="Edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <?php if (isset($sesi) && $sesi['role'] == 'admin') { ?>
                                            <button class="btn btn-danger" title="Delete" type="submit" name="process" value="delete" onclick="return confirm('Anda Yakin ingin menghapus data Pengadaan Unit\ndengan nomor pengadaan [ <?= $data['no_pengadaan']   ?> ] ?')" data-toggle="tooltip" data-placement="top" title="Delete">
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