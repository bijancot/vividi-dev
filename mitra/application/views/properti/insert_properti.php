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

	.controls {
		margin-top: 10px;
		border: 1px solid transparent;
		border-radius: 2px 0 0 2px;
		box-sizing: border-box;
		-moz-box-sizing: border-box;
		height: 32px;
		outline: none;
		box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
	}

	#searchInput {
		background-color: #fff;
		font-family: Roboto;
		font-size: 15px;
		font-weight: 300;
		margin-left: 12px;
		padding: 0 11px 0 13px;
		text-overflow: ellipsis;
		width: 50%;
	}

	#searchInput:focus {
		border-color: #4d90fe;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFxhk7tOEjomIkOd1u7DpvvGp81F57N0g&libraries=places&callback=initMap"
	async defer></script>

<script>
	var marker;

	function taruhMarker(peta, posisiTitik) {

		if (marker) {
			// pindahkan marker
			marker.setPosition(posisiTitik);
		} else {
			// buat marker baru
			marker = new google.maps.Marker({
				position: posisiTitik,
				map: peta
			});
		}

		document.getElementById("lat").value = posisiTitik.lat();
		document.getElementById("lng").value = posisiTitik.lng();

	}

	function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -8.5830695, lng: 116.3202515},
			zoom: 9
		});
		// var peta = new google.maps.Map(document.getElementById("map"), map);
		var input = document.getElementById('searchInput');
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

		var autocomplete = new google.maps.places.Autocomplete(input);
		autocomplete.bindTo('bounds', map);

		var infowindow = new google.maps.InfoWindow();
		var marker = new google.maps.Marker({
			map: map,
			anchorPoint: new google.maps.Point(0, -29)
		});

		autocomplete.addListener('place_changed', function () {
			infowindow.close();
			marker.setVisible(false);
			var place = autocomplete.getPlace();
			if (!place.geometry) {
				window.alert("Autocomplete's returned place contains no geometry");
				return;
			}

			// If the place has a geometry, then present it on a map.
			if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				map.setCenter(place.geometry.location);
				map.setZoom(17);
			}

			var address = '';
			if (place.address_components) {
				address = [
					(place.address_components[0] && place.address_components[0].short_name || ''),
					(place.address_components[1] && place.address_components[1].short_name || ''),
					(place.address_components[2] && place.address_components[2].short_name || '')
				].join(' ');
			}

			infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
			infowindow.open(map, marker);

			document.getElementById('location').innerHTML = place.formatted_address;
			document.getElementById('lat').innerHTML = place.geometry.location.lat();
			document.getElementById('lng').innerHTML = place.geometry.location.lng();
		});

		// even listner ketika peta diklik
		google.maps.event.addListener(map, 'click', function (event) {
			taruhMarker(this, event.latLng);
		});
	}

	google.maps.event.addDomListener(window, 'load', initialize);
</script>

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
				<?php echo form_open_multipart('properti/save_properti'); ?>
				<div class="col-md-12 col-xs-12">
					<div class="box box-primary">
						<!-- box-body -->
						<div class="box-body">
							<form role="form">
								<div class="form-group">
									<label>Judul</label>
									<input type="text" class="form-control" name="judul" placeholder="Enter ..."
										   required>
								</div>
								<div class="form-group">
									<label>Deskripsi</label>
									<textarea class="form-control" name="deskripsi" rows="6" placeholder="Enter ..."
											  required></textarea>
								</div>
						</div>
						<!-- /.box-body -->
					</div>
				</div>
				<!-- /.box -->
				<div class="col-md-4 col-xs-12">
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
								<p style="font-size: 13px; font-style: italic; margin: 5px 0 5px; color: #666">Jika
									akomodasi ini tidak memiliki peringkat maka isi 0</p>
							</div>
							<div class="form-group col-xs-12">
								<label>Minimal menginap</label>
								<input type="number" class="form-control" name="stay">
								<p style="font-size: 13px; font-style: italic; margin: 5px 0 5px; color: #666">Kosongkan
									jika akomodasi tidak memiliki batas minimal</p>
							</div>
							<div class="form-group col-xs-6">
								<label>Foto Akomodasi 1</label>
								<input type="file" class="form-control" name="foto1" accept="image/*" >
							</div>
							<div class="form-group col-xs-6">
								<label>Foto Akomodasi 2</label>
								<input type="file" class="form-control" name="foto2" accept="image/*" >
							</div>
							<div class="form-group col-xs-6">
								<label>Foto Akomodasi 3</label>
								<input type="file" class="form-control" name="foto3" accept="image/*" >
							</div>
							<div class="form-group col-xs-6">
								<label>Logo Akomodasi</label>
								<input type="file" class="form-control" name="logo" accept="image/*">
							</div>
							<div class="form-group col-xs-12">
								<label>Deskripsi Singkat</label>
								<textarea class="form-control" name="deskripsi_singkat" rows="3" placeholder="Enter ..."
										  required></textarea>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
				</div>

				<div class="col-md-8 col-xs-12">
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
							<!--							<div class="form-group col-xs-12">-->
							<!--								<label>Lokasi</label>-->
							<!--								<input type="text" class="form-control" name="lokasi" placeholder="Lokasi">-->
							<!--							</div>-->
							<input id="searchInput" class="controls" type="text" placeholder="Enter a location">
							<div id="map" style="width:100%;height:300px;"></div>
							<ul id="geoData">
								<input type="hidden" id="lat" name="lat" value="">
								<input type="hidden" id="lng" name="lng" value="">
							</ul>
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

	slider.oninput = function () {
		output.innerHTML = this.value;
	}
</script>


