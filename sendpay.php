<?php
function payStack ($amount, $tnx_email, $first_name, $last_name) {
  if ($first_name == '') {
    $first_name = $_SESSION['cothname'];
  }
  if ($last_name == '') {
    $last_name = $_SESSION['csurname'];
  }
  if ($tnx_email == '') {
    $tnx_email = $_SESSION['cemail'];
  }
  $url = "https://api.paystack.co/transaction/initialize";
  $fields = [
    'email' => $tnx_email,
    'amount' => $amount * 100,
    'callback_url' => 'http://localhost:81/cp_prod/client_portal/payment',
    'first_name' => $first_name, 
    'last_name' => $last_name, 
  ];
  $fields_string = http_build_query($fields);
  //open connection
  $ch = curl_init();
  
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer sk_test_fbb82cc49e65f56e5087d0947e1f416157184489",
    "Cache-Control: no-cache",
  ));
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  
  //execute post
  $result = curl_exec($ch);
  $res = json_decode($result, true);
  return $res;

}

function verifyPayment ($reference) {
  $curl = curl_init();
  $url =  "https://api.paystack.co/transaction/verify/".$reference;
  echo "$url";
  curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_fbb82cc49e65f56e5087d0947e1f416157184489",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
    
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    // echo $response;
    $res = json_decode($response, true);
    return $res;
  }
}
  
?>