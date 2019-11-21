<?php foreach ($data as $row) {	?>
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detail <?= $row->judul ?></h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nama Properti</label>
					<p><?= $row->judul ?></p>
				</div>
				<div class="form-group">
					<label>Deskripsi</label>
					<p><?= $row->deskripsi ?></p>
				</div>
				<div class="form-group">
					<label>Fasilitas</label><br>
					<div class="row">
						<?php
						foreach ($amenity as $a){
							?>
							<div class="col-sm-4 col-md-4">
								<p><?= $a->amenity ?></p>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="form-group col-md-6">
					<label>Tipe Properti</label>
					<p><?= $row->tipe_properti ?></p>
				</div>
				<div class="form-group col-md-6">
					<label>Bintang</label>
					<p><?= $row->star ?></p>
				</div>
				<div class="form-group">
					<label>Minimal Menginap</label>
					<?php if($row->stay == ''){?>
						<p>Tidak Ada Batas Minimal</p>
					<?php }  else {?>
						<p><?= $row->stay ?> Malam</p>
					<?php } ?>
				</div>
				<div class="form-group">
					<label>Deskripsi Singkat</label>
					<p><?= $row->brief ?></p>
				</div>
				<div class="form-group col-md-6">
					<label>Negara</label>
					<p><?= $row->country ?></p>
				</div>
				<div class="form-group col-md-6">
					<label>Kota</label>
					<p><?= $row->city ?></p>
				</div>
				<div class="form-group col-md-6">
					<label>No Telepon</label>
					<p><?= $row->phone ?></p>
				</div>
				<div class="form-group col-md-6">
					<label>Email</label>
					<p><?= $row->email ?></p>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<p><?= $row->alamat ?></p>
				</div>
				<div class="form-group">
					<label>Foto</label>
					<div class="row">
						<?php
						foreach ($foto as $f){
							?>
							<div class="col-sm-6 col-md-6">
								<p><img src="../wp-content/uploads/<?= $f->foto ?>" width="100%" height="150px"></p>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
