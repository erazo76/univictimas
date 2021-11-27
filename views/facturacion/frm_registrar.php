<?php

include("../../lib/validar_session.php");

ValidaSession("../login");
//VerificarAdmin($_SESSION['rolx']);

?>

<?php include("../layouts/constantes.php")?>
<?php include_once("../layouts/cabezera.php") ?>

<div class="message"></div>

<form id="form" role="form" enctype="multipart/form-data">

<div  class="row">

			<div class="col-md-4">
				<div class="box-header with-border" tabindex="-1">
				<h3 class="box-title">Datos de la Solicitud</h3>

				</div><!-- /.box-header -->
		  		<div class="box box-primary">
						

						<div class="box-body">

						   <div class="form-group-sm">
							  <label for="num_sol">Numero de Solicitud </label> 	   
					          <input class="form-control bbb" id="num_sol"  type="text"  placeholder="Numero Cotizacion" onpaste="return false"  onkeypress="return esnumero_sol(event)">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_num_sol'><p></p></div>

							  <button id="buscar" type="button" class="btn btn-primary btn-xs " tabindex="57" ><i class="fa fa-fw fa-search" ></i>Buscar</button>
							  <button id="limpiar" type="button" class="btn btn-danger btn-xs" tabindex="57" ><i class="fa fa-fw fa-trash-o" ></i>Limpiar</button>


							</div>
                             
							<div class="form-group-sm">

							  <label for="nombre">Nombre del Evento </label> 
							  <textarea class="form-control" id="nombre" rows="5" placeholder="Nombre del Evento" onpaste="return true"   autocomplete="off" readonly="true"></textarea>
	   							</div>

						 	<div class="form-group-sm">
							  <label for="fecha1">Fecha de Registro</label> 	   
					          <input class="form-control bbb" id="fecha1" data-date-format="dd-mm-yyyy" placeholder="dia-mes-año" type="text" onpaste="return false"  disabled="true">
							</div>

						
						</div>
						<div class="form-group-sm">

							<span class="input-group-addon" >
								<label>PROCESAR FACTURACION</label>
								</span>
							<label></label>
										<div class="input-group" >
											<span class="input-group-addon" >
											<label>Ejecutar</label>
											<input type="checkbox" id="procesar" >
											
											<label>Pre-Carga</label>
												<input type="checkbox" id="precarga" >
											</span>
											</div>
						</div>

						

						
						<div class="box-footer">
						</div>

				</div>

			</div>

		  	<div class="col-md-4">
	
		 		<div class="box-header with-border">
					<h3 class="box-title">Datos de la Facturación</h3>
				</div><!-- /.box-header -->	

				<div class="box box-primary">
                 <div class="box-body">
				<div class="form-group-sm">	
							<label for="fecha2">Fecha de Factura</label>
							<input class="form-control bbb" id="fecha2" data-date-format="dd-mm-yyyy" placeholder="dia-mes-año" type="text" onpaste="return false" tabindex="16" readonly="true">
						</div>

						<div class="form-group-sm">	
							<label for="costo_evento_cotizado">Costo Evento Cotizado</label>
							<input class="form-control bbb" id="costo_evento_cotizado"  type="text" placeholder="Valor Costo Evento Cotizado"  onkeypress="return esnumero_costo_evento(event)" onchange="return SumarCostoEvento(value)" onpaste="return false" tabindex="16" >
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_costo_evento_cotizado'><p></p></div>

						</div>	

						<div class="form-group-sm">	
							<label for="servicios_no_gravados">Servicios No gravados </label>
							<input class="form-control bbb" id="servicios_no_gravados"  type="text" placeholder="Valor Servicios No gravados" onkeypress="return esnumero_serv_no_grav(event)" onpaste="return false" onchange="return SumarCostoEvento(value)" tabindex="16" >
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_servicios_no_gravados'><p></p></div>

						</div>	
						<div class="form-group-sm">	
						<label for="base_iva"><p style="color:blue;">Base de Cálculo IVA % Ejecutado Logistico</p> </label>
						<input class="form-control bbb" id="base_iva"  type="text" placeholder="" onkeypress="return esnumero_base_iva(event)" onpaste="return false" onchange="return SumarEjecutadoLogisticoIVA(value)" tabindex="16" >
						<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_base_iva'><p></p></div>

						</div>

						<div class="form-group-sm">	
							<label for="pagos_a_terceros">Pagos a terceros</label>
							<input class="form-control bbb" id="pagos_a_terceros"  type="text" placeholder="Valor Pagos a terceros" onkeypress="return esnumero_pagos_a_terceros(event)" onchange="return SumarEjecutadoLogisticoIVA(value)" onpaste="return false"  tabindex="16" >
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_pagos_a_terceros'><p></p></div>

						</div>	
					


						<div class="form-group-sm">	
							<label for="servicios_gravados">Servicios Gravados </label>
							<input class="form-control bbb" id="servicios_gravados"  type="text" placeholder="Valor Servicios gravados " onkeypress="return esnumero_servicios_gravados(event)" onpaste="return false" onchange="return SumarEjecutadoLogisticoIVA(value)" tabindex="16" >
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_servicios_gravados'><p></p></div>

						</div>
						<div class="form-group-sm">	
							<label for="iva">IVA</label>
							<input class="form-control bbb" id="iva"  type="text" placeholder="Valor IVA" onpaste="return false" tabindex="16" >
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_iva'><p></p></div>

						</div>
				

						<div class="form-group-sm">	
							<label for="ejecutado_logistico"><p style="color:red;">EJECUTADO LOGISTICO</p></label>
							<input class="form-control bbb" id="ejecutado_logistico"  type="text" placeholder="Valor Ejecutado Logistico" onpaste="return false" tabindex="16" >

						</div>
						</div>
				</div>
				</div>
				<div class="col-md-4">
	
				<div class="box-header with-border">
				<h3 class="box-title">Datos de la Facturación</h3>
			</div><!-- /.box-header -->	

			<div class="box box-primary">
				<div class="box-body">
				  
				        <div class="form-group-sm">	
						<label for="base_iva_ree"><p style="color:blue;">Base de Cálculo IVA % Ejecutado Reembolso</p></label>
						<input class="form-control bbb" id="base_iva_ree"  type="text" placeholder="" onkeypress="return esnumero_base_iva(event)" onpaste="return false" onchange="return SumarEjecutadoLogisticoIVA(value)" tabindex="16" >
						<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_base_iva_ree'><p></p></div>

						</div>
						<div class="form-group-sm">	
							<label for="gastos_reembolsables">Gastos Reembolsables</label>
							<input class="form-control bbb" id="gastos_reembolsables"  type="text" placeholder="Valor Gastos reembolsables" onkeypress="return esnumero_gastos_reembolsables(event)"  onchange="return SumarIntermediacion(value)" onpaste="return true" tabindex="16" >
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_gastos_reembolsables'><p></p></div>

						</div>
			

				<div class="form-group-sm">	
							<label for="giro_fecty">Giro Efecty</label>
							<input class="form-control bbb" id="giro_fecty"  type="text" placeholder="Valor Giro Efecty" onpaste="return false" onkeypress="return esnumero_ms_giro_fecty(event)" onchange="return SumarIntermediacion(value)"  tabindex="16" >
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_giro_fecty'><p></p></div>

						</div>
				<div class="form-group-sm">	
							<label for="intermediacion">Intermediación 3%</label>
							<input class="form-control bbb" id="intermediacion"  type="text" placeholder="Valor Intermediación 3%" onpaste="return false" tabindex="16" >

						</div>
						
						<div class="form-group-sm">	
							<label for="iva_intermediacion_reembolso">IVA Intermediación reembolso</label>
							<input class="form-control bbb" id="iva_intermediacion_reembolso"  type="text" placeholder="Valor IVA Intermediación reembolso" onpaste="return false" tabindex="16" >
						</div>
						<div class="form-group-sm">	
							<label for="ejecutado_reembolso"><p style="color:red;">BEJECUTADO REEMBOLSO</p></label>
							<input class="form-control bbb" id="ejecutado_reembolso"  type="text" placeholder="Valor Ejecutado Reembolso" onpaste="return false" tabindex="16" >
						</div>
						<div class="form-group-sm">	
							<label for="costo_tiquetes_ejecutado">Costo Tiquetes Ejecutado</label>
							<input class="form-control bbb" id="costo_tiquetes_ejecutado"  type="text" placeholder="Valor Costo Tiquetes Ejecutado" onkeypress="return esnumero_tiquetes_ejecutado(event)" onchange="return SumarTiquetes(value)"  onpaste="return true" tabindex="16" >
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_costo_tiquetes_ejecutado'><p></p></div>

						</div>
						<div class="form-group-sm">	
							<label for="iva_tiquetes">IVA Tiquetes </label>
							<input class="form-control bbb" id="iva_tiquetes"  type="text" placeholder="Valor IVA Tiquetes " onpaste="return false" tabindex="16" >
						</div>
						<div class="form-group-sm">	
							<label for="costo_total_tiquetes"><p style="color:red;">Costo Total Tiquetes Ejecutado</p></label>
							<input class="form-control bbb" id="costo_total_tiquetes"  type="text" placeholder="Valor Costo Total Tiquetes Ejecutado" onpaste="return false" tabindex="16" >
						</div>
						<div class="form-group-sm">	
							<label for="costo_total_evento"><p style="color:red;">TOTAL COSTO DEL EVENTO</p></label>
							<input class="form-control bbb" id="costo_total_evento"  type="text" placeholder="Valor Total Costo Evento" onpaste="return false" tabindex="16" >
						</div>
						<div class="box-footer">
					<button id="exit" type="button" class="btn btn-primary pull-left "  ><i class="fa fa-fw fa-reply"></i>Regresar</button>
					<button id="save" type="button" class="btn btn-success pull-right" tabindex="23" ><i class="fa fa-fw fa-save"></i>Guardar</button>					
					<!--<button id="cancelar" type="button" class="btn btn-primary" tabindex="-1"><i class="fa fa-fw fa-times"></i>Cancelar</button>-->
					</div>	
					
					</div>	
						
				</div><!-- /.box -->

			</div>

			
	</div>
