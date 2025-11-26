<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kategori - Tekonolojia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Jenis Menu (Kategori)</h4>
            <a href="tambah.php" class="btn btn-light btn-sm fw-bold">+ Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th width="50" class="text-center">No</th>
                        <th>Nama Jenis Menu</th>
                        <th width="200" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM tbjenismenu ORDER BY id_jenis ASC");
                    
                    // Cek jika data ada
                    if(mysqli_num_rows($query) > 0){
                        while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_jenis']; ?></td>
                        <td class="text-center">
                            <a href="edit.php?id=<?php echo $data['id_jenis']; ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                            <a href="hapus.php?id=<?php echo $data['id_jenis']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='3' class='text-center'>Belum ada data kategori.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>