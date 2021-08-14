
<?php
 if(isset($_GET['weather'])){
	$data = apiWeather::api_request($_GET['city'],$_GET['token']);
   $result = json_encode($data);
   echo $result;
}


class apiWeather{

public static function api_request($city_id,$key){
	$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt_array($curl, array(

	CURLOPT_URL => "http://api.openweathermap.org/data/2.5/weather?id=".$city_id."&lang=en&units=metric&APPID=".$key,
    CURLOPT_RETURNTRANSFER => true,
  	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",	
	CURLOPT_HTTPHEADER => array(
		"content-type: application/json",
		"accept: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
	$result = json_decode($response);
	$array = get_object_vars($result);	
	date_default_timezone_set('America/Port-au-Prince');
	$data =  array(
		'name' => $array['name'], 
		'icon' => 'http://openweathermap.org/img/wn/'.$array['weather'][0]->icon.'@2x.png', 
		'temp' => $array['main']->temp, 
		'datetime' => self::date_dst(date("l, F jS, Y H:i")),
		'description' => $array['weather'][0]->description
	);
	return $data; 
}
}

public static function date_dst(){
$date_fixed = null;
$date_fixed = date("l, F jS, Y H:i");
return $date_fixed;
}

}
?>