</form>


<script language="JavaScript" src="../../plugins/maxLength/maxLength.js"></script>
<script type="text/javascript" src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../../plugins/datepicker/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>
<script src="../../plugins/unslider/unslider-min.js"></script>
<script type="text/javascript" src="../../js/bootstrap-multiselect.js"></script>
<script language="JavaScript" src="../../plugins/mask/jquery.mask.min.js"></script>
<script type="text/javascript" src="../../plugins/confirma/jquery-confirm.min.js"></script>
<script src="../../plugins/balloon/jquery.balloon.min.js"></script>
<script src="../../plugins/leaflet/leaflet.js"></script>
<script src="../../plugins/leaflet/leaflet.label.js"></script>

<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAq8g7WPAx_OtQaQNzYPvexnbbV50CDf0o" async defer></script>
<script src="../../plugins/leaflet/gmaps.js"></script>

<script src="../../plugins/leaflet/Leaflet.GoogleMutant.js"></script>-->

<script src="../../plugins/select3/bootstrap-select.min.js"></script>
<script src="../../plugins/select3/i18n/defaults-es_ES.min.js"></script>

<link rel="stylesheet" href="../../plugins/confirma/jquery-confirm.min.css" type="text/css"/>
<link rel="stylesheet" href="../../css/style_format_pass.css" type="text/css"/>
<link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css" type="text/css"/>
<link rel="stylesheet" href="../../plugins/unslider/unslider.css">
<link rel="stylesheet" href="../../plugins/leaflet/leaflet.css"/>

<link rel="stylesheet" href="../../plugins/select3/bootstrap-select.min.css">

 <script type="text/javascript">
	document.getElementById("limpiar").disabled=true;
	document.getElementById("base_iva").value=19;
	document.getElementById("base_iva_ree").value=19;

	document.getElementById("procesar").disabled=true;
	document.getElementById("precarga").disabled=true;


	
	

	BloquearCampos();
$(document).ready(function() {



	$("#izquierda").css("display", "none");

	

});



//MASCARAS DE VALIDACION ########################################

$('.pesos').mask('#.##0,00', {reverse: true});

///###########################################################################////

   function SumarCostoEvento (valor) {
$("#ejecutado_logistico").val(0);
var TotalSuma_eje_log = 0;  
var M_costo_evento_cotizado=$("#costo_evento_cotizado").val();
var M_servicios_no_gravados=$("#servicios_no_gravados").val();
var M_pagos_a_terceros=$("#pagos_a_terceros").val();
var M_servicios_gravados=$("#servicios_gravados").val();
var costo_evento_cotizado=0;
var servicios_no_gravados=0;
var pagos_a_terceros=0;
var servicios_gravados=0;

if(M_costo_evento_cotizado!=''){
	costo_evento_cotizado=M_costo_evento_cotizado;
}
if(M_servicios_no_gravados!=''){
	servicios_no_gravados=M_servicios_no_gravados;
}
if(M_pagos_a_terceros!=''){
	pagos_a_terceros=M_pagos_a_terceros;
}
if(M_servicios_gravados!=''){
	servicios_gravados=M_servicios_gravados;
}


var M_iva=0;
var iva=0;

M_iva=$("#iva").val();
if(M_iva!=''){
	iva=M_iva;
}

TotalSuma_eje_log = parseInt(servicios_gravados)+parseInt(costo_evento_cotizado)+parseInt(servicios_no_gravados)+parseInt(pagos_a_terceros)+parseInt(iva);   

TotalSuma_eje_log = parseInt(TotalSuma_eje_log);

$("#ejecutado_logistico").val(TotalSuma_eje_log);

var M_ejecutado_logistico=$("#ejecutado_logistico").val();
var M_ejecutado_reembolso=$("#ejecutado_reembolso").val();
var M_costo_total_tiquetes=$("#costo_total_tiquetes").val();

var ejecutado_logistico=0;
var ejecutado_reembolso=0;
var costo_total_tiquetes=0;

if(M_ejecutado_logistico!=''){
	ejecutado_logistico=M_ejecutado_logistico;
}if(M_ejecutado_reembolso!=''){
	ejecutado_reembolso=M_ejecutado_reembolso;
}if(M_costo_total_tiquetes!=''){
	costo_total_tiquetes=M_costo_total_tiquetes;
}
var TotalSuma_costo_evento=0;
    TotalSuma_costo_evento = parseInt(ejecutado_logistico)+parseInt(ejecutado_reembolso)+parseInt(costo_total_tiquetes);   
$("#costo_total_evento").val(TotalSuma_costo_evento);


}
///###########################################################################////

