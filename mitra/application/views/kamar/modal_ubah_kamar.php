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
                <?php echo form_open(base_url('kamar/ubah')); ?>
                <div class="form-group">
                    <label>Nama Properti</label>
                    <p><?= $row->nama_prop ?></p>
                    <input type="hidden" name="id" class="form-control" value="<?= $row->id ?>">
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
                        <div class="col-sm-6 col-md-6">
                            <?php
                            foreach ($fasilitas as $a) {
                                $cek = '';
                                foreach ($amenity as $b) {
                                    if ($a->name == $b->amenity) {
                                        $cek = 'checked';
                                    }
                                }
                                ?>
                                <input type="checkbox" name="amenity[]" value="<?= $a->term_id ?>" <?= $cek ?>> <?= $a->name ?><br>
                                <?php
                            }
                            ?>
                        </div>
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
                <?php echo form_close(); ?>
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
