<?php
  include('session_var.php');
  include('postCurl.php');
 ini_set("display_errors", 0);
//  echo "<pre>";
//  print_r($_SESSION);
//  echo "</pre>";

   $_REQUEST['life_gen_opt'] = $_SESSION['life_gen_opt'];

  $_REQUEST['opt']          = $_SESSION['opt'];

  $_REQUEST['csurname']     = $_SESSION['csurname'];

  $_REQUEST['cothname']     = $_SESSION['cothname'];

  $_REQUEST['cemail']       = $_SESSION['cemail'];

  $_REQUEST['cgsm']         = $_SESSION['cgsm'];

  $_REQUEST['insureval']    = $_SESSION['insureval'];

  $_REQUEST['desiredprem']  = $_SESSION['desiredprem'];

  $_REQUEST['covdur']       = $_SESSION['covdur'];

  $_REQUEST['dbirth']       = $_SESSION['dbirth'];
  $_REQUEST['curdate']      = $_SESSION['curdate'];

  $_REQUEST['premfrq']      = $_SESSION['premfrq'];
  $_REQUEST['covertype']    = $_SESSION['covertype'];
    
  $_REQUEST['coverprdstart']= $_SESSION['coverprdstart'];
    
  $_REQUEST['coverprdend']  = $_SESSION['coverprdend'];
  $_REQUEST['term']         = $_SESSION['term']; 
  $_REQUEST['prem']         = $_SESSION['prem'];  

  

  if(isset($_SESSION['usercode'])){
    $_REQUEST['userid'] = $_SESSION['usercode'];
  } 
    // echo "<pre> request  ";
    // print_r($_REQUEST);
    // echo "</pre>";

    
if($_SESSION['life_gen_opt'] == "G") $token = "Bearer 39109f7df56e1051c39YNM9e6YK85066bb852";
else  $token = "Bearer 39109f7df56e1051c399e685066bb852"; 

        $callName = new postGetCurl();
   
       if($_SESSION['life_gen_opt'] == "G"){
        
         $url   = "http://35.189.125.141/demo_general/gen_demo_api/ies_connect.php?process=users&opmode=EBCCreateUser&life_gen-opt={$_SESSION['life_gen_opt']}";
         
        // var_dump(51,$_REQUEST);
         $response = $callName->sendPost($_REQUEST,$url,$token);
         
          $_SESSION['usercode'] = $response['result']['userid'];
          
          $status = $response['result']['status'];
           
           $usercode = $_SESSION['usercode'];
          
             
             if($status == 1 || $usercode ==""){
                
                 $url   = "http://35.189.125.141/demo_general/gen_demo_api/ies_connect.php?process=users&opmode=emailValidation&cltemail={$_REQUEST['cemail']}&life_gen_opt={$_SESSION['life_gen_opt']}";
      
                 $response_email = $callName->sendGet($url,$token);
                 $_SESSION['usercode']  = $response_email['result']['message'];
                 $_SESSION['userid']  = $_SESSION['usercode'];
                 $usercode = $_SESSION['usercode'];
                // echo "user == $usercode";
             }
             
         
          if($usercode){
            
          
           $url    = "http://35.189.125.141/demo_general/gen_demo_api/ies_connect.php?process=users&opmode=getqoute&userid=$usercode&life_gen_opt={$_SESSION['life_gen_opt']}";
            
           $result = $callName->sendGet($url,$token);
         
           //var_dump(4, $result);
           
           $lphone      = $result['result']['lphone'];
           $gsm         = $result['result']['gsm'];
           $email       = $result['result']['email'];
           $term        = $result['result']['term'];
           $address1    = $result['result']['address1'];
           $effdate     = $result['result']['effdate'];
           $enddate     = $result['result']['enddate'];
           $empaddr1    = $result['result']['empaddr1'];
           $othnames    = $result['result']['othnames'];
           $lname       = $result['result']['lname'];
           $fname       = $result['result']['fname'];
           $address1    = $result['result']['address1']; 
           $insureval   = $result['result']['insureval'];
           $dob         = $result['result']['dob'];
           
          // echo "insureval == $insureval";
         }   
       }
         else {

          $token =  "Bearer 39109f7df56e1051c399e685066bb852";  
          $url   = "http://35.189.125.141/demo_life/api_ies/ies_connect.php?process=users";

          $response = $callName->sendPost($_REQUEST,$url,$token);
         
         
      
            $url   = "http://35.189.125.141/demo_life/api_ies/ies_connect.php?process=emaildetails&cltemail={$_REQUEST['cemail']}&life_gen_opt={$_SESSION['life_gen_opt']}";
 
            $response = $callName->sendGet($url,$token);
            //var_dump($response);
            $_SESSION['usercode']  = $response['result']['userid'];
            
            $usercode = $_SESSION['usercode'];
            //echo "user == $usercode";
    
        
      
        
         if($usercode){
           
            /*echo "<pre>";
            print_r($response);
            echo "</pre>";*/
            
           $url    = "http://35.189.125.141/demo_life/api_ies/ies_connect.php?process=getqoute&userid=$usercode";
    
           $result = $callName->sendGet($url,$token);
          // var_dump($result);

           $lphone      = $result['result']['lphone'];
           $gsm         = $result['result']['gsm'];
           $email       = $result['result']['email'];
           $fax         = $result['result']['fax'];
           $address1    = $result['result']['address1'];
           $empname     = $result['result']['empname'];
           $empphone    = $result['result']['empphone'];
           $empaddr1    = $result['result']['empaddr1'];
           $title       = $result['result']['title'];
           $lname       = $result['result']['lname'];
           $fname       = $result['result']['fname'];
           $othnames    = $result['result']['othnames'];
           $address1    = $result['result']['address1'];
           $empname     = $result['result']['empname'];
           $empphone    = $result['result']['empphone'];
           $empaddr1    = $result['result']['empaddr1']; 
           $insureval   = $result['result']['insureval'];
           $desiredprem = $result['result']['desiredprem'];
           $premfrq     = $result['result']['premfrq'];
           $covertype   = $result['result']['covertype']; 
           $sumass      = $result['result']['sumass'];
           $covdur      = $result['result']['covdur'];
           $dob         = $result['result']['dob'];
           $init_contrib         = $result['result']['init_contrib'];
           
          }
         
        }
    
        $_SESSION['userid']  = $_SESSION['usercode'];
