<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Mitra</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    <link rel="stylesheet" href="--><?php //echo base_url('assets/css/bootstrap.min.css'); ?><!--" />-->
    <!--    <script src="--><?php //echo base_url('assets/js/jquery.min.js'); ?><!--"></script>-->
    <!--    <script src="--><?php //echo base_url('assets/js/bootstrap.min.js'); ?><!--"></script>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#mylogin').modal('show');
        });
    </script>
</head>
<body>
<!-- Modal Register -->
<div id="mylogin" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <span class="logo-lg"><img src="<?php echo base_url('/assets/new-logo.png'); ?>" style="width: 250px;"></span><br><br>
                <h4 class="modal-title">Register Mitra</h4>
            </div>
            <?php echo form_open(base_url('register/cek_register')); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label>Nama Depan</label>
                    <input type="text" name="depan" class="form-control" placeholder="Nama Depan" required>
                </div>
                <div class="form-group">
                    <label>Nama Belakang</label>
                    <input type="text" name="belakang" class="form-control" placeholder="Nama Belakang" required>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telp" class="form-control" placeholder="Nomor Telepon" required>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <select class="form-control" name="role">
                        <option value="Owner">Owner</option>
                        <option value="Direktur">Direktur</option>
                        <option value="Manager">Manager</option>
                        <option value="Sales Marketing">Sales Marketing</option>
                    </select>
                </div>
<!--                <input type="checkbox" name="terms" value="ok"> <a href="https://vividi.id/terms-conditions/">Accept our Terms & Conditions</a>-->
            </div>
            <div class="modal-footer">
                <div class="pull-left">Sudah punya akun ? <a href="Login">Login</a></div>
                <input type="submit" class="btn btn-primary" value="Daftar" name="submit">
            </div>
            <center>MITRA DASHBOARD ver 1.9.01</center>
            <br>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- End Modal Register -->
</body>
</html>