<?php
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM anggota WHERE id=$id"));

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    mysqli_query($conn, "UPDATE anggota SET nama='$nama' WHERE id=$id");
    header("Location: index.php");
}
?>

<h2>Edit Anggota</h2>
<form method="post">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>
    <input type="submit" name="submit" value="Update">
    <a href="index.php">Kembali</a>
</form>
