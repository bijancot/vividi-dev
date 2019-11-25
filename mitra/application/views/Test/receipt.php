<!--<link rel="stylesheet" href="https://vividi.id/mitra/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">-->
<?php
foreach ($data as $row) {
	$jml = $row->jum_kamar;
//	$satuan = number_format($row->harga_total,0,"",".");
	$satuan = $row->harga_total;
	$total = $jml * $satuan;
	?>

	<div style="width: 50%; margin:0 auto;">
		<div class="row">
			<div class="col-sm-6 col-md-8" style="background-color: #F3EDED">
				<img src="https://vividi.id/wp-content/uploads/2019/10/new-logo.png" alt="" width="205" height="45"
					 style="margin-top: 10px;margin-bottom: 10px; margin-left: 5px"/>
				<span>E-Receipt</span>
				<span
					style="margin-right: 15px; margin-top: 10px; color: #000000; font-family: arial; font-size: 20px; font-weight: bold;float: right">BOOKING ID<br>
			<span
				style="margin-right: 15px;color: #003580; font-family: arial; font-size: 20px; font-weight: bold;float: right"><?php echo $row->booking_no ?></span><br>
			</div>

			<div class="col-sm-6 col-md-8" style="background-color: #F3EDED">
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

			<div class="col-sm-6 col-md-8" style="background-color: #F3EDED">
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

			<div class="col-sm-6 col-md-8" style="background-color: #F3EDED">
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

			<div class="col-sm-6 col-md-8" style="background-color: #F3EDED">
				<span style="display: inline-block; margin-left: 20px; margin-top: 20px; margin-bottom: 5px">Detail Pembelian</span>
				<table border="1" style="margin-left: 20px">
					<tr>
						<td>No</td>
						<td style="width: 15%">Jenis Produk</td>
						<td style="width: 40%">Deskripsi</td>
						<td>Jml</td>
						<td style="width: 18%">Satuan (Rp)</td>
						<td style="width: 18%">Total (Rp)</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Akomodasi</td>
						<td><?php echo $row->nama_properti. " Check In ". $row->checkin ;?></td>
						<td></td>
						<td>Rp. <?php echo $satuan ;?></td>
						<td>Rp. <?php echo $total ;?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>Sarapan Pagi, Twin Bed</td>
						<td><?php echo $jml ;?></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="4"></td>
						<td>TOTAL</td>
						<td>2.800.000</td>
					</tr>
					<tr>
						<td colspan="4"></td>
						<td>ADMIN</td>
						<td>----</td>
					</tr>
					<tr>
						<td colspan="4"></td>
						<td>JUMLAH</td>
						<td>2.800.000</td>
					</tr>
				</table>
			</div>

		</div>
	</div>
<?php } ?>
