<?php

include_once 'connection.php';
include_once 'models/Barang.php';

// Tangkap Request dari Form
$kode = $_REQUEST['kode'];
$nama = $_REQUEST['nama'];
$harga = $_REQUEST['harga'];
$satuan = $_REQUEST['satuan'];
$jumlah = $_REQUEST['jumlah'];
$kategori = $_REQUEST['kategori'];
$keterangan = $_REQUEST['keterangan'];
$foto = $_REQUEST['foto'];

// Simpan Data ke Array
$data = [
    $kode, $nama,
    $harga, $satuan,
    $jumlah, $kategori,
    $foto, $keterangan,
];

// Eksekusi Tombol dengan mekanisme PDO
$model = new Barang;
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
        header('Location:index.php?page=pages/barang/view');
        break;
}

// Jika sudah selesai prosesnya, Diarahkan ke suatu halaman
header('Location:index.php?page=pages/barang/view');
