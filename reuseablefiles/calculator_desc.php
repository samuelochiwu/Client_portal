<?php
    include('../session_var.php');
    include('../postCurl.php');
    include('../constants.php');
    ini_set("display_errors", "0");
    
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
        
      $url = $general_base_URL."Calculator&life_gen_opt={$_SESSION['life_gen_opt']}";

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
    
  
      
    

 ?>