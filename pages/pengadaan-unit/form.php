<?php

$model_pengadaanunit = new PengadaanUnit();
$model_pengadaan = new Pengadaan();
$model_barang = new Barang();
$model_supplier = new Supplier();

$data_p = $model_pengadaan->dataPengadaan();
$data_b = $model_barang->dataBarang();
$data_s = $model_supplier->dataSupplier();

$id = $_REQUEST['edit-id'];
$pengadaanunit = !empty($id) ? $model_pengadaanunit->getPengadaanUnit($id) : array();

$default = rand(100, 999);
$generate_code = empty($pengadaanunit['no_pengadaan']) ? 'PU' . $default : $pengadaanunit['no_pengadaan'];

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
                    <form action="ControllerPengadaanUnit.php" method="post" role="form">
                        <div class="error-container"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>No. Pengadaan</label>
                                        <div class="input-group-append">
                                            <input readonly value="<?= $generate_code ?>" class="form-control form-control-name text-capitalize" name="no_pengadaan" id="editt" placeholder="<?= $generate_code ?>" type="text">
                                            <span class="input-group-text" id="addon-wrapping">
                                                <input type="radio" id="selecct" data-toggle="tooltip" onclick="editKode()" data-placement="top" title="Open Edit" aria-label="Radio button for following text input">
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Barang </label>
                                    <select class="form-control main" name="barang">
                                        <option selected disabled value="-">-- Pilih Barang --</option>
                                        <?php
                                        $no = 1;
                                        foreach ($data_b as $data) {

                                            $select3 = $pengadaanunit['barang_id'] == $data['id'] ? 'selected' : '';
                                        ?>
                                            <option value="<?= $data['id'] ?>" <?= $select3 ?>>[<?= ucfirst($data['kode']) ?>] - <?= $data['nama'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <!-- <div class="form-group">
                                    <label>Tgl. Pengadaan</label>
                                    <input type="date" value="<?php //$pengadaanunit['tgl_pengadaan'] 
                                                                ?>" class="form-control form-control-name" name="tgl_pengadaan" id="subject" placeholder="">
                                </div> -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Deskripsi Barang</label>
                                    <textarea class="form-control form-control-message" name="deskripsi_barang" id="message" placeholder="" rows="3"><?= $pengadaanunit['deskripsi_barang'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Supplier (Asal Barang)</label>
                                    <select class="form-control main" name="pengadaan_id">
                                        <option selected disabled value="-">-- Pilih Supplier --</option>
                                        <?php
                                        $no = 1;
                                        foreach ($data_p as $data) {

                                            $select1 = $pengadaanunit['pengadaan_id'] == $data['id'] ? 'selected' : '';
                                        ?>
                                            <option value="<?= $data['id'] ?>" <?= $select1 ?>>[<?= ucfirst($data['no']) ?>] - <?= $data['supplier'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group flex-nowrap">
                                    <label>Harga</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Rp.</span>
                                        <input pattern="[0-9]+" value="<?= $pengadaanunit['harga'] ?>" class="form-control form-control-name" name="harga" id="subject" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jenis Pengadaan</label>
                                    <select class="form-control main" name="jenis">
                                        <option selected disabled value="-">-- Pilih Jenis --</option>
                                        <?php
                                        $no = 1;
                                        $ar_jenis = [
                                            'Pembelian' => 'Pembelian', 'Sumbangan' => 'Sumbangan', 'Lainnya' => 'Lainnya'
                                        ];
                                        asort($ar_jenis);

                                        foreach ($ar_jenis as $inisial => $jenis) {

                                            $select2 = $pengadaanunit['jenis'] == $inisial ? 'selected' : '';
                                        ?> <option value="<?= $inisial ?>" <?= $select2 ?>><?= $no++ ?>. <?= $jenis ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group flex-nowrap">
                                    <label>Jumlah</label>
                                    <div class="col-md-4 pl-0">
                                        <div class="input-group-prepend">
                                            <input pattern="[0-9]+" value="<?= $pengadaanunit['jumlah'] ?>" class="form-control form-control-name" name="jumlah" id="subject" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control form-control-message" name="keterangan" id="message" placeholder="" rows="5"><?= $pengadaanunit['keterangan'] ?></textarea>
                                </div>
                            </div>

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