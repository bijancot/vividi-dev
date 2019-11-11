<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Atur Harga
<!--            - --><?//= $properti ?><!-- / --><?//= $kamar ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Properti</a></li>
            <li class="active">Atur Harga</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-4">
                <div class="card-body">
                    <?php echo form_open(base_url('properti/save_harga')); ?>
                        <div class="row">
                            <div class="col-md-5">
                                <input type="hidden" id="demo-2_1" class="form-control" name="tgl_1"/>
                                <input type="hidden" id="demo-2_2" class="form-control" name="tgl_2"/>
                            </div>

                        </div>
                        <p id="result-2">&nbsp;</p>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Allotment</label>
                        <input type="text" name="allotment" class="form-control" placeholder="Angka" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Harga</label>
                        <div class="radio">
                            <label><input type="radio" name="optradio" value="<?php echo $_SESSION['weekday']; ?>"><?php echo $_SESSION['weekday']; ?></label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="optradio" value="<?php echo $_SESSION['weekend']; ?>"><?php echo $_SESSION['weekend']; ?></label>
                        </div>
                        <div class="radio disabled">
                            <label><input type="radio" name="optradio" value="<?php echo $_SESSION['hseasion']; ?>"><?php echo $_SESSION['hseasion']; ?></label>
                        </div>
                        <div class="radio disabled">
                            <label><input type="radio" name="optradio" value="<?php echo $_SESSION['psseason']; ?>"><?php echo $_SESSION['psseason']; ?></label>
                        </div>
                        <div class="radio disabled">
                            <label><input type="radio" name="optradio" value="0">Kamar Kosong</label>
                        </div>
                    </div>
                        <input type="submit" value="Submit">
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="col-xs-8">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date From</th>
                                <th>Date To</th>
                                <th>Allotment</th>
                                <th>Harga</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                <!--
                                <?php
                                    foreach ($data as $row) {
                                        ?>
                                        <tr>
                                        <td><?php echo $row->dari;?></td>
                                        <td><?php echo $row->sampai;?></td>
                                        <td><?php echo $row->allotment;?></td>
                                        <td><?php echo $row->harga;?></td>
                                        <td><button class="btn btn-block" data-effect="mfp-zoomIn" id="<?php echo $row->id;?>" onclick="clickButton(<?php echo $row->id;?>)">Lihat</button></td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                -->
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Date From</th>
                                <th>Date To</th>
                                <th>Allotment</th>
                                <th>Harga</th>
                                <th></th>
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
    <!-- /.content -->
</div>
