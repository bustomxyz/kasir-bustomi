<?php
include "../config/koneksi.php";

$notrans = $_POST['no_trans'];
$ProdukID = $_POST['Produk'];
$JumlahProduk = $_POST['jumlah'];

//menghitung sub total
$st = mysqli_query($koneksi,"SELECT Harga FROM tb_produk where ProdukID = '$ProdukID'");
$harga = mysqli_fetch_assoc($st);
$sub_total = implode($harga) * $JumlahProduk;

//insert data => tb_datail_penjualan
mysqli_query($koneksi, "INSERT INTO tb_detail_penjualan values ('','$notrans','$ProdukID','$JumlahProduk','$sub_total')");


//MENGHITUNG SROK TERBARU
$Stok = mysqli_query($koneksi,"SELECT Stok from tb_produk where ProdukID = '$ProdukID'");
$s=mysqli_fetch_assoc($Stok);
$update = implode($s)-$JumlahProduk;

//update data stok
mysqli_query($koneksi,"UPDATE tb_produk set Stok='$update' where ProdukID = '$ProdukID'");

header("location:transaksi_tambah.php");
