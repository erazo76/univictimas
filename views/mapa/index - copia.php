<?php

include("../../lib/validar_session.php");

ValidaSession("../login");
//VerificarAdmin($_SESSION['rolx']);

?>
<?php include("../layouts/constantes.php")?>
<?php include_once("../layouts/cabezera.php") ?>

<div class="message"></div>
<div class="row">
		<div class="col-md-12">
			
				<div class="box-header with-border">
					<h3 class="box-title">Aliados comerciales</h3>
				</div><!-- /.box-header -->

				<input type="hidden" id="geojson">

					  <div class="box-body">
						<div id="weathermap">
							<!-- <div class='custom-popup' id="map" style="height: 440px; border: 1px solid #AAA;"></div> -->
						</div>	
					  </div><!-- /.box-body -->


				<div class="box-footer">
					<button id="add" class="btn btn-primary" type="button"><i class="fa fa-fw fa-plus"></i> Agregar</button>
					<button id="edit" class="btn btn-primary" type="button" ><i  class="fa fa-fw fa-pencil"></i> Editar</button>
					<button id="delete" class="btn btn-primary" type="button"><i class="fa fa-fw fa-trash-o"></i> Eliminar</button>
				</div>
		</div>	
</div>

<script src="../../plugins/leaflet/leaflet.js"></script>
<script src="../../plugins/leaflet/leaflet.label.js"></script>
<script type="text/javascript" src="../../plugins/confirma/jquery-confirm.min.js"></script>

<link rel="stylesheet" href="../../plugins/leaflet/leaflet.css"/>
<link rel="stylesheet" href="../../plugins/confirma/jquery-confirm.min.css" type="text/css"/>


