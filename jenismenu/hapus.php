<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query Hapus
    $query = "DELETE FROM tbjenismenu WHERE id_jenis = '$id'";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data Berhasil Dihapus!'); window.location='index.php';</script>";
    } else {
        // Error handling jika kategori sedang dipakai di tabel produk (Relasi FK)
        echo "<script>alert('Gagal! Kategori ini mungkin sedang digunakan pada data Produk.'); window.location='index.php';</script>";
    }
}
?>