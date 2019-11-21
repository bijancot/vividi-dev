<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tipe Kamar
			<button type="button" class="btn btn-primary" style="margin-bottom: 10px" data-toggle="modal"
					data-target="#modal_kamar">
				Tambah Tipe Kamar
			</button>
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
                            $no = 1;
                            foreach ($data as $row) { ?>
                                <tr>
                                    <td><?php echo $row->judul; ?></td>
                                    <td><?php echo $row->properti; ?></td>
                                    <td><?php echo $row->dewasa; ?></td>
                                    <td><?php echo $row->anak; ?></td>
                                    <td><?php echo $row->penulis; ?></td>
                                    <td><?php echo $row->tanggal; ?></td>
                                    <td>
                                    <button type="button" id="detail" class="btn btn-default" style="margin-bottom: 10px" data-toggle="modal" data-id="<?php echo $row->id ?>" onclick="clickButton(<?php echo $row->id ?>)">Detail</button>
                                    </td>
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
                <?php echo form_open_multipart(base_url('properti/save_type_kamar')); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pilih Properti</label>
                        <select class="form-control" name="properti">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($prpti as $r) { ?>
                                <option value="<?php echo $r->id; ?>"><?php echo $r->Judul; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kamar</label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul" required>
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

    <!-- Modal Detail -->
    <div id="modal_detail" class="modal fade" role="dialog">
        
    </div>
    <!-- End Modal Detail -->
</div>
<script type="text/javascript">
  function clickButton(id){
    var postdata = {id: id};
    var url =  "<?= site_url('properti/modal_tipe_kamar')?>";
    $.post(url, postdata, function(data) {
      var results = JSON.parse(data);
      $('#modal_detail').html(results);
    });
    $('#modal_detail').modal('show');
}
</script>
