<!DOCTYPE html>
<html>
<head>
	<style>
		#map {
			width: 100%;
			height: 400px;
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
	<title>Autocomplete search address form using google map and get data into form example </title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFxhk7tOEjomIkOd1u7DpvvGp81F57N0g&libraries=places&callback=initMap"
		async defer></script>
<body>
<!-- Autocomplete location search input -->
<input id="searchInput" class="controls" type="text" placeholder="Enter a location">
<div id="map" style="width:50%;height:380px;"></div>
<ul id="geoData">
	<input type="text" id="lat" name="lat" value="">
	<input type="text" id="lng" name="lng" value="">
</ul>
<script>
	var marker;

	function taruhMarker(peta, posisiTitik){

		if( marker ){
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

			// var address = '';
			// if (place.address_components) {
			// 	address = [
			// 		(place.address_components[0] && place.address_components[0].short_name || ''),
			// 		(place.address_components[1] && place.address_components[1].short_name || ''),
			// 		(place.address_components[2] && place.address_components[2].short_name || '')
			// 	].join(' ');
			// }

			// infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
			// infowindow.open(map, marker);
			//
			// document.getElementById('location').innerHTML = place.formatted_address;
			// document.getElementById('lat').innerHTML = place.geometry.location.lat();
			// document.getElementById('lng').innerHTML = place.geometry.location.lng();
		});

		// even listner ketika peta diklik
		google.maps.event.addListener(map, 'click', function(event) {
			taruhMarker(this, event.latLng);
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
</body>
</html>
