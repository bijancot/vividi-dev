<?php
foreach ($data as $row) {
    ?>
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah <?= $row->nama_kamar ?></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Properti</label>
                    <p><?= $row->nama_prop ?></p>
                </div>
                <div class="form-group">
                    <label>Nama Kamar</label>
                    <input type="text" name="kamar" class="form-control" value="<?= $row->nama_kamar ?>" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi" minlength="50" maxlength="200" onkeyup="countChar1(this)"
                           class="form-control"
                           value="<?= $row->deskripsi ?>" required>
                    <div name="charNum1" id="charNum1">200</div>
                </div>
                <div class="form-group">
                    <label>Dewasa</label>
                    <input type="number" name="remaja" class="form-control" value="<?= $row->dewasa ?>" min="1"
                           required>
                </div>
                <div class="form-group">
                    <label>Anak</label>
                    <input type="number" name="anak" class="form-control" placeholder="Anak" min="0"
                           value="<?= $row->anak ?>"
                           required>
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
                        foreach ($foto as $f) {
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript">
        function countChar1(val) {
            var len = val.value.length;
            var ml = val.maxLength;
            $('#charNum1').text(ml - len);
        };
    </script>
    <?php
}
?>
