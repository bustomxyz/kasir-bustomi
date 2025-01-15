<?php
include "../config/koneksi.php";

//menamngkap data id yang dikirim
$ProdukID = $_GET['ProdukID'];
$PenjualanID = $_GET['PenjualanID'];

//menghitung stok terbaru
$jml_stok = mysqli_query($koneksi,"SELECT JumlahProduk from tb_detail_penjualan where ProdukID='$ProdukID' AND PenjualanID='$PenjualanID'");
$jml = mysqli_fetch_assoc($jml_stok);
$stok = mysqli_query($koneksi, "SELECT Stok from tb_produk where ProdukID='$ProdukID'");
$s = mysqli_fetch_assoc($stok);

//penjumlahan
$up_stok = implode($s) + implode($jml);

//update stok
mysqli_query($koneksi,"update tb_produk SET Stok = '$up_stok' where ProdukID = '$ProdukID'");

//MENGHAPUS DATA DARI TB_DETAIL_PENJUALAN
mysqli_query($koneksi,"DELETE FROM tb_detail_penjualan where ProdukID = '$ProdukID' AND PenjualanID='$PenjualanID'");

header("location:transaksi_tambah.php");