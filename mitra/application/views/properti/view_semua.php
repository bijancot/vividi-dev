  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Semua Properti
		  <a href="<?= site_url('../Properti/tambah_properti') ?>" class="btn btn-primary">
			  Tambah Properti
		  </a>
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
                    <td>
						<button type="button" id="detail" class="btn btn-default" style="margin-bottom: 10px" data-toggle="modal" data-id="<?php echo $row->id ?>" onclick="clickButton(<?php echo $row->id ?>)">Detail</button>
					</td>
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

	  <!-- Modal Detail -->
	  <div id="modal_detail" class="modal fade" role="dialog">

	  </div>
	  <!-- End Modal Detail -->

  </div>

  <script type="text/javascript">
      function clickButton(id){
          var postdata = {id: id};
          var url =  "<?= site_url('properti/modal_properti')?>";
          $.post(url, postdata, function(data) {
              var results = JSON.parse(data);
              $('#modal_detail').html(results);
          });
          $('#modal_detail').modal('show');
      }
  </script>
