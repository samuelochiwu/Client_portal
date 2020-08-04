<?php
include('session.php');
include('postCurl.php');
include('constants.php');
/*$_SESSION = array();
session_destroy();*/
ini_set("display_errors","0");
$callName = new postGetCurl(); 

// fetching general policies
$url_gen = $general_base_URL."EBGetListOfCustomerPolicies&cltcode={$_SESSION['userid']}&life_gen_opt=G";
$response_gen = $callName->sendGet($url_gen,$general_token);
// if ($response_gen['result']['status'] != 0) {
  $gen_policies = $response_gen['result'];
// }
/*  echo "<pre>";
  print_r($gen_policies);
  echo "</pre>"; */

// fetching life policies
$url_life   = $life_base_URL."policy&userid={$_SESSION['usercode']}";        
$response_life = $callName->sendGet($url_life,$life_token);

  if ($response_life['result']['status'] == 1) {
    $life_policies = $response_life['result']['result'];
  }
/*  echo "<pre>";
  print_r($life_policies);
  echo "</pre>"; */
 
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
                            <h1 class="m-0 text-dark"> My Policy/Policies <small></small></h1>
                        </div><!-- /.col -->
                        <!--div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol>
          </div-->
                        <!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Policies</h3>
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
                                        <th>Proposal No</th>
                                        <th>Policy No</th>
                                        <th>Effective Date</th>
                                        <th>End Date</th>
                                        <th>Sum Assured</th>
                                        <th>Premium</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php
              if(!empty($life_policies)){
              for($r0=0;$r0<=count($life_policies);$r0++){
                $proposal   = $life_policies[$r0]['polnum'];
                $entdate    = $life_policies[$r0]['effdate'];
                $enddate    = $life_policies[$r0]['enddate'];
                $totvalue   = $life_policies[$r0]['sumass'];
                $totquote   = $life_policies[$r0]['curprem'];
                $propstatus = $life_policies[$r0]['propstatus'];
                $polnum     = $life_policies[$r0]['polnum2'];
                ?>
                                <tbody>
                                    <td>
                                        <?php echo $proposal; ?>
                                    </td>
                                    <td>
                                        <?php echo $polnum; ?>
                                    </td>
                                    <td>
                                        <?php echo $entdate; ?>
                                    </td>
                                    <td>
                                        <?php echo $enddate; ?>
                                    </td>
                                    <td>
                                        <?php echo $totvalue; ?>
                                    </td>
                                    <td>
                                        <?php echo $totquote; ?>
                                    </td>
                                    <td>
                                        <?php echo $propstatus; ?>
                                    </td>

                                </tbody>
                                <?php }} ?>
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
                                <input type="text" class="form-control" name="datef1" id="datef1" placeholder="">
                            </div>

                            <label for="exampleInputName1">To:</label>
                            <div class="col-md-2" style="margin-bottom: 10px;">
                                <input type="text" class="form-control" name="dateto" id="dateto" placeholder="">
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
