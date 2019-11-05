  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tipe Kamar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Properti</a></li>
        <li class="active">Tipe Kamar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <button type="button" class="btn btn-default" style="margin-bottom: 10px" data-toggle="modal" data-target="#modal_kamar">
                    Tambah Tipe Kamar
                </button>
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Judul</th>
                  <th>Properti</th>
                  <th>Dewasa</th>
                  <th>Anak</th>
                  <th>Penulis</th>
                  <th>Tanggal</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $no=1; 
                    foreach ($data as $row) { ?>
                    <tr>
                    <td><?php echo $row->judul;?></td>
                    <td><?php echo $row->properti;?></td>
                    <td><?php echo $row->dewasa;?></td>
                    <td><?php echo $row->anak;?></td>
                    <td><?php echo $row->penulis;?></td>
                    <td><?php echo $row->tanggal;?></td>
                    <td><button class="btn btn-block" data-effect="mfp-zoomIn" id="<?php echo $row->id;?>" onclick="clickButton(<?php echo $row->id;?>)">Lihat</button></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Judul</th>
                  <th>Properti</th>
                  <th>Dewasa</th>
                  <th>Anak</th>
                  <th>Penulis</th>
                  <th>Tanggal</th>
                  <th></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- Small boxes (Stat box) -->
    </section>
    <!-- /.content -->
      <!-- Modal login -->
      <div id="modal_kamar" class="modal fade" role="dialog">
          <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Tambah Tipe Kamar</h4>
                  </div>
                  <?php echo form_open('properti/save_type_kamar'); ?>
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Pilih Properti</label>
                          <select class="form-control" name="properti">
                              <option value="">-- Pilih --</option>
                              <?php
                              foreach ($prpti as $r) { ?>
                                  <option value="<?php echo $r->id;?>"><?php echo $r->Judul;?></option>
                              <?php } ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Jenis Kamar</label>
                          <input type="text" name="judul" class="form-control" placeholder="Judul" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Deskripsi</label>
                          <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Max Remaja</label>
                          <input type="text" name="remaja" class="form-control" placeholder="Remaja" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Max Anak</label>
                          <input type="text" name="anak" class="form-control" placeholder="Anak" required>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <input type="submit" class="btn btn-success" value="Tambah" name="submit">
                  </div>
                  <?php echo form_close(); ?>
              </div>
          </div>
      </div>
      <!-- End Modal Login -->
  </div>
  <script type="text/javascript">
      $(window).on('load', function () {
          $('#modal_harga').modal('show');
      });
  </script>
