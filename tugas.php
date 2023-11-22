<?php
$koneksi = mysqli_connect("localhost", "root", "", "keuangan_1");

// Check Connection
if (mysqli_connect_error()) {
    echo "Koneksi database berhasil : " . mysqli_connect_error();
} else {
    echo "";
}
