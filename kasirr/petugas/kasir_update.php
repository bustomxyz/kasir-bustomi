<?php
    include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal edit data kasir/petugas
$UserID= $_POST['id_user'];
$NamaUser = $_POST['NamaUser'];
$username = $_POST['username'];
$password= md5($_POST['password']);
$Role= $_POST['role'];

//update data kasir

mysqli_query($koneksi, "UPDATE tb_user set NamaUser = '$NamaUser', username = '$username', password = '$password', role = '$Role' where UserID = '$UserID'");

header("location:kasir_data.php");

