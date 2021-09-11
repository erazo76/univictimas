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
			  <h3 class="box-title">Registrar  marca</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			  <div class="box-body">

						<div class="form-group">
						  <label for="nombre">Nombre de la marca</label>
						  <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre de la marca" onkeypress="return esnombre(event);" onblur="alsalir(this.id)">
						  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_nombre' ></div>
						</div>

						<input type="hidden" id="action" value="add">

			  </div><!-- /.box-body -->

			  <div class="box-footer">
				<button id="save" type="button" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Guardar</button>
				<button id="exit" type="button" class="btn btn-primary"><i class="fa fa-fw fa-reply"></i> Regresar</button>
			  </div>


		  </div><!-- /.box -->
		</div>



		</form>
	</div>
 <script language="JavaScript" src="../../plugins/maxLength/maxLength.js"></script>
 <script type="text/javascript">
	$(document).ready(function() {


		//** enviar los datos al controlador ***********************************************************
		$("#save" ).click(function() {

				$.post( "../../controllers/mmarcas_controller", {

					action: "add",
					nombre: $("#nombre" ).val()

				}).done(function(data){

					var parsedJson = $.parseJSON(data);
					$(".message").html(parsedJson.mensaje);

					if(parsedJson.resultado != 'alert'){

					      setTimeout(function(){

					                  $(location).attr('href','../marcas/frm_registrar');

					                }, 3000);

					}

				},"json");

		});
		// ********************************************************************************************

		//salir del formulario *****************************************
		$("#exit" ).click(function() {
			$(location).attr('href','../marcas/');
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

	                if(caso1.length < 3){

	                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 3 caractéres.';

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

					      $(location).attr('href','../marcas/');

					    }, 1000);
            }  // end no()


            function si(){

	           $.post( "../../controllers/mmarcas_controller", {

					 action: "activa",
					 id: $("#id").val(),

				 }).done(function( data ) {

							var parsedJson = $.parseJSON(data);
							$(".message").html(parsedJson.mensaje);


					if(parsedJson.resultado == 'ok'){
						$("#nombre").val('');

		              		setTimeout(function(){

					      $(location).attr('href','../marcas/');

					    }, 3000);
					}

				 },"json");

              }// end si()
 </script>

 <?php include_once("../layouts/pie.php") ?>