function SumarEjecutadoLogisticoIVA (valor) {

	 
var Mservicios_gravados=$("#servicios_gravados").val();
var Mpagos_a_terceros=$("#pagos_a_terceros").val();

var M_base_iva=$("#base_iva").val();
base_iva = parseInt(M_base_iva);


var servicios_gravados=0;
var pagos_a_terceros=0;




if(Mpagos_a_terceros!=''){
	pagos_a_terceros=Mpagos_a_terceros;
}
if(Mservicios_gravados!=''){
	servicios_gravados=Mservicios_gravados;
}

$("#iva").val(0);

var TotalSuma = 0;  
 // valor = parseInt(valor); // Convertir a numero entero (número).
 TotalSuma = parseInt(servicios_gravados)+parseInt(pagos_a_terceros);  
 var iva= (TotalSuma*base_iva)/100;
 iva = parseInt(iva);

 $("#iva").val(iva);
 // $("#ejecutado_logistico").val(TotalSuma);
 var total=SumarCostoEvento (valor);
}

///###########################################################################////

function SumarIntermediacion (valor) {

$("#intermediacion").val(0);

 var TotalSuma = 0;  
// valor = parseInt(valor); // Convertir a numero entero (número).
TotalSuma = parseInt($("#gastos_reembolsables").val());  
var iva= (TotalSuma*3)/100;

var M_base_iva_ree=$("#base_iva_ree").val();
var base_iva_ree = parseInt(M_base_iva_ree);



var iva_ter= (iva*base_iva_ree)/100;

iva = parseInt(iva);
iva_ter = parseInt(iva_ter);


var M_gastos_reembolsables=TotalSuma;
var M_iva_intermediacion_reembolso=iva_ter;
var M_intermediacion=iva;
var M_giro_fecty=$("#giro_fecty").val();

var gastos_reembolsables=0;
var iva_intermediacion_reembolso=0;
var intermediacion=0;
var giro_fecty=0;

if(M_gastos_reembolsables!=''){
	gastos_reembolsables=M_gastos_reembolsables;
}
if(M_intermediacion!=''){
	intermediacion=M_intermediacion;
}
if(M_iva_intermediacion_reembolso!=''){
	iva_intermediacion_reembolso=M_iva_intermediacion_reembolso;
}
if(M_giro_fecty!=''){
	giro_fecty=M_giro_fecty;
}



$("#intermediacion").val(intermediacion);
$("#iva_intermediacion_reembolso").val(iva_intermediacion_reembolso);
var ejecutado_reembolso =0;
 ejecutado_reembolso = parseInt(gastos_reembolsables)+parseInt(iva_intermediacion_reembolso)+parseInt(intermediacion)+parseInt(giro_fecty);   
$("#ejecutado_reembolso").val(ejecutado_reembolso);

var total=SumarCostoEvento (valor);

}

///###########################################################################////


function SumarTiquetes (valor) {

$("#costo_total_tiquetes").val(0);
var tiq = 0;  
tiq = parseInt($("#costo_tiquetes_ejecutado").val());   
var porc=5.50147;
var iva_tiq= (tiq*porc)/100;
iva_tiq = parseInt(iva_tiq);

$("#iva_tiquetes").val(iva_tiq);

var suma=parseInt(tiq)+parseInt(iva_tiq)

$("#costo_total_tiquetes").val(suma);

var cost=$("#costo_total_evento").val();
var sum=parseInt(suma)+parseInt(cost)

//$("#costo_total_evento").val(sum);
var total=SumarCostoEvento (valor);



}
///###########################################################################////

var tick=0;

$('#limpiar').click(function() {

	BloquearCampos();
	LimpiarCampos();
	document.getElementById("num_sol").disabled = false;
	document.getElementById("buscar").disabled = false;

	document.getElementById("limpiar").disabled=true;
	
	
		
	
				});
$('#buscar').click(function() {
	var num=$("#num_sol").val();
	num=parseInt(num);

	document.getElementById("nombre").value = '';



		$.post( "../../controllers/mfacturados_controller", {action: "search_sol",num_sol:num}).done(function( data ) {
			var parsedJson = $.parseJSON(data);
			if(parsedJson.resultado == 'error'){
				$(".message").html(parsedJson.mensaje);
				$('.base').unslider('animate:0');
				$('.base').unslider('animate:1');
	

			}else{

			$("#nombre" ).html( data );
			$("#nombre" ).val( data ); 
			DesBloquearProceso();

			// DesBloquearCampos();
			document.getElementById("buscar").disabled=true;
			document.getElementById("num_sol").disabled = true;
			document.getElementById("limpiar").disabled=false;	




			}

			
				});
			
	
				});

$("#derecha" ).click(function() {

	if(tick==0){

		var cont_alert =$('.bbb').filter(function() { return $(this).val() == ""; }).size();
		//var cont_alert = $('.aaa p:contains("") ').size();
//alert(cont_alert);
			document.getElementById('derecha').disabled = true;
			$("#derecha").css("display", "none");
		//if(cont_alert!=0){
			if(cont_alert > 30){	
			//alert('existen campos vacios');

						$.confirm({
						    title: '¡existen campos vacios !', // hides the title.
						    cancelButton: false, // hides the cancel button.
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success',
						    content: false// hides content block.
						});			

		}else{

			
			$('.base').unslider('animate:1');
			tick=1;
			document.getElementById('izquierda').disabled = false;
			$("#izquierda").css("display", "block");
			

			setTimeout(function() {
				document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
			}, 800);

		}

	}else if(tick==1){

		var cont_alert3 =$('.ccc').filter(function() { return $(this).val() == ""; }).size();
		//var cont_alert = $('.aaa p:contains("") ').size();

		//if(cont_alert3!=0){
			if(cont_alert3 > 50){
						$.confirm({
						    title: '¡existen campos vacios !', // hides the title.
						    cancelButton: false, // hides the cancel button.
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success',
						    content: false// hides content block.
						});	

		}else{

			//$('.base').unslider('animate:2');
			
			//tick=2;
			document.getElementById('derecha').disabled = false;
			$("#derecha").css("display", "block");
			setTimeout(function() {
				document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
			}, 800);			

		}

	}

});

