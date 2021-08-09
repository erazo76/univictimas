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
		<input type="hidden" id="idea" value="<?php echo intval($_GET["record"]); ?>">
		

<div class="row">

	<div class="col-md-1">
		<div class="flotante">
			<button id="print" class="btn btn-primary oculto-impresion" type="button" style="width:60px;height:60px;font-size:x-large;"><i class="fa fa-fw fa-print"></i></button>
			<!--<button id="aprobar" class="btn btn-primary oculto-impresion " type="button" style="width:60px;height:60px;font-size:x-large;"><i class="fa fa-fw  fa-check-square-o"></i></button>-->	
			<button id="edit" class="btn btn-primary oculto-impresion" type="button" style="width:60px;height:60px;font-size:x-large;"><i  class="fa fa-fw fa-edit"></i>  </button>
			<button id="victim" class="btn btn-primary oculto-impresion" type="button" style="width:60px;height:60px;font-size:x-large;"><i  class="fa fa-fw  fa-users"></i></button>
			<!--<button id="ayt" class="btn btn-primary oculto-impresion" type="button" style="width:60px;height:60px;"><i  class="fa fa-fw  fa-hotel"></i>|<i  class="fa fa-fw  fa-plane"></i></button>-->	
			<button id="anexos" class="btn btn-primary oculto-impresion" type="button" style="width:60px;height:60px;font-size:x-large;"><i  class="fa fa-fw  fa-files-o"></i></button>	
		</div>
	</div>

	<div class="col-md-11" style="width:216mm; height:356mm;" id="pr1" >

		<div class="box-header with-border" tabindex="-1">
			<h3 class="box-title oculto-impresion">FORMATO SOLICITUD AL OPERADOR</h3>
		</div> <!--/.box-header	-->

		<div class="box box-primary" id="pr2">
			<div class="box-body">
		
				<div class="contenedor" id="printJS-form">
					<div class=" caja1 logunivic bnn"></div>
					<div class="caja1 ce tit_1">FORMATO DE SOLICITUD PARA LA REALIZACIÓN DE EVENTOS TALLERES O REUNIONES</div>
					<div class="caja1 ce_iz tit_2">Anexo 1</div>
					<div class="caja1 ce_iz tit_3">Versión: 01</div>
					<div class="caja1 ce tit_4">Fecha elaboración: 
						<div class="rw_base">
								<div class="ce rw_1"id="fecha2"><strong>dd/mm/aaaa</strong></div>
						</div> 
					</div>					
					<div class="caja1 ce tit_6">CONTRATO DE PRESTACIÓN DE SERVICIO N°: 
						<div class="rw_base">
							<div class="ce rw_1"><strong>1401</strong></div>
						</div> 
					</div>
					<div class="caja1 ce tit_7 f_s">Modalidad</div>
					<div class="caja1 ce tit_8 f_s">Presencial</div>

					<div class="caja1 ce na_1_7">N° De solicitud:
						<div class="rw_base">
							<div class="ce rw_1" id="id"><strong></strong></div>
						</div>
					</div>
					<div class="caja1 ce na_7_8">FECHA</div>
					<div class="caja ce na_8_9 al_2 ">Día</div>
					<div class="caja ce na_9_10 al_2 ">Mes</div>
					<div class="caja ce na_10_11 al_2 ">Año</div>
					<div class="caja ce na_8_9a al_2 inp" id="dia">dd</div>
					<div class="caja ce na_9_10a al_2 inp" id="mes">mm</div>
					<div class="caja ce na_10_11a al_2 inp" id="ano">aaaa</div>
					<div class="caja1 ce na_11_16">SUBDIRECCIÓN O ÁREA SOLICITANTE</div>
					<div class="caja1 ce na_16_21 f_s2" id="grupo"><strong>PARTICIPACIÓN</strong></div>
					<div class="caja1 ce gris1"><strong>1) INFORMACIÓN GENERAL</strong></div>
					<div class="caja1 ce ig-89 igr-18 f_s" >NOMBRE DE LA ACTIVIDAD</div>
					<div class="caja1 ce ig-89 igr-821 f_s" id="nombre"><strong>Dialogos por lo fundamental ...</strong></div>
					<div class="caja1 ce ig-910 igr-14 f_s">DEPARTAMENTO</div>
					<div class="caja1 ce ig-910 igr-48 f_s" id="departamento"><strong>Magdalena</strong></div>
					<div class="caja1 ce ig-910 igr-89 f_s2">CIUDAD O MUNICIPIO</div>
					<div class="caja1 ce ig-910 igr-912 f_s" id="municipio"><strong>Santa Marta</strong></div>
					<div class="caja1 ce ig-910 igr-1213 f_s2">FECHA DE INICIO</div>
					<div class="caja1 ce ig-910 igr-1315 f_s" id="fecha4"><strong>dd-mm-aaaa</strong></div>
					<div class="caja1 ce ig-910 igr-1516 f_s2">FECHA DE FINALIZACIÓN</div>
					<div class="caja1 ce ig-910 igr-1618 f_s" id="fecha3"><strong>dd-mm-aaaa</strong></div>
					<div class="caja1 ce ig-910 igr-1821 f_s2">N° de días de la actividad: 
						<div class="rw_base">
							<div class="ce rw_1 inp"><strong>xx</strong></div>
						</div>
					</div>
					<div class="caja1 ce f_s2 ig-1016 igr-18">DESCRIPCIÓN BREVE DEL EVENTO</div>
					<div class="caja1 ce_iz  ig-1016 igr-817" id="descripcion">Lorem ipsum dolor, sit amet consectetur adipisicing elit. At accusantium voluptatum cum sint possimus mollitia, recusandae ipsum rem nostrum iusto itaque, nesciunt ea pariatur reprehenderit ducimus quis magni suscipit tenetur provident asperiores obcaecati amet! Error voluptatum, nesciunt neque cumque eos officiis. Numquam velit libero possimus fuga? Veniam voluptatem nobis nulla.</div>
					<div class="caja1 ce ig-1011 igr-1721 f_s">N° de personas esperadas:
						<div class="rw_base">
							<div class="ce rw_1 inp" id="ptotal"><strong>xxxx</strong></div>
						</div>						
					</div>
					<div class="caja1 ce ig-1116 igr-1719">Víctimas:
						<div class="rw_base">
							<div class="ce rw_1" id="num_vic"><strong>xxxx</strong></div>
						</div>						
					</div>
					<div class="caja1 ce ig-1116 igr-1921">Funcionarios:
						<div class="rw_base">
							<div class="ce rw_1" id="entidad"><strong>xxxx</strong></div>
						</div>						
					</div>
					<div class="caja1 ce ig-1618 igr-18">SUPERVISOR DEL CONTRATO</div>
					<div class="caja1 ce ig-1618 igr-813" ><strong>Aura Elena Acevedo</strong></div>
					<div class="caja1 ce_iz f_s2 ig-1617 igr-1316 ">EMAIL</div>
					<div class="caja1 ce_iz f_s2 ig-1718 igr-1316">TELÉFONO</div>
					<div class="caja1 ce_iz f_s2 ig-1617 igr-1621"><strong>aura.acevedo@unidadvictimas.gov.co</strong></div>
					<div class="caja1 ce_iz f_s2 ig-1718 igr-1621">### ### ####</div>

					<div class="caja1 ce ig-1820 igr-18">SUB-DIRECTOR(A) SOLICITANTE</div>
					<div class="caja1 ce ig-1820 igr-813" id="responsablesub"><strong>Yanny Zambrano Díaz</strong></div>
					<div class="caja1 ce_iz f_s2 ig-1819 igr-1316">EMAIL</div>
					<div class="caja1 ce_iz f_s2 ig-1920 igr-1316">TELÉFONO</div>
					<div class="caja1 ce_iz f_s2 ig-1819 igr-1621" id="correo2"><strong>yanny.zambrano@unidadvictimas.gov.co</strong></div>
					<div class="caja1 ce_iz f_s2 ig-1920 igr-1621" id="tele2">### ### ####</div>	
					
					<div class="caja1 ce ig-2021 igr-18">RESPONSABLE DEL EVENTO</div>
					<div class="caja1 ce ig-2021 igr-813" id="responsable"><strong>Carolina Murillo</strong></div>
					<div class="caja1 ce ig-2122 igr-18">CARGO</div>
					<div class="caja1 ce ig-2122 igr-813"><strong>Contratista</strong></div>
					<div class="caja1 ce_iz  ig-2021 igr-1316" >EMAIL</div>
					<div class="caja1 ce_iz  ig-2122 igr-1316">TELÉFONO</div>
					<div class="caja1 ce_iz  ig-2021 igr-1621" id="contacto_c"><strong>diana.murillo@unidadvictimas.gov.co</strong></div>
					<div class="caja1 ce_iz  ig-2122 igr-1621" id="contacto_t">3155747140</div>	

					<div class="caja1 ce gris1"><strong>2) REQUERIMIENTOS LOGÍSTICOS</strong></div>
					<div class="caja1 ce ig-2325 igr-15">CONCEPTO</div>
					<div class="caja1 ce ig-2324 igr-521"><strong>Servicios y Cantidades Aproximadas Solicitadas</strong></div>
					<div class="ig-2425 igr-516">
						<div class="rl_base">
							<div class="caja2 rl-1 ce f_s"></div>
							<div class="caja2 rl-2 ce f_s"></div>
							<div class="caja2 rl-3 ce f_s">Día previo</div>
							<div class="caja2 rl-4 ce f_s">Día 1</div>
							<div class="caja2 rl-5 ce f_s">Día 2</div>
							<div class="caja2 rl-6 ce f_s">Día 3</div>
							<div class="caja2 rl-7 ce f_s">Día posterior</div>
						</div>
					</div>
					<div class="caja1 ce ig-2426 igr-1617">TOTAL</div>
					<div class="caja1 ce ig-2426 igr-1721">OBSERVACIONES</div>
					<div class="caja2 ce  igr-15">FECHAS DEL EVENTO</div>
					<div class="igr-516">
						<div class="rl_base">
							<div class="caja2 rl-1 ce f_s"><strong></strong></div>
							<div class="caja2 rl-2 ce f_s"><strong></strong></div>
							<div class="caja2 rl-3 ce f_s"><strong></strong></div>
							<div class="caja2 rl-4 ce f_s"><strong></strong></div>
							<div class="caja2 rl-5 ce f_s"><strong></strong></div>
							<div class="caja2 rl-6 ce f_s"><strong></strong></div>
							<div class="caja2 rl-7 ce f_s"><strong></strong></div>
						</div>
					</div>
					<div class="caja1 rl-1 vig-96 ce f_s">ALOJAMIENTO</div>
					<div class="caja1 rl-1 vig-96 ce f_s">LOGÍSTICA</div>
					<div class="caja1 rl-1 vig-96 ce f_s">ADICIONALES</div>
					<div class="caja1 rl-1 vig-96 ce f_s">MATERIALES</div>

					<div class="caja1 rl-25 alt ig-2627 f_s" id="a-1"></div>
					<div class="caja1 rl-25 alt ig-2728 f_s" id="l-1"></div>
					<div class="caja1 rl-25 alt ig-2829 f_s" id="ad-1"></div>
					<div class="caja1 rl-25 alt ig-2930 f_s" id="ma-1"></div>

					<div class="caja1 ig-2627 alt igr-516 f_s" id="a-2"></div>
					<div class="caja1 ig-2728 alt igr-516 f_s" id="l-2"></div>
					<div class="caja1 ig-2829 alt igr-516 f_s" id="ad-2"></div>
					<div class="caja1 ig-2930 alt igr-516 f_s" id="ma-2"></div>

					<div class="caja1 ig-2627 alt igr-1617 f_s" id="a-3"></div>
					<div class="caja1 ig-2728 alt igr-1617 f_s" id="l-3"></div>
					<div class="caja1 ig-2829 alt igr-1617 f_s" id="ad-3"></div>
					<div class="caja1 ig-2930 alt igr-1617 f_s" id="ma-3"></div>

					<div class="caja1 ig-2627 alt igr-1721 f_s" id="a-4"></div>
					<div class="caja1 ig-2728 alt igr-1721 f_s" id="l-4"></div>
					<div class="caja1 ig-2829 alt igr-1721 f_s" id="ad-4"></div>
					<div class="caja1 ig-2930 alt igr-1721 f_s" id="ma-4"></div>

					<div class="caja1 ce f_s igr-15 gris">TIQUETES AEREOS</div>
						<div class="igr-516">
							<div class="rl_base">
								<div class="caja1 rl-1 ce f_s gris"><strong></strong></div>
								<div class="caja1 rl-2 ce f_s gris"><strong></strong></div>
								<div class="caja1 rl-3 ce f_s"><strong></strong></div>
								<div class="caja1 rl-4 ce f_s"><strong></strong></div>
								<div class="caja1 rl-5 ce f_s"><strong></strong></div>
								<div class="caja1 rl-6 ce f_s"><strong></strong></div>
								<div class="caja1 rl-7 ce f_s"><strong></strong></div>
							</div>
						</div>	
					<div class="caja1 ce f_s"></div>
					<div class="caja1 ce f_s igr-1721"></div>

					<div class="caja1 ce gris1"><strong>3) PAGO A TERCEROS</strong></div>					
					<div class="igr-121">
						<div class="rm_base">
							<div class="caja1 ce f_s rl-1 gris">VALOR A DESEMBOLSAR</div>
							<div class="caja1 ce f_s rl-2 gris">OBSERVACIONES / JUSTIFICACIÓN</div>
							<div class="caja1 ce f_s rl-1" id="costo_total">$</div>
							<div class="caja1 ce f_s rl-2"></div>
						</div>
					</div>
					<div class="caja1 ce igr-18 gris alt">Sugerencias y recomendaciones</div>
					<div class="caja1 ce igr-821 alt" id="recomendaciones">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt nemo facilis placeat consectetur perspiciatis reprehenderit at quas, tenetur magni architecto, ex omnis eius animi saepe, aspernatur ullam. Explicabo, vitae aliquam.
					Voluptas culpa maiores quidem provident hic suscipit ut repellat maxime, quam error numquam. Autem reprehenderit, aliquid eius excepturi quis eos modi. Eius voluptates vitae iure, libero ullam nisi amet fugiat?</div>
					<div class="caja1 iz igr-121 alt">OBSERVACIONES GENERALES</div>					
					<div class="caja1 igr-121 alt">
						<div class="rn_base">													
							<div class="rl-1 ig-3536">
								<div class="linea ce"></div>	
								<div class="ce deco">Responsable del evento</div>
							</div>							
							<div class="rl-2  ig-3536">
								<div class="linea ce"></div>	
								<div class="ce deco">Sub-director(a) solicitante</div>
							</div>							
							<div class="rl-3  ig-3536">
								<div class="linea ce"></div>	
								<div class="ce deco">Supervisión del contrato</div> 
								<div class="rl-3">
									<div class="ro_base">
										<div class="f_s iz rl-1">Vo Bo: </div>
										<div class="f_s iz rl-2"><strong>xxxx</strong></div>
									</div>									
								</div>
								<div class="rl-3"> 
									<div class="ro_base">
										<div class="f_s iz rl-1">Revisado:</div>
										<div class="f_s iz rl-2"><strong>xxxx</strong></div>
									</div>
								</div>
								<div class="rl-3">
									<div class="ro_base">
										<div class="f_s iz rl-1">Verificado:</div>
										<div class="f_s iz rl-2"><strong>xxxx</strong></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>

			</div>
		</div>

	</div>

