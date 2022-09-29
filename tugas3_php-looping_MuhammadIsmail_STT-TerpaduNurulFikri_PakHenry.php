<?php

//array scalar
$m1 = ['NIM' => '0111112310', 'Nama' => 'Agung Kusaeri', 'Nilai' => 76];
$m2 = ['NIM' => '0111112311', 'Nama' => 'Ananda Melati Putriyani', 'Nilai' => 45];
$m3 = ['NIM' => '0111112312', 'Nama' => 'Dimas Wahyudi Putra', 'Nilai' => 88];
$m4 = ['NIM' => '0111112313', 'Nama' => 'Erika Oktaviani', 'Nilai' => 90];
$m5 = ['NIM' => '0111112314', 'Nama' => 'Manda Agustriya', 'Nilai' => 43];
$m6 = ['NIM' => '0111112315', 'Nama' => 'Muhamad Aulia Nugraha', 'Nilai' => 82];
$m7 = ['NIM' => '0111112316', 'Nama' => 'Muhammad Ismail', 'Nilai' => 72];
$m8 = ['NIM' => '0111112317', 'Nama' => 'Muhammad Rasyidi', 'Nilai' => 59];
$m9 = ['NIM' => '0111112318', 'Nama' => 'Mutia Muthmainnah', 'Nilai' => 55];
$m10 = ['NIM' => '0111112319', 'Nama' => 'Satria Ardhya Naufal', 'Nilai' => 79];


//array assosiative
$mahasiswa = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10];

$arr_judul = ['No', 'NIM', 'Nama', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];


// aggregate function array
$jml_mhs = count(array_column($mahasiswa, 'Nama'));
$nilai_max = max(array_column($mahasiswa, 'Nilai'));
$nilai_min = min(array_column($mahasiswa, 'Nilai'));
$jml_nilai = array_column($mahasiswa, 'Nilai');
$total_nilai = array_sum($jml_nilai);
$nilai_rata2 = $total_nilai / $jml_mhs;

$data_mhs = [
    'Jumlah Mahasiswa' => $jml_mhs,
    'Nilai Tertingi' => $nilai_max,
    'Nilai Terendah' => $nilai_min,
    'Nilai Rata-rata' => $nilai_rata2
];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas3 Looping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .judul-bg {
            background-color: #C4A484;
            padding: 15px;
            border-radius: 20px;
            color: #FCF5E5;
        }

        .thead-bg {
            background-color: #C4A484;

        }

        .card-bg {
            background-color: #C4A484;
            color: #FCF5E5;
        }

        .ket-color-lulus {
            background-color: #009E60 !important;
            color: whitesmoke !important;
        }

        .ket-color-tidakLulus {
            background-color: #D22B2B !important;
            color: whitesmoke !important;
        }
    </style>
</head>

<body>

    <div class="container">
        <h3 class="text-center my-5 judul-bg">Data Mahasiswa</h3>
        <table class="table table-striped table-hover ">
            <thead class="thead-bg">
                <tr>
                    <?php foreach ($arr_judul as $judul) : ?>
                        <th><?= $judul ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody class="table-bordered border-white">
                <?php
                $no = 1;
                foreach ($mahasiswa as $mhs) :

                    // rumus2
                    // Keterangan
                    $keterangan = ($mhs['Nilai'] >= 60) ? 'Lulus' : 'Tidak Lulus';
                    $ket_color = ($mhs['Nilai'] >= 60) ? 'ket-color-lulus' : 'ket-color-tidakLulus';

                    // Grade
                    if ($mhs['Nilai'] <= 100  && $mhs['Nilai'] >= 85) $grade = "A";
                    elseif ($mhs['Nilai'] <= 84 && $mhs['Nilai'] >= 75) $grade = "B";
                    elseif ($mhs['Nilai'] <= 74 && $mhs['Nilai'] >= 65) $grade = "C";
                    elseif ($mhs['Nilai'] <= 64 && $mhs['Nilai'] >= 55) $grade = "D";
                    elseif ($mhs['Nilai'] <= 54) $grade = "E";

                    // Predikat
                    switch ($mhs['Nilai']) {
                        case ($mhs['Nilai'] <= 100 && $mhs['Nilai'] >= 85):
                            $predikat = "Memuaskan";
                            break;
                        case ($mhs['Nilai'] <= 84 && $mhs['Nilai'] >= 75):
                            $predikat = "Bagus";
                            break;
                        case ($mhs['Nilai'] <= 74 && $mhs['Nilai'] >= 65):
                            $predikat = "Cukup";
                            break;
                        case ($mhs['Nilai'] <= 64 && $mhs['Nilai'] >= 55):
                            $predikat = "Kurang";
                            break;
                        case ($mhs['Nilai'] <= 54):
                            $predikat = "Buruk";
                            break;
                        default:
                            $predikat = '';
                    }
                ?>
                    <tr>
                        <th><?= $no++ . '.' ?></th>
                        <td><?= $mhs['NIM'] ?></td>
                        <td><?= $mhs['Nama'] ?></td>
                        <td><?= $mhs['Nilai'] ?></td>
                        <td class="<?= $ket_color ?>"><?= $keterangan ?></td>
                        <td><?= $grade ?></td>
                        <td><?= $predikat ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-center my-5">
            <div class="card bg-white" style="width: 18rem;">
                <?php foreach ($data_mhs as $datas => $data) : ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item card-bg text-white"> <?= $datas . ': ' . $data ?></li>
                    </ul>
                <?php endforeach ?>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>