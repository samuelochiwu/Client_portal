<?php
/*error_reporting(E_ALL | E_WARNING | E_NOTICE);
ini_set('display_errors', TRUE);
ini_set("display_errors",1);*/
include('session.php');
include('postCurl.php');
include('sendpay.php');


echo "<pre>";
print_r($_SESSION);
echo "<pre>";
?>
<!DOCTYPE html>
<html>
<?php 
ini_set("display_errors","0");

    $payMessage ='';
    $showAlert = false;
    $showAlertError = false;
    if ( $_REQUEST['action'] == 'paysuccess') {
      $payMessage = $_SESSION['payment']['message'];
      $showAlert = $_SESSION['payment']['showAlert'];
    }
    
      
      $callName = new postGetCurl();
      $url_gen   = "http://35.189.125.141/demo_general/gen_demo_api/ies_connect.php?process=users&opmode=getUserQuote&userid={$_SESSION['userid']}&life_gen_opt=G";
      
      $token_gen = "Bearer 39109f7df56e1051c39YNM9e6YK85066bb852";
      $response_gen = $callName->sendGet($url_gen,$token_gen);
      $gen_quotes = $response_gen['result']['quotes'];


      $url_life   = "http://35.189.125.141/demo_life/api_ies/ies_connect.php?process=proposal&userid={$_SESSION['userid']}";  
    
      $token_life = "Bearer 39109f7df56e1051c399e685066bb852";    
      $response_life = $callName->sendGet($url_life,$token_life);

         $life_quotes = $response_life['result'];
        //  echo "<pre> life quotes";
            // print_r($life_quotes);
            // echo "</pre>";
         
     
  if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'getquote') {
    unset($_SESSION['payment']);
    $product_type = $_REQUEST['productType'];
    $quote_id = $_REQUEST['quoteId'];      
    $quote_result = [];
    if ($product_type == 'G') {
      $url_gen_quote   = "http://35.189.125.141/demo_general/gen_demo_api/ies_connect.php?process=users&opmode=getUserQuote&quoteid=$quote_id&life_gen_opt=G";
      $token_gen_quote = "Bearer 39109f7df56e1051c39YNM9e6YK85066bb852";
      $response_gen_quote = $callName->sendGet($url_gen_quote,$token_gen_quote);
      $quote_result = $response_gen_quote['result']['quotes'][0];
     
      $amount = $quote_result["curquote"];
      $email = $quote_result["email"];
      $_SESSION['tnx_amount'] = $amount;
      $_SESSION['tnx_email'] = $email;
      $_SESSION['tnx_first_name'] =  $quote_result["fname"];
      $_SESSION['tnx_last_name'] =  $quote_result["lname"];
      $_SESSION['quote_id'] =  $quote_id;
      $_SESSION['life_gen_opt'] =  $quote_result["product_type"];
    } else {
          $foundQuote = [];

          foreach ($life_quotes as $key => $value) {
            if ($quote_id === $value['quoteid']) {
              $foundQuote = $value;
            }
          }
          
          if ($foundQuote) {
            $amount = $foundQuote["curquote"];
            $_SESSION['tnx_amount'] = $amount;
            $_SESSION['tnx_email'] = $email;
            $_SESSION['quote_id'] =  $quote_id;
            $_SESSION['life_gen_opt'] =  L;
          }
          // echo "<pre>";
          // print_r($_SESSION);
          // echo "</pre>";
    }
	// $site_redirect_url = "";
    $txn_ref = "JB"  . intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) ); // random(ish) 7 digit int. WEBPAY MAX - 50 characters      
    
  }

  $customerName = $_SESSION['csurname'] .' '.$_SESSION['cothname'];
  if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'paystack') {
    $pay_amout = $_SESSION['tnx_amount'];
    $tnx_email = $_SESSION['tnx_email'];
    $first_name = $_SESSION['tnx_first_name'];
    $last_name = $_SESSION['tnx_last_name'];
    $pay = payStack($pay_amout, $tnx_email, $first_name, $last_name);
    // echo "<pre>";
    // print_r($pay);
    // echo "</pre>";
    if($pay['status']) {      
      $url = $pay['data']['authorization_url'];
      header("Location: $url");  
      exit();
    }
  }
  
  
  // $payMessage = '';
  if (isset($_REQUEST['trxref']) && $_REQUEST['reference']) {
    $reference = $_REQUEST['trxref'];
      $verifyPay = verifyPayment($reference);
        //    echo "<pre> verify";
        //     print_r($verifyPay);
        //     echo "</pre>";
      if($verifyPay['status']) {
        // $url = 'payment?success=true';
        $url = 'payment.php';
        $showAlert = true;
        $_SESSION['payment']['showAlert'] = $showAlert;
        // $payMessage = 'Payment Successful';
         $_SESSION['payment']['message'] = 'Payment successful';
         if($_SESSION['life_gen_opt'] == "G") {
            $url   = "http://35.189.125.141/demo_general/gen_demo_api/ies_connect.php?process=users&opmode=EBNotification&life_gen_opt=G";
            $tokent = "Bearer 39109f7df56e1051c39YNM9e6YK85066bb852";


            $request['transactionAmount'] = $verifyPay['data']['amount'] / 100;
            $request['transactionId'] = $verifyPay['data']['id'];
            $request['transactionDate'] = $verifyPay['data']['paid_at'];
            $request['trans_response'] = $verifyPay['data']['gateway_response'];
            $request['quoteid'] =  $_SESSION['quote_id'];


            $response = $callName->sendPost($request,$url,$tokent);
            
            if ($response['result']['status']) {
              // $payMessage .= ' and policy generated';              
              $_SESSION['payment']['message'] .= ' and policy generated';
            }else {
              // $payMessage .= ' and policy could not be generated, please contact the customer service for further investigation.';
              $_SESSION['payment']['message'] .= ' and policy could not be generated, please contact the customer service for further investigation.';
            }
            $redirect_url = 'payment?action=paysuccess';
            header("Location: $redirect_url"); 
            exit();
        } elseif($_SESSION['life_gen_opt'] == "L") {
            $life_post_transaction = "http://35.189.125.141/demo_life/api_ies/ies_connect.php?process=posttrans";
            $token_life = "Bearer 39109f7df56e1051c399e685066bb852"; 
            
            $request['transactionAmount'] = $verifyPay['data']['amount'] / 100;
            $request['transactionId'] = $verifyPay['data']['id'];
            $request['transactionDate'] = $verifyPay['data']['paid_at'];
            $request['trans_response'] = $verifyPay['data']['gateway_response'];
            $request['quoteid'] =  $_SESSION['quote_id'];

            $response = $callName->sendPost($request,$life_post_transaction,$token_life);

            // echo "<pre> payment life";
            // print_r($response);
            // echo "</pre>";

             if ($response['result']['status']) {
              // $payMessage .= ' and policy generated';              
              $_SESSION['payment']['message'] .= ' and policy generated';
            }else {
              // $payMessage .= ' and policy could not be generated, please contact the customer service for further investigation.';
              $_SESSION['payment']['message'] .= ' and policy could not be generated, please contact the customer service for further investigation.';
            }
            // echo "dami";
            // flush();
            $redirect_url = 'payment?action=paysuccess';
            // $redirect_url = 'http://localhost:81/client_portal/payment?success=true';
            // header("Location: $redirect_url");  
            header("Location: $redirect_url"); 
            exit();
        }
      } else {
        // echo "not sucess";
        // $url = 'payment?success=true';
        $url = 'payment.php';
        $showAlertError = true;       
        header("Location: $url"); 
        exit();
      }

          // echo "<pre> session";
          // print_r($_SESSION);
          // echo "</pre>";

     
  }


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
                            <h1 class="m-0 text-dark">Pay Premium</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Card Payment</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- /.row -->
                    <!-- Main row -->
                    <?php if($showAlert) { ?>
                    <div class="row">
                        <div class="alert alert-success w-100" role="alert">
                            <?= $payMessage ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($showAlertError) { ?>
                    <div class="row">
                        <div class="alert alert-danger w-100" role="alert">
                            Payment not successful
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-titlze">CARD PAYMENT</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <form method="post" name="payform0" id="paymentForm" action="payment">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input type="text" name="amount" class="form-control" id="quoteAmount"
                                                readonly value="<?= $amount ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Policy</label>
                                            <select class="form-control" name="quote" id="quote">
                                                <option value=''>select a proposal</option>
                                                <?php if ($gen_quotes) { ?>
                                                <?php
                                                  for($i=0;$i<=count($gen_quotes) - 1;$i++): ?>
                                                <?php if($gen_quotes[$i]['propstatus'] == 'A') continue; ?>
                                                <option data-quote="<?= $gen_quotes[$i]['quoteid']?>"
                                                    data-product-type="<?= $gen_quotes[$i]['product_type']?>"
                                                    value="<?=$gen_quotes[$i]['curquote']?>"
                                                    <?php echo ($quote_id == $gen_quotes[$i]['quoteid'] )?'selected':''?>>
                                                    <?=$gen_quotes[$i]['quoteid']?>
                                                </option>
                                                <?php endfor?>
                                                <?php } ?>
                                                <?php
                                                if ($life_quotes['message'] == '') { 
                                                for($i=0;$i<=count($life_quotes) - 1;$i++): ?>
                                                <?php if($life_quotes[$i]['propstatus'] == 'A') continue; ?>
                                                <option data-quote="<?= $life_quotes[$i]['quoteid']?>"
                                                    data-product-type="L" value="<?=$life_quotes[$i]['curquote']?>"
                                                    <?php echo ($quote_id == $life_quotes[$i]['quoteid'] )?'selected':''?>>
                                                    <?=$life_quotes[$i]['quoteid']?>
                                                </option>
                                                <?php endfor?>
                                                <?php };?>
                                                ?>
                                            </select>
                                            <a title="Refresh"
                                                href="javascript:proc_cltinfpol (document.forms.payform0,'getamount','payment?action=getquote')">
                                                REFRESH TO GET AMOUNT
                                            </a>
                                        </div>
                                        <div class="form-group">
                                            <label>Payment Item</label>
                                            <select class="form-control">
                                                <option>premium</option>
                                                <option>commission</option>
                                            </select>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit"
                                                onclick="javascript:proc_cltinfpol(document.forms.payform0,'paystack', 'payment?action=paystack')"
                                                class="btn btn-primary" name='pay'>PAY</button>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            <!-- /.card -->

                        </div>
                        <!--/.col (left) -->
                    </div>
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

    <!-- get amount onchange of the quote -->
    <script src="jscripts/get_quote_amount.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
    document.title = 'Client | Payment';
    </script>
</body>











</html>