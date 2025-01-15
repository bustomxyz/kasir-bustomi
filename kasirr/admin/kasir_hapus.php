<?php
include "../config/koneksi.php";

//mengambil userid dari url
$UserID = $_GET['UserID'];

//QUERY UNTUK MENGHAPUS
mysqli_query($koneksi, "DELETE from tb_user WHERE UserID ='$UserID'");

header("location:kasir_data.php");
