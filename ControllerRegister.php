<?php

session_start();
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

// Simpan Data ke Array (Login) untuk otomatis login
$data_login = [
    $username,
    $password,
];

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

$btn_register = $_REQUEST['btn_register'];
switch ($btn_register) {
    case 'save':
        $model->save($data_register);
        break;
}


// Proses Otentikasi User
$result = $model->loginCheck($data_login);
if (!empty($result)) { // sukses login

    $_SESSION['PETUGAS'] = $result;
    require_once 'pages/partials/modaltrigger.php';
    echo
    '<script>
        $(document).ready(function() {
            swal.fire({ 
            title: "Registrasi Berhasil",
            icon: "success",
            text: "Selamat datang ' . ucfirst($nama) . '",
                type: "success" 
            }).then(function() {
                // Redirect the user
                document.location.href = "index.php?page=pages/home";
            })
        });
    </script>';
} else {

    require_once 'pages/partials/modaltrigger.php';
    echo
    '<script>
        $(document).ready(function() {
            swal.fire({ 
                title: "Error",
                icon: "error",
                text: "Gagal Register",
                type: "error" 
                }).then(function() {
                // Redirect the user
                window.location.href = "index.php?page=pages/register";
            })
        });
    </script>';
};
