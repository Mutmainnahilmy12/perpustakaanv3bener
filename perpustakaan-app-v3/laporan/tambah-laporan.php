<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}
include '../koneksi.php';

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = htmlspecialchars($_POST['judul']);
    $isi = htmlspecialchars($_POST['isi']);
    $tanggal = date("Y-m-d"); // Tanggal saat ini

    // Simpan ke database
    $query = "INSERT INTO laporan (judul, isi, tanggal) VALUES ('$judul', '$isi', '$tanggal')";
    if (mysqli_query($conn, $query)) {
        header("Location: cetak-buku.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Laporan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
  <h2>Tambah Laporan Baru</h2>
  <form method="POST" action="">
    <div class="mb-3">
      <label for="judul" class="form-label">Judul Laporan</label>
      <input type="text" class="form-control" id="judul" name="judul" required>
    </div>
    <div class="mb-3">
      <label for="isi" class="form-label">Isi Laporan</label>
      <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="cetak-buku.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
