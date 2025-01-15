<?php
include "header.php";
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA PRODUK
        <small>APLIKASI KASIR</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Data Produk</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box box-primary">
            <div class="box-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-produk"><i class="glyphicon glyphicon-plus"></i>
              Tambah
            </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA Produk</th>
                        <th>HARGA</th>
                        <th>STOK</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $dt_produk=mysqli_query($koneksi, "SELECT * FROM tb_produk");
                        $no=1;
                        while ($produk = mysqli_fetch_array($dt_produk)) {?>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $produk['NamaProduk']; ?></td>
                        <td><?php echo "Rp.". number_format($produk['Harga']).",-";?></td>
                        <td><?php echo $produk['Stok']; ?></td>
                        <td>
                          <button type="button" class="btn btn-xs btn-warning" title="Edit" data-toggle="modal" data-target="#edit-produk<?php echo $produk['ProdukID']; ?>">
                            <i class="glyphicon glyphicon-edit"></i>
                          </button>
                          <!-- Modal Edit -->
                          <div class="modal fade" id="edit-produk<?php echo $produk['ProdukID']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data Produk</h4>
              </div>
              <form action="produk_update.php" method="POST">
                <div class="modal-body">
                  <div class="from-group">
                    <label>NAMA PRODUK</label>
                    <input type="hidden" class="form-control" name="id_produk" value="<?php echo $produk['ProdukID']; ?>">
                    <input type="text" class="form-control" name="NamaProduk" value="<?php echo $produk['NamaProduk']; ?>">
                  </div>
                  <div class="from-group">
                    <label>HARGA</label>
                    <input type="text" class="form-control" name="Harga" value="<?php echo "Rp.". number_format($produk['Harga']).",-";?>">
                  </div>
                  <div class="from-group">
                    <label>STOK</label>
                    <input type="number" class="form-control" name="Stok" value="<?php echo $produk['Stok']; ?>">
                  </div>
                </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">update</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
                          <a href="produk_hapus.php?ProdukID=<?php echo $produk['ProdukID']; ?>" class="btn btn-xs btn-danger" Role="button" title="Hapus">
                            <i class="glyphicon glyphicon-trash"></i>
                          </a>
                        </td>
                         </tr> 
                         <?php
                        }    
                        ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade" id="tambah-produk">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Produk</h4>
              </div>
              <form action="produk_proses.php" method="POST">
                <div class="modal-body">
                  <div class="from-group">
                    <label>NAMA PRODUK</label>
                    <input type="text" class="form-control" name="NamaProduk">
                  </div>
                  <div class="from-group">
                    <label>HARGA</label>
                    <input type="number" class="form-control" name="Harga">
                  </div>
                  <div class="from-group">
                    <label>STOK</label>
                    <input type="number" class="form-control" name="Stok">
                  </div>
                </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

<?php 
include "footer.php";
?>