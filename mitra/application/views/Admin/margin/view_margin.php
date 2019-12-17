<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Margin
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
            <li class="active">Margin</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box" style="min-height: 430px">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php echo form_open(base_url('Admin/margin/ubah_margin')); ?>
                        <div class="modal-body">
                            <h4><?php echo "<b>Margin saat ini : <span style='color: red'>".$data."% </span>dari kontrak rate</b>"; ?></h4>
                            <hr>
                            <label>Atur Margin Baru</label>
                            <div class="input-group input-group-sm">
                                <input type="number" name="margin" class="form-control" value="0">
                                <span class="input-group-btn">
                                    <input type="submit" class="btn btn-info btn-flat" value="Ubah">
                                </span>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- Small boxes (Stat box) -->
    </section>
</div>
