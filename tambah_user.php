<!DOCTYPE html>
<html>

<head>
    <title>pemograman3.com</title>
</head>
<?php
// koneksi databse
include 'tugas.php';
// menangkap data yang di kirim dari from 
if (!empty($_POST['save'])) {

    $NAMA_USER = strtolower($_POST['NAMA_USER']);
    $PASSWORD = $_POST['PASSWORD'];
    $JABATAN = $_POST['JABATAN'];
    $STATUS = $_POST['STATUS'];
    // mengimput data ke database 
    $PASSWORD = password_hash($PASSWORD, PASSWORD_DEFAULT);
    $a = mysqli_query($koneksi, "insert into user values('','$NAMA_USER', '$PASSWORD', '$JABATAN', '$STATUS')");
    if ($a) {
        // mengalikan halaman kembali
        header("location:tampil_user.php");
    } else {
        echo mysqli_error();
    }
}

?>

<body>
    <h3>TAMBAH DATA USER</H3>
    <a href="tampil_user.php">KEMBALI</a>
    <br><br>
    <form method="POST">
        <table>
            </tr>
            <td>Nama_User</td>
            <td><input type="varchar" name="NAMA_USER" autocomplete="off"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="varchar" name="PASSWORD" autocomplete="off"></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td><select name="JABATAN">
                        <option value="">---Pilih</option>
                        <option value="Admin">Admin</option>
                        <option value="Staff">Staff</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Manager">Manager</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td><select name="STATUS">
                        <option value="">---Pilih</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
        <form>
</body>

</html>