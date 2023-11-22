<!DOCTYPE html>
<html>

<head>
    <title>Edit_Penjualan</title>
</head>
<?php
// Koneksi ke database
include 'tugas.php';

// Menangkap PENJUALAN_ID yang akan diedit
$id_penjualan = $_GET['id'];

// Fetch data penjualan dari database berdasarkan PENJUALAN_ID
$result = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE PENJUALAN_ID=$id_penjualan");
$penjualan = mysqli_fetch_assoc($result);

// Menangkap data yang dikirim dari form saat disubmit
if (!empty($_POST['save'])) {
    $TANGGAL_PENJUALAN = $_POST['TANGGAL_PENJUALAN'];
    $NAMA_MEMBER = $_POST['NAMA_MEMBER'];
    $TOTAL = $_POST['TOTAL'];

    // Update data penjualan ke database berdasarkan PENJUALAN_ID
    $update_query = "UPDATE penjualan SET TANGGAL_PENJUALAN='$TANGGAL_PENJUALAN', NAMA_MEMBER='$NAMA_MEMBER', TOTAL='$TOTAL' WHERE PENJUALAN_ID=$id_penjualan";
    $update_result = mysqli_query($koneksi, $update_query);

    if ($update_result) {
        // Mengalihkan ke halaman tampil_penjualann.php setelah berhasil diupdate
        header("location:tampil_penjualann.php");
    } else {
        echo mysqli_error($koneksi);
    }
}
?>

<body>
    <h2>Pemograman 3 2023</h2>
    <br>
    <a href="tampil_penjualann.php">Kembali</a>
    <br><br>
    <h3>EDIT DATA PENJUALAN</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Tanggal_Penjualan</td>
                <td><input type="date" name="TANGGAL_PENJUALAN" value="<?php echo $penjualan['TANGGAL_PENJUALAN']; ?>"></td>
            </tr>
            <tr>
                <td>Nama_Member</td>
                <td><input type="varchar" name="NAMA_MEMBER" value="<?php echo $penjualan['NAMA_MEMBER']; ?>"></td>
            </tr>
            <tr>
                <td>Total_harga</td>
                <td><input type="decimal" name="TOTAL" value="<?php echo $penjualan['TOTAL']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save" value="Simpan Perubahan"></td>
            </tr>
        </table>
    </form>
</body>

</html>