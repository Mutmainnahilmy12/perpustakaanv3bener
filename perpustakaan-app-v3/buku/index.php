<?php
include '../koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
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
        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f5f5f5;
        }
        .btn {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            margin: 0 2px;
            display: inline-block;
        }
        .btn-edit {
            background-color: #ffc107;
            color: black;
        }
        .btn-hapus {
            background-color: #dc3545;
            color: white;
        }
        .btn-tambah {
            background-color: #28a745;
            color: white;
        }
        .btn-kembali {
            background-color: #007bff;
            color: white;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <h2>Data Buku</h2>

    <a href="../dashboard.php" class="btn btn-kembali">← Kembali ke Dashboard</a>
    <a href="tambah.php" class="btn btn-tambah">+ Tambah Buku</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($data) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['judul'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                        <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-hapus" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align:center;">Data buku belum ada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
