<?php

$model_barang = new Barang();
$model_kategori = new Kategori();

$data_k = $model_kategori->dataKategori();

$id = $_REQUEST['edit-id'];
$barang = !empty($id) ? $model_barang->getBarang($id) : array();

$default = rand(1000, 9999);
$generate_code = empty($barang['kode']) ? 'B' . $default : $barang['kode'];

// Session Hak akses
$sesi = $_SESSION['PETUGAS'];
if (isset($sesi) && $sesi['role'] == 'admin' || $sesi['role'] == 'staff') {
    // if (isset($sesi)) {

?>

    <section id="main-container" class="main-container">
        <div class="container">

            <div class="row text-center">
                <div class="col-12">
                    <h3 class="section-sub-title">Form Input Barang</h3>
                </div>
            </div>
            <!--/ Title row end -->

            <div class="row">
                <div class="col-md-12">
                    <h3 class="column-title">
                        <?php if (empty($id)) { ?>
                            Tambah Data
                        <?php } else { ?>
                            Edit Data
                        <?php } ?>
                    </h3>
                    <!-- contact form works with formspree.io  -->
                    <!-- contact form activation doc: https://docs.themefisher.com/constra/contact-form/ -->
                    <form action="ControllerBarang.php" method="post" role="form">
                        <div class="error-container"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kode</label>
                                    <div class="input-group-append">
                                        <input readonly value="<?= $generate_code ?>" class="form-control form-control-name text-capitalize" name="kode" id="editt" placeholder="<?= $generate_code ?>" type="text">
                                        <span class="input-group-text" id="addon-wrapping">
                                            <input type="radio" id="selecct" data-toggle="tooltip" onclick="editKode()" data-placement="top" title="Edit Kode" aria-label="Radio button for following text input">
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input value="<?= $barang['nama'] ?>" class="form-control form-control-name text-capitalize" name="nama" id="email" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group flex-nowrap">
                                    <label>Harga</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Rp.</span>
                                        <input pattern="[0-9]+" value="<?= $barang['harga'] ?>" class="form-control form-control-name" name="harga" id="subject" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select class="form-control main" name="satuan">
                                        <option selected disabled value="-">-- Pilih Satuan --</option>
                                        <?php
                                        $no = 1;
                                        $ar_satuan = [
                                            'Unit' => 'Unit', 'Pcs' => 'Pcs', 'Lainnya' => 'Lainnya'
                                        ];
                                        asort($ar_satuan);

                                        foreach ($ar_satuan as $inisial => $satuan) {

                                            $select1 = $barang['satuan'] == $inisial ? 'selected' : '';
                                        ?> <option value="<?= $inisial ?>" <?= $select1 ?>><?= $no++ ?>. <?= $satuan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input value="<?= $barang['jumlah'] ?>" pattern="[0-9]+" class="form-control form-control-name" name="jumlah" id="subject" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control main" name="kategori">
                                        <option selected disabled value="-">-- Pilih Kategori --</option>
                                        <?php
                                        $no = 1;
                                        foreach ($data_k as $data) {

                                            $select2 = $barang['kategori_id'] == $data['id'] ? 'selected' : '';
                                        ?>
                                            <option value="<?= $data['id'] ?>" <?= $select2 ?>><?= $no++ ?>. <?= $data['nama'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input value="<?= $barang['foto'] ?>" class="form-control form-control-name" name="foto" id="subject" placeholder="imageName.png">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control form-control-message" name="keterangan" id="message" placeholder="" rows="10"><?= $barang['keterangan'] ?></textarea>
                        </div>
                        <div class="text-center"><br>
                            <?php if (empty($id)) { ?>
                                <button name="process" value="save" class="btn btn-success solid blank mr-1" type="submit">Simpan</button>
                            <?php } else { ?>
                                <button name="process" value="edit" class="btn btn-warning text-white solid blank mr-1" type="submit">Edit</button>
                                <!-- hidden field untuk klausa where id=? -->
                                <input type="hidden" name="idx" value="<?= $id ?>">
                            <?php } ?>
                            <a href="index.php?page=pages/barang/view">
                                <button name="process" value="batal" class="btn btn-secondary solid blank ml-1" type="submit">Batal</button>
                            </a>

                        </div>
                    </form>
                </div>

            </div><!-- Content row -->
        </div><!-- Conatiner end -->
    </section><!-- Main container end -->

<?php } else {
    // header('Location:index.php?page=pages/register');
    echo '<script>window.location.replace("index.php?page=pages/error/403");</script>';
} ?>