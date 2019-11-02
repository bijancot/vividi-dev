<!DOCTYPE html>
<?php 
    if(isset($_SESSION['username'])){ 
        redirect(base_url('home'));
    }
?>
<html>
<head>
    <title>Login Mitra</title>
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
<!-- Modal login -->
<div id="mylogin" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login Mitra</h4>
            </div>
            <?php echo form_open('login/ceklogin'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Login" name="submit">
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- End Modal Login -->
</body>
</html>