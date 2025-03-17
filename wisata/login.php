<?php
session_start();
include 'db.php'; // Connect to the database

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Encrypt the password using MD5

    // Check if admin credentials are correct
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows ($result) == 1 ) {
        $_SESSION['admin'] = $username;
        header('Location: add_wisata.php'); // Redirect to admin dashboard
    } else {
        echo "<script>alert('Invalid login credentials')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div class="nav__header">
        <div class="nav__logo">
          <a href="#" class="logo">BiBeach</a>
        </div>
      </div>
    </nav>

    <header>
      <h1>Login For Admin</h1><div class="container"> 
        <h2>Login</h2>
    <div class="container">
        
        <form method="post" action="add_wisata.php">
            Username: <input type="text" name="username" required><br><br>
            Password: <input type="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>

    </div>
</body>
</html>