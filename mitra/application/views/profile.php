<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php echo form_open(base_url('Home/edit_profile')); ?>
                        <div class="modal-body">
                            <?php foreach ($data as $row) { ?>
                                <input type="hidden" name="id" class="form-control" value="<?php echo $row->id; ?>" required>
                                <input type="hidden" name="cek" class="form-control" value="<?php echo $row->email; ?>" required>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="<?php echo $row->email; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Depan</label>
                                <input type="text" name="depan" class="form-control" value="<?php echo $row->awal; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Belakang</label>
                                <input type="text" name="belakang" class="form-control" value="<?php echo $row->akhir; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm" class="form-control" placeholder="Confirm Password">
                            </div>
                            <p style="font-size: 13px; font-style: italic; margin: 5px 0 5px; color: #666">*Kosongkan password jika kamu tidak ingin mengatur ulang password</p>
                            <?php } ?>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Ubah Profil" name="submit">
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
