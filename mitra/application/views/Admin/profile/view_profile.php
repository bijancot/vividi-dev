<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
            <li><a href="#">Profile</a></li>
            <li class="active">Edit Profile</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="modal-header">
                            <h4><b>Detail Profile</b></h4>
                        </div>
                        <div class="modal-body">
                            <?php foreach ($data as $row) { ?>
                                <div class="form-group">
                                    <label>Nama Depan</label>
                                    <h4><?php echo $row->awal; ?></h4>
                                </div>
                                <div class="form-group">
                                    <label>Nama Belakang</label>
                                    <h4><?php echo $row->akhir; ?></h4>
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <h4><?php echo $row->telepon; ?></h4>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <h4><?php echo $row->email; ?></h4>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= base_url('Admin/Profile/ubah_profile'); ?>" class="btn btn-primary" style="float: left">Ubah Profile</a>
                            <a href="<?= base_url('Admin/Profile/reset_pass'); ?>" class="btn btn-success" style="float: left">Ubah Password</a>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- Small boxes (Stat box) -->
    </section>
</div>
