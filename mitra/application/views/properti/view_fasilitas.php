  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fasilitas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
        <li><a href="#">Properti</a></li>
        <li class="active">Fasilitas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Slug</th>
                  <th>Jumlah</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $no=1; 
                    foreach ($data as $row) { ?>
                    <tr>
                    <td><?php echo $row->nama;?></td>
                    <?php if ($row->deskripsi == ""){?><td>-</td><?php } else{ ?><td><?php echo $row->deskripsi;?></td><?php } ?>

                    <td><?php echo $row->slug;?></td>
                    <td><?php echo $row->jumlah;?></td>
                    <td><button class="btn btn-block" data-effect="mfp-zoomIn" id="" onclick="">Lihat</button></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Slug</th>
                  <th>Jumlah</th>
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
