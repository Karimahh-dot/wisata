<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT); // Enkripsi password

    // Menambahkan user ke database
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Registrasi berhasil! Silakan login.";
    } else {
        echo "Registrasi gagal: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
    <div class="container">
        <h2>Registrasi</h2>
        <form method="post" action="register.php">
            Username: <input type="text" name="username" required><br><br>
            Password: <input type="password" name="password" required><br><br>
            <input type="submit" value="Register">
        </form>
        <a href="login.php">Sudah punya akun? Login di sini</a>
    </div>
</body>
</html>