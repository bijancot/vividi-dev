<style>
	.slidecontainer {
		width: 50%;
	}

	.slider {
		-webkit-appearance: none;
		width: 100%;
		margin-top: 15px;
		height: 15px;
		border-radius: 5px;
		background: #d3d3d3;
		outline: none;
		opacity: 0.7;
		-webkit-transition: .2s;
		transition: opacity .2s;
	}

	.slider::-webkit-slider-thumb {
		-webkit-appearance: none;
		appearance: none;
		width: 25px;
		height: 25px;
		border-radius: 50%;
		background: #3c8dbc;
		cursor: pointer;
	}

	.slider::-moz-range-thumb {
		width: 25px;
		height: 25px;
		border-radius: 50%;
		background: #3c8dbc;
		cursor: pointer;
	}
	}
</style>
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
				<?php echo form_open('properti/save_properti'); ?>
				<div class="col-xs-12">
					<div class="box box-primary">
						<!-- box-body -->
						<div class="box-body">
							<form role="form">
								<div class="form-group">
									<label>Judul</label>
									<input type="text" class="form-control" name="judul" placeholder="Enter ..." required>
								</div>
								<div class="form-group">
									<label>Deskripsi</label>
									<textarea class="form-control" name="deskripsi" rows="6" placeholder="Enter ..." required></textarea>
								</div>
						</div>
						<!-- /.box-body -->
					</div>
				</div>
				<!-- /.box -->
				<div class="col-xs-4">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Details</h3>
						</div>
						<!-- /.box-body -->
						<div class="box-body">
							<div class="form-group col-xs-12">
								<label>Tipe Properti</label>
								<select class="form-control" name="tipe_properti">
									<option>--Pilih--</option>
									<?php
									foreach ($tipe as $row) { ?>
										<option value="<?= $row->id_tipe ?>"><?= $row->tipe ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group col-xs-6">
								<label>Fasilitas</label>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="fasilitas[]" value="28">Ballroom
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="fasilitas[]" value="48">Fitness Center
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="fasilitas[]" value="51">Gratis Parkir
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="fasilitas[]" value="41">Hiburan Musik
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="fasilitas[]" value="83">Kolam Renang
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="fasilitas[]" value="39">Lift
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="fasilitas[]" value="73">Permainan Anak
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="fasilitas[]" value="46">Restaurant
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="fasilitas[]" value="207">Spa
									</label>
								</div>
							</div>
							<div class="form-group slidecontainer col-xs-6">
								<label>Bintang Hotel : <span id="bintang"></span></label>
								<input type="range" class="slider" name="bintang" id="star" min="0" max="5" value="0">
								<p style="font-size: 13px; font-style: italic; margin: 5px 0 5px; color: #666">Jika akomodasi ini tidak memiliki peringkat maka isi 0</p>
							</div>
							<div class="form-group col-xs-12">
								<label>Minimal menginap</label>
								<input type="number" class="form-control" name="stay">
								<p style="font-size: 13px; font-style: italic; margin: 5px 0 5px; color: #666">Kosongkan jika akomodasi tidak memiliki batas minimal</p>
							</div>
							<div class="form-group col-xs-6">
								<label>Foto Akomodasi</label>
								<input type="file" class="form-control" name="foto[]" accept="image/*" multiple>
							</div>
							<div class="form-group col-xs-6">
								<label>Logo Akomodasi</label>
								<input type="file" class="form-control" name="logo" accept="image/*">
							</div>
							<div class="form-group col-xs-12">
								<label>Deskripsi Singkat</label>
								<textarea class="form-control" name="deskripsi_singkat" rows="3" placeholder="Enter ..." required></textarea>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
				</div>

				<div class="col-xs-8">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Lokasi dan Info Lain</h3>
						</div>
						<!-- /.box-body -->
						<div class="box-body">
							<div class="form-group col-xs-6">
								<label>Negara</label>
								<select class="form-control" name="country" id="country">
									<option>--Pilih--</option>
									<?php
									foreach ($country as $row) { ?>
										<option value="<?= $row->id_country ?>"><?= $row->country ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group  col-xs-6">
								<label>Kota</label>
								<select class="form-control" name="city" id="city">
									<option>--Pilih--</option>
								</select>
							</div>
							<div class="form-group col-xs-6">
								<label>No Telepon</label>
								<input type="text" class="form-control" name="telepon" placeholder="No Telepon">
							</div>
							<div class="form-group col-xs-6">
								<label>Email</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" class="form-control" name="email" placeholder="Email">
								</div>
							</div>
							<div class="form-group col-xs-6">
								<label>Alamat</label>
								<input type="text" class="form-control" name="alamat" placeholder="Alamat">
							</div>
							<div class="form-group col-xs-12">
								<label>Lokasi</label>
								<input type="text" class="form-control" name="lokasi" placeholder="Lokasi">
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>

				<?php echo form_close(); ?>
				<!-- /.box -->
			</div>
		</div>
		<!-- Small boxes (Stat box) -->
	</section>
	<!-- /.content -->
</div>
<script type="text/javascript">
    var slider = document.getElementById("star");
    var output = document.getElementById("bintang");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }
</script>
