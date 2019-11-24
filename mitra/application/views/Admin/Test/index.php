<?php
global $booking_data;
	$accommodation_name = get_the_title( $booking_data['accommodation_id'] );
	$booking_total_price = esc_html( trav_get_price_field( $booking_data['total_price'] * $booking_data['exchange_rate'], $booking_data['currency_code'], 0 ) );
	$booking_checkin_time = date( 'l,j F Y', trav_strtotime($booking_data['date_from']) );
	$booking_checkout_time = date( 'l,j F Y', trav_strtotime($booking_data['date_to']) );
	$booking_valid_until = date( 'l,j F Y H:i:s', trav_strtotime($booking_data['valid_until']) );
	$booking_created_time = date( 'l,j F Y H:i:s', trav_strtotime($booking_data['created']) );

?>

<div style="width: 1200px;  margin:0 auto; margin-left: 150px">
	<div class="row">
		<div class="col-sm-6 col-md-8" style="background-color: #cccccc">
			<img src="https://vividi.id/wp-content/uploads/2019/10/new-logo.png" alt="" width="205" height="45" style="margin-top: 10px;margin-bottom: 10px; margin-left: 5px" />
			<span style="color: #000000;">E-Payment</span>
			<span style="margin-right: 15px; margin-top: 20px; color: #003580; font-family: arial; font-size: 20px; font-weight: bold;float: right"><?php echo($booking_data['booking_no']); ?></span>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6 col-md-8" style="background-color: #e6e6e6">
			<span style="color: #000000; font-family: arial; font-size: 20px; margin-left: 20px; margin-top: 10px; display:inline-block;">Segera selesaikan pembayaran Kamu sebelum</span><br>
			<?php
			$a = explode(',', $booking_valid_until);
			$b = explode(' ', $a[1] );
			if ($a[0] == 'Monday') {
				$a[0] = 'Senin';
			} else if ($a[0] == 'Tuesday') {
				$a[0] = 'Selasa';
			} else if ($a[0] == 'Wednesday') {
				$a[0] = 'Rabu';
			} else if ($a[0] == 'Thursday') {
				$a[0] = 'Kamis';
			} else if ($a[0] == 'Friday') {
				$a[0] = "Jum'at";
			} else if ($a[0] == 'Saturday') {
				$a[0] = 'Sabtu';
			} else {
				$a[0] = 'Minggu';
			}
			if ($b[1] == 'January') {
				$b[1] = 'Januari';
			} else if ($b[1] == 'February') {
				$b[1] = 'Februari';
			} else if ($b[1] == 'March') {
				$b[1] = 'Maret';
			} else if ($b[1] == 'April') {
				$b[1] = 'April';
			} else if ($b[1] == 'May') {
				$b[1] = 'Mei';
			} else if ($b[1] == 'June') {
				$b[1] = 'Juni';
			} else if ($b[1] == 'July') {
				$b[1] = 'Juli';
			} else if ($b[1] == 'August') {
				$b[1] = 'Agustus';
			} else if ($b[1] == 'September') {
				$b[1] = 'September';
			} else if ($b[1] == 'October') {
				$b[1] = 'Oktober';
			} else if ($b[1] == 'November') {
				$b[1] = 'November';
			} else {
				$b[1] = 'Desember';
			}
			?>
			<span style="font-family: arial; color: #023f75; font-size: 17px; margin-left: 20px; margin-bottom: 10px; display:inline-block;"><b><?php echo ($a[0].", ".$b[0]." ".$b[1]." ".$b[2]." ".$b[3]); ?></b></span>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6 col-md-8" style="background-color: #cccccc">
			<div style="float: right; background-color: #0a447a;">
				<span style="font-family: arial; display: inline-block; color: white; margin: 10px 10px 10px 10px">PEMESANAN</span>
			</div>
			<span style="color: #000000; font-family: arial; margin-left: 20px; margin-top: 10px; display:inline-block; font-size: 20px"><b><?php echo ($accommodation_name); ?></b></span><br>
			<?php
			$a = explode(',', $booking_checkin_time);
			$b = explode(' ', $a[1] );
			if ($a[0] == 'Monday') {
				$a[0] = 'Senin';
			} else if ($a[0] == 'Tuesday') {
				$a[0] = 'Selasa';
			} else if ($a[0] == 'Wednesday') {
				$a[0] = 'Rabu';
			} else if ($a[0] == 'Thursday') {
				$a[0] = 'Kamis';
			} else if ($a[0] == 'Friday') {
				$a[0] = "Jum'at";
			} else if ($a[0] == 'Saturday') {
				$a[0] = 'Sabtu';
			} else {
				$a[0] = 'Minggu';
			}
			if ($b[1] == 'January') {
				$b[1] = 'Januari';
			} else if ($b[1] == 'February') {
				$b[1] = 'Februari';
			} else if ($b[1] == 'March') {
				$b[1] = 'Maret';
			} else if ($b[1] == 'April') {
				$b[1] = 'April';
			} else if ($b[1] == 'May') {
				$b[1] = 'Mei';
			} else if ($b[1] == 'June') {
				$b[1] = 'Juni';
			} else if ($b[1] == 'July') {
				$b[1] = 'Juli';
			} else if ($b[1] == 'August') {
				$b[1] = 'Agustus';
			} else if ($b[1] == 'September') {
				$b[1] = 'September';
			} else if ($b[1] == 'October') {
				$b[1] = 'Oktober';
			} else if ($b[1] == 'November') {
				$b[1] = 'November';
			} else {
				$b[1] = 'Desember';
			}
			?>
			<span style="color: #000000; font-family: arial; margin-left: 20px; margin-top: 5px; display:inline-block; font-size: 15px"><?php echo ($a[0].", ".$b[0]." ".$b[1]." ".$b[2]. " |"); ?></span>
			<span style="color: #023f75; font-family: arial; margin-bottom: 10px;margin-top: 5px; display:inline-block; font-size: 15px"><?php echo esc_html( trav_get_day_interval( $booking_data['date_from'], $booking_data['date_to'] ) . ' ' . __( 'Malam', 'trav' ) ); ?></span>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6 col-md-8" style="background-color: #F5F4F4">
			<span style="color: #000000; font-family: arial; margin-left: 20px; margin-top: 10px; display:inline-block; font-size: 20px"><b>Yth, <?php echo ($booking_data['first_name'])," ", ($booking_data['last_name']) ; ?></b></span><br>
			<span style="color: #000000; font-family: arial; margin-bottom: 10px; margin-left: 20px; margin-top: 2px; display:inline-block; font-size: 15px">Mohon Pembayaran di Transfer ke</span><br>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6 col-md-8" style="background-color: #e6e6e6">
			<span style="color: #000000; font-family: arial; margin-left: 20px; margin-top: 10px; display:inline-block; font-size: 22px"><b>Nomor Rekening</b></span><br>
			<span style="color: #000000; font-family: arial; margin-bottom: 10px; margin-left: 20px; margin-top: 2px; display:inline-block; font-size: 15px">PT. Vividi Transindo Utama</span>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6 col-md-8" style="background-color: #F5F4F4">
			<img src="<?php echo ($booking_data['bank']);?>" style="display: inline;width:72px; height:48px; margin-left: 20px; border-radius:5px; margin-top: 10px; margin-bottom: 10px "/>
			<span id="copyTarget" style="font-family: arial; margin-top: 20px;float: right; font-size: 18px; margin-right: 10px"><?php echo ($booking_data['no_rekening'])?> <img style="width: 20px; height: 20px" src="https://vividi.id/wp-content/themes/Travelo/images/copy.png" id="copyButton"/></span>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6 col-md-8" style="background-color: #e6e6e6">
			<span style="display:inline-block; font-family: arial; margin-bottom: 10px; margin-left: 20px; margin-top: 10px; font-size: 20px; color: red;">Total : <?php echo ($booking_total_price); ?></span>
		</div>
	</div>

	<div class="row" style="margin-top: 10px">
		<div class="col-sm-6 col-md-8" style="background-color: #F5F4F4">
			<span style="color: #000000; font-family: arial; font-size: 20px; display: inline-block; margin-left: 20px; margin-top: 10px">Apabila Kamu sudah melakukan pembayaran</span><br>
			<span style="color: #000000; font-family: arial; font-size: 12px; margin-left: 20px; display: inline-block; margin-top: 2px">Lakukan konfirmasi pembayaran agar Kami dapat segera memproses voucher hotel ke alamat Email Kamu.</span><br>
			<span style="color: #000000; font-family: arial; font-size: 12px; margin-left: 20px; display: inline-block; margin-top: 2px; margin-bottom: 10px;">Caranya mudah, klik nomor rekening yang sudah Kamu bayar di atas.</span>
		</div>
	</div>

	<div class="row" style="margin-top: 10px">
		<div class="col-sm-6 col-md-8" style="background-color: #F5F4F4">
			<span style="color: #000000; font-family: arial; font-size: 20px; display: inline-block; margin-left: 20px; margin-top: 10px">Ada pertanyaan lainnya ?</span><br>
			<span style="color: #000000; font-family: arial; font-size: 12px; margin-left: 20px; display: inline-block; margin-top: 2px; margin-bottom: 10px;">Hubungi kami segera, dengan senang hati kami akan membantu 24/7 hari.</span><br>
		</div>
	</div>

	<div class="row" style="margin-top: 10px; display: inline-block; margin-right: 14px">
		<div class="col-sm-6 col-md-12" style="background-color: #F5F4F4;height:75px;">
			<span style="color: #000000; font-family: arial; font-size: 15px; display: inline-block; margin-left: 10px; margin-top: 10px; margin-right: 10px">Kirim Pesan Cepat</span><br>
			<a style="text-decoration: none;" href="https://api.whatsapp.com/send?phone=6281211118486&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
				<img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt="" style="height: 25px; margin-left: 10px; margin-right:5px; margin-top: 10px; margin-bottom: 10px"/>
			</a>
			<a style="text-decoration: none;" href="https://api.whatsapp.com/send?phone=6287885124429&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
				<img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt="" style="height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
			</a>
			<a style="text-decoration: none;" href="https://api.whatsapp.com/send?phone=6285933736049&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
				<img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt="" style="height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
			</a>
			<a style="text-decoration: none;" href="https://api.whatsapp.com/send?phone=6281211118486&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
				<img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt="" style="height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
			</a>
		</div>
	</div>

	<div class="row" style="margin-top: 10px;display: inline-block; margin-right: 14px">
		<div class="col-sm-6 col-md-12" style="background-color: #F5F4F4;height:75px;">
			<span style="color: #000000; font-family: arial; font-size: 15px; display: inline-block; margin-left: 10px; margin-top: 10px; margin-right: 10px">Bantuan Melalui Email</span><br>
			<img src="https://vividi.id/wp-content/themes/Travelo/images/email.png" alt="" style="margin-left: 10px; height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
			<a href="mailto:info@vividi.id">
				<span style="color: #023f75; text-decoration: none;font-family: arial; display: inline-block; margin-top: 20px; margin-right: 20px;  float: right">info@vividi.id</span>
			</a>
		</div>
	</div>

	<div class="row" style="margin-top: 10px;display: inline-block; margin-right: 14px">
		<div class="col-sm-6 col-md-12" style="background-color: #F5F4F4;height:75px;">
			<span style="color: #000000; font-family: arial; font-size: 15px; display: inline-block; margin-left: 20px; margin-top: 10px; margin-right: 15px">Bantuan Telepon</span><br>
			<img src="https://vividi.id/wp-content/themes/Travelo/images/telephone.jpg" alt="" style="height: 25px; margin-left: 10px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
			<a style="color: #023f75; text-decoration: none; display: inline-block; margin-top: 20px; margin-right: 20px;  float: right" href="tel:+623414382253">+62 341 438 2253</a>
		</div>
	</div>

	<div class="row" style="margin-top: 10px;display: inline-block;">
		<div class="col-sm-6 col-md-12" style="background-color: #F5F4F4;height:75px;">
			<span style="color: #000000; font-family: arial; font-size: 15px; display: inline-block; margin-left: 20px; margin-top: 10px; margin-right: 15px">Bantuan mendesak 24 jam</span><br>
			<img src="https://vividi.id/wp-content/themes/Travelo/images/telephone.jpg" alt="" style="height: 25px; margin-left: 10px;margin-top: 10px; margin-bottom: 10px"/>
			<a style="color: #023f75; text-decoration: none; display: inline-block; margin-top: 20px; margin-right: 30px;  float: right" href="tel:+6281211118486">+62 812 1111 8486</a>
		</div>
	</div><hr>

	<div class="row" style="margin-top: 10px">
		<div class="col-sm-6 col-md-8" style="background-color: #F5F4F4">
			<span style="color: #000000; font-family: arial; font-size: 15px; margin-left: 20px; display: inline-block; margin-top: 10px; margin-bottom: 10px;">Email ini ditujukan kepada <?php echo ($booking_data['first_name'])," ", ($booking_data['last_name']) ; ?>, karena telah melakukan
			pemesanan di vividi.id</span><br>
		</div>
	</div><hr>

	<div class="row" style="margin-top: 10px">
		<div class="col-sm-6 col-md-8" style="background-color: #F5F4F4; text-align: center">
			<span style="color: #000000; font-family: arial; font-size: 15px; display: inline-block; margin-top: 10px; margin-bottom: 10px;">© 2019 PT. Vividi Transindo Utama</span><br>
		</div>
	</div>
</div>
