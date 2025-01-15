<?php
    include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal edit data pelanggan
$PelangganID = $_POST['id_pelanggan'];
$NamaPelanggan = $_POST['NamaPelanggan'];
$Alamat = $_POST['Alamat'];
$NomerTelepon = $_POST['NomerTelepon'];

mysqli_query($koneksi, "UPDATE tb_pelanggan set NamaPelanggan = '$NamaPelanggan', Alamat = '$Alamat', NomerTelepon = '$NomerTelepon' where PelangganID = '$PelangganID'");

header("location:pelanggan_data.php");

