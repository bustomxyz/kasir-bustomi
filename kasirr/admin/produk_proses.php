<?php
    include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal tambah data pelanggan
$NamaProduk = $_POST['NamaProduk'];
$Harga = $_POST['Harga'];
$Stok = $_POST['Stok'];

mysqli_query($koneksi, "INSERT INTO tb_produk values ('','$NamaProduk','$Harga','$Stok')");

header("location:produk_data.php");

