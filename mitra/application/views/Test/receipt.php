<!--<link rel="stylesheet" href="https://vividi.id/mitra/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">-->
<?php
foreach ($data as $row) {
	$jml = $row->jum_kamar;
//	$satuan = number_format($row->harga_total,0,"",".");
	$satuan = $row->harga_total;
	$total = $jml * $satuan;
	$jamcheckin = date("G:i", strtotime($row->checkin));
	?>

	<style>
		.judul{

		}

		.isi{

		}
	</style>

	<div style="width: 56%; margin:0 auto;">
		<div class="row">
			<div class="col-sm-6 col-md-8">
				<img src="https://vividi.id/wp-content/uploads/2019/10/new-logo.png" alt="" width="205" height="45"
					 style="margin-top: 10px;margin-bottom: 10px; margin-left: 5px"/>
				<span>E-Receipt</span>
				<span
					style="margin-right: 15px; margin-top: 10px; color: #000000; font-family: arial; font-size: 20px; font-weight: bold;float: right">BOOKING ID<br>
			<span
				style="margin-right: 15px;color: #003580; font-family: arial; font-size: 20px; font-weight: bold;float: right"><?php echo $row->booking_no ?></span><br>
			</div>

			<div class="col-sm-6 col-md-8">
				<b><span
						style="font-size: 20px; color: #003580; display: inline-block; margin-left: 20px; margin-top: 20px; margin-bottom: 5px">Detail Pembayaran</span></b>
				<table style="margin-left: 20px">
					<tr>
						<td>No. Kwitansi</td>
						<td style="font-weight: bold; color: #003580;"><?php echo $row->id; ?></td>
					</tr>
					<tr>
						<td>Sistem Pembayaran</td>
						<td style="font-weight: bold; color: #003580;">Cash</td>
					</tr>
					<tr>
						<td>Status Pembayaran</td>
						<td style="font-weight: bold; color: #003580;">Lunas</td>
					</tr>
				</table>
			</div>

			<div class="col-sm-6 col-md-8">
				<span
					style="font-weight: bold; font-size: 20px; color: #003580; display: inline-block; margin-left: 20px; margin-top: 20px; margin-bottom: 5px">Data Pemesan</span>
				<table style="margin-left: 20px">
					<tr>
						<td colspan="3"
							style="font-weight: bold; font-size: 20px;"><?php echo $row->nama_awal . " " . $row->nama_akhir ?></td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td>:</td>
						<td><?php echo $row->cust_phone; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><?php echo $row->cust_email; ?></td>
					</tr>
				</table>
			</div>

			<div class="col-sm-6 col-md-8">
				<b><span
						style="font-size: 20px; color: #003580; display: inline-block; margin-left: 20px; margin-top: 20px; margin-bottom: 5px">Detail Mitra Transportasi</span></b>
				<table style="margin-left: 20px">
					<tr>
						<td style="font-weight: bold">VIVIDI TRANSWISATA MALANG</td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td>Kota Araya, Malang, Jawa Timur</td>
					</tr>
					<tr>
						<td>Indonesia</td>
					</tr>
					<tr>
						<td>Telepon: (0341) 4382253</td>
					</tr>
				</table>
			</div>

			<div class="col-sm-6 col-md-8">
				<b><span style="font-size: 20px; color: #003580; display: inline-block; margin-left: 20px; margin-top: 20px; margin-bottom: 5px">Detail Pembelian</span></b>
				<table style="margin-left: 20px">
					<tr style="background-color : #073f70;">
						<td style="color: #ffffff">No</td>
						<td style="color: #ffffff; width: 15%">Jenis Produk</td>
						<td style="color: #ffffff; width: 40%">Deskripsi</td>
						<td style="color: #ffffff;">Jml.</td>
						<td style="color: #ffffff; width: 18%">Satuan (Rp)</td>
						<td style="color: #ffffff; width: 18%">Total (Rp)</td>
					</tr>
					<tr style="background-color: #2f8ad9;">
						<td>1</td>
						<td>Akomodasi</td>
						<td><?php echo $row->nama_properti . " Check In " . $row->tglcheckin . " Pukul " . $jamcheckin; ?></td>
						<td></td>
						<td>Rp. <?php echo $satuan; ?></td>
						<td>Rp. <?php echo $total; ?></td>
					</tr>
					<tr style="background-color: #2f8ad9;">
						<td></td>
						<td></td>
						<td><?php echo $row->kamar; ?></td>
						<td><?php echo $jml; ?></td>
						<td></td>
						<td></td>
					</tr>
					<tr style="background-color: #2f8ad9;">
						<td colspan="4"></td>
						<td style="font-weight: bold">TOTAL</td>
						<td>Rp. <?php echo $total; ?></td>
					</tr>
					<tr style="background-color: #2f8ad9;">
						<td colspan="4"></td>
						<td style="font-weight: bold">ADMIN</td>
						<td>----</td>
					</tr>
					<tr style="background-color: #2f8ad9;">
						<td colspan="4"></td>
						<td style="font-weight: bold">JUMLAH</td>
						<td>Rp. <?php echo $total; ?></td>
					</tr>
				</table>

				<div class="col-sm-6 col-md-8">
					<img style="margin-bottom: 30px; margin-left: 30px; margin-top: 20px; width: 250px; height: 150px;"
						 src="https://vividi.id/mitra/assets/images/email/paid.jpg">
				</div>
				<div class="col-sm-6 col-md-4"
					 style="margin-left: 20px; margin-top: 10px;float: left; background-color: #F5F4F4">
			<span
				style="font-family: arial; font-size: 15px; display: inline-block; margin-left: 20px; margin-top: 10px; margin-right: 15px">Kirim Pesan Cepat</span><br>
					<a style="margin-left: 20px; text-decoration: none; display: inline-block; margin-top: 20px; margin-right: 30px;  float: right"
					   href="tel:+6281211118486">+62 812 1111 8486</a>
				</div>
				<div class="col-sm-6 col-md-4"
					 style="margin-left: 10px; margin-top: 10px;float: left; background-color: #F5F4F4">
			<span
				style="font-family: arial; font-size: 15px; display: inline-block; margin-left: 10px; margin-top: 10px; margin-right: 10px">Bantuan Melalui Email</span><br>
					<img src="https://vividi.id/wp-content/themes/Travelo/images/email.png" alt=""
						 style="margin-left: 10px; height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
					<span
						style="text-decoration: none;font-family: arial; display: inline-block; margin-top: 20px; margin-right: 20px;  float: right">info@vividi.id</span>
				</div>

				<div class="col-sm-6 col-md-4"
					 style="margin-left: 10px; margin-top: 10px;float: left; background-color: #F5F4F4">
			<span
				style="font-family: arial; font-size: 15px; display: inline-block; margin-left: 20px; margin-top: 10px; margin-right: 15px">Bantuan Telepon</span><br>
					<img src="https://vividi.id/wp-content/themes/Travelo/images/telephone.jpg" alt=""
						 style="height: 25px; margin-left: 10px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
					<a style="text-decoration: none; display: inline-block; margin-top: 20px; margin-right: 20px;  float: right"
					   href="tel:+623414382253">+62 341 438 2253</a>
				</div>

				<div class="col-sm-6 col-md-4"
					 style="margin-left: 10px; margin-top: 10px;float: left; background-color: #F5F4F4">
			<span
				style="font-family: arial; font-size: 15px; display: inline-block; margin-left: 20px; margin-top: 10px; margin-right: 15px">Bantuan mendesak 24 jam</span><br>
					<img src="https://vividi.id/wp-content/themes/Travelo/images/telephone.jpg" alt=""
						 style="height: 25px; margin-left: 10px;margin-top: 10px; margin-bottom: 10px"/>
					<a style="text-decoration: none; display: inline-block; margin-top: 20px; margin-right: 30px;  float: right"
					   href="tel:+6281211118486">+62 812 1111 8486</a>
				</div>
			</div>

			<div class="col-sm-6 col-md-12" style="width: 800px;float: left;text-align: center">
				<hr>
				<span
					style="color: #003580; font-family: arial; font-size: 15px; display: inline-block; margin-top: 10px; margin-bottom: 10px;">Syarat dan Ketentuan berlaku, silahkan lihat https://vividi.id/terms-conditions/</span>
			</div>

			<div class="col-sm-6 col-md-12" style="width: 800px;float: left;text-align: center">
				<hr>
				<span
					style="font-family: arial; font-size: 15px; display: inline-block; margin-top: 10px; margin-bottom: 10px;">© 2019 PT. Vividi Transindo Utama</span>
			</div>
		</div>
	</div>
<?php } ?>
