<?php
foreach ($data as $row) { ?>
	<?php
	$harga = explode('.',$row->harga_total);
	?>

	<span
		style="font-size: 25px">Konfirmasi Pembayaran atas nama <?php echo($row->nama_awal . " " . $row->nama_akhir); ?> kode Booking <?php echo($row->booking_no); ?>
		untuk pemesanan <?php echo($row->nama_properti); ?> telah melakukan pembayaran melalui <?php echo($row->nama_bank); ?> dengan Nominal <?php echo($harga[0]); ?>.</span>

<?php } ?>
