<?php
session_start();

// hapus semua
unset($_SESSION["todolist"]);

// Set pesan sukses
$_SESSION['message'] = 'Semua data peserta telah dihapus!';
$_SESSION['type'] = 'success';

// Redirect kembali ke halaman daftar peserta
header("Location: proses.php");
exit();
