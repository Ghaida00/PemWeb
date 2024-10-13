<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = $conn->prepare("SELECT * FROM produk WHERE id_prdk = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Produk tidak ditemukan.";
        exit();
    }
} else {
    echo "ID produk tidak diberikan.";
    exit();
}
?>

<h2>Detail Produk</h2>
<p>Nama Produk: <?php echo $row["nama_prdk"]; ?></p>
<p>Deskripsi: <?php echo $row["deskripsi_prdk"]; ?></p>
<p>Harga: Rp<?php echo number_format($row["harga_prdk"]); ?></p>
<p>Stok: <?php echo $row["stok_prdk"]; ?></p>
<a href="list_barang.php">Kembali ke Daftar Barang</a> | <a href="logout.php">Logout</a>


<?php
$sql->close();
$conn->close();
?>
