<style>
	@media only screen and (max-width: 600px){
		.slidecontainer {
			width: 100%;
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
	}
	@media only screen and (min-width: 601px) {
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
			<li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
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
									<label>Nama Properti</label>
									<input type="text" class="form-control" name="judul" placeholder="Masukkan Data ..."
										   required>
								</div>
								<div class="form-group">
									<label>Deskripsi</label>
									<textarea class="form-control" name="deskripsi" rows="6" placeholder="Masukkan Data ..." minlength="200" maxlength="800" onkeyup="countChar1(this)" id="textarea"
											  required></textarea>
									<div name="charNum1" id="charNum1">800</div>
								</div>
						</div>
						<!-- /.box-body -->
					</div>
				</div>
				<!-- /.box -->
				<div class="col-md-4 col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Detail</h3>
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
							<div class="form-group col-xs-12 col-md-6">
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
<!--								<div class="checkbox">-->
<!--									<label>-->
<!--										<input type="checkbox" name="fasilitas[]" value="--><?//= $fasilitas ?><!--">Fasilitas Baru-->
<!--										<input type="text" name="fas" class="form-control">-->
<!--									</label>-->
<!--								</div>-->
							</div>
							<div class="form-group slidecontainer col-xs-12 col-md-6">
								<label>Hotel Bintang : <span id="bintang"></span></label>
								<input type="range" class="slider" name="bintang" id="star" min="1" max="5" value="1">
							</div>
							<div class="form-group col-xs-12">
								<label>Sistem Pembayaran</label>
								<input type="text" class="form-control" name="payment" id="payment" onkeypress="return isNumber(event)" value="H">
							</div>
							<div class="form-group col-xs-12">
								<label>Masukan Harga Kamar Terendah</label>
								<input type="number" class="form-control" name="harga" min="0" value="0">
							</div>
							<div class="form-group col-xs-12">
								<label>Minimal menginap</label>
								<input type="number" class="form-control" name="stay" value="1" min="1">
							</div>
							<div class="form-group col-xs-12 col-md-6">
								<label>Foto Akomodasi 1</label>
								<input type="file" class="form-control" name="foto1" accept="image/*" >
							</div>
							<div class="form-group col-xs-12 col-md-6">
								<label>Foto Akomodasi 2</label>
								<input type="file" class="form-control" name="foto2" accept="image/*" >
							</div>
							<div class="form-group col-xs-12 col-md-6">
								<label>Foto Akomodasi 3</label>
								<input type="file" class="form-control" name="foto3" accept="image/*" >
							</div>
							<div class="form-group col-xs-12 col-md-6">
								<label>Logo Akomodasi</label>
								<input type="file" class="form-control" name="logo" accept="image/*">
							</div>
							<div class="form-group col-xs-12">
								<label>Deskripsi Singkat</label>
								<textarea class="form-control" name="deskripsi_singkat" rows="3" placeholder="Masukkan Data ..." minlength="100" maxlength="200" onkeyup="countChar2(this)"
										  required></textarea>
								<div name="charNum2" id="charNum2">200</div>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
				</div>

				<div class="col-md-8 col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Kebijakan</h3>
						</div>
						<!-- /.box-body -->
						<div class="box-body">
							<div class="form-group col-xs-12 col-md-6">
								<label>Check-in</label>
								<input class="form-control" type="time" name="checkin" step="3600" value="00:00">
							</div>
							<div class="form-group col-xs-12 col-md-6">
								<label>Check-out</label>
								<input class="form-control" type="time" name="checkout" step="3600" value="00:00">
							</div>
							<div class="form-group col-xs-12">
								<label>Kebijakan Pembatalan</label>
								<textarea class="form-control" name="cancel" rows="3" placeholder="Masukkan Data ..." maxlength="100" onkeyup="countChar3(this)"
										  required></textarea>
								<div name="charNum3" id="charNum3">100</div>
							</div>
							<div class="form-group col-xs-12">
								<label>Kebijakan Biaya anak dan Tempat Tidur Tambahan</label>
								<textarea class="form-control" name="bed" rows="3" placeholder="Masukkan Data ..." maxlength="100" onkeyup="countChar4(this)"
										  required></textarea>
								<div name="charNum4" id="charNum4">100</div>
							</div>
							<div class="form-group col-xs-12">
								<label>Kebijakan membawa binatang peliharaan</label>
								<textarea class="form-control" name="pet" rows="3" placeholder="Masukkan Data ..." maxlength="100" onkeyup="countChar5(this)"
										  required></textarea>
								<div name="charNum5" id="charNum5">100</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-8 col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Lokasi dan Info Lain</h3>
						</div>
						<!-- /.box-body -->
						<div class="box-body">
							<div class="form-group col-xs-12 col-md-6">
								<label>Negara</label>
								<select class="form-control select2" name="country" id="country" style="width: 100%;">
									<option>--Pilih--</option>
									<?php
									foreach ($country as $row) { ?>
										<option value="<?= $row->id_country ?>"><?= $row->country ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group col-xs-12 col-md-6">
								<label>Kota</label>
								<select class="form-control select2" name="city" id="city" style="width: 100%;">
									<option>--Pilih--</option>
								</select>
							</div>
							<div class="form-group col-xs-12 col-md-6">
								<label>No Telepon</label>
								<input type="text" class="form-control" name="telepon" placeholder="No Telepon">
							</div>
							<div class="form-group col-xs-12 col-md-6">
								<label>Email</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" class="form-control" name="email" placeholder="Email">
								</div>
							</div>
							<input id="searchInput" class="controls" type="text" name="alamat" placeholder="Enter a location">
							<div id="map" style="width:100%;height:300px;"></div>
							<ul id="geoData">
								<input type="hidden" id="lat" name="lat" value="">
								<input type="hidden" id="lng" name="lng" value="">
							</ul>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Simpan</button>
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

    function countChar1(val) {
        var len = val.value.length;
        var ml= val.maxLength;
            $('#charNum1').text(ml - len);
    };
    function countChar2(val) {
        var len = val.value.length;
        var ml= val.maxLength;
            $('#charNum2').text(ml - len);
    };
    function countChar3(val) {
        var len = val.value.length;
        var ml= val.maxLength;
            $('#charNum3').text(ml - len);
    };
    function countChar4(val) {
        var len = val.value.length;
        var ml= val.maxLength;
            $('#charNum4').text(ml - len);
    };
    function countChar5(val) {
        var len = val.value.length;
        var ml= val.maxLength;
            $('#charNum5').text(ml - len);
    };
	function isNumber(event){
	    var keycode = event.keyCode;
	    if(keycode>48 && keycode<57 || keycode == 72 || keycode == 43 || keycode == 45){
	        return true;
		}
	    return false;
	}
    $("#payment").keydown(function(e) {
        var oldvalue=$(this).val();
        var field=this;
        setTimeout(function () {
            if(field.value.indexOf('H') !== 0) {
                $(field).val(oldvalue);
            }
        }, 1);
    });
    $(document).ready(function() {
        $('.select2').select2()
    });
</script>
