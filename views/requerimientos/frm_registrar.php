<?php

include("../../lib/validar_session.php");

ValidaSession("../login");
//VerificarAdmin($_SESSION['rolx']);

?>

<?php include("../layouts/constantes.php")?>
<?php include_once("../layouts/cabezera.php") ?>

<div class="message"></div>

<form id="form" role="form" enctype="multipart/form-data">

<div class="base">

	<ul>
 		<li id="uno"> <!--################################## Información General del Evento ##################################  -->

			<div class="col-md-12">
				<div class="box-header with-border" tabindex="-1">
					 	<h3 class="box-title">Información General del Evento</h3>
				</div><!-- /.box-header -->
			</div>

			<div class="col-md-4">
		 	
		  		<div class="box box-primary">
						<input type="hidden" id="distribuidora" value="<?php echo intval($_SESSION['distribuidora']); ?>">
						<input type="hidden" id="region" value="<?php echo intval($_SESSION['region']); ?>">
						<input type="hidden" id="lata" value=6.12>
						<input type="hidden" id="longa" value=-67.39>
						
						<div class="box-body">

						 	<div class="form-group-sm">
							  <label for="n_accion">Nro. Acción</label>
							  <input type="text" class="form-control bbb" id="n_accion" placeholder="Indique numero de actividad"  onpaste="return false" tabindex="1">
							</div>

							<div class="form-group-sm">
							  <label for="nombre">Nombre de la Actividad</label>
							  <input type="text" class="form-control bbb" id="nombre" placeholder="Ingrese nombre de la actividad"  onpaste="return false" tabindex="2" onkeypress="return esnombre(event);"  onblur="alsalir(this.id)"  >
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_nombre' class="aaa"><p></p></div>
							</div>

							<div class="form-group-sm">
							  <label for="fecha1">Fecha de Solicitud</label>
							  <input class="form-control bbb" id="fecha1" data-date-format="dd-mm-yyyy" placeholder="dia-mes-año" type="text" onpaste="return false" tabindex="3">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_fecha1' class="aaa"><p></p></div>
							</div>

							<div class="form-group-sm">
								<label>Dirección Territorial</label>
								<select id="departamento" class="form-control bbb" tabindex="4">
								<option></option>
								</select>
							</div>

							<div class="form-group-sm">
							  <label for="depa">Departamento</label>
							  <input type="text" class="form-control bbb" id="depa" placeholder="Departamento"  onpaste="return false" tabindex="5">
							</div>

							<div class="form-group-sm">
								<label>Municipio</label>
								<select id="municipio" class="form-control bbb" tabindex="6">
								<option></option>
								</select>
							</div>

							<div class="form-group-sm">
								<label>Centro Poblado</label>
								<select id="corregimiento" class="form-control bbb" tabindex="7">
								<option></option>
								</select>
							</div>

						</div>
		 		</div>
			</div>

		  <div class="col-md-4">

				<div class="box-header with-border">
					<h3 class="box-title">Dirección de la Actividad</h3>
				</div><!-- /.box-header -->	

		  	<div class="box box-primary">

				<div class="box-body">

					<div class="form-group-sm">
						<label >Dirección</label>
						
	                        <div class = "input-group">

								<span class="input-group-btn">
									<select id="a_primario" class="btn-sm"  tabindex="8"  >
										<option value="0">Avenida</option>
										<option value="1">Calle</option>
										<option value="2">Carrera</option>
										<option value="3">Vereda</option>
										<option value="4">Callejón</option>
										<option value="5">Carretera</option>
										<option value="6">Autopista</option>
									</select>
 								</span>
									<input type="text" id="acceso1" class="form-control bbb" placeholder="Principal"  onpaste="return false" tabindex="9" onkeypress="return esacceso1(event);" onblur="alsalir(this.id)">
								
							</div>
	            			<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_acceso1' class="aaa"><p></p></div>
					</div>

					<div class="form-group-sm">
						  
						<div class="row">
	  						  <div class="col-sm-6">
								<div class="input-group">
								    <span class="input-group-addon"><span class="fa fa-slack"></span></span>
								    <input type="text" id="acceso2" class="form-control bbb" placeholder="Secundario"  onpaste="return false" tabindex="10" onkeypress="return esacceso(event);" onblur="alsalir(this.id)">
								</div>
							  </div>

							  <div class="col-sm-6">
								<div class="input-group">
								    <span class="input-group-addon"><span class="fa fa-minus"></span></span>
								    <span><input type="text" id="num_dir" class="form-control bbb" placeholder="Numero"  onpaste="return false" tabindex="11" onkeypress="return esacceso2(event);" onblur="alsalir(this.id)">
								</div>
							  </div>
						</div>				
						<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_acceso2' class="aaa"><p></p></div>
						<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_num_dir' class="aaa"><p></p></div>
					</div>

					<div class="form-group-sm">
						<label >Referencia</label>
	                        <div class = "input-group">

								<span class="input-group-btn">
									<select id="a_referencia" class="btn-sm"  tabindex="12"  >
										<option value="0">Al lado</option>
										<option value="1">Cerca</option>
										<option value="2">Frente</option>
										<option value="3">Diagonal</option>
										<option value="4">Detras</option>
										<option value="5">Via</option>
										<option value="6">Dentro</option>
									</select>
 								</span>

								<input type="text" class="form-control bbb" id="referencia" placeholder="Ingrese una referencia"  onpaste="return false" tabindex="13" onkeypress="return esreferencia(event);" onblur="alsalir(this.id)">
							</div>
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_referencia' class="aaa"><p></p></div>
					</div>
 				</div>
			</div>

			<div class="box-header with-border">
					<h3 class="box-title">Inicio y Final de la Actividad</h3>
			</div><!-- /.box-header -->	

			<div class="box box-primary">
			  <div class="box-body">
				<div class="form-group-sm">
						  
					<div class="row">

						<div class="col-sm-6">
							
								<label for="fecha2">Fecha Inicio</label>
								<input class="form-control bbb" id="fecha2" data-date-format="dd-mm-yyyy" placeholder="dia-mes-año" type="text" onpaste="return false" tabindex="14">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_fecha2' class="aaa"><p></p></div>
													
						</div>

						<div class="col-sm-6">
							
								<label for="fecha2">Fecha Final</label>
								<input class="form-control bbb" id="fecha3" data-date-format="dd-mm-yyyy" placeholder="dia-mes-año" type="text" onpaste="return false" tabindex="15">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_fecha3' class="aaa"><p></p></div>
													
						</div>
					</div>							   
					
				</div>

				<div class="form-group-sm">
						  
					<div class="row">

						<div class="col-sm-6">
							
								<label for="hora1">Hora Inicio</label>
								<input class="form-control bbb" id="hora1" type="time" onpaste="return false" tabindex="16" min="05:00" max="22:00">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_hora1' class="aaa"><p></p></div>
													
						</div>

						<div class="col-sm-6">
							
								<label for="hora2">Hora Final</label>
								<input class="form-control bbb" id="hora2" type="time" onpaste="return false" tabindex="17" min="05:00" max="22:00">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_hora2' class="aaa"><p></p></div>
													
						</div>
					</div>							   
					
				</div>
			  </div>
			</div>


		  </div>

		  <div class="col-md-4">

		  		<div class="box-header with-border">
					<h3 class="box-title">Responsable Territorial</h3>
				</div><!-- /.box-header -->		

		  		<div class="box box-primary">

						<div class="box-body">
							<label>Nombres</label>
							<div class="input-group">
								<input type="text" class="form-control bbb" id="rt_nombre1" placeholder="Primer nombre"  onpaste="return false" tabindex="18" onkeypress="return esnombre2(event);"  onblur="alsalir(this.id)"  >
								<span class="input-group-btn" tabindex="-1" style="width:0px;"></span>
								<input type="text" class="form-control bbb" id="rt_nombre2" placeholder="Segundo nombre"  onpaste="return false" tabindex="19" onkeypress="return esnombre3(event);"  onblur="alsalir(this.id)"  >
							</div>
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_rt_nombre1' class="aaa"><p></p></div>
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_rt_nombre2' class="aaa"><p></p></div>

							<label>Apellidos</label>
							<div class="input-group">
								<input type="text" class="form-control bbb" id="rt_apellido1" placeholder="Primer apellido"  onpaste="return false" tabindex="20" onkeypress="return esnombre2(event);"  onblur="alsalir(this.id)"  >
								<span class="input-group-btn" tabindex="-1" style="width:0px;"></span>
								<input type="text" class="form-control bbb" id="rt_apellido2" placeholder="Segundo apellido"  onpaste="return false" tabindex="21" onkeypress="return esnombre3(event);"  onblur="alsalir(this.id)"  >
							</div>
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_rt_apellido1' class="aaa"><p></p></div>
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_rt_apellido2' class="aaa"><p></p></div>
															
							
						</div>
				 
				
					</div>

					<div class="box-header with-border">
						<h3 class="box-title">Coordenadas geográficas</h3>
					</div><!-- /.box-header -->

				<div class="box box-primary">

						<div class="box-body">

        


							<div class="focusguard" id="guardia1" tabindex="22"></div>
						  		
						</div>
		 		</div><!-- /.box -->
			</div>
		</li>

		<li id="dos"> <!--################################## DATOS DE CONTACTO Y COMERCIALES ##################################  -->

			<div class="col-md-4">

				<div class="box-header with-border">
					 	<h3 class="box-title">Datos de contacto</h3>
				</div><!-- /.box-header -->

		  		<div class="box box-primary">
						<!-- form start -->
						<div class="box-body">

							<div class="form-group-sm">
							  <label for="propietario">Dueño/Responsable del establecimiento</label>
							  <input type="text" class="form-control ccc" id="propietario" placeholder="Ingrese nombre del dueño/responsable"  onpaste="return false" tabindex="222" onkeypress="return espropietario(event);" onblur="return esnombre2(this.value);">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_propietario' ></div>
							</div>

								<div id="confirma_nombre">
									<ul><li id="conf_nom" style="color:#fff;text-align:center" ></li></ul>
								</div>

							<div class="form-group-sm">
							  <label for="tele1">Teléfono de contacto principal</label>
							  <input type="text" class="form-control ccc" id="tele1" placeholder="Ingrese un número telefónico"  onpaste="return false" tabindex="223" onkeypress="return estele1(event);" onblur="alsalir3(this.id)" >
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_tele1' ></div>
							</div>

								<div id="confirma_telefono">
									<ul><li id="conf_tel" style="color:#fff;text-align:center" ></li></ul>
								</div>

							<div class="form-group-sm">
							  <label for="tele2">Teléfono de contacto secundario</label>
							  <input type="text" class="form-control ccc" id="tele2" placeholder="Ingrese un número telefónico"  onpaste="return false" tabindex="24" onkeypress="return estele2(event);" onblur="alsalir3(this.id)">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_tele2' ></div>
							</div>

								<div id="confirma_telefono2">
									<ul><li id="conf_tel2" style="color:#fff;text-align:center" ></li></ul>
								</div>

							<div class="form-group-sm">
							  <label for="correo1">Correo electrónico</label>
							  <input type="text" class="form-control ccc" id="correo1" placeholder="Ingrese un correo electrónico"  onpaste="return false" tabindex="25" onkeypress="return escorreo(event);" onblur="alsalir3(this.id)">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_correo1' ></div>
							</div>

								<div id="confirma_correo">
									<ul><li id="conf_cor" style="color:#fff;text-align:center" ></li></ul>
								</div>

						</div><!-- /.box-body -->
		 		</div><!-- /.box -->
			</div>

			<div class="col-md-4">

				<div class="box-header with-border">
					 	<h3 class="box-title">Datos Comerciales</h3>
				</div><!-- /.box-header -->

		  		<div class="box box-primary">

						<!-- form start -->
						<div class="box-body">

							<div class="form-group">
								<label>Frecuencia de visita</label></br>
								<select id="dias" class="form-control" multiple="multiple" tabindex="26">
									<option value="0">Lunes</option>
									<option value="1">Martes</option>
									<option value="2">Miercoles</option>
									<option value="3">Jueves</option>
									<option value="4">Viernes</option>
									<option value="5">Sabado</option>
								</select>
							</div>

							<div class="form-group-sm">
							  <label for="caja_t">Total de cajas semanales</label>
							  <input type="text" class="form-control ccc" id="caja_t" placeholder="Ingrese total de cajas semanales"  onpaste="return false" tabindex="0" onkeypress="return escajat(event);" onblur="alsalir4(this.id);sig_1()">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_caja_t' ></div>
							</div>

							<div class="form-group-sm">
							  <label for="caja_p">Cajas propias semanales</label>
							  <input type="text" class="form-control ccc" id="caja_p" placeholder="Ingrese cajas propias semanales"  onpaste="return false" tabindex="28" onkeypress="return escajap(event);" onblur="alsalir4(this.id);menor()">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_caja_p' ></div>
							</div>

							<div class="form-group-sm">
							  <label for="caja_o">Cajas objetivo semanales</label>
							  <input type="text" class="form-control" id="caja_o" placeholder="Cajas  objetivo semanales" readonly="true" onfocus="cajas_obj();" tabindex="29">
 							</div>

							<div class="form-group-sm">
								<label>Medio de despacho</label>
								<select id="despacho" class="form-control ccc" tabindex="30" >
								    <option value="0">Independiente</option>
								    <option value="1">Directo</option>
								    <option value="2">Avance</option>
								</select>
							</div>

						 </div><!-- /.box-body -->

		 		</div><!-- /.box -->
			</div>

			<div class="col-md-4">

				<div class="box-header with-border">
					 	<h3 class="box-title"></h3>
				</div><!-- /.box-header -->

		  		<div class="box box-primary">

						<!-- form start -->
						<div class="box-body">

						    <div class="form-group-sm">
							  <label>Descuento</label>
	                            <div class = "input-group">
								      <span class = "input-group-addon">
	                                     <input type = "checkbox" tabindex="31" id="descu">
	                                  </span>
	                                   	<select id="descuento" class="form-control ccc" tabindex="32" disabled>
									      <option value="0">0 %</option>
									      <option value="1">1 %</option>
									      <option value="2">1,5 %</option>
									      <option value="3">2 %</option>
									      <option value="4">2,5 %</option>
									      <option value="5">3 %</option>
									      <option value="6">3,5 %</option>
									      <option value="7">4 %</option>		
									      <option value="8">4,5 %</option>
									      <option value="9">5 %</option>								      
							            </select>
	            				</div>
							</div>

							<div class="form-group-sm">
							  <label>Línea seca</label>

								<div class="input-group">
								    <input type="text"  class="form-control ccc" id="seca" placeholder="Indique productos línea seca propios"  onpaste="return false" tabindex="33" onkeypress="return eslineaseca(event);" onblur="alsalira(this.id)">
								    <span class="input-group-addon" ><span class="fa fa-question-circle" id="h_seca"></span>
									
								    </span>									
								</div>
						   
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_seca' ></div>
							</div>  

							<div class="form-group-sm">
								<label>Refrigerado competencia</label>
								<div class="input-group">
									<input type="text"  class="form-control ccc" id="rf_competencia" placeholder="Indique productos refrigerados de la competencia"  onpaste="return false" tabindex="34" onkeypress="return esrefcomp(event);" onblur="alsalira(this.id)">
								    <span class="input-group-addon" ><span class="fa fa-question-circle" id="h_rcompetencia"></span>
									
								    </span>									
								</div>
								
								
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_rf_competencia' ></div>
							</div>

							<div class="form-group-sm">
								<label>Línea seca competencia</label>
								<div class="input-group">
									<input type="text"  class="form-control ccc" id="ls_competencia" placeholder="Indique productos línea seca de la competencia"  onpaste="return false" tabindex="35" onkeypress="return eslineasecomp(event);" onblur="alsalira(this.id)">
								    <span class="input-group-addon" ><span class="fa fa-question-circle" id="h_scompetencia"></span>
									
								    </span>								
								</div>
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_ls_competencia' ></div>
							</div>

							<div class="focusguard" id="guardia2" tabindex="36"></div>

						</div><!-- /.box-body -->

		 		</div><!-- /.box -->

			</div>
		</li>

		<li id="tres"><!--################################## DATOS PUBLICITARIOS Y DE ACTIVOS ##################################  -->
