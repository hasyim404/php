<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Memproses Form Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        body {
            background-color: #bccfc6;
        }

        .form-bg {
            background-color: #D1E7DD;
            padding: 15px;
            border-radius: 20px;
        }

        .table-bg {
            background-color: #D1E7DD;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="container my-4">

        <div class="row">
            <div class="col-md-3 form-bg">
                <h3 class="text-center">Form Input Pegawai</h3>
                <div class="my-3">
                    <form id="contactForm" method="POST">
                        <div class="mb-3">
                            <label class="form-label" for="namaPegawai">Nama Pegawai</label>
                            <input class="form-control" name="namaPegawai" type="text" placeholder="Nama Pegawai" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="namaPegawai:required">Nama Pegawai is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="agama">Agama</label>
                            <select class="form-select" name="agama" aria-label="Agama">
                                <option value="" hidden>-- Pilih Agama --</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Konghucu">Konghucu</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Khatolik">Khatolik</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-block">Jabatan:</label>
                            <div class="form-check form-check">
                                <input class="form-check-input" type="hidden" name="jabatan" value="" />
                                <input class="form-check-input" id="manager" type="radio" name="jabatan" value="Manager" data-sb-validations="required" />
                                <label class="form-check-label" for="manager">Manager</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" id="asisten" type="radio" name="jabatan" value="Asisten" data-sb-validations="required" />
                                <label class="form-check-label" for="asisten">Asisten</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" id="kabag" type="radio" name="jabatan" value="Kabag" data-sb-validations="required" />
                                <label class="form-check-label" for="kabag">Kabag</label>
                            </div>
                            <div class="form-check form-check">
                                <input class="form-check-input" id="staff" type="radio" name="jabatan" value="Staff" data-sb-validations="required" />
                                <label class="form-check-label" for="staff">Staff</label>
                            </div>
                            <div class="invalid-feedback" data-sb-feedback="jabatan:required">One option is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-block">Status:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="hidden" name="status" value="" />
                                <input class="form-check-input" id="menikah" type="radio" name="status" value="Menikah" data-sb-validations="required" />
                                <label class="form-check-label" for="menikah">Menikah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="belumMenikah" type="radio" name="status" value="Belum Menikah" data-sb-validations="required" />
                                <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
                            </div>
                            <div class="invalid-feedback" data-sb-feedback="status:required">One option is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="jumlahAnak">Jumlah Anak</label>
                            <input class="form-control" name="jumlahAnak" type="text" placeholder="Jumlah Anak" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah Anak is required.</div>
                        </div>
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                            </div>
                        </div>
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-success btn-lg" id="submitButton" name="submit" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            error_reporting(0);
            $pegawai = $_POST['namaPegawai'];
            $agama = $_POST['agama'];
            $jabatan = $_POST['jabatan'];
            $status = $_POST['status'];
            $jmlAnak = $_POST['jumlahAnak'];
            $submit = $_POST['submit'];


            // Gaji
            switch ($jabatan) {
                case 'Manager':
                    $gajiPokok = 20000000;
                    break;
                case 'Asisten':
                    $gajiPokok = 15000000;
                    break;
                case 'Kabag':
                    $gajiPokok = 10000000;
                    break;
                case 'Staff':
                    $gajiPokok = 4000000;
                    break;
                default:
                    $gajiPokok = '';
            }


            // Tunjangan Jabatan
            $t_Jabatan = 0.2 * $gajiPokok;


            // Tunjangan Keluarga
            if ($status == 'Menikah' && $jmlAnak >= 1 && $jmlAnak <= 2) $t_Keluarga = 0.05 * $gajiPokok;
            else if ($status == 'Menikah' && $jmlAnak >= 3 && $jmlAnak <= 5) $t_Keluarga = 0.1 * $gajiPokok;
            else if ($status == 'Menikah' && $jmlAnak >= 6) $t_Keluarga = 0.15 * $gajiPokok;
            else if ($status == 'Belum Menikah') $t_Keluarga = 0;
            else if ($status == 'Belum Menikah' && $jmlAnak == 0) $jmlAnak = "S";

            if ($t_Keluarga != 0) $t_KeluargaOri = "Rp. " . number_format($t_Keluarga, 0, ',', '.');
            else if ($t_Keluarga == 0) $t_KeluargaOri = "Belum bisa dapat Tunjangan Keluarga";


            // Tunjangan Gaji Kotor
            $gajiKotor = $gajiPokok + $t_Jabatan + $t_Keluarga;


            // Zakat Profesi
            $zakat_profesi = $agama == "Islam" && $gajiKotor >= 6000000 ? 0.025 * $gajiKotor : 0;


            // Take Home Pay
            $takeHomePay = $gajiKotor - $zakat_profesi;

            ?>

            <div class="col-md-9">
                <h3 class="text-center table-bg py-3">Tabel Gaji Pegawai</h3>
                <div class="my-3">
                    <table class="table table-hover table-striped-columns">
                        <tr class="table-success">
                            <th>Nama Pegawai</th>
                            <th>Gaji Pokok</th>
                            <th>T. Jabatan</th>
                            <th>T. Keluarga</th>
                            <th>T. Gaji Kotor</th>
                            <th>Zakat Profesi</th>
                            <th>Take Home Pay</th>
                        </tr>
                        <?php if (isset($submit)) : ?>
                            <tr class="table-secondary">
                                <td><?= $pegawai; ?></td>
                                <td>Rp. <?= number_format($gajiPokok, 0, ',', '.'); ?></td>
                                <td>Rp. <?= number_format($t_Jabatan, 0, ',', '.'); ?></td>
                                <td><?= $t_KeluargaOri ?></td>
                                <td>Rp. <?= number_format($gajiKotor, 0, ',', '.'); ?></td>
                                <td>Rp. <?= number_format($zakat_profesi, 0, ',', '.'); ?></td>
                                <td>Rp. <?= number_format($takeHomePay, 0, ',', '.'); ?></td>
                            </tr>
                        <?php endif ?>
                    </table>

                    <h5 class="text-end text-secondary">*Ket: T = Tunjangan</h5>
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <ol class="list-group list-group-numbered mt-3">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Nama Pegawai:</div>
                                        <?= $pegawai ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Agama:</div>
                                        <?= $agama ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Jabatan:</div>
                                        <?= $jabatan ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Status:</div>
                                        <?= $status ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Jumlah Anak:</div>
                                        <?= $jmlAnak ?>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>

    <footer>

    </footer>



    </div>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>