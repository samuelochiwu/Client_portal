<?php
    session_start(); 
    include('postCurl.php');
    include('constants.php');
    ini_set("display_errors", "0");
   
  // if (isset($_POST['calculate_buy_new_plan'])) {
  //    include('./reuseablefiles/calculator_desc.php');
  // }

    
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>"; 
    
    // echo "dami";

    if(isset($_REQUEST['life_gen_opt'])){
      $_SESSION['life_gen_opt'] = $_REQUEST['life_gen_opt'];
    }
    if(isset($_REQUEST['opt'])){
      $_SESSION['opt'] = $_REQUEST['opt'];
    }
    if(isset($_REQUEST['csurname'])){
      $_SESSION['csurname'] = $_REQUEST['csurname'];
    }
    if(isset($_REQUEST['cothname'])){
      $_SESSION['cothname'] = $_REQUEST['cothname'];
    }
    if(isset($_REQUEST['cemail'])){
      $_SESSION['cemail'] = $_REQUEST['cemail'];
    }
    if(isset($_REQUEST['cgsm'])){
      $_SESSION['cgsm'] = $_REQUEST['cgsm'];
    }
    if(isset($_REQUEST['cemail'])){
      $_SESSION['cemail'] = $_REQUEST['cemail'];
    }
    if(isset($_REQUEST['insureval'])){
      $_SESSION['insureval'] = $_REQUEST['insureval'];
    }
    if(isset($_REQUEST['desiredprem'])){
      $_SESSION['desiredprem'] = $_REQUEST['desiredprem'];
    }
    if(isset($_REQUEST['covdur'])){
      $_SESSION['covdur'] = $_REQUEST['covdur'];
    }
    if(isset($_REQUEST['dbirth'])){
      $_SESSION['dbirth'] = $_REQUEST['dbirth'];
    }
    if(isset($_REQUEST['curdate'])){
      $_SESSION['curdate'] = $_REQUEST['curdate'];
    }
    if(isset($_REQUEST['premfrq'])){
      $_SESSION['premfrq'] = $_REQUEST['premfrq'];
    }
    if(isset($_REQUEST['covertype'])){
      $_SESSION['covertype'] = $_REQUEST['covertype'];
    }
    if(isset($_REQUEST['coverprdstart'])){
      $_SESSION['coverprdstart'] = $_REQUEST['coverprdstart'];
    }
    if(isset($_REQUEST['coverprdend'])){
      $_SESSION['coverprdend'] = $_REQUEST['coverprdend'];
    }
    
    $date1=date_create($_SESSION['coverprdstart']);
    $date2=date_create($_SESSION['coverprdend']);
    $diff=date_diff($date1,$date2);
    $_SESSION['term'] = $diff->format("%a");
    $_REQUEST['term'] = $_SESSION['term'];
     
      // echo "dami";
    //   echo "<pre>2";
    // print_r($_REQUEST);
    // echo "</pre>"; 
      $callName = new postGetCurl();
      if($_SESSION['life_gen_opt'] == "G"){
        
      $url = $general_base_URL."users&opmode=Calculator&life_gen_opt={$_SESSION['life_gen_opt']}";

      $response = $callName->sendPost($_REQUEST,$url,$general_token);
                 
      $annualprem   = $response['result']['annualprem'];
      $prem         = $response['result']['prem'];
      $calc_prorata = $response['result']['calc_prorata'];
      $covertype    = $response['result']['covertype'];
      $insureval    = $response['result']['insureval'];

      $_SESSION['prem'] = $prem;
      $_SESSION['insureval'] = $insureval;

        // echo "<pre>2";
        // print_r($_SESSION);
        // echo "</pre>"; 

      if($_REQUEST['action'] === 'calculate') {
          print_r(json_encode($response));
      }
       
      }else {
        $url   = $general_base_URL."calculator";      
        $response = $callName->sendPost($_REQUEST,$url,$life_token);

       
        
        $annualprem   = $response['result']['yearprem'];
        $prem         = $response['result']['yearprem'];
        $calc_prorata = $response['result']['calc_prorata'];
        $ratetable    = $response['result']['ratetable'];
        $insureval    = $response['result']['sumass'];
        $_SESSION['prem'] = $prem;
        $_SESSION['insureval'] = $insureval;



         if($_REQUEST['action'] === 'calculate') {
          echo $response;
      }
  }
 
     
   global $annualprem,
      $prem,
      $calc_prorata,
      $covertype,
      $insureval, $calc_prorata;
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"
    type="text/javascript"></script>