<div class="row">
			<div class="col-md-4">

				<div class="box-header with-border">
					 	<h3 class="box-title" >Datos publicitarios y de neveras</h3>
				</div><!-- /.box-header -->

		  		<div class="box box-primary">

						<div class="box-body">

						    <div class="form-group">
							  <label>Neveras propias</label>
	                            <div class = "input-group">
								      <span class = "input-group-addon">
	                                     <input type = "checkbox" tabindex="37" id="a_propio">
	                                  </span>
	                                   	<select id="lab_propio" class="form-control" tabindex="-1" disabled>
									      <option value="0">No existen neveras</option>
									      <option value="1">Exiten neveras</option>
    						            </select>	                                  
									  <span class="input-group-addon" ><span class="fa fa-question-circle" id="h_apropios"></span>
									
								      </span>	
	            				</div>
							</div>

							<div class="form-group">
								<label>Otras neveras</label></br>
								<select id="activo" class="form-control" multiple="multiple" tabindex="38" >
									<option value="4">Ninguno</option>
									<option value="1">Competencia</option>
									<option value="2">Propietario</option>
									<option value="3">Distribuidor</option>
									<!--<option value="0">Propios</option>-->
								</select>
							</div>

							<div class="form-group">
								<label>Toldos</label></br>
								<select id="toldo" class="form-control" multiple="multiple" tabindex="0" >
									<option value="4">Ninguno</option>
									<option value="1">Competencia</option>
									<option value="2">Propietario</option>
									<option value="3">Distribuidor</option>
									<option value="0">Propios</option>
									
								</select>
							</div>

							<div class="form-group">
								<label>Avisos</label></br>
								<select id="aviso" class="form-control" multiple="multiple" tabindex="0" >
									<option value="4">Ninguno</option>
									<option value="1">Competencia</option>
									<option value="2">Propietario</option>
									<option value="3">Distribuidor</option>
									<option value="0">Propios</option>
								</select>
							</div>

							<div class="form-group">
								<label>Fachadas</label></br>
								<select id="fachada" class="form-control" multiple="multiple" tabindex="0">
									<option value="4">Ninguno</option>
									<option value="1">Competencia</option>
									<option value="2">Propietario</option>
									<option value="3">Distribuidor</option>
									<option value="0">Propios</option>
								</select>
							</div>

							<div class="form-group-sm">
								<label>Observaciones</label>
								<input type="text"  class="form-control" id="observacion" placeholder="Ingrese observaciones"  onpaste="return false" tabindex="0" onkeypress="return esobservacion(event);" onblur="alsalira(this.id)">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_observacion' ></div>
							</div>
						</div>

						  <div class="box-footer">
							<button id="save" type="button" class="btn btn-success" tabindex="0"><i class="fa fa-fw fa-save"></i>Guardar</button>
							<button id="exit" type="button" class="btn btn-primary pull-right" tabindex="-1"><i class="fa fa-fw fa-reply"></i>Regresar</button>
							<!--<button id="cancelar" type="button" class="btn btn-primary" tabindex="-1"><i class="fa fa-fw fa-times"></i>Cancelar</button>-->
						  </div>
						
				</div><!-- /.box-body -->


		 	</div>

			<div class="col-md-8">
