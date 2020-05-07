<?php

include("../../lib/validar_session.php");

ValidaSession("../login");
//VerificarAdmin($_SESSION['rolx']);

?>
<?php include("../layouts/constantes.php") ?>
<?php include_once("../layouts/cabezera.php") ?>

	<div class="message"></div>
	<div class="row">
		<!-- left column -->
		<form id="form" role="form" enctype="multipart/form-data">
		<div class="col-md-6">
		  <!-- general form elements -->
		  <div class="box box-primary">

			<div class="box-header with-border">
			  <h3 class="box-title">Registrar  distribuidora</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			  <div class="box-body">

						<div class="form-group">
						  <label for="nombre">Nombre de la distribuidora</label>
						  <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre de la distribuidora" onkeypress="return esnombre(event);" onblur="alsalir(this.id)" tabindex="1">
						  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_nombre' ></div>
						</div>

						<div class="form-group">
							<label for="region">Región</label>
							<select id="region" class="form-control" tabindex="2">
							<option></option>
							</select>
						</div>

			  </div><!-- /.box-body -->

			  <div class="box-footer">
				<button id="save" type="button" class="btn btn-primary" tabindex="3"><i class="fa fa-fw fa-save"></i> Guardar</button>
				<button id="exit" type="button" class="btn btn-primary" tabindex="4"><i class="fa fa-fw fa-reply"></i> Regresar</button>
			  </div>


		  </div><!-- /.box -->
		</div>



		</form>
	</div>
 <script language="JavaScript" src="../../plugins/maxLength/maxLength.js"></script>
 <script type="text/javascript">
	$(document).ready(function() {

		$.post( "../../controllers/mregiones_controller", { action: "get_regiones"}).done(function( data ) {
			 $("#region" ).html( data );
		});
		//** enviar los datos al controlador ***********************************************************
		$("#save" ).click(function() {

				$.post( "../../controllers/mdistribuidoras_controller", {

					action: "add",
					nombre: $("#nombre" ).val(),
					region: $("#region" ).val()

				}).done(function(data){

					var parsedJson = $.parseJSON(data);
					$(".message").html(parsedJson.mensaje);

					if(parsedJson.resultado != 'alert'){

					      setTimeout(function(){

					                  $(location).attr('href','../distribuidoras/frm_registrar');

					                }, 3000);

					}

				},"json");

		});
		// ********************************************************************************************

		//salir del formulario *****************************************
		$("#exit" ).click(function() {
			$(location).attr('href','../distribuidoras/');
		});
		//**************************************************************



	});

	            function esnombre(e) {

			    k = (document.all) ? e.keyCode : e.which;
			    if (k==8 || k==0 || k==13) return true;
			    patron = /[A-Z\,\  ]/;
			    n = String.fromCharCode(k);

			                    if(patron.test(n)==''){

			                        document.getElementById('ms_nombre').style.display = 'block';
			                        document.getElementById("ms_nombre").innerHTML = 'Utilice solo letras mayusculas.';
			                        return patron.test(n);

			                    }else{

			                       document.getElementById("ms_nombre").innerHTML = '';
			                       return patron.test(n);

			                    }

			}


         //************************************************************************/

            function alsalir(e){

               var caso1=document.getElementById(e).value;

	                if(caso1.length < 6){

	                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 6 caractéres.';

	                }else{

	                  	 document.getElementById('ms_'+ e).innerHTML = '';

	                }

            }

         //************************************************************************/
				$(function(){

				    $('#nombre').maxLength(60);

				});

         //************************************************************************/

            function no(){

		              setTimeout(function(){

					      $(location).attr('href','../distribuidoras/');

					    }, 1000);
            }  // end no()


            function si(){

	           $.post( "../../controllers/mdistribuidoras_controller", {

					 action: "activa",
					 id: $("#id").val()

				 }).done(function( data ) {

							var parsedJson = $.parseJSON(data);
							$(".message").html(parsedJson.mensaje);


					if(parsedJson.resultado == 'ok'){
						$("#nombre").val('');
						$("#region").val('');

		              		setTimeout(function(){

					      $(location).attr('href','../distribuidoras/');

					    }, 3000);
					}

				 },"json");

              }// end si()
 </script>

 <?php include_once("../layouts/pie.php") ?>
