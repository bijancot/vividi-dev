<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Mitra</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url('../wp-content/uploads/2019/09/favicon-vividi-3.png'); ?>"
          type="image/x-icon"/>
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
    <style>
        body {
            background:url("<?php echo base_url('/assets/bg.jpg'); ?>") no-repeat center center  fixed;
            /*background-repeat: no-repeat;*/
            -webkit-background-size: cover;
            background-size: cover;
    </style>
</head>
<body >
<!-- Modal Register -->
<div id="mylogin" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog col-xs-12" style="margin: 100px">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?php echo base_url('/assets/new-logo.png'); ?>" style="width: 250px; float: right;">
                <br><br><br>
                <font size="4px" style="float: right"><b>MITRA <font color="red">DASHBOARD</font>&nbsp;&nbsp;</b></font>
                <br><br>
                <h4><b>Registrasi Mitra</b></h4>
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
                    <label>Properti</label>
                    <input type="text" name="properti" class="form-control" placeholder="Properti" required>
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
                <p style="float: left">Sudah punya akun ?</p><br><br>
                <a href="<?php echo base_url('Login')?>" class="btn btn-primary" style="float: left">Login</a>
                <input type="submit" class="btn btn-primary" value="Daftar" name="submit">
            </div>
            <p style="float: right">Ver 1.9.01&nbsp;&nbsp;&nbsp;</p>
            <br>
            <?php echo form_close(); ?>
        </div>
        <br>
        <b><font color="black">PT. VIVIDI TRANSINDO UTAMA</font></b>
    </div>
</div>
<!-- End Modal Register -->
</body>
</html>