<?php
include('session.php');
include('postCurl.php');
/*$_SESSION = array();
session_destroy();*/
/*echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/
ini_set("display_errors","0");

      $token = "Bearer 39109f7df56e1051c399e685066bb852";
      
      $callName = new postGetCurl();
      
      $url   = "http://104.199.122.248/arm_slash_prod/api_ies/ies_connect.php?process=proposal&userid={$_SESSION['userid']}";
      
      $response = $callName->sendGet($url,$token);
      

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
            <h1 class="m-0 text-dark"> Report a Claim <small></small></h1>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Report a Claim</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPolicy1">Policy No:</label>
                    <div class="input-group mb-3">
                                    <select name="policy" id="policy" class="form-control" onchange="">
                                        <option value="default"> Select Policy</option>
                                    </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputClaimType1">Claim Type:</label>
                    <div class="input-group mb-3">
                                    <select name="claimtype" id="claimtype" class="form-control" onchange="">
                                    <OPTION value='NONE'  class='' >Select Liability Type</OPTION>
  <OPTION value='IACDTH'  class='' >Accidental Death Benefit</OPTION>
<OPTION value='00001'  class='' >Annuity Payment</OPTION>
<OPTION value='00004'  class='' >BENEFICIARY DEATH BENEFITS 1</OPTION>
<OPTION value='00005'  class='' >BENEFICIARY DEATH BENEFITS 2</OPTION>
<OPTION value='00006'  class='' >BENEFICIARY DEATH BENEFITS 3</OPTION>
<OPTION value='00007'  class='' >BENEFICIARY DEATH BENEFITS 4</OPTION>
<OPTION value='ICRTILL'  class='' >Critical Illness</OPTION>
<OPTION value='00002'  class='' >DEATH BENEFITS</OPTION>
<OPTION value='00010'  class='' >DEPENDANT DEATH BENEFIT 1</OPTION>
<OPTION value='00011'  class='' >DEPENDANT DEATH BENEFIT 2</OPTION>
<OPTION value='00012'  class='' >DEPENDANT DEATH BENEFIT 3</OPTION>
<OPTION value='00013'  class='' >DEPENDANT DEATH BENEFIT 4</OPTION>
<OPTION value='00014'  class='' >EX-GRATIA</OPTION>
<OPTION value='IFMART'  class='' >Full Maturity Benefit</OPTION>
<OPTION value='INATDT'  class='' >Natural Death Benefit </OPTION>
<OPTION value='IPDUP'  class='' >Paid-Up Benefit </OPTION>
<OPTION value='IPMART'  class='' >Partial Maturity Benefit</OPTION>
<OPTION value='00021'  class='' >PARTIAL WITHDRAWAL</OPTION>
<OPTION value='IPMDISA'  class='' >PERMANENT DISABILITY</OPTION>
<OPTION value='IRTPRM'  class='' >Returned Premium</OPTION>
<OPTION value='00022'  class='' >SPOUSAL BENEFIT (INDIVIDUAL)</OPTION>
<OPTION value='ISURDR'  class='' >Surrender Benefit</OPTION>
<OPTION value='IWDRW'  class='' >Withdrawal Benefit</OPTION>
                                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputCommunication">Communication Channel:</label>
                    <div class="input-group mb-3">
                                    <select name="comchan" id="comchan" class="form-control" onchange="">
                                    
<OPTION value='NONE'  class='' >No Item Selected</OPTION>
<OPTION value='00001'  class=''  SELECTED>Ecommerce</OPTION>
<OPTION value='00004'  class='' >Mail</OPTION>
<OPTION value='00002'  class='' >Phone Call</OPTION>
<OPTION value='00005'  class='' >SMS</OPTION>
                                    </select>
                    </div>
                  <div class="form-group">
                    <label for="exampleInpu">Narration</label>
                    <div class="input-group mb-3">
                    <textarea id="txt_message" name="txt_message" class="txtbox" style="height: 100px; width: 1000px;"> 
                                                                          </textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="submit" class="btn btn-primary"> Add Another Upload</button>
                 
                </div>
              </form>
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
