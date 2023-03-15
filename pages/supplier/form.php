<?php

$model_supplier = new Supplier();

$data_s = $model_supplier->dataSupplier();

$id = $_REQUEST['edit-id'];
$supplier = !empty($id) ? $model_supplier->getSupplier($id) : array();

$default = rand(1000, 9999);
$generate_code = empty($supplier['kode']) ? 'SP' . $default : $supplier['kode'];

// Session Hak akses
$sesi = $_SESSION['PETUGAS'];
if (isset($sesi) && $sesi['role'] == 'admin') {
    // if (isset($sesi)) {

?>

    <section id="main-container" class="main-container">
        <div class="container">

            <div class="row text-center">
                <div class="col-12">
                    <h3 class="section-sub-title">Form Input Supplier</h3>
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
                    <form action="ControllerSupplier.php" method="post" role="form">
                        <div class="error-container"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kode</label>
                                    <div class="input-group-append">
                                        <input readonly value="<?= strtoupper($generate_code) ?>" class="form-control form-control-name text-capitalize" name="kode" id="editt" placeholder="<?= strtoupper($generate_code) ?>" type="text">
                                        <span class="input-group-text" id="addon-wrapping">
                                            <input type="radio" id="selecct" data-toggle="tooltip" onclick="editKode()" data-placement="top" title="Edit Kode" aria-label="Radio button for following text input">
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input value="<?= $supplier['nama'] ?>" class="form-control form-control-name text-capitalize" name="nama" id="email" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group flex-nowrap">
                                    <label>No. Telephone</label>
                                    <input pattern="[0-9]+" value="<?= $supplier['no_telp'] ?>" class="form-control form-control-name" name="no_telp" id="subject" placeholder="08xxx">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control form-control-message" name="alamat" id="message" placeholder="" rows="5"><?= $supplier['alamat'] ?></textarea>
                        </div>
                        <div class="text-center"><br>
                            <?php if (empty($id)) { ?>
                                <button name="process" value="save" class="btn btn-success solid blank mr-1" type="submit">Simpan</button>
                            <?php } else { ?>
                                <button name="process" value="edit" class="btn btn-warning text-white solid blank mr-1" type="submit">Edit</button>
                                <!-- hidden field untuk klausa where id=? -->
                                <input type="hidden" name="idx" value="<?= $id ?>">
                            <?php } ?>
                            <a href="index.php?page=pages/supplier/view">
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