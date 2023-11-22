<?php
include 'tugas.php'; // Sesuaikan dengan nama file yang sesuai dengan koneksi database Anda

if (isset($_GET['id'])) {
    $id_user = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM user WHERE ID_USER='$id_user'");
    
    if ($query) {
        echo '<script>alert("Data pengguna berhasil dihapus"); window.location.href = "tampil_user.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data pengguna"); window.location.href = "tampil_user.php";</script>';
    }
} else {
    echo '<script>window.location.href = "tampil_user.php";</script>';
}
