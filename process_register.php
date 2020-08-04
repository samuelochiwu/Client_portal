<?php 
include('postCurl.php');
include('session_var.php');
ini_set("display_errors", "0");

// if(isset($_REQUEST['life_gen_opt'])){
// $_SESSION['life_gen_opt'] = $_REQUEST['life_gen_opt'];
// }

$life_products = ['ITARGS3', 'ITRM_SFG', 'IFEA2', 'ISEINV2', 'I3PMP1', 'IEEDW2', 'IEEDW'];
$plan = $_REQUEST['opt'];
if (in_array($plan, $life_products)) {
$_SESSION['life_gen_opt'] = 'L';
} else {
$_SESSION['life_gen_opt'] = 'G';
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
$user = new postGetCurl();
$url =
'http://104.199.122.248/arm_slash_prod/api_ies/ies_connect.php?process=emaildetails&cltemail='.$_SESSION['cemail'];
$token = 'Bearer 39109f7df56e1051c399e685066bb852';
$mail = $user->sendGet($url, $token);
echo json_encode($mail['result']); 
?>