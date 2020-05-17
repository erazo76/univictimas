<?php

//include("../../lib/validar_session.php");
include("../../lib/validar_session.php");
ValidaSession("../login");
//VerificarAdmin($_SESSION['rolx']);

?>

<?php include("../layouts/constantes.php")?>
<?php include_once("../layouts/cabezera.php") ?>

<div class="message"></div>

<form id="form" role="form" enctype="multipart/form-data">

		<input type="hidden" id="distribuidora" value="<?php echo intval($_SESSION['distribuidora']); ?>">
		<input type="hidden" id="region" value="<?php echo intval($_SESSION['region']); ?>">

<div class="row">

	<div class="col-md-1">
		<div class="flotante">
			<button id="print" class="btn btn-primary oculto-impresion " type="button"><i class="fa fa-fw fa-print"></i>Imprimir</button>
		</div>
	</div>

	<div class="col-md-11" style="width:216mm; height:356mm;overflow:auto;" >

		<div class="box-header with-border" tabindex="-1">
			<h3 class="box-title">FORMATO SOLICITUD AL OPERADOR</h3>
		</div> <!--/.box-header	

		<div class="box box-primary"  style="width:216mm; height:100%; overflow:auto;">
			<div class="box-body ">-->
		
			<div class="contenedorw" id="printJS-form">
				
				<img src="../../dist/img/unidadvictimaslogo2018-2.png" alt="logo" class="caja1 logunivic bnn">
				
				<div class="caja1 tit_1 fro" style="color:#fff;">FORMATO SOLICITUD AL OPERADOR</div>
				<div class="caja1 tit_1">PROCEDIMIENTO: ESTRATEGIAS DE REPARACIÓN INTEGRAL</div>
				<div class="caja1 tit_1">PROCESO: REPARACIÓN INTEGRAL</div>
				<div class="caja1 letrap cj16p">Código: 400.08.15-67</div>
				<div class="caja1 letrap cj16p">Versión: 04</div>
				<div class="caja1 letrap cj16p">Fecha: 14/02/2018</div>
				<div class="caja1 pg6_8 cj16p" >Página: 1 de 1</div>
				<div class="caja1 tit_2">CONTRATO No.  1296 de 2017</div>
				<div class="caja1 fgr">OBJETO DEL CONTRATO: </div>
				<div class="caja1 tit_3">Prestar sus servicios para apoyar la organización, administración y producción de las jornadas o acciones para la implementación de medidas de reparación integral a las víctimas del conflicto armado que le sean solicitadas por LA UNIDAD, de acuerdo con los requerimientos técnicos.</div>
				<div class="caja1 tit_2 faz" style="color:#fff !important;">REQUERIMIENTOS DE SERVICIO PARA ACCIONES DE LA DIRECCIÓN DE REPARACIÓN</div>
				
				<div class="caja1 tit_2 finito"></div>

				<div class="caja1 tit_2 faz" style="color:#fff !important;">INFORMACIÓN GENERAL DEL EVENTO</div>
			
				<div class="caja1 finito2 tit_2">

				</div><div class="caja1 fgr pg1_3">NOMBRE DEL EVENTO:</div>
				<div class="caja1 pg3_8" id="nombre"></div>

				<div class="caja1 finito2 tit_2"></div>

				<div class="caja1 faz aiz" style="color:#fff !important;">N° EVENTO:</div><div class="caja1 cj24p" id="id"></div>
				<div class="caja1 fgr letrap">FECHA DE SOLICITUD:</div><div class="caja1 cj24p" id="fecha1"></div>
				<div class="caja1 fgr letrap">DIRECCION TERRITORIAL:</div><div class="caja1 cj24p pg6_8" id="dir_terri" style="line-height: 10px;"></div>

				<div class="caja1 finito2 tit_2"></div>

				<div class="caja1 fgr">DEPARTAMENTO:</div><div class="caja1 cj24p" id="departamento" style="line-height: 10px;font-size:8px;"></div>
				<div class="caja1 fgr">MUNICIPIO:</div><div class="caja1 cj24p" id="municipio" style="line-height: 10px;font-size:8px;"></div>
				<div class="caja1 fgr letrap">COREGIMIENTO VEREDA:</div><div class="caja1 cj24p pg6_8" id="cpoblado"></div>
				
				<div class="caja1 finito2 tit_2"></div>

				<div class="caja1 fgr pg1_3 cj16p">DIRECCION Y LUGAR EXACTO DEL EVENTO:</div>
				<div class="caja1 fgr pg3_6 cj16p">FECHA DE INICIO Y FIN DEL EVENTO:</div><div class="caja1 fgr pg6_8 cj16p">HORA DE INICIO Y FIN DEL EVENTO:</div>
				<div class="caja1 pg1_3 cj32p pgr18_20 " id="direccion"></div>
				<div class="caja1 fgr cj16p pg3_5">FECHA INICIO:</div><div class="caja1 cj16p " id="fecha2"></div>
				<div class="caja1 fgr cj16p  ">HORA DE INICIO:</div><div class="caja1 cj16p" id="hora1"></div>
				<div class="caja1 fgr cj16p pg3_5">FECHA FIN:</div><div class="caja1 cj16p " id="fecha3"></div>
				<div class="caja1 fgr cj16p  ">HORA DE FINALIZACIÓN:</div><div class="caja1 cj16p" id="hora2"></div>
				<div class="caja1 fgr pg1_3">RESPONSABLE DEL EVENTO:</div><div class="caja1 pg3_8 cj24p" id="responsable"></div>
				<div class="caja1 fgr cj24p pg1_3">CELULAR Y CORREO ELECTRÓNICO DEL RESPONSABLE:</div><div class="caja1 pg3_8 cj24p" id="contacto"></div>
				<div class="caja1 fgr cj24p pg1_3">MARQUE CON UNA X SI EL EVENTO PERTENECE A:</div>
				<div class="caja1 pg3_8 cj24p">
				Reparación Individual:  <input type="radio" name="tipo" id="rta">  
				Reparación Colectiva: 	<input type="radio" name="tipo" id="rtb">   
				Retornos y Reubicaciones:	<input type="radio" name="tipo" id="rtc">    
				Otra: 	<input type="radio" name="tipo" id="rtd">  
				</div>
				<div class="caja1 caja1 fgr cj24p pg1_3">GRUPO/ÁREA/EQUIPO/DEPENDENCIA:</div>
				<div class="caja1 pg3_8 cj24p" id="grupo"></div>

				<div class="caja1 finito2 tit_2"></div>
				
				<div class="caja1 tit_2 faz" style="color:#fff !important;">INFORMACIÓN RELACIONADA CON EL TIPO DE ACTIVIDAD</div>

				<div class="caja1 finito2 tit_2"></div>

				<div class="caja1 tit_2a ">(ESPACIO EXCLUSIVO PARA REPARACIÓN INDIVIDUAL) MARQUE CON UNA X SI LA ACTIVIDAD CORRESPONDE A UNA O VARIAS DE LAS SIGUIENTES OPCIONES: </div>
				<div class="caja1 tit_2b alto2">

						<div class="caja cj24p">
						Jornada Diferencial	<input type="radio" name="tipo1" id="tipo1a">  
						Feria de Servicios	<input type="radio" name="tipo1" id="tipo1b">  
						Conmemoración	<input type="radio" name="tipo1" id="tipo1c">  
						Iniciativa local de memoria	<input type="radio" name="tipo1" id="tipo1d">  
						Acto de Reconocimiento u orden judicial	<input type="radio" name="tipo1" id="tipo1e">  
						</div>
						<div class="caja cj24p">
						Taller por línea de inversión	<input type="radio" name="tipo1" id="tipo1f">  
						Entrega digna de cadáveres	<input type="radio" name="tipo1" id="tipo1g">  
						Charla de educación financiera	<input type="radio" name="tipo1" id="tipo1h">  
						Otro	<input type="radio" name="tipo1" id="tipo1i">  
						</div>
						<div class="caja cj24p" id="otro1"></div>
				</div>

				<div class="caja1 finito2 tit_2"></div>

				<div class="caja1 tit_2a">(ESPACIO EXCLUSIVO PARA REPARACIÓN RETORNOS Y REUBICACIONES) MARQUE CON UNA X SI LA ACTIVIDAD CORRESPONDE A UNA O VARIAS DE LAS SIGUIENTES OPCIONES: </div>
				<div class="caja1 tit_2b alto1">
					<div class="caja cj24p">
					Integración Comunitaria	<input type="radio" name="tipo2" id="tipo2a">  
					Retorno	<input type="radio" name="tipo2" id="tipo2b">  
					Reubicación	<input type="radio" name="tipo2" id="tipo2c">  
					Esquemas Especiales de Acompañamiento	<input type="radio" name="tipo2" id="tipo2d">  
					Casos Emblemáticos 	<input type="radio" name="tipo2" id="tipo2e">  
					</div>
					<div class="caja cj24p">
					Seguimiento procesos Retornos y Reubicaciones	<input type="radio" name="tipo2" id="tipo2f">  
					</div>
				</div>

				<div class="caja1 finito2 tit_2"></div>
				 
				<div class="caja1 tit_2a">(ESPACIO EXCLUSIVO PARA REPARACIÓN COLECTIVA) MARQUE CON UNA X SI LA ACTIVIDAD CORRESPONDE A UNA O VARIAS DE LAS SIGUIENTES OPCIONES: </div>
				<div class="caja1 tit_2b alto3">
					<div class="contenedorx">
						<div class="caja1 cj24p aiz pg1_6" style="border-bottom: solid;" >NOMBRE DEL SUJETO DE REPARACIÓN COLECTIVA:</div>
						<div class="caja1 cj24p aiz pg6_8" style="border-bottom: solid;">ID SUJETO DE REPARACIÓN COLECTIVA:</div>
						<div class="caja2 cj24p pg1_4">TIPO DE SUJETO:</div>
						<div class="caja2 cj24p pg4_6"></div>
						<div class="caja cj24p pg6_8">

						</div>

						<div class="caja2 cj24p pg1_4">|No étnico:| 
						Comunidad<input type="radio" name="tipo3" id="tipo3a"> 
						Comunidad campesina	<input type="radio" name="tipo3" id="tipo3b"> 
						Grupo<input type="radio" name="tipo3" id="tipo3c">  
							
						</div>
						<div class="caja2 cj24p pg4_6">Marcar con X:
						 
						</div>
						<div class="caja cj24p pg6_8">Marcar con X: Si el evento es de
							 
						</div>

						<div class="caja2 cj24p pg1_4">
						Organizaciones	<input type="radio" name="tipo3" id="tipo3d">  
						Organización de mujeres	<input type="radio" name="tipo3" id="tipo3e">  
						</div>
						<div class="caja2 cj24p pg4_6 aiz">Si el evento es de ruta	
							<input  type="checkbox" name="aruta" id="aruta"> indicar

						</div>
						<div class="caja cj24p pg6_8 aiz ">implementación del PIRC aprobado
							<input  type="checkbox" name="apirc" id="apirc">indicar
						</div>

						<div class="caja2 cj24p pg1_4">|Étnico:|
						Indígena	<input type="radio" name="tipo4" id="tipo4a">  
						Ancestral	<input type="radio" name="tipo4" id="tipo4b">  
						RROM o gitano	<input type="radio" name="tipo4" id="tipo4c">  
							
						</div>
						<div class="caja2 cj24p pg4_6 aiz"> fase en que se encuentra:
							

						</div>
						<div class="caja cj24p pg6_8 aiz" id="amedida">tipo de Medida: 

						</div>

						<div class="caja2 cj24p pg1_4">
						Afrocolombiana	<input type="radio" name="tipo4" id="tipo4d">  
						Negra	<input type="radio" name="tipo4" id="tipo4e">  
						</div>
						<div class="caja2 cj24p pg4_6" id="afase"></div>

						<div class="caja cj24p pg6_8 aiz" id="idaccion">ID evento:</div>



						
					</div>
				</div>
				<div class="caja1 tit_2 finito2"></div>						
						<div class="caja1 tit_2 faz" style="color:#fff !important;">DESCRIPCIÓN DEL DESARROLLO DE  LA ACTIVIDAD</div>					
						<div class="caja1 finito2 tit_2"></div>

						<div class="caja1 fgr aiz ">ENTIDADES PARTICIPANTES:</div>
						<div class="caja1 cj24p pg2_6" id="entidad"></div>
						<div class="caja1 fgr aiz letrap">NÚMERO DE VÍCTIMAS PARTICIPANTES:</div>
						<div class="caja1 cj24p" id="num_vic"></div>
						<div class="caja1 tit_2b alto1 aiz" id="descripcion">DESCRIPCIÓN BREVE:</div>

				<div class="caja1 tit_2 finito2"></div>						
						<div class="caja1 tit_2 faz" style="color:#fff !important;">DETALLE ESPECIFICO DEL REQUERIMIENTO</div>					
						<div class="caja1 finito2 tit_2"></div>	

			</div>
			<div class="contenedorw">
				<div class="caja1 tit_2 fac" >SALONES</div>	
				<div class="caja1 pg1_4 fgr" >CONCEPTO</div>
				<div class="caja1 pg4_5 fgr letrap" >UNIDAD DE MEDIDA</div>
				<div class="caja1 pg5_6 fgr" >CANTIDAD</div>
				<div class="caja1 pg6_8 fgr" >OBSERVACIONES</div>
			</div>
			<div class="conten_gen" id="salones"></div>

			<div class="contenedorx">
				<div class="caja1 tit_2 fac" >ALIMENTACIÓN</div>	
				<div class="caja1 pg1_4 fgr" >CONCEPTO</div>
				<div class="caja1 pg4_5 fgr letrap" >UNIDAD DE MEDIDA</div>
				<div class="caja1 pg5_6 fgr" >CANTIDAD</div>
				<div class="caja1 pg6_8 fgr" >OBSERVACIONES</div>
			</div>
			<div class="conten_gen" id="alimentos"></div>
			
			<div class="contenedorx">
				<div class="caja1 tit_2 fac" >MATERIALES</div>	
				<div class="caja1 pg1_4 fgr" >CONCEPTO</div>
				<div class="caja1 pg4_5 fgr letrap" >UNIDAD DE MEDIDA</div>
				<div class="caja1 pg5_6 fgr" >CANTIDAD</div>
				<div class="caja1 pg6_8 fgr" >OBSERVACIONES</div>
			</div>
			<div class="conten_gen" id="materiales"></div>

			<div class="contenedorx">
				<div class="caja1 tit_2 fac" >COTIZABLES</div>	
				<div class="caja1 pg1_4 fgr" >CONCEPTO</div>
				<div class="caja1 pg4_5 fgr letrap" >UNIDAD DE MEDIDA</div>
				<div class="caja1 pg5_6 fgr" >CANTIDAD</div>
				<div class="caja1 pg6_8 fgr" >OBSERVACIONES</div>
			</div>
			<div class="conten_gen" id="cotizables"></div>
			<!--</div>	


		</div>-->

	

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
<script src="../../plugins/select3/bootstrap-select.min.js"></script>
<script src="../../plugins/select3/i18n/defaults-es_ES.min.js"></script>


