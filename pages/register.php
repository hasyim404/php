<?php

$model_petugas = new Petugas();

$data_p = $model_petugas->dataPetugas();

$default = rand(100, 999);
$generate_code = 'PG' . $default;

?>

<div class="container p-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="ControllerRegister.php" class="border border-dark p-5">

                <p class="h4 mb-4 text-center">REGISTER</p>

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
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">No. Telp</label>
                        <input type="text" pattern="[0-9]+" name="no_telp" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="08xxx" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Jenis Kelamin:</label>
                        <?php
                        $ar_gender = ['L' => 'Laki-Laki', 'P' => 'Perempuan'];
                        foreach ($ar_gender as $k => $jk) {
                        ?>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="radio" name="gender" value="<?= $k ?>" required>
                                <label class="form-check-label"><?= $jk ?></label>
                            </div>
                        <?php } ?>
                    </div>
                </div>


                <label for="">Email</label>
                <input type="email" name="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="" required>

                <label for="">Username</label>
                <input type="text" name="username" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="" required>

                <div class="form-group flex-nowrap">
                    <label>Password</label>
                    <div class="input-group-append" id="show_hide_password">
                        <input type="password" class="form-control form-control-name" name="password" id="subject" placeholder="">
                        <span class="input-group-text">
                            <a href="#!"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </span>
                    </div>
                </div>

                <input type="hidden" name="role" value="staff">
                <input type="hidden" name="alamat">
                <input type="hidden" name="foto">

                <div class="d-flex justify-content-between">
                    <div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                            <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                        </div>
                    </div>
                    <div>
                        <a href="!#">Forgot password?</a>
                    </div>
                </div>

                <button class="btn btn-info btn-block my-4" type="submit" name="btn_register" value="save">Sign up</button>

                <div class="text-center">
                    <p>Sudah punya akun?
                        <a class="text-primary" href="index.php?page=pages/login">Login</a>
                    </p>

                    <!-- <p>or sign in with:</p>
                    <a type="button" class="light-blue-text mx-2">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a type="button" class="light-blue-text mx-2">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a type="button" class="light-blue-text mx-2">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a type="button" class="light-blue-text mx-2">
                        <i class="fab fa-github"></i>
                    </a> -->
                </div>
            </form>
        </div>
    </div>

</div>