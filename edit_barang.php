<?php
include 'tugas.php'; // Sesuaikan dengan nama file yang sesuai dengan koneksi database Anda

if (isset($_GET['id'])) {
    $id_barang = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE BARANG_ID='$id_barang'");
    $data = mysqli_fetch_array($query);
} else {
    header("location:tampil_barang.php");
    exit();
}

if (isset($_POST['save'])) {
    $nama_barang = $_POST['NAMA_BARANG'];
    $kode_barang = $_POST['KODE_BARANG'];
    $qty = $_POST['QTY'];
    $id_kategori = $_POST['ID_KATEGORI'];

    $query = mysqli_query($koneksi, "UPDATE barang SET NAMA_BARANG='$nama_barang', KODE_BARANG='$kode_barang', QTY='$qty', ID_KATEGORI='$id_kategori' WHERE BARANG_ID='$id_barang'");

    if ($query) {
        echo '<script>alert("Data barang berhasil diupdate"); window.location.href = "tampil_barang.php";</script>';
    } else {
        echo '<script>alert("Gagal mengupdate data barang"); window.location.href = "edit_barang.php?id=' . $id_barang . '";</script>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit_Barang</title>
</head>

<body>
    <h2>Pemrograman 3 2023</h2>
    <br>
    <a href="tampil_barang.php">KEMBALI</a>
    <br><br>
    <h3>EDIT DATA BARANG</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Nama_Barang</td>
                <td><input type="text" name="NAMA_BARANG" value="<?php echo $data['NAMA_BARANG']; ?>"></td>
            </tr>
            <tr>
                <td>Kode_barang</td>
                <td><input type="text" name="KODE_BARANG" value="<?php echo $data['KODE_BARANG']; ?>"></td>
            </tr>
            <tr>
                <td>Qty</td>
                <td><input type="number" name="QTY" value="<?php echo $data['QTY']; ?>"></td>
            </tr>
            <tr>
                <td>Id Kategori</td>
                <td><input type="number" name="ID_KATEGORI" value="<?php echo $data['ID_KATEGORI']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>

</html>