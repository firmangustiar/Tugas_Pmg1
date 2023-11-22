<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: logout.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: auto;
            padding: 10px;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 20px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .navbar a,
        .dropdown:hover .dropbtn {
            background-color: red;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body>
    <div class="navbar">

        <a href="tampil_barang.php">Barang</a>
        <a href="tampil_kategori.php">Kategori</a>
        <a href="tampil_member.php">Member</a>
        <a href="tampil_penjualann.php">Penjualan</a>
        <a href="tampil_transaksi.php">Transaksi</a>

        <a href="view_report.php">HASIL</a>
        <div class="dropdown">
            <button class="dropbtn">MENU</button>
            <div class="dropdown-content">
                <a href="tampil_user.php">User</a>
                <a href="logout.php">LOG OUT</a>

            </div>
        </div>
    </div>
    <h1>PMG 1 | TRANSAKSI</h1>
    <br>
    <a href="tambah_transaksi.php">+TAMBAH TRANSAKSI</a> |
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Id_Transaksi</th>
            <th>Tgl_Transaksi</th>
            <th>No_Transaksi</th>
            <th>Jenis_Transaksi</th>
            <th>Jml_Transaksi</th>
            <th>Penjualan_Id</th>
            <th>Barang_Id</th>
            <th>Id_Member</th>
            <th>Total</th>
            <th>Opsi</th>
        </tr>
        <?php
        include 'tugas.php';
        $no = 1;
        $data = mysqli_query($koneksi, "Select * From transaksi");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['ID_TRANSAKSI']; ?></td>
                <td><?php echo $d['TANGGAL_TRANSAKSI']; ?></td>
                <td><?php echo $d['NOMOR_TRANSAKSI']; ?></td>
                <td><?php echo $d['JENIS_TRANSAKSI']; ?></td>
                <td><?php echo $d['JUMLAH_TRANSAKSI']; ?></td>
                <td><?php echo $d['PENJUALAN_ID']; ?></td>
                <td><?php echo $d['BARANG_ID']; ?></td>
                <td><?php echo $d['ID_MEMBER']; ?></td>
                <td><?php echo $d['TOTAL']; ?></td>
                <td>
                    <a href="edit_transaksi.php?id=<?php echo $d['ID_TRANSAKSI']; ?>">Edit</a> |
                    <a href="hapus_transaksi.php?id=<?php echo $d['ID_TRANSAKSI']; ?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>






</body>

</html>