<div id="oculto" style='display:none;'>
	
		
					<div class="box-header with-border">
					 	<h3 class="box-title">Neveras propias</h3>
					</div><!-- /.box-header -->
	<div class="box">			
					<div class="box-body dataTables_wrapper form-inline dt-bootstrap">
							<table id="tabla" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Id</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Serial</th>
										<th>Activo fijo</th>
										<th width="131px">Comodato N°</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
								<tfoot>
									<tr>
										<th>Id</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Serial</th>
										<th>Activo fijo</th>
										<th width="131px">Comodato N°</th>
									</tr>
								</tfoot>
							</table>
					</div>
				
					<div class="box-footer">
						<button id="agregar" type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>Agregar activo</button>
					   	<button id="quitar" type="button" class="btn btn-danger"><i class="fa fa-fw fa-minus"></i>Desincorporar activo</button>
					</div>
	</div>
</div>			 
			</div><!-- /.box-body -->
</div>
	    </li>
	</ul>
</div>

</form>

<!-- Modal 1 -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<form id="form" role="form" enctype="multipart/form-data" >
  <div class="modal-dialog modal-lm">
    <div class="modal-content">
      <div class="modal-body">
        <div class="contenido-modal">
         <h4 class="modal-title" id="myModalLabel1">Activo</h4>
			<div class="message1"></div>
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
				  <!-- general form elements -->
				  <div class="box box-primary">

					<div class="box-header with-border"></div><!-- /.box-header -->
					<!-- form start -->
					  <div class="box-body">

							<div class="form-group-sm">
								<label>Marca</label>
								<select id="a_marca"   class="form-control" >
								    <option></option>
								</select>
							</div>

							<div class="form-group-sm">
								<label>Modelo</label>
								<input type="text"  class="form-control" id="a_modelo"  placeholder="Ingrese modelo del activo"  onpaste="return false" onkeypress="return esa_modelo(event);" onblur="alsalira(this.id)">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_a_modelo' ></div>
							</div>

							<div class="form-group-sm">
								<label>Serial</label>
								<input type="text"  class="form-control" id="a_serial"  placeholder="Ingrese serial del activo"  onpaste="return false" onkeypress="return esa_serial(event);" onblur="alsalira(this.id)">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_a_serial' ></div>
							</div>

							<div class="form-group-sm">
								<label>Activo fijo</label>
								<input type="text"  class="form-control" id="a_activo_f"  placeholder="Ingrese el número de activo fijo (LLA-000000)"  onpaste="return false" onblur="alsalira3(this.id)">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_a_activo_f' ></div>
							</div>

							<div class="form-group-sm">
								<label>Número de comodato</label>
								<input type="text"  class="form-control" id="a_comodato"  placeholder="Ingrese el número de comodato"  onpaste="return false" onkeypress="return esa_comodato(event);" onblur="alsalira(this.id)">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_a_comodato' ></div>
							</div>

					  </div><!-- /.box-body -->

				  </div><!-- /.box -->

				</div>
			</div>
							      <div class="modal-footer">
							      		<button id="close1" type="button" class="btn btn-success" ><i class="fa fa-fw fa-save"></i>Incluir</button>
							      		<button id="cancelar2" type="button" class="btn btn-primary"><i class="fa fa-fw fa-times"></i>Cancelar</button>

							      </div>
        </div>
      </div>
    </div>
  </div>
</form>                   
</div>

<!-- Modal 2 -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<form id="form" role="form" enctype="multipart/form-data" >
  <div class="modal-dialog modal-lm">
    <div class="modal-content">
      <div class="modal-body">
        <div class="contenido-modal">
         <h4 class="modal-title" id="myModalLabel1">Referencia geográfica</h4>
			<div class="message1"></div>
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
				  <!-- general form elements -->
				  <div class="box box-primary">

					<div class="box-header with-border"></div><!-- /.box-header -->
					<!-- form start -->
					  <div class="box-body">
						<div id="weathermap">
							<!-- <div class='custom-popup' id="map" style="height: 440px; border: 1px solid #AAA;"></div> -->
						</div>	
					  </div><!-- /.box-body -->

				  </div><!-- /.box -->

				</div>
			</div>
							      <div class="modal-footer">
							      		<!--<button id="close3" type="button" class="btn btn-success" ><i class="fa fa-fw fa-save"></i>Puntear</button>-->
							      		<button id="cancelar3" type="button" class="btn btn-primary"><i class="fa fa-fw fa-times"></i>Cancelar</button>
							      </div>
        </div>
      </div>
    </div>
  </div>
</form>                   
</div>

						  <div class="box-footer">
							<button id="izquierda" type="button" class="btn btn-primary" disabled tabindex="-1"><i class="fa fa-arrow-left"></i>Anterior</button>
							
							<button id="derecha" type="button" class="btn btn-primary pull-right" tabindex="-1">Siguiente<i class="fa fa-arrow-right"></i></button>
						  </div>

