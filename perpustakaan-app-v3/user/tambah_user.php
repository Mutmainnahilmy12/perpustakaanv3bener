<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Pengguna</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-5">

  <h2>Tambah Pengguna Baru</h2>

  <form action="proses-tambah-user.php" method="post">
    <div class="mb-3">
      <label for="username" class="form-label">Username:</label>
      <input type="text" name="username" id="username" required class="form-control">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password:</label>
      <input type="password" name="password" id="password" required class="form-control">
    </div>

    <div class="mb-3">
      <label for="role" class="form-label">Role:</label>
      <select name="role" id="role" required class="form-select">
        <option value="">-- Pilih Role --</option>
        <option value="admin">Admin</option>
        <option value="petugas">Petugas</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
  </form>

</body>
</html>
