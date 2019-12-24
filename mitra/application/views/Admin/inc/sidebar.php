<style>
	.treeview-menu-visible {
		display: block;
	}
</style>
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<?php if ($side == 'dashboard') { ?>
				<li class="active"><a href="<?= base_url('Admin/home'); ?>"><i class="fa fa-laptop"></i>
						<span>Dashboard</span></a></li>
			<?php } else { ?>
                <li><a href="<?= base_url('Admin/home'); ?>"><i class="fa fa-laptop"></i> <span>Dashboard</span></a></li>
			<?php } ?>

            <?php if ($folder == 'laporan'){ ?>
        <li class="active treeview menu-open">
        <?php } else { ?>
            <li class="treeview">
                <?php } ?>
                <a href="#"><i class="fa fa-bar-chart"></i><span>Laporan</span><span class="pull-right-container"><i
                                class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <?php if ($side == 'transaksi'){ ?>
                <li class="active"><a href="#"><?php } else { ?>
                    <li><a href="<?= base_url('Admin/laporan/transaksi'); ?>"><?php } ?>
                            <i class="fa fa-circle-o"></i> Laporan Transaksi</a></li>

                    <?php if ($side == 'penjualan'){ ?>
                    <li class="active"><a href="#"><?php } else { ?>
                    <li><a href="<?= base_url('Admin/laporan/penjualan'); ?>"><?php } ?>
                            <i class="fa fa-circle-o"></i> Laporan Penjualan</a></li>

                </ul>
            </li>


            <?php if ($folder == 'properti'){ ?>
		<li class="active treeview menu-open">
		<?php } else { ?>
			<li class="treeview">
				<?php } ?>
				<a href="#"><i class="fa fa-pie-chart"></i><span>Menu Pesanan</span><span
						class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<?php if ($side == 'pesan'){ ?>
					<li class="active"><a href="#"><?php } else { ?>
					<li><a href="<?= base_url('Admin/Pesan/pesan'); ?>"><?php } ?>
							<i class="fa fa-circle-o"></i> Pesanan Hotel</a></li>
				</ul>
			</li>

			<?php if ($folder == 'verifikasi'){ ?>
			<li class="active treeview menu-open">
				<?php } else { ?>
			<li class="treeview">
				<?php } ?>
				<a href="#"><i class="fa fa-check-circle"></i><span>Verifikasi</span><span
						class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<?php if ($side == 'verifikasi'){ ?>
					<li class="active"><a href="#"><?php } else { ?>
					<li><a href="<?= base_url('Admin/Akun/akun'); ?>"><?php } ?>
							<i class="fa fa-building-o"></i>Akun Mitra</a></li>
				</ul>
			</li>

            <?php if ($folder == 'profile'){ ?>
            <li class="active treeview menu-open">
                <?php } else { ?>
            <li class="treeview">
                <?php } ?>
                <a href="#"><i class="fa fa-user"></i><span>Profil</span><span class="pull-right-container"><i
                                class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <?php if ($side == 'profile'){ ?>
                    <li class="active"><a href="#"><?php } else { ?>
                    <li><a href="<?= base_url('Admin/profile'); ?>"><?php } ?>
                            <i class="fa fa-circle-o"></i> Detail Profile</a></li>

<!--                    --><?php //if ($side == 'daftar'){ ?>
<!--                    <li class="active"><a href="#">--><?php //} else { ?>
<!--                    <li><a href="--><?//= base_url('Admin/Profile/daftar'); ?><!--">--><?php //} ?>
<!--                            <i class="fa fa-circle-o"></i> Tambah User</a></li>-->
                </ul>
            </li>

            <?php if ($side == 'margin') { ?>
        <li class="active"><a href="#">
        <?php } else { ?>
            <li><a href="<?= base_url('Admin/Margin/'); ?>">
                    <?php } ?><i class="fa fa-line-chart"></i> <span>Margin</span></a></li>

			<?php if ($side == 'penggunaan') { ?>
			<li class="active"><a href="#">
					<?php } else { ?>
			<li><a href="<?= base_url('Admin/Message/penggunaan'); ?>">
					<?php } ?><i class="fa fa-list-alt"></i> <span>Cara Penggunaan</span></a></li>

            <?php if ($side == 'syarat_ketentuan') { ?>
            <li class="active"><a href="#">
                    <?php } else { ?>
            <li><a href="<?= base_url('Admin/Message/syarat_ketentuan'); ?>">
                    <?php } ?><i class="fa fa-pencil-square-o"></i> <span>Syarat dan Ketentuan</span></a></li>

            <?php if ($side == 'hubungi') { ?>
            <li class="active"><a href="#">
                    <?php } else { ?>
            <li><a href="<?= base_url('Admin/Message/hubungi'); ?>">
                    <?php } ?><i class="fa fa-phone"></i> <span>Hubungi Kami</span></a></li>

            <?php if ($side == 'tentang') { ?>
            <li class="active"><a href="#">
                    <?php } else { ?>
            <li><a href="<?= base_url('Admin/Message/tentang'); ?>">
                    <?php } ?><i class="fa fa-info"></i> <span>Tentang Dashboard Mitra</span></a></li>

            <li><a href="<?= base_url('Login/logout'); ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>
