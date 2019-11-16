<?php
foreach ($data as $row) {
    ?>
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Harga</h4>
            </div>
            <?php echo form_open('properti/save_ubah_harga'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" placeholder="Judul" value="<?= $row->id ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Properti</label>
                    <input type="text" name="properti" class="form-control" placeholder="Judul" value="<?= $row->properti ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Tipe Kamar</label>
                    <input type="text" name="kamar" class="form-control" placeholder="Deskripsi" value="<?= $row->kamar ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Date From</label>
                    <input type="text" name="dari" class="form-control" placeholder="Dewasa" value="<?= $row->dari ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Date To</label>
                    <input type="text" name="sampai" class="form-control" placeholder="Anak" value="<?= $row->sampai ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Allotment</label>
                    <input type="text" name="allotment" class="form-control" placeholder="Anak" value="<?= $row->allotment ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" name="harga" class="form-control" placeholder="Anak" value="<?= $row->harga ?>" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-success" value="Ubah" name="submit">
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <?php
}
?>