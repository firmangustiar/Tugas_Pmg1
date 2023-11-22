<!-- Ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooootak -->
<?php
session_start();
include "tugas.php";


if (!isset($_SESSION["login"])) {
    header("locaction: index.php");
}


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE NAMA_USER = '$username'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["PASSWORD"])) {

            $_SESSION["login"] = true;
            $_SESSION["JABATAN"] = $row["JABATAN"];

            header("location: tampil_user.php");
            exit;
        }
    }
    $error = true;
}


?>
<!-- Ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooootak -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME</title>
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

        .text {
            text-align: center;
            margin-top: 50px;

        }

        .login table {
            margin-left: 490px;
            border: 3px double black;
            border-radius: 10px;
            padding: 10px;
            background-color: aquamarine;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="">FORM LOGIN</a>
        <div class="dropdown">
            <button class="dropbtn">Owner</button>
            <div class="dropdown-content">
                <a href="#Firman_Gustiar">Nama : Firman Gustiar</a>
                <a href="#Sistem_Informasi">Prodi : Sistem Informasi</a>
                <a href="#Regular_Malam">Kelas : Regular Malam</a>
            </div>
        </div>
    </div>
    <div class="text">
        <h1>"PEMOGRAMAN 1 2023"</h1>
        <H3>Created by FIRMAN GUSTIAR</H3>
        <?php if (isset($error)) : ?>
            <p>Usernama/Password Salah....!</p>
        <?php endif; ?>

    </div>

    <div class="login">
        <form action="" method="post">
            <table>
                <tr>
                    <th>Username</th>
                    <th>:</th>
                    <th><input type="text" name="username" autocomplete="off" autofocus required placeholder="Masukan Username"></th>
                </tr>
                <tr>
                    <th>Password</th>
                    <th>:</th>
                    <th><input type="password" name="password" autocomplete="off" placeholder="Masukan Password"></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th><button type="submit" name="login">Login</button></th>
                </tr>
            </table>

        </form>

    </div>



</body>

</html>