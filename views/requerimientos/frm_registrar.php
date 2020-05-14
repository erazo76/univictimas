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

			<!--<div class="col-md-4">
				<div class="box-header with-border" tabindex="-1">
					 	<h3 class="box-title">Información General del Evento</h3>
				</div> 
			</div>-->

			<div class="col-md-4">
				<div class="box-header with-border" tabindex="-1">
					 	<h3 class="box-title">Información General del Evento</h3>
				</div><!-- /.box-header -->
		  		<div class="box box-primary">
						<input type="hidden" id="distribuidora" value="<?php echo intval($_SESSION['distribuidora']); ?>">
						<input type="hidden" id="region" value="<?php echo intval($_SESSION['region']); ?>">
						<input type="hidden" id="lata" value=6.12>
						<input type="hidden" id="longa" value=-67.39>
						<input type="hidden" id="ideado">
						<input type="hidden" id="trans" value=0>
						<input type="hidden" id="aloja" value=0>
						<input type="hidden" id="arutaval" value=0>
						<input type="hidden" id="apircval" value=0>
						<input type="hidden" id="tipo1" value=0>
						<input type="hidden" id="tipo2" value=0>
						<input type="hidden" id="tipo3" value=0>
						<input type="hidden" id="tipo4" value=0>
						
						<div class="box-body">

						 	<div class="form-group-sm">
							  <label for="n_accion">Nro. de Evento</label>
							  <input type="text" class="form-control bbb" id="n_accion" placeholder="Indique numero de evento"  onpaste="return false" tabindex="1" disabled>
							</div>

							<div class="form-group-sm">
							  <label for="nombre">Nombre del Evento</label>
							  <input type="text" class="form-control bbb" id="nombre" placeholder="Ingrese nombre de la actividad"  onpaste="return false" tabindex="2" onkeypress="return esnombre(event);"  onblur="alsalir(this.id)"  autocomplete="off" >
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_nombre' class="aaa"><p></p></div>
							</div>

							<div class="form-group-sm">
							  <label for="fecha1">Fecha de Solicitud</label>
							  <input class="form-control bbb" id="fecha1" data-date-format="dd-mm-yyyy" placeholder="dia-mes-año" type="text" onpaste="return false" tabindex="3" disabled="true">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_fecha1' class="aaa"><p></p></div>
							</div>

							<div class="form-group-sm">
								<label>Dirección Territorial</label>
								<select name="depar" id="departamento" class="form-control bbb" tabindex="4">
								<option></option>
								</select>
							</div>

							<div class="form-group-sm">
							  <label for="depa">Departamento</label>
							  <input type="text" class="form-control bbb" id="depa" placeholder="Departamento"  onpaste="return false" tabindex="5" disabled="true">
							</div>

							<div class="form-group-sm">
								<label>Municipio</label>
								<select id="municipio" class="form-control bbb" tabindex="6">
								<option></option>
								</select>
							</div>

							<div class="form-group-sm">
								<label>Centro Poblado</label>
								<select id="cpoblado" class="form-control bbb" tabindex="7">
								<option></option>
								</select>
							</div>



					</div>
						 
		  		</div>

			</div>

		  <div class="col-md-4">

		  	<div class="box-header with-border" tabindex="-1">
				<h3 class="box-title">Ubicación del Evento</h3>
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
								
						

								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-slack"></span></span>
									<input type="text" id="acceso2" class="form-control bbb" placeholder="Secundario"  onpaste="return false" tabindex="10" onkeypress="return esacceso1(event);" onblur="alsalir(this.id)">
									<span class="input-group-btn" tabindex="-1" style="width:0px;"></span>
									<span class="input-group-addon"><span class="fa fa-minus"></span></span>
									<span><input type="text" id="num_dir" class="form-control bbb" placeholder="Numero"  onpaste="return false" tabindex="11" onkeypress="return esnumdir(event);" onblur="alsalir(this.id)">
										
								</div>
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_acceso1' class="aaa"><p></p></div>
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
					<h3 class="box-title">Inicio y Final del Evento</h3>
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
							
								<label for="fecha3">Fecha Final</label>
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
					<h3 class="box-title">Responsable del Evento</h3>
				</div><!-- /.box-header -->	

				<div class="box box-primary">

					<div class="box-body">
						<label>Nombres</label>
						<div class="input-group">
							<input type="text" class="form-control bbb" id="rt_nombre1" placeholder="Primer nombre"  onpaste="return false" tabindex="18" onkeypress="return esnombre2(event);"  onblur="alsalir(this.id)"  autocomplete="off">
							<span class="input-group-btn" tabindex="-1" style="width:0px;"></span>
							<input type="text" class="form-control" id="rt_nombre2" placeholder="Segundo nombre"  onpaste="return false" tabindex="19" onkeypress="return esnombre2(event);"   autocomplete="off">
						</div>
						<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_rt_nombre1' class="aaa"><p></p></div>
						
						<label>Apellidos</label>
						<div class="input-group">
							<input type="text" class="form-control bbb" id="rt_apellido1" placeholder="Primer apellido"  onpaste="return false" tabindex="20" onkeypress="return esapellido1(event);" onblur="alsalir(this.id)" autocomplete="off">
							<span class="input-group-btn" tabindex="-1" style="width:0px;"></span>
							<input type="text" class="form-control" id="rt_apellido2" placeholder="Segundo apellido"  onpaste="return false" tabindex="21" onkeypress="return esapellido1(event);" autocomplete="off" >
						</div>
						<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_rt_apellido1' class="aaa"><p></p></div>
													
						<div class="form-group-sm">
							<label >Documento de Identidad</label>
								<div class = "input-group">

									<span class="input-group-btn">
										<select id="rt_tdoc" class="btn-sm"  tabindex="22"  >
											<option value="0">CC</option>
											<option value="1">CE</option>
											<option value="2">PA</option>
										</select>
									</span>

									<input type="text" class="form-control bbb" id="rt_num_doc" placeholder="Ingrese el numero del documento"  onpaste="return false" tabindex="23" onkeypress="return escedula1(event);" onblur="alsalira(this.id)" autocomplete="off">
								</div>
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_rt_num_doc' class="aaa"><p></p></div>
						</div>	

						<div class="form-group-sm">
						<label for="tele1">Teléfono de contacto</label>
						<input type="text" class="form-control bbb" id="tele1" placeholder="Ingrese un número telefónico"  onpaste="return false" tabindex="24" onkeypress="return estele1(event);" onblur="alsalir2(this.id)" autocomplete="off">
						<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_tele1' class="aaa"></div>
						</div>

							<div id="confirma_telefono">
								<ul><li id="conf_tel" style="color:#fff;text-align:center" ></li></ul>
							</div>

						<div class="form-group-sm">
						<label for="correo1">Correo electrónico</label>
						<input type="text" class="form-control bbb" id="correo1" placeholder="Ingrese un correo electrónico"  onpaste="return false" tabindex="25" onkeypress="return escorreo1(event);" onblur="alsalir2(this.id)" autocomplete="off">
						<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_correo1' class="aaa"></div>
						</div>

							<div id="confirma_correo">
								<ul><li id="conf_cor" style="color:#fff;text-align:center" ></li></ul>
							</div>
							
							<div class="form-group-sm">
								<label>Grupo/Área/Equipo/Dependencia</label>
								<select id="grupo" class="form-control bbb" tabindex="35">
								<option></option>
								</select>
							</div>

							<div class="focusguard" id="guardia1" tabindex="36"></div>							
					</div>
				</div>
			</div>
		</li>

		<li id="dos"> <!--################################## INFORMACIÓN RELACIONADA CON EL TIPO DE ACTIVIDAD ##################################  -->

			<div class="col-md-4">

				<div class="box-header with-border">
					 	<h3 class="box-title">Tipo de Actividad</h3>
				</div><!-- /.box-header -->

		  		<div class="box box-primary">
						<!-- form start -->
						<div class="box-body" >
						<div class="box-body" style="border-width:1px;border-style:solid; border-color: #ecf0f5;">
							<div class="form-group-sm" >
								<label id="guardia78" tabindex="0" >INDIVIDUAL</label></br>
								<select id="tipo1" class="form-control" tabindex="0">
									<option value="0" selected disabled hidden>Indique si el evento corresponde a:</option>
									<option value="1">Jornada Diferencial</option>
									<option value="2">Feria de Servicios</option>
									<option value="3">Conmemoración</option>
									<option value="4">Iniciativa Local de Memoria</option>
									<option value="5">Acto de Reconocimiento</option>
									<option value="6">Orden Judicial</option>
									<option value="7">Taller por Linea de Inversion</option>
									<option value="8">Entrega digna de cadáveres</option>
									<option value="9">Charla de educación financiera </option>	
									<option value="10">Otro</option>								
								</select>
								
							</div>
								<div id="otro1a" style='display:none;'>
								<div class="form-group-sm">								
									<label for="Otro1">Otro</label>
							  		<input type="text" class="form-control" id="otro1" placeholder="Indique otro tipo de actividad"  onpaste="return false" tabindex="0" onkeypress="return esotro1(event);" onblur="return alsalir(this.id)" autocomplete="off">
							  		<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_otro1' ></div>
								</div>
							</div>
						</div>
						<div class="box-body" style="border-width:1px;border-style:solid; border-color: #ecf0f5;">
							<div class="form-group-sm">
								<label class="guardia80" tabindex="0">RETORNOS Y REUBICACIONES</label></br>
								<select id="tipo2" class="form-control"  tabindex="0">
									<option value="" selected disabled hidden>Indique si el evento corresponde a:</option>
									<option value="0">Integración Comunitaria</option>
									<option value="1">Retorno</option>
									<option value="2">Reubicacion</option>
									<option value="3">Esquemas Especiales de Acompañamiento</option>
									<option value="4">Casos Emblemáticos</option>
									<option value="5">Seguimiento procesos Retornos y Reubicaciones</option>
								</select>
							</div>
						</div>	
						<div class="box-body" style="border-width:1px;border-style:solid; border-color: #ecf0f5;">
							<label>COLECTIVA</label></br>
						<div class="box-body" style="border-width:1px;border-style:solid; border-color: #bdd3ff; background-color: #E8F0FF">	
							<div class="form-group-sm">

								<label>Pertenencia étnica comunitaria</label></br>

								<select id="tipo3" class="form-control" tabindex="0">
									<option value="0" selected disabled hidden>Indique el sujeto "no étnico" </option>
									<option value="1">Comunidad</option>
									<option value="2">Comunidad Campesina</option>
									<option value="3">Grupo</option>
									<option value="4">Organizaciones</option>
									<option value="5">Organización de Mujeres</option>
								</select>

								<select id="tipo4" class="form-control" tabindex="0">
									<option value="0" selected disabled hidden>Indique el sujeto "étnico" </option>
									<option value="1">Indígena</option>
									<option value="2">Ancestral</option>
									<option value="3">RROM o Gitano</option>
									<option value="4">Afrocolombiana</option>
									<option value="5">Negra</option>
								</select>								
							</div>

						    <div class="form-group-sm">
							  <label>Actividad de ruta</label>
	                            <div class = "input-group">
								      <span class = "input-group-addon">
	                                     <input type = "checkbox" tabindex="0" id="aruta">
									  </span>
									  <input type="text" class="form-control " id="afase" placeholder="Indique la fase en que se ecuentra"  onpaste="return false" tabindex="0" onkeypress="return esafase(event);" onblur="return alsalir(this.id);" disabled>
								</div>
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_afase' ></div>
							</div>
						</div>
						<div class="box-body" style="border-width:1px;border-style:solid; border-color: #bdd3ff; background-color: #E8F0FF">
							<label>ID del Sujeto de Reparación</label></br>
						    <div class="form-group-sm">
							  <label>Implementación del PIRC aprobado</label>
	                            <div class = "input-group">
								      <span class = "input-group-addon">
	                                     <input type = "checkbox" tabindex="0" id="apirc">
									  </span>
									  <input type="text" class="form-control " id="amedida" placeholder="Indique el tipo de medida"  onpaste="return false" tabindex="0" onkeypress="return esamedida(event);" onblur="return alsalir(this.id);" disabled>
								</div>
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_amedida' ></div>
									<div>
										<label class="guardia79" tabindex="0" style="color: #E8F0FF">.</label>
									</div>
									<div id="idacc" style='display:none;'>
										<label for="idaccion" class="guardia77" tabindex="0">Id Acción</label>
										<input type="text" class="form-control " id="idaccion" placeholder="Indique Id de la accion"  onpaste="return false" tabindex="45" onkeypress="return esidaccion(event);" onblur="return alsalir(this.id);" >
										<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_idaccion' ></div>
									</div>							
							</div>
						</div>	
						</div>
						</div><!-- /.box-body -->
		 		</div><!-- /.box -->
			</div>

			<div class="col-md-4">

				<div class="box-header with-border">
					 	<h3 class="box-title">Descripción de la actividad</h3>
				</div><!-- /.box-header -->

				<div class="box box-primary">
						<!-- form start -->
						<div class="box-body">
						<div class="form-group-sm">
							
								<label>Entidades participantes</label>
								<input type="text" class="form-control ccc" id="entidad" placeholder="Indique las entidades participantes"  onpaste="return false" tabindex="46" onkeypress="return esentidad(event);"  onblur="alsalir(this.id);"  autocomplete="off">
							
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_entidad' class="aaa"><p></p></div>
							
							
								<label>Número de víctimas participantes</label>
								<input type="text" class="form-control ccc" id="num_vic" placeholder="Indique el número de víctimas"  onpaste="return false" tabindex="47" onkeypress="return esvictimas(event);"  onblur="alsalir(this.id);"  autocomplete="off">
							
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_num_vic' class="aaa"><p></p></div>
														
							
    							<label for="descripcion">Descripción breve</label>
    							<textarea class="form-control ccc" id="descripcion" rows="4" placeholder="Redacte una breve descripción de la actividad a realizar"  onpaste="return false" tabindex="48" onkeypress="return esdescri(event);"  onblur="alsalir(this.id);"  autocomplete="off"></textarea>
  							
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_descripcion' class="aaa"><p></p></div>
						</div>
						</div><!-- /.box-body -->
				 </div><!-- /.box -->

				 <div class="box-header with-border">
					 	<h3 class="box-title">Detalle especifico del requerimiento</h3>
				</div><!-- /.box-header -->

				<div class="box box-primary" >			
					<div class="box-body dataTables_wrapper form-inline dt-bootstrap" width="100%" style="width: 100%">
							<table id="tabla" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Tipo</th>
										<th>Concepto</th>
										<th>Cantidad</th>
										<th>Medida</th>
										<th>Observaciones</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
					</div>
				
					<div class="box-footer">
						<button id="agregar" type="button" class="btn btn-primary sm" tabindex="49"><i class="fa fa-fw fa-plus"></i>Agregar</button>
						<button id="quitar" type="button" class="btn btn-danger sm pull-right"><i class="fa fa-fw fa-minus"></i>Quitar</button>
					</div>
				</div>				

			</div>

			<div class="col-md-4">

				<div class="box-header with-border">
					 	<h3 class="box-title">Alojamiento y Transporte</h3>
				</div><!-- /.box-header -->

		  		<div class="box box-primary">

						<!-- form start -->
						<div class="box-body">

								<label>Requerimiento de Alojamiento</label>
	                            <div class = "input-group">
								      <span class = "input-group-addon">
	                                     <input type = "checkbox" tabindex="0" id="alojamiento">
									  </span>
									  <input type="text" class="form-control" id="msg_aloja" value="No requiere Alojamiento" disabled>
								</div>
								
								<label>Requerimiento de Transporte</label>
	                            <div class = "input-group">
								      <span class = "input-group-addon">
	                                     <input type = "checkbox" tabindex="0" id="transporte">
									  </span>
									  <input type="text" class="form-control" id="msg_trans" value="No requiere transporte" disabled>
								</div>
								<label class="guardia81" tabindex="0" style="color: #FFF">.</label>
							
						<div class="focusguard" id="guardia2" tabindex="51"></div>
						</div><!-- /.box-body -->

		 		</div><!-- /.box -->

			</div>
		</li>

		<li id="tres"><!--################################## DATOS PUBLICITARIOS Y DE ACTIVOS ##################################  -->

			<div class="col-md-4">

				<div id="reste" style='display:none;'>
					<div class="box-header with-border">
						<h3 class="box-title">Responsable Territorial</h3>
					</div><!-- /.box-header -->	
				
					<div class="box box-primary">

						<div class="box-body">
							<label>Nombres</label>
							<div class="input-group">
								<input type="text" class="form-control ddd" id="rn_nombre1" placeholder="Primer nombre"  onpaste="return false" tabindex="260" onkeypress="return esnombre3(event);"  onblur="alsalir(this.id)" autocomplete="off">
								<span class="input-group-btn" tabindex="-1" style="width:0px;"></span>
								<input type="text" class="form-control" id="rn_nombre2" placeholder="Segundo nombre"  onpaste="return false" tabindex="270" onkeypress="return esnombre3(event);" autocomplete="off">
							</div>
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_rn_nombre1' class="aaa"><p></p></div>
							
							<label>Apellidos</label>
							<div class="input-group">
								<input type="text" class="form-control ddd" id="rn_apellido1" placeholder="Primer apellido"  onpaste="return false" tabindex="280" onkeypress="return esapellido2(event);"  onblur="alsalir(this.id)"  autocomplete="off">
								<span class="input-group-btn" tabindex="-1" style="width:0px;"></span>
								<input type="text" class="form-control" id="rn_apellido2" placeholder="Segundo apellido"  onpaste="return false" tabindex="290" onkeypress="return esapellido2(event);" autocomplete="off">
							</div>
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_rn_apellido1' class="aaa"><p></p></div>
							
							
							<div class="form-group-sm">
								<label >Documento de Identidad</label>
									<div class = "input-group">

										<span class="input-group-btn">
											<select id="rn_tdoc" class="btn-sm"  tabindex="300"  >
												<option value="0">CC</option>
												<option value="1">CE</option>
												<option value="2">PA</option>
											</select>
										</span>

										<input type="text" class="form-control ddd" id="rn_num_doc" placeholder="Ingrese el numero del documento"  onpaste="return false" tabindex="310" onkeypress="return escedula2(event);" onblur="alsalira(this.id)">
									</div>
									<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_rn_num_doc' class="aaa"><p></p></div>
							</div>	

							<div class="form-group-sm">
							<label for="tele2">Teléfono de contacto</label>
							<input type="text" class="form-control ddd" id="tele2" placeholder="Ingrese un número telefónico"  onpaste="return false" tabindex="320" onkeypress="return estele2(event);" onblur="alsalir2(this.id)" autocomplete="off">
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_tele2' class="aaa"></div>
							</div>

								<div id="confirma_telefono2">
									<ul><li id="conf_tel2" style="color:#fff;text-align:center" ></li></ul>
								</div>

							<div class="form-group-sm">
							<label for="correo2">Correo electrónico</label>
							<input type="text" class="form-control ddd" id="correo2" placeholder="Ingrese un correo electrónico"  onpaste="return false" tabindex="330" onkeypress="return escorreo2(event);" onblur="alsalir2(this.id)" autocomplete="off">
							<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_correo2' class="aaa"></div>
							</div>

								<div id="confirma_correo2">
									<ul><li id="conf_cor2" style="color:#fff;text-align:center" ></li></ul>
								</div>							
							
							
						</div>


					</div>
				</div>

		  		<div class="box box-primary">

						<div class="box-body">

							<label id="prueba"></label>

						</div>
						<div class="box-footer">
							<button id="save" type="button" class="btn btn-success" tabindex="0"><i class="fa fa-fw fa-save"></i>Guardar</button>
							<button id="exit" type="button" class="btn btn-primary pull-right" tabindex="-1"><i class="fa fa-fw fa-reply"></i>Regresar</button>
							<!--<button id="cancelar" type="button" class="btn btn-primary" tabindex="-1"><i class="fa fa-fw fa-times"></i>Cancelar</button>-->
						  </div>				
						
				</div><!-- /.box-body -->


		 	</div>

			<div class="col-md-8">
		 
			</div><!-- /.box-body -->

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
         <h4 class="modal-title" id="myModalLabel1">Detalle especifico del requerimiento</h4>
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
								<label>Tipo</label>
								<select id="d_tipo"   class="form-control" >
									<option value="0" selected disabled hidden>Indique tipo de requerimiento </option>
									<option value="1">Salones</option>
									<option value="2">Alimentación</option>
									<option value="3">Materiales</option>
									<option value="4">Cotizables</option>
								</select>
							</div>

							<div class="form-group-sm">
								<label>Concepto</label>
								<input type="text"  class="form-control" id="d_concepto"  placeholder="Describa el concepto"  onpaste="return false" onkeypress="return esdconcepto(event);" onblur="alsalir(this.id)" autocomplete="off">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_d_concepto' ></div>
							</div>

							<div class="form-group-sm">
								<label>Cantidad</label>
								<input type="text"  class="form-control" id="d_cantidad"  placeholder="Indique la cantidad"  onpaste="return false" onkeypress="return esdcantidad(event);" onblur="alsalir(this.id)" autocomplete="off">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_d_cantidad' ></div>
							</div>

							<div class="form-group-sm">
								<label>Medida</label>
								<select id="d_medida"   class="form-control" >
									<option value="0" selected disabled hidden>Indique tipo de medida </option>
									<option value="1">Metros</option>
									<option value="2">Unidades</option>
									<option value="3">Kilogramos</option>
									<option value="4">Gramos</option>
									<option value="5">Centimetros</option>
									<option value="6">Pulgadas</option>
									<option value="7">Libras</option>
									<option value="8">Litros</option>
									<option value="9">Galones</option>
								</select>
							</div>

							<div class="form-group-sm">
							  <label>Observaciones</label>
							  <textarea class="form-control" id="d_obs" rows="4" placeholder="Redacte un resumen de características"  onpaste="return false" onkeypress="return esdobs(event);"  onblur="alsalir(this.id);"  autocomplete="off"></textarea>
  							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_d_obs' class="aaa"><p></p></div>
							</div>

					  </div><!-- /.box-body -->

				  </div><!-- /.box -->

				</div>
			</div>
							      <div class="modal-footer">
							      		<button id="close1" type="button" class="btn btn-success" ><i class="fa fa-fw fa-save"></i>Incluir</button>
							      		<button id="cancelar2" type="button" class="btn btn-primary  pull-right"><i class="fa fa-fw fa-times"></i>Cancelar</button>

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

	//$.post( "../../controllers/mdetalles_controller", { action: "search_act_delete"}).done(function( data ) {},"json");

	$.post( "../../controllers/mrequerimientos_controller", { action: "contar_id"}).done(function( data ) {
		var parsedJson = $.parseJSON(data);
		var numstring=parsedJson.toString();
		var res = numstring.padStart(4, 0);

		$("#n_accion").val( res );
		$("#ideado").val( numstring );
	},"json");

});