$("#izquierda" ).click(function() {

	if(tick==1){
		
		$('.base').unslider('animate:0');
		tick=0;
		document.getElementById('izquierda').disabled = true;
		$("#izquierda").css("display", "none");
		document.getElementById('derecha').disabled = false;
		$("#derecha").css("display", "block");
		setTimeout(function() {
			document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
		}, 800);

	}else if(tick==2){
		
		$('.base').unslider('animate:1');
		tick=1;
		document.getElementById('derecha').disabled = false;
		$("#derecha").css("display", "block");
		setTimeout(function() {
			document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
		}, 800);

	}

});



		$("#fecha1").datepicker("setDate", new Date());
		
		$('#fecha2').datepicker({
			
    		todayBtn: false,
		    todayHighlight: true,
		    autoclose: true,
			language: 'es',
			showOnFocus: true

		});

		$('#fecha3').datepicker({
			startDate: '+0d',
    		todayBtn: false,
		    todayHighlight: true,
		    autoclose: true,
			language: 'es',
			showOnFocus: true

		});


		$('#f_ida').datepicker({
			startDate: '+0d',
    		todayBtn: false,
		    todayHighlight: true,
		    autoclose: true,
			language: 'es',
			showOnFocus: true

		});

		$('#f_vuelta').datepicker({
			startDate: '+0d',
    		todayBtn: false,
		    todayHighlight: true,
		    autoclose: true,
			language: 'es',
			showOnFocus: true

		});

		$('#f_aloja').datepicker({
			startDate: '+0d',
    		todayBtn: false,
		    todayHighlight: true,
		    autoclose: true,
			language: 'es',
			showOnFocus: true

		});
	
		$("#InputFile").change(function(){
		    readURL(this);
		});

		$('#guardia1').on('focus', function() {
			$('#pertenencia').focus();
				var cont_alert2 =$('.bbb').filter(function() { return $(this).val() == ""; }).size();
				//var cont_alert = $('.aaa p:contains("") ').size();
		//alert(cont_alert2);
				//if(cont_alert2!=0){
					if(cont_alert2  > 30 ){
						
						$.confirm({
						    title: '¡existen campos vacios !', // hides the title.
						    cancelButton: false, // hides the cancel button.
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success',
						    content: false// hides content block.
						});						

				}else{

					$('.base').unslider('animate:1');

					

				    setTimeout(function() {
				
						document.getElementById('izquierda').disabled = false;
						$("#izquierda").css("display", "block");
						document.getElementById('derecha').disabled = true;
						$("#derecha").css("display", "none");
				    	tick=1;
						$('#guardia78').focus();
						//document.getElementById("tipo1").focus();
						document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
				    }, 800);					

				}	

		});


		$('.guardia77').on('focus', function() {
				$('#idaccion').focus();
		});

		$('#jump1').on('focus', function() {
				$('#agregar2').focus();
		});

		$('#jump2').on('focus', function() {
				$('#t_trans').focus();
		});
		
		$('#jump3').on('focus', function() {
				$('#agregar').focus();
		});

		$('.guardia79').on('focus', function() {
				$('#entidad').focus();
		});

		$('.guardia80').on('focus', function() {
			$('#tipo2').dropdown('toggle');
		});

		$('.guardia81').on('focus', function() {
			$('#guardia2').dropdown('toggle');
		});

		$('#guardia2').on('focus', function() {
				$('#entidad' ).focus();
				var cont_alert4 =$('.ccc').filter(function() { return $(this).val() == ""; }).size();
				//var cont_alert = $('.aaa p:contains("") ').size();

				//if(cont_alert4!=0){
					if(cont_alert4 >50){
						$.confirm({
						    title: '¡existen campos vacios !', // hides the title.
						    cancelButton: false, // hides the cancel button.
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success',
						    content: false// hides content block.
						});	

				}else{


					//$('.base').unslider('animate:2');
				    setTimeout(function() {

						
				    	$('#prueba').focus();
				    	document.getElementById('derecha').disabled = true;
						$("#derecha").css("display", "none");
				    	tick=2;
						document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
				    }, 800);					

				}

		});

		

		$('#t_trans').multiselect({

			enableClickableOptGroups: true,
			enableCollapsibleOptGroups: false,
			onChange: function(element, checked, option) {
				var selecto=(element.val());
				if(checked === true) {

					//if(selecto==0){$('#ta_dido').css('display','block');}
				//	if(selecto==1){$('#tm_dido').css('display','block');}
				//	if(selecto==2){$('#tu_dido').css('display','block');}

				}else if(checked === false){

					if(selecto==0){$('#ta_dido').css('display','none');}
					if(selecto==1){$('#tm_dido').css('display','none');}
					if(selecto==2){$('#tu_dido').css('display','none');}

				}

			},
			maxHeight: 180,
			inheritClass: true,
			nonSelectedText: 'Seleccione tipo de transporte',
			buttonWidth: '100%'

		});


		
		$('#tipo1').on('change', function () {

     		var selectVal = $("#tipo1 option:selected").val();
			
			 if(selectVal==8){
				//alert(selectVal);
				$("#otro1a").css("display", "block");
				
				$("#otro1").focus();

			}else{

				$("#otro1a").css("display", "none");		
				$("#otro1").val("");

			}
		});

		$('#activity').on('change', function () {

			var selectVal = $("#activity option:selected").val();

			if(selectVal==0){

					$("#actv_1").css("display", "block");
					$("#actv_2").css("display", "none");
					$("#actv_3").css("display", "none");

			}else if(selectVal==1){

				    $("#actv_1").css("display", "none");
					$("#actv_2").css("display", "block");
					$("#actv_3").css("display", "none");

			}else{

					$("#actv_1").css("display", "none");
					$("#actv_2").css("display", "none");
					$("#actv_3").css("display", "block");

			}
		
		});

		$("#exit" ).click(function() {

						$.confirm({
						    title: '¿Desea Salir?',
						    content:false,
						    confirmButton: 'Si',
						    cancelButton: 'No',
						    confirmButtonClass: 'btn-primary',
    						    cancelButtonClass: 'btn-success',

						    confirm: function(){
								
						    	setTimeout(function(){

						                  $(location).attr('href','../facturacion/');
                  
						        }, 1000);
							},

						    cancel: function(){

							}
						});				
			
		});

		// ********************************************************************************************




		$("#a_tra" ).click(function(){

			if($('#transporte').prop('checked')== true && $('#t_trans option:selected').length==0){
				
				$.alert({
						    title: 'Debe indicar al menos un tipo de transporte!',
						    content: false,
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success'
						});
			}else{
				$('.base').unslider('animate:2');
				document.getElementById('izquierda').disabled = true;
				$("#izquierda").css("display", "none");
			}

		});

		$("#t_ocul" ).click(function(){

			$.confirm({
						    title: '¡Esta acción borrará los datos no registrados!.¿Desea continuar?',
						    content:false,
						    confirmButton: 'Si',
						    cancelButton: 'No',
						    confirmButtonClass: 'btn-primary',
    						    cancelButtonClass: 'btn-success',

						    confirm: function(){
								$('.base').unslider('animate:1');
								document.getElementById('izquierda').disabled = false;
								$("#izquierda").css("display", "block");
								$('#ta_dido').css('display','none');
								$('#tm_dido').css('display','none');
								$('#tu_dido').css('display','none');
								document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
								$('#t_trans').multiselect('deselect', ['0']);
								$('#t_trans').multiselect('deselect', ['1']);
								$('#t_trans').multiselect('deselect', ['2']);
							},

						    cancel: function(){

							}
			});	
		});


		$("#t_ocu2" ).click(function(){
			$.confirm({
						    title: '¡Esta acción borrará los datos no registrados!.¿Desea continuar?',
						    content:false,
						    confirmButton: 'Si',
						    cancelButton: 'No',
						    confirmButtonClass: 'btn-primary',
    						    cancelButtonClass: 'btn-success',

						    confirm: function(){
								$('.base').unslider('animate:1');
								document.getElementById('izquierda').disabled = false;
								$("#izquierda").css("display", "block");
								$('#ta_dido').css('display','none');
								$('#tm_dido').css('display','none');
								$('#tu_dido').css('display','none');
								document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
								$('#t_trans').multiselect('deselect', ['0']);
								$('#t_trans').multiselect('deselect', ['1']);
								$('#t_trans').multiselect('deselect', ['2']);
							},

						    cancel: function(){

							}
			});	

		});

		$("#transporte") .change(function() {

			if( $('#transporte').prop('checked')== true ) {

				$("#msg_trans").val("Requiere transporte");
				$("#trans").val(1);
				$("#noveo").css("display", "block");
				//document.getElementById("a_tra").disabled=false;
				$("#t_oculto").css("display", "block");
				
				

			}else{

				$("#msg_trans").val("No requiere transporte");
				$("#trans").val(0);
				$("#noveo").css("display", "none");
				$('#t_trans').multiselect('deselect', ['0']);
				$('#t_trans').multiselect('deselect', ['1']);
				$('#t_trans').multiselect('deselect', ['2']);
				$("#t_oculto").css("display", "none");
					if ($('#alojamiento').prop('checked')== true){	
						//document.getElementById("a_tra").disabled=false;
						
						
					}else{
						//document.getElementById("a_tra").disabled=true;
						
					}

			}


		});