<link rel="stylesheet" href="../../plugins/confirma/jquery-confirm.min.css" type="text/css"/>
<link rel="stylesheet" href="../../css/style_format_pass.css" type="text/css"/>
<link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css" type="text/css"/>
<link rel="stylesheet" href="../../plugins/unslider/unslider.css">
<link rel="stylesheet" href="../../plugins/leaflet/leaflet.css"/>
<link rel="stylesheet" href="../../css/reportes.css"  type="text/css" media="all"/>
<link rel="stylesheet" href="../../plugins/select3/bootstrap-select.min.css">


<script type="text/javascript">

	$(document).ready(function() {


		$.post( "../../controllers/mrequerimientos_controller", { action: "search",record:<?php echo intval($_GET["record"]); ?>}).done(function( data ) {

//alert(data);
	var parsedJson = $.parseJSON(data);

	var idd=parsedJson.id.toString();
	$("#id").html(idd.padStart(4, 0));

	$("#nombre").html(parsedJson.nombre);
	$("#fecha1").html(parsedJson.fecha1);

	var bdep =parsedJson.departamento;
	var bmun =parsedJson.municipio;
	var bcpo =parsedJson.cpoblado;

	$.post( "../../controllers/mgeograficas_controller", { action: "get_departamentos_e",departamento:bdep}).done(function( data ) {

		$("#departamento" ).html( data );
		$("#dir_terri" ).html( data );
		

	});	

	$.post( "../../controllers/mgeograficas_controller", { action: "get_municipios_e",municipio: bmun}).done(function( data ) {

		$("#municipio" ).html( data );

	});

	$.post( "../../controllers/mgeograficas_controller", {action: "get_cpoblado_e",cpoblado: bcpo}).done(function( data ) {
	
		$("#cpoblado" ).html( data );
	
	});	

	var d_aprima =parsedJson.a_primario;
	var d_acc1 =parsedJson.acceso1;
	var d_acc2 =parsedJson.acceso2;
	var d_numd =parsedJson.num_dir;
	var d_aref =parsedJson.a_referencia;
	var d_refe =parsedJson.referencia;

	switch (d_aprima) {
		case 0:	aprima="Avenida";break;
		case 1: aprima="Calle";break;					
		case 2:	aprima="Carrera";break;
		case 3:	aprima="Vereda";break;			
		case 4:	aprima="Callejón";break;			
		case 5:	aprima="Carretera";break;			
		case 6:	aprima="Autopista";break;
	}
	
	switch (d_aref) {
		case 0:	aref="Al lado";break;
		case 1: aref="Cerca";break;					
		case 2:	aref="Frente";break;
		case 3:	aref="Diagonal";break;			
		case 4:	aref="Detras";break;			
		case 5:	aref="Via";break;			
		case 6:	aref="Dentro";break;
	}

	var direcc= aprima+' '+d_acc1+' #'+d_acc2+'-'+d_numd+' ('+aref+' '+d_refe+').'

	$("#direccion").html(direcc);

	$("#fecha2").html(parsedJson.fecha2);
	$("#fecha3").html(parsedJson.fecha3);
	$("#hora1").html(parsedJson.hora1);
	$("#hora2").html(parsedJson.hora2);

	var n1=parsedJson.rt_nombre1;
	var n2=parsedJson.rt_nombre2;
	var a1=parsedJson.rt_apellido1;
	var a2=parsedJson.rt_apellido2;
	var ntdoc=parsedJson.rt_tdoc;
	var ntnd=parsedJson.rt_num_doc;

	switch (ntdoc) {
		case 0:	tdoc="CC: ";break;
		case 1: tdoc="CE: ";break;					
		case 2:	tdoc="PA. ";break;
	}

	var respon=n1+' '+n2+' '+a1+' '+a2+' - '+tdoc+ntnd;
	$("#responsable").html(respon);

	var tel1=parsedJson.tele1;
	var email=parsedJson.correo1;
	var contac=email+', Celular: '+tel1;

	$("#contacto").html(contac);

	var grup=parsedJson.grupo;
	  
	  $.post( "../../controllers/grupos_controller", { action: "get_grupo",grupo:grup}).done(function( data ) {

		$("#grupo").html( data );

	});	

	var tip1=parsedJson.tipo1;
	switch (tip1) {
		case 0:	$("#tipo1a").attr('checked', true);break;
		case 1:	$("#tipo1b").attr('checked', true);break;
		case 2:	$("#tipo1c").attr('checked', true);break;
		case 3:	$("#tipo1d").attr('checked', true);break;
		case 4:	$("#tipo1e").attr('checked', true);break;
		case 5:	$("#tipo1f").attr('checked', true);break;
		case 6:	$("#tipo1g").attr('checked', true);break;
		case 7:	$("#tipo1h").attr('checked', true);break;
		case 8:	$("#tipo1i").attr('checked', true);break;
	}

	$("#otro1").html(parsedJson.otro1);

	var tip2=parsedJson.tipo2;
	switch (tip2) {
		case 0:	$("#tipo2a").attr('checked', true);break;
		case 1:	$("#tipo2b").attr('checked', true);break;
		case 2:	$("#tipo2c").attr('checked', true);break;
		case 3:	$("#tipo2d").attr('checked', true);break;
		case 4:	$("#tipo2e").attr('checked', true);break;
		case 5:	$("#tipo2f").attr('checked', true);break;
	}

	var tip3=parsedJson.tipo3;
	switch (tip3) {
		case 0:	$("#tipo3a").attr('checked', true);break;
		case 1:	$("#tipo3b").attr('checked', true);break;
		case 2:	$("#tipo3c").attr('checked', true);break;
		case 3:	$("#tipo3d").attr('checked', true);break;
		case 4:	$("#tipo3e").attr('checked', true);break;
	}

	var tip4=parsedJson.tipo4;
	switch (tip4) {
		case 0:	$("#tipo4a").attr('checked', true);break;
		case 1:	$("#tipo4b").attr('checked', true);break;
		case 2:	$("#tipo4c").attr('checked', true);break;
		case 3:	$("#tipo4d").attr('checked', true);break;
		case 4:	$("#tipo4e").attr('checked', true);break;
	}

	var ruvl=parsedJson.arutaval;
	switch (ruvl) {
		case 0:	$("#aruta").attr('checked', false);break;
		case 1:	$("#aruta").attr('checked', true);break;
	}
	$("#afase").html(parsedJson.afase);

	var pirc=parsedJson.apircval;
	switch (pirc) {
		case 0:	$("#apirc").attr('checked', false);break;
		case 1:	$("#apirc").attr('checked', true);break;
	}
	var med=parsedJson.amedida;	

	medida='tipo de Medida: '+med;
	$("#amedida").html(medida);

	var acc=parsedJson.idaccion;	
	accis='ID evento: '+acc;
	$("#idaccion").html(accis);


	$("#entidad").html(parsedJson.entidad);
	$("#num_vic").html(parsedJson.num_vic);
	$("#descripcion").html("Descripción breve: "+parsedJson.descripcion);

	var alojan=parsedJson.aloja;
	switch (alojan) {
		case 0:	$("#aloja").attr('checked', false);break;
		case 1:	$("#aloja").attr('checked', true);break;
	}
	
	var transi=parsedJson.trans;
	switch (transi) {
		case 0:	$("#trans").attr('checked', false);break;
		case 1:	$("#trans").attr('checked', true);break;
	}

	//control de tipos

	if(tip1>0){
		$("#rta").attr('checked', true)
	}else if(tip2>0){
		$("#rtb").attr('checked', true)
	}else if(tip3>0){
		$("#rtc").attr('checked', true)
	}else{
		$("#rtd").attr('checked', true)
	}

	});

//#########################################INSERTAR LOS DIVS CON LA COSNSULA DE  LA TABLA DETALLES#####################################

		$.post( "../../controllers/mdetalles_controller", { action: "search",record:<?php echo intval($_GET["record"]); ?>}).done(function( data ) {

			var parsedJson = $.parseJSON(data);

			
				parsedJson.forEach(function(parsedJson, index) {
					//console.log("indice " + index + " | tipo " + parsedJson.tipo + " concepto: " + parsedJson.concepto + " cantidad: " + parsedJson.cantidad + " medida: " + parsedJson.medida + " observaciones: " + parsedJson.observaciones)
				
					var r_tipo =parsedJson.tipo;
					var r_concepto =parsedJson.concepto;
					var r_cantidad =parsedJson.cantidad;
					var r_medida =parsedJson.medida;
							switch (r_medida) {
								case 0:	med='Metros';break;
								case 1: med='Unidades';break;
								case 2:	med='Kilogramos';break;
								case 3:	med='Gramos';break;
								case 4: med='Centimetros';break;
								case 5:	med='Pulgadas';break;
								case 6:	med='Libras';break;
								case 7:	med='Litros';break;
								case 8:	med='Galones';break;
							}

					var r_observaciones =parsedJson.observaciones;	

					switch (r_tipo) {
						case 0:	
						//insertar div de SALONES						
						$('#salones').append('<div class="caja1 pg1_4 ">'+r_concepto+'</div><div class="caja1 pg4_5">'+r_cantidad+'</div><div class="caja1 pg5_6">'+med+'</div><div class="caja1 pg6_8">'+r_observaciones+'</div>');
					
						break;
						case 1:	
						//insertar div de ALIMENTACION
						$('#alimentos').append('<div class="caja1 pg1_4 ">'+r_concepto+'</div><div class="caja1 pg4_5">'+r_cantidad+'</div><div class="caja1 pg5_6">'+med+'</div><div class="caja1 pg6_8">'+r_observaciones+'</div>');
					
						break;
						case 2:	
						//insertar div de MATERIALES
						$('#materiales').append('<div class="caja1 pg1_4 ">'+r_concepto+'</div><div class="caja1 pg4_5">'+r_cantidad+'</div><div class="caja1 pg5_6">'+med+'</div><div class="caja1 pg6_8">'+r_observaciones+'</div>');
					
						break;
						case 3:	
						//insertar div de CONTABLES
						$('#cotizables').append('<div class="caja1 pg1_4 ">'+r_concepto+'</div><div class="caja1 pg4_5">'+r_cantidad+'</div><div class="caja1 pg5_6">'+med+'</div><div class="caja1 pg6_8">'+r_observaciones+'</div>');
					
						break;						
					}
				
				
				
				
				});


		});	

//##############################INSERTAR LOS DIVS CON LA COSNSULA DE  LA TABLA DETALLES ###############################################

	$('#print').click( function () {

		setTimeout(function () { 
			window.print(); 
		}, 500);
		
	});		

});	

</script>
<?php include_once("../layouts/pie.php") ?>