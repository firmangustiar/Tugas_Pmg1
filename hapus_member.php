<?php
include 'tugas.php'; // Sesuaikan dengan nama file yang sesuai dengan koneksi database Anda

if (isset($_GET['id'])) {
    $id_member = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM member WHERE ID_MEMBER='$id_member'");

    if ($query) {
        echo '<script>alert("Data member berhasil dihapus"); window.location.href = "tampil_member.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data member"); window.location.href = "tampil_member.php";</script>';
    }
} else {
    echo '<script>window.location.href = "tampil_member.php";</script>';
}
