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
                <a href="#"><i class="fa fa-pie-chart"></i><span>Properti</span><span class="pull-right-container"><i
                                class="fa fa-angle-left pull-right"></i></span>
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
                <a href="#"><i class="fa fa-pie-chart"></i><span>Harga Sewa</span><span class="pull-right-container"><i
                                class="fa fa-angle-left pull-right"></i></span>
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
                    <li><a href="<?= base_url('home/profile'); ?>"><?php } ?>
                            <i class="fa fa-circle-o"></i> Detail Profile</a></li>
                </ul>
            </li>

            <li><a href="#">
                    <i class="fa fa-list-alt"></i> <span>Cara Penggunaan</span></a></li>


            <li><a href="#">
                    <i class="fa fa-pencil-square-o"></i> <span>Syarat dan Ketentuan</span></a></li>


            <li><a href="#">
                    <i class="fa fa-phone"></i> <span>Hubungi Kami</span></a></li>


            <li><a href="#">
                    <i class="fa fa-info"></i> <span>Tentang Dashboard Mitra</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
