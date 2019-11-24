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
                <li class="active"><a href="<?= base_url('home'); ?>"><i class="fa fa-laptop"></i> <span>Dashboard</span></a></li>
            <?php } else { ?>
                <li><a href="<?= base_url('home'); ?>"><i class="fa fa-laptop"></i> </span>Dashboard</a></a></li>
            <?php } ?>
            <?php if ($folder == 'properti'){ ?>
            <li class="active treeview menu-open">
                <?php } else { ?>
            <li class="treeview menu-open">
                <?php } ?>
                <a href="#"><i class="fa fa-pie-chart"></i><span>Menu Properti</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu treeview-menu-visible">
<!--                    --><?php //if ($side == 'semua'){ ?>
<!--                        <li class="active"><a href="#">--><?php //} else { ?>
<!--                    <li><a href="--><?//= base_url('properti'); ?><!--">--><?php //} ?>
<!--                            <i class="fa fa-circle-o"></i> Semua Properti</a></li>-->

<!--                    --><?php //if ($side == 'tipe_properti'){ ?>
<!--                        <li class="active"><a href="#">--><?php //} else { ?>
<!--                    <li><a href="--><?//= base_url('properti/tipe_properti'); ?><!--">--><?php //} ?>
<!--                            <i class="fa fa-circle-o"></i> Tipe Properti</a></li>-->

<!--                    --><?php //if ($side == 'fasilitas'){ ?>
<!--                        <li class="active"><a href="#">--><?php //} else { ?>
<!--                    <li><a href="--><?//= base_url('properti/fasilitas'); ?><!--">--><?php //} ?>
<!--                            <i class="fa fa-circle-o"></i> Fasilitas</a></li>-->

<!--                    --><?php //if ($side == 'tipe_kamar'){ ?>
<!--                        <li class="active"><a href="#">--><?php //} else { ?>
<!--                    <li><a href="--><?//= base_url('properti/tipe_kamar'); ?><!--">--><?php //} ?>
<!--                            <i class="fa fa-circle-o"></i> Tipe Kamar</a></li>-->

<!--                    --><?php //if ($side == 'modal'){ ?>
<!--                        <li class="active"><a href="#">--><?php //} else { ?>
<!--                    <li><a href="--><?//= base_url('properti/harga_modal'); ?><!--">--><?php //} ?>
<!--                            <i class="fa fa-circle-o"></i> Atur Harga</a></li>-->

                    <?php if ($side == 'pesan'){ ?>
                        <li class="active"><a href="#"><?php } else { ?>
                    <li><a href="<?= base_url('Admin/Pesan/pesan'); ?>"><?php } ?>
                            <i class="fa fa-circle-o"></i> Pesanan Tamu</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
