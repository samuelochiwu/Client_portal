<?php include('session.php'); ?>
<!DOCTYPE html>
<html>
<?php //require('/inc/header.php');
include 'header.php';
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include 'navbar.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Premium</th>
                    <th>Frequency</th>
                    <th>Sum Assured</th>
                    <th>Duration</th>
                    <th>Expiry Date</th>
                    <th>Age at expiry.</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                        <td>25,596</td>
                        <td>Monthly</td>
                        <td>1,200,000</td>
                        <td>6 Year(s)</td>
                        <td>2026-04-27</td>
                        <td>46</td></tr>                </tbody>
              </table>
            </div>
                        <div class="panel-body">
            <br/><br/>
              <h6>Important Note</h6>
              <p class="text-muted">Note The above computation is based on the following assumptions:</p>
              <p class="text-muted">1. Premium is payable in advance based on your selected frequency.<br/>2. The applied interest rate is as at the date of commencement of this policy.</p>
              <p class="text-muted">Please note that the interest rate is subject to changes in market rates.</p>
            </div>
            <div class="panel-heading">
              <h6 class="panel-title" style="font-size: 13px"><span class="text-muted"><span style="color: #fff">space</span></h6>
              <div class="heading-elements">
                <a href="accept">
                <button type="button" class="btn btn-success btn-xs heading-btn" data-toggle="modal" data-target="#modal_form_vertical"> Accept</button>
                </a>
                <a href="calculator.php">
                <button type="button" class="btn btn-warning btn-xs heading-btn"> Go Back</button>
                </a>
                <a href="dashboard">
                <button type="button" class="btn btn-danger btn-xs heading-btn"> Decline</button>
                </a>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.php';?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
