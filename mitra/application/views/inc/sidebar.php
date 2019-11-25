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
                <li class="active"><a href="#">
            <?php } else { ?>
                <li><a href="<?= base_url('home'); ?>">
            <?php } ?><i class="fa fa-laptop"></i> <span>Dashboard</span></a></li>

            <?php if ($folder == 'properti'){ ?>
            <li class="active treeview menu-open">
                <?php } else { ?>
            <li class="treeview">
                <?php } ?>
                <a href="#"><i class="fa fa-pie-chart"></i><span>Properti</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
					<ul class="treeview-menu">
						<?php if ($side == 'semua'){ ?>
							<li class="active"><a href="#"><?php } else { ?>
						<li><a href="<?= base_url('properti'); ?>"><?php } ?>
								<i class="fa fa-circle-o"></i> Semua Properti</a></li>

						<?php if ($side == 'insert_properti'){ ?>
							<li class="active"><a href="#"><?php } else { ?>
						<li><a href="<?= base_url('properti/tambah_properti'); ?>"><?php } ?>
								<i class="fa fa-circle-o"></i> Tambah Properti</a></li>
					</ul>
			</li>

			<?php if ($folder == 'kamar') { ?>
				<li class="active"><a href="#">
			<?php } else { ?>
				<li><a href="<?= base_url('kamar'); ?>">
			<?php } ?><i class="fa fa-pie-chart"></i> <span>Kamar</span></a></li>

            <?php if ($folder == 'harga'){ ?>
            <li class="active treeview menu-open">
                <?php } else { ?>
            <li class="treeview">
                <?php } ?>
                <a href="#"><i class="fa fa-pie-chart"></i><span>Harga Sewa</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
					<ul class="treeview-menu">
						<?php if ($side == 'modal'){ ?>
							<li class="active"><a href="#"><?php } else { ?>
						<li><a href="<?= base_url('harga'); ?>"><?php } ?>
								<i class="fa fa-circle-o"></i> Tambah Harga Baru</a></li>

						<?php if ($side == 'ubah_harga'){ ?>
							<li class="active"><a href="#"><?php } else { ?>
						<li><a href="<?= base_url('harga/ubah_harga'); ?>"><?php } ?>
								<i class="fa fa-circle-o"></i> Ubah Harga</a></li>

					</ul>
			</li>

			<?php if ($folder == 'pesan') { ?>
				<li class="active"><a href="#">
			<?php } else { ?>
				<li><a href="<?= base_url('pesan/view_pesan'); ?>">
			<?php } ?><i class="fa fa-pie-chart"></i> <span>Pesanan Tamu</span></a></li>

			<!--                <ul class="treeview-menu treeview-menu-visible">-->
<!--                    --><?php //if ($side == 'semua'){ ?>
<!--                        <li class="active"><a href="#">--><?php //} else { ?>
<!--                    <li><a href="--><?//= base_url('properti'); ?><!--">--><?php //} ?>
<!--                            <i class="fa fa-circle-o"></i> Semua Properti</a></li>-->
<!---->
<!--                    --><?php //if ($side == 'tipe_kamar'){ ?>
<!--                        <li class="active"><a href="#">--><?php //} else { ?>
<!--                    <li><a href="--><?//= base_url('properti/tipe_kamar'); ?><!--">--><?php //} ?>
<!--                            <i class="fa fa-circle-o"></i> Tipe Kamar</a></li>-->
<!---->
<!--                    --><?php //if ($side == 'modal'){ ?>
<!--                        <li class="active"><a href="#">--><?php //} else { ?>
<!--                    <li><a href="--><?//= base_url('properti/harga_modal'); ?><!--">--><?php //} ?>
<!--                            <i class="fa fa-circle-o"></i> Atur Harga</a></li>-->
<!---->
<!--                    --><?php //if ($side == 'pesan'){ ?>
<!--                        <li class="active"><a href="#">--><?php //} else { ?>
<!--                    <li><a href="--><?//= base_url('properti/pesan'); ?><!--">--><?php //} ?>
<!--                            <i class="fa fa-circle-o"></i> Pesanan Tamu</a></li>-->
<!--                </ul>-->
            <?php if ($side == 'profile') { ?>
                <li class="active"><a href="<?= base_url('home/profile'); ?>"><i class="fa fa-user"></i> <span>Profile</span></a></li>
            <?php } else { ?>
                <li><a href="<?= base_url('home/profile'); ?>"><i class="fa fa-user"></i> <span>Profile</span></a></li>
            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
