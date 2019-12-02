<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Atur Harga
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
			<li><a href="#">Properti</a></li>
			<li class="active">Atur Harga</li>
		</ol>
	</section>
	<section class="table-responsive content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>Properti</th>
								<th>Jenis Kamar</th>
								<th>Mulai Dari</th>
								<th>Sampai</th>
								<th>Allotment</th>
								<th>Harga</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>

							<?php
							foreach ($harga as $row) {
								?>
								<tr>
									<td><?php echo $row->properti; ?></td>
									<td><?php echo $row->kamar; ?></td>
									<td><?php echo $row->dari; ?></td>
									<td><?php echo $row->sampai; ?></td>
									<td><?php echo $row->allotment; ?></td>
									<td><?php echo number_format($row->harga,0,"","."); ?></td>
									<td>
										<button type="button" id="ubah" class="btn btn-primary" style="margin-bottom: 10px" data-toggle="modal" data-id="<?php echo $row->id ?>" onclick="clickButton(<?php echo $row->id ?>)">Ubah Harga</button>
									</td>
								</tr>
								<?php
							}
							?>

							</tbody>
							<tfoot>
							<tr>
								<th>Properti</th>
								<th>Jenis Kamar</th>
								<th>Mulai Dari</th>
								<th>Sampai</th>
								<th>Allotment</th>
								<th>Harga</th>
								<th>Aksi</th>
							</tr>
							</tfoot>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
		<!-- Small boxes (Stat box) -->
	</section>

	<!-- Modal Detail -->
	<div id="modal_detail" class="modal fade" role="dialog">

	</div>
	<!-- End Modal Detail -->
</div>
<script type="text/javascript">
    function clickButton(id){
        var postdata = {id: id};
        var url =  "<?= site_url('harga/modal_ubah_harga')?>";
        $.post(url, postdata, function(data) {
            var results = JSON.parse(data);
            $('#modal_detail').html(results);
        });
        $('#modal_detail').modal('show');
    }
</script>
