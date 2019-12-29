<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Laporan Transaksi
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
            <li><a href="#">Laporan</a></li>
            <li class="active">Laporan Transaksi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="table-responsive content">
        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <?php
                        $seg = $this->uri->segment(4);
                        if ($seg == 'tab_1' || $seg == '') {
                            ?>
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Semua</a></li>
                        <?php } else { ?>
                            <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Semua</a></li>
                        <?php }
                        if ($seg == 'tab_2') {
                            ?>
                            <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Terbayar</a>
                            </li>
                        <?php } else { ?>
                            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Terbayar</a></li>
                        <?php }

                        if ($seg == 'tab_3') {
                            ?>
                            <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="false">Belum</a></li>
                        <?php } else { ?>
                            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Belum</a></li>
                        <?php } ?>
                    </ul>
                    <div class="table-responsive tab-content">
                        <div class="tab-pane<?php if ($seg == 'tab_1' || $seg == '') {
                            echo ' active';
                        } ?>" id="tab_1">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No Booking</th>
                                    <th>Pemesan</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Harga</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Pebayaran</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($data as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->booking_no; ?></td>
                                        <td><?php echo $row->nama_awal . " ". $row->nama_akhir; ?></td>
                                        <td><?php echo $row->check_in; ?></td>
                                        <td><?php echo $row->check_out; ?></td>
                                        <td>Rp. <?php echo number_format($row->harga,0,"",".");?></td>
                                        <td><?php echo $row->pesan; ?></td>
                                        <td><?php echo $row->status; ?></td>
                                        <?php if ($row->pembayaran == 'paid') { ?>
                                            <td style="text-align: center">
                                                <button type="button" class="btn btn-primary" style="width: 100px"
                                                        data-toggle="modal" data-id="<?php echo $row->booking_no; ?>"
                                                        onclick="clickInfo('<?php echo $row->booking_no; ?>')"><?php echo $row->pembayaran; ?></button>
                                                <br><?php echo date('Y-m-d', strtotime($row->pesan . "+1 days")); ?>
                                            </td>
                                        <?php } else { ?>
                                            <td style="text-align: center">
                                                <button type="button" class="btn btn-danger" style="width: 100px"
                                                        data-toggle="modal" data-id="<?php echo $row->booking_no; ?>"
                                                        onclick="clickButton('<?php echo $row->booking_no; ?>')"><?php echo $row->pembayaran; ?></button>
                                                <br><?php echo date('Y-m-d', strtotime($row->pesan . "+1 days")); ?>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane<?php if ($seg == 'tab_2') {
                            echo ' active';
                        } ?>" id="tab_2">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No Booking</th>
                                    <th>Pemesan</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Harga</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Pebayaran</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($data_terbayar as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->booking_no; ?></td>
                                        <td><?php echo $row->nama_awal . " ". $row->nama_akhir; ?></td>
                                        <td><?php echo $row->check_in; ?></td>
                                        <td><?php echo $row->check_out; ?></td>
                                        <td>Rp. <?php echo number_format($row->harga,0,"",".");?></td>
                                        <td><?php echo $row->pesan; ?></td>
                                        <td><?php echo $row->status; ?></td>
                                        <td style="text-align: center">
                                            <button type="button" class="btn btn-primary" style="width: 100px"
                                                    data-toggle="modal" data-id="<?php echo $row->booking_no; ?>"
                                                    onclick="clickInfo('<?php echo $row->booking_no; ?>')"><?php echo $row->pembayaran; ?></button>
                                            <br><?php echo date('Y-m-d', strtotime($row->pesan . "+1 days")); ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane<?php if ($seg == 'tab_3') {
                            echo ' active';
                        } ?>" id="tab_3">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No Booking</th>
                                    <th>Pemesan</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Harga</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Pebayaran</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($data_belum as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->booking_no; ?></td>
                                        <td><?php echo $row->nama_awal . " ". $row->nama_akhir; ?></td>
                                        <td><?php echo $row->check_in; ?></td>
                                        <td><?php echo $row->check_out; ?></td>
                                        <td>Rp. <?php echo number_format($row->harga,0,"",".");?></td>
                                        <td><?php echo $row->pesan; ?></td>
                                        <td><?php echo $row->status; ?></td>
                                        <td style="text-align: center">
                                            <button type="button" class="btn btn-danger" style="width: 100px"
                                                    data-toggle="modal" data-id="<?php echo $row->booking_no; ?>"
                                                    onclick="clickButton('<?php echo $row->booking_no; ?>')"><?php echo $row->pembayaran; ?></button>
                                            <br><?php echo date('Y-m-d', strtotime($row->pesan . "".$row->waktu." days")); ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
        </div>
        <!-- Small boxes (Stat box) -->
    </section>
    <!-- /.content -->
    <!-- Modal login -->
    <div id="modal_pembayaran" class="modal fade" role="dialog">

    </div>
    <!-- End Modal Login -->
</div>
<script type="text/javascript">
    function clickButton(booking_no) {
        var postdata = {booking_no: booking_no};
        var url = "<?= site_url('Admin/laporan/modal_laporan')?>";
        $.post(url, postdata, function (data) {
            var results = JSON.parse(data);
            $('#modal_pembayaran').html(results);
        });
        $('#modal_pembayaran').modal('show');
    }

    function clickInfo(booking_no) {
        var postdata = {booking_no: booking_no};
        var url = "<?= site_url('Admin/laporan/modal_info')?>";
        $.post(url, postdata, function (data) {
            var results = JSON.parse(data);
            $('#modal_pembayaran').html(results);
        });
        $('#modal_pembayaran').modal('show');
    }
</script>
