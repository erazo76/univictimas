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
<script src="../../plugins/leaflet/PruneCluster.js"></script>


<script type="text/javascript" src="geo_estados.js"></script>

<script type="text/javascript" src="../../plugins/confirma/jquery-confirm.min.js"></script>

<link rel="stylesheet" href="../../plugins/leaflet/leaflet.css"/>
<link rel="stylesheet" href="../../plugins/confirma/jquery-confirm.min.css" type="text/css"/>
<link rel="stylesheet" href="../../plugins/leaflet/prunstyle.css"/>


<script type="text/javascript">

	$(document).ready(function() {

 

		document.getElementById('weathermap').innerHTML = "<div class='leaflet-container leaflet-fade-anim leaflet-grab sidebar-map' id='map' style='height: 600px; border: 1px solid #AAA;'></div>";

       	var puntos = $.ajax({
          url:"../../data_json/data_puntos",
          dataType: "json",
          success: '',
          error: function (xhr) {
            alert(xhr.statusText)
          }
        });


        $.when(puntos).done(function() {

				function base_alfa(d,f) {

					var region_reg=<?php echo intval($_SESSION['region']); ?>;
					var dist_tac=<?php echo intval($_SESSION['distribuidora']); ?>;
					var dist_reg=0;

				
					switch(dist_tac){

						case 2: 
						case 3:
						dist_reg=13;
						break;

						case 4: 
						dist_reg=22;
						break;

						case 5: 
						dist_reg=18;
						break;	

						case 6: 
						dist_reg=6;
						break;		

					}
					

					if(region_reg == d && dist_reg == f ){
						return '#F4FABA';
					}else if(region_reg == d && dist_reg != f ){

						return '#DAF9E3';
					}else{
						return '#B0B5B1';
					}

				}


				function estilo_estado(feature) { 
					return { 
						fillColor:base_alfa(feature.properties.CCN_1,feature.properties.ID_1),  
						weight: 2, 
						opacity: 1, 
						color: 'white', 
						dashArray: '3', 
						fillOpacity: 0.3 

					}; 
				}


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

				L.geoJson(geo_estado,{ style: estilo_estado }).addTo(map);
 					PruneCluster.Cluster.ENABLE_MARKERS_LIST = false;
					var leafletView = new PruneClusterForLeaflet();

					var geometria = puntos.responseJSON.features;
					var titulo =puntos.responseJSON.features;
					var data_t = puntos.responseJSON.features.length;
					var longa = geometria[0].geometry.coordinates[0][1];
					var lata = geometria[0].geometry.coordinates[0][0];
					    for (var i = 0; i < data_t; ++i) {
					    	 
					        leafletView.RegisterMarker(new PruneCluster.Marker(geometria[i].geometry.coordinates[0][1], geometria[i].geometry.coordinates[0][0], {title: titulo[i].properties['nombre'],segmento: titulo[i].properties['msegmento_id']}));
					        
					    }

						    leafletView.PrepareLeafletMarker = function (marker, data) {

						    		var iconoso = L.icon({
										iconUrl: getTipo(data.segmento),
										iconSize:[30,37.5],
										iconAnchor:[15,18.75],
										popupAnchor:[0,0]
					                });

						            marker.setIcon(iconoso);


						        if (marker.getPopup()) {
						            marker.setPopupContent(data.title);
						        } else {
						            marker.bindPopup(data.title);
						        }
						    };
						
					map.setView(new L.LatLng(longa, lata), 8);		    
					map.addLayer(leafletView);
            
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
