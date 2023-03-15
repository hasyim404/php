<?php

include_once 'connection.php';
include_once 'models/Petugas.php';

// Tangkap Request dari Form Register & Login
$nip = $_REQUEST['nip'];
$nama = $_REQUEST['nama'];
$no_telp = $_REQUEST['no_telp'];
$gender = $_REQUEST['gender'];
$email = $_REQUEST['email'];
$alamat = $_REQUEST['alamat'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$role = $_REQUEST['role'];
$foto = $_REQUEST['foto'];

// Simpan Data ke Array (Register)
$data_register = [
    $nip,
    $nama,
    $gender,
    $no_telp,
    $alamat,
    $username,
    $email,
    $password,
    $role,
    $foto
];

// Eksekusi Tombol dengan mekanisme PDO
$model = new Petugas;
$tombol = $_REQUEST['process'];

switch ($tombol) {
    case 'save':
        $model->save($data_register);
        break;

    case 'edit':
        // Tangkap Hidden Field idx untuk klausa where id ? 10 (klausa where id = ?)
        $data_register[] = $_REQUEST['idx'];
        $model->edit($data_register);
        break;

    case 'delete':
        unset($data_register);
        $model->delete($_REQUEST['idx']);
        break;

    default:
        header('Location:index.php?page=pages/petugas/view');
        break;
}

// Jika sudah selesai prosesnya, Diarahkan ke suatu halaman
header('Location:index.php?page=pages/petugas/view');