//MASCARAS DE VALIDACION ########################################


$('#tele1').mask('A00-000-0000', {

    	translation: {

    		 'A': {

        			pattern: /[03]/, optional: true

     		        }

    	  },

    	

  });

$('#tele2').mask('A000-000-0000', {

    	translation: {

    		 'A': {

        			pattern: /[0]/, optional: true

     		        }

    	  },

    	

  });


var tick=0;

$("#derecha" ).click(function() {

	if(tick==0){

		var cont_alert =$('.bbb').filter(function() { return $(this).val() == ""; }).size();
		//var cont_alert = $('.aaa p:contains("") ').size();
//alert(cont_alert);
		//if(cont_alert!=0){
			if(cont_alert > 30){	
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

			
			$('.base').unslider('animate:1');
			tick=1;
			document.getElementById('izquierda').disabled = false;

			setTimeout(function() {
				document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
			}, 800);

		}

	}else if(tick==1){

		var cont_alert3 =$('.ccc').filter(function() { return $(this).val() == ""; }).size();
		//var cont_alert = $('.aaa p:contains("") ').size();

		//if(cont_alert3!=0){
			if(cont_alert3 > 50){
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

			$('.base').unslider('animate:2');
			
			tick=2;
			document.getElementById('derecha').disabled = true;
			setTimeout(function() {
				document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
			}, 800);			

		}

	}

});

