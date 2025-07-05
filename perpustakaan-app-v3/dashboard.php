<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';

// Hitung total buku
$resultBuku = mysqli_query($conn, "SELECT COUNT(*) AS total_buku FROM buku");
$dataBuku = mysqli_fetch_assoc($resultBuku);

// Hitung total anggota
$resultAnggota = mysqli_query($conn, "SELECT COUNT(*) AS total_anggota FROM anggota");
$dataAnggota = mysqli_fetch_assoc($resultAnggota);

// Hitung total laporan
$resultLaporan = mysqli_query($conn, "SELECT COUNT(*) AS total_laporan FROM laporan");
$dataLaporan = mysqli_fetch_assoc($resultLaporan);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>SISTEM INFORMASI PERPUSTAKAAN</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css"> <!-- Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>

<div class="d-flex" id="wrapper">
  <!-- Sidebar -->
  <div class="bg-dark border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-white text-center py-4">
      <img src="assets/img/logo.png" alt="User" width="60" class="rounded-circle"><br>
      <strong><?php echo $_SESSION['username']; ?></strong>
    </div>
    <div class="list-group list-group-flush">
      <a href="dashboard.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-home"></i> Home</a>
      <a href="buku/index.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-book"></i> Kelola Buku</a>
      <a href="anggota/index.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-users"></i> Kelola Anggota</a>
      <a href="laporan/cetak-buku.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-print"></i> Cetak Laporan</a>
      <a href="logout.php" class="list-group-item list-group-item-action bg-dark text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
  </div>

  <!-- Page Content -->
  <div id="page-content-wrapper" class="p-4 w-100">
    <div class="container-fluid">
      <h2>Sistem Informasi Perpustakaan</h2>
      <p>Selamat Datang, <strong><?php echo $_SESSION['username']; ?></strong> (<?php echo $_SESSION['role']; ?>)</p>

      <div class="row mt-4">
        <div class="col-md-3">
          <a href="buku/index.php" style="text-decoration:none;">
            <div class="card text-white bg-primary mb-3">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h4 class="card-title"><?php echo $dataBuku['total_buku']; ?></h4>
                    <p class="card-text">Total Buku</p>
                  </div>
                  <i class="fas fa-book fa-2x"></i>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a href="anggota/index.php" style="text-decoration:none;">
            <div class="card text-white bg-warning mb-3">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h4 class="card-title"><?php echo $dataAnggota['total_anggota']; ?></h4>
                    <p class="card-text">Total Anggota</p>
                  </div>
                  <i class="fas fa-users fa-2x"></i>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a href="laporan/cetak-buku.php" style="text-decoration:none;">
            <div class="card text-white bg-danger mb-3">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h4 class="card-title"><?php echo $dataLaporan['total_laporan']; ?></h4>
                    <p class="card-text">Laporan Dibuat</p>
                  </div>
                  <i class="fas fa-file-alt fa-2x"></i>
                </div>
              </div>
            </div>
          </a>
        </div>

      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
