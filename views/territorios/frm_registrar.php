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
			  <h3 class="box-title">Registrar  territorio</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			  <div class="box-body">

			  	<div class="form-group">
				  <label for="orbis">Codigo ORBIS</label>
				  <input type="text" class="form-control" id="orbis" onkeypress="return esorbis(event);" onblur="alsalir(this.id)"  tabindex="1">
				  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_orbis' ></div>
				</div>

			  	<div class="form-group">
				  <label for="nombre">Nombre del territorio</label>
				  <input type="text" class="form-control" id="nombre" onkeypress="return esnombre(event);" onblur="alsalir(this.id)"  tabindex="2">
				  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_nombre' ></div>
				</div>

				<div class="form-group">
					<label for="distribuidora">Dependencia</label>
					<select id="distribuidora" class="form-control" tabindex="3">
					<option></option>
					</select>
				</div>


				<div class="form-group">
					<label for="modulo">Módulo</label>
					<select id="modulo" class="form-control" tabindex="4">
						<option value="I">I</option>
						<option value="II">II</option>
						<option value="III">III</option>
						<option value="IV">IV</option>
						<option value="V">V</option>
						<option value="VI">VI</option>
						<option value="VII">VII</option>
						<option value="VIII">VIII</option>
						<option value="IX">IX</option>
						<option value="X">X</option>
						<option value="XI">XI</option>
						<option value="XII">XII</option>
						<option value="XIII">XIII</option>
						<option value="XIV">XIV</option>
						<option value="XV">XV</option>
						<option value="XVI">XVI</option>
						<option value="XVII">XVII</option>
						<option value="XVIII">XVIII</option>
						<option value="XIX">XIX</option>
						<option value="XX">XX</option>
					</select>
				</div>

							<div class="form-group-sm">
							  <label for="cedula">Rif/Cedula de identidad</label>

								<div class="input-group">
								    <div class="input-group-btn">
								        <select id="l_rif" class="btn-sm" tabindex="-1">
											<option selected value="V">V</option>
											<option value="J">J</option>
											<option value="P">P</option>
											<option value="E">E</option>
											<option value="G">G</option>
								        </select>
								    </div>
							  		<input type="text" class="form-control bbb" id="c_rif" placeholder="Ingrese cédula o Rif"  onpaste="return false" tabindex="5" onkeypress="return escedula(event);" onblur="alsalira(this.id)">
							  </div>
							   
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_c_rif' class="aaa"><p></p></div>
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

		// ***********************************************************************************************
		$.post( "../../controllers/musuarios_controller", { action: "get_distribuidoras"}).done(function( data ) {
			 $("#distribuidora" ).html( data );
		});

		//** enviar los datos al controlador ***********************************************************
		$("#save" ).click(function() {

				$.post( "../../controllers/mterritorios_controller", {

					action: "add",
					id: $("#id").val(),
					orbis: $("#orbis").val(),
					nombre: $("#nombre").val(),
					distribuidora: $("#distribuidora").val(),
					modulo: $("#modulo").val(),
					l_rif: $("#l_rif").val(),
					c_rif: $("#c_rif").val()

				}).done(function(data){

					var parsedJson = $.parseJSON(data);
					$(".message").html(parsedJson.mensaje);

					if(parsedJson.resultado != 'alert'){

					      setTimeout(function(){

					                  $(location).attr('href','../territorios/frm_registrar');

					                }, 3000);

					}

				},"json");

		});
		// ********************************************************************************************

		//salir del formulario *****************************************
		$("#exit" ).click(function() {
			$(location).attr('href','../territorios/');
		});
		//**************************************************************



	});


	$(function(){

	              $('#orbis').maxLength(6);$('#nombre').maxLength(60);$('#c_rif').maxLength(12);

	});


	            function esnombre(e) {

			    k = (document.all) ? e.keyCode : e.which;
			    if (k==8 || k==0 || k==13) return true;
			    patron = /[A-Z\,\ ]/;
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

	            function esorbis(e) {

			    k = (document.all) ? e.keyCode : e.which;
			    if (k==8 || k==0 || k==13) return true;
			    patron = /[TC0-9]/;
			    n = String.fromCharCode(k);

		                    if(patron.test(n)==''){

		                    	document.getElementById('ms_orbis').style.display = 'block';
		                       	document.getElementById("ms_orbis").innerHTML = 'Utilice la letra "T" o "C" al principio del código.';
		                       	 return patron.test(n);

		                    }else{

		                      	 document.getElementById("ms_orbis").innerHTML = '';
		                      	 return patron.test(n);

		                    }

		}


         //************************************************************************/

            function alsalir(e){

               var caso1=document.getElementById(e).value;

	                if(caso1.length < 5){

	                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 5 caractéres.';

	                }else{

	                  	 document.getElementById('ms_'+ e).innerHTML = '';

	                }

            }

         //************************************************************************/

function escedula(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_c_rif').style.display = 'block';
                       	document.getElementById("ms_c_rif").innerHTML = 'No utilice caracteres especiales ni letras, solo números';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_c_rif").innerHTML = '';
                       	return patron.test(n);

                    }

}


//************************************************************************************/

            function alsalira(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 6){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 6 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

//************************************************************************************/

            function no(){

		              setTimeout(function(){

					      $(location).attr('href','../territorios/');

					    }, 1000);
            }  // end no()


            function si(){

	           $.post( "../../controllers/mterritorios_controller", {

					 action: "activa",
					 id: $("#id").val(),

				 }).done(function( data ) {

							var parsedJson = $.parseJSON(data);
							$(".message").html(parsedJson.mensaje);


					if(parsedJson.resultado == 'ok'){
						$("#nombre").val('');
						$("#orbis").val('');

		              		setTimeout(function(){

					      $(location).attr('href','../territorios/');

					    }, 3000);
					}

				 },"json");

              }// end si()
 </script>

 <?php include_once("../layouts/pie.php") ?>
