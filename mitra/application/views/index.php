<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<?php
  if($_SESSION['role'] == 'administrator'){
  	redirect(base_url('Admin/home'));
  }
  else if(!isset($_SESSION['username'])){
    redirect(base_url());
  }
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $folder ?> < Vividi Transwisata</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
    <!-- DataTables -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/morris.js/morris.css'); ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/jvectormap/jquery-jvectormap.css'); ?>">
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css'); ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="shortcut icon" href="<?php echo base_url('../wp-content/uploads/2019/09/favicon-vividi-3.png'); ?>"
          type="image/x-icon"/>
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Header -->
    <?php $this->load->view('inc/header'); ?>
    <!-- End Header -->

    <!-- Sidebar -->
    <?php $this->load->view('inc/sidebar', $side); ?>
    <!-- End Sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <?php
    if ($folder == "dashboard" || $folder == "profile") {
        $this->load->view($side, $data);
    } else if(isset($view) && $view == "insert_properti"){
    	$data['tipe'] = $tipe;
    	$data['country'] = $country;
    	$this->load->view($folder . '/'.$view, $data);
	} else {
//        include 'properti/view_tipe_kamar.php';
        $this->load->view($folder . '/view_' . $side, $data);
        // $this->load->view('Properti/view_semua');
    }
    ?>
    <!-- End Content Wrapper -->

    <!-- Footer -->
    <?php $this->load->view('inc/footer'); ?>
    <!-- End Footer -->

</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/bower_components/raphael/raphael.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/morris.js/morris.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js'); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/dist/js/pages/dashboard.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script>

<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script type="text/javascript">
    $(window).on('load', function () {
        $('#modal_harga').modal('show');
    });
</script>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'order': [[5, 'desc']],
            'info': true,
            'autoWidth': true
        })
        $('#example3').DataTable()
        $('#example4').DataTable()
        $('#example5').DataTable()
    })
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#properti').change(function(){
            var prop = $(this).val();
            $.ajax({
                url : "<?php echo site_url('kamar/modal_kamar')?>",
                method : "POST",
                data : {prop: prop},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].id+'_'+data[i].kamar+'">'+data[i].kamar+'</option>';
                    }
                    $('#jenis_kamar').html(html);
               }
             });
        });

        $('#country').change(function(){
            var country = $(this).val();
            $.ajax({
                url : "<?php echo site_url('properti/modal_city')?>",
                method : "POST",
                data : {country: country},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].id_city+'_'+data[i].city+'">'+data[i].city+'</option>';
                    }
                    $('#city').html(html);
                }
            });
        });
    });
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/lightpick@latest/lightpick.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/demo.js'); ?>"></script>
</body>
</html>
