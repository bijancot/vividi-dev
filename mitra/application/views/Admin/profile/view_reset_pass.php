<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
            <li><a href="<?= base_url('Home/profile'); ?>">Profile</a></li>
            <li class="active">Reset Password</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php echo form_open(base_url('Admin/Profile/edit_password')); ?>
                        <div class="modal-header">
                            <h4><b>Reset Password</b></h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password Baru</label>
                                <input type="password" name="confirm" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
                                <label>Masukkan Password Lama</label>
                                <input type="password" name="lama" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= base_url('Admin/profile'); ?>" class="btn btn-success" style="float: left">Detail Profile</a>
                            <input type="submit" class="btn btn-primary" value="Ubah Password" name="submit">
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
