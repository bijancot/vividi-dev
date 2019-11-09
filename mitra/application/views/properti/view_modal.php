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
    <div class="content">
            <div class="box box-default">
                <div class="box-body">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_harga">
                        Atur Harga
                    </button>
                </div>
            </div>
    </div>
    <!-- Modal login -->
    <div id="modal_harga" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Properti</h4>
                </div>
                <?php echo form_open(base_url('properti/atur_harga')); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pilih properti</label>
                        <select class="form-control" id="properti" name="properti">
                            <option value="">-- Pilih --</option>
                            <?php
                            $no=1;
                            foreach ($data as $row) { ?>
                            <option value="<?= $row->id?>_<?php echo $row->properti;?>"><?php echo $row->properti;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jenis Kamar</label>
                        <select class="form-control" id="jenis_kamar" name="jenis_kamar">
                            <option value="">-- Pilih --</option>
                        </select>
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