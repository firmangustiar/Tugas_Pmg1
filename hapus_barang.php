<?php
include 'tugas.php'; // Sesuaikan dengan nama file yang sesuai dengan koneksi database Anda

if (isset($_GET['id'])) {
    $id_barang = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM barang WHERE BARANG_ID='$id_barang'");
    
    if ($query) {
        echo '<script>alert("Data barang berhasil dihapus"); window.location.href = "tampil_barang.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data barang"); window.location.href = "tampil_barang.php";</script>';
    }
} else {
    echo '<script>window.location.href = "tampil_barang.php";</script>';
}