</div>
</form>

<!-- Modal 1 -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<form id="form" role="form" enctype="multipart/form-data" >
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <div class="contenido-modal">
         <h4 class="modal-title" id="myModalLabel1">APROBACION DEL REQUERIMIENTO</h4>
			<div class="message1"></div>
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
				  <!-- general form elements -->
				  

				  <div class="box-header with-border">
						<h3 class="box-title">Responsable Territorial</h3>
					</div><!-- /.box-header -->	
				
					<div class="box box-primary">

						<div class="box-body">
							<label>Nombres</label>
							<div class="input-group">
								<input type="text" class="form-control ddd" id="rn_nombre1" placeholder="1er nombre"  onpaste="return false" tabindex="260" onkeypress="return esnombre3(event);"  onblur="alsalir(this.id)" autocomplete="off">
								<span class="input-group-btn" tabindex="-1" style="width:0px;"></span>
								<input type="text" class="form-control" id="rn_nombre2" placeholder="2do. nombre"  onpaste="return false" tabindex="270" onkeypress="return esnombre3(event);" autocomplete="off">
							</div>
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_rn_nombre1' class="aaa"><p></p></div>
							
							<label>Apellidos</label>
							<div class="input-group">
								<input type="text" class="form-control ddd" id="rn_apellido1" placeholder="1er. apellido"  onpaste="return false" tabindex="280" onkeypress="return esapellido2(event);"  onblur="alsalir(this.id)"  autocomplete="off">
								<span class="input-group-btn" tabindex="-1" style="width:0px;"></span>
								<input type="text" class="form-control" id="rn_apellido2" placeholder="2do. apellido"  onpaste="return false" tabindex="290" onkeypress="return esapellido2(event);" autocomplete="off">
							</div>
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_rn_apellido1' class="aaa"><p></p></div>
							
							
							<div class="form-group-sm">
								<label >Documento de Identidad</label>
									<div class = "input-group">

										<span class="input-group-btn">
											<select id="rn_tdoc" class="btn-sm"  tabindex="300"  >
												<option value="0">CC</option>
												<option value="1">CE</option>
												<option value="2">PA</option>
											</select>
										</span>

										<input type="text" class="form-control ddd" id="rn_num_doc" placeholder="Ingrese el numero del documento"  onpaste="return false" tabindex="310" onkeypress="return escedula2(event);" onblur="alsalira(this.id)">
									</div>
									<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_rn_num_doc' class="aaa"><p></p></div>
							</div>	

							<div class="form-group-sm">
							<label for="tele2">Teléfono de contacto</label>
							<input type="text" class="form-control ddd" id="tele2" placeholder="Ingrese un número telefónico"  onpaste="return false" tabindex="320" onkeypress="return estele2(event);" onblur="alsalir2(this.id)" autocomplete="off">
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_tele2' class="aaa"></div>
							</div>

								<div id="confirma_telefono2">
									<ul><li id="conf_tel2" style="color:#fff;text-align:center" ></li></ul>
								</div>

							<div class="form-group-sm">
							<label for="correo2">Correo electrónico</label>
							<input type="text" class="form-control ddd" id="correo2" placeholder="Ingrese un correo electrónico"  onpaste="return false" tabindex="330" onkeypress="return escorreo2(event);" onblur="alsalir2(this.id)" autocomplete="off">
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_correo2' class="aaa"></div>
							</div>

								<div id="confirma_correo2">
									<ul><li id="conf_cor2" style="color:#fff;text-align:center" ></li></ul>
								</div>							
						
							
						</div>

					</div>

				</div>
			</div>
							      <div class="modal-footer">
							      		<button id="close22" type="button" class="btn btn-success" ><i class="fa fa-fw fa-check-square-o"></i>Aprobar</button>
							      		<button id="cancelado" type="button" class="btn btn-primary  pull-right"><i class="fa fa-fw fa-times"></i>Cancelar</button>

							      </div>
        </div>
      </div>
    </div>
  </div>
