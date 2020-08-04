<?php
include('session.php');
include('postCurl.php');
/*$_SESSION = array();
session_destroy();*/
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
 ini_set("display_errors","0");
      
      $callName = new postGetCurl();

      
        $token = "Bearer 39109f7df56e1051c39YNM9e6YK85066bb852";
      $url   = "http://35.189.125.141/demo_general/gen_demo_api/ies_connect.php?process=users&opmode=getUserQuote&userid={$_SESSION['userid']}&life_gen_opt=G";
      
      $response_general = $callName->sendGet($url,$token);
      $gen_res = $response_general['result']['quotes'];
     // var_dump($gen_res);

      
     $token = "Bearer 39109f7df56e1051c399e685066bb852";
        $url   = "http://35.189.125.141/demo_life/api_ies/ies_connect.php?process=proposal&userid={$_SESSION['userid']}";
      
         $response = $callName->sendGet($url,$token);
         $life_res = $response['result'];


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
                            <h1 class="m-0 text-dark"> My Proposals <small></small></h1>
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

            <?php if($gen_res!=""){ ?>
            <!-- Main content General -->
            <div class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title"> General Proposals</h3>
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
                                        <th>Proposal No.</th>
                                        <th>Entry Date</th>
                                        <th>Sum Assured</th>
                                        <th>Premium</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php
              for($r0=0;$r0<=count($gen_res)-1;$r0++){
                
                $proposal   = $gen_res[$r0]['quoteid'];
                $entdate    = $gen_res[$r0]['entdate'];
                $totvalue   = $gen_res[$r0]['totvalue'];
                $curquote   = $gen_res[$r0]['curquote'];
                $propstatus = $gen_res[$r0]['propstatus'];
                if($propstatus == "P")$propstatus = "Pending";
                else if($propstatus == "A")$propstatus = "Active";
                
              
                 
                
                ?>
                                <tbody>
                                    <td>
                                        <?php echo $proposal; ?>
                                    </td>
                                    <td>
                                        <?php echo $entdate; ?>
                                    </td>
                                    <td>
                                        <?php echo $totvalue;
                 if($totvalue==""){
                   $totvalue ="0.00";
                   echo $totvalue;
                 }
                
                ?>
                                    </td>
                                    <td>
                                        <?php echo $curquote; 
                 if($curquote==""){
                  $curquote ="0.00";
                  echo $curquote;}
                  ?>
                                    </td>
                                    <td>
                                        <?php echo $propstatus; ?>
                                    </td>

                                </tbody>
                                <?php } ?>
                            </table>
                        </div>

                    </div>
                    <!-- /.card -->

                </div>


            </div>
            <?php ;} ?>
            <?php if($life_res['message'] ==""){ ?>
            <!-- Main content Life -->
            <div class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title"> Life Proposals</h3>
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
                                        <th>Proposal No.</th>
                                        <th>Entry Date</th>
                                        <th>Sum Assured</th>
                                        <th>Premium</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php
              for($r0=0;$r0<=count($life_res)-1;$r0++){
                
                $proposal   = $life_res[$r0]['quoteid'];
                $entdate    =$life_res[$r0]['entdate'];
                $totvalue   =$life_res[$r0]['totvalue'];
                $curquote   = $life_res[$r0]['curquote'];
                $propstatus =$life_res[$r0]['propstatus'];
                if($propstatus == "P")$propstatus = "Pending";
                else if($propstatus == "A")$propstatus = "Active";
                
              
                 
                
                ?>
                                <tbody>
                                    <td>
                                        <?php echo $proposal; ?>
                                    </td>
                                    <td>
                                        <?php echo $entdate; ?>
                                    </td>
                                    <td>
                                        <?php echo $totvalue;
                 if($totvalue==""){
                   $totvalue ="0.00";
                   echo $totvalue;
                 }
                
                ?>
                                    </td>
                                    <td>
                                        <?php echo $curquote; 
                 if($curquote==""){
                  $curquote ="0.00";
                  echo $curquote;}
                  ?>
                                    </td>
                                    <td>
                                        <?php echo $propstatus; ?>
                                    </td>

                                </tbody>
                                <?php } ?>
                            </table>
                        </div>

                    </div>
                    <!-- /.card -->

                </div>


            </div>


            <!-- /.content-wrapper -->
            <?php ;} ?>
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

            <?php include 'footer.php';?>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>

        </div>
    </div>

    <!-- /.content-wrapper -->

    <!-- /.control-sidebar -->

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