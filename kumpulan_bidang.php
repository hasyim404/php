<?php

require_once 'Lingkaran.php';
require_once 'Persegi.php';
require_once 'Segitiga.php';

// jari2
$obj1 = new Lingkaran(5);
// panjang, lebar
$obj2 = new Persegi(13, 5);
// alas, tinggi, sisiMiring
$obj3 = new Segitiga(8, 12);

$object_data = [$obj1, $obj2, $obj3];
$judul = ['No', 'Nama Bidang', 'Keterangan', 'Luas Bidang', 'Keliling Bidang'];

// foreach ($object_data as $data) {
//     echo $data->cetak();
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kumpulan Bidang 2D</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <h1 class="text-center text-decoration-underline mt-5">Kumpulan Bidang 2D</h1>

        <table class="table my-5">
            <thead class="table-success">
                <tr>
                    <?php foreach ($judul as $j) : ?>
                        <th> <?= $j ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody class="table-light align-middle">
                <?php
                $no = 1;
                foreach ($object_data as $data) : ?>
                    <tr>
                        <th><?= $no++ ?>.</th>
                        <?= $data->cetak() ?>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>