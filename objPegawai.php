<?php

require 'Pegawai.php';

$no = 1;

$p1 = new Pegawai('0112345' . $no++, 'Agam Wizurai', 'Manager', 'Kristen', 'Menikah');
$p2 = new Pegawai('0112345' . $no++, 'Angga Kusuma Putra', 'Asisten Manager', 'Islam', 'Belum Menikah');
$p3 = new Pegawai('0112345' . $no++, 'Erika Oktaviani', 'Staff', 'Konghucu', 'Belum Menikah');
$p4 = new Pegawai('0112345' . $no++, 'Muhammad Ismail', 'Kepala Bagian', 'Islam', 'Menikah');
$p5 = new Pegawai('0112345' . $no++, 'Rendi Prasetyo', 'Staff', 'Islam', 'Menikah');

//array assosiative
$data_pegawai = [$p1, $p2, $p3, $p4, $p5];


// echo '<h3 align="center">' . Pegawai::PEGAWAI . '</h3>';
// $p1->mencetak();
// $p2->mencetak();
// $p3->mencetak();
// $p4->mencetak();
// $p5->mencetak();
// echo 'Jumlah Nasabah: ' . Pegawai::$jml;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pegawai PT ABCD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <h1 class="text-center text-decoration-underline my-5"><?= Pegawai::PEGAWAI ?></h1>

        <h5 class="text-decoration-underline mb-3">Jumlah Pegawai: <?= Pegawai::$jml ?></h5>

        <table class="table">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Jabatan</th>
                    <th>Agama</th>
                    <th>Status</th>
                    <th>Gaji Pokok</th>
                    <th>T.Jabatan</th>
                    <th>T.Keluarga</th>
                    <th>Zakat</th>
                    <th>Gaji Kotor</th>
                </tr>
            </thead>
            <tbody class="table-light">
                <?php
                $no = 1;
                foreach ($data_pegawai as $pegawai) : ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <?= $pegawai->mencetak() ?>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>