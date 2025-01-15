<?php
    include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal edit data pelanggan
$ProdukID = $_POST['id_produk'];
$NamaProduk = $_POST['NamaProduk'];
$Harga = $_POST['Harga'];
$Stok = $_POST['Stok'];

mysqli_query($koneksi, "UPDATE tb_produk set NamaProduk = '$NamaProduk', Harga = '$Harga', Stok = '$Stok' where ProdukID = '$ProdukID'");

header("location:produk_data.php");

