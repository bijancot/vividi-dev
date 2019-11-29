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
				<li class="active"><a href="<?= base_url('home'); ?>"><i class="fa fa-laptop"></i>
						<span>Dashboard</span></a></li>
			<?php } else { ?>
				<li><a href="<?= base_url('home'); ?>"><i class="fa fa-laptop"></i> </span>Dashboard</a></a></li>
			<?php } ?>
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

			<li><a href="#">
					<i class="fa fa-list-alt"></i> <span>Cara Penggunaan</span></a></li>


			<li><a href="#">
					<i class="fa fa-pencil-square-o"></i> <span>Syarat dan Ketentuan</span></a></li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>
