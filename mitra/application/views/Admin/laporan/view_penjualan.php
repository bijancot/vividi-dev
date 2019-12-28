<script type="text/javascript" src="<?php echo base_url('assets/chartjs/Chart.js'); ?>"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Laporan Penjualan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-laptop"></i> Home</a></li>
            <li><a href="#">Laporan</a></li>
            <li class="active">Laporan Penjualan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive box box-primary">
                    <div class="box-body">
                        <div style="width: 950px;margin: 0px auto;">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Small boxes (Stat box) -->
    </section>
    <!-- /.content -->
</div>
<script>
    const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    var d = new Date();
    var n = d.getMonth();
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [monthNames[n-3], monthNames[n-2], monthNames[n-1], monthNames[n]],
            datasets: [{
                label: 'Laporan Bulanan',
                data: [
                    <?= $data3 ?>,
                    <?= $data2 ?>,
                    <?= $data1 ?>,
                    <?= $data ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>