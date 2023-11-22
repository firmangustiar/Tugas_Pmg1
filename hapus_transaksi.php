<?php
include 'tugas.php'; // Sesuaikan dengan nama file yang sesuai dengan koneksi database Anda

if (isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM transaksi WHERE ID_TRANSAKSI='$id_transaksi'");
    
    if ($query) {
        echo '<script>alert("Data transaksi berhasil dihapus"); window.location.href = "tampil_transaksi.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data transaksi"); window.location.href = "tampil_transaksi.php";</script>';
    }
} else {
    echo '<script>window.location.href = "tampil_transaksi.php";</script>';
}
