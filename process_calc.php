<?php
session_start();
ini_set("display_errors", "0");
include('postCurl.php');
include('header_initail_signup.php');
// echo "<pre>";
//  print_r($_SESSION);
//  echo "</pre>";



if(isset($_SESSION['life_gen_opt'])){
  $life_gen_opt = $_SESSION['life_gen_opt'];
}

// if(isset($_REQUEST['opt'])){
//   $_SESSION['opt'] = $_REQUEST['opt'];
// }

//     if($_SESSION['opt'] == "01075" || $_SESSION['opt'] == "01099" || $_SESSION['opt'] == "01100" || $_SESSION['opt'] == "01102"){
//      $_SESSION['life_gen_opt'] = "G";   
//     }else {
//         $_SESSION['life_gen_opt'] = "L";
//     }


// if(isset($_REQUEST['csurname'])){
//   $_SESSION['csurname'] = $_REQUEST['csurname'];
// }
// if(isset($_REQUEST['cothname'])){
//   $_SESSION['cothname'] = $_REQUEST['cothname'];
// }
// if(isset($_REQUEST['cemail'])){
//   $_SESSION['cemail'] = $_REQUEST['cemail'];
// }
// if(isset($_REQUEST['cgsm'])){
//   $_SESSION['cgsm'] = $_REQUEST['cgsm'];
// }
//  echo "<pre>";
//  print_r($_SESSION);
//  echo "</pre>";
?>
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
            <div class="tab-content register-right " id="myTabContent">
                <div class="tab-pane fade show active  " id="home" role="tabpanel" aria-labelledby="home-tab">
                    <!--h3 class="register-heading">Apply as a Employee</h3-->
                    <div class="name-tag">
                        <!-- <p style="font-size:20px;">Welcome to A&G Insurance Plc</p> -->
                        <img src="dist/img/ag.png" alt="" style=" height:80px; width
  :180px" />
                        <p style="color:blue;">Life and General Insurance made easy!</p>

                    </div>
                    <div class="row register-form">
                        <div class="form-width form-trans ">
                            <div class="">
                                <div class="card-header ">
                                    <h4 style="color:blue; text-align:center;" class="">Calculator Wizard</h4>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <?php if ($life_gen_opt == "G"){ ?>
                                <form role="form" method="POST" action="calculator_desc" id="quickForm"
                                    onsubmit="return checkForm(this)" ;>
                                    <?php } else { ?>
                                    <form role="form" method="POST" action="calculator_desc" id="quickForm"
                                        onsubmit="return checkForms(this)" ;>
                                        <?php }?>
                                        <input type="hidden" name="life_gen_opt"
                                            value="<?php echo $life_gen_opt; ?>" class="form-control">
                                        <input type="hidden" name="opt" value="<?php echo $_SESSION['opt'];?>"
                                            class="form-control">
                                        <input type="hidden" name="csurname" value="<?php echo $_SESSION['csurname'];?>"
                                            class="form-control">

                                        <input type="hidden" name="cothname" value="<?php echo $_SESSION['cothname'];?>"
                                            class="form-control">
                                        <input type="hidden" name="cemail" value="<?php echo $_SESSION['cemail'];?>"
                                            class="form-control">
                                        <input type="hidden" name="cgsm" value="<?php echo $_SESSION['cgsm'];?>"
                                            class="form-control">
                                        <div class="card-body">

                                            <?php 
                                            if($life_gen_opt == "G"){
                                               
                                             include('general_calculator.php'); 
                                               
                                            }else{
                                               include('life_calculator.php'); 
                                            }
                                             
                                            ?>

                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer process-cal-btn">
                                            <button type="submit" class="btn btn-primary"
                                                name="calculate">Calculate</button>
                                        </div>
                                    </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include('footer_initial_signup.php'); // ?>