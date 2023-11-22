<!DOCTYPE html>
<html>

<head>
    <title>TAMBAH TRANSAKSI</title>
</head>
<?php
//koneksi database
include 'tugas.php';
//menangkap data yang dikirim dari form
if (!empty($_POST['save'])) {

    $TANGGAL_TRANSAKSI = $_POST['TANGGAL_TRANSAKSI'];
    $NOMOR_TRANSAKSI = $_POST['NOMOR_TRANSAKSI'];
    $JENIS_TRANSAKSI = $_POST['JENIS_TRANSAKSI'];
    $JUMLAH_TRANSAKSI = $_POST['JUMLAH_TRANSAKSI'];
    $PENJUALAN_ID = $_POST['PENJUALAN_ID'];
    $BARANG_ID = $_POST['BARANG_ID'];
    $ID_MEMBER = $_POST['ID_MEMBER'];
    $TOTAL = $_POST['TOTAL'];
    //menginput data ke database
    $a = mysqli_query($koneksi, "insert into transaksi values('','$TANGGAL_TRANSAKSI','$NOMOR_TRANSAKSI','$JENIS_TRANSAKSI','$JUMLAH_TRANSAKSI','$PENJUALAN_ID','$BARANG_ID','$ID_MEMBER','$TOTAL')");
    if ($a) {
        //mengalihkan ke halaman kembali
        header("location:tampil_transaksi.php");
    } else {
        echo mysqli_error();
    }
}
?>

<body>

    <h3>TAMBAH DATA TRANSAKSI</h3>
    <a href="tampil_transaksi.php">Kembali</a>
    <br><br>
    <form method="POST">
        <table>
            <tr>
                <td>Tanggal_Transaksi</td>
                <td><input type="date" name="TANGGAL_TRANSAKSI"></td>
            </tr>
            <tr>
                <td>Nomor_Transaksi</td>
                <td><input type="varchar" name="NOMOR_TRANSAKSI"></td>
            </tr>
            <tr>
                <td>Jenis_Transaksi</td>
                <td><input type="varchar" name="JENIS_TRANSAKSI"></td>
            </tr>
            <tr>
                <td>Jumlah_Transaksi</td>
                <td><input type="int" name="JUMLAH_TRANSAKSI"></td>
            </tr>
            <tr>
                <td>Penjualan_Id</td>
                <td><input type="int" name="PENJUALAN_ID"></td>
            </tr>
            <tr>
                <td>Barang_Id</td>
                <td><input type="int" name="BARANG_ID"></td>
            </tr>
            <tr>
                <td>Id_Member</td>
                <td><input type="int" name="ID_MEMBER"></td>
            </tr>
            <tr>
                <td>Total</td>
                <td><input type="varchar" name="TOTAL"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>

</html>