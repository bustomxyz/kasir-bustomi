<?php
    include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal tambah data pelanggan
$NamaPelanggan = $_POST['NamaPelanggan'];
$Alamat = $_POST['Alamat'];
$NomerTelepon = $_POST['NomerTelepon'];

mysqli_query($koneksi, "INSERT INTO tb_pelanggan values ('','$NamaPelanggan','$Alamat','$NomerTelepon')");

header("location:pelanggan_data.php");

