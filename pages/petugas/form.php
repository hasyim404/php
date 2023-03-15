<?php

$model_petugas = new Petugas();

$data_p = $model_petugas->dataPetugas();

$id = $_REQUEST['edit-id'];
$petugas = !empty($id) ? $model_petugas->getPetugas($id) : array();

$default = rand(100, 999);
$generate_code = empty($petugas['nip']) ? 'PG' . $default : $petugas['nip'];

// Session Hak akses
$sesi = $_SESSION['PETUGAS'];
if (isset($sesi) && $sesi['role'] == 'admin') {
    // if (isset($sesi)) {

?>

    <div class="container p-5">
        <div class="row text-center">
            <div class="col-12">
                <h3 class="section-sub-title">Form Input Petugas</h3>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="ControllerPetugas.php" class="border border-dark p-5">

                    <h3 class="text-center column-title">
                        <?php if (empty($id)) { ?>
                            Tambah Data
                        <?php } else { ?>
                            Edit Data
                        <?php } ?>
                    </h3>

                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIP</label>
                                <div class="input-group-append">
                                    <input readonly value="<?= $generate_code ?>" class="form-control form-control-name text-capitalize" name="nip" id="editt" placeholder="<?= $generate_code ?>" type="text">
                                    <span class="input-group-text" id="addon-wrapping">
                                        <input type="radio" id="selecct" data-toggle="tooltip" onclick="editKode()" data-placement="top" title="Open Edit" aria-label="Radio button for following text input">
                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Nama</label>
                            <input value="<?= $petugas['nama'] ?>" class="form-control form-control-name text-capitalize" name="nama" placeholder="" type="text">
                        </div>
                        <div class="col-md-6">
                            <label for="">No. Telp</label>
                            <input value="<?= $petugas['no_telp'] ?>" pattern="[0-9]+" type="text" name="no_telp" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="08xxx">
                        </div>
                        <div class="col-md-6">
                            <label for="">Jenis Kelamin:</label>
                            <?php
                            $ar_gender = ['L' => 'Laki-Laki', 'P' => 'Perempuan'];
                            foreach ($ar_gender as $k => $jk) {
                                //proses edit gender
                                $cek = $petugas['gender'] == $k ? 'checked' : '';
                            ?>
                                <div class="form-check ml-4">
                                    <input class="form-check-input" type="radio" name="gender" value="<?= $k ?>" <?= $cek ?>>
                                    <label class="form-check-label"><?= $jk ?></label>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <label for="">Email</label>
                            <input value="<?= $petugas['email'] ?>" type="email" name="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <label for="">Foto</label>
                            <input value="<?= $petugas['foto'] ?>" type="text" name="foto" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="image.jpg">
                        </div>
                    </div>

                    <label for="">Username</label>
                    <input value="<?= $petugas['username'] ?>" type="text" name="username" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="">

                    <div class="form-group flex-nowrap">
                        <label>Password</label>
                        <div class="input-group-append" id="show_hide_password">
                            <input type="password" value="<?php $petugas['password'] ?>" class="form-control form-control-name" name="password" id="subject" placeholder="must input new/old password">
                            <span class="input-group-text">
                                <a href="#!"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </span>
                        </div>
                    </div>


                    <label for="">Role</label>
                    <select class="form-control main" name="role">
                        <option selected disabled value="-">-- Pilih Role --</option>
                        <?php
                        $no = 1;
                        $ar_role = [
                            'admin' => 'Admin',
                            'staff' => 'Staff'
                        ];
                        asort($ar_role);

                        foreach ($ar_role as $inisial => $role) {

                            $select1 = $petugas['role'] == $inisial ? 'selected' : '';
                        ?> <option value="<?= $inisial ?>" <?= $select1 ?>><?= $no++ ?>. <?= $role ?></option>
                        <?php } ?>
                    </select>

                    <div class="form-group mt-3">
                        <label>Alamat</label>
                        <textarea class="form-control form-control-message" name="alamat" id="message" placeholder="" rows="5"><?= $petugas['alamat'] ?></textarea>
                    </div>

                    <div class="text-center mt-5"><br>
                        <?php if (empty($id)) { ?>
                            <button name="process" value="save" class="btn btn-success solid blank mr-1" type="submit">Simpan</button>
                        <?php } else { ?>
                            <button name="process" value="edit" class="btn btn-warning solid blank text-white mr-1" type="submit">Edit</button>
                            <!-- hidden field untuk klausa where id=? -->
                            <input type="hidden" name="idx" value="<?= $id ?>">
                        <?php } ?>
                        <button name="process" value="batal" class="btn btn-secondary solid blank ml-1" type="submit">Batal</button>
                    </div>

                </form>
            </div>
        </div>

    </div>


<?php } else {
    // header('Location:index.php?page=pages/register');
    echo '<script>window.location.replace("index.php?page=pages/error/403");</script>';
} ?>