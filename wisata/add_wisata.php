<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
}

include 'db.php'; // Koneksi ke database

if (isset($_POST['submit'])) {
    $destinasi_name = $_POST['destinasi_name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target = "img/" . basename($image); // Pastikan ada '/' setelah 'img'

    // Prepared statement untuk mencegah SQL injection
    $stmt = $conn->prepare("INSERT INTO tbdestinasi (name, description, image) VALUES ( $destinasi_name, $description, $image)");
    mysqli_query($conn, $query);
       
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "<script>alert('Informasi destinasi berhasil ditambahkan');</script>";
        }
    } else {
        echo "<script>alert('Gagal menambahkan informasi destinasi');</script>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
      rel="stylesheet"
    />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center; /* Align all content to the center */
        }

        /* Navbar Styling */
        :root {
        --primary: #006ba8;
        --bg: #010101;
        }

        .navbar {
            background-color: var(--bg);
            padding: 20px;
            text-align: center;
            color: white;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .navbar a {
            font-size: 24px;
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar-logo span {
            font-weight: bold;
            color: var(--primary);
        }

        .navbar a.active {
            color: white;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="file"] {
            margin: 10px 0;
        }

        button {
            background-color: var(--primary);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        @media (max-width: 768px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar Start -->
    <div class="navbar">
    <a href="index.php" class="navbar-logo">Dashboard<span>Admin</span>.</a>
    </div>
    <!-- Navbar End -->

    <h2>Welcome, Admin</h2>
    <form action="add_wisata.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="product_name" placeholder="Nama Produk" required>
    <textarea name="description" placeholder="Deskripsi" required></textarea>
    <input type="file" name="image" required>
    <button type="submit" name="submit">Tambah Wisata</button>
</form>
</body>
</html>
