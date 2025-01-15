<?php
include "header.php";
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA PELANGGAN
        <small>APLIKASI KASIR</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Data Pelanggan</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box box-primary">
            <div class="box-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-pelanggan"><i class="glyphicon glyphicon-plus"></i>
              Tambah
            </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA PELANGGAN</th>
                        <th>ALAMAT</th>
                        <th>NOMOR TELEPON</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $dt_pelanggan=mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
                        $no=1;
                        while ($pelanggan = mysqli_fetch_array($dt_pelanggan)) {?>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $pelanggan['NamaPelanggan']; ?></td>
                        <td><?php echo $pelanggan['Alamat']; ?></td>
                        <td><?php echo $pelanggan['NomerTelepon']; ?></td>
                        <td>
                          <button type="button" class="btn btn-xs btn-warning" title="Edit" data-toggle="modal" data-target="#edit-pelanggan<?php echo $pelanggan['PelangganID']; ?>">
                            <i class="glyphicon glyphicon-edit"></i>
                          </button>
                          <!-- Modal Edit -->
                          <div class="modal fade" id="edit-pelanggan<?php echo $pelanggan['PelangganID']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data Pelanggan</h4>
              </div>
              <form action="pelanggan_update.php" method="POST">
                <div class="modal-body">
                  <div class="from-group">
                    <label>NAMA PELANGGAN</label>
                    <input type="hidden" class="form-control" name="id_pelanggan" value="<?php echo $pelanggan['PelangganID']; ?>">
                    <input type="text" class="form-control" name="NamaPelanggan" value="<?php echo $pelanggan['NamaPelanggan']; ?>">
                  </div>
                  <div class="from-group">
                    <label>ALAMAT</label>
                    <input type="text" class="form-control" name="Alamat" value="<?php echo $pelanggan['Alamat']; ?>">
                  </div>
                  <div class="from-group">
                    <label>NOMOR TELEPON</label>
                    <input type="number" class="form-control" name="NomerTelepon" value="<?php echo $pelanggan['NomerTelepon']; ?>">
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
  <div class="modal fade" id="tambah-pelanggan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Pelanggan</h4>
              </div>
              <form action="pelanggan_proses.php" method="POST">
                <div class="modal-body">
                  <div class="from-group">
                    <label>NAMA PELANGGAN</label>
                    <input type="text" class="form-control" name="NamaPelanggan">
                  </div>
                  <div class="from-group">
                    <label>ALAMAT</label>
                    <input type="text" class="form-control" name="Alamat">
                  </div>
                  <div class="from-group">
                    <label>NOMOR TELEPON</label>
                    <input type="number" class="form-control" name="NomerTelepon">
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