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
			<button id="print" class="btn btn-primary oculto-impresion " type="button" style="width:60px;height:60px;font-size:x-large;"><i class="fa fa-fw fa-print"></i></button>
			<button id="volver" class="btn btn-primary oculto-impresion" type="button" style="width:60px;height:60px;font-size:x-large;"><i  class="fa fa-fw   fa-mail-reply"></i></button>
		</div>
	</div>

	<div class="col-md-11" style="width:216mm; height:100%;" id="pr1" >

		<div class="box-header with-border" tabindex="-1">
			<h3 class="box-title">DOCUMENTOS ANEXOS</h3>
		</div> <!--/.box-header	-->

		<div class="box box-primary" id="pr2">
			<div class="box-body " >
		
				<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:100%;">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" id="carro">
				
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Anterior</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Siguiente</span>
					</a>
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

		var desh=<?php echo $_SESSION['rolx'];  ?>;//verifica el rol del usuario

		if (desh==2 || desh==4){ //si el rol del usuario es SUPERVISOR... o programador
			
		}else{
			
		}


//#########################################INSERTAR LOS DIVS CON LA COSNSULA DE ADJUNTOS ##################################

		$.post( "../../controllers/madjuntos_controller", { action: "search",record:<?php echo intval($_GET["record"]); ?>}).done(function( data ) {

			var parsedJson = $.parseJSON(data);
				
			
				parsedJson.forEach(function(parsedJson, index) {
					//console.log("indice " + index + " | tipo " + parsedJson.tipo + " concepto: " + parsedJson.concepto + " cantidad: " + parsedJson.cantidad + " medida: " + parsedJson.medida + " observaciones: " + parsedJson.observaciones)
				
					var imagen =parsedJson.imagen;
						
					if(imagen != null && index > 0){
						
						$('#carro').append('<div class="item"><img src="../../dist/img/adjuntos/'+imagen+'" alt=""><div class="carousel-caption"><p>'+imagen+'</p></div></div>');	

					}else{

						$('#carro').append('<div class="item active"><img src="../../dist/img/adjuntos/'+imagen+'" alt=""><div class="carousel-caption"><p>'+imagen+'</p></div></div>');	

					}		
					

				});

		});	

//##############################INSERTAR LOS DIVS CON LA COSNSULA DE  LA TABLA DETALLES ###############################################

	$('#print').click( function () {

		setTimeout(function () { 
			window.print(); 
		}, 500);
		
	});	


	$("#volver").click(function() {
		$(location).attr('href','frm_reportar?record='+$("#idea").val());
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

			$('#volver').balloon({ 
				html: true, 
					position: 'right',
					contents: 'REGRESAR' ,
							
						css: {
					fontSize: 12,
					fontWeight: 'bold',
					backgroundColor: '#3366cc',
					color: '#fff'
				} 
			});

			$('.carousel').carousel({
				interval: false,
				wrap:true
			});

</script>
<?php include_once("../layouts/pie.php") ?>