<script language="JavaScript" src="../../plugins/maxLength/maxLength.js"></script>
<script type="text/javascript" src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../../plugins/datepicker/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>
<script src="../../plugins/unslider/unslider-min.js"></script>
<script type="text/javascript" src="../../js/bootstrap-multiselect.js"></script>
<script language="JavaScript" src="../../plugins/mask/jquery.mask.min.js"></script>
<script type="text/javascript" src="../../plugins/confirma/jquery-confirm.min.js"></script>
<script src="../../plugins/balloon/jquery.balloon.min.js"></script>
<script src="../../plugins/leaflet/leaflet.js"></script>
<script src="../../plugins/leaflet/leaflet.label.js"></script>

<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAq8g7WPAx_OtQaQNzYPvexnbbV50CDf0o" async defer></script>
<script src="../../plugins/leaflet/gmaps.js"></script>

<script src="../../plugins/leaflet/Leaflet.GoogleMutant.js"></script>-->

<script src="../../plugins/select3/bootstrap-select.min.js"></script>
<script src="../../plugins/select3/i18n/defaults-es_ES.min.js"></script>

<link rel="stylesheet" href="../../plugins/confirma/jquery-confirm.min.css" type="text/css"/>
<link rel="stylesheet" href="../../css/style_format_pass.css" type="text/css"/>
<link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css" type="text/css"/>
<link rel="stylesheet" href="../../plugins/unslider/unslider.css">
<link rel="stylesheet" href="../../plugins/leaflet/leaflet.css"/>

<link rel="stylesheet" href="../../plugins/select3/bootstrap-select.min.css">

 <script type="text/javascript">

$(document).ready(function() {

	$.post( "../../controllers/mactivos_controller", { action: "search_act_delete"}).done(function( data ) {},"json");

	//setTimeout(function(){

});

	




$('#dias > option[value="0"]').attr('selected', 'selected');
$('#toldo > option[value="4"]').attr('selected', 'selected');
$('#aviso > option[value="4"]').attr('selected', 'selected');
$('#fachada > option[value="4"]').attr('selected', 'selected');
$('#activo > option[value="4"]').attr('selected', 'selected');


//MASCARAS DE VALIDACION ########################################


$('#cedula').mask('000000000', {

    	

  });

$('#tele1').mask('A000-000-0000', {

    	translation: {

    		 'A': {

        			pattern: /[0]/, optional: false

     		        }

    	  },

    	

  });

$('#tele2').mask('A000-000-0000', {

    	translation: {

    		 'A': {

        			pattern: /[0]/, optional: false

     		        }

    	  },

    	

  });



//$('#a_activo_f').mask('LLA-000000');

$('#a_activo_f').mask('AAY-000000', {'translation': {
                                        A: {pattern: /[L]/},
                                        Y: {pattern: /[A]/}
                                      }
});

var tick=0;

$("#derecha" ).click(function() {

	if(tick==0){

		var cont_alert =$('.bbb').filter(function() { return $(this).val() == ""; }).size();
		//var cont_alert = $('.aaa p:contains("") ').size();

		if(cont_alert!=0){

			//alert('existen campos vacios');

						$.confirm({
						    title: '¡existen campos vacios !', // hides the title.
						    cancelButton: false, // hides the cancel button.
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success',
						    content: false// hides content block.
						});			

		}else{

				$.post( "../../controllers/maliados_controller", {

					action: "add_temp1",
					sorbis: $("#s_orbis").val(),
					orbis: $("#orbis").val(),
					nombre: $("#nombre").val(),
					razon: $("#razon").val(),
					segmento: $("#segmento").val(),
					cedula: $("#cedula").val(),
					l_cedula: $("#l_cedula").val(),
					fecha1: $("#fecha1").val(),
					fecha2: $("#fecha2").val(),
					departamento: $("#departamento").val(),
					municipio: $("#municipio").val(),
					ciudad: $("#ciudad").val(),
					sector: $("#sector").val(),
					parroquia: $("#parroquia").val(),
					a_principal: $("#a_principal").val(),
					acceso1: $("#acceso1").val(),
					a_secundario: $("#a_secundario").val(),
					acceso2: $("#acceso2").val(),
					referencia: $("#referencia").val(),
					zona: $("#zona").val(),
					territorio: $("#territorio").val(),
					territorio_g: $("#territorio_g").val(),
					latitud: $("#latitud").val(),
					longitud: $("#longitud").val()

				}).done(function(data){

					var parsedJson = $.parseJSON(data);
					$(".message").html(parsedJson.mensaje);

					if(parsedJson.resultado != 'error'){

						setTimeout(function(){
							$(".alert").alert('close');
						}, 1500);

					}else{


					}


				},"json");	

			$('.base').unslider('animate:1');
			tick=1;
			document.getElementById('izquierda').disabled = false;

		}

	}else if(tick==1){

		var cont_alert3 =$('.ccc').filter(function() { return $(this).val() == ""; }).size();
		//var cont_alert = $('.aaa p:contains("") ').size();

		if(cont_alert3!=0){

						$.confirm({
						    title: '¡existen campos vacios !', // hides the title.
						    cancelButton: false, // hides the cancel button.
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success',
						    content: false// hides content block.
						});	

		}else{

				$.post( "../../controllers/maliados_controller", {

					action: "add_temp2",
					sorbis: $("#s_orbis").val(),
					orbis: $("#orbis").val(),
					nombre: $("#nombre").val(),
					razon: $("#razon").val(),
					segmento: $("#segmento").val(),
					cedula: $("#cedula").val(),
					l_cedula: $("#l_cedula").val(),
					fecha1: $("#fecha1").val(),
					fecha2: $("#fecha2").val(),
					departamento: $("#departamento").val(),
					municipio: $("#municipio").val(),
					ciudad: $("#ciudad").val(),
					sector: $("#sector").val(),
					parroquia: $("#parroquia").val(),
					a_principal: $("#a_principal").val(),
					acceso1: $("#acceso1").val(),
					a_secundario: $("#a_secundario").val(),
					acceso2: $("#acceso2").val(),
					referencia: $("#referencia").val(),
					zona: $("#zona").val(),
					territorio: $("#territorio").val(),
					territorio_g: $("#territorio_g").val(),
					latitud: $("#latitud").val(),
					longitud: $("#longitud").val(),
					propietario: $("#propietario").val(),
					tele1: $("#tele1").val(),
					tele2: $("#tele2").val(),
					correo1: $("#correo1").val(),
					dias: $("#dias").val(),
					caja_t: $("#caja_t").val(),
					caja_p: $("#caja_p").val(),
					caja_o: $("#caja_o").val(),
					despacho: $("#despacho").val(),
					descuento: $("#descuento").val(),
					seca: $("#seca").val(),
					rf_competencia: $("#rf_competencia").val(),
					ls_competencia: $("#ls_competencia").val()

				}).done(function(data){

					var parsedJson = $.parseJSON(data);
					$(".message").html(parsedJson.mensaje);
					
					if(parsedJson.resultado != 'error'){
					
						setTimeout(function(){
							$(".alert").alert('close');
						}, 1500);

					}else{


					}

				},"json");	

			$('.base').unslider('animate:2');
			tick=2;
			document.getElementById('derecha').disabled = true;

		}

	}

});

