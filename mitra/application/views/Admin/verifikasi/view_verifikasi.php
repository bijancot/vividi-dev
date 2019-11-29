<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Akun Hotel
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
						$seg = $this->uri->segment(4);
						if($seg == 'tab_1' || $seg == ''){?>
							<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Semua</a></li>
						<?php } else{ ?>
							<li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Semua</a></li>
						<?php }
						if($seg == 'tab_2'){?>
							<li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Belum Aktif</a></li>
						<?php } else { ?>
							<li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Belum Aktif</a></li>
						<?php } ?>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Username</th>
									<th>Email</th>
									<th>Nama Lengkap</th>
									<th>Telepon</th>
									<th>Nama Hotel</th>
									<th>Jabatan</th>
									<th>Tanggal Daftar</th>
									<th>Status</th>
								</tr>
								</thead>
								<tbody>
								<?php
								foreach ($data_semua as $row) {
									if ($row->status == 0){
										$row->status = "Belum Aktif";
									} else {
										$row->status = "Aktif";
									}
									?>
									<tr>
										<td><?php echo $row->user_login; ?></td>
										<td><?php echo $row->user_email; ?></td>
										<td><?php echo $row->display_name; ?></td>
										<td><?php echo $row->telepon; ?></td>
										<td><?php echo $row->name_hotel; ?></td>
										<td><?php echo $row->jabatan; ?></td>
										<td><?php echo $row->user_registered; ?></td>
										<td><?php echo $row->status; ?></td>

									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>

						<div class="tab-pane" id="tab_2">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Username</th>
									<th>Email</th>
									<th>Nama Lengkap</th>
									<th>Telepon</th>
									<th>Nama Hotel</th>
									<th>Jabatan</th>
									<th>Tanggal Daftar</th>
									<th>Status</th>
									<th></th>
								</tr>
								</thead>
								<tbody>
								<?php
								foreach ($data as $row) {
									if ($row->status == 0){
										$row->status = "Belum Aktif";
									} else {
										$row->status = "Aktif";
									}
									?>
									<tr>
										<td><?php echo $row->user_login; ?></td>
										<td><?php echo $row->user_email; ?></td>
										<td><?php echo $row->display_name; ?></td>
										<td><?php echo $row->telepon; ?></td>
										<td><?php echo $row->name_hotel; ?></td>
										<td><?php echo $row->jabatan; ?></td>
										<td><?php echo $row->user_registered; ?></td>
										<td><?php echo $row->status; ?></td>
										<td>
											<a href="<?= site_url('Admin/Akun/verifikasi/'.$row->ID); ?>" class="btn btn-block btn-primary">Verifikasi</a>
										</td>
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
