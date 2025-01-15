<?php
include "../config/koneksi.php";

//mengambil pelangganID
$ProdukID = $_GET['ProdukID'];

//QUERY UNTUK MENGHAPUS
mysqli_query($koneksi, "DELETE FROM tb_produk WHERE ProdukID='$ProdukID'");

header("location:produk_data.php");
