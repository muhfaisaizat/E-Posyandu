<?php
require('koneksi.php');
// saveotp.php

// Ambil data dari formulir
$data = [
    'email' => $_POST['emailu'],
    'password' => $_POST['pwu'],
    'nama' => $_POST['namau'],
];

// Panggil fungsi untuk menyimpan data ke database
insertuser($data);
?>
