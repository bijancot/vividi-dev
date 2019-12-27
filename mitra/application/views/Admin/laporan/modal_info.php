<?php
foreach ($data as $row) {
    ?>
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= $row->booking_no; ?></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Pemilik Rekening</label>
                    <input type="text" name="pemilik" class="form-control" value="<?= $row->name; ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Nama Bank</label>
                    <input type="text" name="bank" class="form-control" value="<?= $row->bank; ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Total</label>
                    <input type="text" name="total" class="form-control" value="Rp. <?php echo number_format($row->harga,0,"",".");?>" disabled>
                </div>
                <div class="form-group">
                    <label>Kode Referensi</label>
                    <input type="text" name="kode" class="form-control" value="<?= $row->kode; ?>" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" style="float: left" data-dismiss="modal"> Kembali </button>
            </div>
        </div>
    </div>
    <?php
}
?>