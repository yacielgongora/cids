<!DOCTYPE html>
<html lang="en">
<?php 
		include_once dirname(__FILE__).'/controller/api_request.php';
		include_once dirname(__FILE__).'/controller/api_weather.php';
		/*include_once '/controller/api_request.php';
		include_once '/controller/api_weather.php';*/
		 ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Last-Modified" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/font/font-family.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="assets/css/style-carousel-2.css" rel="stylesheet">
    <title>Carousel | AITL</title>
</head>
<body onresize="showDimension()" onload="showDimension()">
<?php 
                if ((isset($_GET['id'])) && ($_GET['id'] > 0) && ($_GET['id'] <= 3)) {
				
					$carousel_id = $_GET['id'];
					//acá obtengo los valores de la api del carousel
                   		$api_carousel = apiCarousel::api_request($carousel_id);
				   $airline_name =  $api_carousel->airline->name;				  
                   		$flight_number = $api_carousel->flight_number;
				   $city = $api_carousel->city;
				   $url =  $api_carousel->airline->url;			
                }else{
		    $carousel_id = "#";
                    $api_carousel = '-';
                    $airline_name =  "----------";				  
                    $flight_number = "----";
                    $city = "-------------";
                    $url =  'assets/img/logo_emp.png';
			
                   
                } 
					 //acá obtengo los valores de la api del clima
                			$api_weather = apiWeather::api_request('3718426','42c317a14563cbf21252be9dee6ace60');
					$name = $api_weather['name'];
					$icon = $api_weather['icon'];
					$temp = $api_weather['temp'];
					$datetime = $api_weather['datetime'];
					$description = $api_weather['description'];               
		    ?>
    <div class="header">
        <img src="assets/img/AITL1.svg" class="img-pap-airport" title="Toussaint Louverture Airport | Flights"/>
        <h1 class="header-title">Aéroport International Toussaint Louverture</h1>
    </div>
    <br>
    <div class="row">
                
        <div class="col-sm-8">
        <div class="info-tab">
                 <h4>
                        AIRLINE / LIGNE AÉRIENNE / AEROLÍNEA    
                </h4>
        <div class="row">
        <div class="col-sm-4">
        <div class="info-logo">   
        <img id="aero_img" src="<?php echo $url; ?>">
        </div>
        </div>

    <div class="col-sm-8">
      <!-- Tomar la mitad de la pantalla 2 -->
                <h1 id="airline_name" style="font-size: bold;font-size:45px;" id="carrousel-number">
				<?php echo $airline_name; ?>
                </h1>
                <h4>
                    FLIGHT / VOL / VUELO
                </h4>
                <h1  id="vuelo" style="text-align: center;font-weight: bold;font-size: 60px;">
				<?php echo $flight_number; ?>
                </h1>	

    </div>
    <!-- / Tomar la mitad de la pantalla 2 -->
  </div>
    </div>
            </div>
        <div class="col-sm-4 ">
            <div class="info-tab" >
                <h1 id="carousel_tag" style="text-align: center;font-weight: bold;">
                        Carousel
                </h1>
                <h1 id="carrousel"><?php echo $carousel_id; ?></h1>
            </div>
        </div>
    </div>   
    <div class="row">
        <div class="col-sm-8 ">
            <div class="info-tab" id="info-carrousel2">
           
                 <img id="city_img" src="assets/img/city.png" alt="" >
          
                <h3 id="carrousel-number2">
                        CITY / VILLE / CIUDAD
                </h3>
                <h1 id="origen">
				<?php echo $city; ?>
                </h1>
                <br>
               
            </div>
        </div>
        <div class="col-sm-4 ">
            <div class="info-tab" >
                    <h1 id="city_weather"><?php echo $name; ?></h1>
                    <h1 id="temp_weather" style="text-align: center;font-weight: bold;margin-left: 0%;color: crimson;font-size: 4vw !important;">
					<?php echo $temp; ?>  °C<img id="icon_weather" class="page-lock-img" src="<?php echo $icon; ?>" alt="">
                            </h1>
                            <h3 id="time_weather"><?php echo $datetime; ?></h3>
                <h1 id="forecast">
				<?php echo $description; ?>
                </h1>
            </div>
        </div>
    </div>  
    <div class="tfoot">
        <div class="footer-title">
          
        </div>
        <div class="footer-right">
			POWERED BY ATALOU MICROSYSTEM
        </div>
    </div>
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function showDimension(){
            let height = Math.ceil(window.innerHeight *.82 / 2);
            let rows = document.getElementsByClassName('info-tab');
            for (let index = 0; index < rows.length; index++) {
                const element = rows[index];
                element.style.height = height + 'px'
            }
        }
	</script>	
	<script>
	jQuery(document).ready(function() {  
    setInterval(refresh_weather,30000);
	setInterval(refresh_carousel,15000); 
    function refresh_weather(){
		var url="/controller/api_weather.php";
		var city = '<?php echo $city; ?>'
	$.ajax({
		type : "GET",
		url : url,
		dataType: 'json',
		data: {weather: "api_request",city:'3718426',token:'42c317a14563cbf21252be9dee6ace60'},
		success : function(data) {
		$('#city_weather').text(data.name);		
		$('#temp_weather').text(data.temp+' °C');
		var img = $('<img id="icon_weather" class="page-lock-img" src="'+data.icon+'" alt="" style=""> '); 
		img.appendTo('#temp_weather');		
		$('#time_weather').text(data.datetime);
		$('#forecast').text(data.description);
		},
		error : function(objXMLHttpRequest) {
		console.log("error",objXMLHttpRequest);
		}
	});		
};
function refresh_carousel(){
		var url="/controller/api_request.php";
		var id = <?php echo $_GET['id']; ?>;
	$.ajax({
		type : "GET",
		url : url,
		dataType: 'json',
		data: {carousel_id: id},
		success : function(result) {
			var city = result.city;
			var flight_number = result.flight_number;
			var airline_name =  result.airline.name;
			var url = result.airline.url;
			$('#airline_name').text(airline_name);
			$('#vuelo').text(flight_number);
			$('#origen').text(city);
			$("#aero_img").attr("src",url);
		},
		error : function(objXMLHttpRequest) {
		console.log("error",objXMLHttpRequest);
		}
	});		
};
});
</script>
<script>
	
  (function detectBrowser(browser) {
      if(browser.indexOf("Chrome") != -1 ) {
        document.documentElement.className = 'chrome';
      }
      else if(browser.indexOf("Opera") != -1 ) {
        document.documentElement.className = 'opera';
      }
      else if(browser.indexOf("Firefox") != -1 ) {
        document.documentElement.className = 'firefox';
      }
      else if((browser.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )) {
        document.documentElement.className = 'ie';
      }
      else if(browser.indexOf("Safari") != -1 ) {
        document.documentElement.className = 'safari';
      }  
      else {
        document.documentElement.className = 'other_browser';
      }
  })(navigator.userAgent);
  </script>	
</body>
</html>