<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Atur Harga - <?= $properti ?> / <?= $kamar ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
            <li><a href="#">Properti</a></li>
            <li class="active">Atur Harga</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-4">
                <div class="card-body">
                    <?php echo form_open(base_url('harga/save_harga')); ?>
                        <div class="row">
                            <div class="col-md-5" style="align-content: center">
                                <input type="hidden" id="demo-2_1" class="form-control" name="tgl_1"/>
                                <input type="hidden" id="demo-2_2" class="form-control" name="tgl_2"/>
                                <input type="hidden" name="weekday" class="form-control" value="<?php echo $weekday; ?>" />
                                <input type="hidden" name="weekend" class="form-control" value="<?php echo $weekend; ?>" />
                                <input type="hidden" name="hseasion" class="form-control" value="<?php echo $hseasion; ?>" />
                                <input type="hidden" name="psseason" class="form-control" value="<?php echo $psseason; ?>" />
                                <input type="hidden" name="properti" class="form-control" value="<?php echo $id_properti.'_'.$properti; ?>" />
                                <input type="hidden" name="jenis_kamar" class="form-control" value="<?php echo $id_kamar.'_'.$kamar; ?>" />
                            </div>

                        </div>
                        <p id="result-2">&nbsp;</p>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Allotment</label>
                        <input type="number" class="form-control" style="width: 300px" name="allotment" value="1" min="1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Harga</label>
                        <div class="radio disabled">
                            <label><input type="radio" name="optradio" value="<?php echo $weekday; ?>"><?php echo "Rp.".number_format($weekday,0,"",".")." - Weekday"; ?></label>
                        </div>
                        <div class="radio disabled">
                            <label><input type="radio" name="optradio" value="<?php echo $weekend; ?>"><?php echo "Rp.".number_format($weekend,0,"",".")." - Weekend"; ?></label>
                        </div>
                        <div class="radio disabled">
                            <label><input type="radio" name="optradio" value="<?php echo $hseasion; ?>"><?php echo "Rp.".number_format($hseasion,0,"",".")." - High Seasion"; ?></label>
                        </div>
                        <div class="radio disabled">
                            <label><input type="radio" name="optradio" value="<?php echo $psseason; ?>"><?php echo "Rp.".number_format($psseason,0,"",".")." - Peek Season"; ?></label>
                        </div>
                        <div class="radio disabled">
                            <label><input type="radio" name="optradio" value="0">Kamar Kosong</label>
                        </div>
                    </div>
                        <input type="submit" class="btn btn-success" value="Submit">
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
<!--                                <th></th>-->
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($data as $row) {
                                        ?>
                                        <tr>
                                        <td><?php echo $row->dari;?></td>
                                        <td><?php echo $row->sampai;?></td>
                                        <td><?php echo $row->allotment;?></td>
                                        <td>Rp. <?php echo number_format($row->harga,0,"",".");?></td>
                                        <!--
                                            <td><button class="btn btn-block" data-effect="mfp-zoomIn" id="<?php echo $row->id;?>" onclick="clickButton(<?php echo $row->id;?>)">Lihat</button></td>
                                        -->
                                        </tr>
                                        <?php
                                    }
                                ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Date From</th>
                                <th>Date To</th>
                                <th>Allotment</th>
                                <th>Harga</th>
<!--                                <th></th>-->
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
