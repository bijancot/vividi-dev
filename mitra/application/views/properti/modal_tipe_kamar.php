<?php
foreach ($data as $row) {
?>
<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Detail <?= $row->judul ?></h4>
        </div>
        <?php echo form_open('properti/save_type_kamar'); ?>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Pilih Properti</label>
                <select class="form-control" name="properti">
                    <option value="">-- Pilih --</option>
                    <?php
                    foreach ($prpti as $r) { ?>
                        <option value="<?php echo $r->id; ?>"><?php echo $r->Judul; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Jenis Kamar</label>
                <input type="text" name="judul" class="form-control" placeholder="Judul" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" required>
            </div>
            <div class="form-group">
                <label>Max Dewasa</label>
                <input type="text" name="remaja" class="form-control" placeholder="Dewasa" required>
            </div>
            <div class="form-group">
                <label>Max Anak</label>
                <input type="text" name="anak" class="form-control" placeholder="Anak" required>
            </div>
            <div class="form-group">
                <label>Fasilitas</label><br>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <input type="checkbox" name="amenity[]" value="57"> Bathtub<br>
                        <input type="checkbox" name="amenity[]" value="206"> Double Bed<br>
                        <input type="checkbox" name="amenity[]" value="81"> Kamar Merokok<br>
                        <input type="checkbox" name="amenity[]" value="25"> Kopi, Teh dan Air Mineral<br>
                        <input type="checkbox" name="amenity[]" value="80"> Brangkas atau Kotak Keamanan<br>
                        <input type="checkbox" name="amenity[]" value="78"> Layanan Kamar<br>
                        <input type="checkbox" name="amenity[]" value="92"> Mini Bar atau Kulkas Mini<br>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <input type="checkbox" name="amenity[]" value="13"> Pendingin Ruangan<br>
                        <input type="checkbox" name="amenity[]" value="27"> Sarapan<br>
                        <input type="checkbox" name="amenity[]" value="125"> Balkon<br>
                        <input type="checkbox" name="amenity[]" value="84"> TV<br>
                        <input type="checkbox" name="amenity[]" value="205"> Twin Bed<br>
                        <input type="checkbox" name="amenity[]" value="91"> WIFI<br>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control" name="foto">
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-success" value="Tambah" name="submit">
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
<?php 
}
?>