// 		document.getElementById("currency_col").innerHTML = "Colombia: " + formatCurrency("es-CO", "COP", 2, 2500000);

// function formatCurrency (locales, currency, fractionDigits, number) {
//   var formatted = new Intl.NumberFormat(locales, {
//     style: 'currency',
//     currency: currency,
//     minimumFractionDigits: fractionDigits
//   }).format(number);
//   return formatted;
// }

		const formatterPeso = new Intl.NumberFormat('es-CO', {
			style: 'currency',
			currency: 'COP',
			minimumFractionDigits: 0
    	 });


		 $("#procesar" ).click(function() {
							if( $('#procesar').prop('checked') == true ) {
								$("#precarga").val(0);  
								$("#procesar").val(1);    
								document.getElementById('procesar').checked = true;
								document.getElementById('precarga').checked = false;
								DesBloquearCampos();
								document.getElementById('fecha2').disabled = false;


							}else{
								$("#procesar").val(0); 
								$("#precarga").val(0); 
								document.getElementById('procesar').checked = false;
								document.getElementById('precarga').checked = false;
								BloquearCampos();	
								document.getElementById('fecha2').disabled = true;
			

							}
							
});	

$("#precarga" ).click(function() {
							if( $('#precarga').prop('checked') == true ) {
								$("#precarga").val(1);  
								$("#procesar").val(0);    
								document.getElementById('procesar').checked = false;
								document.getElementById('precarga').checked = true;
								DesBloquearCampos();
								document.getElementById('fecha2').disabled = true;


							}else{
								$("#procesar").val(0); 
								$("#precarga").val(0); 
								document.getElementById('procesar').checked = false;
								document.getElementById('precarga').checked = false;
								BloquearCampos();	
								document.getElementById('fecha2').disabled = true;
			

							}
							
});	





   $('#save').click( function () {


					var ideco2=parseInt($("#n_accion").val());


					$.confirm({

					title: '¿Está Seguro de Guardar el Registro ?',
					content:false,
					confirmButton: 'Si',
					cancelButton: 'No',
					confirmButtonClass: 'btn-primary',
						cancelButtonClass: 'btn-success',

					confirm: function(){
			
			   $.post( "../../controllers/mfacturados_controller", {

				action: "add",
				num_sol:$("#num_sol").val(),					
				fecha_registro: $("#fecha1").val(),
				fecha_facturacion: $("#fecha2").val(),
				procesar: $("#procesar").val(),
				precarga: $("#precarga").val(),
				costo_evento_cotizado: $("#costo_evento_cotizado").val(),
				servicios_no_gravados: $("#servicios_no_gravados").val(),
				pagos_a_terceros: $("#pagos_a_terceros").val(),
				servicios_gravados: $("#servicios_gravados").val(),
				iva: $("#iva").val(),
				ejecutado_logistico: $("#ejecutado_logistico").val(),
				gastos_reembolsables: $("#gastos_reembolsables").val(),
				giro_fecty: $("#giro_fecty").val(),
				intermediacion: $("#intermediacion").val(),
				iva_intermediacion_reembolso: $("#iva_intermediacion_reembolso").val(),				
				ejecutado_reembolso: $("#ejecutado_reembolso").val(),
				costo_tiquetes_ejecutado: $("#costo_tiquetes_ejecutado").val(),
				iva_tiquetes: $("#iva_tiquetes").val(),
				costo_total_tiquetes: $("#costo_total_tiquetes").val(),
				costo_total_evento: $("#costo_total_evento").val()


						}).done(function(data){

							var parsedJson = $.parseJSON(data);
							$(".message").html(parsedJson.mensaje);

							switch(parsedJson.deslizador){

								case "1":
									$('.base').unslider('animate:0');
									tick=0;
									document.getElementById('izquierda').disabled = true;
									$("#izquierda").css("display", "none");
									document.getElementById('derecha').disabled = false;
									$("#derecha").css("display", "block");
								break;

								case "2":
									$('.base').unslider('animate:1');
									tick=1;
									document.getElementById('izquierda').disabled = false;
									$("#izquierda").css("display", "block");
									document.getElementById('derecha').disabled = true;
									$("#derecha").css("display", "none");
								break;

							}

							if(parsedJson.resultado != 'error'){

								$('.base').unslider('animate:0');
									setTimeout(function(){
										$(location).attr('href','./');								

										}, 1500);

											}

										},"json");

											
									},

						cancel: function(){

						}
						});


					});	

function cajas_obj(){

	var totales=document.getElementById('caja_t').value;
	var propias=document.getElementById('caja_p').value;
	var objetivo= totales-propias;

	document.getElementById('caja_o').value=objetivo;
}


