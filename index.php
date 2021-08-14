<!DOCTYPE html>
<html lang="en">
<?php 
		include_once dirname(__FILE__).'/controller/api_request.php';
		/*include_once '/controller/api_request.php';
		include_once '/controller/api_weather.php';*/
		 ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/font/font-family.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="assets/css/index.css" rel="stylesheet">
    <title>Carousel | AITL</title>
</head>
<body onresize="showDimension()" onload="showDimension()">
<?php 
					//acá obtengo los valores de la api del carousel
					for ($i=1; $i <= 3 ; $i++) { 
						$carousel_id = $i;
						$api_carousel = apiCarousel::api_request($carousel_id);
						if ($carousel_id == 1) {
							$carousel_one =  array(
								'airline_name' => $api_carousel->airline->name, 
								'flight_number' => $api_carousel->flight_number, 
								'city' => $api_carousel->city, 
								'url' => $api_carousel->airline->url
							);
						}elseif ($carousel_id == 2) {
							$carousel_two =  array(
								'airline_name' => $api_carousel->airline->name, 
								'flight_number' => $api_carousel->flight_number, 
								'city' => $api_carousel->city, 
								'url' => $api_carousel->airline->url
							);
						}else {
							$carousel_three =  array(
								'airline_name' => $api_carousel->airline->name, 
								'flight_number' => $api_carousel->flight_number, 
								'city' => $api_carousel->city, 
								'url' => $api_carousel->airline->url
							);
						}
					}
                  
				
                          
		    ?>
    <div class="header">
        <img src="assets/img/AITL1.svg" class="img-pap-airport" title="Toussaint Louverture Airport | Flights"/>
        <h1 class="header-title">Aéroport International Toussaint Louverture</h1>
    </div>
    <br>
	 <!-- / Carousel 1 -->
    <div class="row" id="fila1"> 
	<div class="col-sm-4">
            <div class="info-tab" >
                <h1 id="carousel_tag" style="text-align: center;font-weight: bold;">
                        Carousel
                </h1>
                <h1 id="carrousel">1</h1>
            </div>
        </div>
        <div class="col-sm-8">
        <div class="info-tab">
        <div class="row">
        <div class="col-sm-4">
        <div class="info-logo">   
        <img id="aero_img" src="<?php echo $carousel_one['url']; ?>">
        </div>
        </div>

    <div class="col-sm-8">
      <!-- Tomar la mitad de la pantalla 2 -->
                <h1 id="airline_name"  id="carrousel-number">
				<?php echo $carousel_one['airline_name']." | ".$carousel_one['flight_number']; ?>
                </h1>	
				<h1 id="city"  id="carrousel-number">
				<?php echo $carousel_one['city'] ?>
                </h1>

    </div>
    <!-- / Tomar la mitad de la pantalla 2 -->
  </div>
    </div>
            </div>
        
    </div>   
 <!-- / Carousel 2 -->
	<div class="row" id="fila2"> 
	<div class="col-sm-4 ">
            <div class="info-tab" >
                <h1 id="carousel_tag" style="text-align: center;font-weight: bold;">
                        Carousel
                </h1>
                <h1 id="carrousel">2</h1>
            </div>
        </div>
        <div class="col-sm-8">
        <div class="info-tab">
        <div class="row">
        <div class="col-sm-4">
        <div class="info-logo">   
        <img id="aero_img" src="<?php echo $carousel_two['url']; ?>">
        </div>
        </div>

    <div class="col-sm-8">
      <!-- Tomar la mitad de la pantalla 2 -->
                <h1 id="airline_name"  id="carrousel-number">
				<?php echo $carousel_two['airline_name']." | ".$carousel_two['flight_number']; ?>
                </h1>	
				<h1 id="city"  id="carrousel-number">
				<?php echo $carousel_two['city'] ?>
                </h1>

    </div>
	<div style="height:1vh;"></div>
    <!-- / Tomar la mitad de la pantalla 2 -->
  </div>
    </div>
            </div>
        
    </div>


	<!-- / Carousel 3 -->
	<div class="row" id="fila3"> 
	<div class="col-sm-4 ">
            <div class="info-tab" >
                <h1 id="carousel_tag" style="text-align: center;font-weight: bold;">
                        Carousel
                </h1>
                <h1 id="carrousel">3</h1>
            </div>
        </div>
        <div class="col-sm-8">
        <div class="info-tab">
        <div class="row">
        <div class="col-sm-4">
        <div class="info-logo">   
        <img id="aero_img" src="<?php echo $carousel_three['url']; ?>">
        </div>
        </div>

    <div class="col-sm-8">
      <!-- Tomar la mitad de la pantalla 2 -->
                <h1 id="airline_name"  id="carrousel-number">
				<?php echo $carousel_three['airline_name']." | ".$carousel_three['flight_number']; ?>
                </h1>	
				<h1 id="city"  id="carrousel-number">
				<?php echo $carousel_three['city'] ?>
                </h1>

    </div>
    <!-- / Tomar la mitad de la pantalla 2 -->
  </div>
    </div>
            </div>
        
    </div>

    <div class="row">
      
        
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
            let height = Math.ceil(window.innerHeight *.53 / 2);
            let rows = document.getElementsByClassName('info-tab');
            for (let index = 0; index < rows.length; index++) {
                const element = rows[index];
                element.style.height = height + 'px'
            }
        }
	</script>	
<script>
jQuery(document).ready(function() {  
	setInterval(refresh_carousel1,15000); 
	setInterval(refresh_carousel2,15000); 
	setInterval(refresh_carousel3,15000); 
function refresh_carousel1(){
			
		var url="/controller/api_request.php";
		var id= 1;
			$.ajax({
		type : "GET",
		url : url,
		dataType: 'json',
		data: {carousel_id: id},
		success : function(result) {
			var flight_number = result.flight_number;
			var airline_name =  result.airline.name;
			var url = result.airline.url;
			var city = result.city;
			$('#fila'+id+' #aero_img').attr("src",url);
			$('#fila'+id+' #airline_name').text(airline_name+' | '+flight_number);	
			$('#fila'+id+' #city').text(city);			
		},
		error : function(objXMLHttpRequest) {
		console.log("error",objXMLHttpRequest);
		}
	});		
};
function refresh_carousel2(){
		var url="/controller/api_request.php";
		var id= 2;
			$.ajax({
		type : "GET",
		url : url,
		dataType: 'json',
		data: {carousel_id: id},
		success : function(result) {
			var flight_number = result.flight_number;
			var airline_name =  result.airline.name;
			var url = result.airline.url;
			var city = result.city;
			$('#fila'+id+' #aero_img').attr("src",url);
			$('#fila'+id+' #airline_name').text(airline_name+' | '+flight_number);	
			$('#fila'+id+' #city').text(city);
		},
		error : function(objXMLHttpRequest) {
		console.log("error",objXMLHttpRequest);
		}
	});		
};
function refresh_carousel3(){
		var url="/controller/api_request.php";
		var id= 3;
			$.ajax({
		type : "GET",
		url : url,
		dataType: 'json',
		data: {carousel_id: id},
		success : function(result) {
			var flight_number = result.flight_number;
			var airline_name =  result.airline.name;
			var url = result.airline.url;
			var city = result.city;
			$('#fila'+id+' #aero_img').attr("src",url);
			$('#fila'+id+' #airline_name').text(airline_name+' | '+flight_number);	
			$('#fila'+id+' #city').text(city);
		},
		error : function(objXMLHttpRequest) {
		console.log("error",objXMLHttpRequest);
		}
	});		
};
});

  </script>	
</body>
</html>