$("#izquierda" ).click(function() {

	if(tick==1){

		$('.base').unslider('animate:0');
		tick=0;
		document.getElementById('izquierda').disabled = true;

	}else if(tick==2){

		$('.base').unslider('animate:1');
		tick=1;
		document.getElementById('derecha').disabled = false;

	}

});


		$('#tele1').keyup(function() {
			// set password variable
			var telefo = $(this).val();

			$.post( "../../controllers/validaciones", { action: "validar1",telefono:telefo}).done(function( data ) {
			 $("#conf_tel").html( data );

			});

		}).focus(function() {
			$('#confirma_telefono').show();
		}).blur(function() {
			$('#confirma_telefono').hide();
		});

		$('#tele2').keyup(function() {
			// set password variable
			var telefo = $(this).val();

			$.post( "../../controllers/validaciones", { action: "validar2",telefono:telefo}).done(function( data ) {
			 $("#conf_tel2").html( data );

			});

		}).focus(function() {
			$('#confirma_telefono2').show();
		}).blur(function() {
			$('#confirma_telefono2').hide();
		});

		$('#propietario').keyup(function() {
			// set password variable
			var nombreso = $(this).val();

			$.post( "../../controllers/validaciones", { action: "validar4",nombre:nombreso}).done(function( data ) {
			 $("#conf_nom").html( data );

			});

		}).focus(function() {
			$('#confirma_nombre ').show();
		}).blur(function() {
			$('#confirma_nombre').hide();
		});

		$('#correo1').keyup(function() {
			// set password variable
			var corre = $(this).val();

			$.post( "../../controllers/validaciones", { action: "validar3",correo:corre}).done(function( data ) {
			 $("#conf_cor").html( data );

			});

		}).focus(function() {
			$('#confirma_correo').show();
		}).blur(function() {
			$('#confirma_correo').hide();
		});

		$('.base').unslider({

			keys: false,
			nav: false,
			arrows: false

		});

		$('#fecha1').datepicker({
			startDate: '-180m',
    		endDate: '+0d',
			todayBtn: false,
		             todayHighlight: true,
		        	autoclose: true,
			language: 'es',
			showOnFocus: true

		});

		$("#fecha2").datepicker("setDate", new Date());

		$('#guardia1').on('focus', function() {
				$('#rt_apellido2').focus();
				var cont_alert2 =$('.bbb').filter(function() { return $(this).val() == ""; }).size();
				//var cont_alert = $('.aaa p:contains("") ').size();

				if(cont_alert2!=0){

						$.confirm({
						    title: '¡existen campos vacios !', // hides the title.
						    cancelButton: false, // hides the cancel button.
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success',
						    content: false// hides content block.
						});						

				}else{

				$.post( "../../controllers/maliados_controller", {

					action: "add_temp1",
					sorbis: $("#s_orbis").val(),
					orbis: $("#orbis").val(),
					nombre: $("#nombre").val(),
					razon: $("#razon").val(),
					segmento: $("#segmento").val(),
					cedula: $("#cedula").val(),
					l_cedula: $("#l_cedula").val(),
					fecha1: $("#fecha1").val(),
					fecha2: $("#fecha2").val(),
					departamento: $("#departamento").val(),
					municipio: $("#municipio").val(),
					ciudad: $("#ciudad").val(),
					sector: $("#sector").val(),
					parroquia: $("#parroquia").val(),
					a_principal: $("#a_principal").val(),
					acceso1: $("#acceso1").val(),
					a_secundario: $("#a_secundario").val(),
					acceso2: $("#acceso2").val(),
					referencia: $("#referencia").val(),
					zona: $("#zona").val(),
					territorio: $("#territorio").val(),
					territorio_g: $("#territorio_g").val(),
					latitud: $("#latitud").val(),
					longitud: $("#longitud").val()

				}).done(function(data){

					var parsedJson = $.parseJSON(data);
					$(".message").html(parsedJson.mensaje);

					if(parsedJson.resultado != 'error'){

						setTimeout(function(){
							$(".alert").alert('close');
						}, 1500);

					}else{


					}


				},"json");						

					$('.base').unslider('animate:1');

				    setTimeout(function() {

				    	$('#propietario').focus();
				    	document.getElementById('izquierda').disabled = false;
				    	tick=1;

				    }, 100);					

				}	

		});

		$('#guardia2').on('focus', function() {
				$('#ls_competencia').focus();
				var cont_alert4 =$('.ccc').filter(function() { return $(this).val() == ""; }).size();
				//var cont_alert = $('.aaa p:contains("") ').size();

				if(cont_alert4!=0){

						$.confirm({
						    title: '¡existen campos vacios !', // hides the title.
						    cancelButton: false, // hides the cancel button.
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success',
						    content: false// hides content block.
						});	

				}else{

				$.post( "../../controllers/maliados_controller", {

					action: "add_temp2",
					sorbis: $("#s_orbis").val(),
					orbis: $("#orbis").val(),
					nombre: $("#nombre").val(),
					razon: $("#razon").val(),
					segmento: $("#segmento").val(),
					cedula: $("#cedula").val(),
					l_cedula: $("#l_cedula").val(),
					fecha1: $("#fecha1").val(),
					fecha2: $("#fecha2").val(),
					departamento: $("#departamento").val(),
					municipio: $("#municipio").val(),
					ciudad: $("#ciudad").val(),
					sector: $("#sector").val(),
					parroquia: $("#parroquia").val(),
					a_principal: $("#a_principal").val(),
					acceso1: $("#acceso1").val(),
					a_secundario: $("#a_secundario").val(),
					acceso2: $("#acceso2").val(),
					referencia: $("#referencia").val(),
					zona: $("#zona").val(),
					territorio: $("#territorio").val(),
					territorio_g: $("#territorio_g").val(),
					latitud: $("#latitud").val(),
					longitud: $("#longitud").val(),
					propietario: $("#propietario").val(),
					tele1: $("#tele1").val(),
					tele2: $("#tele2").val(),
					correo1: $("#correo1").val(),
					dias: $("#dias").val(),
					caja_t: $("#caja_t").val(),
					caja_p: $("#caja_p").val(),
					caja_o: $("#caja_o").val(),
					despacho: $("#despacho").val(),
					descuento: $("#descuento").val(),
					seca: $("#seca").val(),
					rf_competencia: $("#rf_competencia").val(),
					ls_competencia: $("#ls_competencia").val()

				}).done(function(data){

					var parsedJson = $.parseJSON(data);
					$(".message").html(parsedJson.mensaje);
					
					if(parsedJson.resultado != 'error'){
					
						setTimeout(function(){
							$(".alert").alert('close');
						}, 1500);

					}else{


					}

				},"json");	
					$('.base').unslider('animate:2');
				    setTimeout(function() {


				    	$('#toldo').focus();
				    	document.getElementById('derecha').disabled = true;
				    	tick=2;

				    }, 100);					

				}

		});

		$('#dias').multiselect({

			enableClickableOptGroups: true,
			enableCollapsibleOptGroups: false,
			maxHeight: 180,
			inheritClass: true,
			nonSelectedText: 'Seleccione días de visita',
			buttonWidth: '100%'

		});

		$('#toldo').multiselect({

			enableClickableOptGroups: true,
			enableCollapsibleOptGroups: false,

			 onChange: function(element, checked, option){
            			 	//var toldor = $('#toldo').val();
            			 	var este =(element.val());
				if(checked === true) {

					if(este==0 || este==1 || este==2 || este==3){
						 $('#toldo').multiselect('deselect', ['4']);
					}else if(este==4){
						 $('#toldo').multiselect('deselect', ['0','1','2','3' ]);
					}
				}else if(checked === false){

					if(este==4){

						$('#toldo').multiselect('select', ['4']);		
				
					}

				}
			 		var selectedOptions = $('#toldo option:selected');	
					if (selectedOptions.length < 1) {
						$('#toldo').multiselect('select', ['4']);
					}	
				
			},

			maxHeight: 180,
			inheritClass: true,
			nonSelectedText: 'Indique presencia de toldos',
			buttonWidth: '100%'

		});

		$('#aviso').multiselect({

			enableClickableOptGroups: true,
			enableCollapsibleOptGroups: false,

			 onChange: function(element, checked, option){
            			 	//var toldor = $('#toldo').val();
            			 	var este =(element.val());
				if(checked === true) {

					if(este==0 || este==1 || este==2 || este==3 ){
						 $('#aviso').multiselect('deselect', ['4']);
					}else if(este==4){
						 $('#aviso').multiselect('deselect', ['0','1','2','3' ]);
					}

				}else if(checked === false){

					if(este==4){

						$('#aviso').multiselect('select', ['4']);		
				
					}

				}
			 		var selectedOptions = $('#aviso option:selected');	
					if (selectedOptions.length < 1) {
						$('#aviso').multiselect('select', ['4']);
					}
			},

			maxHeight: 180,
			inheritClass: true,
			nonSelectedText: 'Indique presencia de  avisos',
			buttonWidth: '100%'

		});

		$('#fachada').multiselect({

			enableClickableOptGroups: true,
			enableCollapsibleOptGroups: false,

			 onChange: function(element, checked, option){
            			 	//var toldor = $('#toldo').val();
            			 	var este =(element.val());
				if(checked === true) {

					if(este==0 || este==1 || este==2 || este==3){
						 $('#fachada').multiselect('deselect', ['4']);
					}else if(este==4){
						 $('#fachada').multiselect('deselect', ['0','1','2','3' ]);
					}
				}else if(checked === false){

					if(este==4){

						$('#fachada').multiselect('select', ['4']);		
				
					}

				}
			 		var selectedOptions = $('#fachada option:selected');	
					if (selectedOptions.length < 1) {
						$('#fachada').multiselect('select', ['4']);
					}	
				
			},

			maxHeight: 180,
			inheritClass: true,
			nonSelectedText: 'Indique presencia de fachadas',
			buttonWidth: '100%'

		});

		$('#activo').multiselect({

			enableClickableOptGroups: true,
			enableCollapsibleOptGroups: false,
	
			onChange: function(element, checked, option) {
					var selecto=(element.val());
				if(checked === true) {

					if(/*selecto==0 || */selecto==1 || selecto==2 || selecto==3){
						 
						 $('#activo').multiselect('deselect', ['4']);
							
							/*if(selecto==0){

								$('#modal1').modal({backdrop: 'static',keyboard: false});
								//document.getElementById('oculto').style.display = 'block';
							}*/

					}else if(selecto==4){

						 $('#activo').multiselect('deselect', [/*'0',*/'1','2','3' ]);

					}


				}else if(checked === false){

					if(selecto==4){

						$('#activo').multiselect('select', ['4']);		
				
					}

				}
			 		var selectedOptions = $('#activo option:selected');	
					if (selectedOptions.length < 1) {
						$('#activo').multiselect('select', ['4']);
					}
			},

			maxHeight: 180,
			inheritClass: true,
			nonSelectedText: 'Indique presencia de otras neveras',
			buttonWidth: '100%'

		});

		// ********************************************************************************************
		/*$("#cancelar" ).click(function() {

						$.confirm({
						    title: '¡Esta acción lo llevará al inicio del formulario y borrará los datos no registrados!.¿Desea continuar?',
						    content:false,
						    confirmButton: 'Si',
						    cancelButton: 'No',
						    confirmButtonClass: 'btn-primary',
    						    cancelButtonClass: 'btn-success',

						    confirm: function(){

								$.post( "../../controllers/maliados_controller", {action: "del_temp"}).done(function(data){},"json");

								$('.base').unslider('animate:0');
								$('#orbis').focus();

						    	setTimeout(function(){

						                  $(location).attr('href','../aliados/frm_registrar');
                  
						        }, 1500);
							},

						    cancel: function(){

							}
						});			

		});*/

		$("#exit" ).click(function() {

						$.confirm({
						    title: '¡Esta acción lo llevará al listado de aliados comerciales y borrará los datos no registrados!.¿Desea continuar?',
						    content:false,
						    confirmButton: 'Si',
						    cancelButton: 'No',
						    confirmButtonClass: 'btn-primary',
    						    cancelButtonClass: 'btn-success',

						    confirm: function(){

								$.post( "../../controllers/maliados_controller", {action: "del_temp"}).done(function(data){},"json");

						    	setTimeout(function(){

						                  $(location).attr('href','../aliados/');
                  
						        }, 1000);
							},

						    cancel: function(){

							}
						});				
			
		});

		// ********************************************************************************************

		$("#descu" ).change(function() {

			if( $('#descu').prop('checked')== true ) {

			   	document.getElementById("descuento").disabled = false;
			   	$("#descuento").val(1);
			   	$('#descuento option[value=0]').attr("disabled", true);

			}else{

			 	document.getElementById("descuento").disabled = true;
			 	$("#descuento").val(0);
			}

		});

		$("#a_propio" ).change(function() {

			if( $('#a_propio').prop('checked')== true ) {

			   	 $("#lab_propio").val(1);
			   	 $('#modal1').modal({backdrop: 'static',keyboard: false});
			   	
			}else{

			 	$("#lab_propio").val(0);
			}

		});


									var table = $('#tabla').dataTable({
										  	
										  //"destroy": true,

										  "ajax": {
											"url": "../../data_json/data_mactivos",
											"dataSrc": ""
										  },
										  "columns": [
												{ "data": "cid" },
												{ "data": "marca" },
												{ "data": "modelo" },
												{ "data": "serial" },
												{ "data": "activo" },
												{ "data": "comodato" }
											],
										//"order": [[ 0, "asc" ]],
										"bPaginate": false,
										
										"info":     false,
										"bFilter": false

										  //"aoColumnDefs": [{ "bVisible": false, "aTargets": [0] }]
									});


							$('#tabla tbody').on( 'click', 'tr', function () {

								if ( $(this).hasClass('selected') ) {
									$(this).removeClass('selected');
								}
								else {
									table.$('tr.selected').removeClass('selected');
									$(this).addClass('selected');
								}
							});


		$("#close1").click(function() {

				$.post( "../../controllers/mactivos_controller", {

					action: "temporal",
					marca: $('#a_marca').val(),
					modelo: $('#a_modelo').val(),
					serial: $('#a_serial').val(),
					activo: $('#a_activo_f').val(),
					comodato: $('#a_comodato').val(),
					distribuidora: $('#distribuidora').val()

				}).done(function(data){

					var parsedJson = $.parseJSON(data);
					$(".message1").html(parsedJson.mensaje);

					if(parsedJson.resultado != 'error'){

						document.getElementById("a_propio").disabled = true;

					    setTimeout(function(){

							$.post( "../../controllers/mmarcas_controller", { action: "get_marcas"}).done(function( data ) {
								 $("#a_marca" ).html( data );

							});

							$("#a_modelo").val(null);
							$("#a_serial").val(null);
							$("#a_activo_f").val(null);
							$("#a_comodato").val(null);
							//$("#distribuidora").val(null);

if(document.getElementById('oculto').style.display == 'block'){

	$('#tabla').DataTable().ajax.reload();

}else{				
	$('#tabla').DataTable().ajax.reload();
	document.getElementById('oculto').style.display = 'block';
}
						

 							$(".alert").alert('close');
					      	$('#modal1').modal('toggle');

					    }, 3000);

					}else{

					}

				},"json");
		    //$('#activo').focus();

		});

			$('#quitar').click( function () {

				var value= table.$('tr.selected').children('td:first').text();
				if(!value){

						$.alert({
						    title: '!Seleccione el activo a desincorporar!',
						    content: false,
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success'
						});

				}else{

						$.confirm({

								    title: '¿Desea desincorporar este activo?!',
								    content:false,
								    confirmButton: 'Si',
								    cancelButton: 'No',
								    confirmButtonClass: 'btn-primary',
		    						    cancelButtonClass: 'btn-success',

						    		confirm: function(){

										$.post( "../../controllers/mactivos_controller", { action: "delete",record:value}).done(function( data ) {
											//$(".message").html(data);
											var parsedJson = $.parseJSON(data);
											$(".message").html(parsedJson.mensaje);

									    	setTimeout(function(){

												$(".alert").alert('close');
												//$('#tabla').dataTable();
												 

													  	$.post( "../../controllers/mactivos_controller", { action: "search_act"}).done(function( data ) {
																
																var parsedJson = $.parseJSON(data);

																		if(parsedJson == 'si'){
																		
																			$('#tabla').DataTable().ajax.reload();
																				
																		

																		}else{
					      													document.getElementById('oculto').style.display = 'none';
																			document.getElementById("a_propio").checked = false;
																			document.getElementById("a_propio").disabled = false;
																			$("#lab_propio").val(0);

																		}

														},"json");	

									        }, 3000);
										});		

									},

								 	cancel: function(){

									}
						});

				}
			});		

		$("#cancelar2").click(function() {

			$('#modal1').modal('toggle');
		$.post( "../../controllers/mmarcas_controller", { action: "get_marcas"}).done(function( data ) {
			 $("#a_marca" ).html( data );

		});
			$("#a_modelo").val(null);
			$("#a_serial").val(null);
			$("#a_activo_f").val(null);
			$("#a_comodato").val(null);
			//se debe comprobar si existe registro de activo, si no lo hay, a_propio se mantiene cheked.
			  	$.post( "../../controllers/mactivos_controller", { action: "search_act"}).done(function( data ) {
						
						var parsedJson = $.parseJSON(data);

								if(parsedJson == 'si'){

									

								}else{

									document.getElementById("a_propio").checked = false;
									$("#lab_propio").val(0);

								}

				},"json");

		});

		$("#cancelar3").click(function() {

			$('#modal2').modal('toggle');
			//map.closePopup();
			map.remove();
			//document.getElementById('weathermap').innerHTML = "<div class='custom-popup' id='map' style='height: 440px; border: 1px solid #AAA;'></div>";
			$('#latitud').focus();

		});

		$("#agregar").click(function() {
			$('#modal1').modal({backdrop: 'static',keyboard: false});
			
		});

