<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'kasirr');

if(mysqli_connect_errno()) {
    echo "koneksi Gagal :" .mysqli_connect_errno();
}