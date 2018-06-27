<?php
    include_once '../Business/EuclidesBusiness.php';
	$euclidesBusines = new EuclidesBusiness();
	$precio=$_GET["precio"];
	$turista=$_GET["turista"];
	$actividad=$_GET["actividad"];
	$atractivo=$_GET["atractivo"];
	
	
	$filtros= [];
	array_push($filtros, $precio);
	array_push($filtros, $turista);
	array_push($filtros, $actividad);
	array_push($filtros, $atractivo);
	
	$lugares = $euclidesBusines->determinarLugares($filtros);

?>
<!DOCTYPE html>
<html>
  <head>
   <?php include("head.php");?>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Waypoints in directions</title>
    <style>
      #right-panel {
        font-family: 'Arial','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        width: 100%;
        height: 100%;
        background-color: #ffffff;

      }
      #right-panel {
        margin: 20px;
        border-width: 2px;
        width: 20%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;

      }
      #directions-panel {
        margin-top: 10px;
        background-color: #ffffff;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <?php
      include("navbar_usuario.php");
	  $ruta1 = [];
	  $ruta2 = [];
	  $ruta3 = [];
	  
	  for($i=0;$i<count($lugares);$i++){
		  if($i==0){
		    $ruta=$lugares[$i];
			for($j=0;$j<count($ruta);$j++){
				$lugar=array('id'=>$ruta[$j]->getId(), 'tipoTurista'=>$ruta[$j]->getTipoTurista(), 'tipoActividad'=>$ruta[$j]->getTipoActividad(), 'tipoAtractivo'=>$ruta[$j]->getTipoAtractivo(), 
				'precio'=>$ruta[$j]->getPrecio(),'nombreLugar'=>$ruta[$j]->getNombreLugar(), 'latitud'=>$ruta[$j]->getLatitud(),'longitud'=>$ruta[$j]->getLongitud(),'imagen'=>$ruta[$j]->getImagen(),
				'video'=>$ruta[$j]->getVideo(),'descripcion'=>$ruta[$j]->getDescripcion());
				//$ruta1=$lugar;
				array_push($ruta1, $lugar);
			}
		  }
		  else if($i==1){
			$ruta=$lugares[$i];
			for($j=0;$j<count($ruta);$j++){
				$lugar=array('id'=>$ruta[$j]->getId(), 'tipoTurista'=>$ruta[$j]->getTipoTurista(), 'tipoActividad'=>$ruta[$j]->getTipoActividad(), 'tipoAtractivo'=>$ruta[$j]->getTipoAtractivo(), 
				'precio'=>$ruta[$j]->getPrecio(),'nombreLugar'=>$ruta[$j]->getNombreLugar(), 'latitud'=>$ruta[$j]->getLatitud(),'longitud'=>$ruta[$j]->getLongitud(),'imagen'=>$ruta[$j]->getImagen(),
				'video'=>$ruta[$j]->getVideo(),'descripcion'=>$ruta[$j]->getDescripcion());
				array_push($ruta2, $lugar);
			}
		  }else{
			$ruta=$lugares[$i];
			for($j=0;$j<count($ruta);$j++){
				$lugar=array('id'=>$ruta[$j]->getId(), 'tipoTurista'=>$ruta[$j]->getTipoTurista(), 'tipoActividad'=>$ruta[$j]->getTipoActividad(), 'tipoAtractivo'=>$ruta[$j]->getTipoAtractivo(), 
				'precio'=>$ruta[$j]->getPrecio(),'nombreLugar'=>$ruta[$j]->getNombreLugar(), 'latitud'=>$ruta[$j]->getLatitud(),'longitud'=>$ruta[$j]->getLongitud(),'imagen'=>$ruta[$j]->getImagen(),
				'video'=>$ruta[$j]->getVideo(),'descripcion'=>$ruta[$j]->getDescripcion());
				array_push($ruta3, $lugar);
			}  
		  }
	  }
		/*
	  for($i=0;$i<count($ruta1);$i++){
		  echo $ruta1[$i]->getId();
	  }*/
	  //$simple = "Cafetería y Panadería latteña, Turrialba";

		//$complex = array("Cafetería y Panadería latteña, Turrialba", "Rawlings, Turrialba", );
		//$complex = array('more', 'complex', 'object', array('foo', 'bar'));
    ?>
        <div class="wrapper row1" >
          <br>
          <h1 style="text-align: center;">Rutas de los lugares turisticos</h1>
    <br>
	<center><button class="btn btn-success col-md-8" name="ruta1" id="ruta1">Ruta 1</button> <button class="btn btn-success col-md-8" name="ruta2" id="ruta2">Ruta 2</button>	<button class="btn btn-success col-md-8" name="ruta3" id="ruta3">Ruta 3</button></center>	
	<br>
	<br>
  </div>
    <div id="map" class="wrapper row1" >
    <br>
    </div>
    
    <div id="directions-panel" style="width: 670px;height: 665px;" ></div>

    <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: 9.9067054, lng: -83.68005119999998}
        });
        directionsDisplay.setMap(map);
		
		var lugares1 = <?php echo json_encode($ruta1); ?>;
						
		var lugares2 = <?php echo json_encode($ruta2); ?>;
		var lugares3 = <?php echo json_encode($ruta3); ?>;

        document.getElementById("ruta1").addEventListener('click', function() {
		  //var obj = new Object();
		  for (var i = 1; i < lugares1.length-1; i++) {
			var lugar = lugares1[i];  
			alert(lugar["nombreLugar"]);
		  }	
		  //alert(lugar["nombreLugar"]);
          calculateAndDisplayRoute(directionsService, directionsDisplay,lugares1);
        });
		document.getElementById('ruta2').addEventListener('click', function() {
			for (var i = 1; i < lugares2.length-1; i++) {
			var lugar = lugares1[i];  
			alert(lugar["nombreLugar"]);
		  }	
          calculateAndDisplayRoute(directionsService, directionsDisplay,lugares2);
        });
		document.getElementById('ruta3').addEventListener('click', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay, lugares3);
        });

      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay, lugares) {
        var waypts = [];
        var checkboxArray = document.getElementById('waypoints');
       
          
            for (var i = 1; i < lugares.length-2; i++) {
				var lugar = lugares[i];  
				alert(lugar["nombreLugar"]+", Turrialba");
				waypts.push({
				  location: lugar["nombreLugar"]+", Turrialba",
				  stopover: true
				});
		 }
			
		var inicio = lugares[0];
		
		var fin = lugares[lugares.length-1];
		alert("aqui");
		alert("#"+fin["nombreLugar"]+", Turrialba");
        directionsService.route({
          origin: inicio["nombreLugar"]+", Cartago",
          destination: fin["nombreLugar"]+", Turrialba",
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');

            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;


             
            }
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFEAbnMBORtXTa_9mX1hysPfo7361F9xI&callback&callback=initMap">

    </script>
    
    <div class="wrapper row1" >
          <br>
          <div class="form-group ">
            <br>
          <div style="text-align: center;">
            <div class="form-group">
          <h2 style="text-align: center;" class="text-danger">Ver información: </h2>
            <div class=" col-md-4 " style="text-align: center;">
			
              <select class="form-control btn" id="sel1" name="sellist1">
			  <?php 
					
				//foreach ($myAirports as $currentAirport) { 
				
			    echo "<option value='".$currentAirport->runwaysAirport."'>".$currentAirport->runwaysAirport."</option>";
				?>
				
				
                <option value="Chavelo"> Bar Chavelazo </option>
                 <option value="Raw"> Rawlings </option>
                 <option value="Cafe"> Cafetería y Panadería latteña </option>
                 <option value="Rik"> Rikaste </option>
				<?php //} ?>
              </select>
            <input type="button" class="btn btn-success col-md-8" value="Ver información" onclick="enviarDatos()" id="BtnGuardar">						  

            </div>

          </div>
          <br>
          </div>
  </div>
    <br>
  </div>
  <script>
		$(document).ready(function() {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
		});
																						
	});
	
	function enviarDatos(){
		var lugar = $('#sel1').val();
		location.href ="http://localhost/Turisteando2018/View/InformacionLugar.php?nombre="+lugar;
	}
	</script>
    
    <?php
  include("footer.php");
  ?>
  </body>
</html>