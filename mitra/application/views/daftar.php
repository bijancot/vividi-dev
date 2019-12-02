<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			User
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
			<li><a href="#">Profil</a></li>
			<li class="active">User</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_user">
							Tambah User
						</button>
						<br><br>
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>Username</th>
								<th>Email</th>
								<th>Nama Lengkap</th>
								<th>Telepon</th>
								<th>Jabatan</th>
							</tr>
							</thead>
							<tbody>

							<?php
							foreach ($data as $row) {
								?>
								<tr>
									<td><?php echo $row->user; ?></td>
									<td><?php echo $row->email; ?></td>
									<td><?php echo $row->nama; ?></td>
									<td><?php echo $row->telepon; ?></td>
									<td><?php echo $row->jabatan; ?></td>
								</tr>
								<?php
							}
							?>

							</tbody>
							<tfoot>
							<tr>
								<th>Username</th>
								<th>Email</th>
								<th>Nama Lengkap</th>
								<th>Telepon</th>
								<th>Jabatan</th>
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

	<!-- Modal login -->
	<div id="modal_user" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><b>Tambah User</b></h4>
				</div>
				<?php echo form_open(base_url('register/cek_register_dashboard')); ?>
				<input type="hidden" name="properti" value="<?= $_SESSION['hotel'] ?>">
				<div class="modal-body">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" placeholder="Username" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" placeholder="Email" required>
					</div>
					<div class="form-group">
						<label>Nama Depan</label>
						<input type="text" name="depan" class="form-control" placeholder="Nama Depan" required>
					</div>
					<div class="form-group">
						<label>Nama Belakang</label>
						<input type="text" name="belakang" class="form-control" placeholder="Nama Belakang" required>
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input type="text" name="telp" class="form-control" placeholder="Nomor Telepon" required>
					</div>
					<div class="form-group">
						<label>Jabatan</label>
						<select class="form-control" name="role">
							<option value="Owner">Owner</option>
							<option value="Direktur">Direktur</option>
							<option value="Manager">Manager</option>
							<option value="Sales Marketing">Sales Marketing</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Daftar" name="submit">
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
        var url =  "<?= site_url('home/modal_user')?>";
        $.post(url, postdata, function(data) {
            var results = JSON.parse(data);
            $('#modal_detail').html(results);
        });
        $('#modal_detail').modal('show');
    }
</script>
