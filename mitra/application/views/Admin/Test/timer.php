<!doctype html>
<html>
<head>
	<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>

		var timestamp;

		function updateClock() {
			console.log(timestamp);
			var date = new Date(timestamp*1000); // multiply by 1000 because Date() uses milliseconds

			// ...

			$("#seconds_div").html(date.getSeconds());
			timestamp -= 1; // decrement timestamp by 1 second.
		}

		// when the document is loaded, make an ajax call to load the timestamp
		$(document).ready(function(e) {
			$.get("recdisp.php", function(data) {
				timestamp = parseInt(data);
				setInterval(updateClock, 1000);
			});
		});

	</script>
</head>

<body>
...

<div class="d" id="seconds_div"></div>
<div class="l">Seconds</div>
