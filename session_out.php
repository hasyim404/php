<?php

session_start();
unset($_SESSION['PETUGAS']);
header('Location: index.php?page=pages/home');
