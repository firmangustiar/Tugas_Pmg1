<!DOCTYPE html>
<html>

<head>
    <title>Edit_Transaksi</title>
</head>
<?php
// Koneksi database
include 'tugas.php';

// Menangkap ID_TRANSAKSI yang akan diedit
$id_transaksi = $_GET['id'];

// Fetch data transaksi dari database berdasarkan ID_TRANSAKSI
$result = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE ID_TRANSAKSI=$id_transaksi");
$transaksi = mysqli_fetch_assoc($result);

// Menangkap data yang dikirim dari form saat disubmit
if (!empty($_POST['save'])) {
    $TANGGAL_TRANSAKSI = $_POST['TANGGAL_TRANSAKSI'];
    $NOMOR_TRANSAKSI = $_POST['NOMOR_TRANSAKSI'];
    $JENIS_TRANSAKSI = $_POST['JENIS_TRANSAKSI'];
    $JUMLAH_TRANSAKSI = $_POST['JUMLAH_TRANSAKSI'];
    $PENJUALAN_ID = $_POST['PENJUALAN_ID'];
    $BARANG_ID = $_POST['BARANG_ID'];
    $ID_MEMBER = $_POST['ID_MEMBER'];
    $TOTAL = $_POST['TOTAL'];

    // Update data transaksi ke database berdasarkan ID_TRANSAKSI
    $update_query = "UPDATE transaksi SET TANGGAL_TRANSAKSI='$TANGGAL_TRANSAKSI', NOMOR_TRANSAKSI='$NOMOR_TRANSAKSI', JENIS_TRANSAKSI='$JENIS_TRANSAKSI', JUMLAH_TRANSAKSI='$JUMLAH_TRANSAKSI', PENJUALAN_ID='$PENJUALAN_ID', BARANG_ID='$BARANG_ID', ID_MEMBER='$ID_MEMBER', TOTAL='$TOTAL' WHERE ID_TRANSAKSI=$id_transaksi";
    $update_result = mysqli_query($koneksi, $update_query);

    if ($update_result) {
        // Mengalihkan ke halaman tampil_transaksi.php setelah berhasil diupdate
        header("location:tampil_transaksi.php");
    } else {
        echo mysqli_error($koneksi);
    }
}
?>

<body>
    <h2>Pemrograman 3 2023</h2>
    <br>
    <a href="tampil_transaksi.php">Kembali</a>
    <br><br>
    <h3>EDIT DATA TRANSAKSI</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Tanggal_Transaksi</td>
                <td><input type="date" name="TANGGAL_TRANSAKSI" value="<?php echo $transaksi['TANGGAL_TRANSAKSI']; ?>"></td>
            </tr>
            <tr>
                <td>Nomor_Transaksi</td>
                <td><input type="text" name="NOMOR_TRANSAKSI" value="<?php echo $transaksi['NOMOR_TRANSAKSI']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis_Transaksi</td>
                <td><input type="text" name="JENIS_TRANSAKSI" value="<?php echo $transaksi['JENIS_TRANSAKSI']; ?>"></td>
            </tr>
            <tr>
                <td>Jumlah_Transaksi</td>
                <td><input type="number" name="JUMLAH_TRANSAKSI" value="<?php echo $transaksi['JUMLAH_TRANSAKSI']; ?>"></td>
            </tr>
            <tr>
                <td>Penjualan_Id</td>
                <td><input type="number" name="PENJUALAN_ID" value="<?php echo $transaksi['PENJUALAN_ID']; ?>"></td>
            </tr>
            <tr>
                <td>Barang_Id</td>
                <td><input type="number" name="BARANG_ID" value="<?php echo $transaksi['BARANG_ID']; ?>"></td>
            </tr>
            <tr>
                <td>Id_Member</td>
                <td><input type="number" name="ID_MEMBER" value="<?php echo $transaksi['ID_MEMBER']; ?>"></td>
            </tr>
            <tr>
                <td>Total</td>
                <td><input type="text" name="TOTAL" value="<?php echo $transaksi['TOTAL']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save" value="Simpan Perubahan"></td>
            </tr>
        </table>
    </form>
</body>

</html>