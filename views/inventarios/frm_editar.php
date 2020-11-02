<?php

include("../../lib/validar_session.php");

ValidaSession("../login");
//VerificarAdmin($_SESSION['rolx']);

?>

<?php include("../layouts/constantes.php")?>
<?php include_once("../layouts/cabezera.php") ?>

<div class="message"></div>
<div class="row">
<form id="form" role="form" enctype="multipart/form-data">
	
	<div class="col-md-6 col-md-offset-3">

		<div class="box-header with-border" tabindex="-1">
			<h3 class="box-title">Agregar equipos</h3>
		</div><!-- /.box-header -->

		<div class="box box-primary">
				
			<div class="box-body">

				<div class="form-group-sm row">
                	<label for="fecha1" class="col-sm-8 col-form-label"><spam class="pull-right">Fecha</spam></label>
               		<div class="col-sm-4">
						<input class="form-control bbb pull-right" id="fecha1" data-date-format="dd-mm-yyyy" placeholder="dia-mes-año" type="text" onpaste="return false" disabled>
					</div>	
				</div>	
				<br>
				<div class="form-group-sm row">
					<label for="nombre" class="col-sm-4 col-form-label">Equipo</label>
					<div class="col-sm-8">
						<input type="text" class="form-control bbb" id="nombre" placeholder="Ingrese nombre del equipo"  onpaste="return false" tabindex="1" onkeypress="return esnombre(event);"  onblur="alsalir(this.id)"  autocomplete="off" disabled>
						<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_nombre' class="aaa"><p></p></div>
					</div>	
				</div>

				<div class="form-group-sm row">
					<label for="marca" class="col-sm-4 col-form-label">Marca</label>
					<div class="col-sm-8">
						<input type="text" class="form-control bbb" id="marca" placeholder="Ingrese la marca"  onpaste="return false" tabindex="2" onkeypress="return esmarca(event);"  onblur="alsalir(this.id)"  autocomplete="off" disabled >
						<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_marca' class="aaa"><p></p></div>
					</div>
				</div>

				<div class="form-group-sm row">
					<label for="modelo" class="col-sm-4 col-form-label">Modelo</label>
					<div class="col-sm-8">
						<input type="text" class="form-control bbb" id="modelo" placeholder="Ingrese el modelo ó color"  onpaste="return false" tabindex="3" onkeypress="return esmodelo(event);"  onblur="alsalir(this.id)"  autocomplete="off" disabled  >
						<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_modelo' class="aaa"><p></p></div>
					</div>
				</div>

				<div class="form-group-sm row">
					<label for="cantidad" class="col-sm-4 col-form-label">Existencias</label>
					<div class="col-sm-8">
						<input type="text" class="form-control bbb" id="cantidad" placeholder="Cantidad Inicial" onpaste="return false" tabindex="4"  onblur="alsalir(this.id)"  autocomplete="off" disabled>
						<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_cantidad' class="aaa"><p></p></div>
					</div>
				</div>

				<div class="form-group-sm row">
					<label for="plus" class="col-sm-4 col-form-label">Cantidad</label>
					<div class="col-sm-8">
						<input type="text" class="form-control bbb" id="plus" placeholder="Cantidad a agregar" onpaste="return false" tabindex="5" onkeypress="return escantidad(event);"  onblur="alsalir(this.id)"  autocomplete="off" >
						<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_plus' class="aaa"><p></p></div>
					</div>
				</div>

				<div class="form-group-sm row">
					<label for="descripcion" class="col-sm-4 col-form-label">Observaciones</label>
					<div class="col-sm-8">
    					<textarea class="form-control ccc" id="descripcion" rows="4" placeholder="Indique las particularidades del equipo"  onpaste="return false" tabindex="6" onkeypress="return esdescri(event);"  onblur="alsalir(this.id);"  autocomplete="off" ></textarea>
  						<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_descripcion' class="aaa"><p></p></div>
					</div>			
				</div>
				
			</div>

			<div class="box-footer">
				<button id="save" type="button" class="btn btn-success pull-right" tabindex="54"><i class="fa fa-fw fa-save"></i>Guardar</button>
				<button id="exit" type="button" class="btn btn-primary pull-left" tabindex="56"><i class="fa fa-fw fa-reply"></i>Regresar</button>
				<!--<button id="cancelar" type="button" class="btn btn-primary" tabindex="-1"><i class="fa fa-fw fa-times"></i>Cancelar</button>-->
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

	$(document).ready(function() {

		$.post( "../../controllers/minventarios_controller", { action: "search",record:<?php echo intval($_GET["record"]); ?>}).done(function( data ) {
		
			var parsedJson = $.parseJSON(data);

			$("#nombre").val(parsedJson.nombre);
			$("#marca").val(parsedJson.marca);
			$("#modelo").val(parsedJson.modelo);
			$("#cantidad").val(parsedJson.cantidad);
			$("#descripcion").val(parsedJson.descripcion);			

		},"json");

		$("#save" ).click(function() {

			$.post( "../../controllers/minventarios_controller", {
								
				action: "edit",
				record:<?php echo intval($_GET["record"]); ?>,
				plus:$("#plus").val(),
				cantidad:$("#cantidad").val(),				
				descripcion: $("#descripcion").val()

			}).done(function( data ) {

				var parsedJson = $.parseJSON(data);
				$(".message").html(parsedJson.mensaje);

				if(parsedJson.resultado != 'error'){

							setTimeout(function(){

							$(location).attr('href','frm_editar?record='+<?php echo intval($_GET["record"]); ?>);

					}, 1500);

				}

			},"json");

		});

	});


	$("#fecha1").datepicker("setDate", new Date());

	$("#exit" ).click(function() {
		$(location).attr('href','../inventarios/');
	});




