<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($result) === 1) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['login'] = true;
        $_SESSION['role'] = $data['role'];
        $_SESSION['username'] = $data['username'];
        header("Location: dashboard.php");
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Perpustakaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url('assets/img/bg.jpg') no-repeat center center fixed;
      background-size: cover;
    }
    .login-box {
      max-width: 400px;
      margin: 100px auto;
      background: rgba(255, 255, 255, 0.9);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }
    .login-box h3 {
      text-align: center;
      margin-bottom: 20px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-box">
      <h3>Login Perpustakaan</h3>
      <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
      <form method="POST">
        <div class="mb-3">
          <label>Username</label>
          <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100" name="login">Login</button>
      </form>
    </div>
  </div>
</body>
</html>
