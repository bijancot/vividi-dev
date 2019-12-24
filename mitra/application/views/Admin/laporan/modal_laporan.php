
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Tipe Kamar</h4>
            </div>
            <?php echo form_open_multipart(base_url('')); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Pemilik Rekening</label>
                    <input type="text" name="judul" class="form-control" placeholder="Judul" required>
                </div>
                <div class="form-group">
                    <label>Nama Bank</label>
                    <input type="text" name="deskripsi" minlength="50" maxlength="200" onkeyup="countChar1(this)"
                           class="form-control"
                           placeholder="Deskripsi" required>
                </div>
                <div class="form-group">
                    <label>Total</label>
                    <input type="number" name="remaja" class="form-control" placeholder="Dewasa" min="1" value="1"
                           required>
                </div>
                <div class="form-group">
                    <label>Kode Referensi</label>
                    <input type="number" name="anak" class="form-control" placeholder="Anak" min="0" value="0"
                           required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Tambah" name="submit">
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
