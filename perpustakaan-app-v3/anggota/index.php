<?php
include '../koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM anggota");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        th {
            background-color: #f0f0f0;
        }
        .btn {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            margin: 2px;
            display: inline-block;
        }
        .btn-tambah { background-color: #28a745; color: white; }
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-hapus { background-color: #dc3545; color: white; }
        .btn-kembali { background-color: #007bff; color: white; margin-bottom: 15px; }
    </style>
</head>
<body>

    <h2>Data Anggota</h2>
    <a href="../dashboard.php" class="btn btn-kembali">← Kembali ke Dashboard</a>
    <a href="tambah.php" class="btn btn-tambah">+ Tambah Anggota</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
        <?php if (mysqli_num_rows($data) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                        <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-hapus" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        <?php else: ?>
            <tr>
                <td colspan="3" style="text-align:center;">Data anggota belum tersedia.</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>
