<!DOCTYPE html>
<html lang="en">
<head>
	<title>DirEngine - Free Bootstrap 4 Template by Colorlib</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="" />

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

	<link rel="stylesheet" href="<?=base_url("assets/css/bootstrap.min.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/open-iconic-bootstrap.min.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/bower_components/font-awesome/css/font-awesome.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/animate.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/owl.carousel.min.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/owl.theme.default.min.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/magnific-popup.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/aos.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/ionicons.min.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/bootstrap-datepicker.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/jquery.timepicker.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/flaticon.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/icomoon.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/style.css")?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/vividistyle.css")?>">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="<?=base_url("front")?>">Vividi.id</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="<?=base_url("front")?>" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="<?=base_url("front/about")?>" class="nav-link">About</a></li>
					<li class="nav-item"><a href="<?=base_url("index/tour")?>" class="nav-link">Tour</a></li>
					<li class="nav-item"><a href="<?=base_url("front/hotel")?>" class="nav-link">Hotels</a></li>
					<li class="nav-item"><a href="<?=base_url("front/blog")?>" class="nav-link">Blog</a></li>
					<li class="nav-item"><a href="<?=base_url("front/contact")?>" class="nav-link">Contact</a></li>
					<li class="nav-item cta cta-button"><a href="<?=base_url("login")?>" class="nav-link"><span>Login</span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="bg-banner">
		<div class="container">
			<div class="row">
				<div class="col-md-9 pad-greeting ftco-animate">
					<h1 class="mb-4 txt-greeting">
						<strong>Explore <br></strong> your amazing city.
					</h1>
					<p class="short-greeting">Find great places to stay, eat, shop, or visit from local experts</p>
					<div class="block-17 my-4">
						<form action="<?=base_url("front/search")?>" method="post" class="d-block d-flex">
							<div class="fields d-block d-flex">
								<div class="textfield-search">
									<input type="text" class="form-control" placeholder="Ex: food, service, hotel">
								</div>
							</div>
							<input type="submit" class="search-submit btn btn-primary btn-cari" value="Search">
						</form>
					</div>
					<p class="short-greeting">Or browse the highlights</p>
					<p class="browse d-md-flex">
						<!--						<span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i class="flaticon-fork"></i>Restaurant</a></span>-->
						<span class="d-flex justify-content-md-center align-items-md-center box-icon">
							<a href="#"><i class="fa fa-hotel icon-vividi"></i>&nbsp; Hotel</a>
						</span>
						<span class="d-flex justify-content-md-center align-items-md-center box-icon">
							<a href="#"><i class="fa fa-map icon-vividi"></i>&nbsp; Tour Package</a>
						</span>
						<span class="d-flex justify-content-md-center align-items-md-center box-icon">
							<a href="#"><i class="fa fa-car icon-vividi"></i>&nbsp; Car Rentals</a>
						</span>
					</p>
				</div>
			</div>
		</div>
	</div>

	<?=$_content?>

	<footer class="ftco-footer ftco-bg-dark ftco-section">
		<div class="container">
			<div class="row mb-5 line-br no-bottom">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Vividi.id</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Information</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">About</a></li>
							<li><a href="#" class="py-2 d-block">Service</a></li>
							<li><a href="#" class="py-2 d-block">Terms and Conditions</a></li>
							<li><a href="#" class="py-2 d-block">Become a partner</a></li>
							<li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
							<li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Customer Support</h2>
					<ul class="list-unstyled">
						<li><a href="#" class="py-2 d-block">FAQ</a></li>
						<li><a href="#" class="py-2 d-block">Payment Option</a></li>
						<li><a href="#" class="py-2 d-block">Booking Tips</a></li>
						<li><a href="#" class="py-2 d-block">How it works</a></li>
						<li><a href="#" class="py-2 d-block">Contact Us</a></li>
					</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">Pondok Blimbing Indah Blok G1 No.3 Pandanwangi,<br>Kec. Blimbing, Kota Malang, Jawa Timur 65124</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">0812-1111-8486</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@vividi.id</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://vividi.id" target="_blank">VIVIDI</a>
					</p>
				</div>
			</div>
		</div>
	</footer>

<!--   loader-->
	<div id="ftco-loader" class="show fullscreen">
		<svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
		</svg>
	</div>


	<script src="<?=base_url("assets/js/jquery.min.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery-migrate-3.0.1.min.js")?>"></script>
	<script src="<?=base_url("assets/js/popper.min.js")?>"></script>
	<script src="<?=base_url("assets/js/bootstrap.min.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery.easing.1.3.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery.waypoints.min.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery.stellar.min.js")?>"></script>
	<script src="<?=base_url("assets/js/owl.carousel.min.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery.magnific-popup.min.js")?>"></script>
	<script src="<?=base_url("assets/js/aos.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery.animateNumber.min.js")?>"></script>
	<script src="<?=base_url("assets/js/bootstrap-datepicker.js")?>"></script>
	<script src="<?=base_url("assets/js/jquery.timepicker.min.js")?>"></script>
	<script src="<?=base_url("assets/js/scrollax.min.js")?>"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="<?=base_url("assets/js/google-map.js")?>"></script>
	<script src="<?=base_url("assets/js/main.js")?>"></script>
</body>
</html>
