<!DOCTYPE html>
<?php
if (isset($_SESSION['username'])) {
	redirect(base_url('home'));
}
?>
<html>
<head>
	<title>Vividi.id - Registrasi Mitra</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url('../wp-content/uploads/2019/09/favicon-vividi-3.png'); ?>"
          type="image/x-icon"/>
	<link rel="stylesheet" href="<?=base_url("assets/css/bootstrap.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/login-vividistyle.css")?>">

	<script src="<?=base_url("assets/js/jquery.min.js")?>"></script>
	<script src="<?=base_url("assets/js/bootstrap.min.js")?>"></script>
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#mylogin').modal('show');
        });
    </script>
</head>
<body>
	<!-- Modal Register -->
	<div id="mylogin" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-pop-daftar col-xs-12">
			<!-- Modal content-->
			<div class="modal-content modal-daftar">
				<div class="modal-header">
					<div class="logo">
						<a href="<?=base_url("login")?>"><img src="<?php echo base_url('assets/new-logo.png'); ?>" class="img-fluid img-logo"></a>
						<p class="text-companies">
							MITRA <span>DASHBOARD</span>
						</p>
					</div>
				</div>
				<?php echo form_open(base_url('register/cek_register')); ?>
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
						<label>Properti</label>
						<input type="text" name="properti" class="form-control" placeholder="Nama Properti" required>
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
	<!--                <input type="checkbox" name="terms" value="ok"> <a href="https://vividi.id/terms-conditions/">Accept our Terms & Conditions</a>-->
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary btn-daftar" value="Daftar" name="submit">
					<span class="txt-daftar">
						Sudah punya akun ?
						<a href="<?php echo base_url('Login')?>">Login</a>
					</span>
				</div>
				<?php echo form_close(); ?>
			</div>
			<p class="txt-companies-bot">
				&copy; <?=date("Y")?> PT. VIVIDI TRANSINDO UTAMA
				<span>Ver 1.9.01 </span>
			</p>
		</div>
	</div>
	<!-- End Modal Register -->
</body>
</html>
