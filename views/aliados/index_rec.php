<?php

include("../../lib/validar_session.php");

ValidaSession("../login");
//VerificarAdmin($_SESSION['rolx']);

?>
<?php include("../layouts/constantes.php")?>
<?php include_once("../layouts/cabezera.php") ?>

<div class="message"></div>
<div class="row">
		<div class="col-md-12">
			
				<div class="box-header with-border">
					<h3 class="box-title">Registros recuperados</h3>
				</div><!-- /.box-header -->
	<div id="usuar" class="box">			
				<div class="box-body dataTables_wrapper form-inline dt-bootstrap">
						<table id="tabla" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#ID</th>
									<th>ORBIS</th>
									<th>Nombre del establecimiento</th>
									<th>RIF/C.I.</th>
									<th>Estatus</th>
									<th>Segmento</th>

								</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
								<tr>
									<th>#ID</th>
									<th>ORBIS</th>
									<th>Nombre del establecimiento</th>
									<th>RIF/C.I.</th>
									<th>Estatus</th>
									<th>Segmento</th>

								</tr>
							</tfoot>
						</table>
				</div>
				<div class="box-footer">
					<button id="edit" class="btn btn-primary" type="button" ><i  class="fa fa-fw fa-pencil"></i> Recuperar</button>
					<button id="delete" class="btn btn-primary" type="button"><i class="fa fa-fw fa-trash-o"></i> Descartar</button>
				</div>
	</div>


		</div>
</div>



<script type="text/javascript" src="../../plugins/confirma/jquery-confirm.min.js"></script>
<link rel="stylesheet" href="../../plugins/confirma/jquery-confirm.min.css" type="text/css"/>
 <script type="text/javascript">
	
	$(document).ready(function() {

			//var ttip='';
			var table = $('#tabla').dataTable({
				
				"autoWidth": false,	
				  "ajax": {
					"url": "../../data_json/data_maliados_rec",
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
						{ "data": "segmento" }

					],

			        fixedColumns: false
				//"order": [[ 0, "asc" ]]

			});


			$('#tabla tbody').on( 'click', 'tr', function () {

				if ( $(this).hasClass('selected') ) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			} );

			$('#tabla tbody').on( 'dblclick', 'tr', function () {

					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');

				var value= table.$('tr.selected').children('td:first').text();
				//var completo=table.$('tr.selected').children('td:last').text();


				if(!value){

						$.confirm({
						    title: '¡Seleccione el registro a recuperar !', // hides the title.
						    cancelButton: false, // hides the cancel button.
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success',
						    content: false// hides content block.
						});

				}else{

					$(location).attr('href','frm_recuperar?record='+value);

				}


			} );


			$('#edit').click( function () {
				var value= table.$('tr.selected').children('td:first').text();
				if(!value){

						$.alert({
						    title: '!Seleccione el registro a recuperar !',
						    content: false,
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success'
						});

				}else{

					$(location).attr('href','frm_recuperar?record='+value);

				}
			} );



			$('#delete').click( function () {
				var value= table.$('tr.selected').children('td:first').text();
				if(!value){

						$.alert({
						    title: '!Seleccione el registro a descartar!',
						    content: false,
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success'
						});

				}else{

						$.confirm({

								    title: ' Esta acción es irreversible. ¿Desea realmente descartar el registro recuperado?!',
								    content:false,
								    confirmButton: 'Si',
								    cancelButton: 'No',
								    confirmButtonClass: 'btn-primary',
		    						    cancelButtonClass: 'btn-success',

						    		confirm: function(){

										$.post( "../../controllers/maliados_controller", { action: "delete_rec",record:value}).done(function( data ) {
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
