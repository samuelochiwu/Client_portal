<?php
include('session_var.php');
include('header_initail_signup.php');
?>
<!------ Include the above in your HEAD tag ---------->
 <style>
.register{
 
    /*margin-top: 3%;*/
    padding: 0px;
   opacity: 1;
   background-size: cover;
   overflow: scroll;
   height: 100%;
   

</style>
<div class="container-fluid register">
<div style="height:100%" class="row">

<div class=" form-width2 ">
  <!--ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
      <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
      </li>
      <li class="nav-item">
          <!--a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hirer</a>
      </li>
  </ul-->
  <div class=" auth-image">
    <!--<img src="plugins/jquery-ui/images/form3.jpg" width="102%" height="100%" object-fit="contain"/>--> </div>
<div class="tab-content register-right" id="myTabContent">
<div class="tab-pane fade show active  " id="home" role="tabpanel" aria-labelledby="home-tab">
  <!--h3 class="register-heading">Apply as a Employee</h3-->
  <div class="name-tag">
   <!--<p style="font-size:20px;">Welcome to A&G Insurance Plc</p>-->
   <a href="http://aginsuranceplc.com/develop/"> <img src="dist/img/ag.png" alt="" style="height:80px; width
  :180px"/></a>
  </br>
</br>


<p style="color:blue;">Life and General Insurance made easy!</p>
 
</div>
  <div class="row register-form">
    <div class= "form-width ">
      <div class="">
        <div class="">
          <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

          <form action="recover-password.html" method="post">
            <div class="input-group mb-3">
              <input type="email" required="required" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Request new password</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <p class="mt-3 mb-1">
            <a href="index">Login</a>
          </p>
          <p class="mb-0">
            <a href="register" class="text-center"> Get a Quote</a>
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
