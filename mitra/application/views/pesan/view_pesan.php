  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pesanan Tamu
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
        <li><a href="#">Properti</a></li>
        <li class="active">Pesanan Tamu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
						<?php
						$seg = $this->uri->segment(3);
                        if($seg == 'tab_4' || $seg == ''){?>
                        <li class="active"><a href="#tab_4" data-toggle="tab" aria-expanded="false">Semua</a></li>
                        <?php } else{ ?>
                        <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Semua</a></li>
                        <?php }
						if($seg == 'tab_1'){?>
							<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Menunggu</a></li>
						<?php } else { ?>
							<li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Menunggu</a></li>
						<?php }

                        if($seg == 'tab_3'){?>
                            <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="false">Sukses</a></li>
                        <?php } else{ ?>
                            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Sukses</a></li>
                        <?php }

						if($seg == 'tab_2'){?>
                        	<li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="true">Batal</a></li>
						<?php } else{ ?>
							<li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="true">Batal</a></li>
						<?php } ?>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No Booking</th>
                                    <th>Pemesan</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Properti</th>
                                    <th>Tipe Kamar</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no=1;
                                foreach ($data as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->booking_no;?></td>
                                        <td><?php echo $row->nama_awal;?> <?php echo $row->nama_akhir;?></td>
                                        <td><?php echo $row->check_in;?></td>
                                        <td><?php echo $row->check_out;?></td>
                                        <td><?php echo $row->properti;?></td>
                                        <td><?php echo $row->tipe_kamar;?></td>
                                        <td><?php echo $row->jumlah;?></td>
                                        <td><?php echo $row->harga;?></td>
                                        <td><?php echo $row->pesan;?></td>
                                        <td><?php echo $row->status;?></td>
										<td>
											<a href="<?= site_url('kamar/sukses/'.$row->booking_no); ?>" class="btn btn-block btn-primary">Sukses</a>
											<!--                        <a href="--><?//= site_url('SendMail/send_email/'); ?><!--" class="btn btn-block btn-primary">Sukses</a>-->
											<a href="<?= site_url('kamar/gagal/'.$row->id); ?>" class="btn btn-block btn-danger">Cancel</a>
										</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No Booking</th>
                                    <th>Pemesan</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Properti</th>
                                    <th>Tipe Kamar</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($data_batal as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->booking_no;?></td>
                                        <td><?php echo $row->nama_awal;?> <?php echo $row->nama_akhir;?></td>
                                        <td><?php echo $row->check_in;?></td>
                                        <td><?php echo $row->check_out;?></td>
                                        <td><?php echo $row->properti;?></td>
                                        <td><?php echo $row->tipe_kamar;?></td>
                                        <td><?php echo $row->jumlah;?></td>
                                        <td><?php echo $row->harga;?></td>
                                        <td><?php echo $row->pesan;?></td>
                                        <td><?php echo $row->status;?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <table id="example4" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No Booking</th>
                                    <th>Pemesan</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Properti</th>
                                    <th>Tipe Kamar</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($data_sukses as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->booking_no;?></td>
                                        <td><?php echo $row->nama_awal;?> <?php echo $row->nama_akhir;?></td>
                                        <td><?php echo $row->check_in;?></td>
                                        <td><?php echo $row->check_out;?></td>
                                        <td><?php echo $row->properti;?></td>
                                        <td><?php echo $row->tipe_kamar;?></td>
                                        <td><?php echo $row->jumlah;?></td>
                                        <td><?php echo $row->harga;?></td>
                                        <td><?php echo $row->pesan;?></td>
                                        <td><?php echo $row->status;?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tab_4">
                            <table id="example5" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No Booking</th>
                                    <th>Pemesan</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Properti</th>
                                    <th>Tipe Kamar</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($data_semua as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->booking_no;?></td>
                                        <td><?php echo $row->nama_awal;?> <?php echo $row->nama_akhir;?></td>
                                        <td><?php echo $row->check_in;?></td>
                                        <td><?php echo $row->check_out;?></td>
                                        <td><?php echo $row->properti;?></td>
                                        <td><?php echo $row->tipe_kamar;?></td>
                                        <td><?php echo $row->jumlah;?></td>
                                        <td><?php echo $row->harga;?></td>
                                        <td><?php echo $row->pesan;?></td>
                                        <td><?php echo $row->status;?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
        </div>
      <!-- Small boxes (Stat box) -->
    </section>
    <!-- /.content -->
  </div>
