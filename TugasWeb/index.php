<?php
session_start();
include 'db.php';

if (isset($_SESSION['username'])) {
    echo "<h2>Selamat datang, " . $_SESSION['username'] . "!</h2>";
    echo '<a href="list_barang.php">Lihat Daftar Barang</a>';
} else {
    header("Location: login.php");
}
?>
