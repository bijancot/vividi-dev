<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Syarat dan Ketentuan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
            <li class="active">Syarat dan Ketentuan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
<!--                        <h3 class="box-title">CK Editor-->
<!--                            <small>Advanced and full of features</small>-->
<!--                        </h3>-->
                        <!-- tools box -->
<!--                        <div class="pull-right box-tools">-->
<!--                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse"-->
<!--                                    data-toggle="tooltip"-->
<!--                                    title="Collapse">-->
<!--                                <i class="fa fa-minus"></i></button>-->
<!--                            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"-->
<!--                                    title="Remove">-->
<!--                                <i class="fa fa-times"></i></button>-->
<!--                        </div>-->
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <?php echo form_open(base_url('Admin/Message/save_syarat_ketentuan')); ?>
                    <textarea id="editor1" name="editor1" rows="10" cols="80"><?php echo $data; ?></textarea>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
<!--                        <h3 class="box-title">Bootstrap WYSIHTML5-->
<!--                            <small>Simple and fast</small>-->
<!--                        </h3>-->
                        <!-- tools box -->
<!--                        <div class="pull-right box-tools">-->
<!--                            <button type="button" class="btn btn-default btn-sm" data-widget="collapse"-->
<!--                                    data-toggle="tooltip"-->
<!--                                    title="Collapse">-->
<!--                                <i class="fa fa-minus"></i></button>-->
<!--                            <button type="button" class="btn btn-default btn-sm" data-widget="remove"-->
<!--                                    data-toggle="tooltip"-->
<!--                                    title="Remove">-->
<!--                                <i class="fa fa-times"></i></button>-->
<!--                        </div>-->
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <?php echo form_open(base_url('Admin/Message/save_syarat_ketentuan')); ?>
                <textarea class="textarea" name="editor1"  placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $data; ?></textarea>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
