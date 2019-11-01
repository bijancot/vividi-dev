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

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-4">
                <div class="card-body">
                    <form action="<?php echo site_url('');?>" method="post">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="hidden" id="demo-2_1" class="form-control form-control-sm" name="tgl_1"/>
                                <input type="hidden" id="demo-2_2" class="form-control form-control-sm" name="tgl_2"/>
                            </div>

                        </div>
                        <p id="result-2">&nbsp;</p>
                        <div class="radio">
                            <label><input type="radio" name="optradio" checked><?php echo $weekday; ?></label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="optradio"><?php echo $weekend; ?></label>
                        </div>
                        <div class="radio disabled">
                            <label><input type="radio" name="optradio"><?php echo $hseasion; ?></label>
                        </div>
                        <div class="radio disabled">
                            <label><input type="radio" name="optradio"><?php echo $psseason; ?></label>
                        </div>
                        <div class="radio disabled">
                            <label><input type="radio" name="optradio">Kamar Kosong</label>
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
            <div class="col-xs-8">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Properti</th>
                                <th>Date From</th>
                                <th>Date To</th>
                                <th>Tipe Kamar</th>
                                <th>Allotment</th>
                                <th>Harga</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Properti</th>
                                <th>Date From</th>
                                <th>Date To</th>
                                <th>Tipe Kamar</th>
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
