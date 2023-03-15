<?php

$model_karyawan = new Karyawan();

$data_k = $model_karyawan->dataKaryawan();

$id = $_REQUEST['edit-id'];
$karyawan = !empty($id) ? $model_karyawan->getKaryawan($id) : array();

$default = rand(1000, 9999);
$generate_code = empty($karyawan['nip']) ? 'K' . $default : $karyawan['nip'];

// Session Hak akses
$sesi = $_SESSION['PETUGAS'];
if (isset($sesi) && $sesi['role'] == 'admin') {
    // if (isset($sesi)) {

?>

    <section id="main-container" class="main-container">
        <div class="container">

            <div class="row text-center">
                <div class="col-12">
                    <h3 class="section-sub-title">Form Input Karyawan</h3>
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
                    <form action="ControllerKaryawan.php" method="post" role="form">
                        <div class="error-container"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>NIP</label>
                                    <div class="input-group-append">
                                        <input readonly value="<?= ucfirst($generate_code) ?>" class="form-control form-control-name text-capitalize" name="nip" id="editt" placeholder="<?= $generate_code ?>" type="text">
                                        <span class="input-group-text" id="addon-wrapping">
                                            <input type="radio" id="selecct" data-toggle="tooltip" onclick="editKode()" data-placement="top" title="Edit Kode" aria-label="Radio button for following text input">
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input value="<?= $karyawan['nama'] ?>" class="form-control form-control-name text-capitalize" name="nama" id="email" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group flex-nowrap">
                                    <label for="">Jenis Kelamin:</label>
                                    <?php
                                    $ar_gender = ['L' => 'Laki-Laki', 'P' => 'Perempuan'];
                                    foreach ($ar_gender as $k => $jk) {
                                        //proses edit gender
                                        $cek = $karyawan['gender'] == $k ? 'checked' : '';
                                    ?>
                                        <div class="form-check ml-4">
                                            <input class="form-check-input" type="radio" name="gender" value="<?= $k ?>" <?= $cek ?>>
                                            <label class="form-check-label"><?= $jk ?></label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>No. Telephone</label>
                                    <input value="<?= $karyawan['no_telp'] ?>" pattern="[0-9]+" class="form-control form-control-name" name="no_telp" id="subject" placeholder="08xxx">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input value="<?= $karyawan['foto'] ?>" class="form-control form-control-name" name="foto" id="subject" placeholder="imageName.png">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control form-control-message" name="alamat" id="message" placeholder="" rows="5"><?= $karyawan['alamat'] ?></textarea>
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