</form>                   
</div>



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
<script src="../../plugins/bootstrap_toggle/bootstrap-toggle.min.js"></script>


<link rel="stylesheet" href="../../plugins/confirma/jquery-confirm.min.css" type="text/css"/>
<link rel="stylesheet" href="../../css/style_format_pass.css" type="text/css"/>
<link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css" type="text/css"/>
<link rel="stylesheet" href="../../plugins/unslider/unslider.css">
<link rel="stylesheet" href="../../plugins/leaflet/leaflet.css"/>
<link rel="stylesheet" href="../../css/reportes.css"  type="text/css" media="all"/>
<link rel="stylesheet" href="../../plugins/select3/bootstrap-select.min.css">
<link rel="stylesheet" href="../../plugins/bootstrap_toggle/bootstrap-toggle.min.css">



<script type="text/javascript">

	$(document).ready(function() {

		/*var desh=<?php echo $_SESSION['rolx'];  ?>;//verifica el rol del usuario

		if (desh==2 || desh==4){ //si el rol del usuario es SUPERVISOR... o programador
			document.getElementById('aprobar').style.display = 'block';	
		}else{
			document.getElementById('aprobar').style.display = 'none';	
		}*/


		$.post( "../../controllers/msolicitudes_controller", { action: "search",record:<?php echo intval($_GET["record"]); ?>}).done(function( data ) {

//alert(data);
	var parsedJson = $.parseJSON(data);

	var idd=parsedJson.id.toString();
	$("#id").html(idd.padStart(4, 0));

	$("#nombre").html(parsedJson.nombre);
	$("#fecha1").html(parsedJson.fecha1);
	$("#costo_total").html(costo_total);
	

	var bdep =parsedJson.departamento;
	var bmun =parsedJson.municipio;
	var bcpo =parsedJson.cpoblado;

	
	var n1s=parsedJson.rn_nombre1;
	var n2s=parsedJson.rn_nombre2;
	var a1s=parsedJson.rn_apellido1;
	var a2s=parsedJson.rn_apellido2;
	var respon=n1s+' '+n2s+' '+a1s+' '+a2s;
	$("#responsablesub").html(respon);



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
	$("#fecha4").html(parsedJson.fecha2);
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

	var respon=n1+' '+n2+' '+a1+' '+a2;
	$("#responsable").html(respon);

	var tel1=parsedJson.tele1;
	var email=parsedJson.correo1;
	var contac=email+', Celular: '+tel1;

	$("#contacto_t").html(tel1);
	$("#contacto_c").html(email);

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
	$("#entidad").html(parsedJson.entidad);


	var ptotal = (parsedJson.entidad += parsedJson.num_vic);
	$("#ptotal").html(ptotal);


	$("#tele2").html(parsedJson.tele2);
	$("#correo2").html(parsedJson.correo2);
	$("#recomendaciones").html(parsedJson.recomendacion);
	$("#rn_nombre").html(parsedJson.rn_nombre);
	
	$("#descripcion").html(parsedJson.descripcion);

		
	var fecha =parsedJson.fecha2;
	var separa = explode("-",fecha);
	var mes = separa[0];
	var dia = separa[1];
	var ano = separa[2];
	
	$("#dia").html(dia);
	$("#mes").html(mes);
	$("#ano").html(ano);

	var alojan=parsedJson.aloja;
	//alert(alojan);
	switch (alojan) {
		case 0:	
			    $('#aloja').prop('checked', false).change();break;
		case 1:	
				$('#aloja').prop('checked', true).change();break;
	}
	
	var transi=parsedJson.t_trans;

	switch (transi) {
		case "0":	

			$('#trans1').prop('checked', true).change();
			$('#trans2').prop('checked', false).change();
			$('#trans3').prop('checked', false).change();
		
		break;
		case "0,1":	

			$('#trans1').prop('checked', true).change();
			$('#trans2').prop('checked', true).change();
			$('#trans3').prop('checked', false).change();
		
		break;
		case "0,1,2":	

			$('#trans1').prop('checked', true).change();
			$('#trans2').prop('checked', true).change();
			$('#trans3').prop('checked', true).change();

		break;
		case "0,2":	

			$('#trans1').prop('checked', true).change();
			$('#trans2').prop('checked', false).change();
			$('#trans3').prop('checked', true).change();

		break;
		case "1,2":	
		
			$('#trans1').prop('checked', false).change();
			$('#trans2').prop('checked', true).change();
			$('#trans3').prop('checked', true).change();

		break;		
		default:
			$('#trans1').prop('checked', false).change();
			$('#trans2').prop('checked', false).change();
			$('#trans3').prop('checked', false).change();


		break;
	}

	//control de tipos

	if(tip1 < 9){
		$("#rta").attr('checked', true)
	}else if(tip2 < 6){
		$("#rtb").attr('checked', true)
	}else if(tip3 < 5){
		$("#rtc").attr('checked', true)
	}else{
		$("#rtd").attr('checked', true)
	}

	/*if(parsedJson.completado == 2){
		document.getElementById('aprob').style.display = 'block';	
		document.getElementById("aprobar").disabled=true;
		
	}else{
		document.getElementById('aprob').style.display = 'none';
		document.getElementById("aprobar").disabled=false;
	} */

	});

//#########################################INSERTAR LOS DIVS CON LA COSNSULA DE  LA TABLA DETALLES#####################################

		$.post( "../../controllers/mdetalles_controller", { action: "search",record:<?php echo intval($_GET["record"]); ?>}).done(function( data ) {

			var parsedJson = $.parseJSON(data);

			
				parsedJson.forEach(function(parsedJson, index) {
					//console.log("indice " + index + " | tipo " + parsedJson.tipo + " concepto: " + parsedJson.concepto + " cantidad: " + parsedJson.cantidad + " medida: " + parsedJson.medida + " observaciones: " + parsedJson.observaciones)
				
					var r_tipo =parsedJson.tipo;
					var r_concepto =parsedJson.concepto;
					var r_cantidad =parsedJson.cantidad;
					var r_costo =parsedJson.costo;
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
						//$('#salones').append('<div class="caja1 pg1_3 aiz" style="line-height: 7px;font-size:7px;">'+r_concepto+'</div><div class="caja1 pg3_4">'+r_cantidad+'</div><div class="caja1 pg4_5">'+med+'</div><div class="caja1 pg5_6">'+r_costo+'</div><div class="caja1 pg6_8 aiz" style="line-height: 7px;font-size:7px;">'+r_observaciones+'</div>');
						$('#a-1').append('<div  class="caja2 " >'+r_concepto+'</div>');
						$('#a-2').append(							
							'<div class="rl_base "><div class="caja2 rl-1 ce f_s"><strong></strong></div><div class="caja2 rl-2 ce f_s"><strong></strong></div><div class="caja2 rl-3 ce f_s"><strong></strong></div><div class="caja2 rl-4 ce f_s">'+r_cantidad+'<strong></strong></div><div class="caja2 rl-5 ce f_s"><strong></strong></div><div class="caja2 rl-6 ce f_s"><strong></strong></div><div class="caja2 rl-7 ce f_s"><strong></strong></div></div>'
						);
						$('#a-3').append('<div  class="caja2 " >'+r_cantidad+'</div>');
						$('#a-4').append('<div  class="caja2 " >'+r_observaciones+'</div>');					
						break;
						case 1:	
						//insertar div de ALIMENTACION
						//$('#alimentos').append('<div class="caja1 pg1_3 aiz" style="line-height: 7px;font-size:7px;">'+r_concepto+'</div><div class="caja1 pg3_4">'+r_cantidad+'</div><div class="caja1 pg4_5">'+med+'</div><div class="caja1 pg5_6">'+r_costo+'</div><div class="caja1 pg6_8 aiz" style="line-height: 7px;font-size:7px;">'+r_observaciones+'</div>');
						$('#l-1').append('<div  class="caja2 ">'+r_concepto+'</div>');
						$('#l-2').append(							
							'<div class="rl_base "><div class="caja2 rl-1 ce f_s"><strong></strong></div><div class="caja2 rl-2 ce f_s"><strong></strong></div><div class="caja2 rl-3 ce f_s"><strong></strong></div><div class="caja2 rl-4 ce f_s">'+r_cantidad+'<strong></strong></div><div class="caja2 rl-5 ce f_s"><strong></strong></div><div class="caja2 rl-6 ce f_s"><strong></strong></div><div class="caja2 rl-7 ce f_s"><strong></strong></div></div>'
						);
						$('#l-3').append('<div  class="caja2 ">'+r_cantidad+'</div>');
						$('#l-4').append('<div  class="caja2 " >'+r_observaciones+'</div>');
						break;
						case 2:	
						//insertar div de MATERIALES
						//$('#materiales').append('<div class="caja1 pg1_3 aiz" style="line-height: 7px;font-size:7px;">'+r_concepto+'</div><div class="caja1 pg3_4">'+r_cantidad+'</div><div class="caja1 pg4_5">'+med+'</div><div class="caja1 pg5_6">'+r_costo+'</div><div class="caja1 pg6_8 aiz" style="line-height: 7px;font-size:7px;">'+r_observaciones+'</div>');
						$('#ad-1').append('<div class="caja2 "  >'+r_concepto+'</div>');
						$('#ad-2').append(							
							'<div class="rl_base "><div class="caja2 rl-1 ce f_s"><strong></strong></div><div class="caja2 rl-2 ce f_s"><strong></strong></div><div class="caja2 rl-3 ce f_s"><strong></strong></div><div class="caja2 rl-4 ce f_s">'+r_cantidad+'<strong></strong></div><div class="caja2 rl-5 ce f_s"><strong></strong></div><div class="caja2 rl-6 ce f_s"><strong></strong></div><div class="caja2 rl-7 ce f_s"><strong></strong></div></div>'
						);
						$('#ad-3').append('<div  class="caja2 " >'+r_cantidad+'</div>');
						$('#ad-4').append('<div  class="caja2 " >'+r_observaciones+'</div>');
						break;
						case 3:	
						//insertar div de CONTABLES
						$('#cotizables').append('<div class="caja1 pg1_3 aiz" style="line-height: 7px;font-size:7px;">'+r_concepto+'</div><div class="caja1 pg3_4">'+r_cantidad+'</div><div class="caja1 pg4_5">'+med+'</div><div class="caja1 pg5_6">'+r_costo+'</div><div class="caja1 pg6_8 aiz" style="line-height: 7px;font-size:7px;">'+r_observaciones+'</div>');
					
						break;
						case 4:	
						case 5:	
						case 6:	
						//insertar div de CONTABLES
						$('#personal').append('<div class="caja1 pg1_3 aiz" style="line-height: 7px;font-size:7px;">'+r_concepto+'</div><div class="caja1 pg3_4">'+r_cantidad+'</div><div class="caja1 pg4_5">'+med+'</div><div class="caja1 pg5_6">'+r_costo+'</div><div class="caja1 pg6_8 aiz" style="line-height: 7px;font-size:7px;">'+r_observaciones+'</div>');
					
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

		$("#aprobar").click(function() {
			$('#modal1').modal({backdrop: 'static',keyboard: false});
			
		});	

		$("#victim").click(function() {

			$(location).attr('href','frm_fparticipantes?record='+$("#idea").val());

		});	

		$("#anexos").click(function() {

			$(location).attr('href','frm_adjuntados?record='+$("#idea").val()+'&origin=1');

		});	

});	


if (window.matchMedia("(min-width: 200px) and (max-width: 370px)").matches) {

		$("#pr1").css({"width": "100%", "overflow": "auto"});
		$("#pr2").css({"width": "216mm", "height": "100%"});
		$("#print").css("display","none");
		$(".flotante").css("opacity","0.9");

} else {
	

}



//################################################################### GUARDAR APROBACON ###############################################

$("#close22" ).click(function() {
	

		$.post( "../../controllers/msolicitude_controller", {

			action: "aprobar",
			
			id: $("#idea").val(),
			rn_nombre1: $("#rn_nombre1").val(),
			rn_nombre2: $("#rn_nombre2").val(),
			rn_apellido1: $("#rn_apellido1").val(),
			rn_apellido2: $("#rn_apellido2").val(),
			rn_tdoc: $("#rn_tdoc").val(),
			rn_num_doc: $("#rn_num_doc").val(),
			tele2: $("#tele2").val(),
			correo2: $("#correo2").val(),

		}).done(function(data){

			var parsedJson = $.parseJSON(data);
			$(".message").html(parsedJson.mensaje);


			if(parsedJson.resultado != 'error'){

					setTimeout(function(){


							$("#rn_nombre1").val(null);
							$("#rn_nombre2").val(null);
							$("#rn_apellido1").val(null);
							$("#rn_apellido2").val(null);
							$("#rn_tdoc").val(0);
							$("#rn_num_doc").val(null);
							$("#tele2").val(null);
							$("#correo2").val(null);

							$(".alert").alert('close');
					      	$('#modal1').modal('toggle');
							
							location.reload();

					}, 1500);
			}

		},"json");

});//end APROBAR

$("#cancelado").click(function() {

	$('#modal1').modal('toggle');
	$("#rn_nombre1").val(null);
	$("#rn_nombre2").val(null);
	$("#rn_apellido1").val(null);
	$("#rn_apellido2").val(null);
	$("#rn_tdoc").val(0);
	$("#rn_num_doc").val(null);
	$("#tele2").val(null);
	$("#correo2").val(null);

});

//################################################################################### VALIDACIONES ####################################

$('#tele2').mask('A000-000-0000', {

translation: {

	 'A': {

			pattern: /[0]/, optional: true

			 }

  },

});

$('#tele2').keyup(function() {
			// set password variable
			var telefo = $(this).val();

			$.post( "../../controllers/validaciones", { action: "validar2",telefono:telefo}).done(function( data ) {
			 $("#conf_tel2").html( data );

			});

		}).focus(function() {
			$('#confirma_telefono2').show();
		}).blur(function() {
			$('#confirma_telefono2').hide();
});

$('#correo2').keyup(function() {
			// set password variable
			var corre = $(this).val();

			$.post( "../../controllers/validaciones", { action: "validar5",correo:corre}).done(function( data ) {
			 $("#conf_cor2").html( data );

			});

		}).focus(function() {
			$('#confirma_correo2').show();
		}).blur(function() {
			$('#confirma_correo2').hide();
});		


$(function(){

	$("#rn_nombre1").maxLength(20);
	$("#rn_nombre2").maxLength(20);
	$("#rn_apellido1").maxLength(20);
	$("#rn_apellido2").maxLength(20);
	$("#rn_num_doc").maxLength(12);
	$("#tele2").maxLength(13);
	$("#correo2").maxLength(80);


});

			function alsalira(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 7){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 7 caractéres';
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


			
			$('#print').balloon({ 
				html: true, 
					position: 'right',
					contents: 'IMPRIMIR' ,
							
						css: {
					fontSize: 12,
					fontWeight: 'bold',
					backgroundColor: '#3366cc',
					color: '#fff'
				} 
			});

			$('#aprobar').balloon({ 
				html: true, 
					position: 'right',
					contents: 'APROBAR' ,
							
						css: {
					fontSize: 12,
					fontWeight: 'bold',
					backgroundColor: '#3366cc',
					color: '#fff'
				} 
			});

			$('#edit').balloon({ 
				html: true, 
					position: 'right',
					contents: 'EDITAR' ,
							
						css: {
					fontSize: 12,
					fontWeight: 'bold',
					backgroundColor: '#3366cc',
					color: '#fff'
				} 
			});

			$('#victim').balloon({ 
				html: true, 
					position: 'right',
					contents: 'PARTICIPANTES' ,
							
						css: {
					fontSize: 12,
					fontWeight: 'bold',
					backgroundColor: '#3366cc',
					color: '#fff'
				} 
			});

		/*	$('#ayt').balloon({ 
				html: true, 
					position: 'right',
					contents: 'ALOJAMIENTO Y TRANSPORTE' ,
							
						css: {
					fontSize: 12,
					fontWeight: 'bold',
					backgroundColor: '#3366cc',
					color: '#fff'
				} 
			});*/

			$('#anexos').balloon({ 
				html: true, 
					position: 'right',
					contents: 'ANEXOS' ,
							
						css: {
					fontSize: 12,
					fontWeight: 'bold',
					backgroundColor: '#3366cc',
					color: '#fff'
				} 
			});
</script>
<?php include_once("../layouts/pie.php") ?>