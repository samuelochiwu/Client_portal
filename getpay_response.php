<?php
session_start();
include('session.php');
var_dump(11, $_SESSION);
//$subpdtid = 6204; // collegpay your product ID
$subpdtid = 6205; // your product ID
$submittedamt = $_SESSION['payment']["amount"];
$submittedref = $_SESSION['payment']['txnref'];

        $nhash = "D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F" ; // the mac key sent to you
        //CP $nhash = "E187B1191265B18338B5DEBAF9F38FEC37B170FF582D4666DAB1F098304D5EE7F3BE15540461FE92F1D40332FDBBA34579034EE2AC78B1A1B8D9A321974025C4" ; // the mac key sent to you
        $hashv = $subpdtid.$submittedref.$nhash;  // concatenate the strings for hash again
$thash = hash('sha512',$hashv); 

$parami = array(
        "productid"=>$subpdtid,
        "transactionreference"=>$submittedref,
        "amount"=>$submittedamt
);
$payparams = http_build_query($parami);

$url = "https://sandbox.interswitchng.com/webpay/api/v1/gettransaction.json?" . $payparams; // json
//FROM OUTSIUDE (NOTE SSL) = "https://stageserv.interswitchng.com/test_paydirect/api/v1/gettransaction.json?$ponmo"; // json
//stageserv.interswitchng.com stageserv.interswitchng.com note the variables appended to the url as get values for these parameters
// https://sandbox.interswitchng.com/webpay/api/v1/gettransaction.json?productid=6205&transactionreference=JB2333320&amount=5000

$headers = array(
        "GET /HTTP/1.1",
        "Host: sandbox.interswitchng.com",
        "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1) Gecko/2008070208 Firefox/3.0.1",
        //"Content-type:  multipart/form-data",
        //"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8", 
        "Accept-Language: en-us,en;q=0.5",
        //"Accept-Encoding: gzip,deflate",
        //"Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7",
        "Keep-Alive: 300",
        "Connection: keep-alive",
        "Hash: " . $thash
    );        
// print_r2($headers);
// echo $url;

$ch = curl_init();  //INITIALIZE CURL///////////////////////////////
//               
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 60); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
curl_setopt($ch, CURLOPT_POST, false );
//
$data = curl_exec($ch);  //EXECUTE CURL STATEMENT///////////////////////////////
$json = null;



if (curl_errno($ch)) 
{ 
  echo 'fail';
        print "Error: " . curl_error($ch) . "</br></br>";

        $errno = curl_errno($ch);
        $error_message = curl_strerror($errno);
        print $error_message . "</br></br>";;

        print_r($headers);

}
else 
{  
  echo 'success';
        // Show me the result
        $json = json_decode($data, TRUE);
echo "<br>$url<br>";
        curl_close($ch);    //END CURL SESSION///////////////////////////////
  
        print_r($json);
        // loop through the array nicely for your UI

}

session_write_close();

function print_r2($val)
{
        echo '<pre>';
        print_r($val);
        echo  '</pre>';
}

?>
</body>

</html>