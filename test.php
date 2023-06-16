<?php 


$query = $_GET['q'];

$url = 'https://newsapi.org/v2/everything';

    $data = array (
        'q' => $query,
        'apiKey' => '09753446fca44cacb7c003acadce1369'
        );
        
        $params = '';
    foreach($data as $key=>$value)
                $params .= $key.'='.$value.'&';
         
        $params = trim($params, '&');

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url.'?'.$params ); //Url together with parameters
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7); //Timeout after 7 seconds
    curl_setopt($ch, CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    
        $result = curl_exec($ch);
    curl_close($ch);

if(curl_errno($ch))  //catch if curl error exists and show it
  echo 'Curl error: ' . curl_error($ch);
else

  $res = json_decode($result);
  echo "<pre>";
  print_r($res);


?>