//################################  VALIDACIONES  ############################################

          //****longitud de campos********************************************

	$(function(){
		
		$("#nombre").maxLength(100);
		$("#marca").maxLength(100);
		$("#modelo").maxLength(100);
		$("#cantidad").maxLength(7);		
		$("#descripcion").maxLength(100);

	});


    function alsalir(e){
        var caso1=document.getElementById(e).value;
        if(caso1.length < 2){
            document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 2 caractéres';
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

	function esmarca(e) {

		k = (document.all) ? e.keyCode : e.which;
		if (k==8 || k==0 || k==13) return true;
		patron = /^[A-ZÑ0-9\ \.\-]$/;
		n = String.fromCharCode(k);

				if(patron.test(n)==''){

					document.getElementById('ms_marca').style.display = 'block';
					document.getElementById("ms_marca").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
						return patron.test(n);

				}else{

					document.getElementById("ms_marca").innerHTML = '';
					return patron.test(n);

				}

	}

	function esmarca(e) {

		k = (document.all) ? e.keyCode : e.which;
		if (k==8 || k==0 || k==13) return true;
		patron = /^[A-ZÑ0-9\ \.\-]$/;
		n = String.fromCharCode(k);

				if(patron.test(n)==''){

					document.getElementById('ms_marca').style.display = 'block';
					document.getElementById("ms_marca").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
						return patron.test(n);

				}else{

					document.getElementById("ms_marca").innerHTML = '';
					return patron.test(n);

				}

	}

	function esmarca(e) {

		k = (document.all) ? e.keyCode : e.which;
		if (k==8 || k==0 || k==13) return true;
		patron = /^[A-ZÑ0-9\ \.\-]$/;
		n = String.fromCharCode(k);

				if(patron.test(n)==''){

					document.getElementById('ms_marca').style.display = 'block';
					document.getElementById("ms_marca").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
						return patron.test(n);

				}else{

					document.getElementById("ms_marca").innerHTML = '';
					return patron.test(n);

				}

	}			

	function esmodelo(e) {

			k = (document.all) ? e.keyCode : e.which;
			if (k==8 || k==0 || k==13) return true;
			patron = /^[A-ZÑ0-9\ \.\-]$/;
			n = String.fromCharCode(k);

					if(patron.test(n)==''){

						document.getElementById('ms_modelo').style.display = 'block';
						document.getElementById("ms_modelo").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
							return patron.test(n);

					}else{

						document.getElementById("ms_modelo").innerHTML = '';
						return patron.test(n);

					}

	}

	function escantidad(e) {

		k = (document.all) ? e.keyCode : e.which;
		if (k==8 || k==0 || k==13) return true;
		patron = /^[0-9]$/;
		n = String.fromCharCode(k);

						if(patron.test(n)==''){

							document.getElementById('ms_plus').style.display = 'block';
							document.getElementById("ms_plus").innerHTML = 'Use solo nuúmeros';
								return patron.test(n);

						}else{

							document.getElementById("ms_plus").innerHTML = '';
							return patron.test(n);

						}

	}

</script>

 <?php include_once("../layouts/pie.php") ?>