function menor(){
	var totales2=document.getElementById('caja_t').value;
	var propias2=document.getElementById('caja_p').value;

		if(propias2 <= totales2){


		}else{

			document.getElementById('ms_caja_p').innerHTML = 'Debe ser menor o igual a "Total de Cajas"';

		}
}
//################################  VALIDACIONES  ############################################


	$(function(){

		$('#tele3').maxLength(15);
		$("#nombre").maxLength(200);
		$("#acceso1").maxLength(100);
		$("#acceso2").maxLength(100);
		$("#num_dir").maxLength(10);		
		$("#referencia").maxLength(100);
		$("#rt_nombre1").maxLength(100);
		$("#rt_nombre2").maxLength(100);
		$("#rt_apellido1").maxLength(100);
		$("#rt_apellido2").maxLength(100);		
		$("#rt_num_doc").maxLength(20);
		$("#tele1").maxLength(15);
		$("#correo1").maxLength(150);		
		$("#otro1").maxLength(100);
		$("#rn_nombre1").maxLength(100);
		$("#rn_nombre2").maxLength(100);
		$("#rn_apellido1").maxLength(100);
		$("#rn_apellido2").maxLength(100);
		$("#rn_num_doc").maxLength(20);
		$("#tele2").maxLength(15);
		$("#correo2").maxLength(150);
		$("#afase").maxLength(100);
		$("#amedida").maxLength(100);
		$("#idaccion").maxLength(100);
		$("#entidad").maxLength(100);
		$("#num_vic").maxLength(5);
		$("#descripcion").maxLength(200);
		$("#d_concepto").maxLength(150);
		$("#d_cantidad").maxLength(8);
		$("#d_costo").maxLength(15);
		$("#d_obs").maxLength(200);
		$("#num_doc2").maxLength(20);
		$("#correo3").maxLength(150);
		$("#nombre2").maxLength(100);

	});

            function alsaliro4(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 4){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 4 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsaliro(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 5){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 5 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsalira(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 7){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 7 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsalira2(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 9){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 9 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsalira3(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 9){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 9 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsalir(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 2){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 2 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsalir2(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 12){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 12 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

             function alsalir3(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 12){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 13 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

              function alsalir4(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 1){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 1 número';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }



function esnombre(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_nombre').style.display = 'block';
                       	document.getElementById("ms_nombre").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_nombre").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esrazon(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_razon').style.display = 'block';
                       	document.getElementById("ms_razon").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_razon").innerHTML = '';
                       	return patron.test(n);

                    }

}

function escedula1(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_rt_num_doc').style.display = 'block';
                       	document.getElementById("ms_rt_num_doc").innerHTML = 'Use solo números';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_rt_num_doc").innerHTML = '';
                       	return patron.test(n);

                    }

}

function escedula2(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9]$/;
	n = String.fromCharCode(k);

				if(patron.test(n)==''){

					document.getElementById('ms_rn_num_doc').style.display = 'block';
					   document.getElementById("ms_rn_num_doc").innerHTML = 'Use solo números';
						return patron.test(n);

				}else{

					   document.getElementById("ms_rn_num_doc").innerHTML = '';
					   return patron.test(n);

				}

}

function escedula3(e) {

		k = (document.all) ? e.keyCode : e.which;
		if (k==8 || k==0 || k==13) return true;
		patron = /^[0-9]$/;
		n = String.fromCharCode(k);

					if(patron.test(n)==''){

						document.getElementById('ms_num_doc2').style.display = 'block';
						document.getElementById("ms_num_doc2").innerHTML = 'Use solo números';
							return patron.test(n);

					}else{

						document.getElementById("ms_num_doc2").innerHTML = '';
						return patron.test(n);

					}

}

function esacceso1(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ ]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_acceso1').style.display = 'block';
                       	document.getElementById("ms_acceso1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_acceso1").innerHTML = '';
                       	return patron.test(n);

                    }

}


function esacceso2(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ ]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_acceso2').style.display = 'block';
                       	document.getElementById("ms_acceso2").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_acceso2").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esreferencia(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_referencia').style.display = 'block';
                       	document.getElementById("ms_referencia").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_referencia").innerHTML = '';
                       	return patron.test(n);

                    }

}



function estele1(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[0-9\-\(\)]/;
	n = String.fromCharCode(k);

				if(patron.test(n)==''){

					document.getElementById('ms_tele1').style.display = 'block';
					   document.getElementById("ms_tele1").innerHTML = 'Use solo números y "-"';
						return patron.test(n);

				}else{

					   document.getElementById("ms_tele1").innerHTML = '';
					   return patron.test(n);

				}

}

function esnumdir(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[0-9]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_num_dir').style.display = 'block';
                       	document.getElementById("ms_num_dir").innerHTML = 'Use solo números';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_num_dir").innerHTML = '';
                       	return patron.test(n);

                    }

}

function estele2(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[0-9\-\(\)]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_tele2').style.display = 'block';
                       	document.getElementById("ms_tele2").innerHTML = 'Use solo números y "-"';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_tele2").innerHTML = '';
                       	return patron.test(n);

                    }

}

function estele3(e) {

		k = (document.all) ? e.keyCode : e.which;
		if (k==8 || k==0 || k==13) return true;
		patron = /[0-9\-\(\)]/;
		n = String.fromCharCode(k);

						if(patron.test(n)==''){

							document.getElementById('ms_tele3').style.display = 'block';
							document.getElementById("ms_tele3").innerHTML = 'Use solo números y "-"';
								return patron.test(n);

						}else{

							document.getElementById("ms_tele3").innerHTML = '';
							return patron.test(n);

						}

}

function escorreo1(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[A-ZÑ0-9\_\-\.\+\@\ ]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_correo1').style.display = 'block';
                       	document.getElementById("ms_correo1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_correo1").innerHTML = '';
                       	return patron.test(n);

                    }

}

function escorreo2(e) {

k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0 || k==13) return true;
patron = /[A-ZÑ0-9\_\-\.\+\@\ ]/;
n = String.fromCharCode(k);

				if(patron.test(n)==''){

					document.getElementById('ms_correo2').style.display = 'block';
					   document.getElementById("ms_correo2").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
						return patron.test(n);

				}else{

					   document.getElementById("ms_correo2").innerHTML = '';
					   return patron.test(n);

				}

}

function escorreo3(e) {

k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0 || k==13) return true;
patron = /[A-ZÑ0-9\_\-\.\+\@\ ]/;
n = String.fromCharCode(k);

				if(patron.test(n)==''){

					document.getElementById('ms_correo3').style.display = 'block';
					   document.getElementById("ms_correo3").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
						return patron.test(n);

				}else{

					   document.getElementById("ms_correo3").innerHTML = '';
					   return patron.test(n);

				}

}

function esdescri(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_descripcion').style.display = 'block';
                       	document.getElementById("ms_descripcion").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_descripcion").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esdobs(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

					if(patron.test(n)==''){

						document.getElementById('ms_a_obs').style.display = 'block';
						document.getElementById("ms_a_obs").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
							return patron.test(n);

					}else{

						document.getElementById("ms_a_obs").innerHTML = '';
						return patron.test(n);

					}

}

function esdconcepto(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_d_concepto').style.display = 'block';
                       	document.getElementById("ms_d_concepto").innerHTML = 'Use mayusculas y no incluya caractéres especiales ni espacios';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_d_concepto").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esdcantidad(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_d_cantidad').style.display = 'block';
                       	document.getElementById("ms_d_cantidad").innerHTML = 'Use solo nuúmeros';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_d_cantidad").innerHTML = '';
                       	return patron.test(n);

                    }

}


function esdcantidad2(e) {

k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0 || k==13) return true;
patron = /^[0-9\.]$/;
n = String.fromCharCode(k);

				if(patron.test(n)==''){

					document.getElementById('ms_d_costo').style.display = 'block';
					   document.getElementById("ms_d_costo").innerHTML = 'Use solo nuúmeros y punto decimal';
						return patron.test(n);

				}else{

					   document.getElementById("ms_d_costo").innerHTML = '';
					   return patron.test(n);

				}

}


