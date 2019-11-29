<?php
foreach ($data as $row) { ?>
<img src="https://vividi.id/wp-content/uploads/2019/10/new-logo.png" alt="" width="205" height="45"
	 style="margin-top: 10px;margin-bottom: 10px; margin-left: 5px"/>
<p><span style="font-size: 20px"><b>Hallo, <?php echo $row->display_name?></b></span></p>
<p>
	Akun anda telah di verifikasi oleh pihak Vividi Transwisata. Silahkan login ke dashboard mitra melalui link ......... dengan
		user dan password yang tersedia di bawah ini.
</p>
<p>
	User name : <?php echo $row->user_login ; ?>
</p>
<p>
	Password : <?php echo $row->user_pass; ?>
</p>
	<p>
		Kamu Bisa Merubah Password Dengan Cara Login Terlebih Dahulu, Klik Di Pojok Kanan Profile, Lalu Ubah Password Kamu. Silahkan Klik <a href="localhost/vividi-dev/mitra/">Login</a>
	</p>
<p>
	<b style="color: #0A246A">PT. Vividi Transindo Utama</b>
</p>
<p>
	Pondok Belimbing Indah No.4<br>Kota Araya Malang Jawa Timur<br>Tlp : 0341-4382253<br>Hotline : 0812 1111 8486<br>info@vividi.id
	| <a href="https://vividi.id/">www.vividi.id</a>
</p>
<?php } ?>
