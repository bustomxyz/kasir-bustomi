<?php
    include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal tambah data kasir/petugas
$NamaUser = $_POST['NamaUser'];
$username = $_POST['username'];
$password= md5($_POST['password']);
$Role= "Petugas";


mysqli_query($koneksi, "INSERT INTO tb_user values ('','$NamaUser','$username','$password','$Role')");

header("location:kasir_data.php");

