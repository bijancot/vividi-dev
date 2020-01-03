<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
            <li><a href="<?= base_url('Home/profile'); ?>">Profile</a></li>
            <li class="active">Edit Profile</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php echo form_open(base_url('Admin/Profile/edit_profile')); ?>
                        <div class="modal-header">
                            <h4><b>Detail Profile</b></h4>
                        </div>
                        <div class="modal-body">
                            <?php foreach ($data as $row) { ?>
                                <input type="hidden" name="id" class="form-control" value="<?php echo $row->id; ?>" required>
                                <input type="hidden" name="cek" class="form-control" value="<?php echo $row->email; ?>" required>
                                <div class="form-group">
                                    <label>Nama Depan</label>
                                    <input type="text" name="depan" class="form-control" value="<?php echo $row->awal; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Belakang</label>
                                    <input type="text" name="belakang" class="form-control" value="<?php echo $row->akhir; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="text" name="telepon" class="form-control" value="<?php echo $row->telepon; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $row->email; ?>" required>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="modal-footer" style="float: left">
                            <a href="<?= base_url('Admin/Profile'); ?>" class="btn btn-success">Kembali</a>
                            <input type="submit" class="btn btn-primary" value="Ubah Profil" name="submit">
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
