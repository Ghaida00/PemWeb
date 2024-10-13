<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM produk";
$result = $conn->query($sql);
?>

<h2>Daftar Produk</h2>
<ul>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>
                    Nama Produk: " . $row["nama_prdk"] . " - Harga: Rp" . number_format($row["harga_prdk"]) .
                    " <a href='detail_barang.php?id=" . $row["id_prdk"] . "'>Detail</a>
                </li>";
        }
    } else {
        echo "Tidak ada produk.";
    }
    ?>


<?php
$conn->close();
?>