function esa_comodato(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9\.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_a_comodato').style.display = 'block';
                       	document.getElementById("ms_a_comodato").innerHTML = 'Use solo números y no incluya caractéres especiales ni espacios';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_a_comodato").innerHTML = '';
                       	return patron.test(n);

                    }

}


function sig_1(){

	var vuelta=document.getElementById("caja_p");
	vuelta.focus();

}



function sig_2(){

	var vuelta33=document.getElementById("aviso");
	vuelta33.focus();

}

//************************************************************************/

			function esnombre2(e) {

					k = (document.all) ? e.keyCode : e.which;
					if (k==8 || k==0 || k==13) return true;
					patron = /^[A-ZÑ0-9\ \.\-]$/;
					n = String.fromCharCode(k);

							if(patron.test(n)==''){

								document.getElementById('ms_rt_nombre1').style.display = 'block';
								document.getElementById("ms_rt_nombre1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
									return patron.test(n);

							}else{

								document.getElementById("ms_rt_nombre1").innerHTML = '';
								return patron.test(n);

							}

			}


//************************************************************************/

function esnombre4(e) {

		k = (document.all) ? e.keyCode : e.which;
		if (k==8 || k==0 || k==13) return true;
		patron = /^[A-ZÑ0-9\ \.\-]$/;
		n = String.fromCharCode(k);

				if(patron.test(n)==''){

					document.getElementById('ms_nombre2').style.display = 'block';
					document.getElementById("ms_nombre2").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
						return patron.test(n);

				}else{

					document.getElementById("ms_nombre2").innerHTML = '';
					return patron.test(n);

				}

}
//************************************************************************



			function esentidad(e) {

				k = (document.all) ? e.keyCode : e.which;
				if (k==8 || k==0 || k==13) return true;
				patron = /^[A-ZÑ0-9\ \.\-]$/;
				n = String.fromCharCode(k);

					if(patron.test(n)==''){

						document.getElementById('ms_entidad').style.display = 'block';
						document.getElementById("ms_entidad").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
							return patron.test(n);

					}else{

						document.getElementById("ms_entidad").innerHTML = '';
						return patron.test(n);

					}

			}


//************************************************************************/


function esvictimas(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_num_vic').style.display = 'block';
                       	document.getElementById("ms_num_vic").innerHTML = 'Use solo números';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_num_vic").innerHTML = '';
                       	return patron.test(n);

                    }

}


//************************************************************************/

			function esnombre2(e) {

					k = (document.all) ? e.keyCode : e.which;
					if (k==8 || k==0 || k==13) return true;
					patron = /^[A-ZÑ0-9\ \.\-]$/;
					n = String.fromCharCode(k);

							if(patron.test(n)==''){

								document.getElementById('ms_rt_nombre1').style.display = 'block';
								document.getElementById("ms_rt_nombre1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
									return patron.test(n);

							}else{

								document.getElementById("ms_rt_nombre1").innerHTML = '';
								return patron.test(n);

							}

			}

//************************************************************************

			function esapellido1(e) {

				k = (document.all) ? e.keyCode : e.which;
				if (k==8 || k==0 || k==13) return true;
				patron = /^[A-ZÑ0-9\ \.\-]$/;
				n = String.fromCharCode(k);

					if(patron.test(n)==''){

						document.getElementById('ms_rt_apellido1').style.display = 'block';
						document.getElementById("ms_rt_apellido1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
							return patron.test(n);

					}else{

						document.getElementById("ms_rt_apellido1").innerHTML = '';
						return patron.test(n);

					}

			}

			//************************************************************************/

			function esnombre3(e) {

				k = (document.all) ? e.keyCode : e.which;
				if (k==8 || k==0 || k==13) return true;
				patron = /^[A-ZÑ0-9\ \.\-]$/;
				n = String.fromCharCode(k);

						if(patron.test(n)==''){

							document.getElementById('ms_rn_nombre1').style.display = 'block';
							document.getElementById("ms_rn_nombre1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
								return patron.test(n);

						}else{

							document.getElementById("ms_rn_nombre1").innerHTML = '';
							return patron.test(n);

						}

			}

//************************************************************************

		function esapellido2(e) {

				k = (document.all) ? e.keyCode : e.which;
				if (k==8 || k==0 || k==13) return true;
				patron = /^[A-ZÑ0-9\ \.\-]$/;
				n = String.fromCharCode(k);

				if(patron.test(n)==''){

					document.getElementById('ms_rn_apellido1').style.display = 'block';
					document.getElementById("ms_rn_apellido1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
						return patron.test(n);

				}else{

					document.getElementById("ms_rn_apellido1").innerHTML = '';
					return patron.test(n);

				}

		}
//************************************************************************
function esotro1(e) {

		k = (document.all) ? e.keyCode : e.which;
		if (k==8 || k==0 || k==13) return true;
		patron = /^[A-ZÑ0-9\ \.\-]$/;
		n = String.fromCharCode(k);

		if(patron.test(n)==''){

			document.getElementById('ms_otro1').style.display = 'block';
			document.getElementById("ms_otro1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
				return patron.test(n);

		}else{

			document.getElementById("ms_otro1").innerHTML = '';
			return patron.test(n);

		}

}

//************************************************************************/
function esafase(e) {

		k = (document.all) ? e.keyCode : e.which;
		if (k==8 || k==0 || k==13) return true;
		patron = /^[A-ZÑ0-9\ \.\-]$/;
		n = String.fromCharCode(k);

		if(patron.test(n)==''){

			document.getElementById('ms_afase').style.display = 'block';
			document.getElementById("ms_afase").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
				return patron.test(n);

		}else{

			document.getElementById("ms_afase").innerHTML = '';
			return patron.test(n);

		}

}


//************************************************************************
function esamedida(e) {

		k = (document.all) ? e.keyCode : e.which;
		if (k==8 || k==0 || k==13) return true;
		patron = /^[A-ZÑ0-9\ \.\-]$/;
		n = String.fromCharCode(k);

		if(patron.test(n)==''){

			document.getElementById('ms_amedida').style.display = 'block';
			document.getElementById("ms_amedida").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
				return patron.test(n);

		}else{

			document.getElementById("ms_amedida").innerHTML = '';
			return patron.test(n);

		}

}
//************************************************************************/
function esidaccion(e) {

		k = (document.all) ? e.keyCode : e.which;
		if (k==8 || k==0 || k==13) return true;
		patron = /^[A-ZÑ0-9\ \.\-]$/;
		n = String.fromCharCode(k);

		if(patron.test(n)==''){

			document.getElementById('ms_idaccion').style.display = 'block';
			document.getElementById("ms_idaccion").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
				return patron.test(n);

		}else{

			document.getElementById("ms_idaccion").innerHTML = '';
			return patron.test(n);

		}

}
//************************************************************************/

			function readURL(input) {

				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#file_url').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}


			function esnumero_sol(e) {

			k = (document.all) ? e.keyCode : e.which;
			if (k==8 || k==0 || k==13) return true;
			patron = /[0-9]/;
			n = String.fromCharCode(k);

				if(patron.test(n)==''){

					document.getElementById('ms_num_sol').style.display = 'block';
					document.getElementById("ms_num_sol").innerHTML = 'Use solo números';
						return patron.test(n);

				}else{

					document.getElementById("ms_num_sol").innerHTML = '';
					return patron.test(n);

				}

}

function esnumero_costo_evento(e) {

k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0 || k==13) return true;
patron = /[0-9]/;
n = String.fromCharCode(k);

	if(patron.test(n)==''){

		document.getElementById('ms_costo_evento_cotizado').style.display = 'block';
		document.getElementById("ms_costo_evento_cotizado").innerHTML = 'Use solo números';
			return patron.test(n);

	}else{

		document.getElementById("ms_costo_evento_cotizado").innerHTML = '';
		return patron.test(n);

	}

}

function esnumero_serv_no_grav(e) {

k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0 || k==13) return true;
patron = /[0-9]/;
n = String.fromCharCode(k);

	if(patron.test(n)==''){

		document.getElementById('ms_servicios_no_gravados').style.display = 'block';
		document.getElementById("ms_servicios_no_gravados").innerHTML = 'Use solo números';
			return patron.test(n);

	}else{

		document.getElementById("ms_servicios_no_gravados").innerHTML = '';
		return patron.test(n);

	}

}
function esnumero_pagos_a_terceros(e) {

k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0 || k==13) return true;
patron = /[0-9]/;
n = String.fromCharCode(k);

	if(patron.test(n)==''){

		document.getElementById('ms_pagos_a_terceros').style.display = 'block';
		document.getElementById("ms_pagos_a_terceros").innerHTML = 'Use solo números';
			return patron.test(n);

	}else{

		document.getElementById("ms_pagos_a_terceros").innerHTML = '';
		return patron.test(n);

	}

}
function esnumero_servicios_gravados(e) {

k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0 || k==13) return true;
patron = /[0-9]/;
n = String.fromCharCode(k);

	if(patron.test(n)==''){

		document.getElementById('ms_servicios_gravados').style.display = 'block';
		document.getElementById("ms_servicios_gravados").innerHTML = 'Use solo números';
			return patron.test(n);

	}else{

		document.getElementById("ms_servicios_gravados").innerHTML = '';
		return patron.test(n);

	}

}
function esnumero_gastos_reembolsables(e) {

k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0 || k==13) return true;
patron = /[0-9]/;
n = String.fromCharCode(k);

	if(patron.test(n)==''){

		document.getElementById('ms_gastos_reembolsables').style.display = 'block';
		document.getElementById("ms_gastos_reembolsables").innerHTML = 'Use solo números';
			return patron.test(n);

	}else{

		document.getElementById("ms_gastos_reembolsables").innerHTML = '';
		return patron.test(n);

	}

}

function esnumero_ms_giro_fecty(e) {

k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0 || k==13) return true;
patron = /[0-9]/;
n = String.fromCharCode(k);

	if(patron.test(n)==''){

		document.getElementById('ms_giro_fecty').style.display = 'block';
		document.getElementById("ms_giro_fecty").innerHTML = 'Use solo números';
			return patron.test(n);

	}else{

		document.getElementById("ms_giro_fecty").innerHTML = '';
		return patron.test(n);

	}

}
function esnumero_tiquetes_ejecutado(e) {

k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0 || k==13) return true;
patron = /[0-9]/;
n = String.fromCharCode(k);

	if(patron.test(n)==''){

		document.getElementById('ms_costo_tiquetes_ejecutado').style.display = 'block';
		document.getElementById("ms_costo_tiquetes_ejecutado").innerHTML = 'Use solo números';
			return patron.test(n);

	}else{

		document.getElementById("ms_costo_tiquetes_ejecutado").innerHTML = '';
		return patron.test(n);

	}

}