<script type="text/javascript">

	$(document).ready(function() {

		document.getElementById('weathermap').innerHTML = "<div class='custom-popup' id='map' style='height: 600px; border: 1px solid #AAA;'></div>";



				var map = L.map('map', {

				    center: [6.12, -67.39 ],
				    minZoom: 6,
				    maxZoom: 18,
				    zoom: 9

				});

				var basemap = new L.TileLayer.WMS('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			    					attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
			    					subdomains: ['a','b','c']
					}).addTo(map);		


$.ajax({
    type: "POST",
    url: '../../data_json/data_puntos',
    dataType: 'json',
    success: function (response) {

           var geojsonLayer = L.geoJson(response,{
        	
            pointToLayer: function(feature, latlng) {

			var smallIcon = L.icon({
					iconUrl: getTipo(feature.properties.msegmento_id),
					iconSize:[40,50],
					iconAnchor:[20,25],
					popupAnchor:[0,0]
            });  
           
				return L.marker(latlng, {icon: smallIcon}).bindPopup('<h6><p>Cajas semanales: '+feature.properties.cajas_t+'</p></h6><p>Nombre: '+feature.properties.nombre+'</p>');
            }

        }).addTo(map);


          var geojsonLayer2 = L.geoJson(response,{
        	
            pointToLayer: function(feature, latlng) {

			var smallIcon2 = L.icon({
					iconUrl: getTipo(feature.properties.msegmento_id),
					iconSize:[30,37.5],
					iconAnchor:[15,18.75],
					popupAnchor:[0,0]
            });     

				return L.marker(latlng, {icon: smallIcon2}).bindPopup('<h6><p>Cajas semanales: '+feature.properties.cajas_t+'</p></h6><p>Nombre: '+feature.properties.nombre+'</p>');
            }

        });

          var geojsonLayer3 = L.geoJson(response,{
        	
            pointToLayer: function(feature, latlng) {

			var smallIcon3 = L.icon({
					iconUrl: getTipo(feature.properties.msegmento_id),
					iconSize:[20,25],
					iconAnchor:[10,12.5],
					popupAnchor:[0,0]
            });         

				return L.marker(latlng, {icon: smallIcon3}).bindPopup('<h6><p>Cajas semanales: '+feature.properties.cajas_t+'</p></h6><p>Nombre: '+feature.properties.nombre+'</p>');
            }

        });

          var geojsonLayer4 = L.geoJson(response,{
        	
            pointToLayer: function(feature, latlng) {

			var smallIcon4 = L.icon({
					iconUrl: getTipo(feature.properties.msegmento_id),
					iconSize:[10,12.5],
					iconAnchor:[5,6.25],
					popupAnchor:[0,0]
            });         

				return L.marker(latlng, {icon: smallIcon4}).bindPopup('<h6><p>Cajas semanales: '+feature.properties.cajas_t+'</p></h6><p>Nombre: '+feature.properties.nombre+'</p>');
            }

        });

          var geojsonLayer5 = L.geoJson(response,{
        	
            pointToLayer: function(feature, latlng) {

			var smallIcon5 = L.icon({
					iconUrl: getTipo(feature.properties.msegmento_id),
					iconSize:[5,6.25],
					iconAnchor:[2.5,3.125],
					popupAnchor:[0,0]
            });         

				return L.marker(latlng, {icon: smallIcon5}).bindPopup('<h6><p>Cajas semanales: '+feature.properties.cajas_t+'</p></h6><p>Nombre: '+feature.properties.nombre+'</p>');
            }

        });          

        map.on('zoomend', function() {

			var currentZoom = map.getZoom();

			if(currentZoom <=8){
					map.removeLayer(geojsonLayer);
				    map.removeLayer(geojsonLayer2);
					map.removeLayer(geojsonLayer3);
					map.removeLayer(geojsonLayer4);
					map.addLayer(geojsonLayer5);	
			}else if(currentZoom > 8 && currentZoom <=10){
					map.removeLayer(geojsonLayer);
				    map.removeLayer(geojsonLayer2);
					map.removeLayer(geojsonLayer3);
					map.removeLayer(geojsonLayer5);
					map.addLayer(geojsonLayer4);						  	
			}else if(currentZoom > 10 && currentZoom <=14){
					map.removeLayer(geojsonLayer);
				    map.removeLayer(geojsonLayer2);
					map.removeLayer(geojsonLayer5);
					map.removeLayer(geojsonLayer4);
					map.addLayer(geojsonLayer3);						  	
			}else if(currentZoom > 14 && currentZoom <=17){
					map.removeLayer(geojsonLayer);
				    map.removeLayer(geojsonLayer5);
					map.removeLayer(geojsonLayer3);
					map.removeLayer(geojsonLayer4);
					map.addLayer(geojsonLayer2);						  	
			}else if(currentZoom >17){
					map.removeLayer(geojsonLayer5);
				    map.removeLayer(geojsonLayer2);
					map.removeLayer(geojsonLayer3);
					map.removeLayer(geojsonLayer4);
					map.addLayer(geojsonLayer);							 	
			}	
		});	

        map.fitBounds(geojsonLayer4.getBounds());
    }
});




		function getTipo(msegmento_id){
				if(msegmento_id == 1){
					return 'iconos/marker-pan-2x.png';
				}else if(msegmento_id == 5){
					return 'iconos/marker-bod-2x.png';
				}else if(msegmento_id == 4 ){
					return 'iconos/marker-carn-2x.png';
				}else if(msegmento_id == 2 ){
					return 'iconos/marker-cade2-2x.png';
				}else if(msegmento_id == 3 ){
					return 'iconos/marker-cade1-2x.png';
				}else if(msegmento_id == 6 ){
					return 'iconos/marker-lic-2x.png';
				}else if(msegmento_id == 7 ){
					return 'iconos/marker-rest-2x.png';
				}else if(msegmento_id == 8 ){
					return 'iconos/marker-edu-2x.png';
				}else if(msegmento_id == 9 ){
					return 'iconos/marker-ind-2x.png';
				}else if(msegmento_id == 10 ){
					return 'iconos/marker-conv-2x.png';
				}else if(msegmento_id == 11 ){
					return 'iconos/marker-ofc-2x.png';
				}else if(msegmento_id == 12 ){
					return 'iconos/marker-red-2x.png';
				};
			};


		

});	



</script>

<?php include_once("../layouts/pie.php") ?>
