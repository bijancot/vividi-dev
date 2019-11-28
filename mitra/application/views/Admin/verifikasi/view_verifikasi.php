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
									<th></th>
								</tr>
								</thead>
								<tbody>
								<?php
								foreach ($data as $row) { ?>
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
											<a href="<?= site_url('Admin/Pesan/sukses/' . $row->booking_no); ?>"
											   class="btn btn-block btn-primary">Sukses</a>
											<!--                        <a href="-->
											<? //= site_url('SendMail/send_email/'); ?><!--" class="btn btn-block btn-primary">Sukses</a>-->
											<a href="<?= site_url('Admin/Pesan/gagal/' . $row->id); ?>"
											   class="btn btn-block btn-danger">Cancel</a>
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
