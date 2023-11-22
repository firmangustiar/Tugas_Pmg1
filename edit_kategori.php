<!DOCTYPE html>
<html>

<head>
    <title>EDIT KATEGORI</title>
</head>
<?php
// Koneksi ke database
include 'tugas.php';

// Menangkap ID_KATEGORI yang akan diedit
$id_kategori = $_GET['id'];

// Fetch data kategori dari database berdasarkan ID_KATEGORI
$result = mysqli_query($koneksi, "SELECT * FROM kategori WHERE ID_KATEGORI=$id_kategori");
$kategori = mysqli_fetch_assoc($result);

// Menangkap data yang dikirim dari form saat disubmit
if (!empty($_POST['save'])) {
    $NAMA_KATEGORI = $_POST['NAMA_KATEGORI'];
    $DISKON = $_POST['DISKON'];

    // Update data kategori ke database berdasarkan ID_KATEGORI
    $update_query = "UPDATE kategori SET NAMA_KATEGORI='$NAMA_KATEGORI', DISKON='$DISKON' WHERE ID_KATEGORI=$id_kategori";
    $update_result = mysqli_query($koneksi, $update_query);

    if ($update_result) {
        // Mengalihkan ke halaman tampil_kategori.php setelah berhasil diupdate
        header("location:tampil_kategori.php");
    } else {
        echo mysqli_error($koneksi);
    }
}
?>

<body>
    <h2>Pemrograman 3 2023</h2>
    <br>
    <a href="tampil_kategori.php">Kembali</a>
    <br>
    <h3>EDIT DATA KATEGORI</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Nama_Kategori</td>
                <td><input type="text" name="NAMA_KATEGORI" value="<?php echo $kategori['NAMA_KATEGORI']; ?>"></td>
            </tr>
            <tr>
                <td>Diskon</td>
                <td><input type="text" name="DISKON" value="<?php echo $kategori['DISKON']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save" value="Simpan Perubahan"></td>
            </tr>
        </table>
    </form>
</body>

</html>