//var_dump(31,$_SESSION);
 include('header_initail_signup.php');
 ?>


<!------ Include the above in your HEAD tag ---------->
<style>
.steps-form-3 {
    width: 2px;
    height: 970px;
    position: relative;
}

.steps-form-3 .steps-row-3 {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
}

.steps-form-3 .steps-row-3:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: "";
    width: 2px;
    height: 100%;
    background-color: #7283a7;
}

.steps-form-3 .steps-row-3 .steps-step-3 {
    height: 200px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    text-align: center;
    position: relative;
}

.steps-form-3 .steps-row-3 .steps-step-3.no-height {
    height: 50px;
}

.steps-form-3 .steps-row-3 .steps-step-3 p {
    margin-top: 0.5rem;
}

.steps-form-3 .steps-row-3 .steps-step-3 button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.steps-form-3 .steps-row-3 .steps-step-3 .btn-circle-3 {
    width: 60px;
    height: 60px;
    border: 2px solid #59698D;
    background-color: white !important;
    color: #59698D !important;
    border-radius: 50%;
    padding: 18px 18px 15px 15px;
    margin-top: -22px;
}

.steps-form-3 .steps-row-3 .steps-step-3 .btn-circle-3:hover {
    border: 2px solid #4285F4;
    color: #4285F4 !important;
    background-color: white !important;
}

.steps-form-3 .steps-row-3 .steps-step-3 .btn-circle-3 .fa {
    font-size: 1.7rem;
}



.steps-forms-3 {
    width: 2px;
    height: 500px;
    position: relative;
}

.steps-forms-3 .steps-row-3 {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
}

.steps-forms-3 .steps-row-3:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: "";
    width: 2px;
    height: 100%;
    background-color: #7283a7;
}

.steps-forms-3 .steps-row-3 .steps-step-3 {
    height: 170px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    text-align: center;
    position: relative;
}

.steps-forms-3 .steps-row-3 .steps-step-3.no-height {
    height: 50px;
}

.steps-forms-3 .steps-row-3 .steps-step-3 p {
    margin-top: 0.5rem;
}

