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

	<div class="col-md-4">

		<div class="box-header with-border" tabindex="-1">
			<h3 class="box-title">APROBACION DE REQUERIMIENTOS</h3>
		</div><!-- /.box-header -->

		<div class="box box-primary">

			<div class="box-body">

			</div><!-- /.box-body -->
						 
		</div><!-- /.box-primary -->

	</div>

	<div class="col-md-8">

	 	<div class="box-header with-border" tabindex="-1">
			<h3 class="box-title">FORMATO SOLICITUD AL OPERADOR</h3>
		</div><!-- /.box-header -->		  

		<div class="box box-primary">
			<div class="box-body">
		
			<div class="contenedorw">
				<div class="caja1 logunivic"></div>
				<div class="caja1 tit_1 fro" >FORMATO SOLICITUD AL OPERADOR</div>
				<div class="caja1 tit_1">PROCEDIMIENTO: ESTRATEGIAS DE REPARACIÓN INTEGRAL</div>
				<div class="caja1 tit_1">PROCESO: REPARACIÓN INTEGRAL</div>
				<div class="caja1">Código: 400.08.15-67</div>
				<div class="caja1">Versión: 04</div>
				<div class="caja1">Fecha: 14/02/2018</div>
				<div class="caja1 pg6_8" >Página: 1 de 1</div>
				<div class="caja1 tit_2">CONTRATO No.  1296 de 2017</div>
				<div class="caja1 fgr">OBJETO DEL CONTRATO: </div>
				<div class="caja1 tit_1">Prestar sus servicios para apoyar la organización, administración y producción de las jornadas o acciones para la implementación de medidas de reparación integral a las víctimas del conflicto armado que le sean solicitadas por LA UNIDAD, de acuerdo con los requerimientos técnicos.</div>
				<div class="caja1 tit_2 faz">REQUERIMIENTOS DE SERVICIO PARA ACCIONES DE LA DIRECCIÓN DE REPARACIÓN</div>
				<div class="caja1 tit_2 finito"></div>
				<div class="caja1 tit_2 faz">INFORMACIÓN GENERAL DEL EVENTO</div>
					
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


	});

</script>
<?php include_once("../layouts/pie.php") ?>