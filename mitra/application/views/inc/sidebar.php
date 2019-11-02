  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
<!--      <div class="user-panel">-->
<!--        <div class="pull-left image">-->
<!--          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
<!--        </div>-->
<!--        <div class="pull-left info">-->
<!--          <p>Alexander Pierce</p>-->
<!--          <i class="fa fa-circle text-success"></i> Online-->
<!--        </div>-->
<!--      </div>-->
<!--       search form-->
<!--      <form action="#" method="get" class="sidebar-form">-->
<!--        <div class="input-group">-->
<!--          <input type="text" name="q" class="form-control" placeholder="Search...">-->
<!--          <span class="input-group-btn">-->
<!--                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>-->
<!--                </button>-->
<!--              </span>-->
<!--        </div>-->
<!--      </form>-->
       /.search form
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php if($side == 'dashboard'){?>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Dashboard</a></li>
        <?php }else{ ?>
            <li><a href="<?= base_url(); ?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
            <?php } ?>
        <?php if($folder == 'Properti'){ ?>
        <li class="active treeview menu-open">
        <?php } else { ?>
        <li class="treeview">
        <?php } ?>
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Menu Properti</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <?php if($side == 'semua'){?><li class="active"><a href="#"><?php } else { ?><li><a href="<?= base_url('Properti'); ?>"><?php } ?>
                      <i class="fa fa-circle-o"></i> Semua Properti</a></li>

              <?php if($side == 'tipe_properti'){?><li class="active"><a href="#"><?php } else { ?><li><a href="<?= base_url('Properti/tipe_properti'); ?>"><?php } ?>
                      <i class="fa fa-circle-o"></i> Tipe Properti</a></li>

              <?php if($side == 'fasilitas'){?><li class="active"><a href="#"><?php } else { ?><li><a href="<?= base_url('Properti/fasilitas'); ?>"><?php } ?>
                      <i class="fa fa-circle-o"></i> Fasilitas</a></li>

              <?php if($side == 'tipe_kamar'){?><li class="active"><a href="#"><?php } else { ?><li><a href="<?= base_url('Properti/tipe_kamar'); ?>"><?php } ?>
                      <i class="fa fa-circle-o"></i> Tipe Kamar</a></li>

              <?php if($side == 'modal'){?><li class="active"><a href="#"><?php } else { ?><li><a href="<?= base_url('Properti/harga_modal'); ?>"><?php } ?>
                      <i class="fa fa-circle-o"></i> Atur Harga</a></li>

              <?php if($side == 'pesan'){?><li class="active"><a href="#"><?php } else { ?><li><a href="<?= base_url('Properti/pesan'); ?>"><?php } ?>
                      <i class="fa fa-circle-o"></i> Pesanan Tamu</a></li>
          </ul>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>
