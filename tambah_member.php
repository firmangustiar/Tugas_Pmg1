<!DOCTYPE html>
<html>

<head>
    <title>Tambah_Member</title>
</head>
<?php
//Koneksi database
include 'tugas.php';
//Menangkap data yang dikirim dari form 
if (!empty($_POST['save'])) {

    $KODE_MEMBER = $_POST['KODE_MEMBER'];
    $NAMA_MEMBER = $_POST['NAMA_MEMBER'];
    $LEVEL = $_POST['LEVEL'];
    //menginput data ke database
    $a = mysqli_query($koneksi, "insert into member values('','$KODE_MEMBER','$NAMA_MEMBER','$LEVEL')");
    if ($a) {
        //mengalihkan halaman kembali
        header("location:tampil_member.php");
    } else {
        echo mysqli_error();
    }
}
?>

<body>

    <h3>TAMBAH DATA MEMBER</h3>
    <a href="tampil_member.php">KEMBALI</a>
    <br><br>
    <form method="POST">
        <table>
            <tr>
                <td>Kode_Member</td>
                <td><Input type="VARCHAR" name="KODE_MEMBER"></td>
            </tr>
            <tr>
                <td>nama_member</td>
                <td><input type="VARCHAR" name="NAMA_MEMBER"></td>
            </tr>
            <tr>
                <td>Level</td>
                <td><select name="LEVEL">
                        <option value="">---Pilih</option>
                        <option value="Gold">Gold</option>
                        <option value="Silver">Silver</option>
                        <option value="Platinum">Platinum</option>
                    </select>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>

</html>