<?php 


// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$q = $_GET['q'];
$query = rawurlencode($q);
$source = 'techcrunch.com';
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'api.datanews.io/v1/news?q=%22'.$query.'%22&source='.$source.'&sortBy=date&language=en');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'X-Api-Key: 0eek3jlhj7oqyf9txhput0f7y';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
  $res = json_decode($result);
  echo "<pre>";
  print_r($res);
   echo "</pre>";



die();


$source = $_GET['source'];
$q = $_GET['q'];
$query = rawurlencode($q);
$topic = $_GET['topic'];

$url = 'api.datanews.io/v1/news';

    $data = array (
        'q' => $query,
        'source' => $source,
        'sortBy' => 'date',
        'language' => 'en'
        );
        
        $params = '';
    foreach($data as $key=>$value)
                $params .= $key.'='.$value.'&';
         
        $params = trim($params, '&');

       

    $ch = curl_init();    

    curl_setopt($ch, CURLOPT_URL, $url.'?'.$params ); //Url together with parameters
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
    // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7); //Timeout after 7 seconds

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'x-api-key: 0eek3jlhj7oqyf9txhput0f7y',	   
	));
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