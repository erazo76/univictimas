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
					<h3 class="box-title">Requerimientos</h3>
				</div><!-- /.box-header -->
			<div class="box box-primary" >		
				<div class="box-body dataTables_wrapper form-inline dt-bootstrap" width="100%" style="width: 100%">
						<table id="tabla" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Nro. Evento</th>
									<th>Nombre del Evento</th>
									<th>Dirección Territorial</th>
									<th>Municipio</th>
									<th>Fecha de inicio</th>
									<th>Responsable del Evento</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
								<tr>
									<th>Nro. Evento</th>
									<th>Nombre del Evento</th>
									<th>Dirección Territorial</th>
									<th>Municipio</th>
									<th>Fecha de inicio</th>
									<th>Responsable del Evento</th>
								</tr>
							</tfoot>
						</table>
				</div>
				<div class="box-footer">
					<button id="add" class="btn btn-primary" type="button"><i class="fa fa-fw fa-plus"></i> Agregar</button>
					<button id="edit" class="btn btn-primary" type="button" ><i  class="fa fa-fw fa-pencil"></i> Editar</button>
					<button id="delete" class="btn btn-primary" type="button"><i class="fa fa-fw fa-trash-o"></i> Eliminar</button>
					<!--<button id="repo" class="btn btn-primary" type="button"><i class="fa fa-fw fa-trash-o"></i> reporte</button>-->
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
		document.getElementById("edit").disabled=true;

			var table = $('#tabla').dataTable({
				
				"autoWidth": false,	
				  "ajax": {
					"url": "../../data_json/data_mrequerimientos",
					"dataSrc": ""
				  },
				  "scrollX": true,
				  "columns": [
						{ "data": "id" },
						{ "data": "nombre" },
						{ "data": "departamento" },
						{ "data": "municipio" },
						{ "data": "fecha" },
						{ "data": "responsable" }
					],
			        fixedColumns: false,
					"aoColumnDefs": [
            			{
                			"mRender": function ( data, type, row ) {
								return pad(data,5);
							},
							"aTargets": [ 0 ]
						}

					]
				//"order": [[ 0, "asc" ]]

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

			$('#tabla tbody').on( 'dblclick', 'tr', function () {

					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');

				var value= table.$('tr.selected').children('td:first').text();
				//var completo=table.$('tr.selected').children('td:last').text();


				if(!value){

						$.confirm({
						    title: '¡Seleccione el registro a editar !', // hides the title.
						    cancelButton: false, // hides the cancel button.
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success',
						    content: false// hides content block.
						});

				}else{

					$(location).attr('href','frm_editar?record='+value);

				}


			} );


			$("#add" ).click(function() {
				$(location).attr('href','frm_registrar');
			});

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

										$.post( "../../controllers/mrequerimientos_controller", { action: "delete",record:value}).done(function( data ) {
											//$(".message").html(data);
											var parsedJson = $.parseJSON(data);
											$(".message").html(parsedJson.mensaje);
											window.setTimeout('location.reload()', 3000);
										});						    			

									},
								 	cancel: function(){

									}
						});

				}
			});

			$('#repo').click( function () {

				$(location).attr('href','../requerimientos/frm_reportar');
			});
	});


	function pad (str, max) {
		str = str.toString();
		return str.length < max ? pad("0" + str, max) : str;
	
	}
</script>

<?php include_once("../layouts/pie.php") ?>
