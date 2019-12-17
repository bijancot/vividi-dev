<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<?php
						$no_menunggu = 0;
						foreach ($data_menunggu as $row) {
							$no_menunggu++;
						}
						?>
						<h3><?php echo $no_menunggu; ?></h3>

						<p>Pesanan Baru</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="<?= base_url('Admin/pesan/pesan/tab_2'); ?>" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<?php
						$no_batal = 0;
						foreach ($data_batal as $row) {
							$no_batal++;
						}
						?>
						<h3><?php echo $no_batal; ?></h3>

						<p>Pesanan Cancel</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="<?= base_url('Admin/pesan/pesan/tab_4'); ?>" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner">
						<?php
						$no_sukses = 0;
						foreach ($data_sukses as $row) {
							$no_sukses++;
						}
						?>
						<h3><?php echo $no_sukses; ?></h3>

						<p>Pesanan Sukses</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="<?= base_url('Admin/Pesan/pesan/tab_3'); ?>" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-aqua">
					<div class="inner">
						<?php
						$no = 0;
						foreach ($data as $row) {
							$no++;
						}
						?>
						<h3><?php echo $no; ?></h3>

						<p>Semua Pesanan</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="<?= base_url('Admin/pesan/pesan/tab_1'); ?>" class="small-box-footer">More info <i
							class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
		</div>
		<!-- /.row -->
		<!-- Main row -->
        <div class="row">
            <!-- Left col-->
            <section class="col-lg-6 connectedSortable">
                <!-- Custom tabs (Charts with tabs)--><!-- DONUT CHART -->

                <!-- Donut chart -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-bar-chart-o"></i>

                        <h3 class="box-title">Grafik Pesanan</h3>
                    </div>
                    <div class="box-body">
                        <div id="donutchart" style="height: 300px;"></div>
                    </div>
                    <!-- /.box-body-->
                </div>
                <!-- /.box -->

                <!-- /.nav-tabs-custom-->
            </section>
            <!-- /.Left col-->

            <section class="col-lg-6">

                <!-- Calendar-->
                <div class="box box-solid bg-yellow-gradient">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>

                        <h3 class="box-title">Kalender</h3>
                    </div>
                    <!-- /.box-header-->
                    <div class="box-body no-padding">
                        <!-- The calendar-->
                        <div id="calendar" style="width: 100%"></div>
                    </div>
                </div>
                <!-- /.box-->

            </section>
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <!-- /.content -->
        </div>
		<!-- /.row (main row) -->

	</section>
	<!-- /.content -->
</div>
