<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Atur Harga
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Properti</a></li>
            <li class="active">Atur Harga</li>
        </ol>
    </section>

    <!-- Modal login -->
    <div id="modal_harga" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Properti</h4>
                </div>
                <?php echo form_open('properti/atur_harga'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pilih properti</label>
                        <select class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="">a</option>
                            <option value="">b</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jenis Kamar</label>
                        <input type="text" name="jenis_kamar" class="form-control" placeholder="Jenis Kamar" required>
                    </div>
<!--                    <div class="form-group">-->
<!--                        <label for="exampleInputPassword1">Kontrak</label>-->
<!--                        <input type="text" name="tgl_mulai" class="form-control" placeholder="Tanggal Mulai" required>-->
<!--                        <input type="text" name="tgl_selesai" class="form-control" placeholder="Tanggal Selesai"-->
<!--                               required>-->
<!--                    </div>-->
                    <div class="form-group">
                        <label for="exampleInputPassword1">Harga</label>
                        <input type="text" name="weekday" class="form-control" placeholder="Harga Weekday" required>
                        <input type="text" name="weekend" class="form-control" placeholder="Harga Weekend" required>
                        <input type="text" name="hseasion" class="form-control" placeholder="Harga High Season"
                               required>
                        <input type="text" name="psseason" class="form-control" placeholder="Harga Peek Season"
                               required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Atur" name="submit">
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!-- End Modal Login -->
</div>
