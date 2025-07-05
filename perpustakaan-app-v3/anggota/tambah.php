<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    mysqli_query($conn, "INSERT INTO anggota (nama) VALUES ('$nama')");
    header("Location: index.php");
}
?>

<h2>Tambah Anggota</h2>
<form method="post">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br><br>
    <input type="submit" name="submit" value="Simpan">
    <a href="index.php">Kembali</a>
</form>