$("#izquierda" ).click(function() {

	if(tick==1){
		
		$('.base').unslider('animate:0');
		tick=0;
		document.getElementById('izquierda').disabled = true;
		setTimeout(function() {
			document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
		}, 800);

	}else if(tick==2){
		
		$('.base').unslider('animate:1');
		tick=1;
		document.getElementById('derecha').disabled = false;
		setTimeout(function() {
			document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
		}, 800);

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

		$('#correo2').keyup(function() {
			// set password variable
			var corre = $(this).val();

			$.post( "../../controllers/validaciones", { action: "validar5",correo:corre}).done(function( data ) {
			 $("#conf_cor2").html( data );

			});

		}).focus(function() {
			$('#confirma_correo2').show();
		}).blur(function() {
			$('#confirma_correo2').hide();
		});		

		$('.base').unslider({

			keys: false,
			nav: false,
			arrows: false

		});


		$("#fecha1").datepicker("setDate", new Date());

		$('#fecha2').datepicker({
			startDate: '+0d',
    		todayBtn: false,
		    todayHighlight: true,
		    autoclose: true,
			language: 'es',
			showOnFocus: true

		});

		$('#fecha3').datepicker({
			startDate: '+0d',
    		todayBtn: false,
		    todayHighlight: true,
		    autoclose: true,
			language: 'es',
			showOnFocus: true

		});

	
		$('#guardia1').on('focus', function() {
			$('#pertenencia').focus();
				var cont_alert2 =$('.bbb').filter(function() { return $(this).val() == ""; }).size();
				//var cont_alert = $('.aaa p:contains("") ').size();
		//alert(cont_alert2);
				//if(cont_alert2!=0){
					if(cont_alert2  > 30 ){
						
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

					$('.base').unslider('animate:1');

					

				    setTimeout(function() {
				
						document.getElementById('izquierda').disabled = false;
				    	tick=1;
						$('#guardia78').focus();
						//document.getElementById("tipo1").focus();
						document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
				    }, 800);					

				}	

		});


		$('.guardia77').on('focus', function() {
				$('#idaccion').focus();
		});

		$('.guardia79').on('focus', function() {
				$('#entidad').focus();
		});

		$('.guardia80').on('focus', function() {
			$('#tipo2').dropdown('toggle');
		});

		$('.guardia81').on('focus', function() {
			$('#guardia2').dropdown('toggle');
		});

		$('#guardia2').on('focus', function() {
				$('#entidad' ).focus();
				var cont_alert4 =$('.ccc').filter(function() { return $(this).val() == ""; }).size();
				//var cont_alert = $('.aaa p:contains("") ').size();

				//if(cont_alert4!=0){
					if(cont_alert4 >50){
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


					$('.base').unslider('animate:2');
				    setTimeout(function() {

						
				    	$('#prueba').focus();
				    	document.getElementById('derecha').disabled = true;
				    	tick=2;
						document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
				    }, 800);					

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


		$('#tipo1').on('change', function () {

     		var selectVal = $("#tipo1 option:selected").val();
			
			 if(selectVal==9){

				$("#otro1a").css("display", "block");
				
				$("#otro1").focus();

			}else{

				$("#otro1a").css("display", "none");		
				$("#otro1").val("");

			}
		});


		$("#exit" ).click(function() {

						$.confirm({
						    title: '¡Esta acción lo llevará al listado de requerimientos y borrará los datos no registrados!.¿Desea continuar?',
						    content:false,
						    confirmButton: 'Si',
						    cancelButton: 'No',
						    confirmButtonClass: 'btn-primary',
    						    cancelButtonClass: 'btn-success',

						    confirm: function(){

								$.post( "../../controllers/mrequerimientos_controller", {action: "del_temp"}).done(function(data){},"json");

						    	setTimeout(function(){

						                  $(location).attr('href','../requerimientos/');
                  
						        }, 1000);
							},

						    cancel: function(){

							}
						});				
			
		});

		// ********************************************************************************************

		$("#transporte") .change(function() {

			if( $('#transporte').prop('checked')== true ) {

				$("#msg_trans").val("Requiere transporte");
				$("#trans").val(1);

			}else{

				$("#msg_trans").val("No requiere transporte");
				$("#trans").val(0);
			}

		});

		$("#alojamiento") .change(function() {

			if( $('#alojamiento').prop('checked')== true ) {

				$("#msg_aloja").val("Requiere alojamiento");
				$("#aloja").val(1);

			}else{

				$("#msg_aloja").val("No requiere alojamiento");
				$("#aloja").val(0);
			}

		});

		$("#aruta" ).change(function() {

			if( $('#aruta').prop('checked')== true ) {

			   	document.getElementById("afase").disabled = false;
				   $("#arutaval").val(1);  

			}else{

			 	document.getElementById("afase").disabled = true;
				 $("#afase").val("");
				 $("#arutaval").val(0); 
			}

		});

		$("#apirc" ).change(function() {

			if( $('#apirc').prop('checked')== true ) {

				document.getElementById("amedida").disabled = false;
				$("#idacc").css("display", "block");
				$(".guardia79").css("display", "none");		
				$("#apircval").val(1); 	
			}else{

				document.getElementById("amedida").disabled = true;
				$("#idacc").css("display", "none");	
				$(".guardia79").css("display", "block");	
				$("#idaccion").val("");
				$("#amedida").val("");
				$("#apircval").val(0);  
				
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
											"url": "../../data_json/data_mdetalles",
											"dataSrc": ""
										  },
										  "scrollX": true,
										  "scrollY": "130px",
										  "columns": [
												{ "data": "tipo" },
												{ "data": "concepto" },
												{ "data": "cantidad" },
												{ "data": "medida" },
												{ "data": "observaciones" }
												
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

				$.post( "../../controllers/mdetalles_controller", {

					action: "temporal",
					tipo: $('#d_tipo').val(),
					concepto: $('#d_concepto').val(),
					cantidad: $('#d_cantidad').val(),
					medida: $('#d_medida').val(),
					observaciones: $('#d_obs').val()

				}).done(function(data){

					var parsedJson = $.parseJSON(data);
					$(".message1").html(parsedJson.mensaje);

					if(parsedJson.resultado != 'error'){

						
					    setTimeout(function(){

							$("#d_tipo").val(null);
							$("#d_concepto").val(null);
							$("#d_cantidad").val(null);
							$("#d_medida").val(null);
							$("#d_obs").val(null);

							$('#tabla').DataTable().ajax.reload();
 							$(".alert").alert('close');
					      	$('#modal1').modal('toggle');
							$("#agregar").focus();

					    }, 3000);

					}else{

					}

				},"json");
		    //$('#activo').focus();

		});

			$('#quitar').click( function () {

				var value= table.$('tr.selected').children('td:first').text();
				//alert(value);
				if(!value){

						$.alert({
						    title: '!Seleccione el item a desincorporar!',
						    content: false,
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success'
						});

				}else{

						$.confirm({

								    title: '¿Desea desincorporar este item?!',
								    content:false,
								    confirmButton: 'Si',
								    cancelButton: 'No',
								    confirmButtonClass: 'btn-primary',
		    						    cancelButtonClass: 'btn-success',

						    		confirm: function(){

										$.post( "../../controllers/mdetalles_controller", {action:"delete",record:value}).done(function( data ) {
											//$(".message").html(data);
											var parsedJson = $.parseJSON(data);
											$(".message").html(parsedJson.mensaje);

									    	setTimeout(function(){

												$(".alert").alert('close');
												//$('#tabla').dataTable();
												 

													  	$.post( "../../controllers/mdetalles_controller", { action: "search_act"}).done(function( data ) {
																
																var parsedJson = $.parseJSON(data);

																		if(parsedJson == 'si'){
																		
																			$('#tabla').DataTable().ajax.reload();

																		}else{

																			$('#tabla').DataTable().ajax.reload();
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
			$("#alojamiento").focus();

			$("#d_tipo").val(null);
			$("#d_concepto").val(null);
			$("#d_cantidad").val(null);
			$("#d_medida").val(null);
			$("#d_obs").val(null);

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
			 $("#cpoblado" ).html( data );

		});	

		$('#departamento').change(function(event) {
			
			
			$("#depa" ).val($('select[name="depar"] option:selected').text());
				
				$.post( "../../controllers/mgeograficas_controller", { action: "get_municipios",departamento: $("#departamento").val()}).done(function( data ) {
					 $("#municipio" ).html( data );

				});

				$.post( "../../controllers/mgeograficas_controller", { action: "get_parroquias"}).done(function( data ) {
					 $("#cpoblado" ).html( data );

				});					

		});


		$('#municipio').change(function(event) {
			
				$.post( "../../controllers/mgeograficas_controller", { action: "get_parroquias",municipio: $("#municipio").val()}).done(function( data ) {
					 $("#cpoblado" ).html( data );

				});

				$.post( "../../controllers/mgeograficas_controller", { action: "get_parroquias"}).done(function( data ) {
					 $("#cpoblado" ).html( data );

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

		$.post( "../../controllers/grupos_controller", { action: "get_marcas"}).done(function( data ) {
			 $("#grupo" ).html( data );

		});

		/*$.post( "../../controllers/mdistribuidoras_controller", { action: "get_distri"}).done(function( data ) {
			 $("#distribuidora" ).html( data );

		});*/

		$.post( "../../controllers/mregiones_controller", { action: "get_regi",distribuidora:<?php echo intval($_SESSION['distribuidora']); ?>}).done(function( data ) {
			 $("#region" ).html( data );

		});

		//** enviar los datos al controlador ***********************************************************
		$("#save" ).click(function() {

				
				$.post( "../../controllers/mrequerimientos_controller", {

					action: "add",
					
					nombre: $("#nombre").val(),
					fecha1: $("#fecha1").val(),
					departamento: $("#departamento").val(),
					municipio: $("#municipio").val(),
					cpoblado: $("#cpoblado").val(),

					a_primario: $("#a_primario").val(),
					acceso1: $("#acceso1").val(),
					acceso2: $("#acceso2").val(),
					num_dir: $("#num_dir").val(),
					a_referencia: $("#a_referencia").val(),

					fecha2: $("#fecha2").val(),
					fecha3: $("#fecha3").val(),
					hora1: $("#hora1").val(),
					hora2: $("#hora2").val(),

					rt_nombre1: $("#rt_nombre1").val(),
					rt_nombre2: $("#rt_nombre2").val(),
					rt_apellido1: $("#rt_apellido1").val(),
					rt_apellido2: $("#rt_apellido2").val(),
					rt_tdoc: $("#rt_tdoc").val(),
					rt_num_doc: $("#rt_num_doc").val(),
					tele1: $("#tele1").val(),
					correo1: $("#correo1").val(),
					grupo: $("#grupo").val(),
					otro1: $("#otro1").val(),

					rn_nombre1: $("#rn_nombre1").val(),
					rn_nombre2: $("#rn_nombre2").val(),
					rn_apellido1: $("#rn_apellido1").val(),
					rn_apellido2: $("#rn_apellido2").val(),
					rn_tdoc: $("#rn_tdoc").val(),
					rn_num_doc: $("#rn_num_doc").val(),
					tele2: $("#tele2").val(),
					correo2: $("#correo2").val(),

					tipo1: $("#tipo1").val(),
					tipo2: $("#tipo2").val(),
					tipo3: $("#tipo3").val(),
					tipo4: $("#tipo4").val(),
					arutaval: $("#arutaval").val(),
					apircval: $("#apircval").val(),
					afase: $("#afase").val(),
					amedida: $("#amedida").val(),
					idaccion: $("#idaccion").val(),
					entidad: $("#entidad").val(),
					num_vic: $("#num_vic").val(),
					descripcion: $("#descripcion").val(),
					aloja: $("#aloja").val(),
					trans: $("#trans").val(),
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

					$.post( "../../controllers/mdetalles_controller", { action: "definitivo2",recordado:$("#ideado").val()}).done(function( data ) {
						$.post( "../../controllers/mdetalles_controller", { action: "search_act_delete"}).done(function( data ) {},"json");
					});

						$('.base').unslider('animate:0');

					    	setTimeout(function(){

					                  $(location).attr('href','../requerimientos/frm_registrar');
					                  $('#nombre').focus();

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
                if(caso1.length < 7){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 7 caractéres';
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
                if(caso1.length < 12){
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

function escedula1(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_rt_num_doc').style.display = 'block';
                       	document.getElementById("ms_rt_num_doc").innerHTML = 'Use solo números';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_rt_num_doc").innerHTML = '';
                       	return patron.test(n);

                    }

}

function escedula2(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9]$/;
	n = String.fromCharCode(k);

				if(patron.test(n)==''){

					document.getElementById('ms_rn_num_doc').style.display = 'block';
					   document.getElementById("ms_rn_num_doc").innerHTML = 'Use solo números';
						return patron.test(n);

				}else{

					   document.getElementById("ms_rn_num_doc").innerHTML = '';
					   return patron.test(n);

				}

}
function esacceso1(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ ]$/;
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


function esacceso2(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ ]$/;
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

function esnumdir(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[0-9]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_num_dir').style.display = 'block';
                       	document.getElementById("ms_num_dir").innerHTML = 'Use solo números';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_num_dir").innerHTML = '';
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

function escorreo1(e) {

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

function escorreo2(e) {

k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0 || k==13) return true;
patron = /[A-ZÑ0-9\_\-\.\+\@\ ]/;
n = String.fromCharCode(k);

				if(patron.test(n)==''){

					document.getElementById('ms_correo2').style.display = 'block';
					   document.getElementById("ms_correo2").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
						return patron.test(n);

				}else{

					   document.getElementById("ms_correo2").innerHTML = '';
					   return patron.test(n);

				}

}



function esdescri(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_descripcion').style.display = 'block';
                       	document.getElementById("ms_descripcion").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_descripcion").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esdobs(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

					if(patron.test(n)==''){

						document.getElementById('ms_d_obs').style.display = 'block';
						document.getElementById("ms_d_obs").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
							return patron.test(n);

					}else{

						document.getElementById("ms_d_obs").innerHTML = '';
						return patron.test(n);

					}

}

function esdconcepto(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_d_concepto').style.display = 'block';
                       	document.getElementById("ms_d_concepto").innerHTML = 'Use mayusculas y no incluya caractéres especiales ni espacios';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_d_concepto").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esdcantidad(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_d_cantidad').style.display = 'block';
                       	document.getElementById("ms_d_cantidad").innerHTML = 'Use solo nuúmeros';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_d_cantidad").innerHTML = '';
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

			function esnombre2(e) {

					k = (document.all) ? e.keyCode : e.which;
					if (k==8 || k==0 || k==13) return true;
					patron = /^[A-ZÑ0-9\ \.\-]$/;
					n = String.fromCharCode(k);

							if(patron.test(n)==''){

								document.getElementById('ms_rt_nombre1').style.display = 'block';
								document.getElementById("ms_rt_nombre1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
									return patron.test(n);

							}else{

								document.getElementById("ms_rt_nombre1").innerHTML = '';
								return patron.test(n);

							}

			}

//************************************************************************

			function esentidad(e) {

				k = (document.all) ? e.keyCode : e.which;
				if (k==8 || k==0 || k==13) return true;
				patron = /^[A-ZÑ0-9\ \.\-]$/;
				n = String.fromCharCode(k);

					if(patron.test(n)==''){

						document.getElementById('ms_entidad').style.display = 'block';
						document.getElementById("ms_entidad").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
							return patron.test(n);

					}else{

						document.getElementById("ms_entidad").innerHTML = '';
						return patron.test(n);

					}

			}


//************************************************************************/


function esvictimas(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_num_vic').style.display = 'block';
                       	document.getElementById("ms_num_vic").innerHTML = 'Use solo números';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_num_vic").innerHTML = '';
                       	return patron.test(n);

                    }

}


//************************************************************************/

			function esnombre2(e) {

					k = (document.all) ? e.keyCode : e.which;
					if (k==8 || k==0 || k==13) return true;
					patron = /^[A-ZÑ0-9\ \.\-]$/;
					n = String.fromCharCode(k);

							if(patron.test(n)==''){

								document.getElementById('ms_rt_nombre1').style.display = 'block';
								document.getElementById("ms_rt_nombre1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
									return patron.test(n);

							}else{

								document.getElementById("ms_rt_nombre1").innerHTML = '';
								return patron.test(n);

							}

			}

//************************************************************************

			function esapellido1(e) {

				k = (document.all) ? e.keyCode : e.which;
				if (k==8 || k==0 || k==13) return true;
				patron = /^[A-ZÑ0-9\ \.\-]$/;
				n = String.fromCharCode(k);

					if(patron.test(n)==''){

						document.getElementById('ms_rt_apellido1').style.display = 'block';
						document.getElementById("ms_rt_apellido1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
							return patron.test(n);

					}else{

						document.getElementById("ms_rt_apellido1").innerHTML = '';
						return patron.test(n);

					}

			}

			//************************************************************************/

			function esnombre3(e) {

				k = (document.all) ? e.keyCode : e.which;
				if (k==8 || k==0 || k==13) return true;
				patron = /^[A-ZÑ0-9\ \.\-]$/;
				n = String.fromCharCode(k);

						if(patron.test(n)==''){

							document.getElementById('ms_rn_nombre1').style.display = 'block';
							document.getElementById("ms_rn_nombre1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
								return patron.test(n);

						}else{

							document.getElementById("ms_rn_nombre1").innerHTML = '';
							return patron.test(n);

						}

			}

//************************************************************************

		function esapellido2(e) {

				k = (document.all) ? e.keyCode : e.which;
				if (k==8 || k==0 || k==13) return true;
				patron = /^[A-ZÑ0-9\ \.\-]$/;
				n = String.fromCharCode(k);

				if(patron.test(n)==''){

					document.getElementById('ms_rn_apellido1').style.display = 'block';
					document.getElementById("ms_rn_apellido1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
						return patron.test(n);

				}else{

					document.getElementById("ms_rn_apellido1").innerHTML = '';
					return patron.test(n);

				}

		}
//************************************************************************
function esotro1(e) {

		k = (document.all) ? e.keyCode : e.which;
		if (k==8 || k==0 || k==13) return true;
		patron = /^[A-ZÑ0-9\ \.\-]$/;
		n = String.fromCharCode(k);

		if(patron.test(n)==''){

			document.getElementById('ms_otro1').style.display = 'block';
			document.getElementById("ms_otro1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
				return patron.test(n);

		}else{

			document.getElementById("ms_otro1").innerHTML = '';
			return patron.test(n);

		}

}

//************************************************************************/
function esafase(e) {

		k = (document.all) ? e.keyCode : e.which;
		if (k==8 || k==0 || k==13) return true;
		patron = /^[A-ZÑ0-9\ \.\-]$/;
		n = String.fromCharCode(k);

		if(patron.test(n)==''){

			document.getElementById('ms_afase').style.display = 'block';
			document.getElementById("ms_afase").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
				return patron.test(n);

		}else{

			document.getElementById("ms_afase").innerHTML = '';
			return patron.test(n);

		}

}


//************************************************************************
function esamedida(e) {

		k = (document.all) ? e.keyCode : e.which;
		if (k==8 || k==0 || k==13) return true;
		patron = /^[A-ZÑ0-9\ \.\-]$/;
		n = String.fromCharCode(k);

		if(patron.test(n)==''){

			document.getElementById('ms_amedida').style.display = 'block';
			document.getElementById("ms_amedida").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
				return patron.test(n);

		}else{

			document.getElementById("ms_amedida").innerHTML = '';
			return patron.test(n);

		}

}
//************************************************************************/
function esidaccion(e) {

		k = (document.all) ? e.keyCode : e.which;
		if (k==8 || k==0 || k==13) return true;
		patron = /^[A-ZÑ0-9\ \.\-]$/;
		n = String.fromCharCode(k);

		if(patron.test(n)==''){

			document.getElementById('ms_idaccion').style.display = 'block';
			document.getElementById("ms_idaccion").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
				return patron.test(n);

		}else{

			document.getElementById("ms_idaccion").innerHTML = '';
			return patron.test(n);

		}

}
//************************************************************************/

 </script>
 <?php include_once("../layouts/pie.php") ?>