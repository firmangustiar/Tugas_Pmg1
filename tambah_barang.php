<!DOCTYPE html>
<html>

<head>
    <title>Tambah_Barang</title>
</head>
<?php
//Koneksi database
include 'tugas.php';
//Menangkap data yang dikirim dari form 
if (!empty($_POST['save'])) {


    $NAMA_BARANG = $_POST['NAMA_BARANG'];
    $KODE_BARANG = $_POST['KODE_BARANG'];
    $QTY = $_POST['QTY'];
    $ID_KATEGORI = $_POST['ID_KATEGORI'];
    //menginput data ke database
    $a = mysqli_query($koneksi, "insert into barang values('','$NAMA_BARANG','$KODE_BARANG','$QTY','$ID_KATEGORI')");
    if ($a) {
        //mengalihkan halaman kembali
        header("location:tampil_barang.php");
    } else {
        echo mysqli_error();
    }
}

?>

<body>
    <h3>TAMBAH DATA BARANG</h3>
    <a href="tampil_barang.php">KEMBALI</a>
    <br><br>
    <form method="POST">
        <table>
            <tr>
                <td>Nama_Barang</td>
                <td><Input type="text" name="NAMA_BARANG"></td>
            </tr>
            <tr>
                <td>Kode_barang</td>
                <td><input type="text" name="KODE_BARANG"></td>
            </tr>
            <tr>
                <td>Qty</td>
                <td><input type="number" name="QTY"></td>
            </tr>
            <tr>
                <td>Id Kategori</td>
                <td><input type="integer" name="ID_KATEGORI"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>

</html>