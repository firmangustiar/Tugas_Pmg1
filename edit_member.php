<!DOCTYPE html>
<html>

<head>
    <title>EDIT MEMBER</title>
</head>
<?php
// Koneksi ke database
include 'tugas.php';

// Menangkap ID_MEMBER yang akan diedit
$id_member = $_GET['id'];

// Fetch data member dari database berdasarkan ID_MEMBER
$result = mysqli_query($koneksi, "SELECT * FROM member WHERE ID_MEMBER=$id_member");
$member = mysqli_fetch_assoc($result);

// Menangkap data yang dikirim dari form saat disubmit
if (!empty($_POST['save'])) {
    $KODE_MEMBER = $_POST['KODE_MEMBER'];
    $NAMA_MEMBER = $_POST['NAMA_MEMBER'];
    $LEVEL = $_POST['LEVEL'];

    // Update data member ke database berdasarkan ID_MEMBER
    $update_query = "UPDATE member SET KODE_MEMBER='$KODE_MEMBER', NAMA_MEMBER='$NAMA_MEMBER', LEVEL='$LEVEL' WHERE ID_MEMBER=$id_member";
    $update_result = mysqli_query($koneksi, $update_query);

    if ($update_result) {
        // Mengalihkan ke halaman tampil_member.php setelah berhasil diupdate
        header("location:tampil_member.php");
    } else {
        echo mysqli_error($koneksi);
    }
}
?>

<body>
    <h2>Pemrograman 3 2023</h2>
    <br>
    <a href="tampil_member.php">Kembali</a>
    <br><br>
    <h3>EDIT DATA MEMBER</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Kode_Member</td>
                <td><input type="text" name="KODE_MEMBER" value="<?php echo $member['KODE_MEMBER']; ?>"></td>
            </tr>
            <tr>
                <td>Nama_Member</td>
                <td><input type="text" name="NAMA_MEMBER" value="<?php echo $member['NAMA_MEMBER']; ?>"></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>
                    <select name="LEVEL">
                        <option value="Gold" <?php if ($member['LEVEL'] == 'Gold') echo 'selected'; ?>>Gold</option>
                        <option value="Silver" <?php if ($member['LEVEL'] == 'Silver') echo 'selected'; ?>>Silver</option>
                        <option value="Platinum" <?php if ($member['LEVEL'] == 'Platinum') echo 'selected'; ?>>Platinum</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save" value="Simpan Perubahan"></td>
            </tr>
        </table>
    </form>
</body>

</html>