/// NUEVAS FUNCIONES


function BloquearCampos(){
		
	
		document.getElementById("costo_evento_cotizado").disabled = true;
		document.getElementById("servicios_no_gravados").disabled = true;
		document.getElementById("pagos_a_terceros").disabled = true;
		document.getElementById("servicios_gravados").disabled = true;
		document.getElementById("iva").disabled = true;
		document.getElementById("ejecutado_logistico").disabled = true;
		document.getElementById("gastos_reembolsables").disabled = true;
		document.getElementById("intermediacion").disabled = true;
		document.getElementById("iva_intermediacion_reembolso").disabled = true;		
		document.getElementById("ejecutado_reembolso").disabled = true;
		document.getElementById("costo_tiquetes_ejecutado").disabled = true;


		document.getElementById("iva_tiquetes").disabled = true;
		document.getElementById("costo_total_tiquetes").disabled = true;
		document.getElementById("costo_total_evento").disabled = true;
		document.getElementById("save").disabled = true;
		document.getElementById("giro_fecty").disabled = true;
		document.getElementById("base_iva").disabled = true;
		document.getElementById("base_iva_ree").disabled = true;


		


 }

 function DesBloquearCampos(){
		
	

		document.getElementById("costo_evento_cotizado").disabled = false;
		document.getElementById("servicios_no_gravados").disabled = false;
		document.getElementById("pagos_a_terceros").disabled = false;
		document.getElementById("servicios_gravados").disabled = false;
		document.getElementById("iva").disabled = true;
		document.getElementById("ejecutado_logistico").disabled = true;
		document.getElementById("gastos_reembolsables").disabled = false;
		document.getElementById("intermediacion").disabled = true;
		document.getElementById("iva_intermediacion_reembolso").disabled = true;		
		document.getElementById("ejecutado_reembolso").disabled = true;
		document.getElementById("costo_tiquetes_ejecutado").disabled = false;


		document.getElementById("iva_tiquetes").disabled = true;
		document.getElementById("costo_total_tiquetes").disabled = true;
		document.getElementById("costo_total_evento").disabled = true;
		document.getElementById("save").disabled = false;
		document.getElementById("giro_fecty").disabled = false;
		document.getElementById("base_iva").disabled = false;
		document.getElementById("base_iva_ree").disabled = false;


 }

 function DesBloquearProceso(){
		
		document.getElementById("procesar").disabled = false;
		document.getElementById("precarga").disabled = false;

 }

	function LimpiarCampos(){
		
	
        document.getElementById("num_sol").value = '';
	    document.getElementById("nombre").value = '';
		document.getElementById("costo_evento_cotizado").value = '';
		document.getElementById("servicios_no_gravados").value = '';
		document.getElementById("pagos_a_terceros").value = '';
		document.getElementById("servicios_gravados").value = '';
		document.getElementById("iva").value = '';
		document.getElementById("ejecutado_logistico").value = '';
		document.getElementById("gastos_reembolsables").value = '';
		document.getElementById("intermediacion").value = '';
		document.getElementById("iva_intermediacion_reembolso").value = '';		
		document.getElementById("ejecutado_reembolso").value = '';
		document.getElementById("costo_tiquetes_ejecutado").value = '';


		document.getElementById("iva_tiquetes").value = '';
		document.getElementById("costo_total_tiquetes").value = '';
		document.getElementById("costo_total_evento").value = '';
		document.getElementById("save").value = '';
		document.getElementById("giro_fecty").value = ''; 	 	


 }
	

 </script>
 <?php include_once("../layouts/pie.php") ?>