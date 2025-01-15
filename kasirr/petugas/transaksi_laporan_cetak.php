<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Bukti Transaksi ||Aplikasi kasir</title>
    <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <?php
    include "../config/koneksi.php";

    session_start();
    //membuat sebuah kondisi untuk melakukan pengecekan
    if ($_SESSION['role']===""){
        header("location:../index.php");
    }
    ?>
    <div class="container">
            <h2 class="text-center"><strong> TOKO MANDIRI</strong></h2>
            <p class="text-center"><strong> Jl. DASUKI JATIBARANG NO 175 INDRAMAYU</strong></p>
            <br>
            <table class=" table table-bordered table-stiped">
                <thead>
                    <tr>
              <th>NO</th>
              <th>NOMOR TRANSAKSI</th>
              <th>TANGGAL PENJUALAN</th>
              <th>NAMA PELANGGAN</th>
              <th>NAMA PETUGAS</th>
              <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $tglawal = $_GET['dari'];
                        $tglakhir = $_GET['sampai'];
                        ?>
                    <tr>
              <?php
              $UserID = $_SESSION['UserID'];
              $dt_penjualan = mysqli_query($koneksi, "SELECT * FROM tb_penjualan INNER JOIN tb_pelanggan ON tb_pelanggan.PelangganID = tb_penjualan.PelangganID INNER JOIN tb_user ON tb_user.UserID = tb_penjualan.UserID WHERE tb_penjualan.PelangganID = tb_pelanggan.PelangganID  AND date(TanggalPenjualan) > '$tglawal' AND date (TanggalPenjualan) < '$tglakhir' ORDER BY TanggalPenjualan DESC");
              $no = 1;
              while ($penjualan = mysqli_fetch_array($dt_penjualan)){
                ?>
                <td><?php echo $no++; ?> </td>
                <td><?php echo $penjualan['PenjualanID']; ?> </td>
                <td><?php echo $penjualan['TanggalPenjualan']; ?> </td>
                <td><?php echo $penjualan['NamaPelanggan']; ?> </td>
                <td><?php echo $penjualan['NamaUser']; ?> </td>
                <td><?php echo "Rp.". number_format($penjualan['TotalHarga']) .",-"; ?></td>
                
                </tr>
                <?php } ?>
                </tbody>
            </table>
                <br>
                <p class="text-center"><i>"Laporan Transaksi Dari Tanggal<?php echo $tglawal;?>Sampai <?php echo $tglakhir ;?></i></p>
    </div>
    <script type="text/javascript">
    window.print(); 
</script>
</body>
</html>
