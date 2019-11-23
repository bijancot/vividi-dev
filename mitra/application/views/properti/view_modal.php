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
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_harga">
                            Atur Harga Baru
                        </button>
                        <br><br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Properti</th>
                                <th>Jenis Kamar</th>
                                <th>Mulai Dari</th>
                                <th>Sampai</th>
                                <th>Allotment</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            foreach ($harga as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row->properti; ?></td>
                                    <td><?php echo $row->kamar; ?></td>
                                    <td><?php echo $row->dari; ?></td>
                                    <td><?php echo $row->sampai; ?></td>
                                    <td><?php echo $row->allotment; ?></td>
                                    <td><?php echo number_format($row->harga,0,"","."); ?></td>
                                    <td>
                                        <button type="button" id="ubah" class="btn btn-primary" style="margin-bottom: 10px" data-toggle="modal" data-id="<?php echo $row->id ?>" onclick="clickButton(<?php echo $row->id ?>)">Ubah Harga</button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Properti</th>
                                <th>Jenis Kamar</th>
								<th>Mulai Dari</th>
								<th>Sampai</th>
                                <th>Allotment</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- Small boxes (Stat box) -->
    </section>

    <!-- Modal login -->
    <div id="modal_harga" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Atur Harga</h4>
                </div>
                <?php echo form_open(base_url('properti/atur_harga')); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pilih properti</label>
                        <select class="form-control" id="properti" name="properti">
                            <option value="">-- Pilih --</option>
                            <?php
                            $no = 1;
                            foreach ($data as $row) { ?>
                                <option value="<?= $row->id ?>_<?php echo $row->properti; ?>"><?php echo $row->properti; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jenis Kamar</label>
                        <select class="form-control" id="jenis_kamar" name="jenis_kamar">
                            <option value="">-- Pilih --</option>
                        </select>
                    </div>
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
    <!-- Modal Detail -->
    <div id="modal_detail" class="modal fade" role="dialog">

    </div>
    <!-- End Modal Detail -->
</div>
<script type="text/javascript">
    function clickButton(id){
        var postdata = {id: id};
        var url =  "<?= site_url('properti/modal_ubah_harga')?>";
        $.post(url, postdata, function(data) {
            var results = JSON.parse(data);
            $('#modal_detail').html(results);
        });
        $('#modal_detail').modal('show');
    }
</script>
