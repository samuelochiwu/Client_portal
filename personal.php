<?php
include('session.php');
include('postCurl.php');
include('constants.php');
/*$_SESSION = array();
session_destroy();*/

unset($_SESSION['payment']);
ini_set("display_errors","0");
      $callName = new postGetCurl();            
      $url   = $general_base_URL."getUser&userid={$_SESSION['userid']}&life_gen_opt=G";
 
      $response = $callName->sendGet($url,$general_token);

      $cltcode = $response['result']['cltcode'];
      $regdate = $response['result']['regdate'];
      $cltlname = $response['result']['cltlname'];
      $cltfname = $response['result']['cltfname'];
      $cltemail = $response['result']['cltemail'];
      $cltmphone = $response['result']['cltmphone'];
      
      if ($response['result']['clientlink'] == '') {
        $url   = $life_base_URL."getuser&userid={$_SESSION['userid']}";
        
        $response = $callName->sendGet($url,$life_token);

        $gender = $response['result']['gender'];
        $dob = $response['result']['dob'];
        $mstatus = $response['result']['mstatus'];
        $occupation = $response['result']['occup'];
        $address = $response['result']['address'];
        $title = $response['result']['title'];

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
            <!-- Main content -->
            <section class="content pl-0">
                <div class="container-fluid pl-0">
                    <div class="row">
                        <div class="col-md-8 ">
                            <!-- left column -->

                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Personal Details</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="firstName">First Name</label>
                                            <input type="text" class="form-control" id="firstName" placeholder=""
                                                value="<?= $cltfname ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" class="form-control" id="lastName" placeholder=""
                                                value="<?= $cltlname ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address:</label>
                                            <input type="text" class="form-control" id="address" placeholder=""
                                                value="<?= $address ?>" disabled>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="title">Title:</label>
                                            <input type="text" class="form-control" id="title" placeholder=""
                                                value="<?= $title ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender:</label>
                                            <input type="text" class="form-control" id="gender" placeholder=""
                                                value="<?= $gender == 'M' ? 'Male':'Female' ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" id="email" placeholder=""
                                                value="<?= $cltemail ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="cltmphone">Gsm Line:</label>
                                            <input type="text" class="form-control" id="cltmphone" placeholder=""
                                                value="<?= $cltmphone ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="occupation">Occupation:</label>
                                            <input type="text" class="form-control" id="occupation" placeholder=""
                                                value="<?= $occupation ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="dob">Date of Birth: </label>
                                            <input type="text" class="form-control" id="dob" placeholder=""
                                                value="<?= $dob ?>" disabled>
                                        </div>




                                    </div>
                                    <!-- /.card-body -->

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.content-wrapper -->


                </div>
                <div class="container">
                    <div class="card">
                        <div class="card-header border-0">
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Beneficiary Name:</th>
                                        <th>Beneficiary Date of Birth</th>
                                        <th>Beneficiary Relationship</th>
                                        <th>Beneficiary Propotion</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <td>

                                    </td>
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