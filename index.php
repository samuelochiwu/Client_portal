<?php
session_start();
 include('postCurl.php');
 //ini_set("display_errors","0");
//  $userid = "";
 if(isset($_POST['signin'])){
  $email = "";
 if(isset($_REQUEST['email'])){
    $email = $_REQUEST['email'];
    }
     $password= "";
    if(isset($_REQUEST['password'])){
      $password = $_REQUEST['password'];
    }
    
    
// echo "email == $email";
 
 $token = "Bearer 39109f7df56e1051c399e685066bb852";
      
 $callName = new postGetCurl();
      
 $url   = "http://35.189.125.141/demo_life/api_ies/ies_connect.php?process=emaildetails&cltemail=$email";
      
 $response_email = $callName->sendGet($url,$token);
 //echo "response_email ==$response_email";
 $userid = $response_email['result']['userid'];
 
 
// $_SESSION['userid'] = "";

 if($response_email){
   
    
   // $_SESSION['userid'] = $response_email['result']['userid'];
    
    
    $_SESSION['userid']   = $response_email['result']['userid'];
    $_SESSION['cltemail'] = $response_email['result']['cltemail'];
    $_SESSION['cltfname'] = $response_email['result']['cltfname'];
    $_SESSION['cltlname'] = $response_email['result']['cltlname'];
    $_SESSION['cgsm']     = $response_email['result']['cgsm'];
    
    
    $ovars['id'] = $_SESSION['userid'];
    $ovars['pass'] = $password;
   
    
    $url   = "http://35.189.125.141/demo_life/api_ies/ies_connect.php?process=login";
    
    $respons_login = $callName->sendPost($ovars,$url,$token);
    
    if($respons_login['result']['msg'] == "Authenticated"){
      //  echo "samuel";
     header("Location: proposal");  
     exit(); 
    }
 }
}
 
?>
<?php include('header_initail_signup.php'); ?>
<!------ Include the above in your HEAD tag ---------->
<div class="container-fluid register">
<div style="height:100%" class="row">

<div class=" form-width2 row">
  <!--ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
      <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
      </li>
      <li class="nav-item">
          <!--a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hirer</a>
      </li>
  </ul-->
  <!-- <div class=" register-left"> -->
  <div class="auth-image ">
    <!-- <img src="plugins/jquery-ui/images/form3.jpg" width="102%" height="100%" object-fit="contain"/>  --></div>
<div class="tab-content register-right " id="myTabContent">
<div class="tab-pane fade show active  " id="home" role="tabpanel" aria-labelledby="home-tab">
  <!--h3 class="register-heading">Apply as a Employee</h3-->
  <div class="name-tag">
    <!-- <p style="font-size:20px;">Welcome to A&G Insurance Plc</p> -->
 <a href="http://aginsuranceplc.com/develop/"> <img src="dist/img/ag.png" alt="" style=" height:80px; width
  :180px"/> </a>
  </br>
</br>


  <p style="color:blue;">Life and General Insurance made easy!</p>
 
</div>
  <div class="row register-form">
    <div class= "form-width ">
      <div class="">
        <div class="">
          <p  class="login-box-msg">Sign in to start your session</p>

          <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
            <div class="input-group mb-3">
              <input type="email" required="required" name="email" class="form-control" placeholder="Enter Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" required="required" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Remember Me

                  </label>
                </div>
              </div>
              <!-- /.col -->

              <div class="col-4">
                <button type="submit"  name="signin" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>


          <p class="mb-1">
            <a href="forgotpass">I forgot my password</a>
          </p>
          <p class="mb-0">
            <a href="register" class="text-center">Are you a new user? Get Started </a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

</div>
<?php include('footer_initial_signup.php'); ?>
