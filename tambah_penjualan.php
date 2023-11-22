<!DOCTYPE html>
<html>

<head>
    <title>Tambah_Penjualan</title>
</head>
<?php
//Koneksi database
include 'tugas.php';
//Menangkap data yang dikirim dari form 
if (!empty($_POST['save'])) {

    $TANGGAL_PENJUALAN = $_POST['TANGGAL_PENJUALAN'];
    $NAMA_MEMBER = $_POST['NAMA_MEMBER'];
    $TOTAL = $_POST['TOTAL'];
    //menginput data ke database
    $a = mysqli_query($koneksi, "insert into penjualan values('','$TANGGAL_PENJUALAN','$NAMA_MEMBER','$TOTAL')");
    if ($a) {
        //mengalihkan halaman kembali
        header("location:tampil_penjualanN.php");
    } else {
        echo mysqli_error();
    }
}
?>

<body>

    <h3>TAMBAH DATA PENJUALAN</h3>
    <a href="tampil_penjualann.php">KEMBALI</a>
    <br><br>
    <form method="POST">
        <table>
            <tr>
                <td>Tanggal_Penjualan</td>
                <td><input type="date" name="TANGGAL_PENJUALAN"></td>
            </tr>
            <tr>
                <td>Nama_Member</td>
                <td><input type="varchar" name="NAMA_MEMBER"></td>
            </tr>
            <tr>
                <td>Total_harga</td>
                <td><input type="decimal" name="TOTAL"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>

</html>