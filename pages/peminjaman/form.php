<?php

$model_peminjaman = new Peminjaman();
$model_karyawan = new Karyawan();
$model_barang = new Barang();
$model_petugas = new Petugas();

$data_k = $model_karyawan->dataKaryawan();
$data_b = $model_barang->dataBarang();
$data_p = $model_petugas->dataPetugas();

$id = $_REQUEST['edit-id'];
$peminjaman = !empty($id) ? $model_peminjaman->getPeminjaman($id) : array();

$default = rand(100, 999);
$generate_code = empty($peminjaman['kode']) ? 'PJ' . $default : $peminjaman['kode'];

// Session Hak akses
$sesi = $_SESSION['PETUGAS'];
if (isset($sesi) && $sesi['role'] == 'admin' || $sesi['role'] == 'staff') {
    // if (isset($sesi)) {

?>

    <section id="main-container" class="main-container">
        <div class="container">

            <div class="row text-center">
                <div class="col-12">
                    <h3 class="section-sub-title">Form Input Peminjaman</h3>
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
                    <form action="ControllerPeminjaman.php" method="post" role="form">
                        <div class="error-container"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Karyawan</label>
                                    <select class="form-control main" name="karyawan">
                                        <option selected disabled value="-">-- Pilih Karyawan --</option>
                                        <?php
                                        $no = 1;
                                        foreach ($data_k as $data) {

                                            $select1 = $peminjaman['karyawan_id'] == $data['id'] ? 'selected' : '';
                                        ?>
                                            <option value="<?= $data['id'] ?>" <?= $select1 ?>>[<?= ucfirst($data['nip']) ?>] - <?= $data['nama'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Barang</label>
                                    <select class="form-control main" name="barang">
                                        <option selected disabled value="-">-- Pilih Barang --</option>
                                        <?php
                                        $no = 1;
                                        foreach ($data_b as $data) {

                                            $select2 = $peminjaman['barang_id'] == $data['id'] ? 'selected' : '';
                                        ?>
                                            <option value="<?= $data['id'] ?>" <?= $select2 ?>>[<?= ucfirst($data['kode']) ?>] - <?= $data['nama'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Kode</label>
                                        <div class="input-group-append">
                                            <input readonly value="<?= $generate_code ?>" class="form-control form-control-name text-capitalize" name="kode" id="editt" placeholder="<?= $generate_code ?>" type="text">
                                            <span class="input-group-text" id="addon-wrapping">
                                                <input type="radio" id="selecct" data-toggle="tooltip" onclick="editKode()" data-placement="top" title="Open Edit" aria-label="Radio button for following text input">
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tgl. Pinjam</label>
                                    <input type="date" value="<?= $peminjaman['tgl_peminjaman'] ?>" class="form-control form-control-name" name="tgl_peminjaman" id="subject" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tgl. Pengembalian</label>
                                    <input type="date" value="<?= $peminjaman['tgl_pengembalian'] ?>" class="form-control form-control-name" name="tgl_pengembalian" id="subject" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Petugas</label>
                                    <select class="form-control main" name="petugas">
                                        <option selected disabled value="-">-- Pilih Petugas --</option>
                                        <?php
                                        $no = 1;
                                        foreach ($data_p as $data) {
                                            $select3 = $peminjaman['petugas_id'] == $data['id'] ? 'selected' : '';

                                        ?>
                                            <option value="<?= $data['id'] ?>" <?= $select3 ?>>[<?= ucfirst($data['nip']) ?>] - <?= $data['nama'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control form-control-message" name="keterangan" id="message" placeholder="" rows="10"><?= $peminjaman['keterangan'] ?></textarea>
                        </div>



                        <div class="text-center"><br>
                            <?php if (empty($id)) { ?>
                                <button name="process" value="save" class="btn btn-success solid blank mr-1" type="submit">Simpan</button>
                            <?php } else { ?>
                                <button name="process" value="edit" class="btn btn-warning solid blank text-white mr-1" type="submit">Edit</button>
                                <!-- hidden field untuk klausa where id=? -->
                                <input type="hidden" name="idx" value="<?= $id ?>">
                            <?php } ?>
                            <button name="process" value="batal" value class="btn btn-secondary solid blank ml-1" type="submit">Batal</button>
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