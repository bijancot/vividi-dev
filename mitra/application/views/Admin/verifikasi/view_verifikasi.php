<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1 style="color: #003580; font-weight: bold; text-align: left">
			MITRA BARU
		</h1>
		<!--		<ol class="breadcrumb">-->
		<!--			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
		<!--			<li><a href="#">Verifikasi</a></li>-->
		<!--			<li class="active">Akun Mitra</li>-->
		<!--		</ol>-->
	</section>

	<!-- Main content -->
	<section class="table-responsive content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
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
								if ($row->status == 0) {
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
										<a href="<?= site_url('Admin/Akun/verifikasi/' . $row->ID); ?>"
										   class="btn btn-block btn-primary">Verifikasi</a>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--						</div>-->
	<section class="content-header">
		<h1 style="color: #003580; font-weight: bold; text-align: left">
			MITRA AKTIF
		</h1>
		<!--		<ol class="breadcrumb">-->
		<!--			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
		<!--			<li><a href="#">Verifikasi</a></li>-->
		<!--			<li class="active">Akun Mitra</li>-->
		<!--		</ol>-->
	</section>
	<section class="table-responsive content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example2" class="table table-bordered table-striped">
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
								if ($row->status == 0) {
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
				</div>
				<!-- /.tab-pane -->
			</div>
			<!-- /.tab-content -->
		</div>
		<!-- nav-tabs-custom -->
		<!-- Small boxes (Stat box) -->
	</section>
	<!-- /.content -->
</div>
