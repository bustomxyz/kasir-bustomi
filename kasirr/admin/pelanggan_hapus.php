<?php
include "../config/koneksi.php";

//mengambil pelangganID
$PelangganID = $_GET['PelangganID'];

//QUERY UNTUK MENGHAPUS
mysqli_query($koneksi, "DELETE FROM tb_pelanggan WHERE PelangganID='$PelangganID'");

header("location:pelanggan_data.php");