// para consultar y cargar los datos geograficos ***********************************************************

		$.post( "../../controllers/mgeograficas_controller", { action: "get_departamentos"}).done(function( data ) {
			 $("#departamento" ).html( data );

		});

		$.post( "../../controllers/mgeograficas_controller", { action: "get_municipios"}).done(function( data ) {
			 $("#municipio" ).html( data );

		});

		$.post( "../../controllers/mgeograficas_controller", { action: "get_parroquias"}).done(function( data ) {
			 $("#parroquia" ).html( data );

		});				

		$.post( "../../controllers/mgeograficas_controller", { action: "get_ciudad"}).done(function( data ) {
			 $("#ciudad" ).html( data );

		});	

		$('#departamento').change(function(event) {
			
				$.post( "../../controllers/mgeograficas_controller", { action: "get_municipios",departamento: $("#departamento").val()}).done(function( data ) {
					 $("#municipio" ).html( data );

				});


				$.post( "../../controllers/mgeograficas_controller", { action: "get_parroquias"}).done(function( data ) {
					 $("#parroquia" ).html( data );

				});				

				$.post( "../../controllers/mgeograficas_controller", { action: "get_ciudad"}).done(function( data ) {
					 $("#ciudad" ).html( data );

				});					

		});


		$('#municipio').change(function(event) {
			
				$.post( "../../controllers/mgeograficas_controller", { action: "get_parroquias",municipio: $("#municipio").val()}).done(function( data ) {
					 $("#parroquia" ).html( data );

				});

				$.post( "../../controllers/mgeograficas_controller", { action: "get_ciudad"}).done(function( data ) {
					 $("#ciudad" ).html( data );

				});	

		});

		$('#parroquia').change(function(event) {

				$.post( "../../controllers/mgeograficas_controller", { action: "get_ciudad",municipio: $("#municipio").val(),parroquia: $("#parroquia").val()}).done(function( data ) {
					 $("#ciudad" ).html( data );
					// $("#lata" ).val( parsedJson.lata );
					// $("#longa" ).val( parsedJson.longa );

				});

				

		});

		$('#ciudad').change(function(event) {

				$.post( "../../controllers/mgeograficas_controller", { action: "get_coordenadas",ciudad:$("#ciudad").val()}).done(function( data ) {
					 var parsedJson = $.parseJSON(data);

					 $("#lata").val(parsedJson.lata);
					 $("#longa").val(parsedJson.longa);
					 

				});	
		});

