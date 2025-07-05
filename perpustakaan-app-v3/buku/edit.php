<?php
include '../koneksi.php';

$id = $_GET['id'];
$buku = mysqli_query($conn, "SELECT * FROM buku WHERE id=$id");
$data = mysqli_fetch_assoc($buku);

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    mysqli_query($conn, "UPDATE buku SET judul='$judul' WHERE id=$id");
    header("Location: index.php");
}
?>

<h2>Edit Buku</h2>
<form method="post">
    <label>Judul Buku:</label><br>
    <input type="text" name="judul" value="<?= $data['judul'] ?>" required><br><br>
    <input type="submit" name="submit" value="Simpan">
    <a href="index.php">Kembali</a>
</form>
