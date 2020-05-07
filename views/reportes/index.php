<?php

include("../../lib/validar_session.php");

ValidaSession("../login");
//VerificarAdmin($_SESSION['rolx']);

?>
<?php include("../layouts/constantes.php") ?>
<?php include_once("../layouts/cabezera.php") ?>


<div class="message"></div>

<div class="row">

		<div class="col-md-12">

			<div class="box">

				<div class="box-header with-border">
					<h3 class="box-title">REPORTES</h3>
				</div><!-- /.box-header -->

				  <div class="col-md-4">
					<div class="box-body">

						
						<div class="form-group-sm">
							   <select id="vista" class="form-control">
									<option value="" selected disabled="">Seleccione el reporte a consultar</option>
									<option value="Vw_distribuidore">RESUMEN DE DISTRIBUIDORES</option>
									<option value="Vw_cliente">RESUMEN DE CLIENTES</option>
									<option value="Vw_nevera">RESUMEN DE NEVERAS</option>
							   </select>
						   
						</div>

					</div>
						<div class="box-footer">
							<!--<button id="repo_pdf" class="btn btn-primary" type="button"><i class="fa fa-fw fa-file-pdf-o"></i>Reporte PDF</button>-->
							<button id="repo_exc" class="btn btn-primary" type="button"><i class="fa fa-fw fa-file-excel-o"></i>Reporte EXCEL</button> 	
						</div>				
				  </div>

				  <div class="overlay" id="reloj" hidden >
					  <i class="fa fa-spinner fa-pulse fa-fw" style="font-size:60px;color:green"></i>
					  <i  style="font-size:18px;color:green">Espere por favor...</i>
				  </div>	
				
				  <div id="contenedor" class="container">
					
					<form id="parametros" action="../../controllers/ctrl_excel.php" method="post">	
					
						<div class="col-md-4">
							<div class="panel panel-default">
							    <div class="panel-heading"><span class="fa fa-list" aria-hidden="true"></span> Seleccionar columnas</div>
								<div id="columnas_consultar" class="panel-body">

							    </div>
						    </div>
						</div>
					
						<div class="col-md-4">
							
							
							 <div class="panel panel-default">
								
								  <div class="panel-heading"><span class="fa fa-filter" aria-hidden="true"></span> Filtros <span class="fa fa-question-circle pull-right" id="f_ayuda"></span>	</div>
															
								  <div id="filtros" class="panel-body"></div>
							 </div>		
						  
						</div>
									
					</form>	
		
				  </div>

			</div>	

		</div>

</div>

<!-- modal -->

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<form id="form" role="form" enctype="multipart/form-data" >
  <div class="modal-dialog modal-lm">
    <div class="modal-content">
      <div class="modal-body">
        <div class="contenido-modal">
         <h4 class="modal-title" id="myModalLabel1">¡Esta combinación de filtros no devuelve resultados. Defina de nuevo los criterios de busqueda!</h4>


							      <div class="modal-footer">
							      		<!--<button id="close3" type="button" class="btn btn-success" ><i class="fa fa-fw fa-save"></i>Puntear</button>-->
							      		<button id="aceptar" type="button" class="btn btn-primary"><i class="fa fa-fw fa-times"></i>Aceptar</button>
							      </div>
        </div>
      </div>
    </div>
  </div>
</form>                   
</div>


<script type="text/javascript" src="../../plugins/confirma/jquery-confirm.min.js"></script>
<script src="../../plugins/balloon/jquery.balloon.min.js"></script>

    <script>
    $( document ).ready(function() {

		$("#repo_exc" ).prop('disabled', true);
		//$("#repo_pdf" ).prop('disabled', true);

		$("#vista").change(function() {


			$.post( "../../controllers/ctrl_app.php", { action: "obtener_interfaz", vista: $("#vista").val() }).done(function( data ) {
				
				
				var js =  $.parseJSON(data);
				
				$("#columnas_consultar").html(js[0].columnas);
				$("#filtros").html(js[0].filtros);

			 });

			   $("#repo_exc" ).prop('disabled', false);	
			   //$("#repo_pdf" ).prop('disabled', false);	
		});	

		$("#vista").click(function() {

			   $("#repo_exc" ).prop('disabled', false);	
			   //$("#repo_pdf" ).prop('disabled', false);	
		});

		
		$( "#repo_exc" ).click(function(){			
			 
			 $('form#parametros').submit();

			 $("#repo_exc" ).prop('disabled', true);

		});

	/*	$( "#repo_pdf" ).click(function(){			
			 
			 $('form#parametros').submit();
				
			 $("#repo_exc" ).prop('disabled', true);
			 $("#repo_pdf" ).prop('disabled', true);
			 
		});	*/	

		$('#f_ayuda').balloon({ 

			html: true, 
			position: 'top left',
		  	contents: '<div><span class="fa fa-exclamation-circle" aria-hidden="true"></span>  Para filtrar criterios numéricos, separe los limites con una barra inclinada "/" ( Ej. 0 / 250 ).</div><div><span class="fa fa-exclamation-circle" aria-hidden="true"></span>  Al filtar puede utilizar combinaciones multiples de criterios, pero solo un valor por campo.</div >' ,
		  	minLifetime: 1000 ,
		  	
		  	  css: {
		    fontSize: 10,
		    fontWeight: 'bold',
		    backgroundColor: '#ff0000',
		    color: '#fff'
		  } 


		});

    });
    
   
    </script> 


<?php include_once("../layouts/pie.php") ?>

