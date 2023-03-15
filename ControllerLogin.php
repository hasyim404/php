<?php

session_start();
include_once 'connection.php';
include_once 'models/Petugas.php';

// Tangkap Request dari Form  Login
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

// Simpan Data ke Array (Login)
$data_login = [
  $username,
  $password,
];


// Eksekusi Tombol dengan mekanisme PDO
$model = new Petugas;

// Proses Otentikasi User
$result = $model->loginCheck($data_login);
if (!empty($result)) { // sukses login

  $_SESSION['PETUGAS'] = $result;

  require 'pages/partials/modaltrigger.php';
  echo
  '<script>
    $(document).ready(function() {
        swal.fire({ 
          title: "Login Berhasil",
          icon: "success",
           text: "Selamat datang ' . ucfirst($username) . '",
            type: "success" 
          }).then(function() {
            // Redirect the user
            document.location.href = "index.php?page=pages/home";
            })});
    </script>';
} else {

  require 'pages/partials/modaltrigger.php';

  echo
  '<script>
    $(document).ready(function() {
        swal.fire({ 
          title: "Login Failed",
          icon: "error",
           text: "Username atau Password salah",
            type: "error" 
          }).then(function() {
            // Redirect the user
            window.location.href = "index.php?page=pages/login";
            })});
    </script>';
};
