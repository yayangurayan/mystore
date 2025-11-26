<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM tbjenismenu WHERE id_jenis = '$id'");
$data = mysqli_fetch_assoc($ambil);

// Logika update data
if (isset($_POST['update'])) {
    $nama_jenis = htmlspecialchars($_POST['nama_jenis']);
    
    $query = "UPDATE tbjenismenu SET nama_jenis = '$nama_jenis' WHERE id_jenis = '$id'";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data Berhasil Diupdate!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Edit Jenis Menu</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nama Jenis (Kategori)</label>
                            <input type="text" name="nama_jenis" class="form-control" value="<?php echo $data['nama_jenis']; ?>" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="update" class="btn btn-warning">Update Data</button>
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>