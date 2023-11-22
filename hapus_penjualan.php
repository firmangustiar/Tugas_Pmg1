<?php
include 'tugas.php'; // Sesuaikan dengan nama file yang sesuai dengan koneksi database Anda

if (isset($_GET['id'])) {
    $id_penjualan = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM penjualan WHERE PENJUALAN_ID='$id_penjualan'");
    
    if ($query) {
        echo '<script>alert("Data penjualan berhasil dihapus"); window.location.href = "tampil_penjualann.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data penjualan"); window.location.href = "tampil_penjualann.php";</script>';
    }
} else {
    echo '<script>window.location.href = "tampil_penjualann.php";</script>';
}
