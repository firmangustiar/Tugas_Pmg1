<?php
include 'tugas.php'; // Sesuaikan dengan nama file yang sesuai dengan koneksi database Anda

if (isset($_GET['id'])) {
    $id_kategori = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM kategori WHERE ID_KATEGORI='$id_kategori'");

    if ($query) {
        echo '<script>alert("Data kategori berhasil dihapus"); window.location.href = "tampil_kategori.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data kategori"); window.location.href = "tampil_kategori.php";</script>';
    }
} else {
    echo '<script>window.location.href = "tampil_kategori.php";</script>';
}
