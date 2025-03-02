<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
    $sql->bind_param("ss", $username, $password);

    if ($sql->execute()) {
        echo "Pendaftaran berhasil!";
    } else {
        echo "Error: " . $sql->error;
    }
    
    $sql->close();
    $conn->close();
}
?>

<h2>Register</h2>
<form method="post" action="">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Register"><br>
    <a href="login.php">Sudah punya akun? Login!</a>
</form>

<?php