// para consultar y cargar los segmentos ***********************************************************
		$.post( "../../controllers/msegmentos_controller", { action: "get_segmentos"}).done(function( data ) {
			 $("#segmento" ).html( data );

		});

// para consultar y cargar los territorios ***********************************************************

//alert($('#distribuidora').val());
		$.post( "../../controllers/mterritorios_controller", { action: "get_territorios",modulo: $("#zona").val(),distribuidora: $("#distribuidora").val()}).done(function( data ) {
			 $("#territorio_g" ).html( data );

		});

		$('#zona').change(function(event) {
			
					$.post( "../../controllers/mterritorios_controller", { action: "get_territorios",modulo: $("#zona").val(),distribuidora: $("#distribuidora").val()}).done(function( data ) {
					 $("#territorio_g" ).html( data );

				});
		});

		$.post( "../../controllers/mterritorios_controller", { action: "get_gterritorios",distribuidoras: $("#distribuidora").val()}).done(function( data ) {
			 $("#territorio" ).html( data );

		});

		$.post( "../../controllers/mmarcas_controller", { action: "get_marcas"}).done(function( data ) {
			 $("#a_marca" ).html( data );

		});

		/*$.post( "../../controllers/mdistribuidoras_controller", { action: "get_distri"}).done(function( data ) {
			 $("#distribuidora" ).html( data );

		});*/

		$.post( "../../controllers/mregiones_controller", { action: "get_regi",distribuidora:<?php echo intval($_SESSION['distribuidora']); ?>}).done(function( data ) {
			 $("#region" ).html( data );

		});

		//** enviar los datos al controlador ***********************************************************
		$("#save" ).click(function() {

				poten = $("#orbis").val();

/*alert($('#distribuidora').val());

if($('#distribuidora').val()== 0){
	alert('ES PROGRAMADOR');
}*/
//alert($('#fecha1').val());

				$.post( "../../controllers/maliados_controller", {

					action: "add",
					caso: "0",
					sorbis: $("#s_orbis").val(),
					orbis: poten,
					nombre: $("#nombre").val(),
					razon: $("#razon").val(),
					segmento: $("#segmento").val(),
					cedula: $("#cedula").val(),
					l_cedula: $("#l_cedula").val(),
					fecha1: $("#fecha1").val(),
					fecha2: $("#fecha2").val(),
					departamento: $("#departamento").val(),
					municipio: $("#municipio").val(),
					ciudad: $("#ciudad").val(),
					sector: $("#sector").val(),
					parroquia: $("#parroquia").val(),
					a_principal: $("#a_principal").val(),
					acceso1: $("#acceso1").val(),
					a_secundario: $("#a_secundario").val(),
					acceso2: $("#acceso2").val(),
					referencia: $("#referencia").val(),
					zona: $("#zona").val(),
					territorio: $("#territorio").val(),
					territorio_g: $("#territorio_g").val(),
					latitud: $("#latitud").val(),
					longitud: $("#longitud").val(),

					propietario: $("#propietario").val(),
					tele1: $("#tele1").val(),
					tele2: $("#tele2").val(),
					correo1: $("#correo1").val(),
					dias: $("#dias").val(),
					caja_t: $("#caja_t").val(),
					caja_p: $("#caja_p").val(),
					caja_o: $("#caja_o").val(),
					despacho: $("#despacho").val(),
					descuento: $("#descuento").val(),
					seca: $("#seca").val(),
					rf_competencia: $("#rf_competencia").val(),
					ls_competencia: $("#ls_competencia").val(),

					toldo: $("#toldo").val(),
					aviso: $("#aviso").val(),
					fachada: $("#fachada").val(),
					activo: $("#activo").val(),
					observacion: $("#observacion").val(),
					distribuidora: $("#distribuidora").val(),
					region: $("#region").val()

				}).done(function(data){

					var parsedJson = $.parseJSON(data);
					$(".message").html(parsedJson.mensaje);

					switch(parsedJson.deslizador){

						case "1":
							$('.base').unslider('animate:0');
							tick=0;
							document.getElementById('izquierda').disabled = true;
							document.getElementById('derecha').disabled = false;
						break;

						case "2":
							$('.base').unslider('animate:1');
							tick=1;
							document.getElementById('izquierda').disabled = false;
							document.getElementById('derecha').disabled = false;
						break;

					}

					if(parsedJson.resultado != 'error'){

					$.post( "../../controllers/mactivos_controller", { action: "definitivo2",recordado:$("#cedula").val(),l_recordado:$("#l_cedula").val(),l_orbis:$("#orbis").val() }).done(function( data ) {

					});

						$('.base').unslider('animate:0');

					    	setTimeout(function(){

					                  //$(location).attr('href','../aliados/frm_registrar');
					                  $('#sorbis').focus();

					              }, 3000);

					}

				},"json");

		});//end save


