<!--<link rel="stylesheet" href="https://vividi.id/mitra/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">-->
<?php
foreach ($data as $row) {
	$alamat1 = explode(',', $row->alamat);
	$jamcheckin = date("G:i", strtotime($row->checkin));
	$jamcheckout = date("G:i", strtotime($row->checkout));
	?>


	<div style="width: 800px; margin:0 auto;">
		<div class="row">
			<div class="col-sm-6 col-md-8" style="background-color: #cccccc">
				<img src="https://vividi.id/wp-content/uploads/2019/10/new-logo.png" alt="" width="205" height="45"
					 style="margin-top: 10px;margin-bottom: 10px; margin-left: 5px"/>
				<span>E-Voucher</span>
				<span
					style="margin-right: 15px; margin-top: 10px; color: #000000; font-family: arial; font-size: 20px; font-weight: bold;float: right">BOOKING ID<br>
			<span
				style="display: inline-block;color: #003580; font-family: arial; font-size: 20px; font-weight: bold; margin-bottom: 10px"><?php echo $row->booking_no; ?></span>
		</span>
			</div>
		</div>

		<div class="row" style="margin-top: 10px">
			<div class="col-sm-6 col-md-6"
				 style="min-height: 200px; width: 395px;float: left; background-color: #F5F4F4">
				<b><span
						style="color: #000000; font-family: arial; margin-left: 20px; margin-top: 10px; display:inline-block; font-size: 20px"><?php echo $row->nama_properti; ?>
				</b></span>
				<br>
				<span
					style="color: #000000; font-family: arial; margin-left: 20px; display:inline-block; font-size: 15px">
				<?php echo $alamat1[0]; ?></span><br>
				<span
					style="color: #000000; font-family: arial; margin-left: 20px; display:inline-block; font-size: 15px">
				<?php echo $row->kota; ?></span><br>
				<span
					style="color: #000000; font-family: arial; margin-left: 20px; display:inline-block; font-size: 15px">
				<?php echo $row->negara; ?></span><br>
				<span
					style="color: #000000; font-family: arial; margin-left: 20px; display:inline-block;  font-size: 15px">Telepon :
				<?php echo $row->telepon; ?></span><br>
				<span
					style="color: #000000; font-family: arial; margin-top: 5px; margin-left: 20px; display:inline-block;  font-size: 15px">
				Pemesanan & Pembayaran Melalui
			</span><br>
				<span
					style="margin-bottom: 10px; color: #003580; font-family: arial;margin-left: 20px; display:inline-block;  font-size: 15px">
				Vividi Transwisata
			</span>
			</div>
			<div class="col-sm-6 col-md-6"
				 style="width: 385px; float: left; margin-left: 10px;">
				<img style="height: 200px; width: 395px;" src="<?php echo $row->thumbnail; ?>"/>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-6"
				 style="min-height: 200px; margin-top: 10px;width: 395px;float: left; background-color: #F5F4F4">
				<b><span
						style="color: #003580; font-family: arial; margin-left: 20px; margin-top: 10px; display:inline-block; font-size: 25px">
				Detail Pesanan
			</span></b><br>
				<b><span
						style="color: #000000; font-family: arial; margin-left: 20px; display:inline-block; font-size: 15px">
				<?php echo $row->nama_awal . " " . $row->nama_akhir; ?></span></b><br>
				<span
					style="color: #000000; font-family: arial; margin-top: 5px; margin-left: 20px; display:inline-block;  font-size: 15px">
				Check In
			</span><br>
				<span
					style="color: #003580; font-family: arial;margin-left: 20px; display:inline-block;  font-size: 15px">
				<?php echo $row->tglcheckin . ", Pukul " . $jamcheckin; ?>
			</span><br>
				<span
					style="color: #000000; font-family: arial; margin-top: 5px; margin-left: 20px; display:inline-block;  font-size: 15px">
				Check out
			</span><br>
				<span
					style="color: #003580; font-family: arial; margin-bottom: 10px; margin-left: 20px; display:inline-block;  font-size: 15px">
				<?php echo $row->tglcheckout . ", Pukul " . $jamcheckout; ?>
			</span><br>
				<span
					style="color: #000000; font-family: arial; margin-left: 20px; display:inline-block;  font-size: 15px">
				Pesan Tambahan</span><br>
				<span
					style="margin-bottom: 10px; color: #003580; font-family: arial; margin-left: 20px; display:inline-block;  font-size: 15px">
				<?php echo $row->pesan_tambahan; ?></span><br>
			</div>
			<div class="col-sm-6 col-md-6"
				 style="margin-top: 10px;width: 395px; min-height: 200px;float: left; background-color: #F5F4F4; margin-left: 10px">
			<span
				style="margin-top: 10px; color: #000000; font-family: arial; margin-left: 20px; display:inline-block; font-size: 15px">
				Tipe Kamar</span><br>
				<span
					style="margin-bottom:10px; color: #003580; font-family: arial; margin-left: 20px; display:inline-block; font-size: 15px">
				<?php echo $row->kamar; ?></span><br>
				<span
					style="color: #000000; font-family: arial; margin-left: 20px; display:inline-block;  font-size: 15px">
				Tamu per Kamar</span><br>
				<span
					style="margin-bottom: 10px; color: #003580; font-family: arial; margin-left: 20px; display:inline-block;  font-size: 15px">
				<?php echo $row->dewasa; ?> Dewasa, <?php echo $row->kecil; ?> Anak</span><br>
				<span
					style="color: #000000; font-family: arial; margin-left: 20px; display:inline-block;  font-size: 15px">
				Jumlah Kamar</span><br>
				<span
					style="margin-bottom: 10px; color: #003580; font-family: arial; margin-left: 20px; display:inline-block;  font-size: 15px">
				<?php echo $row->jum_kamar; ?> unit</span><br>
				<span
					style="color: #000000; font-family: arial; margin-left: 20px; display:inline-block;  font-size: 15px">
				Sarapan Pagi</span><br>
				<span
					style="margin-bottom: 10px; color: #003580; font-family: arial; margin-left: 20px; display:inline-block;  font-size: 15px">
				Termasuk</span>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-12"
				 style="margin-top: 10px;width: 800px;float: left; background-color: #054175">
				<b><span
						style="margin-bottom: 5px; color: #ffffff; font-family: arial; margin-left: 20px; margin-top: 5px; display:inline-block; font-size: 16px">
				Kebijakan & Catatan Lainnya
			</span></b>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-12"
				 style="margin-top: 10px;width: 800px;float: left; background-color: #F5F4F4">
				<ul style="font-family: arial; font-size: 12px">
					<li><?php echo $row->cancel; ?></li>
					<li><?php echo $row->extra; ?></li>
					<li><?php echo $row->pets; ?>
					</li>
					<li>Waktu yang ditampilkan sesuai dengan waktu lokal akomodasi.
					</li>
					<li>Prosedur pembatalan dapat dilihat di : www.vividi.id/refund
					</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-12"
				 style="margin-top: 10px;width: 800px;float: left; background-color: #F5F4F4">
				<ul style="font-family: arial; font-size: 12px">
					<li>Kamu mungkin diminta untuk menunjukkan identitas resmi yang dikeluarkan oleh pemerintah saat
						check-in.
					</li>
					<li>Mungkin pihak akomodasi akan meminta deposit check-in.</li>
					<li>Apabila ada pesan tambahan yang kamu minta, semua akan kembali sesuai ketersediaan disaat
						check-in
					</li>
					<li>Apabila kamu akan check-in lebih awal atau terlambat diluar jam yang telah ditentukan, sebaiknya
						menghubungi
						pihak akomodasi terlebih dahulu demi kelancaran proses check-in.
					</li>
					<li>Biaya tambahan seperti parkir, deposit, telepon, layanan kamar ditangani langsung antara kamu
						dan pihak akomodasi.
					</li>
					<li>Biaya penambahan orang dapat berlaku dan berbeda-beda menurut kebijakan akomodasi.
					</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-4" style="margin-top: 10px;float: left; background-color: #F5F4F4">
			<span
				style="font-family: arial; font-size: 15px; display: inline-block; margin-left: 10px; margin-top: 10px; margin-right: 10px">Kirim Pesan Cepat</span><br>
				<a style="text-decoration: none;"
				   href="https://api.whatsapp.com/send?phone=6281211118486&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
					<img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt=""
						 style="height: 25px; margin-left: 10px; margin-right:5px; margin-top: 10px; margin-bottom: 10px"/>
				</a>
				<a style="text-decoration: none;"
				   href="https://api.whatsapp.com/send?phone=6287885124429&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
					<img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt=""
						 style="height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
				</a>
				<a style="text-decoration: none;"
				   href="https://api.whatsapp.com/send?phone=6285933736049&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
					<img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt=""
						 style="height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
				</a>
				<a style="text-decoration: none;"
				   href="https://api.whatsapp.com/send?phone=6281211118486&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
					<img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt=""
						 style="height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
				</a>
			</div>

			<div class="col-sm-6 col-md-4"
				 style="margin-left: 20px; margin-top: 10px;float: left; background-color: #F5F4F4">
			<span
				style="font-family: arial; font-size: 15px; display: inline-block; margin-left: 10px; margin-top: 10px; margin-right: 10px">Bantuan Melalui Email</span><br>
				<img src="https://vividi.id/wp-content/themes/Travelo/images/email.png" alt=""
					 style="margin-left: 10px; height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
				<span
					style="text-decoration: none;font-family: arial; display: inline-block; margin-top: 20px; margin-right: 20px;  float: right">info@vividi.id</span>
			</div>

			<div class="col-sm-6 col-md-4"
				 style="margin-left: 20px; margin-top: 10px;float: left; background-color: #F5F4F4">
			<span
				style="font-family: arial; font-size: 15px; display: inline-block; margin-left: 20px; margin-top: 10px; margin-right: 15px">Bantuan Telepon</span><br>
				<img src="https://vividi.id/wp-content/themes/Travelo/images/telephone.jpg" alt=""
					 style="height: 25px; margin-left: 10px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
				<a style="text-decoration: none; display: inline-block; margin-top: 20px; margin-right: 20px;  float: right"
				   href="tel:+623414382253">+62 341 438 2253</a>
			</div>

			<div class="col-sm-6 col-md-4"
				 style="margin-left: 20px; margin-top: 10px;float: left; background-color: #F5F4F4">
			<span
				style="font-family: arial; font-size: 15px; display: inline-block; margin-left: 20px; margin-top: 10px; margin-right: 15px">Bantuan mendesak 24 jam</span><br>
				<img src="https://vividi.id/wp-content/themes/Travelo/images/telephone.jpg" alt=""
					 style="height: 25px; margin-left: 10px;margin-top: 10px; margin-bottom: 10px"/>
				<a style="text-decoration: none; display: inline-block; margin-top: 20px; margin-right: 30px;  float: right"
				   href="tel:+6281211118486">+62 812 1111 8486</a>
			</div>
		</div>

		<div class="row col-sm-6 col-md-12" style="margin-top: 10px;width: 800px;float: left;">
			<hr>
			<div class="col-sm-6 col-md-4"
				 style="width: 200px; margin-top: 10px;float: left; background-color: #cccccc">
			<span
				style="font-family: arial; font-size: 15px; display: inline-block; margin-left: 10px; margin-top: 10px; margin-right: 10px">PIN</span><br>
				<span
					style="margin-bottom: 5px; color: #003580; font-family: arial; font-size: 15px; display: inline-block; margin-left: 10px; margin-right: 10px">
					<?php echo $row->pin ;?></span><br>
				<span
					style="font-family: arial; font-size: 15px; display: inline-block; margin-left: 10px; margin-top: 10px; margin-right: 10px">Nomor Kwitansi</span><br>
				<span
					style="margin-bottom: 10px; color: #003580; font-family: arial; font-size: 15px; display: inline-block; margin-left: 10px; margin-right: 10px">
					<?php echo $row->id ;?></span><br>
			</div>

			<div class="col-sm-6 col-md-4"
				 style="margin-left: 30px; margin-top: 10px;float: left">
				<img src="https://vividi.id/wp-content/themes/Travelo/images/google.png"
					 style="width: 140px; height: 45px; margin-bottom: 5px"><br>
				<img src="https://vividi.id/wp-content/themes/Travelo/images/app.png"
					 style="width: 140px; height: 45px; margin-bottom: 5px">
			</div>

			<div class="col-sm-6 col-md-4"
				 style="display: inline-block; margin-left: 30px;float: left">
				<div style="display:inline-block; vertical-align: top">
					<img src="https://vividi.id/wp-content/themes/Travelo/images/logoandroid.png" alt=""
						 style="width: 50px; height: 90px; margin-bottom: 5px; margin-top: 10px"/>
				</div>
				<div style="display:inline-block;margin-top: 10px; font-size: 15px; font-family: arial">
				<span>Apabila tamu tidak sempat<br>
				untuk mencetak E-Voucher<br>
					kami mohon kepada mitra<br>
					agar memudahkan proses<br>
					check-in dengan meminta<br>
					ID & Booking ID
				</span>
				</div>
			</div>

			<div class="col-sm-6 col-md-4"
				 style="margin-left: 30px; margin-top: 10px;float: left">
				<img src="https://vividi.id/wp-content/themes/Travelo/images/frame.png" alt=""
					 style="width: 120px; height: 120px; margin-bottom: 10px"/>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-12" style="width: 800px;float: left;text-align: center">
				<hr>
				<span
					style="font-family: arial; font-size: 15px; display: inline-block; margin-top: 10px; margin-bottom: 10px;">© 2019 PT. Vividi Transindo Utama</span>
			</div>
		</div>
	</div>
<?php } ?>
