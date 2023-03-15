<?php

include_once 'connection.php';
include_once 'models/PengadaanUnit.php';

// Tangkap Request dari Form Register & Login
$no_pengadaan = $_REQUEST['no_pengadaan'];
$pengadaan_id = $_REQUEST['pengadaan_id'];
$jenis = $_REQUEST['jenis'];
$keterangan = $_REQUEST['keterangan'];
$barang = $_REQUEST['barang'];
$deskripsi_barang = $_REQUEST['deskripsi_barang'];
$harga = $_REQUEST['harga'];
$jumlah = $_REQUEST['jumlah'];

// Simpan Data ke Array (Register)
$data = [
    $no_pengadaan,
    $pengadaan_id,
    $jenis,
    $keterangan,
    $barang,
    $deskripsi_barang,
    $harga,
    $jumlah
];

// Eksekusi Tombol dengan mekanisme PDO
$model = new PengadaanUnit;
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
        header('Location:index.php?page=pages/pengadaan-unit/view');
        break;
}

// Jika sudah selesai prosesnya, Diarahkan ke suatu halaman
header('Location:index.php?page=pages/pengadaan-unit/view');
