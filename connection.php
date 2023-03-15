<?php

$adb = 'mysql:dbname=dbinventariskantor_kampusmerdeka;host=localhost';
$user = 'root';
$password = '';

try {
    $adb = new PDO($adb, $user, $password);
    $adb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'Sukses';
    $adb->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
} catch (PDOException $err) {
    echo 'Terjadi kesalahan saat koneksi<br>' .
        'Error Code:' . $err->getMessage();
}
