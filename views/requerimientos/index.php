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
			
				<div class="box-header with-border">
					<h3 class="box-title">Cotizaciones</h3>
				</div><!-- /.box-header -->
			<div class="box box-primary"  >		
				<div class="box-body dataTables_wrapper form-inline dt-bootstrap" width="100%" style="width: 100%">
						<table id="tabla" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Nro seg.:</th>									
									<th>Departamento</th>
									<th>Municipio</th>									
									<th>Fecha de entrega</th>
									<th>Costo Cotizacion</th>		
									<th></th>									
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
				</div>
				<div class="box-footer">
					<button id="add" class="btn btn-primary" type="button"><i class="fa fa-fw fa-plus"></i> Agregar</button>
					<button id="edit" class="btn btn-primary" type="button"><i  class="fa fa-fw fa-pencil"></i> Editar</button>
					<button id="see" class="btn btn-primary" type="button"><i  class="fa fa-fw fa-eye"></i> Ver</button>
					<button id="delete" class="btn btn-primary" type="button"><i class="fa fa-fw fa-trash-o"></i> Eliminar</button>
					<!--<button id="repo" class="btn btn-primary" type="button"><i class="fa fa-fw fa-eye"></i>Vista previa</button>-->
					
				</div>
			</div>
		</div>
</div>

<script type="text/javascript" src="../../plugins/confirma/jquery-confirm.min.js"></script>
<link rel="stylesheet" href="../../plugins/confirma/jquery-confirm.min.css" type="text/css"/>
 <script type="text/javascript">
	$(document).ready(function() {

		var desh=<?php echo $_SESSION['rolx'];  ?>;//verifica el rol del usuario
		
		if (desh==2){ //si el rol del usuario es SUPERVISOR...

		}else{

		}
		//deshabilitar edicion mientras se programa el modulo editar
		document.getElementById("see").disabled=false;

			var table = $('#tabla').dataTable({
				
				//"autoWidth": false,	
				  "ajax": {
					"url": "../../data_json/data_mrequerimientos",
					"dataSrc": ""
				  },
				  "fnRowCallback": function(nRow, mData, iDisplayIndex ) {

						if ((mData.a_supe)== 1){

							$('td:eq(0)', nRow).css('background-image','url(../../dist/img/aprobado1.png),radial-gradient(white,white )');
							$('td:eq(0)', nRow).css('background-size','70px 25px');
							$('td:eq(0)', nRow).css('background-repeat','no-repeat');
							$('td:eq(0)', nRow).css('font-weight','bold');
							$('td:eq(0)', nRow).css('text-align','left');
							$('td:eq(0)', nRow).css('background-position','bottom center');
							$('td:eq(5)', nRow).css('opacity','0');

						} 	if ((mData.a_supe)== 2){

							$('td:eq(0)', nRow).css('background-image','url(../../dist/img/rechazado.jpeg),radial-gradient(white,white )');
							$('td:eq(0)', nRow).css('background-size','70px 35px');
							$('td:eq(0)', nRow).css('background-repeat','no-repeat');
							$('td:eq(0)', nRow).css('font-weight','bold');
							$('td:eq(0)', nRow).css('text-align','left');
							$('td:eq(0)', nRow).css('background-position','bottom center');
							$('td:eq(5)', nRow).css('opacity','0');

							} else{
								
							$('td:eq(0)', nRow).css('background-image','url(../../dist/img/asignado.png),radial-gradient(white, white)');
							$('td:eq(0)', nRow).css('background-size','70px 25px');
							$('td:eq(0)', nRow).css('background-repeat','no-repeat');
							$('td:eq(0)', nRow).css('font-weight','bold');
							$('td:eq(0)', nRow).css('text-align','left');
							$('td:eq(0)', nRow).css('background-position','bottom center');							
							$('td:eq(5)', nRow).css('opacity','0');
						}

						return nRow;
				  },
				  "scrollX": true,
				  "scrollY": "280px",
				  "scrollCollapse": true,
				  "columns": [
						{ "data": "id" },						
						{ "data": "departamento" },
						{ "data": "municipio" },
						{ "data": "fecha" },
						{ "data": "costo_total" },						
						{ "data": "aprobado" },
						
						
					],
			       // fixedColumns: false,
					"aoColumnDefs": [
            			{
                			"mRender": function ( data, type, row ) {
								return pad(data,5);
							},
							"aTargets": [ 0 ]
							
						},
						{
							"width": "1px",
							"aTargets": [5]
						}	
					],
				"order": [[ 0, "asc" ]]

			});

			$('#tabla tbody').on( 'click', 'tr', function () {

				if ( $(this).hasClass('selected') ) {
					$(this).removeClass('selected');
					document.getElementById("add").disabled=false;
				}else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
					document.getElementById("add").disabled=true;					
				}
			} );



			$("#add" ).click(function() {
				
				$.post( "../../controllers/mrequerimientos_controller", {action: "del_temp_null_detalles"}).done(function(data){},"json");
				$.post( "../../controllers/mrequerimientos_controller", {action: "del_temp"}).done(function(data){},"json");
				$.post( "../../controllers/mrequerimientos_controller", {action: "del_temp_null"}).done(function(data){},"json");
				$.post( "../../controllers/mrequerimientos_controller", {action: "crear"}).done(function(data){},"json");

				setTimeout(function() {       
					$(location).attr('href','frm_registrar');
     			}, 2000);

			});

			$('#see').click( function () {
				var value= table.$('tr.selected').children('td:first').text();
				if(!value){

						$.alert({
						    title: '!Seleccione el registro a visualizar !',
						    content: false,
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success'
						});

				}else{

					$(location).attr('href','frm_ver?record='+value);

				}
			} );

			$('#edit').click( function () {
				var value= table.$('tr.selected').children('td:first').text();
				if(!value){

						$.alert({
						    title: '!Seleccione el registro a editar !',
						    content: false,
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success'
						});

				}else{

					$(location).attr('href','frm_editar?record='+value);

				}
			} );

			$('#delete').click( function () {
				var value= table.$('tr.selected').children('td:first').text();
				if(!value){

						$.alert({
						    title: '!Seleccione el registro a eliminar !',
						    content: false,
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success'
						});

				}else{

						$.confirm({

								    title: '¿Desea eliminar este registro?!',
								    content:false,
								    confirmButton: 'Si',
								    cancelButton: 'No',
								    confirmButtonClass: 'btn-primary',
		    						    cancelButtonClass: 'btn-success',

						    		confirm: function(){

										$.post( "../../controllers/mrequerimientos_controller", { action: "delete_cotizacion",record:value}).done(function( data ) {
											//$(".message").html(data);
											var parsedJson = $.parseJSON(data);
											$(".message").html(parsedJson.mensaje);
											window.setTimeout('location.reload()', 500);
										});						    			

									},
								 	cancel: function(){

									}
						});

				}
			});


			$('#repo').click( function () {
				var value= table.$('tr.selected').children('td:first').text();
				if(!value){

						$.alert({
						    title: '!Seleccione el registro a mostrar !',
						    content: false,
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success'
						});

				}else{

					$(location).attr('href','frm_reportar?record='+value);

				}
			});


	});


	function pad (str, max) {
		str = str.toString();
		return str.length < max ? pad("0" + str, max) : str;
	
	}
</script>

<?php include_once("../layouts/pie.php") ?>
