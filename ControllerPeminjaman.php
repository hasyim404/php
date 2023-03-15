<?php

include_once 'connection.php';
include_once 'models/Peminjaman.php';

// Tangkap Request dari Form
$karyawan = $_REQUEST['karyawan'];
$barang = $_REQUEST['barang'];
$kode = $_REQUEST['kode'];
$tgl_peminjaman = $_REQUEST['tgl_peminjaman'];
$tgl_pengembalian = $_REQUEST['tgl_pengembalian'];
$petugas = $_REQUEST['petugas'];
$keterangan = $_REQUEST['keterangan'];

// Simpan Data ke Array
$data = [
    $karyawan, $barang,
    $kode,
    $tgl_peminjaman, $tgl_pengembalian,
    $petugas, $keterangan
];

// Eksekusi Tombol dengan mekanisme PDO
$model = new Peminjaman;
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
        header('Location:index.php?page=pages/peminjaman/view');
        break;
}

// Jika sudah selesai prosesnya, Diarahkan ke suatu halaman
header('Location:index.php?page=pages/peminjaman/view');
