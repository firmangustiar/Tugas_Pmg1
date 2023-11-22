<!DOCTYPE html>
<html>

<head>
    <title>Edit_User</title>
</head>
<?php
// Koneksi database
include 'tugas.php';

// Menangkap ID_USER yang akan diedit
$id_user = $_GET['id'];

// Fetch data user dari database berdasarkan ID_USER
$result = mysqli_query($koneksi, "SELECT * FROM user WHERE ID_USER=$id_user");
$user = mysqli_fetch_assoc($result);

// Menangkap data yang dikirim dari form saat disubmit
if (!empty($_POST['save'])) {
    $NAMA_USER = $_POST['NAMA_USER'];
    $PASSWORD = $_POST['PASSWORD'];
    $JABATAN = $_POST['JABATAN'];
    $STATUS = $_POST['STATUS'];

    // Update data user ke database berdasarkan ID_USER
    $update_query = "UPDATE user SET NAMA_USER='$NAMA_USER', PASSWORD='$PASSWORD', JABATAN='$JABATAN', STATUS='$STATUS' WHERE ID_USER=$id_user";
    $update_result = mysqli_query($koneksi, $update_query);

    if ($update_result) {
        // Mengalihkan ke halaman tampil_user.php setelah berhasil diupdate
        header("location:tampil_user.php");
    } else {
        echo mysqli_error($koneksi);
    }
}
?>

<body>
    <h2>Pemrograman 3 2022</h2>
    <br>
    <a href="tampil_user.php">Kembali</a>
    <br><br>
    <h3>EDIT DATA USER</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Nama_User</td>
                <td><input type="text" name="NAMA_USER" value="<?php echo $user['NAMA_USER']; ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="PASSWORD" value="<?php echo $user['PASSWORD']; ?>"></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>
                    <select name="JABATAN">
                        <option value="Admin" <?php if ($user['JABATAN'] == 'Admin') echo 'selected'; ?>>Admin</option>
                        <option value="Staff" <?php if ($user['JABATAN'] == 'Staff') echo 'selected'; ?>>Staff</option>
                        <option value="Supervisor" <?php if ($user['JABATAN'] == 'Supervisor') echo 'selected'; ?>>Supervisor</option>
                        <option value="Manager" <?php if ($user['JABATAN'] == 'Manager') echo 'selected'; ?>>Manager</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="STATUS">
                        <option value="Aktif" <?php if ($user['STATUS'] == 'Aktif') echo 'selected'; ?>>Aktif</option>
                        <option value="Tidak Aktif" <?php if ($user['STATUS'] == 'Tidak Aktif') echo 'selected'; ?>>Tidak Aktif</option>
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