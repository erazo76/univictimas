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
					<h3 class="box-title">Listado de equipos</h3>
				</div><!-- /.box-header -->
			<div class="box box-primary"  >		
				<div class="box-body dataTables_wrapper form-inline dt-bootstrap" width="100%" style="width: 100%">
						<table id="tabla" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Id</th>
									<th>Equipo</th>
									<th>Marca</th>
									<th>Modelo</th>
									<th>Existencias</th>
									<th>Reservados</th>
									<th>Despachados</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
				</div>
				<div class="box-footer">
					<button id="add" class="btn btn-primary" type="button"><i class="fa fa-fw fa-pencil"></i> Registrar</button>
					<button id="edit" class="btn btn-primary" type="button" ><i  class="fa fa-fw fa-plus"></i> Agregar</button>
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
		document.getElementById("edit").disabled=false;

			var table = $('#tabla').dataTable({
				
				//"autoWidth": false,	
				  "ajax": {
					"url": "../../data_json/data_minventarios",
					"dataSrc": ""
				  },
				  "scrollX": true,
				  "scrollY": "280px",
				  "scrollCollapse": true,
				  "columns": [
						{ "data": "id" },
						{ "data": "equipo" },
						{ "data": "marca" },
						{ "data": "modelo" },
						{ "data": "existencias" },
						{ "data": "reservados" },
						{ "data": "despachados" }

					],

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
						    title: '¡Seleccione el equipo a agregar !', // hides the title.
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
						    title: '!Seleccione el equipo a agregar !',
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


	});

</script>

<?php include_once("../layouts/pie.php") ?>
