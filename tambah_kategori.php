<!DOCTYPE html>
<html>

<head>
    <title>TAMBAH KATEGORI</title>
</head>
<?php
//Koneksi ke database
include 'tugas.php';
//Menangkap data yang dikirim dari form
if (!empty($_POST['save'])) {
    $NAMA_KATEGORI = $_POST['NAMA_KATEGORI'];
    $DISKON = $_POST['DISKON'];
    //menginput data ke database
    $a = mysqli_query($koneksi, "insert into kategori values('','$NAMA_KATEGORI','$DISKON')");
    if ($a) {
        //mengalihkan ke halaman kembali
        header("location:tampil_kategori.php");
    } else {
        echo mysqli_error();
    }
}
?>

<body>

    <h3>TAMBAH DATA KATEGORI</h3>
    <a href="tampil_kategori.php">Kembali</a>
    <br><br>
    <form method="POST">
        <table>
            <tr>
                <td>Nama_Kategori</td>
                <td><input type="text" name="NAMA_KATEGORI"></td>
            </tr>
            <tr>
                <td>Diskon</td>
                <td><input type="text" name="DISKON"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>

</html>