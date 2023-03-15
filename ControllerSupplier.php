<?php

include_once 'connection.php';
include_once 'models/Supplier.php';

// Tangkap Request dari Form
$kode = $_REQUEST['kode'];
$nama = $_REQUEST['nama'];
$no_telp = $_REQUEST['no_telp'];
$alamat = $_REQUEST['alamat'];

// Simpan Data ke Array
$data = [
    $kode, $nama,
    $no_telp, $alamat,
];

// Eksekusi Tombol dengan mekanisme PDO
$model = new Supplier;
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
        header('Location:index.php?page=pages/supplier/view');
        break;
}

// Jika sudah selesai prosesnya, Diarahkan ke suatu halaman
header('Location:index.php?page=pages/supplier/view');
