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
    <title>Hasil</title>
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
    <h1>PMG 1 | HASIL</h1>
    <br><br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Nama Member</th>
            <th>Level</th>
            <th>Diskon Member</th>
            <th>Diskon Barang</th>
            <th>Total Pembelian</th>
            <th>Total Diskon</th>
            <th>Total Transaksi</th>
        </tr>
        <?php
        include 'tugas.php';

        $query = "SELECT 
            m.NAMA_MEMBER AS member,
            m.LEVEL AS LEVEL,
            CONCAT(
                CASE 
                WHEN m.LEVEL = 'Platinum' THEN '15%'
                WHEN m.LEVEL = 'Gold' THEN '10%'
                WHEN m.LEVEL = 'Silver' THEN '5%'
                ELSE '0%'
                END )

            AS 'Diskon_Member',
            CASE 
            WHEN SUM(t.total) > 100000 THEN '10%'
            ELSE '0%'
            END 
            
            AS 'Diskon_barang',
            SUM(t.total) AS 'Total_Pembelian',
            (
                CASE
                WHEN m.LEVEL = 'Platinum' THEN SUM(t.total) * 0.15
                WHEN m.LEVEL = 'Gold' THEN SUM(t.total) * 0.10
                WHEN m.LEVEL = 'Silver' THEN SUM(t.total) * 0.05
                ELSE 0
                END
            ) + 
            (
                CASE 
                WHEN SUM(t.total) > 100000 THEN SUM(t.total) * 0.10
                ELSE 0
                END ) 

            AS 'Total_Diskon',
            SUM(t.total) -
            (
                CASE
                WHEN m.LEVEL = 'Platinum' THEN SUM(t.total) * 0.15
                WHEN m.LEVEL = 'Gold' THEN SUM(t.total) * 0.10
                WHEN m.LEVEL = 'Silver' THEN SUM(t.total) * 0.05
                ELSE 0
                END
            ) - (
                CASE 
                WHEN SUM(t.total) > 100000 THEN SUM(t.total) * 0.10
                ELSE 0
                END )
            AS 'Total_Transaksi'
        FROM member m
        JOIN penjualan j ON m.nama_member = j.NAMA_MEMBER
        JOIN transaksi t ON j.PENJUALAN_ID = t.PENJUALAN_ID
        GROUP BY m.NAMA_MEMBER, m.LEVEL";

        $result = $koneksi->query($query);

        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['member'] . "</td>";
                echo "<td>" . $row['LEVEL'] . "</td>";
                echo "<td>" . $row['Diskon_Member'] . "</td>";
                echo "<td>" . $row['Diskon_barang'] . "</td>";
                echo "<td>" . $row['Total_Pembelian'] . "</td>";
                echo "<td>" . $row['Total_Diskon'] . "</td>";
                echo "<td>" . $row['Total_Transaksi'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "Tidak ada data transaksi.";
        }
        $koneksi->close();
        ?>
    </table>




</body>

</html>