<script language="JavaScript"
    src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"
    type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"
    href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
.pagination>li {
    display: inline;
    padding: 0px !important;
    margin: 0px !important;
    border: none !important;
}

.modal-backdrop {
    z-index: -1 !important;
}

/*
Fix to show in full screen demo
*/
iframe {
    height: 700px !important;
}

.btn {
    display: inline-block;
    padding: 6px 12px !important;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}

.btn-primary {
    color: #fff !important;
    background: #428bca !important;
    border-color: #357ebd !important;
    box-shadow: none !important;
}

.btn-danger {
    color: #fff !important;
    background: #d9534f !important;
    border-color: #d9534f !important;
    box-shadow: none !important;
}

.note {
    text-align: center;
    height: 350px;
    background: -webkit-linear-gradient(left, #353257, #00c6ff);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}

.notelife {
    text-align: center;
    height: 80px;
    background: -webkit-linear-gradient(left, #353257, #00c6ff);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}

.form-content {
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}

.form-control {
    border-radius: 1.5rem;
}

.btnSubmit {
    border: none;
    border-radius: 1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}
</style>
<html>

<body>
    <?php $_SESSION['life_gen_opt'] ?>
    <div class="container register-form">
        <?php if($_SESSION['life_gen_opt'] == "L"){ include('life_emv.php'); ?>


        <?php } else {?>

        <div class="form">

            <div class="note">
                <h2 class="text-center"><br />MOTOR CALCULATOR</h2><br />
                <?php
   
   if ($covertype == "11000") {
    
    
     if ($calc_prorata) {
                
               echo '<p><h2>Your Prorata Premium is: <b style="color: red;">&#8358;'.number_format($prem, 2).'</b> </h2> </p>  <br/>';    
               echo '<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">';
            
               echo '<thead>
						<tr>                     
							<th>Your Annual Premium is</th>
							<th>Sum Assured Value is</th>
							
						</tr>
					</thead>' ;
                    
                    echo '<tbody>';
					echo 	'<tr>';
				    echo 	'<td> &#8358;'.number_format($annualprem, 2).'</td>';
				    echo    '<td> &#8358;'.number_format($insureval, 2).'</td>';
						
                    echo   '</tbody>';
                    
                    echo '</table>';
                   }
               
               else {
                
                echo '<p><h2>Your Annual Premium is: <b style="color: red;">&#8358;'. number_format($prem, 2).'</b> </h2> </p><br/>';    
            
                echo '<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">';
            
                echo '<thead>
						<tr>                     
							<th>Your Annual Premium is</th>
							<th>Sum Assured Value is</th>
							
						</tr>
					</thead>' ;
                    
                    echo '<tbody>';
					echo 	'<tr>';
				    echo 	'<td> &#8358;'.number_format($annualprem, 2).'</td>';
				    echo    '<td> &#8358;'.number_format($insureval, 2).'</td>';
						
                    echo   '</tbody>';
                    
                    echo '</table>'; 
                }
    
       }
       
       else { 
                echo     '<p><h2>Your Premium is: <b style="color: red;">&#8358;'. number_format($prem, 2).'</b> </h2> </p>  <br/> <br/>';    
                
        
       }
       ?>
            </div>
            <div class="container">
                <br />

                <div class="row">
                    <div class="col-md-12">
                        <div class="float-sm-right" style="float: right;"><a href="getstarted"><button type="button"
                                    class="btn btn-primary">Get Started </button></a></div>
                        <div class="float-sm-left" style="float: left;"><a href="process_calc"><button type="button"
                                    class="btn btn-warning">Go Back</button></a></div>


                    </div>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>
    </div>

</body>

</html>