.steps-forms-3 .steps-row-3 .steps-step-3 button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.steps-forms-3 .steps-row-3 .steps-step-3 .btn-circle-3 {
    width: 60px;
    height: 60px;
    border: 2px solid #59698D;
    background-color: white !important;
    color: #59698D !important;
    border-radius: 50%;
    padding: 18px 18px 15px 15px;
    margin-top: -22px;
}

.steps-forms-3 .steps-row-3 .steps-step-3 .btn-circle-3:hover {
    border: 2px solid #4285F4;
    color: #4285F4 !important;
    background-color: white !important;
}

.steps-forms-3 .steps-row-3 .steps-step-3 .btn-circle-3 .fa {
    font-size: 1.7rem;
}
</style>

<body>
    <div class="container-fluid register">
        <div style="height:100%;" class="row">
            <div class=" form-width2 row">


                <!--input type="submit" name="" value="Login"/><br/-->
                <!--a href="logout"><button type="submit" value="" class="btn btn-primary btn-block">Register</button></a-->




                <!--ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
      <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
      </li>
      <li class="nav-item">
          <!--a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hirer</a>
      </li>
  </ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <!--h3 class="register-heading">Apply as a Employee</h3-->
                <div class="tab-content register-right2 " id="myTabContent">
                    <div class="name-tag">
                        <!-- <p style="font-size:20px;">Welcome to A&G Insurance Plc</p> -->
                        <a href="http://aginsuranceplc.com/develop/"> <img src="dist/img/ag.png" alt="" style=" height:80px; width
  :180px" /> </a>
                        </br>
                        </br>


                        <p style="color:blue;">Life and General Insurance made easy!</p>

                    </div>

                    <div class="row register-form">

                        <div class="col-md-10">

                            <div class="">
                                <div class="">

                                    <!--p class="login-box-msg"><h2 style="text-align: center;">Fill in Your Proposal</h2></p-->

                                    <!-- <form action="submit_proposal" method="post" id="quickForm" onsubmit="return checkForm(this)";> -->


                                    <!-- <form action="submit_proposal" method="post">
    Name
   <input type="text" id="name" name="name">
   <button class="btn btn-success btn-rounded float-right" type="submit">Submit</button>
    </form> -->
                                    <form action="submit_proposal" method="post" id="getstarted"
                                        onsubmit="return checkForm(this)">
                                        <div id="product_msg" class="center bold">

                                        </div>
                                        <!-- Grid row -->
                                        <?php 
   if($_SESSION['life_gen_opt'] == "G"){
    include('general_proposal.php');
   }else {
    include('life_proposal.php');
   }
   
   
   ?>
                                        <!-- Grid row -->

                                    </form>
                                </div>
                                <!-- /.form-box -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
    <script>
    $(document).ready(function() {
        var navListItems = $('div.setup-panel-3 div a'),
            allWells = $('.setup-content-3'),
            allNextBtn = $('.nextBtn-3'),
            allPrevBtn = $('.prevBtn-3');

        allWells.hide();

        navListItems.click(function(e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-info').addClass('btn-pink');
                $item.addClass('btn-info');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allPrevBtn.click(function() {
            var curStep = $(this).closest(".setup-content-3"),
                curStepBtn = curStep.attr("id"),
                prevStepSteps = $('div.setup-panel-3 div a[href="#' + curStepBtn + '"]').parent().prev()
                .children("a");

            prevStepSteps.removeAttr('disabled').trigger('click');
        });

        allNextBtn.click(function() {
            var curStep = $(this).closest(".setup-content-3"),
                curStepBtn = curStep.attr("id"),
                nextStepSteps = $('div.setup-panel-3 div a[href="#' + curStepBtn + '"]').parent().next()
                .children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;
            console.log('cur', curStep);

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    // if (!checkForm()){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }


            }

            if (isValid) {

                // if (curStep.dd_title.value == ""){
                // // if (!checkForm()){

                //     isValid = false;
                //     $(curInputs[i]).closest(".form-group").addClass("has-error");
                // }  

                if (checkForm(getstarted) == "false") {
                    return false;
                    nextStepSteps.removeAttr('disabled').trigger('click');

                } else {


                    nextStepSteps.removeAttr('disabled').trigger('click');
                }
            }
        });

        $('div.setup-panel-3 div a.btn-info').trigger('click');
    });
    </script>
    <?php include('footer_initial_signup.php'); ?>