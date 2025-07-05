<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Pengguna</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
  <h2>Daftar Pengguna</h2>
  <a href="../dashboard.php" class="btn btn-secondary mb-3">← Kembali</a>
  <a href="tambah_user.php" class="btn btn-primary mb-3">+ Tambah Pengguna</a>

  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Username</th>
        <th>Role</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $result = mysqli_query($conn, "SELECT * FROM user ORDER BY id DESC");
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>$no</td>
                <td>{$row['username']}</td>
                <td>{$row['role']}</td>
                <td>
                  <a href='hapus_user.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin hapus?')\">Hapus</a>
                </td>
              </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
