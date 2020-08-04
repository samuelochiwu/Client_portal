<?php
    session_start();
    include('postCurl.php');
    ini_set("display_errors", "0");
    
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    
    if(isset($_REQUEST['life_gen_opt'])){
      $_SESSION['life_gen_opt'] = $_REQUEST['life_gen_opt'];
    }
    if(isset($_SESSION['usercode'])){
      $_REQUEST['userid'] = $_SESSION['userid'];
    }
    
    if($_SESSION['life_gen_opt'] == "G") $token = "Bearer 39109f7df56e1051c39YNM9e6YK85066bb852";

      else  $token = "Bearer 39109f7df56e1051c399e685066bb852";  
     
      $callName = new postGetCurl();
      //echo "token == $token";
      if($_SESSION['life_gen_opt'] == "G"){
        
      $updatelist['lname']    = $_REQUEST['lname'];
      $updatelist['fname']    = $_REQUEST['fname'];
      $updatelist['yearofb']  = substr($_REQUEST['dd_dbirth'],0,4);
      $updatelist['monthofb'] = substr($_REQUEST['dd_dbirth'],5,2);
      $updatelist['dayofb']   = substr($_REQUEST['dd_dbirth'],8,11);
      $updatelist['occupa']   = $_REQUEST['dd_occupa'];
      $updatelist['gender']   = $_REQUEST['dd_gender'];
      $updatelist['mstatus']  = isset($_REQUEST['dd_mstatus1'])? $_REQUEST['dd_mstatus1'] : '';
      $updatelist['lphone']   = $_REQUEST['lphone'];
      $updatelist['gsm']      = $_REQUEST['gsm'];
      $updatelist['email']    = $_REQUEST['email'];
      $updatelist['address1'] = $_REQUEST['address1'];
      $updatelist['seats']    = isset($_REQUEST['seats'])? $_REQUEST['seats'] : '';
      $updatelist['yearofmake'] = $_REQUEST['yearofmake'];
      $updatelist['maketype']   = $_REQUEST['maketype'];
      $updatelist['insureval']  = $_REQUEST['insureval'];
      $updatelist['covertype']  = $_REQUEST['dd_covertype'];
      $updatelist['chassisnumb']= $_REQUEST['chassisnumb'];
      $updatelist['enginenumb'] = $_REQUEST['enginenumb'];
      $updatelist['regnumb']    = $_REQUEST['regnumb'];
      $updatelist['model']      = $_REQUEST['model'];
      $updatelist['premrate']   = $_REQUEST['premrate'];
      $updatelist['quote']      = $_REQUEST['quote'];
      $updatelist['coverprdstart']  = $_REQUEST['dd_coverprdstart'];
      $updatelist['coverprdend']    = $_REQUEST['dd_coverprdend'];
      $updatelist['term']           = $_REQUEST['term'];
      $updatelist['state']          = $_REQUEST['state'];
      $updatelist['vecaddr']        = $_REQUEST['vecaddr'];
      $updatelist['addinfo']        = $_REQUEST['addinfo'];
      $updatelist['addinfo_input']  = $_REQUEST['addinfo_input'];
      $updatelist['crooftconstr']   = $_REQUEST['crooftconstr'];
      $updatelist['insuredaddr']    = $_REQUEST['insuredaddr'];
      $updatelist['typematr']       = $_REQUEST['typematr'];
      $updatelist['premises']       = $_REQUEST['premises'];
      $updatelist['building']       = $_REQUEST['building'];
      


      $url   = "http://35.189.125.141/demo_general/gen_demo_api/ies_connect.php?process=users&opmode=comsignup&userid={$_SESSION['usercode']}&life_gen_opt={$_SESSION['life_gen_opt']}";      
      
      $response = $callName->sendPost($_REQUEST,$url,$token);
      //var_dump($response);

      if($response){
        header("Location: admin.php");
      }
      }else{
        
      $url   = "http://35.189.125.141/demo_life/api_ies/ies_connect.php?process=comsignup&userid={$_SESSION['usercode']}";
        
      $updatelist['title']      = isset($_REQUEST['dd_title']) ? $_REQUEST['dd_title'] : "";
      $updatelist['lname']      = isset($_REQUEST['lname']) ? $_REQUEST['lname'] : "";
      $updatelist['fname']      = isset($_REQUEST['fname']) ? $_REQUEST['fname'] : "";
      $updatelist['agency']     = isset($_REQUEST['agency']) ? $_REQUEST['agency'] : "";
      $updatelist['placeofb']   = isset($_REQUEST['placeofb']) ? $_REQUEST['placeofb'] : "";
      $updatelist['yearofb']    = isset($_REQUEST['dd_dbirth']) ? substr($_REQUEST['dd_dbirth'],0,4) : "";
      $updatelist['monthofb']   = isset($_REQUEST['dd_dbirth']) ? substr($_REQUEST['dd_dbirth'],5,2) : "";;
      $updatelist['dayofb']     = isset($_REQUEST['dd_dbirth']) ? substr($_REQUEST['dd_dbirth'],8,11) : "";
      $updatelist['mm_name']    = isset($_REQUEST['mm_name']) ? $_REQUEST['mm_name'] : "";
      $updatelist['occupa']     = isset($_REQUEST['dd_occupa']) ? $_REQUEST['dd_occupa'] : "";
      $updatelist['gender']     = isset($_REQUEST['dd_gender']) ? $_REQUEST['dd_gender'] : "";
      $updatelist['mstatus']    = isset($_REQUEST['dd_mstatus1'])? $_REQUEST['dd_mstatus1'] : '';
      $updatelist['lphone']     = isset($_REQUEST['lphone']) ? $_REQUEST['lphone'] : "";
      $updatelist['gsm']        = isset($_REQUEST['gsm']) ? $_REQUEST['gsm'] : "";
      $updatelist['email']      = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
      $updatelist['fax']        = isset($_REQUEST['fax']) ? $_REQUEST['fax'] : "";
    //$updatelist['comm_addr'] = $_REQUEST['comm_addr'];
      $updatelist['address1']   = isset($_REQUEST['address1']) ? $_REQUEST['address1'] : "";
      $updatelist['postaddr1']  = isset($_REQUEST['postaddr1']) ? $_REQUEST['postaddr1'] : "";
      $updatelist['empname']    = isset($_REQUEST['empname']) ? $_REQUEST['empname'] : "";
      $updatelist['empphone']   = isset($_REQUEST['empphone']) ? $_REQUEST['empphone'] : "";
      $updatelist['empaddr1']   = isset($_REQUEST['empaddr1']) ? $_REQUEST['empaddr1'] : "";
      $updatelist['annual_prem']= $annual_prem;
      
      $updatelist['desiredprem']    = isset($_REQUEST['desiredprem']) ? str_ireplace(',','',$_REQUEST['desiredprem']) : "";
      $updatelist['propten']        = isset($_REQUEST['qterm_b']) ? $_REQUEST['qterm_b'] : "";
      $updatelist['insureval']      = isset($_REQUEST['insureval']) ? str_ireplace(',','',$_REQUEST['insureval']): "";
      $updatelist['premfrq']        = isset($_REQUEST['dd_premfrq_a'])? $_REQUEST['dd_premfrq_a'] : '';
      $updatelist['paymode']        = isset($_REQUEST['paymode']) ? $_REQUEST['paymode'] : "";
      $updatelist['paymode_b']      = isset($_REQUEST['paymode_b']) ? $_REQUEST['paymode_b'] : "";
      $updatelist['init_contrib']   = isset($_REQUEST['init_contrib']) ? $_REQUEST['init_contrib'] : "";
      $updatelist['acct_name']      = isset($_REQUEST['acct_name']) ? $_REQUEST['acct_name'] : "";
      $updatelist['actnum']         = isset($_REQUEST['actnum']) ? $_REQUEST['actnum'] : "";
      $updatelist['bnkname']        = isset($_REQUEST['bnkname']) ? $_REQUEST['bnkname'] : "";
      $updatelist['cheque']         = isset($_REQUEST['cheque']) ? $_REQUEST['cheque'] : "";
      $updatelist['sapb']           = isset($_REQUEST['sabp']) ? $_REQUEST['sabp'] : "";
      $updatelist['sfreq']          = isset($_REQUEST['sfreq']) ? $_REQUEST['sfreq'] : "";
      $updatelist['asset_mgt']      = isset($_REQUEST['asset_mgt']) ? $_REQUEST['asset_mgt'] : "";
      $updatelist['asset_mgt_a']    = isset($_REQUEST['asset_mgt_a']) ? $_REQUEST['asset_mgt_a'] : "";
      $updatelist['ann_income']     = isset($_REQUEST['ann_income']) ? $_REQUEST['ann_income'] : "";
      $updatelist['ann_income2']    = isset($_REQUEST['ann_income2']) ? $_REQUEST['ann_income2'] : "";
      $updatelist['prevsum1']       = isset($_REQUEST['prevsum1']) ? $_REQUEST['prevsum1'] : "";
      $updatelist['incofname1']     = isset($_REQUEST['incofname1']) ? $_REQUEST['incofname1'] : "";
      $updatelist['prevsum2']       = isset($_REQUEST['prevsum2']) ? $_REQUEST['prevsum2'] : "";
      $updatelist['prevplan1']      = isset($_REQUEST['prevplan1']) ? $_REQUEST['prevplan1'] : "";
      $updatelist['prevprem1']      = isset($_REQUEST['prevprem1']) ? $_REQUEST['prevprem1'] : "";
      $updatelist['incofname2']     = isset($_REQUEST['incofname2']) ? $_REQUEST['incofname2'] : "";
      $updatelist['prevplan2']      = isset($_REQUEST['prevplan2']) ? $_REQUEST['prevplan2'] : "";
      $updatelist['prevprem2']      = isset($_REQUEST['prevprem2']) ? $_REQUEST['prevprem2'] : "";
                
       $updatelist['height']        = isset($_REQUEST['height']) ? $_REQUEST['height'] : "";
       $updatelist['hmeasure']      = isset($_REQUEST['hmeasure']) ? $_REQUEST['hmeasure'] : "";
       $updatelist['weight']        = isset($_REQUEST['weight']) ? $_REQUEST['weight'] : "";
       $updatelist['wmeasure']      = isset($_REQUEST['wmeasure']) ? $_REQUEST['wmeasure'] : "";
       $updatelist['health']        = isset($_REQUEST['health']) ? $_REQUEST['health'] : "";
       $updatelist['dd_binfirmity'] = isset($_REQUEST['dd_binfirmity']) ? $_REQUEST['dd_binfirmity'] : "";
       $updatelist['aids']          = isset($_REQUEST['aids']) ? $_REQUEST['aids'] : "";
       $updatelist['symp']          = isset($_REQUEST['symp']) ? $_REQUEST['symp'] : "";
       $updatelist['absent']        = isset($_REQUEST['absent']) ? $_REQUEST['absent'] : "";
       $updatelist['fem_preg']      = isset($_REQUEST['fem_preg']) ? $_REQUEST['fem_preg'] : "";
       $updatelist['binfirmdesc']   = isset($_REQUEST['binfirmdesc']) ? $_REQUEST['binfirmdesc'] : "";
       $updatelist['nok']           = isset($_REQUEST['nok']) ? $_REQUEST['nok'] : "";
       $updatelist['nokphone']      = isset($_REQUEST['nokphone']) ? $_REQUEST['nokphone'] : "";
       $updatelist['nok_addr1']     = isset($_REQUEST['nok_addr1']) ? $_REQUEST['nok_addr1'] : "";
       $updatelist['benef_name1']   = isset($_REQUEST['benef_name1']) ? $_REQUEST['benef_name1'] : "";
       $updatelist['benef_dbirth1'] = isset($_REQUEST['benef_dbirth1']) ? $_REQUEST['benef_dbirth1'] : "";
       $updatelist['benef_addr1']   = isset($_REQUEST['benef_addr1']) ? $_REQUEST['benef_addr1'] : "";
       $updatelist['benef_rel1']    = isset($_REQUEST['benef_rel1']) ? $_REQUEST['benef_rel1'] : "";
       $updatelist['benef_prop1']   = isset($_REQUEST['benef_prop1']) ? $_REQUEST['benef_prop1'] : "";
       $updatelist['benef_name2']   = isset($_REQUEST['benef_name2']) ? $_REQUEST['benef_name2'] : "";
       $updatelist['benef_dbirth2'] = isset($_REQUEST['benef_dbirth2']) ? $_REQUEST['benef_dbirth2'] : "";
       $updatelist['benef_addr2']   = isset($_REQUEST['benef_addr2']) ? $_REQUEST['benef_addr2'] : "";
       $updatelist['benef_rel2']    = isset($_REQUEST['benef_rel2']) ? $_REQUEST['benef_rel2'] : "";
       $updatelist['benef_prop2']   = isset($_REQUEST['benef_prop2']) ? $_REQUEST['benef_prop2'] : "";
       $updatelist['benef_name3']   = isset($_REQUEST['benef_name3']) ? $_REQUEST['benef_name3'] : "";
       $updatelist['benef_dbirth3'] = isset($_REQUEST['benef_dbirth3']) ? $_REQUEST['benef_dbirth3'] : "";
       $updatelist['benef_addr3']   = isset($_REQUEST['benef_addr3']) ? $_REQUEST['benef_addr3'] : "";
       $updatelist['benef_rel3']    = isset($_REQUEST['benef_rel3']) ? $_REQUEST['benef_rel3'] : "";
       $updatelist['benef_prop3']   = isset($_REQUEST['benef_prop3']) ? $_REQUEST['benef_prop3'] : "";
       $updatelist['benef_name4']   = isset($_REQUEST['benef_name4']) ? $_REQUEST['benef_name4'] : "";
       $updatelist['benef_dbirth4'] = isset($_REQUEST['benef_dbirth4']) ? $_REQUEST['benef_dbirth4'] : "";
       $updatelist['benef_addr4']   = isset($_REQUEST['benef_addr4']) ? $_REQUEST['benef_addr4'] : "";
       $updatelist['benef_rel4']    = isset($_REQUEST['benef_rel4']) ? $_REQUEST['benef_rel4'] : "";
       $updatelist['benef_prop4']   = isset($_REQUEST['benef_prop4']) ? $_REQUEST['benef_prop4'] : "";
       // minor indicator
       $updatelist['minorindic1']   = isset($_REQUEST['dd_minorindic1']) ? $_REQUEST['dd_minorindic1'] : "";
       $updatelist['minorindic2']   = isset($_REQUEST['dd_minorindic2']) ? $_REQUEST['dd_minorindic2'] : "";
       $updatelist['minorindic3']   = isset($_REQUEST['dd_minorindic3']) ? $_REQUEST['dd_minorindic3'] : "";
       $updatelist['minorindic4']   = isset($_REQUEST['dd_minorindic4']) ? $_REQUEST['dd_minorindic4'] : "";
       
       //Maison Armani
       //dbgarr('$_REQUEST',$_REQUEST);
       
               $_REQUEST['dd_minorindic']  = isset($_REQUEST['dd_minorindic'] ) ? $_REQUEST['dd_minorindic']  : "N";
               $updatelist['minorindic_more']   = isset($updatelist['minorindic_more']) 
               ?  $updatelist['minorindic_more']."~~".$_REQUEST['dd_minorindic'] 
               :  $_REQUEST['dd_minorindic'];
               
               $updatelist['benef_dbirth_more']   = isset($updatelist['benef_dbirth_more']) 
               ?  $updatelist['benef_dbirth_more']."~~".$_REQUEST['benef_dbirth'] 
               :  $_REQUEST['benef_dbirth'];
               
               $updatelist['benef_rel_more']   = isset($updatelist['benef_rel_more']) 
               ?  $updatelist['benef_rel_more']."~~".$_REQUEST['benef_rel_more'] 
               :  $_REQUEST['benef_rel'.$start];
               
               $updatelist['benef_name_more']   = isset($updatelist['benef_name_more']) 
               ?  $updatelist['benef_name_more']."~~".$_REQUEST['benef_name'] 
               :  $_REQUEST['benef_name'];
               
               $updatelist['benef_addr_more']   = isset($updatelist['benef_addr_more']) 
               ?  $updatelist['benef_addr_more']."~~".$_REQUEST['benef_addr'] 
               :  $_REQUEST['benef_addr'];
               
               $updatelist['benef_prop_more']   = isset($updatelist['benef_prop_more']) 
               ?  $updatelist['benef_prop_more']."~~".$_REQUEST['benef_prop'] 
               :  $_REQUEST['benef_prop'];     
           
        
       //Maturity benefits
       $updatelist['matbenef_name1']   = isset($_REQUEST['matbenef_name1']) ? $_REQUEST['matbenef_name1'] : "";
       $updatelist['matbenef_dbirth1'] = isset($_REQUEST['matbenef_dbirth1']) ? $_REQUEST['matbenef_dbirth1'] : "";
       $updatelist['matbenef_addr1']   = isset($_REQUEST['matbenef_addr1']) ? $_REQUEST['matbenef_addr1'] : "";
       $updatelist['matbenef_rel1']    = isset($_REQUEST['matbenef_rel1']) ? $_REQUEST['matbenef_rel1'] : "";
       $updatelist['matbenef_prop1']   = isset($_REQUEST['matbenef_prop1']) ? $_REQUEST['matbenef_prop1'] : "";
       $updatelist['matminorindic1']   = isset($_REQUEST['dd_matminorindic1']) ? $_REQUEST['dd_matminorindic1'] : "";
        
       $updatelist['matbenef_name2']   = isset($_REQUEST['matbenef_name2']) ? $_REQUEST['matbenef_name2'] : "";
       $updatelist['matbenef_dbirth2'] = isset($_REQUEST['matbenef_dbirth2']) ? $_REQUEST['matbenef_dbirth2'] : "";
       $updatelist['matbenef_addr2']   = isset($_REQUEST['matbenef_addr2']) ? $_REQUEST['matbenef_addr2'] : "";
       $updatelist['matbenef_rel2']    = isset($_REQUEST['matbenef_rel2']) ?  $_REQUEST['matbenef_rel2'] : "";
       $updatelist['matbenef_prop2']   = isset($_REQUEST['matbenef_prop2']) ? $_REQUEST['matbenef_prop2'] : "";
       $updatelist['matminorindic2']   = isset($_REQUEST['dd_matminorindic2']) ? $_REQUEST['dd_matminorindic2'] : "";
       
       $updatelist['matbenef_name3']   = isset($_REQUEST['matbenef_name3']) ? $_REQUEST['matbenef_name3'] : "";
       $updatelist['matbenef_dbirth3'] = isset($_REQUEST['matbenef_dbirth3']) ? $_REQUEST['matbenef_dbirth3'] : "";
       $updatelist['matbenef_addr3']   = isset($_REQUEST['matbenef_addr3']) ? $_REQUEST['matbenef_addr3'] : "";
       $updatelist['matbenef_rel3']    = isset($_REQUEST['matbenef_rel3']) ?  $_REQUEST['matbenef_rel3'] : "";
       $updatelist['matbenef_prop3']   = isset($_REQUEST['matbenef_prop3']) ? $_REQUEST['matbenef_prop3'] : "";
      // $updatelist['matminorindic3']   = isset($_REQUEST['dd_matminorindic3']) ? $_REQUEST['dd_matminorindic3'] : "";
       
       $updatelist['matbenef_name4']   = isset($_REQUEST['matbenef_name4']) ? $_REQUEST['matbenef_name4'] : "";
       $updatelist['matbenef_dbirth4'] = isset($_REQUEST['matbenef_dbirth4']) ? $_REQUEST['matbenef_dbirth4'] : "";
       $updatelist['matbenef_addr4']   = isset($_REQUEST['matbenef_addr4']) ? $_REQUEST['matbenef_addr4'] : "";
       $updatelist['matbenef_rel4']    = isset($_REQUEST['matbenef_rel4']) ?  $_REQUEST['matbenef_rel4'] : "";
       $updatelist['matbenef_prop4']   = isset($_REQUEST['matbenef_prop4']) ? $_REQUEST['matbenef_prop4'] : "";
      // $updatelist['matminorindic4']   = isset($_REQUEST['dd_matminorindic4']) ? $_REQUEST['dd_matminorindic4'] : "";
       
       
               $_REQUEST['dd_matminorindic']  = isset($_REQUEST['dd_matminorindic'] ) ? $_REQUEST['dd_matminorindic']  : "N";
               $updatelist['matminorindic_more']   = isset($updatelist['matminorindic_more']) 
               ?  $updatelist['matminorindic_more']."~~".$_REQUEST['dd_matminorindic'] 
               :  $_REQUEST['dd_matminorindic'];
               
               $updatelist['matbenef_dbirth_more']   = isset($updatelist['matbenef_dbirth_more']) 
               ?  $updatelist['matbenef_dbirth_more']."~~".$_REQUEST['matbenef_dbirth'] 
               :  $_REQUEST['matbenef_dbirth'];
               
               $updatelist['matbenef_name_more']   = isset($updatelist['matbenef_name_more']) 
               ?  $updatelist['matbenef_name_more']."~~".$_REQUEST['matbenef_name'] 
               :  $_REQUEST['matbenef_name'];
               
               $updatelist['matbenef_rel_more']   = isset($updatelist['matbenef_rel_more']) 
               ?  $updatelist['matbenef_rel_more']."~~".$_REQUEST['matbenef_rel'] 
               :  $_REQUEST['matbenef_rel'];
               
               $updatelist['matbenef_addr_more']   = isset($updatelist['matbenef_addr_more']) 
               ?  $updatelist['matbenef_addr_more']."~~".$_REQUEST['matbenef_addr'] 
               :  $_REQUEST['matbenef_addr'];
               
               $updatelist['matbenef_prop_more']   = isset($updatelist['matbenef_prop_more']) 
               ?  $updatelist['matbenef_prop_more']."~~".$_REQUEST['matbenef_prop'] 
               :  $_REQUEST['matbenef_prop'];     
               
       $updatelist['guardian']          = isset($_REQUEST['guardian']) ? $_REQUEST['guardian'] : "";
       $updatelist['guardian_addr']     = isset($_REQUEST['guardian_addr']) ? $_REQUEST['guardian_addr'] : "";
       
       $updatelist['guardian_phone']    = isset($_REQUEST['guardian_phone']) ? $_REQUEST['guardian_phone'] : "";
       $updatelist['guardian_email']    = isset($_REQUEST['guardian_email']) ? $_REQUEST['guardian_email'] : "";
      //matbenef_dbirth2 
       
       $updatelist['propten2']          = isset($_REQUEST['qterm_b2']) ? trim($_REQUEST['qterm_b2'],',') : "";
       $updatelist['p_pay']             = isset($_REQUEST['p_pay']) ? $_REQUEST['p_pay'] : "";
       $updatelist['stroke']            = isset($_REQUEST['stroke']) ? $_REQUEST['stroke'] : "";
       $updatelist['strokedesc']        = isset($_REQUEST['strokedesc']) ? $_REQUEST['strokedesc'] : "";
       $updatelist['aidsdesc']          = isset($_REQUEST['aidsdesc']) ? $_REQUEST['aidsdesc'] : "";
       $updatelist['liver']             = isset($_REQUEST['liver']) ? $_REQUEST['liver'] : "";
       $updatelist['liverdesc']         = isset($_REQUEST['liverdesc']) ? $_REQUEST['liverdesc'] : "";
       $updatelist['tuberculosis']      = isset($_REQUEST['tuberculosis']) ? $_REQUEST['tuberculosis'] : "";
       $updatelist['tuberculosisdesc']  = isset($_REQUEST['tuberculosisdesc']) ? $_REQUEST['tuberculosisdesc'] : "";
       $updatelist['cancer']            = isset($_REQUEST['cancer']) ? $_REQUEST['cancer'] : "";
       $updatelist['cancerdesc']        = isset($_REQUEST['cancerdesc']) ? $_REQUEST['cancerdesc'] : "";
       $updatelist['nervous']           = isset($_REQUEST['nervous']) ? $_REQUEST['nervous'] : "";
       $updatelist['nervousdesc']       = isset($_REQUEST['nervousdesc']) ? $_REQUEST['nervousdesc'] : "";
       $updatelist['heart']             = isset($_REQUEST['c']) ? $_REQUEST['heart'] : "";
       $updatelist['heartdesc']         = isset($_REQUEST['heartdesc']) ? $_REQUEST['heartdesc'] : "";
 
       $updatelist['ssnumber']          = isset($_REQUEST['ssnumber']) ? $_REQUEST['ssnumber'] : "";
       $updatelist['country']           = isset($_REQUEST['dd_country']) ? $_REQUEST['dd_country'] : "";
       $updatelist['state']             = isset($_REQUEST['dd_state']) ? $_REQUEST['dd_state'] : "";
       $updatelist['lga']               = isset($_REQUEST['lga']) ? $_REQUEST['lga'] : "";
       $updatelist['idtype']            = isset($_REQUEST['idtype']) ? $_REQUEST['idtype'] : "";
       
       $updatelist['nok_above_18']      = isset($_REQUEST['nok_above_18']) ? $_REQUEST['nok_above_18'] : "";
       $updatelist['nok_rel']           = isset($_REQUEST['dd_nok_rel']) ? $_REQUEST['dd_nok_rel'] : "";
       
       $updatelist['dd_religion']       = isset($_REQUEST['dd_religion']) ? $_REQUEST['dd_religion'] : "";
       $updatelist['dd_othnames']       = isset($_REQUEST['dd_othnames']) ? $_REQUEST['dd_othnames'] : "";
       
       $updatelist['sumass']            = isset($_REQUEST['sumass']) ? $_REQUEST['sumass'] : "";
       $updatelist['funex']             = isset($_REQUEST['funex']) ? $_REQUEST['funex'] : "";
       $updatelist['agency']             = isset($_REQUEST['agency']) ? $_REQUEST['agency'] : "000/00/0200";
       $updatelist['prevplan']          = isset($_REQUEST['prevplan_hide']) ? $_REQUEST['prevplan_hide'] : "";
       $updatelist['prevsum']           = isset($_REQUEST['prevsum_hide']) ? $_REQUEST['prevsum_hide'] : "";
       $updatelist['incofname']         = isset($_REQUEST['incofname_hide']) ? $_REQUEST['incofname_hide'] : "";
       $updatelist['prevprem']          = isset($_REQUEST['prevprem_hide']) ? $_REQUEST['prevprem_hide'] : "";
      
       $response = $callName->sendPost($_REQUEST,$url,$token);

        if($response){
        header("Location: admin.php");
      }
      // var_dump($response);
      }
      
      

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

    <div class="container register-form">

        <div class="form">

            <div class="note">
                <h2 class="text-center"><br />ACCEPT PROPOSAL</h2>
            </div>
            <div class="container">
                <br />

                <div class="row">
                    <div class="col-md-12">
                        <div class="float-sm-right" style="float: right;"><a href="admin"><button type="button"
                                    class="btn btn-primary">Accept </button></a></div>
                        <div class="float-sm-left" style="float: left;"><a href="process_calc"><button type="button"
                                    class="btn btn-warning">Go Back</button></a></div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>