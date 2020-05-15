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
	<div class="col-md-12 col-md-offset-2" style="width:100%; height:100%;overflow:auto;" >

		<div class="box-header with-border" tabindex="-1">
			<h3 class="box-title">FORMATO SOLICITUD AL OPERADOR</h3>
		</div><!-- /.box-header -->	

		<div class="box box-primary"  style="width:216mm; height:500px; overflow:auto;">
			<div class="box-body ">
		
			<div class="contenedorw">
				<div class="caja1 logunivic"></div>
				<div class="caja1 tit_1 fro" >FORMATO SOLICITUD AL OPERADOR</div>
				<div class="caja1 tit_1">PROCEDIMIENTO: ESTRATEGIAS DE REPARACIÓN INTEGRAL</div>
				<div class="caja1 tit_1">PROCESO: REPARACIÓN INTEGRAL</div>
				<div class="caja1 letrap cj16p">Código: 400.08.15-67</div>
				<div class="caja1 letrap cj16p">Versión: 04</div>
				<div class="caja1 letrap cj16p">Fecha: 14/02/2018</div>
				<div class="caja1 pg6_8 cj16p" >Página: 1 de 1</div>
				<div class="caja1 tit_2">CONTRATO No.  1296 de 2017</div>
				<div class="caja1 fgr">OBJETO DEL CONTRATO: </div>
				<div class="caja1 tit_3">Prestar sus servicios para apoyar la organización, administración y producción de las jornadas o acciones para la implementación de medidas de reparación integral a las víctimas del conflicto armado que le sean solicitadas por LA UNIDAD, de acuerdo con los requerimientos técnicos.</div>
				<div class="caja1 tit_2 faz">REQUERIMIENTOS DE SERVICIO PARA ACCIONES DE LA DIRECCIÓN DE REPARACIÓN</div>
				
				<div class="caja1 tit_2 finito"></div>

				<div class="caja1 tit_2 faz">INFORMACIÓN GENERAL DEL EVENTO</div>
			
				<div class="caja1 finito2 tit_2">

				</div><div class="caja1 fgr pg1_3">NOMBRE DE LA ACTIVIDAD:</div>
				<div class="caja1 pg3_8"></div>

				<div class="caja1 finito2 tit_2"></div>

				<div class="caja1 faz aiz">N° EVENTO:</div><div class="caja1 cj24p"></div>
				<div class="caja1 fgr letrap">FECHA DE SOLICITUD:</div><div class="caja1 cj24p"></div>
				<div class="caja1 fgr letrap">DIRECCION TERRITORIAL:</div><div class="caja1 cj24p pg6_8"></div>

				<div class="caja1 finito2 tit_2"></div>

				<div class="caja1 fgr">DEPARTAMENTO:</div><div class="caja1 cj24p"></div>
				<div class="caja1 fgr">MUNICIPIO:</div><div class="caja1 cj24p"></div>
				<div class="caja1 fgr letrap">COREGIMIENTO VEREDA:</div><div class="caja1 cj24p pg6_8"></div>
				
				<div class="caja1 finito2 tit_2"></div>

				<div class="caja1 fgr pg1_3 cj16p">DIRECCION Y LUGAR EXACTO DEL EVENTO:</div>
				<div class="caja1 fgr pg3_6 cj16p">FECHA DE INICIO Y FIN DEL EVENTO:</div><div class="caja1 fgr pg6_8 cj16p">HORA DE INICIO Y FIN DEL EVENTO:</div>
				<div class="caja1 pg1_3 cj32p pgr18_20 "></div>
				<div class="caja1 fgr cj16p pg3_5">FECHA INICIO:</div><div class="caja1 cj16p "></div>
				<div class="caja1 fgr cj16p  ">HORA DE INICIO:</div><div class="caja1 cj16p"></div>
				<div class="caja1 fgr cj16p pg3_5">FECHA FIN:</div><div class="caja1 cj16p "></div>
				<div class="caja1 fgr cj16p  ">HORA DE FINALIZACIÓN:</div><div class="caja1 cj16p"></div>
				<div class="caja1 fgr pg1_3">RESPONSABLE DEL EVENTO:</div><div class="caja1 pg3_8 cj24p"></div>
				<div class="caja1 fgr cj24p pg1_3">CELULAR Y CORREO ELECTRÓNICO DEL ERPONSABLE:</div><div class="caja1 pg3_8 cj24p"></div>
				<div class="caja1 fgr cj24p pg1_3">MARQUE CON UNA X SI EL EVENTO PERTENECE A:</div>
				<div class="caja1 pg3_8 cj24p">
				Reparación Individual:  <input type="radio" name="tipo" id="tipo">  
				Reparación Colectiva: 	<input type="radio" name="tipo" id="tipo">   
				Retornos y Reubicaciones:	<input type="radio" name="tipo" id="tipo">    
				Otra: 	<input type="radio" name="tipo" id="tipo">  
				</div>
				<div class="caja1 caja1 fgr cj24p pg1_3">GRUPO/ÁREA/EQUIPO/DEPENDENCIA:</div>
				<div class="caja1 pg3_8 cj24p"></div>

				<div class="caja1 finito2 tit_2"></div>
				
				<div class="caja1 tit_2 faz">INFORMACIÓN RELACIONADA CON EL TIPO DE ACTIVIDAD</div>

				<div class="caja1 finito2 tit_2"></div>

				<div class="caja1 tit_2a ">(ESPACIO EXCLUSIVO PARA REPARACIÓN INDIVIDUAL) MARQUE CON UNA X SI LA ACTIVIDAD CORRESPONDE A UNA O VARIAS DE LAS SIGUIENTES OPCIONES: </div>
				<div class="caja1 tit_2b alto2">

						<div class="caja cj24p">
						Jornada Diferencial	<input type="radio" name="tipo1" id="tipo1">  
						Feria de Servicios	<input type="radio" name="tipo1" id="tipo1">  
						Conmemoración	<input type="radio" name="tipo1" id="tipo1">  
						Iniciativa local de memoria	<input type="radio" name="tipo1" id="tipo1">  
						Acto de Reconocimiento u orden judicial	<input type="radio" name="tipo1" id="tipo1">  
						</div>
						<div class="caja cj24p">
						Taller por línea de inversión	<input type="radio" name="tipo1" id="tipo1">  
						Entrega digna de cadáveres	<input type="radio" name="tipo1" id="tipo1">  
						Charla de educación financiera	<input type="radio" name="tipo1" id="tipo1">  
						Otro	<input type="radio" name="tipo1" id="tipo1">  
						</div>
						<div class="caja cj24p"></div>
				</div>

				<div class="caja1 finito2 tit_2"></div>

				<div class="caja1 tit_2a">(ESPACIO EXCLUSIVO PARA REPARACIÓN RETORNOS Y REUBICACIONES) MARQUE CON UNA X SI LA ACTIVIDAD CORRESPONDE A UNA O VARIAS DE LAS SIGUIENTES OPCIONES: </div>
				<div class="caja1 tit_2b alto1">
					<div class="caja cj24p">
					Integración Comunitaria	<input type="radio" name="tipo2" id="tipo2">  
					Retorno	<input type="radio" name="tipo2" id="tipo2">  
					Reubicación	<input type="radio" name="tipo2" id="tipo2">  
					Esquemas Especiales de Acompañamiento	<input type="radio" name="tipo2" id="tipo2">  
					Casos Emblemáticos 	<input type="radio" name="tipo2" id="tipo2">  
					</div>
					<div class="caja cj24p">
						<input type="radio" name="tipo2" id="tipo2">  Seguimiento procesos Retornos y Reubicaciones
					</div>
				</div>

				<div class="caja1 finito2 tit_2"></div>
				 
				<div class="caja1 tit_2a">(ESPACIO EXCLUSIVO PARA REPARACIÓN COLECTIVA) MARQUE CON UNA X SI LA ACTIVIDAD CORRESPONDE A UNA O VARIAS DE LAS SIGUIENTES OPCIONES: </div>
				<div class="caja1 tit_2b alto3">
					<div class="contenedorx">
						<div class="caja1 cj24p aiz pg1_6">NOMBRE DEL SUJETO DE REPARACIÓN COLECTIVA:</div>
						<div class="caja1 cj24p aiz pg6_8">ID SUJETO DE REPARACIÓN COLECTIVA:</div>
						<div class="caja2 cj24p pg1_4">TIPO DE SUJETO:</div>
						<div class="caja2 cj24p pg4_6"></div>
						<div class="caja cj24p pg6_8">

						</div>

						<div class="caja2 cj24p pg1_4">|No étnico:| 
						Comunidad<input type="radio" name="tipo3" id="tipo3"> 
						Comunidad campesina	<input type="radio" name="tipo3" id="tipo3"> 
						Grupo<input type="radio" name="tipo3" id="tipo3">  
							
						</div>
						<div class="caja2 cj24p pg4_6">Marcar con X:
						 
						</div>
						<div class="caja cj24p pg6_8">Marcar con X: Si el evento es de
							 
						</div>

						<div class="caja2 cj24p pg1_4">
						Organizaciones	<input type="radio" name="tipo3" id="tipo3">  
						Organización de mujeres	<input type="radio" name="tipo3" id="tipo3">  
						</div>
						<div class="caja2 cj24p pg4_6 aiz">Si el evento es de ruta	
							<input  type="checkbox" name="aruta" id="aruta"> indicar

						</div>
						<div class="caja cj24p pg6_8 aiz ">implementación del PIRC aprobado
							<input  type="checkbox" name="apirc" id="apirc">indicar
						</div>

						<div class="caja2 cj24p pg1_4">|Étnico:|
						Indígena	<input type="radio" name="tipo4" id="tipo4">  
						Ancestral	<input type="radio" name="tipo4" id="tipo4">  
						RROM o gitano	<input type="radio" name="tipo4" id="tipo4">  
							
						</div>
						<div class="caja2 cj24p pg4_6 aiz"> fase en que se encuentra:
							

						</div>
						<div class="caja cj24p pg6_8 aiz">tipo de Medida: 

						</div>

						<div class="caja2 cj24p pg1_4">
						Afrocolombiana	<input type="radio" name="tipo4" id="tipo4">  
						Negra	<input type="radio" name="tipo4" id="tipo4">  
						</div>
						<div class="caja2 cj24p pg4_6"></div>

						<div class="caja cj24p pg6_8 aiz">ID evento:</div>

						<div class="caja1 tit_2 finito2"></div>						
						<div class="caja1 tit_2 faz">DESCRIPCIÓN DEL DESARROLLO DE  LA ACTIVIDAD</div>					
						<div class="caja1 finito2 tit_2"></div>

						<div class="caja1 fgr aiz ">ENTIDADES PARTICIPANTES:</div>
						<div class="caja1 cj24p pg2_6"></div>
						<div class="caja1 fgr aiz letrap">NÚMERO DE VÍCTIMAS PARTICIPANTES:</div>
						<div class="caja1 cj24p"></div>
						<div class="caja1 tit_2b alto1 aiz">DESCRIPCIÓN BREVE: 

						</div>

						<div class="caja1 tit_2 finito2"></div>						
						<div class="caja1 tit_2 faz">DETALLE ESPECIFICO DEL REQUERIMIENTO</div>					
						<div class="caja1 finito2 tit_2"></div>						
						
					</div>
				</div>

			</div>


			</div>	
		</div>	
		
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
<link rel="stylesheet" href="../../css/reportes.css"  type="text/css" />
<link rel="stylesheet" href="../../plugins/select3/bootstrap-select.min.css">

