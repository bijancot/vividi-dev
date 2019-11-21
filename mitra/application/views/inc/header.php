<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('home'); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>V</b>ID</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="<?php echo base_url('/assets/new-logo.png'); ?>"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                        <span class="hidden-xs"><?= $_SESSION['nama'] ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header" style="height: 65px">
                            <!--                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->

                            <p>
                                <?= $_SESSION['nama'] ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <button type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal_profile">
                                    Profile
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url('Login/logout'); ?>" class="btn btn-default btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Modal login -->
<div id="modal_profile" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Profile</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Nama Depan</label>
                    <input type="text" name="depan" class="form-control" value="<?php echo $_SESSION['awal']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Nama Belakang</label>
                    <input type="text" name="belakang" class="form-control" value="<?php echo $_SESSION['akhir']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="text" name="confirm" class="form-control" placeholder="Confirm Password" required>
                </div>
                    <p style="font-size: 13px; font-style: italic; margin: 5px 0 5px; color: #666">*Kosongkan password jika kamu tidak ingin mengatur ulang password</p>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Ubah" name="submit">
            </div>
        </div>
    </div>
</div>
<!-- End Modal Login -->
