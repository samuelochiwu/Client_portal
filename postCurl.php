<?php 
class postGetCurl{
    
    public function sendPost($request, $url,$token){
      
       $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_POSTFIELDS => http_build_query($request),
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER =>array('Authorization: '.$token),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            
          $response = json_decode($response, true);
         }
    return $response;
    }
    
   public function sendGet($url,$token){

    //echo "url ==$url, token == $token ";
       $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array('Authorization: '.$token),
        ));
        
        $response = curl_exec($curl);
        
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            
          $response = json_decode($response, true);
         }
        
        return $response;
        
    
    }
}

?>