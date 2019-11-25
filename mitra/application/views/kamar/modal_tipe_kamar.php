<?php
foreach ($data as $row) {
?>
<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Detail <?= $row->nama_kamar ?></h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Nama Properti</label>
				<p><?= $row->nama_prop ?></p>
            </div>
            <div class="form-group">
                <label>Nama Kamar</label>
				<p><?= $row->nama_kamar ?></p>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
				<p><?= $row->deskripsi ?></p>
            </div>
            <div class="form-group">
                <label>Dewasa</label>
				<p><?= $row->dewasa ?> orang</p>
            </div>
            <div class="form-group">
                <label>Anak</label>
				<p><?= $row->anak ?> anak</p>
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
            <div class="form-group">
                <label>Foto</label>
				<div class="row">
					<?php
					foreach ($foto as $f){
						?>
						<div class="col-sm-6 col-md-6">
							<p><img src="../wp-content/uploads/<?= $f->foto ?>" width="100%"></p>
						</div>
					<?php } ?>
				</div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