//################################  VALIDACIONES############################################



//############################################################################

function cajas_obj(){

	var totales=document.getElementById('caja_t').value;
	var propias=document.getElementById('caja_p').value;
	var objetivo= totales-propias;

	document.getElementById('caja_o').value=objetivo;
}


function menor(){
	var totales2=document.getElementById('caja_t').value;
	var propias2=document.getElementById('caja_p').value;

		if(propias2 <= totales2){


		}else{

			document.getElementById('ms_caja_p').innerHTML = 'Debe ser menor o igual a "Total de Cajas"';

		}
}
//################################  VALIDACIONES############################################

          //****longitud de campos********************************************

	$(function(){

	              $('#orbis').maxLength(17);$('#nombre').maxLength(99);$('#razon').maxLength(99);$('#cedula').maxLength(11);
	              $('#acceso1').maxLength(99);$('#acceso2').maxLength(99);$('#referencia').maxLength(99);$('#propietario').maxLength(50);
	              $('#latitud').maxLength(10);$('#longitud').maxLength(11);$('#tele2').maxLength(15);$('#tele1').maxLength(15);
	              $('#correo1').maxLength(99);$('#caja_t').maxLength(7);$('#caja_p').maxLength(7);
	              $('#seca').maxLength(99);$('#rf_competencia').maxLength(99);$('#ls_competencia').maxLength(99);$('#observacion').maxLength(99);
	              $('#a_modelo').maxLength(20);$('#a_serial').maxLength(20);$('#a_activo_f').maxLength(12);$('#a_comodato').maxLength(11);
	});

            function alsaliro4(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 4){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 4 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsaliro(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 5){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 5 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsalira(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 6){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 6 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsalira2(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 9){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 9 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsalira3(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 9){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 9 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsalir(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 2){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 2 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsalir2(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 12){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 12 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

             function alsalir3(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 13){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 13 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

              function alsalir4(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 1){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 1 número';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }



function esnombre(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_nombre').style.display = 'block';
                       	document.getElementById("ms_nombre").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_nombre").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esrazon(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_razon').style.display = 'block';
                       	document.getElementById("ms_razon").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_razon").innerHTML = '';
                       	return patron.test(n);

                    }

}

function escedula(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_cedula').style.display = 'block';
                       	document.getElementById("ms_cedula").innerHTML = 'El RIF/CEDULA inicia con "J","P","V","E" o "G"';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_cedula").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esacceso(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_acceso1').style.display = 'block';
                       	document.getElementById("ms_acceso1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_acceso1").innerHTML = '';
                       	return patron.test(n);

                    }

}


function esacceso1(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_acceso2').style.display = 'block';
                       	document.getElementById("ms_acceso2").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_acceso2").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esreferencia(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_referencia').style.display = 'block';
                       	document.getElementById("ms_referencia").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_referencia").innerHTML = '';
                       	return patron.test(n);

                    }

}

function eslatitud(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_latitud').style.display = 'block';
                       	document.getElementById("ms_latitud").innerHTML = 'Utilice el formato "00.000000"';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_latitud").innerHTML = '';
                       	return patron.test(n);

                    }

}

function eslongitud(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_longitud').style.display = 'block';
                       	document.getElementById("ms_longitud").innerHTML = 'Utilice el formato "-00.000000"';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_longitud").innerHTML = '';
                       	return patron.test(n);

                    }

}

function espropietario(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-\']$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_propietario').style.display = 'block';
                       	document.getElementById("ms_propietario").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_propietario").innerHTML = '';
                       	return patron.test(n);

                    }

}

function estele1(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[0-9\-\(\)]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_tele1').style.display = 'block';
                       	document.getElementById("ms_tele1").innerHTML = 'Use solo números y "-"';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_tele1").innerHTML = '';
                       	return patron.test(n);

                    }

}

function estele2(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[0-9\-\(\)]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_tele2').style.display = 'block';
                       	document.getElementById("ms_tele2").innerHTML = 'Use solo números y "-"';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_tele2").innerHTML = '';
                       	return patron.test(n);

                    }

}

function estele2(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[0-9\-\(\)]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_tele2').style.display = 'block';
                       	document.getElementById("ms_tele2").innerHTML = 'Use solo números y "-"';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_tele2").innerHTML = '';
                       	return patron.test(n);

                    }

}

function escorreo(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[A-ZÑ0-9\_\-\.\+\@\ ]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_correo1').style.display = 'block';
                       	document.getElementById("ms_correo1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_correo1").innerHTML = '';
                       	return patron.test(n);

                    }

}

function escajat(e) {


	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[0-9]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_caja_t').style.display = 'block';
                       	document.getElementById("ms_caja_t").innerHTML = 'Use solo números';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_caja_t").innerHTML = '';
                       	return patron.test(n);

                    }

}

function escajap(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[0-9]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_caja_p').style.display = 'block';
                       	document.getElementById("ms_caja_p").innerHTML = 'Use solo números';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_caja_p").innerHTML = '';
                       	return patron.test(n);

                    }

}

function eslineaseca(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_seca').style.display = 'block';
                       	document.getElementById("ms_seca").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_seca").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esrefcomp(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_rf_competencia').style.display = 'block';
                       	document.getElementById("ms_rf_competencia").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_rf_competencia").innerHTML = '';
                       	return patron.test(n);

                    }

}

function eslineasecomp(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_ls_competencia').style.display = 'block';
                       	document.getElementById("ms_ls_competencia").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_ls_competencia").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esobservacion(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_observacion').style.display = 'block';
                       	document.getElementById("ms_observacion").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_observacion").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esa_modelo(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_a_modelo').style.display = 'block';
                       	document.getElementById("ms_a_modelo").innerHTML = 'Use mayusculas y no incluya caractéres especiales ni espacios';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_a_modelo").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esa_serial(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_a_serial').style.display = 'block';
                       	document.getElementById("ms_a_serial").innerHTML = 'Use mayusculas y no incluya caractéres especiales ni espacios';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_a_serial").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esa_comodato(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9\.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_a_comodato').style.display = 'block';
                       	document.getElementById("ms_a_comodato").innerHTML = 'Use solo números y no incluya caractéres especiales ni espacios';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_a_comodato").innerHTML = '';
                       	return patron.test(n);

                    }

}


function sig_1(){

	var vuelta=document.getElementById("caja_p");
	vuelta.focus();

}



function sig_2(){

	var vuelta33=document.getElementById("aviso");
	vuelta33.focus();

}

//************************************************************************/

	        function esnombre2(v) {
              var caso2=document.getElementById('rt_nombre1').value;
             if(caso2.length < 6){
            	document.getElementById('ms_rt_nombre1').innerHTML = 'Debe escribir al menos 6 caractéres';
             }else{
                 var texto2 = v.split(" ");
                 var n_palabras = texto2.length;
                 if(n_palabras <= 1 ){
                    document.getElementById("ms_rt_nombre1").innerHTML = '';
                    
                 }else{
                 	document.getElementById("ms_rt_nombre1").innerHTML = '¡Ingrese solo el primer nombre)';
                 	
                 
        		}//end else
			 }
		}

//************************************************************************/

function esnombre3(v) {
              var caso2=document.getElementById('rt_nombre2').value;
             if(caso2.length < 6){
            	document.getElementById('ms_rt_nombre2').innerHTML = 'Debe escribir al menos 6 caractéres';
             }else{
                 var texto2 = v.split(" ");
                 var n_palabras = texto2.length;
                 if(n_palabras  <= 1 ){
                    document.getElementById("ms_rt_nombre2").innerHTML = '';
                    
                 }else{
                 	document.getElementById("ms_rt_nombre2").innerHTML = '¡Ingrese solo el segundo nombre';
                 	
                 
        		}//end else
			 }
		}

//************************************************************************/

 </script>
 <?php include_once("../layouts/pie.php") ?>