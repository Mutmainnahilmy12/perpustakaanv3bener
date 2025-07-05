<?php
include '../koneksi.php'; // sesuaikan path koneksi

if (isset($_POST['submit'])) {
    $judul= $_POST['judul'];

    $query = mysqli_query($conn, "INSERT INTO buku (judul) VALUES ('$judul')");

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Gagal menambah buku.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>
    <h2>Tambah Buku</h2>
    <form action="" method="post">
        <label>judul Buku:</label><br>
        <input type="text" name="judul" required><br><br>
        <input type="submit" name="submit" value="Simpan">
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
<?php
include '../koneksi.php'; // Pastikan path ini benar

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];

    $query = mysqli_query($conn, "INSERT INTO buku (judul) VALUES ('$judul')");

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Gagal menambah buku.";
    }
}
?>
