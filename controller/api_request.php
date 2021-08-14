
<?php
if(isset($_GET['carousel_id'])){
	$data = apiCarousel::api_request($_GET['carousel_id']);
	$result = json_encode($data);
	echo $result;
}

class apiCarousel{

public static function api_request($carousel_id){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt_array($curl, array(
	
	
		CURLOPT_URL => "http://atalou.patiencedelavie.com/carousel/feeds/carousel/all",
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
		$iterator = 0;
		$data = null;
		foreach ($array['carousels'] as $key) {
			if ($array['carousels'][$iterator]->carousel_number_id == $carousel_id) {
				$data = $array['carousels'][$iterator];
			}
			$iterator++;
		}
return $data;
	}
}
}

?>