<?php
include('session.php');
include('postCurl.php');
/*$_SESSION = array();
session_destroy();*/
ini_set("display_errors","0");

if($_SESSION['life_gen_opt'] == "L") $token = "Bearer 39109f7df56e1051c399e685066bb852";

      else  $token = "Bearer 39109f7df56e1051c39YNM9e6YK85066bb852";
      
      $callName = new postGetCurl();
      
      $url   = "http://35.189.125.141/demo_life/api_ies/ies_connect.php?process=policy&userid={$_SESSION['usercode']}";
      
      $response = $callName->sendGet($url,$token);
      $response = json_decode($response, true);
?>
<!DOCTYPE html>
<html>
<?php //require('/inc/header.php');
include 'header.php';
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php //include 'navbar2.php';?>
  <?php include 'navbar.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">  <small></small></h1>
          </div><!-- /.col -->
          <!--div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol>
          </div--><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="card">
          <div class="card-header border-0">
            <h3 class="card-title">Policy Document</h3>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-download"></i>
              </a>
             
            </div>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
              <thead>
              <tr>
                <th>Document Name</th>
                <th>Document Code</th>
                <th>View</th>
                
              </tr>
              </thead>
              <tbody>
                <td>
              
                </td>
                <td>
              
                </td>
                <td>
              
                </td>
              
              
              </tbody>
            
            </table>
          </div>
        </div>
        <!-- /.card -->
      </div>
  </div>
  <!-- /.content-wrapper -->

  
 <div class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header border-0">
          </div>
          <div class="form-group" style="display: flex; flex-flow: row wrap; margin-left:15px;">
            <label for="exampleInputName1">From:</label>
            <div class="col-md-2">
            <input type="text" class="form-control"  name="datef1" id="datef1" placeholder="">
            </div>
              
                <label for="exampleInputName1">To:</label>
                <div class="col-md-2" style="margin-bottom: 10px;">
             <input type="text" class="form-control"  name="dateto" id="dateto" placeholder="">
             </div>
              
             
              <div>
                 <button type="submit" class="btn btn-info">Refresh</button>
                 </div>
              </div>
                    
         
         
         
</div>
              </div>
                 
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
