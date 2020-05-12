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
				
				<div class="box-body dataTables_wrapper form-inline dt-bootstrap">
						<table id="tabla" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#ID</th>
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
									<th>#ID</th>
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
			var table = $('#tabla').dataTable({
				
				"autoWidth": false,	
				  "ajax": {
					"url": "../../data_json/data_maliados",
					"dataSrc": ""
				  },

                   "fnRowCallback": function(nRow, mData, iDisplayIndex ) {

                            if ((mData.completado)== 0 && ((mData.estatus)== 'POTENCIAL/' || (mData.estatus)!= 'POTENCIAL/')){
 
                                $('td', nRow).css('background-color','#FFCCCC');
                                                                                
                            }else if((mData.completado)== 1 && (mData.estatus)== 'POTENCIAL/'){
                                          
                                $('td', nRow).css('background-color','#FFCC99');

                            }else if((mData.completado)== 1 && (mData.estatus)!= 'POTENCIAL/'){
                                      
                				$('td', nRow).css('background-color','');

                            }

                            return nRow;
                    },


				  "columns": [


						{ "data": "cid" },
						{ "data": "orbis" },
						{ "data": "nombre" },
						{ "data": "cedula" },
						{ "data": "estatus" },
						{ "data": "segmento" },
						{ "data": "cajas" },
						{ "data": "modulo" },
						{ "data": "territorio" },
						{ "data": "completado"}
					],
			        "columnDefs": [
			            {

			                "targets": [ 9 ],
			                "visible": false			              
			            }
			        ], 
			        fixedColumns: false
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

	});

</script>

<?php include_once("../layouts/pie.php") ?>
