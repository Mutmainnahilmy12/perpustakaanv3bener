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
  <title>Laporan Buku</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4">Daftar Laporan</h2>
  <a href="../dashboard.php" class="btn btn-secondary mb-3">← Kembali</a>
<a href="tambah-laporan.php" class="btn btn-success mb-3">+ Tambah Laporan</a>


  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>Tanggal</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $result = mysqli_query($conn, "SELECT * FROM laporan ORDER BY tanggal DESC");
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td>".$row['judul']."</td>";
        echo "<td>".$row['isi']."</td>";
        echo "<td>".$row['tanggal']."</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
