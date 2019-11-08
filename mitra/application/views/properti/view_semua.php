  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Semua Properti
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Properti</a></li>
        <li class="active">Semua Properti</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
				<button type="button" class="btn btn-default" style="margin-bottom: 10px" data-toggle="modal"
						data-target="#modal_propeti">
					Tambah Properti
				</button>
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Judul</th>
                  <th>Tipe Properti</th>
                  <th>Kota</th>
                  <th>Negara</th>
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
                    <td><?php echo $row->Judul;?></td>
                    <td><?php echo $row->Tipe_Properti;?></td>
                    <td><?php echo $row->Kota;?></td>
                    <td><?php echo $row->Negara;?></td>
                    <td><?php echo $row->Penulis;?></td>
                    <td><?php echo $row->Tanggal;?></td>
                    <td><button class="btn btn-block" data-effect="mfp-zoomIn" id="<?php echo $row->id;?>" onclick="clickButton(<?php echo $row->id;?>)">Lihat</button></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Judul</th>
                  <th>Tipe Properti</th>
                  <th>Kota</th>
                  <th>Negara</th>
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
  </div>
  <div id="modal_propeti" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		  <!-- Modal content-->
		  <div class="modal-content">
			  <div class="modal-header">
				  <h4 class="modal-title">Tambah Tipe Kamar</h4>
			  </div>
			  <?php echo form_open('properti/save_type_kamar'); ?>
			  <div class="modal-body">
				  <div class="form-group">
					  <label for="exampleInputEmail1">Nama Properti</label>
					  <input type="text" name="nama_properti" class="form-control" placeholder="Nama Properti" required/>
				  </div>
				  <div class="form-group">
					  <select class="form-control" name="properti">
						  <option value="">-- Pilih --</option>
						  <?php
						  foreach ($prpti as $r) { ?>
							  <option value="<?php echo $r->id; ?>"><?php echo $r->Judul; ?></option>
						  <?php } ?>
					  </select>
				  </div>
				  <div class="form-group">
					  <label>Deskripsi</label>
					  <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" required>
				  </div>
				  <div class="form-group">
					  <label>Max Dewasa</label>
					  <input type="text" name="remaja" class="form-control" placeholder="Dewasa" required>
				  </div>
				  <div class="form-group">
					  <label>Max Anak</label>
					  <input type="text" name="anak" class="form-control" placeholder="Anak" required>
				  </div>
				  <div class="form-group">
					  <label>Fasilitas</label><br>
					  <div class="row">
						  <div class="col-sm-6 col-md-6">
							  <input type="checkbox" name="amenity[]" value="57"> Bathtub<br>
							  <input type="checkbox" name="amenity[]" value="206"> Double Bed<br>
							  <input type="checkbox" name="amenity[]" value="81"> Kamar Merokok<br>
							  <input type="checkbox" name="amenity[]" value="25"> Kopi, Teh dan Air Mineral<br>
							  <input type="checkbox" name="amenity[]" value="80"> Brangkas atau Kotak Keamanan<br>
							  <input type="checkbox" name="amenity[]" value="78"> Layanan Kamar<br>
							  <input type="checkbox" name="amenity[]" value="92"> Mini Bar atau Kulkas Mini<br>
						  </div>
						  <div class="col-sm-6 col-md-6">
							  <input type="checkbox" name="amenity[]" value="13"> Pendingin Ruangan<br>
							  <input type="checkbox" name="amenity[]" value="27"> Sarapan<br>
							  <input type="checkbox" name="amenity[]" value="125"> Balkon<br>
							  <input type="checkbox" name="amenity[]" value="84"> TV<br>
							  <input type="checkbox" name="amenity[]" value="205"> Twin Bed<br>
							  <input type="checkbox" name="amenity[]" value="91"> WIFI<br>
						  </div>
					  </div>
				  </div>
				  <div class="form-group">
					  <label>Foto</label>
					  <input type="file" class="form-control" name="foto">
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
		  $('#modal_properti').modal('show');
	  });
  </script>
