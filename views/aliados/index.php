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
					<h3 class="box-title">Aliados comerciales</h3>
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
									<th>Cajas semanales</th>
									<th>Módulo</th>
									<th>Territorio</th>
									<th></th>



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
									<th>Cajas semanales</th>
									<th>Módulodulo</th>
									<th>Territorio</th>
									<th></th>

								</tr>
							</tfoot>
						</table>
				</div>
				<div class="box-footer">
					<button id="add" class="btn btn-primary" type="button"><i class="fa fa-fw fa-plus"></i> Agregar</button>
					<button id="edit" class="btn btn-primary" type="button" ><i  class="fa fa-fw fa-pencil"></i> Editar</button>
					<button id="ver" class="btn btn-primary" type="button" style='display:none;'><i  class="fa fa-fw fa-eye"></i> Inspeccionar</button>
					<button id="delete" class="btn btn-primary" type="button"><i class="fa fa-fw fa-trash-o"></i> Eliminar</button>
				</div>
	</div>

	<div id="admin" class="box" style='display:none;'>			
				<div class="box-body dataTables_wrapper form-inline dt-bootstrap">
						<table id="tabla2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#ID</th>
									<th>Región</th>
									<th>Estado</th>
									<th>Distribuidora</th>
									<th>Módulo</th>
									<th>Territorio</th>
									<th>Sagmento</th>
									<th>Nombre del establecimiento</th>
									<th>Cajas Semanales</th>
									<th></th>

								</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
								<tr>
									<th>#ID</th>
									<th>Región</th>
									<th>Estado</th>
									<th>Distribuidora</th>
									<th>Módulo</th>
									<th>Territorio</th>
									<th>Sagmento</th>
									<th>Nombre del establecimiento</th>
									<th>Cajas Semanales</th>
									<th></th>

								</tr>
							</tfoot>
						</table>
				</div>
				<div class="box-footer">
					<button id="add1" class="btn btn-primary" type="button"><i class="fa fa-fw fa-plus"></i> Agregar</button>
					<button id="edit1" class="btn btn-primary" type="button" ><i  class="fa fa-fw fa-pencil"></i> Editar</button>
					<button id="ver1" class="btn btn-primary" type="button" style='display:none;'><i  class="fa fa-fw fa-eye"></i> Inspeccionar</button>
					<button id="delete1" class="btn btn-primary" type="button"><i class="fa fa-fw fa-trash-o"></i> Eliminar</button>
				</div>
	</div>	
		</div>
</div>



<script type="text/javascript" src="../../plugins/confirma/jquery-confirm.min.js"></script>
<link rel="stylesheet" href="../../plugins/confirma/jquery-confirm.min.css" type="text/css"/>
 <script type="text/javascript">
	$(document).ready(function() {

		var desh=<?php echo $_SESSION['rolx'];  ?>;//verifica el rol del usuario
		
		if (desh==2){ //si el rol del usuario es administrador...
			document.getElementById('usuar').style.display = 'none';		
			document.getElementById('admin').style.display = 'block';
			document.getElementById('edit1').style.display = 'none';	
			document.getElementById('add1').style.display = 'none';
			document.getElementById('delete1').style.display = 'none';		
			document.getElementById('ver1').style.display = 'block';

			//var ttip='';
			var table = $('#tabla2').dataTable({
				"autoWidth": false,	
				  "ajax": {
					"url": "../../data_json/data_maliados_adminis",
					"dataSrc": ""
				  },

                   "fnRowCallback": function(nRow, mData, iDisplayIndex ) {

                            if ((mData.completado)== 0 ){
 
                                $('td', nRow).css('background-color','#FFCCCC');
                                                                                
                            }else if((mData.completado)== 1 ){
                                      
                				$('td', nRow).css('background-color','');

                            }

                            return nRow;
                    },

				  "columns": [


						{ "data": "cid" },
						{ "data": "region" },
						{ "data": "estado" },
						{ "data": "distribuidora" },
						{ "data": "modulo" },
						{ "data": "territorio" },
						{ "data": "segmento" },
						{ "data": "nombre" },
						{ "data": "cajas" },
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

		}else{

			document.getElementById('usuar').style.display = 'block';		
			document.getElementById('admin').style.display = 'none';
	
			document.getElementById('ver').style.display = 'none';
			//var ttip='';
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

		}


//table.columns.adjust().draw();

//$('#tabla tfoot tr').insertBefore($('#tabla thead tr'))
			$('#tabla2 tbody').on( 'click', 'tr', function () {

				if ( $(this).hasClass('selected') ) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			} );

			$('#tabla2 tbody').on( 'dblclick', 'tr', function () {

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


			$('#ver1').click( function () {
				var value= table.$('tr.selected').children('td:first').text();
				if(!value){

						$.alert({
						    title: '!Seleccione el registro a inspeccionar !',
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

										$.post( "../../controllers/maliados_controller", { action: "delete",record:value}).done(function( data ) {
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
