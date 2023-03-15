<?php

include_once 'connection.php';
include_once 'models/Karyawan.php';

// Tangkap Request dari Form
$nip = $_REQUEST['nip'];
$nama = $_REQUEST['nama'];
$gender = $_REQUEST['gender'];
$no_telp = $_REQUEST['no_telp'];
$alamat = $_REQUEST['alamat'];
$foto = $_REQUEST['foto'];
// Simpan Data ke Array
$data = [
    $nip, $nama,
    $gender,
    $no_telp, $alamat,
    $foto
];

// Eksekusi Tombol dengan mekanisme PDO
$model = new Karyawan;
$tombol = $_REQUEST['process'];

switch ($tombol) {
    case 'save':
        $model->save($data);
        break;

    case 'edit':
        // Tangkap Hidden Field idx untuk klausa where id ? 10 (klausa where id = ?)
        $data[] = $_REQUEST['idx'];
        $model->edit($data);
        break;

    case 'delete':
        unset($data);
        $model->delete($_REQUEST['idx']);
        break;

    default:
        header('Location:index.php?page=pages/karyawan/view');
        break;
}

// Jika sudah selesai prosesnya, Diarahkan ke suatu halaman
header('Location:index.php?page=pages/karyawan/view');
