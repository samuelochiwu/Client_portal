<?php 
    session_start();
    include('postCurl.php');
   // ini_set("display_errors","0");

    $_SESSION = array();
   //  session_destroy();
     $option = "";
    
    if(isset($_GET['option'])){
        
     $option = $_GET['option']; 
       
    }    
    
    $alert = '';
    $life_gen_opt = "";
    // if(isset($_REQUEST['life_gen_opt'])){
    //   $life_gen_opt = $_REQUEST['life_gen_opt'];
    // } 
    
         

    
   // var_dump($_REQUEST);

    if(isset($_POST['proceed'])){

        $cemail = "";
        if(isset($_REQUEST['cemail'])){
          $cemail = $_REQUEST['cemail'];
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

   /* if($_SESSION['life_gen_opt'] == "G") $token = "Bearer 39109f7df56e1051c39YNM9e6YK85066bb852";
    else  $token = "Bearer 39109f7df56e1051c399e685066bb852"; */ 
    if(isset($_REQUEST['opt'])){
           $_SESSION['opt'] = $_REQUEST['opt'];
         }
        
         // 01100
    if($_REQUEST['opt'] == "01075" || $_REQUEST['opt'] == "01099" || $_REQUEST['opt'] == "01100" || $_REQUEST['opt'] == "01102"){
        $_SESSION['life_gen_opt'] = "G";   
       }else {
           $_SESSION['life_gen_opt'] = "L";
       }
       
         
       
    $callName = new postGetCurl();
    //var_dump(5, $_SESSION);
    
    if($_SESSION['life_gen_opt'] == "G"){
        
        $token = "Bearer 39109f7df56e1051c39YNM9e6YK85066bb852";
        $url   = "http://35.189.125.141/demo_general/gen_demo_api/ies_connect.php?process=users&opmode=emailValidation&cltemail=$cemail&life_gen_opt={$_SESSION['life_gen_opt']}";
       
       

        $result = $callName->sendGet($url,$token); 
     //var_dump('gen', $result);
     
     $cltemail = $result['result']['cltemail'];
    }
    else {
     // echo "email == $cemail";
      $token = "Bearer 39109f7df56e1051c399e685066bb852";
     $url    = "http://35.189.125.141/demo_life/api_ies/ies_connect.php?process=emaildetails&cltemail=$cemail";
        
     $result = $callName->sendGet($url,$token); 
     //var_dump('L',$result);
     
     $cltemail = $result['result']['cltemail'];
     //echo "cltemail == $cltemail";
    }
   // echo "cltemail == $cltemail";
     if($cltemail==$cemail) {
       
      $alert = "Email exist, please login to continue";
      //echo $alert;
        
     } elseif (($cltemail!="") ||(!$cltemail==$cemail)) {
         
       header("Location: process_calc.php");
     }
     
    }
     include('header_initail_signup.php');

?>

<!------ Include the above in your HEAD tag ---------->
<script type="text/javascript">
function checkForm(form) {

    if (this.opt.value == "") {
        //alert("Please select your product plan");
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b> Please select your product plan</span>");
        //this.opt.focus();
        return false;
    }


    if (this.csurname.value == "") {
        //alert("Please enter your SurName in the form");
        $('#product_msg').html(
            "<span class='btn btn-danger'><b>ERROR:</b> Please enter your SurName in the form</span>");
        //this.csurname.focus();
        return false;
    }

    if (this.cothname.value == "") {
        //alert("Please enter your Other Names in the form");
        $('#product_msg').html(
            "<span class='btn btn-danger'><b>ERROR:</b> Please enter your Other Names in the form</span>");

        //this.cothname.focus();
        return false;
    }

    // if(this.cemail.value == "" || !this.valid_email.checked) {
    if (this.cemail.value == "") {
        //alert("Please enter a valid Email address");
        $('#product_msg').html("<span class='btn btn-danger'><b>ERROR:</b> Please enter a valid Email address</span>");

        //this.cemail.focus();
        return false;
    }

    if (this.cgsm.value == "") {

        $('#product_msg').html(
            "<span class='btn btn-danger'><b>ERROR:</b> Please enter your Phone Number in the form</span>");

        //this.cothname.focus();
        return false;
    }




    $('#product_msg').html('');

    /*if(this.age.value == "" || !this.valid_age.checked) {
      alert("Please enter an Age between 16 and 100");
      this.age.focus();
      return false;
    }*/
    //return false;
}
</script>

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
            <div class="tab-content register-right " id="myTabContent">
                <div class="tab-pane fade show active  " id="home" role="tabpanel" aria-labelledby="home-tab">
                    <!--h3 class="register-heading">Apply as a Employee</h3-->
                    <div class="name-tag">
                        <!-- <p style="font-size:20px;">Welcome to A&G Insurance Plc</p> -->
                        <a href="http://aginsuranceplc.com/develop/"> <img src="dist/img/ag.png" alt="" style=" height:80px; width
  :180px" /> </a>

                        </br>
                        </br>


                        <p style="color:blue;">Life and General Insurance made easy!</p>

                    </div>
                    <div class="row register-form">
                        <div class="form-width ">
                            <div class=" ">
                                <div class="">
                                    <p style="color:blue;" class="login-box-msg">Get a Quote</p>
                                    <p class="email-exist-error"></p>
                                    <form method="post" action="register" id="registerForm"
                                        onsubmit="return checkForm(this)" ;>

                                        <div id="product_msg" class="center bold"></div><br />
                                        <!-- <input type="hidden" name="life_gen_opt" value="<?= $_SESSION['life_gen_opt']; ?>" class="form-control"> -->
                                        <input type="hidden" name="emailexist" id="emailexist"
                                            value="<?php echo $cltemail;?>" class="form-control" />
                                        <?php if($alert !="") { ?>
                                        <div class="alert alert-secondary" role="alert">
                                            <?php  echo $alert; ?>
                                        </div>
                                        <?php ;} ?>

                                        <?php if ($option != ""){?>
                                        <input type="hidden" name="opt" id="opt" value="<?php echo $option;?>"
                                            class="form-control">
                                        <?php } ?>
                                        <?php if ($option == ""){ ?>
                                        <div class="input-group mb-3">
                                            <select name="opt" id="opt" class="form-control">
                                                <option value=""> Select a product plan </option>
                                                <option value="IEEDW">EDUCATIONAL ENDOWMENT 17</option>
                                                <option value="ITARGS3"> A&G Savings Assurance Plan </option>
                                                <option value="ISEINV2">INVESTMENT LINKED POLICY</option>
                                                <!--option value="ITRM_SFG">A&G SCHOOL FEES ASSURANCE PLAN</option>
                                                <option value="IFEA2">A & G Anti Inflation Plan​</option>
                                                <option value="IEEDW2">EDUCATIONAL ENDOWMENT E19</option>
                                                <option value="I3PMP1">A&G Payment Plan</option-->
                                                <option value="01100">Motor-Private</option>
                                                <option value="01075">Motor Third Party</option>
                                                <option value="01099">Motor Commercial</option>
                                                <option value="01102">Motor Trade</option>
                                                <!--option value="FIR_FSPC">FIRE SPECIAL PERILS</option>
                                                <option value="01068">Fire and Business Interruption</option>
                                                <option value="015">FIRE CONSEQUENTIAL LOSS</option>
                                                <option value="012-53">FIRE OTHERS</option>
                                                <option value="FIR_STKF">FIRE STOCK FLOATERS</option>
                                                <option value="FIR_FSPP">FIRE SPECIAL PERILS (PRIVATE)</option>
                                                <option value="030">BURGLARY/THEFT (COMMERCIAL)</option>
                                                <option value="01116">BURGLARY/THEFT (PRIVATE)</option-->

                                            </select>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        <div class="input-group mb-3">
                                            <input type="text" name="csurname" id="csurname" class="form-control"
                                                placeholder="Surname">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <input type="text" name="cothname" id="cothname" class="form-control"
                                                placeholder="Other Names">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="email" id="cemail" name="cemail" class="form-control"
                                                placeholder="Email">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <input type="text" id="cgsm" name="cgsm" class="form-control"
                                                placeholder="Phone Number">
                                            <!--input type="text" name="cgsm" id="cgsm" class="form-control" data-inputmask='"mask": "(999) 999-9999999"' data-mask-->
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-phone"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-8">
                                                <div class="icheck-primary">
                                                    <label for="agreeTerms">
                                                        <!--button onclick="goBack()">Go Back</button-->
                                                        I already have a membership<a href="index"> Login</a>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-4">
                                                <button type="submit" value="submit" name="proceed"
                                                    class="btn btn-primary btn-block">Proceed</button>
                                            </div>
                                            <!-- /.col -->
                                        </div>
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
<?php include('footer_initial_signup.php'); ?>