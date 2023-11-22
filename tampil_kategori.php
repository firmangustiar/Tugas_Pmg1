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
     <title>Kategori</title>
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
     <h1>PMG 1 | KATEGORI</h1>
     <br>
     <a href="tambah_kategori.php">+TAMBAH KATEGORI</a> |
     <br><br>
     <table border="1" cellpadding="10" cellspacing="0">
          <tr>
               <th>No</th>
               <th>Id_Kategori</th>
               <th>Nama_kategori</th>
               <th>Diskon</th>
               <th>OPSI</th>
          </tr>
          <?php
          include 'tugas.php';
          $no = 1;
          $data = mysqli_query($koneksi, "select * from kategori");
          while ($d = mysqli_fetch_array($data)) {
          ?>
               <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['ID_KATEGORI']; ?></td>
                    <td><?php echo $d['NAMA_KATEGORI']; ?></td>
                    <td><?php echo $d['DISKON']; ?></td>
                    <td>
                         <a href="edit_kategori.php?id=<?php echo $d['ID_KATEGORI']; ?>">Edit</a> |
                         <a href="hapus_kategori.php?id=<?php echo $d['ID_KATEGORI']; ?>">Hapus</a>
                    </td>
               </tr>
          <?php
          }
          ?>
     </table>




</body>

</html>