<script type="text/javascript">

	$(document).ready(function() {


		$.post( "../../controllers/mrequerimientos_controller", { action: "search",record:<?php echo intval($_GET["record"]); ?>}).done(function( data ) {

//alert(data);
var parsedJson = $.parseJSON(data);

	$("#no_cli").html(parsedJson.nombre);
	$("#id").val(parsedJson.id);
	$("#s_orbis").val(parsedJson.sorbis);
	$("#orbis").val(parsedJson.orbis);
	$("#nombre").val(parsedJson.nombre);
	$("#razon").val(parsedJson.razon);
	$("#segmento").val(parsedJson.segmento);
	$("#cedula").val(parsedJson.cedula);
	$("#l_cedula").val(parsedJson.l_cedula);
	$("#fecha1").val(parsedJson.fecha1);
	$("#fecha2").val(parsedJson.fecha2);

	$("#estado").val(parsedJson.estado);

	$("#sector").val(parsedJson.sector);

	var bmun =parsedJson.municipio;
	var bpar =parsedJson.parroquia;
	var bciu =parsedJson.ciudad;

$.post( "../../controllers/mgeograficas_controller", { action: "get_municipios_e",municipio:bmun}).done(function( data ) {

	$("#municipio" ).html( data );

});	

$.post( "../../controllers/mgeograficas_controller", { action: "get_parroquias_e",parroquia: bpar}).done(function( data ) {

 $("#parroquia" ).html( data );

});

$.post( "../../controllers/mgeograficas_controller", {action: "get_ciudad_e",ciudad: bciu}).done(function( data ) {
//setTimeout(function(){
 $("#ciudad" ).html( data );
//}, 1500);
});	

	$("#a_principal").val(parsedJson.a_principal);
	$("#acceso1").val(parsedJson.acceso1);
	$("#a_secundario").val(parsedJson.a_secundario);
	$("#acceso2").val(parsedJson.acceso2);
	$("#referencia").val(parsedJson.referencia);
	$("#zona").val(parsedJson.zona);

	$("#territorio").val(parsedJson.territorio);
	
	//$("#territorio_g").val(parsedJson.territorio_g);
	var bter = parsedJson.territorio_g;
	$.post( "../../controllers/mterritorios_controller", { action: "get_territorios_e",territorio: bter}).done(function( data ) {
		
		 $("#territorio_g" ).html( data );

	});
	
	$("#latitud").val(parsedJson.latitud);
		
		document.getElementById('lata').value=parseFloat(parsedJson.latitud); 
	
	$("#longitud").val(parsedJson.longitud);
		document.getElementById('longa').value=parseFloat(parsedJson.longitud)*(-1);

	$("#propietario").val(parsedJson.propietario);
	$("#tele1").val(parsedJson.tele1);
	$("#tele2").val(parsedJson.tele2);
	$("#correo1").val(parsedJson.correo1);
	$("#estatus_aliado").val(parsedJson.estatus_aliado);
	$("#dias").val(parsedJson.dias);
	$("#caja_t").val(parsedJson.caja_t);
	$("#caja_p").val(parsedJson.caja_p);
	$("#caja_o").val(parsedJson.caja_o);
	$("#despacho").val(parsedJson.despacho);
	$("#descuento").val(parsedJson.descuento);
	$("#seca").val(parsedJson.seca);
	$("#rf_competencia").val(parsedJson.rf_competencia);
	$("#ls_competencia").val(parsedJson.ls_competencia);

	$("#toldo").val(parsedJson.toldo);
	$("#aviso").val(parsedJson.aviso);
	$("#fachada").val(parsedJson.fachada);
	$("#activo").val(parsedJson.activo);
	$("#observacion").val(parsedJson.observacion);
	$("#distribuidora").val(parsedJson.distribuidora);
	$("#region").val(parsedJson.region);

	var identico = parsedJson.id;
	var des_cu = parsedJson.descuento;
	//alert(des_cu);
	var or_bis = $("#orbis").val();
	var es_ali = parsedJson.estatus_aliado;
	var di_as = parsedJson.dias;
	di_as = di_as.split(',');

	var desc_ch=document.getElementById("descu");
	var desc_cue=document.getElementById("descuento");

	if (des_cu == 0) {
		desc_ch.checked=false;

	}else{
		desc_ch.checked=true;
		desc_cue.disabled = false;
	}

	var tol_do = parsedJson.toldo;
	tol_do = tol_do.split(',');

	var avi_so = parsedJson.aviso;
	avi_so = avi_so.split(',');

	var fa_cha = parsedJson.fachada;
	fa_cha = fa_cha.split(',');

	var ac_ti = parsedJson.activo;
	ac_ti = ac_ti.split(',');


//		document.getElementById('oculto').style.display = 'block';


	if(!or_bis){
		$("#orbis").val('SIN CÓDIGO ORBIS');
	}

	if(es_ali =='0'){

		$('#estatus_aliado').multiselect('select', ['0']);

	}else if(es_ali =='0,1'){

		$('#estatus_aliado').multiselect('select', ['0','1']);

	}else if(es_ali=='2'){
		
		$('#estatus_aliado').multiselect('select', ['2']);
	}	


	if(di_as){

		$('#dias').multiselect('select', di_as);

	}

	if(tol_do){

		$('#toldo').multiselect('select', tol_do);

	}

	if(avi_so){

		$('#aviso').multiselect('select', avi_so);

	}

	if(fa_cha){

		$('#fachada').multiselect('select', fa_cha);

	}

	if(ac_ti){

		$('#activo').multiselect('select', ac_ti);

	}												


},"json");


	});

</script>
<?php include_once("../layouts/pie.php") ?>