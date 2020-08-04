<?php 
 ob_start();
class Users {
  
  public function post($request){
        
    $return = array();
    
    ////Operation Mode
    $op_mode =  $request['opmode'];
    
    $iesdb_new              = init_iesdbs(); 
      
    if ($iesdb_new)  $uaccess01   = new Dbtable($iesdb_new,"uaccess01"); 
    
    if ($iesdb_new)  $nlfpolmain  = new Dbtable($iesdb_new,"nlfpolmain"); 
    
    if ($iesdb_new)  $scheditems  = new Dbtable($iesdb_new,"scheditems"); 
    
    if ($iesdb_new)  $motoritems  = new Dbtable($iesdb_new,"motoritems"); 
    
    $fv_messagehold = "";
    //$pexist         = false;
  
    
    if ($op_mode == "EBCCreateNEWCustomer") {
        
    $fv_csurname = "";
    if (isset($request['csurname'])) {
        $fv_csurname=(trim($request['csurname']));
    }
    
    $fv_cothname = "";
    if (isset($request['cothname'])) {
        $fv_cothname=(trim($request['cothname']));
    }
    $fv_cemail = "";
    if (isset($request['cemail'])) {
        $fv_cemail=(trim($request['cemail']));
    }
    
    $fv_cgsm = "";
    if (isset($request['cgsm'])) {
        $fv_cgsm=(trim($request['cgsm']));
    }
    
    ///
    $fv_country = "NG";
    if (isset($request['country'])) {
      $fv_country=(trim($request['country']));  
     }
     $fv_state = "NG-100000";
    if (isset($request['state'])) {
      $fv_state=(trim($request['state']));  
     }
      $fv_addr1 = "";
    if (isset($request['addr1'])) {
      $fv_addr1=(trim($request['addr1']));
    } 
     
     $fv_aclass = "A";
    if (isset($request['aclass'])) {
    $fv_aclass=(trim($request['aclass']));
     }
     
     $fv_commcls = "00005";
    if (isset($request['commcls'])) {
      $fv_commcls=(trim($request['commcls']));
     }
     
     $fv_type = "ALL";
     if (isset($request['type'])) {
      $fv_type=(trim($request['type']));
     }
     
     $fv_status = "A";
     if (isset($request['dd_status'])) {
      $fv_status=(trim($request['dd_status']));
     }
    
    $fv_agent_api = "";
    if (isset($request['agent_api'])) {
        $fv_agent_api=(trim($request['agent_api']));
    }
    
     $fv_life_gen_opt = "";
    if (isset($request['life_gen_opt'])) {
        $fv_life_gen_opt=(trim($request['life_gen_opt']));
    }
    
    ///
    
    //dbgarr("request",$request);
    //die;
    $request['requesttype']= "QUOT"; //Test Access
    $request['requestid']  = ""; 
    $request['txt_message']= "Please Send Me A User/Code And Password"; //
    $request['subjectm']   = "";
       
      if (!filter_var($request['cemail'], FILTER_VALIDATE_EMAIL)) {
            
            //echo ("invalid email address");// invalid emailaddress
            return $return['message'] = 'invalid email address';
            
       }
       if($fv_life_gen_opt == "G"){
       
       if (($request['cemail']  != 'NONE') && ($request['cemail']  != '')) {
                //integrity check
                $iesdb  = init_iesdbscomm();
                //$iesdb = init_iesdbs();                
                                
        	 	//$chkqry	= sprintf("SELECT cemail FROM  comm_visitors WHERE cemail = '%s' ",$request['cemail']);
        	 //	$chkres	= $iesdb->qsel($chkqry,'A');
                
                $clientrec              =  $iesdb->qsel("SELECT cemail, cgsm  FROM comm_visitors WHERE cemail = '$fv_cemail' OR cgsm = '$fv_cgsm' ","A");
      
      	if (!empty($clientrec)){
        	 	  
                 $return['message'] = "{$request['cemail']}  or  {$request['cgsm']}  already exist for the client, two of them most exist...";
        	 	}
                else{  

            	 	//all clear
                $results = save_visdetails($request);
                  
                if(!empty($results)){
            
                $save_quote_flag = true;
                    
                $userID = $_SESSION['QUOT_requestID'];
                //echo "userID ==$userID";
                $visitor = get_visitor($userID);
                // echo "1..".$visitor; 
        if(!empty($visitor)) {
            
          // if(!empty($saveClient)){
           $curdate  = date('Y-m-d'); 
           $curtime  = date("H:i:s"); 
           $datetime = $curdate . " " . $curtime;
           $ovars['activated'] = '0';
           $ovars['access_expires']   = nextdatetime(0,0,0,24,0,0,0,$datetime); 
           $ovars['source']           = 'ECOMM' ;
         // if($fv_agent_api == "AGENT_API") $rps = generate_User_Api('A',$visitor['csurname'],$visitor['cothname'],'','','','',$visitor['cemail'],$visitor['cgsm'],'',false,$ovars);
            $rps = generate_User_Api('C',$visitor['csurname'],$visitor['cothname'],'','','','',$visitor['cemail'],$visitor['cgsm'],'',false,$ovars);
             //echo "2..".$rps['csurname'];
             
        if(!empty($rps)) {
           $itemlist['surname']         = $visitor['csurname'];
           $itemlist['othname']         = $visitor['cothname'];
           $itemlist['clientno']        = "";
           $itemlist['insured']         = $visitor['csurname']. " ". $visitor['cothname'];
           $itemlist['contactname']     = "";
           $itemlist['address1']        = "";
           $itemlist['address2']        = "";
           $itemlist['country']         = "";
           $itemlist['state']           = "";
           $itemlist['contactcls']      = "";
           $itemlist['email']           = $visitor['cemail'];
           $itemlist['lphome']          ="";
           $itemlist['gsm']             = $visitor['cgsm'];
           $itemlist['countcode']       = "";
           $itemlist['website']         = "";
           $itemlist['dd_status']       = "";
           $itemlist['regdate']         = "";
           $itemlist['title']           = "";
           $itemlist['lfax']            = "";
           $itemlist['bsource']         = "";
           $itemlist['assignee']        = "";
           $itemlist['dd_gender']       = "";
           $itemlist['placeofbirth']    = "";
           $itemlist['dd_mstatus']      = "";
           $itemlist['mother_maidname'] = "";
           $itemlist['empname']         = "";
           $itemlist['off_address1']    = "";
           $itemlist['off_address2']    = "";
           $itemlist['per_address1']    = "";
           $itemlist['per_address2']    = "";
           $itemlist['dd_commad']       = "";
           $itemlist['emp_phone']       = "";
           $itemlist['dd_iddocno']      = "";
           $itemlist['idno']            = "";
           $itemlist['dd_state_lga']    = "";
           
           //dbgarr("itemlist",$itemlist);
          /* if($fv_agent_api == "AGENT_API"){
            $item_array['gsmline'] = $fv_cgsm;
            $item_array['email']   = $fv_cemail;
            $item_array['agname']  = $fv_csurname. " ". $fv_cothname;
            $item_array['country'] = "NG";
            $item_array['state']   = "NG-100000";
            $item_array['addr1']   = $fv_addr1;
            $item_array['aclass']    = "A"; 
            $item_array['commcls']   = "00005"; 
            $item_array['type']      = "ALL";
            $item_array['status'] = "A";
            $item_array['aggreg']      = "";
            $item_array['regdate']     = date("Y-m-d");
            $item_array['licensedate'] = "";
            $rest = SaveAgency($item_array);
            if($rest){
              $agcode = $_SESSION['agcode'];
            //  echo "agcode==$agcode";
              $user_client = $rps['userid'];
              $iesdb_new->qupd(" update uaccess01 set clientlink = '$agcode' where (cltcode='$user_client')"); 
            }
            }else{*/
              $saveClient = saveClient($itemlist);
           if($saveClient){
            
              $cltnum = $_SESSION['cltcode'];
              $user_client = $rps['userid'];
              $iesdb_new->qupd(" update uaccess01 set clientlink = '$cltnum' where (cltcode='$user_client')");
              $iesdb_new->qupd(" update nlfclients set userid = '$user_client' where (clientno='$cltnum')");    
             
             }  
           // }
           
          }
            //echo "I am here";
          } else {
            //error return
            ajaxerrorHandler('Error: Visitor Id Does Not Exist, Contact Adminstrator');
            $save_quote_flag = false;
        } 
            $result1 =  $uaccess01->getRecs("", "cltcode ='{$rps['userid']}' ", "initpass");  
             
         /*if ($fv_agent_api == "AGENT_API"){
            
             if($result1)$clientpass = $result1[0]['initpass'];
             $return['status']       = 1;
             $return['message']      = "User created successfully";
             $return['customer_id']  = "{$rps['uemail']}";
             $return['password']     = $clientpass;
             $return['agtcode']      = $user_client;
             $return['agentnumber']  = $agcode;
             $return['gsm']          = "{$rps['ugsm']}";;
         }
         else{*/
          if($result1) $clientpass = $result1[0]['initpass'];
             $return['status']    = 1;
             $return['message']   = "User created successfully";
             $return['customer_id']  = "{$rps['uemail']}";
             $return['password']     = $clientpass;
             $return['cltcode']      = $user_client;
             $return['clientcode']   = $cltnum;
             $return['gsm']          = "{$rps['ugsm']}";; 
        // }
         
         }
         else{
       //$return['client_id'] = '';
             $return['status']    = 0;
             $return['message']   = "User not Created Please try again";
       
       
      }
                        
    }   
    }
    }else{
      $url        = "http://104.199.122.248/arm_slash_prod/api_ies/ies_connect.php?process=users";
      $response   = $this->getcurl($request,$url);
      return $response;

    }
  }
  
 else if ($op_mode == "EBLogin") {
     
    $fv_cltcode = "";
    if (isset($request['cltcode'])) {
        $fv_cltcode=(trim($request['cltcode']));
    }
     $fv_password = "";
    if (isset($request['password'])) {
        $fv_password=(trim($request['password']));
    }
            
    
    $return = array();
    
    $iesdb                  =  init_iesdbs();
    
    $clientrec              =  $iesdb->qsel("SELECT cltcode, plink,cltpass FROM uaccess01 WHERE (cltcode = '$fv_cltcode') ","A");
   
    $lastlogindate = $clientrec[0]['cltcode'];
    $cltcode       = $clientrec[0]['cltcode'];
     if(!empty($clientrec)) {
     $cpwd    = $clientrec[0]['cltpass'];
     $plink   = $clientrec[0]['plink'];
     
     $pvalue0 = $cpwd;
     $pvalue1 = gen_identity($pvalue0,$plink,'D'); 
     
     //echo " pvalue1 = $pvalue1  ... <br> ";
    
     if ($pvalue1 == $fv_password ) {
       $return['status']    = 1;
       $return['message']   = "You have successfully logged in";
       updladate($lastlogindate);
     }
     else
        {
        $return['status']    = 0;
        $return['message']   = "Your cltcode does not equal to the one in our database...";
        }
      }
      else{
        $return['status']    = 0;
        $return['message']   = "Please check your Cltcode or Password...";
      }  
               
  }
  
   else if ($op_mode == "EBChangePass") {
     
    $fv_cltcode = "";
    if (isset($request['cltcode'])) {
        $fv_cltcode=(trim($request['cltcode']));
    }
     $fv_oldpwd = "";
     if (isset($request['oldpwd'])) {
      $fv_oldpwd=(trim($request['oldpwd']));
     }
     $fv_newpwd = "";
     if (isset($request['newpwd'])) {
      $fv_newpwd=(trim($request['newpwd']));
     } 
     $fv_newpwd2 = "";
     if (isset($request['newpwd2'])) {
      $fv_newpwd2=(trim($request['newpwd2']));
     }
     
     $iesdb                  =  init_iesdbs();
    
     $clientrec              =  $iesdb->qsel("SELECT cltcode FROM uaccess01 WHERE cltcode = '$fv_cltcode' ","A");
     
     if($clientrec){
        $cltcode = $clientrec[0]['cltcode'];
        $request['cltcode'] = $cltcode;
        
     }else{
         $return['status']  = 0;
         $return['message'] = "ClientCode Does not exist";
     }
        $valid     = true;
        $error_flg = false;
        $error_msg = "";
        
        //implement the password policy 
        $policy = new PasswordPolicy();
        // Validate submitted password
        $valid = $policy->validate($fv_newpwd);
        if ((!$valid) || ($valid == '')) {
        foreach( $policy->get_errors() as $k=>$error ) {
            $error_msg .= $error ."\n";
        }
        if(trim($error_msg) != '') $error_flg = true;
        }
        
        // Ensure the Files are valid 
        if($error_flg){
        $fv_messagehold = $error_msg;
        }
        else {
        
           $savresp = savepwd($request);
           if ($savresp < 0) {
            //echo "Samuel";
            $fv_messagehold = $_SESSION['curerror'];
            $return['status'] = 0;
            $return['message'] = $fv_messagehold;
           }
           else {
            $fv_messagehold     = $pmpointer['recup05'];
            $json_status = 'true';
            $fv_oldpwd   = "";
            $fv_newpwd   = "";   
            $fv_newpwd2  = "";  
            $exitnow     = 1; 
            //
            $return['status'] = 1;
            $return['message'] = "Password updated successfuly";
            /*$_SESSION['aud_control_okaytolog'] = 1;
            audit_prep(9,'004-01','RAD','Login Password Changed By Owner','',$logstaff,$logstaff,'','',''); 
            $_SESSION['aud_InsertAmendDel'] = ""; */ 
           } 
       
   }
               
  }
  
   else if ($op_mode == "EBUpdateCustomer") {
            
      $userid = "";
     if (isset($request['cltcode'])) {
      $userid = $request['cltcode'];
     }
     if($userid !=""){
        $result1 =  $uaccess01->getRecs("", "cltcode ='$userid' ", "clientlink");
       
       $clientlink = $result1[0]['clientlink'];
       $surname    = $result1[0]['surname']; 
       $othname    = $result1[0]['othname']; 
       $insured    = $result1[0]['insured']; 
       $contactname = $result1[0]['contactname']; 
       $address1    = $result1[0]['address1'];  
        $address2   = $result1[0]['address2'];
       $country     = $result1[0]['country']; 
       $state       = $result1[0]['state']; 
       $cemail      = $result1[0]['cemail']; 
       $cgsm        = $result1[0]['cgsm']; 
       $userid      = $result1[0]['userid']; 
       
       $itemlist    = array();
       
       $itemlist['surname']         = isset($request['surname']) ? $request['surname'] : "";
       $itemlist['othname']         = isset($request['othname']) ? $request['othname'] : "";
       $itemlist['clientno']        = $clientlink;
       $itemlist['insured']         = isset($request['insured']) ? $request['insured'] : "";
       $itemlist['contactname']     = isset($request['contactname']) ? $request['contactname'] : "";
       $itemlist['address1']        = isset($request['address1']) ? $request['address1'] : "";
       $itemlist['address2']        = isset($request['address2']) ? $request['address2'] : "";
       $itemlist['country']         = isset($request['country']) ? $request['country'] : "";
       $itemlist['state']           = isset($request['state']) ? $request['state'] : "";
       $itemlist['contactcls']      = isset($request['contactcls']) ? $request['contactcls'] : "";
       $itemlist['email']           = isset($request['cemail']) ? $request['cemail'] : "";
       $itemlist['lphome']          = isset($request['lphome']) ? $request['lphome']  : "";
       $itemlist['gsm']             = isset($request['cgsm']) ? $request['cgsm'] : "";
       $itemlist['countcode']       = isset($request['countcode']) ? $request['countcode'] : "";
       $itemlist['website']         = isset($request['website']) ? $request['website'] : "";;
       $itemlist['dd_status']       = isset($request['dd_status']) ? $request['dd_status'] : "";
       $datedob1                    = substr($request['regdate'],0,4);
       $datedob2                    = substr($request['regdate'],5,2);
       $datedob3                    = substr($request['regdate'],8,11);
       $newDate                     = $datedob1 . "-" . $datedob2 . "-" . $datedob3;
       $itemlist['regdate']         = $newDate;
       $itemlist['title']           = isset($request['title']) ? $request['title'] : "";
       $itemlist['lfax']            = isset($request['lfax']) ? $request['lfax'] : "";
       $itemlist['bsource']         = isset($request['bsource']) ? $request['bsource'] : "";
       $itemlist['assignee']        = isset($request['assignee']) ? $request['assignee'] : "";
       $itemlist['dd_gender']       = isset($request['dd_gender']) ? $request['dd_gender'] : "";
       $itemlist['placeofbirth']    = isset($request['placeofbirth']) ? $request['placeofbirth'] : "";
       $itemlist['dd_mstatus']      = isset($request['dd_mstatus']) ? $request['dd_mstatus'] : "";
       $itemlist['mother_maidname'] = isset($request['mother_maidname']) ? $request['mother_maidname'] : "";
       $itemlist['empname']         = isset($request['empname']) ? $request['empname'] : "";
       $itemlist['off_address1']    = isset($request['off_address1']) ? $request['off_address1'] : "";
       $itemlist['off_address2']    = isset($request['off_address2']) ? $request['off_address2'] : "";
       $itemlist['per_address1']    = isset($request['per_address1']) ? $request['per_address1'] : "";
       $itemlist['per_address2']    = isset($request['per_address2']) ? $request['per_address2'] : "";
       $itemlist['dd_commad']       = isset($request['dd_commad']) ? $request['dd_commad'] : "";
       $itemlist['emp_phone']       = isset($request['emp_phone']) ? $request['emp_phone'] : "";
       $itemlist['dd_iddocno']      = isset($request['dd_iddocno']) ? $request['dd_iddocno'] : "";
       $itemlist['idno']            = isset($request['idno']) ? $request['idno'] : "";
       $itemlist['dd_state_lga']    = isset($request['dd_state_lga']) ? $request['dd_state_lga'] : ""; 
       
       // dbgarr("itemlist",$itemlist);       
       $saveClient = saveClient($itemlist);
       if($saveClient){
        $iesdb_new->qupd(" update nlfclients set userid = '$userid' where (clientno='$clientlink')"); 
        $return['status']    = 1;
        $return['message']   = "User Updated successfully";
        
       } 
      }else{
        
        $return['status']    = 0;
        $return['message']   = "Details not Updated. Please provide clientcode";
     }
   }
    else if ($op_mode == "EBCreatePolicy") {
        
        $itemlist['clientcode']         = isset($request['clientcode']) ? $request['clientcode'] : "";
        $clientname =  $uaccess01->getRecs("", "clientcode ='{$itemlist['clientcode']}' ", "csurname,cothname");  
        if($clientname){
            $othname   = $clientname[0]['cothname'];
            $csurname = $clientname[0]['csurname'];
            $fullName = $csurname. " " . $othname;
        }
        
        
       $itemlist['polnum']             = isset($request['polnum']) ? $request['polnum'] : ""; 
       $itemlist['clientname']         = $fullName; //isset($request['clientname']) ? $request['clientname'] : "";
       $itemlist['polclass']           = 1; //isset($request['polclass']) ? $request['polclass'] : "";
       $itemlist['polagency']          = "BR-00966"; //isset($request['polagency']) ? $request['polagency'] : "";
       $itemlist['risktype']           = isset($request['risktype']) ? $request['risktype'] : ""; //"022-01"; 
       $itemlist['bsntype']            = isset($request['bsntype']) ? $request['bsntype'] : ""; //"022-01"; 
       $itemlist['issuedate']          = date('Y-m-d');//isset($request['issuedate']) ? $request['issuedate'] : "";
       $itemlist['entdate']            = date('Y-m-d');//isset($request['entdate']) ? $request['entdate'] : "";
       $itemlist['prdterm']            = '365'; //isset($request['prdterm']) ? $request['prdterm'] : "365";
       $itemlist['effdate']            = isset($request['effdate']) ? $request['effdate'] : "";
       $date = new DateTime($itemlist['effdate']);
       $date->modify('+365 day');
       $itemlist['enddate']            =  $date->format('Y-m-d');
       $itemlist['cshare']             = 100;//isset($request['cshare']) ? $request['cshare'] : "100";
       $itemlist['polstatus']          = 0;//isset($request['polstatus']) ? $request['polstatus'] : "";
       $itemlist['pgroup']             = "SP";//isset($request['pgroup']) ? $request['pgroup'] : "SP";
       $itemlist['branch']             = "10003";//isset($request['branch']) ? $request['branch'] : "";
       $itemlist['prdhour']            = isset($request['prdhour']) ? $request['prdhour'] : "";
       $itemlist['prdminute']          = isset($request['prdminute']) ? $request['prdminute'] : "";
       $itemlist['enforcestaval']      = isset($request['enforcestaval']) ? $request['enforcestaval'] : "";
       $itemlist['compcode']           = isset($request['compcode']) ? $request['compcode'] : ""; 
       $itemlist['polloc']             = isset($request['polloc']) ? $request['polloc'] : "";
       $itemlist['geocover']           = isset($request['geocover']) ? $request['geocover'] : "";
       $itemlist['fac_inward']         = isset($request['fac_inward']) ? $request['fac_inward'] : "";
       $itemlist['dd_ocpexp']          = isset($request['dd_ocpexp']) ? $request['dd_ocpexp'] : "";
       $itemlist['faccom']             = isset($request['faccom']) ? $request['faccom'] : "";
       $itemlist['reference_num']      = isset($request['reference_num']) ? $request['reference_num'] : "";
       $itemlist['dd_clo']             = "2356R";//isset($request['dd_clo']) ? $request['dd_clo'] : "HR00501/17";
       $itemlist['facprop']            = isset($request['facprop']) ? $request['facprop'] : "";
       $itemlist['mplper']             = isset($request['mplper']) ? $request['mplper'] : "100";
       $itemlist['fx_curr']            = isset($request['fx_curr']) ? $request['fx_curr'] : "";
       $itemlist['dd_mktgroup']        = isset($request['dd_mktgroup']) ? $request['dd_mktgroup'] : "";
       $itemlist['period']             = isset($request['period']) ? $request['period'] : "";
       $suminsure                      = $request['suminsure'];
       $engino                         = $request['engine_number'];
       $suminsured                     = $request['suminsure'];
       $regnum                         = $request['registration_number'];
       $covertype                      = $request['covertype'];
       // 1190029130
       $itemlist['Amp_flag']           = "Amp_flag";
       $_SESSION['savpolnum'] = "";
      // dbgarr("request",$request);
      if($covertype=="") return $return['message'] = "Covertype can't be blank...";
      
       $engin_exist       = $motoritems->getRecs("", "(itemcode ='$regnum')", "itemcode");
       
       if(!empty($engin_exist)){
        return $return['message'] = "Vehicle Registration Number Already Exist...";
        //return "";
       }
     
      if($itemlist['clientcode'] == "") return $return['message'] = "Cliencode code is empty supply...";
      
      if($itemlist['risktype'] == "") return $return['message']   = "Risk type is empty supply...";
     
       $itemrow = savepolicydet($itemlist);
       
       if ($itemrow){
        
         $rate_divider = 1;  
         $giarr ='';
         $giarr = getgenitems('21',$itemlist['risktype'],''); //$giarr = getgenitems('1',$fv_cls,'');
         //dbgarr("giarr ...",$giarr);
         
         if ($giarr != "") {
          $rate_divider = $giarr[0]['value3']; //$giarr[0]['sub'];
         }
         $fv_prmrate     = "10.0000000000"; 
         $certype        = "WAZ301";
         $ratecl         = "10999";
         
        /* else if( $itemlist['risktype']=="01075"){
            $fv_prmrate     = "0.0000000000";
            $certype        = "WAX1"; 
            $fv_anulprem    = $request['premuim'];
            //$covertype      = "13000";
            $ratecl         = "";
            if($fv_anulprem != 5000){
            $return['status']   = 0;
            $return['message']   = "Premuim is greater or Less than the maxium of $fv_anulprem for Third Party..."; 
         }
         }*/
        
         //1180028528
         if (($rate_divider == 0) || ($rate_divider == "")) $rate_divider = 1;
         
          if ($rate_divider < 1) $rate_divider = 1;
          if ($fv_prmrate > 0) {
           $fv_anulprem = $suminsured * ($fv_prmrate / ($rate_divider * 100));
          }
        
        if($covertype == "13000")$fv_anulprem    = "5000";
        
         //echo "fv_prmrate==$fv_prmrate,covertype==$covertype,certype==$certype,ratecl==$ratecl,fv_anulprem==$fv_anulprem<br />";
         
        $poln = $_SESSION['savpolnum'];
        
        $ovars['bsntype']  = $itemlist['bsntype'];
        $ovars['dd_mode']  = "00001";
        $ovars['extamt']   = 0;
        $ovars['dscamt']   = 0;
        $ovars['covertype']= $covertype;//covertype
        $ovars['risktype'] = $itemlist['risktype'];
        $ovars['ratecls']  = $ratecl;
        $clientcode        = $itemlist['clientcode'];
        $ovars['clientcode'] = $clientcode;
        $vehicle_type        = $request['vehicle_type'];
        $ovars['regnum']     = $regnum;
        $ovars['regnum2']    = $regnum;            
        $ovars['entdate']    = date("Y-m-d");
        $ovars['anulprem']   = $fv_anulprem;
        $ovars['curprem']    = $fv_anulprem;
        $ovars['chassis']    = (isset($request['chassis']) && $request['chassis'] !="")? $request['chassis']:"";
        $ovars['engnum']     = $engino;
        $ovars['vehtype']    = $vehicle_type;
        $ovars['itemcolor']  = $request['colour'];
        $ovars['model']      = $request['vehicle_model'];
        $ovars['makeyear']   = $request['vehicle_year'];
        $ovars['itemdesc1']  = sprintf('%s|%s',$vehicle_type,$regnum);             
        $ovars['dd_certtype']= $certype;
        $ovars['ccap']       = '';   
        $ovars['dd_cctype']  = '';     
        $ovars['seatsdrv']   = '';  
        $ovars['dd_fleetnum']= '';
        $ovars['loadcap']    = '';
        $ovars['inspdate']   = '';
        $ovars['item_strdate'] = $itemlist['effdate']; 
        $ovars['item_enddate'] = $itemlist['enddate'];
        $ovars['status']     = '';
        $ovars['dd_enginetype']  = '';
        $ovars['dd_vessel_age']  = '';
        $ovars['excess_perc']    = '';
        $ovars['passport_num']   = '';
        $ovars['noofh']          = '';
        $ovars['normalmortalf']  = '';            
        $ovars['itmgroup'] = '';
        $ovars['prmrate']  = $fv_prmrate;
        $ovars['prodays']  = '';
        $ovars['dd_lclmdate'] = '';
        $ovars['itemcode2']   = '';                        
        $ovars['coymode']  = '';
        $ovars['gitfrom']  = '';
        $ovars['gitfrom']  = '';
        //cctype
       // dbgarr("ovars",$ovars);
        $savres = saveitemdet($poln,$itemlist['polclass'],$ovars);
       // echo "savres==$savres";
          if($savres){
            $iesdb_new->qupd(" update nlfpolmain set mobapp_code = 'MOBAPP',sumass = '$suminsured',fapremium='$fv_anulprem',curprem = '$fv_anulprem' where (polnum='$poln')");
            $iesdb_new->qupd(" update motoritems set sumass = '$suminsured' where (polnum='$poln')");
             //echo "poln==$poln";
            $return['message']   = "Policy details Created Successfully";
            $return['status']    = 1;
            $return['polnum']    = $poln;
            $return['premium']   = $fv_anulprem;  
          }else{
            $return['status']    = 0;
            $return['message']   = "Item not saved"; 
          }
           }else {
            $return['status']   = 0;
            $return['message']   = "Policy Details Not Created";
           } 
       // }
           
     }
     
     else if ($op_mode == "EBUpdatePolicy") {
        
       
       $polnum              = isset($request['polnum']) ? $request['polnum'] : ""; 
       
       $suminsure           = isset($request['suminsure']) ? $request['suminsure'] : ""; 
       
       $registration_number           = isset($request['registration_number']) ? $request['registration_number'] : "";
       
       
       if($polnum =="") return $return['message'] = "Policy Number can't be blanked...";
       
        $qry1 = "SELECT * FROM  motoritems WHERE (polnum ='$polnum') ";
         
        $urec = $iesdb_new->qsel($qry1,'A');
        
        $qry0 = "SELECT * FROM  nlfpolmain WHERE (polnum ='$polnum') ";
         
        $urecs = $iesdb_new->qsel($qry0,'A');
        
        $covertype = $urec[0]['covertype'];
        
        if ($covertype == "11000")if($suminsure =="" ) return $return['message'] = "Sum Insured can't be blanked for Comprehensive Motor...";
       
       // 13000
       
       if($urec !="" && $urecs !=""){
         
         $risktype         = $urecs[0]['risktype'];
         $rate_divider = 1;  
         $giarr ='';
                  
         $giarr = getgenitems('21',$risktype,''); //$giarr = getgenitems('1',$fv_cls,'');
                           
         //dbgarr("giarr ...",$giarr);
         
         if ($giarr != "") {
          $rate_divider = $giarr[0]['value3']; //$giarr[0]['sub'];
         }
         $fv_prmrate     = "10.0000000000"; 
         $certype        = "WAZ301";
         $ratecl         = "10999";
         
         
         if (($rate_divider == 0) || ($rate_divider == "")) $rate_divider = 1;
         
          if ($rate_divider < 1) $rate_divider = 1;
          if ($fv_prmrate > 0) {
           $fv_anulprem = $suminsure * ($fv_prmrate / ($rate_divider * 100));
          }
        
        if($covertype == "13000")$fv_anulprem    = "5000";
        
         if($registration_number == "") $registration_number  =  $urec[0]['itemcode'];
         
          $saverec['polnum']    = $urec[0]['polnum'];
          if($covertype == "13000")$saverec['sumass']    = $fv_anulprem;
          else $saverec['sumass']    = $suminsure;
          $saverec['fapremium']      = $fv_anulprem;
          $saverec['curprem']        = $fv_anulprem;
          $saverec['itemcode']       = $registration_number;
          $itemlist['polnum']             = $urecs[0]['polnum'];
          $itemlist['clientcode']         = $urecs[0]['clientcode'];
          if($covertype == "13000") $itemlist['sumass']             = $fv_anulprem;
          else $itemlist['sumass']             = $suminsure;
          $itemlist['fapremium']          = $fv_anulprem;
          $itemlist['curprem']            = $fv_anulprem;
          $itemlist['curprem']            = $fv_anulprem;
          
          $itemrow = $nlfpolmain->saveRec($itemlist);
          
          $savres  = $motoritems->saveRec($saverec);
                    
          if($savres){
                        
            $return['message']   = "Policy details Updated Successfully";
            $return['status']    = 1;
            $return['polnum']    = $polnum;
            $return['premium']   = $fv_anulprem;  
                        
          }else{
            $return['status']    = 0;
            $return['message']   = "Item not saved"; 
          }
          }else {
            $return['status']   = 0;
            $return['message']   = "Policy Details can't be Found";
           } 
       }
     
   else if ($op_mode == "EBNotification") {
    
        $fv_polnum = "";
        if (isset($request['polnum'])) {
            $fv_polnum=(trim($request['polnum']));
        }
        
        $fv_transactionAmount = "";
        if (isset($request['transactionAmount'])) {
           $fv_transactionAmount =(trim($request['transactionAmount']));
        }
        
        $fv_transactionId = "";
        if (isset($request['transactionId'])) {
           $fv_transactionId =(trim($request['transactionId']));
           
           }
           
           $fv_transactionDate = "";
        if (isset($request['transactionDate'])) {
           $fv_transactionDate =(trim($request['transactionDate']));
           }
           
            $fv_trans_response = "";
        if (isset($request['trans_response'])) {
           $fv_trans_response =(trim($request['trans_response']));
           }
           
          // dbgarr("request",$request);
           
        $mobile_log	    = new Dbtable($iesdb_new,'mobile_log');
                    
        $mob_log['polnum']           = $fv_polnum;
        $mob_log['transactionAmount']= $fv_transactionAmount;
        $mob_log['transactionId']    = $fv_transactionId;
        $mob_log['transactionDate']  = $fv_transactionDate;
        $mob_log['trans_response']   = $fv_trans_response;
        $mob_log['source']           = "MOBILE";
        
        $savres	= $mobile_log->saveRec($mob_log);
        //die;
       $polrec       = $nlfpolmain->getRecs("", "((polnum ='$fv_polnum') and (mobapp_code = 'MOBAPP'))", "polnum,clientcode,polclass,risktype,agency,branch,insured,cshare,bsntype,enddate,effdate,bsntype,mobapp_code");
   // echo $nlfpolmain->get_query();
    if($polrec){
        
       $polrecdet    = $polrec[0]['polnum'];
       $clientrecdet = $polrec[0]['clientcode'];
       $risktype     = $polrec[0]['risktype'];
       $polclass     = $polrec[0]['polclass'];
       $agency       = $polrec[0]['agency'];
       $branch       = $polrec[0]['branch'];
       $insured      = $polrec[0]['insured'];
       $cshare       = $polrec[0]['cshare'];
       $bsntype      = $polrec[0]['bsntype'];
       $effdate      = $polrec[0]['effdate'];
       $enddate      = $polrec[0]['enddate'];
       $mobapp_code  = $polrec[0]['mobapp_code'];
       $bsntype      = $polrec[0]['bsntype'];
       
       $iesdb_new->qupd(" update nlfpolmain set curprem = '$fv_transactionAmount', fapremium = '$fv_transactionAmount', ri_approval='Y' where (polnum='$polrecdet')"); 
        
       if(($polrecdet) && ($mobapp_code == "MOBAPP")){
       
        $iesdb_new->qupd(" update motoritems set clientcode = '$clientrecdet', anulprem = '$fv_transactionAmount', curprem = '$fv_transactionAmount' where (polnum='$polrecdet')"); 
        
        $cprdarr = get_acctprd("NLIFE");;
        
        $comm    = get_comdet('P',$risktype,''); //
        $trndet['agency']  = $agency;
        $trndet['trntyp']  = "";
        $trndet['polnum']  = $polrecdet;
        $trndet['trnamt']  = $fv_transactionAmount;
        //$trndet['itemcode']= $fv_itemcode;
        $trndet['trndate'] = date('Y-m-d');//$effdate;
        $trndet['efcdate'] = $effdate;
        $trndet['trnnar']  = 'PREMIUM PAID ON ['.$polrecdet.']['.$effdate.']';
       
        $trndet['polcls']  = $polclass;
        $trndet['sumass']  = $fv_transactionAmount; // get this information from the nlfpolmain    
        $trndet['cshare']  = $cshare;
        $trndet['curprd']  = $cprdarr['period'];
        $trndet['rsktyp']  = $risktype;
        $trndet['branch']  = $branch;
        $trndet['client']  = $clientrecdet;
        $trndet['polgrp']  = "SP";
        $trndet['trncode'] = "0020";
        $trndet['prdto']   = explode(':',$cprdarr['period'])[0];
        $trndet['prdfrom'] = explode(':',$cprdarr['period'])[1];
        $trndet['refdcnumb'] = '';
        $trndet['dcnumb']    = '';
        $trndet['trnserial'] = '';
        $trndet['comrate']  = $comm[0]['comrate'];
        $trndet['comms']    = ($fv_transactionAmount / 100)  * $comm[0]['comrate'];
        $trndet['trnnet']   =  $fv_transactionAmount- $trndet['comms'];  
        
        $ret =  post_dctrans($trndet,false,true);
        
        if($ret){
            //echo "1";
            $dcnumb = $ret['dcnumb'];
            $ovars2['PaymentLogId']           = $polrecdet;
            $ovars2['CustReference']          = $polrecdet;
            $ovars2['PaymentStatus']          ="SUCCESSFUL";
            $ovars2['PaymentReference']       = '';
            $ovars2['PaymentDate']            = date('Y-m-d');
            $ovars2['efcdate']                = date('Y-m-d');
            $ovars2['DepositSlipNumber']      = "";
            $ovars2['ItemCode']               = "1100";
            $ovars2['xml']                    = "";
            $ovars2['LeadBankCode']           = "B00129";
            //add some client specific variables
            $ovars2['ipmode']   = '00002'; //
            $ovars2['coscen']   = '00002'; //
            $ovars2['errorlog'] = '';
            $ovars2['onlinepay']= 'M'; // restricted to amplifier
            $ovars2['Amount']   = $fv_transactionAmount;
            $save_flag = false;
            $post_flag = false;
            $ovars2['policydefault'] = false;           
            $_SESSION['g_override_duplicate_teller'] = true;
            $_SESSION['g_receipt_already_posted']    = false;
            //
            $automatic_rp = new Automatic_receipt_posting();   
            $automatic_rp->refnum = '';
            $automatic_rp->transid = '';
            
            $ref_var  = $automatic_rp->init($ovars2);
            
            $ref_var['idocnum'] = $dcnumb;
            
            //echo "ref_var['idocnum']=={$ref_var['idocnum']}";
            
            $ref_var['insured'] = $insured;
            
            if (isset($automatic_rp->refnum)){
                
                $save_flag  = $automatic_rp->saveReceipt($ref_var);//save the receipt
                
                $_SESSION['g_receipt_already_posted'] = false;
                
                $post_flag = $automatic_rp->postReceipts($ref_var); 
                
                if (($post_flag) || ($_SESSION['g_receipt_already_posted'] == true) || ($save_flag == true)) {
                    
                    $mob_log['polnum']           = $fv_polnum;
                    $mob_log['transactionAmount']= $fv_transactionAmount;
                    $mob_log['transactionId']    = $fv_transactionId;
                    $mob_log['transactionDate']  = $fv_transactionDate;
                    $mob_log['trans_response']   = 'Successful';
                    $mob_log['source']           = "MOBILE";
        
                    $savres	= $mobile_log->saveRec($mob_log);
                    
                    $return['status']        = 1; 
                    $return['transactionID'] = $fv_transactionId; 
                    $return['amountPaid'] = $fv_transactionAmount;
                    $return['message']   = "Thank you payment Records successful..."; 
                
                  }
                  else{
                    $return['status']   = 0; 
                    $return['message']   = "Sorry Payment Item has not been saved..."; 
                }
            }
        }
            
        }else{
         $return['message']   = "{Status: 0,} Please Your Policy does not match the one in database or this policy Number is not from Amplify website designer try again...";
       } 
        
       }
       else{
        $return['status']        = 0;
        $return['message']       = "Please we do not have this Policy number in our database...";
       }
     }
     
     else if ($op_mode == "EBReportClaim"){
        
        $view_doccode = false;
        
       $disable_channel = $system_module === 'ECOMM' ? 'disabled' : '';
       $fv_channel =  !empty($disable_channel) ? '00001' : "";
       $fv_channel =  "";
        if (isset($request['channel'])) {
            $fv_channel = (trim($request['channel']));
        }
        $fv_csurname = "";
        if (isset($request['csurname'])) {
            $fv_csurname = (trim($request['csurname']));
        }
        
         //$cltcode = "";
        //if (isset($request['clientno'])) {
            //$cltcode= (trim($request['clientno']));
        //}
        if (($fv_csurname == "") && ($t_uname != "")) {
            $fv_csurname = $t_uname;
        }
         $fv_polnum = "";
        if (isset($request['dd_polnum'])) {
            $fv_polnum = (trim($request['dd_polnum']));
        }
        
        $fv_message = "";
        if (isset($request['txt_message'])) {
            $fv_message = (trim($request['txt_message']));
        }
        
        $fv_liabtype = "";
        if (isset($request['dd_liabtype'])) {
            $fv_liabtype = (trim($request['dd_liabtype']));
        }
       
        $request['dd_comptype']    = "";
        $request['requestid']    = "";
        $request['dd_subjectm']    = "";
        $request['cb_manage']      = "";
        $request['cb_staff']       = "";
        $request['cb_agency']      = "";
        $request['cb_client']      = "";
        $request['requesttype']    = "CLM0";
        $request['cothname']       = "";
        $request['ccompany']       = "";
        $request['cemail']         = "null";
        $request['cgsm']           = "null";
        $request['polnum']         = $request['dd_polnum'];
        $request['raised_by']      = $fv_csurname;
        $request['source']         = "ECOMM";
        
        
        //if (empty($_FILES)) {
         //$_FILES =   $request['_FILES'];  
        //}
        
        //dbgarr("_REQUEST....",$request);
        
        
        $file_names = $request['doclocate'];
        dbgarr("file_names....",$file_names);
        
        dbgarr("request",$request);
        
        if(empty($file_names)){
        
        $return['message']   = "You must enter File Name";
        }else{
            
        foreach ($file_names as $key =>$filename) {
          /*$mime_type 	        = $_FILES['doclocate']['type'][$key];
          $uplarr['filename'] 	= $_FILES['doclocate']['tmp_name'][$key]; 		
          $uplarr['filesize'] 	= $_FILES['doclocate']['size'][$key];
          $uplarr['filetype'] 	= $mime_type;
          $uplarr['fname']    	= $_FILES['doclocate']['name'][$key];*/
          
          $uplarr['filebinary']         = $filename['filebinary'];
          $uplarr['filename']           = $filename['filename'];
          $uplarr['api_file_upload']    = true;
          $uplarr['doccode']	        = '';  
          $uplarr['dockey']	            = 'POL';
          $uplarr['dockeyval']	        = $request['dd_polnum'];
          $uplarr['docdesc']	        = "Client Reported Claim Document";  
          $uplarr['act']		        = "upload"; 
          $uplarr['accesslev']          = 1; 
          $uplarr['docclass'] 	        = "CERT"; 
          $uplarr['phylocate']          = "NONE";
          $uplarr['docgroup']           = "CLM";       
          //
         // dbgarr("uplarr",$uplarr);
          $docMgr	             	    = new Gen_docmanager_api(2, true); 
          $view_doccode			        = $docMgr->uploadDoc($uplarr);
         }
        }
        
        //echo "view_doccode".$view_doccode;
       // dbgarr("...file_names...",$file_names);
            
        if(!empty($view_doccode)){
              $cliaimres = saverepclaim($request);
           
           if (!empty($cliaimres)) {
            //echo "I am here";
            $res = save_visdetails($request);
            
            if ($res) {
            $return['message']   = "{Status: 1,} You have reported your Claim Successfully"; 
            }
            else {
             $return['message']   = "{Status: 0,}Your claim report was not successful";
            }
            }
            }else{
                
              $return['message']   = "{Status: 0,}Your claim report was not successful";  
            }
     }
   else if ($op_mode == "EBCreateClaim"){
    
    $fv_polnum = "";  
    if (isset($request['polnum'])) {
        $fv_polnum = (trim($request['polnum']));
    }  
    $fv_polnum = trim($fv_polnum);
    
    $fv_claimant = ""; 
    if (isset($request['claimant'])) {
        $fv_claimant = (trim($request['claimant']));
    } 
    $fv_narr = ""; 
    if (isset($request['narr'])) {
        $fv_narr = (trim($request['narr']));
    } 
    $fv_narr2 = ""; 
    if (isset($request['narr2'])) {
        $fv_narr2 = (trim($request['narr2']));
    }
    
    $fv_itemnum = ""; 
    if (isset($request['dd_politem'])) {
        $fv_itemnum = (trim($request['dd_politem']));
    }  
    
    $fv_clmdate = ""; 
    if (isset($request['clmdate'])) {
        $fv_clmdate = (trim($request['clmdate']));
    } 
    
    $fv_lossdate = ""; 
    if (isset($request['lossdate'])) {
        $fv_lossdate = (trim($request['lossdate']));
    }  
    $fv_lhour = ""; 
    if (isset($request['dd_lhour'])) {
        $fv_lhour = (trim($request['dd_lhour']));
    }  
    $fv_lminute = ""; 
    if (isset($request['dd_lminute'])) {
        $fv_lminute = (trim($request['dd_lminute']));
    }  
    
    $fv_insprdstr = ""; 
    if (isset($request['dd_insprdstr'])) {
        $fv_insprdstr = (trim($request['dd_insprdstr']));
    }  
    $fv_insprdend = ""; 
    if (isset($request['dd_insprdend'])) {
        $fv_insprdend = (trim($request['dd_insprdend']));
    }  
    
    $fv_clmsta = "Pending"; 
    if (isset($request['dd_clmsta'])) {
        $fv_clmsta = (trim($request['dd_clmsta']));
    }      
    
    $fv_itemnum = ""; 
    if (isset($request['dd_politems'])) {
        $fv_itemnum = (trim($request['dd_politems']));
    }             
    
    $lastclmnum = ""; 
    if (isset($request['lastclmnum'])) {
        $lastclmnum = (trim($request['lastclmnum']));
    }             
    
    $insmode = ""; 
    if (isset($request['insmode'])) {
        $insmode = (trim($request['insmode']));
    }
    
    $fv_clmshare = 0; 
    if (isset($request['clmshare'])) {
        $fv_clmshare = (trim($request['clmshare']));
    }                          
    $fv_undprop = $fv_clmshare; 
    
    $fv_cause = ""; 
    if (isset($request['dd_cause'])) {
        $fv_cause = (trim($request['dd_cause']));
    } 
    
    $fv_paidprop = 0; 
    if (isset($request['paidprop'])) {
        $fv_paidprop = (trim($request['paidprop']));
    }
    if ($fv_paidprop > 100) $fv_paidprop = 100;
    //             
    $fv_coinslist = "";
    if (isset($request['dd_coinslist'])) {
        $fv_coinslist = (trim($request['dd_coinslist']));
    }             
    $fv_coiprop = 0;
    if (isset($request['coiprop'])) {
        $fv_coiprop = (trim($request['coiprop']));
    }
    ////
    
    $fv_ladjust_note = "";
    if (isset($request['ladjust_note'])) {
        $fv_ladjust_note = (trim($request['ladjust_note']));
    }                          
    
    ////
    $fv_salvageindi = "";
    if (isset($request['dd_salvageindi'])) {
        $fv_salvageindi = (trim($request['dd_salvageindi']));
    }             
    $fv_salvageval = 0;
    if (isset($request['salvageval'])) {
        $fv_salvageval = (trim($request['salvageval']));
    } 
            
           //$sres = update_clmreported($request);
            if ($fv_polnum != ""){
            $poldet = getpolicydet($fv_polnum);  
            if ($poldet == "") {
                //
            }
            else {
                $fv_insured = $poldet[0]['insured']; 
                $polcls     = $poldet[0]['polcls'];
                $issuedate  = $poldet[0]['issuedate'];
                $effdate    = $poldet[0]['effdate'];
                $agency     = $poldet[0]['polagency'];    
                $clientcode = $poldet[0]['clientcode'];    
                $risktype   = $poldet[0]['risktype'];    
                $bsntype    = $poldet[0]['bsntype'];    
                $branch     = $poldet[0]['branch'];    
                $polexists  = true;
                $polsta     = $poldet[0]['polstatus'];    
                
                if (($fv_insprdstr == "NONE") || ($fv_insprdstr == "")) {
                    $fv_insprdstr = $poldet[0]['effdate'];
                }
                if (($fv_insprdend == "NONE") || ($fv_insprdend == "")) {
                    $fv_insprdend = $poldet[0]['enddate'];
                }  
                
                //CO-INS
                if ($fv_clmshare == 0) $fv_clmshare = $poldet[0]['cshare'];
                $fv_undprop = $fv_clmshare; 
                //if ($fv_undprop == 0)  $fv_undprop = $poldet[0]['cshare'];    
                if ($fv_paidprop == 0) $fv_paidprop = $fv_undprop;
                if ($fv_paidprop != $fv_undprop) $fv_paidprop = 100;     
                
                if ($fv_prdhour == "") {
                    $fv_prdhour = $poldet[0]['prdhour'];
                }
                if ($fv_prdminute == "") {
                    $fv_prdminute = $poldet[0]['prdminute'];
                }    
                
                $_SESSION['ascdesc']   = "";
                $_SESSION['nodeleted'] = "yes";
                $schlist               = getpolitems($fv_polnum,$polcls,0,"","open");
                if ($schlist != "") { 
                    $lcnt = count($schlist);
                    if ($lcnt > 1) {
                        $schlist[$lcnt]['itemcode'] = "MULTI";
                        $schlist[$lcnt]['codedesc'] = "Multiple Items";
                    }
                    if (($fv_itemnum != "") && ($fv_itemnum != "NONE")) {       
                        for ($xi=0;$xi<count($schlist);$xi++) { 
                            if ($schlist[$xi]['itemcode'] == $fv_itemnum) {
                                if ($schlist[$xi]['entdate'] > $fv_insprdstr) {
                                    $fv_insprdstr = $poldet[0]['effdate'];
                                } 
                                break;
                            }
                        }         
                    }
                }  
            }  
        
        $request['insured']      = $fv_insured;
        $request['polcls']       = $polcls;
        $request['issuedate']    = $issuedate;
        $request['effdate']      = $effdate;
        $request['agency']       = $agency;    
        $request['clientcode']   = $clientcode;    
        $request['risktype']     = $risktype;    
        $request['bsntype']      = $bsntype;    
        $request['branch']       = $branch;    
        $request['regdate']      = $regdate;    
        $request['prdhour']      = $fv_prdhour;    
        $request['prdminute']    = $fv_prdminute;   
        $request['clmshare']     = $fv_clmshare;
        $request['paidprop']     = $fv_paidprop;  
        $request['undprop']      = $fv_undprop; 
        $request['ladjust_note'] = $fv_ladjust_note; 
        $request['salvageindi']  = $fv_salvageindi;  
        $request['salvageval']   = $fv_salvageval;
        $request['dd_insprdstr']   = $fv_insprdstr;
        $request['dd_insprdend']   = $fv_insprdend;
        $_SESSION['preventduplicate'] = "";  
        $sres = save_clmdet($request);
        
     if ($sres == "") {
       $fv_messagehold = $_SESSION['curerror'];
       $return['status']        = 0;
       $return['message'] = $fv_messagehold;
      }
      else { //Send SMS To Claim Officer  dd_creplist
        $fv_clmnum = $_SESSION['curclaimnum'];  
       // echo "fv_clmnum==$fv_clmnum";
        $return['status']        = 1;
        $return['claimNumber']   = $fv_clmnum; 
        $return['message']       = "Claim Created Successfully";
       }
      }else{
        $return['status']        = 0;
        $return['message']       = "Please you cannot Register Claim unless you have Policy number, Supply your Policy number...";
      }
      }
      
      else if ($op_mode == "EBGenerateCert") {
        
         if (isset($request['polnum'])) {
          $fv_polnum=(trim($request['polnum']));
         }
         $fv_polnum = "";
         if (isset($request['op'])) { 
          $temp = explode("^",$request['op']);
          $fv_polnum = $temp[0];
          if (isset($temp[1])) $fv_insured = $temp[1];
         }
         if (isset($request['polnum'])) {
          $fv_polnum=(trim($request['polnum'])); 
         }
        $fv_itemcode       = $motoritems->getRecs("", "(polnum ='$fv_polnum')", "itemcode");
        
        $itemcode  = $fv_itemcode[0]['itemcode'];
        $fv_doctype = "CERT";
         $resarr = generate_pdocvals($fv_polnum,$itemcode,'',$fv_doctype,'','','');
          
          if ($resarr != "") {
           //$fv_period   = $_SESSION['pdoccurprd'];
           $aud_action = $fv_doctype . " Generated " ;
           if ("" != $fv_polnum) $aud_action = $aud_action . ", For Policy $fv_polnum ";
           $aud_action = $aud_action . " ... For Period: ($fv_certprd) ";    
           $_SESSION['aud_control_okaytolog'] = 1;
           audit_prep(9,'100-04','RID',$aud_action,'',$fv_polnum,$fv_polnum,$itemcode,'','');
           
          $resar = get_pdoclist($fv_polnum,$itemcode,$fv_doctype,$fv_period);
            if ($resarr != "") {
               $fv_doccode  = $resar[0]['doccode'];
                //echo"fv_doccode==$fv_doccode";
               $fv_prdfrom  = $resar[0]['strdate'];
               $fv_prdto    = $resar[0]['enddate'];
              }
           
             
           $return['status']        = 1;
           //$return['claimNumber']   = $fv_clmnum; 
           $return['message']       = "Certificate Generated Successfully"; 	
           
          }
          else {
           $fv_messagehold = $_SESSION['curerror'];
           $return['status']        = 0;
           $return['message'] = $fv_messagehold;
          }
        }
        
   else if ($op_mode == "EBPolicyRenewal") {
    
    
    $polnum = ""; 
    if (isset($request['polnum'])) {
        $polnum = (trim($request['polnum']));
    }
    
    /*$api_startdate = ""; 
    if (isset($request['startdate'])) {
        $api_startdate = (trim($request['startdate']));
    } 
    
    $api_enddate = ""; 
    if (isset($request['enddate'])) {
        $api_enddate = (trim($request['enddate']));
    }*/ 
    
          
    //echo "In Policy endorsement .... <br> ";
    $special       = array(); //emptiness of this array will determine success or otherwise of the save routine
    /*$items_to_save = $_REQUEST['saveobj']; //['motoritems'] ['clientadd_item']//the reqobj class is not amenable treating arrays
    $doctype       = $items_to_save['endors_type'];
    $doccode       = $items_to_save['endors_type_code'];*/
    
   // $startdate       = $items_to_save['startdate'];
   // $enddate         = $items_to_save['enddate'];
    
    //the flag that determines whether to proceed or not
    $proceed_flag = true;
    $en_num       = '';
    
    //get the template
   /* $endors_type_det = get_endorsobj2('',"",$doccode,false);
    //echo $endors_type_det[0]['template'];
    if (!empty($endors_type_det)){
                
        $template = trim($endors_type_det[0]['template']); 
        if ($doctype == EndorsConstants::ENDORS_GENERAL) 
            $template = trim($items_to_save['general_endors']['general_endors_text']);//act differently if it is a general endorsement
             
                
                        
        //                        
        if (!empty($template)){

            //loggin stafff
            $staffid   = $_SESSION['g_loggedstaffid'];
            //interprete the staff
            $staff_tab = new Dbtable($iesdbhmrs,'hmrs_persdet');
            $staffrec  = $staff_tab->getRecs('',"staffid='$staffid'",'surname,othnames');
            //$staffrec  = get_staffrecs($staffid,'');
            $staffname = '';
            if (!empty($staffrec)) $staffname = $staffrec[0]['surname'].', '.$staffrec[0]['othnames'];
    
            //Company information   
            $company_name  = ""; 
            $compinfo  = getcoinfo(0);
            if ($compinfo != "") {
                $company_name = $compinfo['compname'];
            } 

            $today            = datedisplay(date('Y-m-d'));
                                    
            //special characters to deal with
            $special['$_policy_number']       = $polnum; 
            $special['$_staff_name']          = $staffname;
            $special['$_company_name']        = $company_name;
            $special['$_today']               = $today;
            $special['$_endorsement_date']    = datedisplay($endors_efcdate);
            $special['$_coinsurers_clause']   = '';
            
           
                                    
        }
        else{
            $ret_html    .= "The template for this endorsment type/policy doc. is empty. Please provide a template";
            $proceed_flag = false;
        }                            
    }
    else{
        $ret_html    .= "The storage that holds the template info is not accessible. Contact IT Department <br />";
        $proceed_flag = false;
    }
    
    //check for the emptiness of the doctype
    if (empty($doctype)){
        $ret_html    .= 'The endorsement type is not specified. Consult IT Department <br />';
        $proceed_flag = false;
    }*/
    
    //
    //if ($proceed_flag){
        
    //
    $iesdb              = init_iesdbs(); 
     
    if ($iesdb)  $poltab  = new Dbtable($iesdb,"nlfpolmain"); 
     $doctype =  ENDORS_MOTOR_RENEWAL;
        $curdate = date('Y-m-d');
        $cprdarr = get_acctprd('FINL'); 
        if ($cprdarr != "") {
            $efcdate   = $cprdarr['efcdate'];
            $curdate   = $efcdate; //TODO: this may not be necessary, so, remove
        }  
        
        
        $polrec = $poltab->getRecs('',"polnum='$polnum'",'clientcode, endorscnt, insured,   sumass, curprem,  enddate,
                                                          effdate,    risktype,  fapremium, cshare, polclass, fx_curr,
                                                          fx_rate,    prdterm,   polstatus,agency,bsntype,prdterm');
                                                          
        //retrieve the composite policy related details and making it behave like a normal policy                                                  
        $comrec   = $poltab->getRecs('',"(compcode='$polnum') AND (compcode != '')",'compcode');  
        if (!empty($comrec)){
            $polrec = $poltab->getRecs('',"compcode='$polnum'",'clientcode, endorscnt, insured,   sumass,   curprem,  enddate,  
                                                                effdate,    risktype,  fapremium, polclass, fx_curr, fx_rate,
                                                                cshare,     branch,    prdterm,   polstatus, polnum,agency,bsntype,prdterm'); //TODO: you have to write the cshare to the composite table
            //echo $poltab->get_query();
        }
        
        
        if(!empty($polrec)){
            $endorscnt      = $polrec[0]['endorscnt'];
            $insured        = $polrec[0]['insured'];
            $enddate        = $polrec[0]['enddate'];
            $efcdate        = $polrec[0]['effdate'];
            $fapremium      = $polrec[0]['fapremium'];
            $polcls         = $polrec[0]['polclass'];
            $cshare         = $polrec[0]['cshare'];
            $curprem        = $polrec[0]['curprem'];
            $sumass         = $polrec[0]['sumass'];
            $clientcode     = $polrec[0]['clientcode'];
            $risktype       = $polrec[0]['risktype'];
            $fx_rate        = $polrec[0]['fx_rate'];
            $fx_curr        = $polrec[0]['fx_curr'];
            $branch         = $polrec[0]['branch'];
            $prdterm        = $polrec[0]['prdterm'];
            $polstatus      = $polrec[0]['polstatus'];
            $polnum3        = $polrec[0]['polnum'];
            $agency         = $polrec[0]['agency'];
            $bsntype        = $polrec[0]['bsntype'];
            $prdterm        = $polrec[0]['prdterm'];
            
                 
            // 
        }else{
            $return['message'] = "Policy Info is inaccessible. Contact IT Department <br />"; 
            $return['status']  = 0;  
        }
        
        //$diff = abs(strtotime($api_enddate) - strtotime($api_startdate));

        //$terms   = floor(($diff)/(60*60*24));
        
       // echo "terms==$terms <br />";

        /*if(date('Y-m-d') != $enddate){
            
          $return['message'] = "This Policy is still active. Here is the end date $enddate<br />"; 
          $return['status']  = 0; 
            
        }
        else
        {*/
         
        $start_date = $enddate;
        
        $api_startdate = date('Y-m-d', strtotime($start_date . ' +1 day'));
        
        //if ($api_startdate == $enddate || $api_startdate >= $enddate) $api_startdate = $start_date; 
        
        $api_enddate = $api_startdate;
        
        $api_enddate = strtotime(date("Y-m-d", strtotime($api_enddate)) . " +12 month");
        
        $api_enddate = date("Y-m-d",$api_enddate);
        
       
        
        //echo "api_startdate== $api_startdate, api_enddate== $api_enddate<br />";
        //die;
        
        $endors_tab     = new Dbtable($iesdb,'lf_policyendors');
        $endors_det_tab = new Dbtable($iesdb,'lf_policyendors_det');
        $endors_rec     = $endors_tab->getRecs(''," polnum='$polnum' ", 'MAX(curr_endorscnt) AS curr_endorscnt ');
        $endorserial    = 100;
        if ( !empty( $endors_rec ) ) {
            $endorserial = $endors_rec[0]['curr_endorscnt'];  
        }
        
        //initialize the endorscnt to 100
           
        //increment the endorscnt
        $endorserial++;
                
        $endors_num	 = $polnum .'/'. substr($curdate,0,4) .'/'. $endorserial;
            
        $en_num  = $endors_num;
        
        $doccode = GetNextSIValue(0,100,6,'EF');  
        //
        $ovars['glob_client_id']= $glob_client_id;
        $ovars['polnum']        = $polnum;
        $ovars['insured']       = $insured;
        $ovars['staffid']       = "";
        $ovars['fapremium']     = $fapremium;
        $ovars['polcls']        = $polcls;
        $ovars['doctype']       = $doctype;
        $ovars['doccode']       = $doccode;
        $ovars['endors_efcdate']= $startdate;
        $ovars['sumass']        = $sumass;
        $ovars['enddate']       = $enddate;
        $ovars['cshare']        = $cshare;
        $ovars['en_num']        = $en_num;
        $ovars['efcdate']       = $efcdate;
        $ovars['poltab']        = $poltab;
        $ovars['clientcode']    = $clientcode;
        $ovars['risktype']      = $risktype;
        $ovars['curprem']       = $curprem;
        $ovars['endorscnt']     = $endorserial;
        $ovars['prdterm']       = $prdterm;
        $ovars['polstatus']     = $polstatus;
        $ovars['api_startdate'] = $api_startdate;
        $ovars['api_enddate']   = $api_enddate;
        $ovars['api_dates']     = true;
        
        
        //instantiate the object
        //echo "doctype== $doctype";
        $Endors_implementation      = new EndorseMotorRenewal();
        /* $endors_obj = EndorsFactory::factory($doctype);
           ///dbgarr('$endors_obj', $endors_obj);
        if($endors_obj){
            
        }
        else{
            
        }
        
        try {
            $endors_obj = EndorsFactory::factory($doctype);
           ///dbgarr('$endors_obj', $endors_obj);
        }
        catch (Exception $e){
            $return['message']     = $e->getMessage();
            $return['status']      = 0;
        }*/
        
       // if ( $proceed_flag ) {
            
           
            
            //echo "doctype = $doctype <br />";
            //we are expecting an array upon authorization
            $special = $Endors_implementation->send_authorization($polnum,$en_num,$ovars);
           //dbgarr('$special', $special);
            if ( !empty( $special ) ) {
                
                //if (method_exists($endors_obj, 'get_pol_coins_period')){
                    $period      = $Endors_implementation->get_pol_coins_period();
               // }
                //SELECT *  FROM `nlfcoinsure` WHERE `compcode` LIKE 'CP/16/02/00454/HQR' and `account` = '' and `period` = '2017:2018'
                $coins_det      = $iesdb->qsel("SELECT * FROM nlfcoinsure WHERE compcode = '$polnum' and account = '' and period = '$period' and prop > '0' LIMIT 0,1", 'A');
                if (!empty($coins_det)){
                    $cshare = intval($coins_det[0]['prop']);
                }
                //echo "doctype = $doctype <br />";
               //store the current endorsement count on the endorsement 
               $save_endors_arr['en_num']         = $en_num;
               $save_endors_arr['curr_endorscnt'] = $endorserial; 
               $save_endors_arr['fx_curr']        = $fx_curr; //TODO: provide these fields in the endorsement table
               $save_endors_arr['fx_rate']        = $fx_rate; 
               $save_endors_arr['startdate']      = $api_startdate;
               $save_endors_arr['enddate']        = $api_enddate;
               
               //$startdate       = $items_to_save['startdate'];
               //$enddate       = $items_to_save['enddate'];
               
               //dbgarr("startdate == $startdate  ||  enddate === $enddate",$items_to_save);
               
               $endors_tab->saveRec($save_endors_arr); 
                
               //indicate the success return value to the client
               $ret_html = 1;
                
               //send the memo
               //Authorization list //TODO: this is one of the processes that must have been initiated globally
              // $author      = $reqObj->getVar('endors_sendto'); //TODO: the authoriser should come from the user interface
               $persdet     = array();
               $memo_arr    = array();
               //if ( trim( $author ) != '' ) {
                   //////
                   $comparedate = date('Y-m-d H:i:s');
                   $fv_dt_na    = $comparedate;
                   //$iesdbhmr    =  init_iesdbshmrs(); 
                   //$persdet_tab = new Dbtable($iesdbhmr,'hmrs_persdet');
                   //$where       = " (staffid = '$author') "; 
                   //$persdet     = $persdet_tab->getRecs("",$where);
                   
                   //
                  // $fv_dt_na = $persdet[0]['dt_not_available'];
                   if (($fv_dt_na == "0000-00-00 00:00:00") || ($fv_dt_na == "0000-00-00 00:00:00")) $fv_dt_na = $comparedate;   
                      
                   if (  $comparedate < $fv_dt_na ) {
                       $nv_desc  = strftime("%B %d, %Y  %H:%M %p ",strtotime($fv_dt_na ));
                       $return['message']= "Sorry, This Endorsement cannot be sent for Authorization Because The Destination Person Will Not Be Available Until  ...\n\n [ $nv_desc ] ...\n\nPlease Wait Till Then Or Refer This Voucher To Someone Else";     
                       $return['status'] = 0;
                   }
                   else {   
                        $procid       = "";
                        $destclient   = "";
                        $itemlink     = "";
                        $actionreq    = "V";
                        $sendsms      = "";
                        $authorby     = "";
                        $interv       = "";
                        $messtype     = "";
                        $mult_sel_var = "";
                        $forwardto    = "";
                        $procstatus   = 'D';
                        $textmess     = "You have Endorsement for policy No.". $polnum." pending Authorization";
                        
                        // Calling the company info routine
                        $coarr = getcoinfo(0);
                        //dbgarr('$coarr',$coarr);
                        
                        // Init.
                        $memo_expiry_len = '7';
                        if ( !empty( $coarr ) ) {
                          $memo_expiry_len =  $coarr['memo_expiry_len']; //TODO:confirm that we have this field in general biz.
                        }
                        
                        //Date and Time
                        $curdate  = date('Y-m-d'); 
                        $curtime  = date("H:i:s");
                        $ndate    = nextdat(1,0,0,0,$memo_expiry_len,0,0,$curdate);
                        //$c_valdatetime = $curdate . " " . $curtime; 
                        //Adjust 
                        $valdatetime              = $ndate . " " . $curtime;
                        $memo_arr['curaction']    = 'send';
                        $memo_arr['dd_messlst']   = $procid;
                        $memo_arr['srcstaff']     = $staffid;
                        $memo_arr['dd_comtype']   = 'MEM';
                        $memo_arr['cb_sendsms']   = $sendsms;
                        $memo_arr['dd_stafflst']  = $author;
                        $memo_arr['dd_nrank']     = $destrank;
                        $memo_arr['dd_dept']      = $destdpt;
                        $memo_arr['destclient']   = $destclient;
                        $memo_arr['valdatetime']  = $valdatetime;
                        $memo_arr['procstatus']   = $procstatus;
                        $memo_arr['itemlink']     = $itemlink;
                        $memo_arr['actionreq']    = $actionreq;
                        $memo_arr['messheader']   = 'Endorsement Authorization Needed';
                        $memo_arr['dd_authorby']  = $author;
                        $memo_arr['dd_interval']  = $interv;
                        $memo_arr['messtype']     = $messtype;
                        $memo_arr['mult_sel_var'] = $mult_sel_var;
                        $memo_arr['dd_forwardto'] = $author;
                        $memo_arr['textmess']     = $textmess;
                    
                        //
                        $sres = save_procrec($memo_arr);
                        if ($sres == "") {
                            $return['message']= $_SESSION['curerror'];
                            $return['status'] = 0;
                        }
                   }
              // }   
               
               //calculate coinsurance
               if ( $Endors_implementation instanceof IEndorsCoinsurance ) {
                    //get the fields that coinsurance should be applied
                    $coins_field_arr      = $Endors_implementation->get_parent_coinsurance_fields();
                    //dbgarr('$coins_field_arr', $coins_field_arr);
                    $coins_childfield_arr = $Endors_implementation->get_child_coinsurance_fields();
                    
                    if ( !empty( $coins_field_arr ) ) {
                        $coins_field_str   = implode( ',', $coins_field_arr );
                        $c_endors_rec      = $endors_tab->getRecs("", "en_num='$en_num'",$coins_field_str);
                        //dbgarr('1. $c_endors_rec', $c_endors_rec);
                        //echo $cshare."<br/>";
                        $sav_arr['en_num'] = $en_num;
                        if ( !empty( $c_endors_rec ) ) {
                            //dbgarr('$c_endors_rec', $c_endors_rec); 
                            foreach ( $c_endors_rec as $c_endors_val ) {
                                foreach ( $coins_field_arr as $coins_field_val ) {
                                    $sav_arr[$coins_field_val] = $c_endors_val[$coins_field_val] * ($cshare/100);
                                }
                                //
                            }
                        }
                        //dbgarr('1. $sav_arr, $cshare = '.$cshare, $sav_arr);
                        $endors_tab->saveRec( $sav_arr );
                        //echo $endors_tab->get_query();
                         //die;
                        
                        //reset the save arr
                        $sav_arr = array();
                    }
                    
                    //note that the child array is a multi-dimensional array
                    //this means that we have to provide the endorsdet_id
                    if ( !empty( $coins_childfield_arr ) ) {
                        $coins_childfield_str = implode( ',', $coins_childfield_arr );
                        $endors_det_rec       = $endors_det_tab->getRecs(''," en_num='$en_num' ", "en_itemid, polnum,cshare, $coins_childfield_str");
                        //dbgarr('2. $c_endors_rec', $endors_det_rec);
                        if ( !empty( $endors_det_rec ) ) {
                            foreach ( $endors_det_rec as $endors_det_val ) {
                                $en_itemid          = $endors_det_val['en_itemid'];
                                $endors_det_polnum  = $endors_det_val['polnum'];
                                $cshare             = ($endors_det_val['cshare'] > 0) ? $endors_det_val['cshare'] : $cshare;
                                
                                $sav_arr['en_num']    = $en_num;
                                $sav_arr['en_itemid'] = $en_itemid;  
                                $sav_arr['polnum']    = $endors_det_polnum;      
                                foreach ( $coins_childfield_arr as $coins_childfield_val ) {
                                    $sav_arr[$coins_childfield_val] = $endors_det_val[$coins_childfield_val] * ($cshare/100);
                                }
                                //dbgarr('2. $sav_arr, $cshare = '.$cshare, $sav_arr);
                                $endors_det_tab->saveRec( $sav_arr ); 
                            }
                        }
                        
                    }
               }
               
               if ($en_num != ''){  
                    //echo "proceed_flag = $proceed_flag, en_num = $en_num";
                    //$template_in_use = $template;
                    $offset          = 0;
                    
                    if ( ( $Endors_implementation instanceof IEndorsCoinsurance ) && 
                         ( $Endors_implementation->get_coinsurance_tag() == '$_coinsurers_clause' ) && 
                         ( !empty( $special ) ) ) {
                    //if ($sp_charkey=='$_coinsurers_clause'){
                        
                        $coinsurers_clause_text = '';
                        
                        //attach period to the coinsurance
                        /*$c_efcdate   = $polrec[0]['effdate'];
                        
                           
                        $c_efcyear   = substr($c_efcdate,0,4);
                        $c_efcyear_n = $c_efcyear + 1; 
                        $period      = $c_efcyear.':'.$c_efcyear_n;*/
                        $period      = $Endors_implementation->get_pol_coins_period();
                        //echo "period = $period <br/>";
                        //
                        $coinsurers_tab  = new Dbtable($iesdb,'nlfcoinsure');
                        $coinsurers_rec  = $coinsurers_tab->getRecs(''," polnum='$polnum' and period='$period' ",'account,prop');
                        //echo $coinsurers_tab->get_query();
                        //dbgarr('1. $coinsurers_rec='." polnum='$polnum' and period='$period' ", $coinsurers_rec);
                        //check for composite if the policy values can not be calculated
                        if ( empty( $coinsurers_rec ) ) {
                            $coinsurers_rec  = $coinsurers_tab->getRecs(''," compcode='$polnum' and period='$period' ",'DISTINCT account,prop');
                        }
                        
                        //dbgarr('2. $coinsurers_rec='." polnum='$polnum' and period='$period' ", $coinsurers_rec);
                        //dbgarr('$special', $special);
                        $coinsurers_clause_text      = '';
                        if (!empty($coinsurers_rec)){
                            
                            $c_premium = $Endors_implementation->get_coins_prem(); 
                           
                            $c_sumass  = $Endors_implementation->get_coins_sumass();
                            //dbgarr('$special', $special);
                            
                                
                            foreach ($coinsurers_rec as $coinsurers_val){
                                $_insurer_code = trim($coinsurers_val['account']);
                                        
                                if ($_insurer_code == '') {
                                    $_insurer  = $company_name;
                                }
                                else {
                                    $_insurer  = get_id_desc($_insurer_code,'account');
                                }
                                        
                                $_percentage   = number_format($coinsurers_val['prop'],2);
                                $p_premium     = ($c_premium * $coinsurers_val['prop'])/100;
                                $p_sumass      = ($c_sumass * $coinsurers_val['prop'])/100;
                                    
                                        
                                            
                                $coinsurers_clause_text   .= "<tr>";
                                $coinsurers_clause_text   .= "<td>$_insurer</td>";
                                $coinsurers_clause_text   .= "<td>{$_percentage}%</td>";
                                
                                //show for every other endorsements
                                if ($doctype != EndorsConstants::ENDORS_REGNUM_CHANGE && $doctype != EndorsConstants::ENDORS_NAME_CHANGE){
                                    $coinsurers_clause_text   .= "<td align='right'>&#8358;".number_format($p_sumass,2)."</td>";
                                    $coinsurers_clause_text   .= "<td align='right'>&#8358;".number_format($p_premium,2)."</td>"; 
                                }
                                
                                $coinsurers_clause_text   .= "<td>&nbsp;</td>";
                                $coinsurers_clause_text   .= "</tr>";
                                    
                            }
                            $coinsurers_clause_text.= "</table>";
                        }
                        //
                        //$sp_charval = $coinsurers_clause_text;
                        //if empty
                        //$sp_charval = '';
                        $special[$Endors_implementation->get_coinsurance_tag()] = $coinsurers_clause_text;
                    }
                    
                    //dbgarr('$special', $special);
                       
                    foreach ($special as $sp_charkey=>$sp_charval){
                        //reset the start of the template check for each tag
                        $offset = 0;   
                        //simple search and replace                                        
                        //echo " sp_charkey = $sp_charkey<br />";
                        
                        for(;;){ 
                              
                                
                            //
                            if ($offset > strlen($template_in_use)) break;
                            $q_pos = strpos($template_in_use,$sp_charkey,$offset);
                            
                            
                            if ($q_pos !== false){
                                $str_len  = strlen($sp_charkey);
                                
                                $template_in_use = substr_replace($template_in_use,$sp_charval,$q_pos,$str_len);
                                //echo "sp_charval = $sp_charval , sp_charkey = $sp_charkey <br/>";
                                $offset   = ($q_pos + $str_len);
                                    
                                //TODO: find a way of detecting uninterpreted tags
                                //TODO: may be you should take a log file approach to the  detecting the presence of unused tags
                            }
                            else{
                                break;
                            }                                                
                        }                                                  
                    }
                    
                    //echo "template_in_use = $template_in_use <br />";
                    
                    //dbgarr('$special', $special);    
                    
                    //template_in_use 2 = $template_in_use<br/>";                            
                    //save the template
                    $archive_endors_tab             = new Dbtable($iesdb,'lf_endors_archive');
                    $save_archive_arr['en_num']     = $en_num;
                    $save_archive_arr['en_content'] = $template_in_use;                            
                                                
                                           
                    //save the info in the archive                                    
                    if ($archive_endors_tab->saveRec($save_archive_arr)){
                        //echo "en_num = $en_num, doctype = $doctype<br/>";
                        $ret_html = '1'.','.$en_num.','.$doctype.",";
                    }
                }
                
            }
            
    if ( trim( $endors_num ) != '' ) {
        $staffid      = isset($_SESSION['g_loggedstaffid']) ? $_SESSION['g_loggedstaffid']:'';
        
        //init the endorsement tables
        $endorsement_tab = new Dbtable($iesdb,'lf_policyendors');
        /* try {
            $endors_obj = EndorsFactory::factory($doctype);
        }
        catch (Exception $e){
            $return['message']= $e->getMessage();
            $return['status'] = 0;
          }*/
        
        $polrec = $poltab->getRecs('',"polnum='$polnum'",'clientcode, endorscnt, insured,   sumass, curprem,  enddate,
                                                          effdate,    risktype,  fapremium, cshare, polclass, fx_curr,
                                                          fx_rate');
                                                          
        $ovars['clientcode']    = $polrec[0]['clientcode'];;
        
        $ovars['staffid']       = $staffid;
        
        //if there are no errors
       
            if ($Endors_implementation->save_policy_endors($polnum,$endors_num,$ovars)) {
                //change the status of the endorsement
                $save_arr['status']        = 'A';
                $save_arr['authorby']      = $staffid;
                $save_arr['authordate']    = date('Y-m-d');
                $save_arr['en_num']        = $endors_num;
                
                if ($endorsement_tab->saveRec($save_arr)) {
                    //update the endorscnt on the policy
                    $endors_rec = $endorsement_tab->getRecs('',"polnum='$polnum' AND status='A'", " COUNT(en_num) AS en_num_cnt");
                    if ( !empty( $endors_rec ) ) {
                        $en_num_cnt                = $endors_rec[0]['en_num_cnt'];
                        $save_pol_arr['polnum']    = $polnum;
                        $save_pol_arr['endorscnt'] = $en_num_cnt;
                        $poltab->saveRec($save_pol_arr);
                    }
                }
                /*$cprdarr = get_acctprd("NLIFE");
                
                $comm    = get_comdet('P',$risktype,''); //
                $trndet['agency']  = $agency;
                $trndet['trntyp']  = "RNL";
                $trndet['polnum']  = $polnum;
                $trndet['trnamt']  = $curprem;
                $trndet['trndate'] = date('Y-m-d');//$effdate;
                $trndet['efcdate'] = $api_startdate;
                $trndet['trnnar']  = 'PREMIUM PAID ON ['.$polnum.']['.$efcdate.']';
                $trndet['polcls']  = $polcls;
                $trndet['sumass']  = $sumass; // get this information from the nlfpolmain    
                $trndet['cshare']  = $cshare;
                $trndet['curprd']  = $cprdarr['period'];
                $trndet['rsktyp']  = $risktype;
                $trndet['branch']  = $branch;
                $trndet['client']  = $clientcode;
                $trndet['orgprem']  = $curprem;
                $trndet['endors_code'] = $endors_num;
                $trndet['crnumber']    = "MOBAPP";
                $trndet['crdate']    = date('Y-m-d');
                $trndet['sumass']    = $sumass;
                $trndet['dd_trntyp'] = "RNL";
                $trndet['polgrp']  = "SP";
                $trndet['trncode'] = "0020";
                $trndet['prdto']   = explode(':',$cprdarr['period'])[0];
                $trndet['prdfrom'] = explode(':',$cprdarr['period'])[1];
                $trndet['refdcnumb'] = '';
                $trndet['dcnumb']    = '';
                $trndet['trnserial'] = '';
                $trndet['comrate']  = $comm[0]['comrate'];
                $trndet['comms']    = ($curprem / 100)  * $comm[0]['comrate'];
                $trndet['trnnet']   =  $curprem- $trndet['comms'];  
                
                $ret =  post_dctrans($trndet,false,true);
                if($ret){
                $return['message'] = "Endorsement Records Saved Successfully.";
                $return['status'] = 1;
                $return['premuim'] = $curprem; 
                $return['debitNoteNumber'] = $ret['dcnumb'];
                }else{
                    $return['message'] = "Unable to Save Endorsement Records.Please Try Again.";
                    $return['status'] = 0;
                }*/
                
                $return['message'] = "Endorsement Records Saved Successfully.";
                $return['status'] = 1;
                $return['premuim'] = $curprem; 
             }
            else{
                $return['message'] = "Unable to Save Endorsement Records.Please Try Again.";
                $return['status'] = 0;
            }
        

            } 
            else {
                $return['message']    =  " <br />There was an error in sending the endorsement info. Please contact the IT Department";
                $return['status'] = 0; 
            }  
       // }              
   // }
        //}
            
     }
    
    return $return;
       
    }
    
    public function get($request) {
        
    $iesdb_new              = init_iesdbs(); 
   //DATABASE TABLE RESOLUTION   
    if ($iesdb_new)  $uaccess01   = new Dbtable($iesdb_new,"uaccess01"); 
    if ($iesdb_new)  $nlfpolmain  = new Dbtable($iesdb_new,"nlfpolmain"); 
    if ($iesdb_new)  $scheditems  = new Dbtable($iesdb_new,"scheditems"); 
    if ($iesdb_new)  $motoritems  = new Dbtable($iesdb_new,"motoritems"); 
    if ($iesdb_new)  $generalinfo  = new Dbtable($iesdb_new,"generalinfo"); 
    $op_mode =  $request['opmode'];                
      $amplify = "AMPLIFY";  
    if ($op_mode == "EBGetCustomerInfo") {
     if ($iesdb_new)  $nlfclients  = new Dbtable($iesdb_new,"nlfclients");    
         $cltcod             = (isset($request['cltcode']) && ($request['cltcode'] != "")) ? $request['cltcode'] : "";
     //echo "cltcode==$cltcode";
     if($cltcod !=""){
        $clientlink       = $uaccess01->getRecs("", "(cltcode  ='$cltcod')", "clientlink");
        if($clientlink) $clientcode = $clientlink[0]['clientlink'];
        $retur =  getclient($clientcode,'');
        foreach($retur as $itemlist){
            $return['clientno']   = $itemlist['clientno'];
            $return['insured']    = $itemlist['insured'];
            $return['email']      = $itemlist['email'];
            $return['gsm']        = $itemlist['gsm'];
            $return['clientdesc'] = $itemlist['clientdesc'];
            $return['entdate']    = $itemlist['entdate'];  
        }
        
       }
       else{
        $return['status']   = 0; 
        $return['message']   = "Details not found. Please Provide cltcode";
     }
    } 
    else if ($op_mode == "EBGetSinglePoilcyRecord") { //	Get Policy Details 
      
       $ponum             = (isset($request['polnum']) && ($request['polnum'] != "")) ? $request['polnum'] : "";
       
      if($ponum !=""){
        
        $polrec       = $nlfpolmain->getRecs("", "((polnum ='$ponum') and (mobapp_code = 'MOBAPP'))", "polclass,risktype");
        
        if($polrec){
         $polclass = $polrec[0]['polclass'];  
         $vars['mobile'] = "MOBAPP";
         $return = getpolitems($ponum,$polclass,'','','open',$vars); 
        // dbgarr("return",$return);
         //[item_enddate] => 2020-07-09  [status] => 0
        }else{
        $return['status']   = 0; 
        $return['message'] = "Policy record Empty...";  
        }
        }else{
        $return['status']   = 0; 
        $return['message'] = "Please we do not have your record in our database...";
       }
    }
      else if ($op_mode == "EBGetListOfCustomerPolicies") { //	Get Policy Details 
      
       $cltcod        = (isset($request['cltcode']) && ($request['cltcode'] != "")) ? $request['cltcode'] : "";
      if(($cltcod !="")){
        
        $clientlink       = $uaccess01->getRecs("", "(cltcode ='$cltcod')", "clientlink");
       // echo $uaccess01->get_query();
        if($clientlink) $clientco = $clientlink[0]['clientlink'];
        
       $polrecord       = $nlfpolmain->getRecs("", "((clientcode ='$clientco') and (mobapp_code = 'MOBAPP'))", "polnum,polclass");
       if($polrecord !=""){
        //$myret = array();
        //$c = 0;
        foreach ($polrecord as $polrecor){
        $polclass         = $polrecor['polclass'];
        $polnum           = $polrecor['polnum'];
        $vars['mobile'] = "MOBAPP";
        $retur = getpolitems($polnum,$polclass,'','','open',$vars);
        $myret[] = $retur; 
        //dbgarr("return",$myret);
      }
        $c = 0;
        foreach($myret as $myre){
         foreach($myre as $myr) {
          $return[$c] = $myr;
          $c++;
         } 
        } 
      }else{
        $return['status']   = 0; 
        $return['message'] = "Please we do not have your record in our database...";
       }
     }else{
        $return['status']   = 0; 
        $return['message'] = "Please supply cltcode try again later";
       }
     }
        
    else if ($op_mode == "EBGetSpecClaimInfo") {
        
        $cliamnum             = (isset($request['cliamnum']) && ($request['cliamnum'] != "")) ? $request['cliamnum'] : "";
        if($cliamnum !=""){
        $retur    = get_clmdet($cliamnum,"","","",""); 
        
        foreach($retur as $itemlist){
            $return['claimNo'] = $itemlist['clmnum'];
            $return['polnum']  = $itemlist['polnum'];
            $return['clmdate'] = $itemlist['clmdate'];
           // get_id_desc
            $return['policy_class'] = get_id_desc($itemlist['polcls'],'polcls');
            $return['agency']       = get_id_desc($itemlist['agency'],'agency'); //
            $return['risktype']     = get_id_desc($itemlist['risktype'],'risktype');
            $return['branch']       = get_id_desc($itemlist['branch'],'branch');
            $return['insprdstr']      = $itemlist['insprdstr'];
            $return['insprdend']      = $itemlist['insprdend'];
            $return['narration']      = $itemlist['narr3'];
            $return['claimant']       = $itemlist['claimant'];
            $return['hour']           = $itemlist['lhour'];
            $return['minute']         = $itemlist['lminute'];
        }
        }else{
        $return['status']   = 0; 
        $return['message'] = "Please your Claim Number is empty fill in and try again later"; 
        }
        
    }
        
    else if ($op_mode == "EBGetCustomerClaims") {
        
        $cltemail            = (isset($request['cltcode']) && ($request['cltcode'] != "")) ? $request['cltcode'] : "";
        
        $clientlink       = $uaccess01->getRecs("", "(cltcode ='$cltemail')", "clientlink");
        if($clientlink) $clientco = $clientlink[0]['clientlink'];
        //echo "clientco==$clientco";
        $ovar['clientcode'] = $clientco;
        
        if($clientco !=""){
        $retur    = get_clmdet("","","","","",$ovar);  
           $xi = 0;
          foreach($retur as $itemlist){
            $return[$xi]['claimNo'] = $itemlist['clmnum'];
            $return[$xi]['polnum']  = $itemlist['polnum'];
            $return[$xi]['clmdate'] = $itemlist['clmdate'];
            $return[$xi]['policy_class'] = get_id_desc($itemlist['polcls'],'polcls');
            $return[$xi]['agency']       = get_id_desc($itemlist['agency'],'agency'); //
            $return[$xi]['risktype']     = get_id_desc($itemlist['risktype'],'risktype');
            $return[$xi]['branch']       = get_id_desc($itemlist['branch'],'branch');
            $return[$xi]['insprdstr']      = $itemlist['insprdstr'];
            $return[$xi]['insprdend']      = $itemlist['insprdend'];
            $return[$xi]['narration']      = $itemlist['narr3'];
            $return[$xi]['claimant']       = $itemlist['claimant'];
            $return[$xi]['hour']           = $itemlist['lhour'];
            $return[$xi]['minute']         = $itemlist['lminute'];
            
            $xi++;
        }
        }else{
        $return['status']   = 0; 
        $return['message'] = "Please your cltcode is empty fill in and try again later"; 
        }
    }
    else if ($op_mode == "EBViewCertificate"){
            
            $polnum             = (isset($request['polnum']) && ($request['polnum'] != "")) ? $request['polnum'] : "";
            
            if($polnum){
                
            $fv_itemcode       = $motoritems->getRecs("", "(polnum ='$polnum')", "itemcode");
        
            $itemcode          = $fv_itemcode[0]['itemcode'];
            
            $polinfo = getpolicydet($polnum) ;
            
         //if (($fv_period == "") || ($fv_period == "NONE")) { 
          if ($polinfo != "") {
           $efd = $polinfo[0]['effdate'];
           $end = $polinfo[0]['enddate'];
           $end = $polinfo[0]['enddate']; 
           $fv_period = date('Y', strtotime($efd)) . ":" . date('Y', strtotime($end));
           
          // echo " fv_period==$fv_period";
           //
          }
         //}
 
            $fv_doctype = "CERT";
            //echo "polnum==$polnum,itemcode==$itemcode,fv_doctype==$fv_doctype, fv_period==$fv_period";
            //die;
            $resarr = get_pdoclist($polnum,$itemcode,$fv_doctype,$fv_period);
           // dbgarr("resarr",$resarr);
            if ($resarr != "") {
              //$return =  "https://ies.royalexchangeplc.com/iesgenbiz/docfolder/cert_container.php?op=$PolicyNo,$fv_doctype,$itemcode,$fv_period,$fv_period,$fv_doccode&act=view&item=1%20&item2=$fv_doctype%20&item3=WAX1%20&item4=";
             
              $return['PolicyNo']           =  $resarr[0]['polnum'];
              $return['DateExpiry']         =  $resarr[0]['enddate'];
              $return['NamePolicyHolder']   =  $resarr[0]['pholder'];
              $return['ChassisNumber']      =  $resarr[0]['chassis'];
              $return['EffectiveDate ']     =  datedisplay($resarr[0]['strdate']);
              $return['CertificateNo']      =  $resarr[0]['certnum'];
              $return['VehicleRegistrationNo']  =  $resarr[0]['itemcode'];
              //$return =  "https://ies.royalexchangeplc.com/demo_general/docfolder/cert_container.php?op=$polnum,$fv_doctype,$itemcode,$fv_period,$fv_period,$fv_doccode&act=view&item=1%20&item2=$fv_doctype%20&item3=WAX1%20&item4=";
             //echo "link==$link";
               
            }else{
              $return['status']   = 0; 
              $return['message'] = "We don't have your records";   
            }  
                
            }else{
               $return['status']   = 0; 
               $return['message'] = "Policy number can't be blank...";  
            }
            
            
    }
    
    else if ($op_mode == "EBDownloadCertificate"){
            
            $polnum             = (isset($request['polnum']) && ($request['polnum'] != "")) ? $request['polnum'] : "";
            
            if($polnum){
                
            $fv_itemcode       = $motoritems->getRecs("", "(polnum ='$polnum')", "itemcode");
        
            $itemcode          = $fv_itemcode[0]['itemcode'];
            
            $polinfo = getpolicydet($polnum) ;
            
         //if (($fv_period == "") || ($fv_period == "NONE")) { 
          if ($polinfo != "") {
           $efd = $polinfo[0]['effdate'];
           $end = $polinfo[0]['enddate'];
           $end = $polinfo[0]['enddate']; 
           $fv_period = date('Y', strtotime($efd)) . ":" . date('Y', strtotime($end));
           
          // echo " fv_period==$fv_period";
           //
          }
         //}
 
            $fv_doctype = "CERT";
            //echo "polnum==$polnum,itemcode==$itemcode,fv_doctype==$fv_doctype, fv_period==$fv_period";
            //die;
            $resarr = get_pdoclist($polnum,$itemcode,$fv_doctype,$fv_period);
           // dbgarr("resarr",$resarr);
            if ($resarr != "") {
              
                               //Init 
                 $fv_messagehold = "";
                 $dexist = false;
                 $doclist = "";
                 $workfolder = $tempf;  
                 $workfolder2= $tempf0; 
                
                 ////
                // echo "fv_doctype==$fv_doctype,fv_doccode==$fv_doccode,act==$act, fv_selcls== $fv_selcls";
                 //echo "cover type = $fv_covtype ... ";
                 $fv_selcls = 1;
                 $fv_doccode = "WAZ301";
                 $fv_doctype  = "CERT";
                   
                 //Ovwerride Risk Type Value
                 $fv_rsktype = "";
                 $do_subsidized_stuff = new Agric_insurance();
                 $issubs = 0;
                  
                 // dbgarr("resarr",$resarr);
                 //Get Cert Details
                 $certdet   = "";
                 $fv_hfcode = "";
                 $fv_bfcode = "";
                 $fv_ffcode = "";
                 if ($fv_doccode != "") {
                
                  $srh_dtype = $fv_doctype;
                  if ($fv_doctype == "COVER") $srh_dtype = "CERT";
                  $certdet = get_doctemp($fv_selcls,$srh_dtype,$fv_doccode,$fv_rsktype);
                  if ($certdet != "") {
                   $fv_docdes = $certdet[0]['docdes'];
                   $fv_hfcode = $certdet[0]['hfcode'];
                   $fv_bfcode = $certdet[0]['bfcode'];
                   $fv_ffcode = $certdet[0]['ffcode'];
                  }
                  else {
                   $fv_messagehold = $_SESSION['curerror'];
                  }
                 }
                
                 
                // $curr_sign = curr_symbol();
                 //Get vars from policy document link table
                 $testc  = 0;
                
                 // }
                  //dbgarr("resarr",$resarr);  
                  //
                  //Audit
                  $aud_action = $fv_doctype . " Browsed/Printed " ;
                  if ("" != $polnum) $aud_action = $aud_action . " Policy $fv_polnum ";
                  $aud_action = $aud_action . " ... For Period: ($fv_polprd) ";    
                  $_SESSION['aud_control_okaytolog'] = 1;
                 // audit_prep(9,'100-04','BRT',$aud_action,'',$polnum,$polnum,$itemcode,'','');  	   
               // dbgarr("resarr",$resarr);
                 $polclass = "";
                 if ($resarr != "") {
                  
                  $pholder   =  $resarr[0]['pholder'];
                  $chassno   =  $resarr[0]['chassis'];
                  $regnum    =  $resarr[0]['itemcode'];
                  $polnum    =  $resarr[0]['polnum'];
                 
                  $efdate    =  $resarr[0]['strdate'];
                  $expdate   =  $resarr[0]['enddate'];
                  $exptime   =  $resarr[0]['endtime'] . " Hrs";
                  $secnum    =  $resarr[0]['secnum'];
                  $polclass  =  $resarr[0]['polclass'];
                  $tsumins   =  $resarr[0]['sumins'];
                  $covertype =  "[ " .$resarr[0]['coverdesc'] . " ]";
                  $vmake     =  $resarr[0]['makedesc'];
                  $dcnumber    = $resarr[0]['dcnumb'];    
                 
                  if(($glob_client_id == "2014-0505-linkageplc") && $polclass == '3'){ 
                    $certnum = $fv_itemcode;
                  }else{
                    $certnum   =  $resarr[0]['certnum'];
                  }
                  //////////////////
                   $premim   =  (isset($resarr[0]['premium'])) ? $resarr[0]['premium'] :0;    
                  /////////////////////////////////////////////////////////////////////////////////////
                   $poldet    = getpolicydet($polnum);
                   if(!empty($poldet)){
                        $riskytype  = $poldet[0]['risktype']; //fapremium
                        $faprem     = (isset($poldet[0]['fapremium'])) ? $poldet[0]['fapremium'] : 0;
                        $subsidprem = (isset($poldet[0]['curprem']))   ? $poldet[0]['curprem']   : 0;
                        $issuedate = (isset($poldet[0]['issuedate']))   ? $poldet[0]['issuedate']   : "";
                        
                   }
                   $issubs = $do_subsidized_stuff->is_subsidized($riskytype);
                   $edarr  = get_extdsc_list($polnum,$regnum,'','');
                   if ($edarr != "" && $issubs == 1) {
                        $xn = 1; 
                        $subsid_amt = 0;
                        for ($xi=0;$xi <count($edarr);$xi++) {
                            $desc = $edarr[$xi]['desc'];
                            $amt  = $edarr[$xi]['edamt'];         
                            $rate = $edarr[$xi]['edperc'];  
                            $indi = $edarr[$xi]['edindi'];
                            $subsid_amt += $amt;  
                            
                        }
                       $premiumo =  abs($premim) - abs($subsid_amt);
                   }
                   elseif($edarr == "" && $issubs == 1){
                        $premiumo = ($premim/$faprem)*$subsidprem;
                   }
                    
                   if($issubs == 1){
                        $premium = abs($premiumo);
                   } else {
                        $premium = $premim;
                   }
                   $prem_fmt  =  (isset($resarr[0]['premium'])) ? number_format($premium,2) :0;
                   //echo "prem_fmt = $prem_fmt<br/>";
                   ///////////////////////////////////////////////////////////////////////////////////////////////
                
                  $strdate   =  datedisplay($resarr[0]['strdate']);
                  $issuedate =  (isset($resarr[0]['efcdate'])) ? datedisplay($resarr[0]['efcdate']) : '';
                  
                  if(($glob_client_id == "2011-0315-nemplc") && $polclass == '3'){ //customise cert no for NEM
                    $certnum = $regnum;
                    if((isset($itemcode)) && ($itemcode != "")){
                        $certnum = $itemcode;
                    }
                  }
                 }
                 $naicom_auth_txt = "N";
                 $ric_txt         = "";
                 $compinfo        = getcoinfo(0);
                 //dbgarr('$compinfo',$compinfo);
                 if ($compinfo != "") {
                  $compname       = $compinfo['compname'];
                  $naicom_auth_txt= $compinfo['naicom_auth_txt'];
                  $ric_txt        = $compinfo['ric'];
                  $currency       = $compinfo['dcurrency'];//
                  
                 }
                 
                 $itemdet = getitemdet($polnum,$polclass,$regnum); 
                 if ($itemdet != "") {
                    //dbgarr('$itemdet',$itemdet);
                    $inv_curr           = ((isset($itemdet['curr'])) && ($itemdet['curr'] != "")) ? $itemdet['curr'] : "";
                    $tin_no             = (isset($itemdet['tin_no'])) ? $itemdet['tin_no']  : '';
                    $fv_vehtype         = (isset($itemdet['vehtype']))    ? get_id_desc($itemdet['vehtype'],'vehicle_type')."-".get_id_desc($itemdet['model'],'vehicle_model') : '';
                    $item_sumass        = $itemdet['sumass']; 
                    $itemdesc1          = $itemdet['itemdesc1'];
                    $itemdesc2          = $itemdet['itemdesc2'];
                    $geolimit           = $itemdet['geolimit'];
                    $item_entdate       = $itemdet['entdate'];
                    $nia_covertype              = $itemdet['nia_covertype']; 
                    $num_of_employees   = isset($itemdet['employee_num'])?$itemdet['employee_num']:'';
                    
                    $limit_loss         = isset($itemdet['limit_loss'])?number_format($itemdet['limit_loss'],2):0;
                    $voyfrom            = isset($itemdet['vfrm'])?$itemdet['vfrm']:'';
                    $voyto              = isset($itemdet['vto'])?$itemdet['vto']:'';
                    $marks              = isset($itemdet['marks'])?$itemdet['marks']:'';
                    $conditions         = isset($itemdet['conditions'])?$itemdet['conditions']:'';
                    $conditions         = nl2br($conditions);
                    $excess             = isset($itemdet['excess'])?$itemdet['excess']:'';
                    $excess_perc        = isset($itemdet['excess_perc'])?$itemdet['excess_perc']:0;
                    $transmode          = isset($itemdet['transmode'])?get_id_desc($itemdet['transmode'],'transmode'):'';
                    //$xhchange_r       = isset($itemdet['itmgroup'])?$itemdet['itmgroup']:0;
                    //Marine items
                    $bankInterest       = (isset($itemdet['bankInterest']))  ? $itemdet['bankInterest']  : '';
                    $invoicedValue      = (isset($itemdet['invoicedValue'])) ? $itemdet['invoicedValue'] : 0; 
                    /////////////////
                    $real_excl          = array();
                    $real_excl          = '';
                    $xclusion_cargo     = (isset($itemdet['xclusion']))      ? $itemdet['xclusion']      : '';
                    $exclu              = explode(",",$xclusion_cargo);
                    foreach($exclu as $ex){
                        $emp       = explode("-",$ex);
                        $marr[] = $emp;
                        foreach($marr as $ma){
                             $ght[] = $ma[0];
                            foreach($ght as $de=>$lu){
                               $ret[] = $lu;
                               $ret =  array_unique($ret);
                               $xclusion = implode(",",$ret);
                            }
                        }   
                    }
                    ////////////////
                    $clau          = (isset($itemdet['clauses']))       ? $itemdet['clauses']       : '';
                    $clauses       = explode(",", $clau);
                    $warranties    = (isset($itemdet['conditions']))       ? $itemdet['conditions']       : '';
                    $fx_rate       = (isset($itemdet['itmgroup']))       ? $itemdet['itmgroup']       : ''; 
                    //////////////////
                    //Motor Items
                    $fv_vehtype   = (isset($itemdet['vehtype']))    ? get_id_desc($itemdet['vehtype'],'vehicle_type')."-".get_id_desc($itemdet['model'],'vehicle_model') : '';
                    $fv_ccapacit  = (isset($itemdet['ccapacity']))  ? $itemdet['ccapacity'] : 0;
                    $engnum       = (isset($itemdet['engnum']))     ? $itemdet['engnum']    : '';
                    
                    
                    $premim   =  (isset($itemdet['curprem'])) ? $itemdet['curprem'] :0;
                    
                    
                    //Policy Holders Currency
                    $curr       = (isset($itemdet['curr'])) ? $itemdet['curr'] : '';
                    $curr_arr   = getgenitems(30,"","");
                    for($c=0; $c<count($curr_arr); $c++){
                        $code = $curr_arr[$c]['code'];
                        if($code == $curr)$curr_val = $curr_arr[$c]['value'];
                    }
                 } 
                 
                 //
                 $poldet    = getpolicydet($polnum);
                 if($poldet !=''){
                   //$fx_rate  = (isset($poldet[0]['fx_rate'])) ? $poldet[0]['fx_rate'] : 0.00; 
                   $agencycode= $poldet[0]['polagency'];
                   $agency   = get_id_desc($poldet[0]['polagency'],'agency');
                   $address1 = $poldet[0]['address1'];
                   $cshare   = $poldet[0]['cshare'];
                   $covdurfrm = (isset($poldet[0]['effdate']))   ? datedisplay($poldet[0]['effdate'])   : '0000-00-00';
                   $covdurto = datedisplay($poldet[0]['enddate']);
                   $coinsum  = ($cshare/100)*$resarr[0]['sumins'];
                   $coinsum  = number_format($coinsum,2);
                   $title    = $poldet[0]['title']; //prdminute  prdhour  entdate
                   $polprdminute  = (isset($poldet[0]['prdminute'])) ? $poldet[0]['prdminute'] : '00';
                   $polprdhrs     = (isset($poldet[0]['prdhour']))   ? $poldet[0]['prdhour']   : '';
                   if(!empty($polprdhrs) && ($polprdhrs >= 01) && ($polprdhrs < 12)){
                        $polprdhour    = "$polprdhrs:$polprdminute am. ";
                   }
                   
                   elseif(!empty($polprdhrs) && ($polprdhrs >= 12)){
                        $polprdhour    = "$polprdhrs:$polprdminute pm. ";
                   }
                   
                  
                  }
                
                
                 //Schedule Item Information - For Pol Doc.
                 //$itemlist = getpolitems($polnum,$polclass,0,"","open"); 
                
                 $hindi  = false;
                 $bindi  = false;
                 $findi  = false;
                
                
                //
                 $secok      = true;
                 
                 $sign1      = "";
                 $sign2      = "";
                 $signok1    = false;
                 $signok2    = false;
                 $signimage1 = "";
                 $signimage2 = "";
                 $signw1     = 114;
                 $signw2     = 114;
                 $signh1     = 70;
                 $signh2     = 70;
                 $docobj1    = "";      
                 $docobj2    = "";
                 $datatype1  = "";
                 $datatype2  = "";
                
                
                 define('MARINE_POLCLS',3);
                 
                 $width = 780;
                 if ($polclass == MARINE_POLCLS){
                    $width = 880;
                 }
                
                 //////////////////////
                 //echo " <pre>";
                 //print_r($_REQUEST);
                 //print_r($resarr);
                 //echo " </pre>";  
                 //////////////////////
                
                
                ?>
                  <?
                
                
                   //First Parse
                   $certdet = get_doctemp($fv_selcls,$fv_doctype,$fv_doccode,$fv_rsktype);
                   //dbgarr("certdet",$certdet);
                   if ($certdet != "") {
                    $fv_docdes = $certdet[0]['docdes'];
                    $fv_hfcode = $certdet[0]['hfcode'];
                    $fv_bfcode = $certdet[0]['bfcode'];
                    $fv_ffcode = $certdet[0]['ffcode'];
                   }
                        
                   $hindi  = false;
                   $bindi  = false;
                   $findi  = false;
                       
                   //Header
                   if ($fv_hfcode != "") {
                    $objdet = get_dobjdata($fv_selcls,$fv_hfcode);
                    if ($objdet != "") {
                     $fileType    = $objdet['datatype']; 
                     $fileContent = $objdet['docobj']; 
                     $tfile1 = tempnam($workfolder,"a");
                     $fname1  = $tfile1;
                     $fh = fopen($fname1, 'w');
                     $fwres1 = fwrite($fh,$fileContent);
                     fclose($fh);
                     if ($fwres1) {
                      $hindi = true;
                     }
                    }
                   }
                   //Body
                   if ($fv_bfcode != "") {
                    $objdet = get_dobjdata($fv_selcls,$fv_bfcode);
                    if ($objdet != "") {
                     $fileType    = $objdet['datatype']; 
                     $fileContent = $objdet['docobj'];         
                     $tfile2 = tempnam($workfolder,"b");
                     $fname2  = $tfile2;
                     $fh = fopen($fname2, 'w');
                     $fwres = fwrite($fh,$fileContent);
                     fclose($fh);
                     if ($fwres) {
                      $bindi = true;
                     }
                    }
                   }
                   
                     
                   //Footer
                   if ($fv_ffcode != "") {
                    $objdet = get_dobjdata($fv_selcls,$fv_ffcode);
                    if ($objdet != "") {
                     $fileType    = $objdet['datatype']; 
                     $fileContent = $objdet['docobj'];
                     //echo $fileContent;
                     $tfile3 = tempnam($workfolder,"c");
                     $fname3  = $tfile3;
                     $fh = fopen($fname3, 'w');
                     $fwres = fwrite($fh,$fileContent);
                     fclose($fh);
                     if ($fwres) {
                      $findi = true;       
                     }
                    }
                   }
                   $idoccode = $fv_doccode; 
                  
                   //Display
                   if (($resarr != "") || ($testc == 1)) {
                    //echo "ochiwu";
                    for ($xd=0;(($xd<count($resarr)) || ($testc==1));$xd++) { 
                    // echo "samuel";
                     //Start Capture
                     ob_start();     
                     
                     if ($testc == 0) {      
                      $idoccode = $resarr[$xd]['doccode'];
                     }
                     
                     if ((trim($idoccode) != trim($fv_doccode)) && ($testc == 0)) {
                        
                      $certdet = get_doctemp($fv_selcls,$fv_doctype,$idoccode,$fv_rsktype);
                      if ($certdet != "") {
                       $fv_docdes = $certdet[0]['docdes'];
                       $fv_hfcode = $certdet[0]['hfcode'];
                       $fv_bfcode = $certdet[0]['bfcode'];
                       $fv_ffcode = $certdet[0]['ffcode'];
                      }
                           
                      $hindi  = false;
                      $bindi  = false;
                      $findi  = false;
                         
                      //Header
                      if ($fv_hfcode != "") {
                       $objdet = get_dobjdata($fv_selcls,$fv_hfcode);
                       if ($objdet != "") {
                        $fileType    = $objdet['datatype']; 
                        $fileContent = $objdet['docobj']; 
                        $tfile1 = tempnam($workfolder,"a");
                        $fname1  = $tfile1;
                        $fh = fopen($fname1, 'w');
                        $fwres1 = fwrite($fh,$fileContent);
                        fclose($fh);
                        if ($fwres1) {
                         $hindi = true;
                        }
                       }
                      }
                      //Body
                      if ($fv_bfcode != "") {
                       $objdet = get_dobjdata($fv_selcls,$fv_bfcode);
                       if ($objdet != "") {
                        $fileType    = $objdet['datatype']; 
                        $fileContent = $objdet['docobj'];         
                        $tfile2 = tempnam($workfolder,"b");
                        $fname2  = $tfile2;
                        $fh = fopen($fname2, 'w');
                        $fwres = fwrite($fh,$fileContent);
                        fclose($fh);
                        if ($fwres) {
                         $bindi = true;
                        }
                       }
                      }   
                      //Footer
                      if ($fv_ffcode != "") {
                       $objdet = get_dobjdata($fv_selcls,$fv_ffcode);
                       if ($objdet != "") {
                        $fileType    = $objdet['datatype']; 
                        $fileContent = $objdet['docobj'];
                        //echo $fileContent;
                        $tfile3 = tempnam($workfolder,"c");
                        $fname3  = $tfile3;
                        $fh = fopen($fname3, 'w');
                        $fwres = fwrite($fh,$fileContent);
                        fclose($fh);
                        if ($fwres) {
                         $findi = true;       
                        }
                       }
                      }
                       
                      $fv_doccode = $idoccode;
                     } 
                      
                     if ($hindi == true) {
                      include($fname1);
                     }
                     if ($bindi == true) {
                      if ($resarr != "") {
                       $pholder   =  $resarr[$xd]['pholder'];
                       $chassno   =  $resarr[$xd]['chassis'];
                       $regnum    =  $resarr[$xd]['itemcode'];
                       $polnum    =  $resarr[$xd]['polnum'];
                       if($glob_client_id == "2014-0505-linkageplc" && $polclass == '3'){
                            $certnum = $fv_itemcode;
                       }
                       else{
                            $certnum   =  $resarr[$xd]['certnum'];
                       }
                       $efdate    =  strftime("%B %d, %Y ",strtotime($resarr[$xd]['strdate']));
                       $expdate   =  strftime("%B %d, %Y ",strtotime($resarr[$xd]['enddate']));
                       $exptime   =  $resarr[$xd]['endtime'] . " Hrs";
                       $secnum    =  $resarr[$xd]['secnum'];
                       $polclass  =  $resarr[$xd]['polclass'];
                       $tsumins   =  $resarr[$xd]['sumins'];
                       $covertype =  "[ " .$resarr[$xd]['coverdesc'] . " ]";
                       $vmake     =  $resarr[$xd]['makedesc'];
                       $sign1     =  $resarr[$xd]['authorby'];
                       $sign2     =  $resarr[$xd]['approveby'];
                       $tsumins   =  number_format($resarr[$xd]['sumins'],2);
                       $premim   =  (isset($resarr[$xd]['premium'])) ? $resarr[$xd]['premium'] :0;
                       /////////////////////////////////////////////////////////////////////////////////////
                       $poldet    = getpolicydet($polnum);
                       if(!empty($poldet)){
                            $riskytype  = $poldet[0]['risktype']; //fapremium
                            $faprem     = (isset($poldet[0]['fapremium'])) ? $poldet[0]['fapremium'] : 0;
                            $subsidprem = (isset($poldet[0]['curprem']))   ? $poldet[0]['curprem']   : 0;
                            $issuedate = (isset($poldet[0]['issuedate']))   ? strftime("%B %d, %Y ",strtotime($poldet[0]['issuedate']))   : "";
                            
                       }
                       $issubs = $do_subsidized_stuff->is_subsidized($riskytype);
                       $edarr  = get_extdsc_list($polnum,$regnum,'','');
                       //dbgarr('eddare',$edarr);
                       if ($edarr != "" && $issubs == 1) {
                            $xn = 1; 
                            $subsid_amt = 0;
                            for ($xi=0;$xi <count($edarr);$xi++) {
                                $desc = $edarr[$xi]['desc'];
                                $amt  = $edarr[$xi]['edamt'];         
                                $rate = $edarr[$xi]['edperc'];  
                                $indi = $edarr[$xi]['edindi'];
                                $subsid_amt += $amt;  
                                
                            }
                           $premiumo =  abs($premim) - abs($subsid_amt);
                       }
                       elseif($edarr == "" && $issubs == 1){
                            $premiumo = ($premim/$faprem)*$subsidprem;
                       }
                        
                       if($issubs == 1){
                            $premium = abs($premiumo);
                       } else {
                            $premium = $premim;
                       }
                       $prem_fmt  =  (isset($resarr[$xd]['premium'])) ? number_format($premium,2) :0;
                       ///////////////////////////////////////////////////////////////////////////////////////////////
                       $strdate     =  datedisplay($resarr[$xd]['strdate']);
                        $issuedate  =  (isset($resarr[0]['efcdate'])) ? datedisplay($resarr[0]['efcdate']) : '';
                       
                       if(($glob_client_id == "2011-0315-nemplc") && $polclass == '3'){ //customise cert no for NEM
                         $certnum = $regnum;
                       }
                       
                       if($glob_client_id == "2014-0505-linkageplc" && $polclass == '3'){ 
                        $certnum = $fv_itemcode;
                       } else {
                        $certnum   =  $resarr[0]['certnum'];
                       }
                       
                       $itemdet   =  getitemdet($polnum,$polclass,$regnum);
                      // dbgarr('$itemdet', $itemdet);
                       if ($itemdet != "") {
                        $inv_curr           = ((isset($itemdet['curr'])) && ($itemdet['curr'] != "")) ? $itemdet['curr'] : "";
                        $tin_no             = (isset($itemdet['tin_no'])) ? $itemdet['tin_no']  : '';
                        $fv_vehtype         = (isset($itemdet['vehtype']))? get_id_desc($itemdet['vehtype'],'vehicle_type')."-".get_id_desc($itemdet['model'],'vehicle_model') : '';
                        $item_sumass        = $itemdet['sumass'];
                        $itemdesc1          = $itemdet['itemdesc1'];
                        $itemdesc2          = $itemdet['itemdesc2'];
                        $geolimit           = $itemdet['geolimit'];
                        $num_of_employees   = isset($itemdet['employee_num'])?$itemdet['employee_num']:'';        
                        
                        $limit_loss         = isset($itemdet['limit_loss'])?number_format($itemdet['limit_loss'],2):0;
                        $voyfrom            = isset($itemdet['vfrm'])? $itemdet['vfrm']:'';
                        $voyto              = isset($itemdet['vto'])? $itemdet['vto']:'';
                        $marks              = isset($itemdet['marks'])? $itemdet['marks']:'';
                        $transmode          = isset($itemdet['transmode'])? get_id_desc($itemdet['transmode'],'transmode'):'';
                        $proforma           = isset($itemdet['proformaInvoice']) ? $itemdet['proformaInvoice']:'';
                        //Marine items
                        $bankInterest       = (isset($itemdet['bankInterest']))  ? $itemdet['bankInterest']  : '';
                        $invoicedValue      = (isset($itemdet['invoicedValue'])) ? $itemdet['invoicedValue'] : 0;
                        $clau               = (isset($itemdet['clauses']))       ? $itemdet['clauses']       : '';
                        $sdate              = (isset($itemdet['item_strdate']) && $itemdet['item_strdate'] != '0000-00-00')  ? $itemdet['item_strdate']  : date('Y-m-d');
                        //$clauses            = explode("~", $clau);
                        $clauses            = explode(",", $clau);
                        $warranties         = (isset($itemdet['conditions']))       ? $itemdet['conditions']       : ''; //
                        
                        $fx_rate            = (isset($itemdet['itmgroup']))       ? $itemdet['itmgroup']       : ''; 
                        
                        /////////////////////////////////////////////////////////////////////////////////////
                        $premim   =  (isset($itemdet['curprem'])) ? $itemdet['curprem'] :0;
                        if(!empty($poldet)){
                            $riskytype  = $poldet[0]['risktype']; //fapremium
                            $faprem     = (isset($poldet[0]['fapremium'])) ? $poldet[0]['fapremium'] : 0;
                            $subsidprem = (isset($poldet[0]['curprem']))   ? $poldet[0]['curprem']   : 0;
                        }
                        $issubs = $do_subsidized_stuff->is_subsidized($riskytype);
                        $edarr  = get_extdsc_list($polnum,$regnum,'','');
                        //dbgarr('eddare',$edarr);
                        if ($edarr != "" && $issubs == 1) {
                            $xn = 1; 
                            $subsid_amt = 0;
                            for ($xi=0;$xi <count($edarr);$xi++) {
                                $desc = $edarr[$xi]['desc'];
                                $amt  = $edarr[$xi]['edamt'];         
                                $rate = $edarr[$xi]['edperc'];  
                                $indi = $edarr[$xi]['edindi'];
                                $subsid_amt += $amt;  
                                
                            }
                           $premiumo =  abs($premim) - abs($subsid_amt);
                        }
                        elseif($edarr == "" && $issubs == 1){
                            $premiumo = ($premim/$faprem)*$subsidprem;
                        }
                        
                       if($issubs == 1){
                            $premium = abs($premiumo);
                       } else {
                            $premium = $premim;
                       }
                       $prem_fmt  =  (isset($itemdet['curprem'])) ? number_format($premium,2) :0;
                       ///////////////////////////////////////////////////////////////////////////////////////////////
                       
                        //Policy Holders Currency
                        $curr       = (isset($itemdet['curr'])) ? $itemdet['curr'] : '';
                        $curr_arr   = getgenitems(30,"","");
                        for($c=0; $c<count($curr_arr); $c++){
                            $code = $curr_arr[$c]['code'];
                            if($code == $curr)$curr_val = $curr_arr[$c]['value'];
                        }
                       }
                  
                       //
                       $poldet    = getpolicydet($polnum);
                       //dbgarr('poldet',$poldet);
                       if($poldet !=''){
                        //$fx_rate  = (isset($poldet[0]['fx_rate'])) ? $poldet[0]['fx_rate'] : 0.00;
                        $agencycode= $poldet[0]['polagency'];
                        $agency   = get_id_desc($poldet[0]['polagency'],'agency');
                        //echo "ccccc---".$poldet[0]['polagency']."---";
                        //$agency   = $poldet[0]['polagency'];        
                        $address1 = $poldet[0]['address1'];
                        $cshare   = $poldet[0]['cshare'];
                        //$covdurfrm= datedisplay($poldet[0]['effdate']);
                        $covdurfrm = (isset($poldet[0]['effdate']))   ? datedisplay($poldet[0]['effdate'])   : '0000-00-00';
                        $covdurto = datedisplay($poldet[0]['enddate']);
                        $coinsum  = ($cshare/100)*$resarr[$xd]['sumins'];
                        $coinsum  = number_format($coinsum,2);
                        $title    = $poldet[0]['title'];
                        $title    = $poldet[0]['title']; //prdminute  prdhour  entdate
                        $polprdminute  = (isset($poldet[0]['prdminute'])) ? $poldet[0]['prdminute'] : '00';
                        $polprdhrs     = (isset($poldet[0]['prdhour']))   ? $poldet[0]['prdhour']   : '';
                         if(!empty($polprdhrs) && ($polprdhrs >= 01) && ($polprdhrs < 12)){
                            $polprdhour    = "$polprdhrs : $polprdminute am. ";
                         }
                       
                        elseif(!empty($polprdhrs) && ($polprdhrs >= 12)){
                            $polprdhour    = "$polprdhrs : $polprdminute pm. ";
                        }
                        
                       }
                      }
                      
                      //Signs
                      $signimage1 = "";
                      $signimage2 = "";
                      $secok      = true;
                      $signok1    = false;
                      $signok2    = false;
                       
                       //Sign1
                       if ($sign1 != "") {                 
                        $item = "DOC10";
                        $amt = 0;
                        $autdet = check_authorization($item,$amt,"21",$sign1);   
                        if ($autdet != "") {
                         $signby1      = $autdet['staffname'];
                         $autsign      = $autdet['autsign'];
                         $doccode      = $autdet['doccode'];
                         if ($autsign == "Y") {
                          $signok1 = true;
                          if ($doccode != "") {
                           $docobj1  = $autdet['docobj'];
                           $datatype1= $autdet['datatype']; 
                           $curw    = $autdet['imagew'];
                           $curh    = $autdet['imageh'];
                          
                           $tnail   = adjust_imagesize2($curw,$curh,114,70);  
                           $signw1   = $tnail['w'];
                           $signh1   = $tnail['h'];   
                
                           //
                           $_SESSION['imagedet']['obj'] = $docobj1;
                           $_SESSION['imagedet']['wdt'] = $signw1;
                           $_SESSION['imagedet']['hgt'] = $signh1;
                           $_SESSION['imagedet']['type']= $datatype1;
                           //
                            
                           /* //
                           $fileType = trim($datatype);           
                           $fext     = getimg_ext($fileType);
                           $tfileimg = trim(tempnam($workfolder,"b")) . $fext;                      
                           $fhimg    = fopen($tfileimg, 'w');                      
                           $fwres    = fwrite($fhimg,$docobj);           
                           fclose($fhimg);                
                           $signimage1= $tfileimg;       
                
                           $tnail     = adjust_imagesize($signimage1,114,70);           
                           $signw1    = $tnail['w'];           $signh1   = $tnail['h'];  
                		   */ 
                          }
                         }
                         $secok = false;  
                        } 
                       }
                       else {
                        $secok  = false;
                       }
                
                       //Sign2
                       if ($sign2 != "") {                 
                        $item = "DOC11";
                        $amt = 0;
                        $autdet = check_authorization($item,$amt,"21",$sign2);   
                        if ($autdet != "") {
                         $signbY2      = $autdet['staffname'];
                         $autsign      = $autdet['autsign'];
                         $doccode      = $autdet['doccode'];
                         if ($autsign == "Y") {
                          $signok2 = true;
                          if ($doccode != "") {
                           $docobj  = $autdet['docobj'];
                           $datatype= $autdet['datatype']; 
                           
                           $docobj2  = $autdet['docobj'];
                           $datatype2= $autdet['datatype']; 
                           $curw    = $autdet['imagew'];
                           $curh    = $autdet['imageh'];
                          
                           $tnail   = adjust_imagesize2($curw,$curh,114,70);  
                           $signw2   = $tnail['w'];
                           $signh2   = $tnail['h'];   
                           
                           //
                           $_SESSION['imagedet2']['obj'] = $docobj2;
                           $_SESSION['imagedet2']['wdt'] = $signw2;
                           $_SESSION['imagedet2']['hgt'] = $signh2;
                           $_SESSION['imagedet2']['type']= $datatype2;
                           //
                            
                           /*//
                           $fileType = trim($datatype);           
                           $fext     = getimg_ext($fileType);
                           $tfileimg = trim(tempnam($workfolder,"b")) . $fext;                      
                           $fhimg    = fopen($tfileimg, 'w');                      
                           $fwres    = fwrite($fhimg,$docobj);           
                           fclose($fhimg);            
                           $signimage2= $tfileimg;           
                           $tnail = adjust_imagesize($signimage2,114,70);           
                           $signw2   = $tnail['w'];           
                           $signh2   = $tnail['h'];
                		   */   
                          }
                         }
                         $secok = false;  
                        } 
                       }
                       else {
                        $secok  = false;
                       }
                      $poldetails =  getpolicydet($polnum);
                      if($poldetails) $cliencode   = $poldetails[0]['clientcode'];
                       $clients = getclient($cliencode, "");
                      if($clients){
                       $clientemail = $clients[0]['email'];
                       $contactname = $clients[0]['insured'];
                      }
                      //echo "clientemail==$clientemail, contactname==$contactname<br />";
                      
                     // include($fname2); 
                     if($resarr=='')$testc=0;      
                     }    
                     if ($findi == true) {
                      //include($fname3);
                     }      
                     $testc = false; 
                     if($clientemail !=""){
                       $fv_otherview = "pdfbut";
                       $fv_dest = 1;
                       $secok = false;              
                       
                     }    
                    // $clientemail = $fv_emailaddr;
                    
                     //
                     if ($secok == false) {
                      //Get Buffer Content and Flush
                        $filename =   require $fname2;
                        $curdocbuf = ob_get_contents();
                     
                     if($fv_otherview == 'pdfbut'){
                        //
                        file_put_contents("pdfprocessor.html",$curdocbuf);
                       // header("Location:pdfprocessor.php?header=discharge_voucher");
                        
                     }
                     ob_end_flush();
                     
                             
                     
                     //Send Email    
                     //$clientemail = $_SESSION['Email'];
                     
                      //if (($fv_dest == 1) || ($fv_dest == 2)) { 
                      // if ($clientemail != "") { 
                      //  $resp = send_email(1,"Accounts",$clientemail,"",$curdocbuf,"",$contactname,$polnum,$dcnumber);
                      //} 
                      //}      
                   // sanni@gmail.com
                    if (($fv_dest == 1) || ($fv_dest == 2)) { 
                      if (($clientemail != "")) { 
                      // echo "clientemail==$clientemail";
                        $to_pdf = new Rep_to_pdf();
                        $to_pdf->setDomHtml("Report");
                        $file = $to_pdf->proccess($curdocbuf, false);
                        $ovar['ftype'] = 'pdf';
                        $from = 'claims@nem-insurance.com'; //"Claims Unit"
                        
                        $resp = send_email(1,"Acounts",$clientemail,"",$file,"",$contactname,$polnum,$dcnumber,$ovar);
                                
                        if ($resp){
                            //echo "Ochiwu";
                           ob_end_clean();
                           $fv_messagehold  = "Email sent "; 
                           $return['download'] = $fv_messagehold; 
                           
                          // dbgarr("return",$return); 
                                    
                        }
                        else{
                            //echo "Error == {$_SESSION['curerror']}";            
                            $fv_messagehold = "Email not sent " ;
                        }
                      }
                     }               
                     }
                     else {
                     
                     }
                     //
                    }
                   }
              
               //echo "link==$link"; 
            }else{
              $return['status']   = 0; 
              $return['message'] = "We don't have your records";   
            }  
                
            }else{
               $return['status']   = 0; 
               $return['message'] = "Policy number can't be blank...";  
            }
            
            
    }
    else if($op_mode=="EBRistype"){
         $geninfo = getgenitems(21,"",1);
         
         $geninfo     = $generalinfo->getRecs("", "((itemsub = '1') and (itemid = '21'))", "itemid, itemdesc,itemclass,itemval,itemsub,
                      rfvalue, itemval2, itemval3, itemval4, itemval5,
                      itemval6");
         
         $xi = 0;
         foreach($geninfo as $item){
            $return[$xi]['desc']        = $item['itemdesc'];
            $return[$xi]['code_to_use'] = $item['itemclass'];
         
           $xi++; 
         }
    }
    
    else if($op_mode=="EBCovertypes"){
         
         $geninfo     = $generalinfo->getRecs("", "((itemid = '23') and (itemclass='11000') OR (itemclass='13000'))", "itemid, itemdesc,itemclass,itemval,itemsub,
                      rfvalue, itemval2, itemval3, itemval4, itemval5,
                      itemval6");
                      
                      echo $generalinfo->get_query();
         
         $xi = 0;
         foreach($geninfo as $item){
            $return[$xi]['desc']        = $item['itemdesc'];
            $return[$xi]['code_to_use'] = $item['itemclass'];
         
           $xi++; 
         }
    }
    
    else if($op_mode=="EBBusinessTypes"){
        
        $risktype             = (isset($request['risktype']) && ($request['risktype'] != "")) ? $request['risktype'] : "";
                    
         
         $geninfo     = $generalinfo->getRecs("", "((itemsub = '$risktype') and (itemid = '22'))", "itemid, itemdesc,itemclass,itemval,itemsub,
                      rfvalue, itemval2, itemval3, itemval4, itemval5,
                      itemval6");
         
         $xi = 0;
         foreach($geninfo as $item){
            $return[$xi]['desc']        = $item['itemdesc'];
            $return[$xi]['code_to_use'] = $item['itemclass'];
         
           $xi++; 
         }
    }
    
    else if($op_mode=="EBVehicleMake"){
                    
         
         $geninfo     = $generalinfo->getRecs("", "(itemid = '24')", "itemid, itemdesc,itemclass,itemval,itemsub,
                      rfvalue, itemval2, itemval3, itemval4, itemval5,
                      itemval6");
         
         $xi = 0;
         foreach($geninfo as $item){
            $return[$xi]['desc']        = $item['itemdesc'];
            $return[$xi]['code_to_use'] = $item['itemclass'];
         
           $xi++; 
         }
    }
    
    else if($op_mode=="EBGetagency"){
                    
         $itemrow = getagency("","A",1);
         
         $xi = 0;
         foreach($itemrow as $item){
            $return[$xi]['name']    = $item['name'];
            $return[$xi]['code'] = $item['code'];
           $xi++; 
         }
    }
    
    else if($op_mode=="EBVehicleModel"){
        
        $vehiclemake             = (isset($request['vehiclemake']) && ($request['vehiclemake'] != "")) ? $request['vehiclemake'] : "";
                    
         
         $geninfo     = $generalinfo->getRecs("", "((itemsub = '$vehiclemake') and (itemid = '27'))", "itemid, itemdesc,itemclass,itemval,itemsub,
                      rfvalue, itemval2, itemval3, itemval4, itemval5,
                      itemval6");
         
         $xi = 0;
         foreach($geninfo as $item){
            $return[$xi]['desc']        = $item['itemdesc'];
            $return[$xi]['code_to_use'] = $item['itemclass'];
         
           $xi++; 
         }
    }
                   
      return $return;                  
             
     }
     public function getcurl($request,$url){
        
        //  https://ies.royalexchangeplc.com/demo_general_29JAN2020/gen_demo_api/ies_connect.php?process=users&opmode=EBCCreateNEWCustomer
            $token = "Bearer 39109f7df56e1051c399e685066bb852";
            $ch = curl_init(); //init curl
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '.$token)); 
            //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/1.0 (Windows NT 6.1; WOW64; rv:28.0) Gecko/20100101 Firefox/28.0'); //setting our user agent
            curl_setopt($ch, CURLOPT_URL, $url); //setting our api post url
            //curl_setopt($ch, CURLOPT_COOKIEJAR, '.txt'); //saving cookies just in case we want
            //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // call return content
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); //navigate the endpoint
            curl_setopt($ch, CURLOPT_POST, true); //set as post
            //curl_setopt($ch, CURLOPT_SAVE_UPLOAD, 1); // set the save upload to ensure the @ symbol for the upload is honored.
            //curl_setopt($ch, CURLOPT_POSTFIELDS, $BODY); // set our $BODY 
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request)); // set our $BODY

            $response = curl_exec($ch); // start curl navigation
            curl_close($ch);
            //echo "curl error = ". curl_error ( $ch );
            if ($response === false) echo "curl error = ". curl_error ( $ch );
            
            curl_close($ch);
           // print_r($response);
            return $response;
     }
}
?>