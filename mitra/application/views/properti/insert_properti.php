<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Tambah Properti Baru
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Properti</a></li>
			<li class="active">Tambah Properti Baru</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<!-- box-body -->
					<div class="box-body">
						<form role="form">
							<div class="form-group">
								<label>Judul</label>
								<input type="text" class="form-control" placeholder="Enter ...">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
							</div>
						</form>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Details</h3>
					</div>
					<!-- /.box-body -->
					<div class="box-body">
						<form role="form">
							<div class="form-group">
								<label>Tipe Properti</label>
								<select class="form-control">
									<option>option 1</option>
									<option>option 2</option>
									<option>option 3</option>
									<option>option 4</option>
									<option>option 5</option>
								</select>
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
							</div>
						</form>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
				<!-- /.box -->
			</div>
		</div>
		<!-- Small boxes (Stat box) -->
	</section>
	<!-- /.content -->
</div>
<script type="text/javascript">
    $(window).on('load', function () {
        $('#modal_properti').modal('show');
    });
</script>
