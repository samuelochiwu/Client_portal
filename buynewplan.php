<?php
  include('session.php');
     
  if (isset($_POST['calculate'])) {
     include('./reuseablefiles/calculator_desc.php');
  }

   global $annualprem,
      $prem,
      $calc_prorata,
      $covertype,
      $insureval, $calc_prorata;
?>
<!DOCTYPE html>
<html>
<style>
#iedupl,
#itrm4 {
    display: none
}

.buy-new-plan-form {
    display: none;
}

.buy-new-plan-container {
    max-width: 50%;
}

.buy-new-plan-cal {
    display: none;
}
</style>
<?php //require('/inc/header.php');
include 'header.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include 'navbar2.php';?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'sidebar.php';
 $option = "";
 if(isset($_GET['option'])){
     
  $option = $_GET['option']; 
    
 }
  ?>
 <?php

 if(isset($_SESSION['life_gen_opt'])){
  $life_gen_opt = $_SESSION['life_gen_opt'];
}

if(isset($_SESSION['opt'])){
  $opt = $_SESSION['opt'];
}
if(isset($_SESSION['csurname'])){
  $csurname = $_SESSION['csurname'];
}
if(isset($_SESSION['cothname'])){
  $cothname = $_SESSION['cothname'];
}
if(isset($_REQUEST['cemail'])){
  $cemail = $_SESSION['cemail'];
}
if(isset($_SESSION['cgsm'])){
  $cgsm = $_SESSION['cgsm'];
}
print_r($_SESSION);
?>
        <script type="text/javascript">
        function checkForm(form) {
            if (this.opt.value == "") {
                //alert("Please select your product plan");
                $('#product_msg').html(
                    "<span class='btn btn-danger'><b>ERROR:</b> Please select your product plan</span>");
                //this.opt.focus();
                return false;
            }

            $('#product_msg').html('');
        }
        </script>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> Buy New Plan <small></small></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                                <li class="breadcrumb-item active">Top Navigation</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"> Buy a New Product</h3>

                            <div action="buynewplan.php" method="post" id="quickForm">
                                <div id="product_msg" class="center bold"></div><br />

                                <input type="hidden" name="life_gen_opt" value="L" class="form-control">


                                <div class="input-group mb-3">
                                    <select name="opt" id="opt" class="form-control" onchange="choosePlan()">
                                        <option value="default"> Select a product plan </option>

                                        <option value="ITARGS3"> A&G Savings Assurance Plan </option>
                                        <option value="ITRM_SFG">A&G SCHOOL FEES ASSURANCE PLAN</option>
                                        <option value="IFEA2">A & G Anti Inflation Plan​</option>
                                        <option value="ISEINV2">INVESTMENT LINKED POLICY</option>
                                        <option value="I3PMP1">A&G Payment Plan</option>
                                        <option value="IEEDW">EDUCATIONAL ENDOWMENT 17</option>
                                        <option value="IEEDW2">EDUCATIONAL ENDOWMENT E19</option>
                                        <option value="01100">Motor-Private</option>
                                        <option value="01075">Motor Third Party</option>
                                        <option value="01099">Motor Commercial</option>
                                        <option value="01102">Motor Trade</option>
                                        <option value="FIR_FSPC">FIRE SPECIAL PERILS</option>
                                        <option value="01068">Fire and Business Interruption</option>
                                        <option value="015">FIRE CONSEQUENTIAL LOSS</option>
                                        <option value="012-53">FIRE OTHERS</option>
                                        <option value="FIR_STKF">FIRE STOCK FLOATERS</option>
                                        <option value="FIR_FSPP">FIRE SPECIAL PERILS (PRIVATE)</option>
                                        <option value="030">BURGLARY/THEFT (COMMERCIAL)</option>
                                        <option value="01116">BURGLARY/THEFT (PRIVATE)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card-body  buy-new-plan-container">
                                    <form method="POST" action="buynewplan" id="buynewPlanForm">
                                        <div class='buy-new-plan-form' role="form" id='default'>
                                            <input type="hidden" name="life_gen_opt" id="life_gen_opt"
                                                value="<?php echo $life_gen_opt; ?>" class="form-control">
                                            <input type="hidden" id="opt" name="opt"
                                                value="<?php echo $opt;?>" class="form-control">
                                            <input type="hidden" id="csurname" name="csurname"
                                                value="<?php echo $csurname;?>" class="form-control">
                                            <input type="hidden" id="cothname" name="cothname"
                                                value="<?php echo $cothname;?>" class="form-control">
                                            <input type="hidden" id="cemail" name="cemail"
                                                value="<?php echo $cemail;?>" class="form-control">
                                            <input type="hidden" id="cgsm" name="cgsm"
                                                value="<?php echo $cgsm;?>" class="form-control">
                                            <div class="card-body">

                                                <!-- <div class="form-group">
                                                    <label for="insurevalInputEmail1">Sum Assurd</label>
                                                    <input type="text" class="form-control" name="insureval"
                                                        id="insureval">
                                                </div> -->
                                                <div class="form-group">
                                                    <label for="desiredpremInputEmail1">Premium</label>
                                                    <input type="text" class="form-control" name="desiredprem"
                                                        id="desiredprem">
                                                </div>

                                                <div class="form-group">
                                                    <label>Cover Duration</label>
                                                    <select class="form-control" name="covdur" id="covdur">
                                                        <option value="">Select Cover Duration</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                        <option value="32">32</option>
                                                        <option value="33">33</option>
                                                        <option value="34">34</option>
                                                        <option value="35">35</option>
                                                        <option value="36">36</option>
                                                        <option value="37">37</option>
                                                        <option value="38">38</option>
                                                        <option value="39">39</option>
                                                        <option value="40">40</option>
                                                        <option value="41">41</option>
                                                        <option value="42">42</option>
                                                        <option value="43">43</option>
                                                        <option value="44">44</option>
                                                        <option value="45">45</option>
                                                        <option value="46">46</option>
                                                        <option value="47">47</option>
                                                        <option value="48">48</option>
                                                        <option value="49">49</option>
                                                        <option value="50">50</option>
                                                        <option value="51">51</option>
                                                        <option value="52">52</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Payment Frequency</label>
                                                    <select class="form-control" name="premfrq" id="premfrq">
                                                        <option value="">Select Payment Frequency</option>
                                                        <option value="M">Monthly ... M - M</option>
                                                        <option value="Q">Quarterly ... Q - Q</option>
                                                        <option value="H">Half-Yearly ... H - H</option>
                                                        <option value="Y">Yearly ... Y - Y</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Current Date</label>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="date" class="form-control" name="curdate"
                                                            id="curdate" placeholder="yyyy-mm-dd"
                                                            data-inputmask-alias="datetime"
                                                            data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Date Of Birth</label>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="date" class="form-control" name="dbirth"
                                                            id="dbirth" placeholder="yyyy-mm-dd"
                                                            data-inputmask-alias="datetime"
                                                            data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>

                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <div class='buy-new-plan-form' id='IEEDW'>

                                        </div>
                                        <div class='buy-new-plan-form' id='01100'>
                                            <?php  include('general_calculator.php'); ?>
                                        </div>

                                        <div class="card-footer process-cal-btn">
                                            <button type="submit" class="btn btn-primary"
                                                name="calculate_buy_new_plan">Calculate</button>
                                        </div>

                                        <!-- <div class="card-footer">
                                          <button type="submit" class="btn btn-primary">Calculate</button>
                                      </div> -->
                                    </form>
                                </div>

                                <div class="card-body  buy-new-plan-container buy-new-plan-cal">
                                    <div class="form-group">
                                        <label for="calculatedInsuredVal">Sum Assured</label>
                                        <p id="calculatedInsuredVal"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="calculatedPrem">Premium</label>
                                        <p id="calculatedPrem"></p>
                                    </div>


                                    <div class="card-footer process-cal-btn">
                                        <a href="getstarted?action=buy_new_plan">
                                            <button type="submit" class="btn btn-primary"
                                                name="continue">continue</button>
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /.card -->
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
        <script type="text/javascript">
        // document.read
        const planType = document.querySelector('#opt')
        let a = document.querySelector('#fname')
        console.log(11, a);


        // planType.addEventListener(change, (e) => {
        //     e.preventDefault();
        //     console.log(12, e)

        // })
        const forms = document.getElementsByClassName('buy-new-plan-form');

        function choosePlan() {
            const plan = document.getElementById("opt").value;
            console.log(4, plan);

            for (let index = 0; index < forms.length; index++) {
                const form = forms[index].id;
                if (plan === '') {
                    document.getElementById(form).style.display = 'none';
                }
                if (plan !== form) {
                    document.getElementById(form).style.display = 'none';
                } else {
                    document.getElementById(form).style.display = 'block';
                }
            }
        }
        </script>
        <script src="./jscripts/calcaulator.js"></script>
</body>







</html>