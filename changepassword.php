<?php
include('session_var.php');
include('postCurl.php');
/*$_SESSION = array();
session_destroy();*/
// echo "<pre>";
// print_r($_SESSION);
// print_r($_REQUEST);
// print_r($_POST);
// echo "</pre>";
ini_set("display_errors","0");

if(isset($_POST['submit'])) {
//echo "i am here";
$_REQUEST['cltcode'] = $_SESSION['userid'];
 $_REQUEST['oldpwd'] = $_POST['oldpwd'];
 $_REQUEST['newpwd'] = $_POST['newpwd'];
 $_REQUEST['newpwd2'] = $_POST['newpwd2'];




 $token = "Bearer 39109f7df56e1051c39YNM9e6YK85066bb852";


 var_dump($_REQUEST);
  
  $callName = new postGetCurl();

  
  
  $url   = "http://35.189.125.141/demo_general/gen_demo_api/ies_connect.php?process=users&opmode=EBChangePass&life_gen_opt=G";
  
  $response = $callName->sendPost($_REQUEST,$url,$token);
  // var_dump($response);
  $alert = $response['result']['message'];

 // var_dump(44,$alert);


  
    

  }

  

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
    <section class="content">
      <div class="container-fluid">
    
          <!-- left column -->
          
            <!-- general form elements -->
           <div class="col-md-8">
              <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"> Change Password </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="changepassword.php" method="POST">
                <div class="card-body">
                 
                  <div class="form-group row">
                    <label for="inputOldpassword" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                    <input type="text" name="oldpwd" id="oldpwd" class="form-control" value="" placeholder="">
                    </div>
                  </div>
                  <div class="form-group row">
                  <label for="inputNewpassword" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                    <input type="password" name="newpwd" id="newpwd" class="form-control" value="" placeholder="">
                    </div>
                  </div>
                  <div class="form-group row">
                  <label for="inputRetypepassword" class="col-sm-2 col-form-label">Retype Password</label>
                    <div class="col-sm-10">
                    <input type="password" name="newpwd2" id="newpwd2" class="form-control" value="" placeholder="">
                    </div>
                    <?php if($alert !="") { ?>
                      <div class="alert alert-secondary" role="alert">
                       <?php  echo $alert; ?>
                         </div>
                   <?php ;} ?>
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-info">Change Password</button>
                  <button type="submit" name="cancel" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
           </div>
  <!-- /.content-wrapper -->

  
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
